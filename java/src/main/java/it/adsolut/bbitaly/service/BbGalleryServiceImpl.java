package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.Request.BbGalleryGetRequest;
import it.adsolut.bbitaly.Request.PhotoDeleteRequest;
import it.adsolut.bbitaly.Request.BbPhotoReorderRequest;
import it.adsolut.bbitaly.dao.BbGalleryDao;
import it.adsolut.bbitaly.dao.PhotoDao;
import it.adsolut.bbitaly.exception.Code;
import it.adsolut.bbitaly.model.BbGallery;
import it.adsolut.bbitaly.model.BedBreakfast;
import it.adsolut.bbitaly.model.Photo;
import it.adsolut.bbitaly.response.BbGalleryResponse;
import it.adsolut.bbitaly.response.PhotoResponse;
import it.adsolut.bbitaly.service.Interface.BbGalleryControllerService;
import it.adsolut.bbitaly.util.file.Uploader;
import it.adsolut.bbitaly.util.string.MessageDigest;
import it.adsolut.bbitaly.util.string.Replace;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;
import java.util.UUID;
import javax.servlet.http.HttpServletRequest;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.multipart.MultipartHttpServletRequest;

/**
 *
 * @author marcello
 */
public class BbGalleryServiceImpl implements BbGalleryService, BbGalleryControllerService {

    private BbGalleryDao bbGalleryDao;
    private BbService bbService;
    private Uploader uploader;
    private PhotoDao photoDao;

    public void setPhotoDao(PhotoDao photoDao) {
        this.photoDao = photoDao;
    }

    public void setBbGalleryDao(BbGalleryDao bbGalleryDao) {
        this.bbGalleryDao = bbGalleryDao;
    }

    public void setBbService(BbService bbService) {
        this.bbService = bbService;
    }

    public void setUploader(Uploader uploader) {
        this.uploader = uploader;
    }

    @Override
    public BbGalleryResponse addPhoto(String id, HttpServletRequest request, BbGalleryResponse bbGalleryResponse) {
        BbGallery bbGallery = null;
        System.out.println("------------------------------------------------------------------------------------------------");
        System.out.println("placed new photo in position: ");
        System.out.println("------------------------------------------------------------------------------------------------");

        if (request instanceof MultipartHttpServletRequest) {
            MultipartHttpServletRequest fileRequest = (MultipartHttpServletRequest) request;
            Map<String, MultipartFile> files = fileRequest.getFileMap();
            if (!files.isEmpty()) {
                for (Map.Entry<String, MultipartFile> fileEntry : files.entrySet()) {
                    MultipartFile file = fileEntry.getValue();
                    try {
                        BedBreakfast bb = bbService.get(id);
                        String filename = MessageDigest.md5(UUID.randomUUID().toString())
                                + "_" + bb.getType()
                                + "_" + Replace.replace(" ", "_", bb.getName());
                        Photo photo = new Photo();
                        String picUrl = uploader.upload(file, filename, "bbgallery");
                        bbGallery = bbGalleryDao.findByBb(bb);
                        List<Photo> photoList = new ArrayList<Photo>();
                        Integer position = 1;
                        if (bbGallery != null) {
                            photoList = bbGallery.getPhotos();
                            if (photoList.size() > 0)  {
                                Photo lastPhoto = photoList.get(photoList.size() - 1);
                                position = lastPhoto.getDisplayOrder() + 1;
                            }
                        } else {
                            bbGallery = new BbGallery();
                            bbGallery.setAccomodation(bb);
                        }
                        photoList.add(photo);
                        photo.setDisplayOrder(position);
                        System.out.println("------------------------------------------------------------------------------------------------");
                        System.out.println("placed new photo in position: " + position);
                        System.out.println("------------------------------------------------------------------------------------------------");
                        photo.setUrl(picUrl);
                        photoDao.persist(photo);
                        bbGallery.setPhotos(photoList);
                        bbGalleryDao.addChild(bbGallery);
                    } catch (Exception ex) {
                        System.out.println("------------------------------------------------------------------------------------------------");
                        System.out.println("[PHOTO]EXCEPTION: " + ex.getMessage() + "\n");
                        ex.printStackTrace();
                        System.out.println("------------------------------------------------------------------------------------------------");
                        bbGalleryResponse.addError(Code.Bb.NO_FILE_SELECTED + " " + ex.getMessage());
                    }
                }
            } else {
                bbGalleryResponse.addError(Code.Bb.NO_FILE_SELECTED + "pipi");
            }
        } else {
            bbGalleryResponse.addError(Code.Bb.FILE_UPLOAD_ERROR + "bho");
        }
        if (bbGalleryResponse.getErrors().isEmpty()) {
            bbGalleryResponse.setData(bbGallery);
        }
        return bbGalleryResponse;
    }

    @Override
    public BbGallery get(String bbid) {
        return bbGalleryDao.findByBb(bbService.get(bbid));
    }

    @Override
    public BbGalleryResponse get(BbGalleryGetRequest bbGetRequest, BbGalleryResponse bbResponse) {
        bbResponse.setData(this.get(bbGetRequest.getId()));
        return bbResponse;
    }

    @Override
    public Photo delete(Long id) {
        return photoDao.delete(id);
    }

    @Override
    public PhotoResponse delete(PhotoDeleteRequest bbPhotoDeleteRequest, PhotoResponse photoResponse) {
        photoResponse.setData(delete(bbPhotoDeleteRequest.getId()));
        return photoResponse;
    }

    public BbGallery reorderBbPhoto(String gid, ArrayList<Long> pids) {
        Integer position = 0;
        for (Long pid : pids) {
            Photo p = photoDao.find(pid);
            p.setDisplayOrder(++position);
            photoDao.persist(p);
        }
        BbGallery bbGallery = this.get(gid);
        return bbGallery;
    }

    @Override
    public BbGalleryResponse reorderBbPhoto(BbPhotoReorderRequest bbPhotoReorderRequest, BbGalleryResponse bbGalleryResponse) {
        bbGalleryResponse.setData(this.reorderBbPhoto(bbPhotoReorderRequest.getId(), bbPhotoReorderRequest.getPids()));
        return bbGalleryResponse;
    }
}
