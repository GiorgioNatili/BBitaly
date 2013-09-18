package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.Request.PhotoDeleteRequest;
import it.adsolut.bbitaly.Request.RoomGalleryGetRequest;
import it.adsolut.bbitaly.Request.RoomPhotoReorderRequest;
import it.adsolut.bbitaly.dao.PhotoDao;
import it.adsolut.bbitaly.dao.RoomGalleryDao;
import it.adsolut.bbitaly.exception.Code;
import it.adsolut.bbitaly.model.Photo;
import it.adsolut.bbitaly.model.Room;
import it.adsolut.bbitaly.model.RoomGallery;
import it.adsolut.bbitaly.response.PhotoResponse;
import it.adsolut.bbitaly.response.RoomGalleryResponse;
import it.adsolut.bbitaly.service.Interface.RoomGalleryControllerService;
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
public class RoomGalleryServiceImpl implements RoomGalleryService, RoomGalleryControllerService {

    private RoomGalleryDao roomGalleryDao;
    private RoomService roomService;
    private Uploader uploader;
    private PhotoDao photoDao;

    public void setRoomService(RoomService roomService) {
        this.roomService = roomService;
    }

    public void setPhotoDao(PhotoDao photoDao) {
        this.photoDao = photoDao;
    }

    public void setRoomGalleryDao(RoomGalleryDao roomGalleryDao) {
        this.roomGalleryDao = roomGalleryDao;
    }

    public void setUploader(Uploader uploader) {
        this.uploader = uploader;
    }

    @Override
    public RoomGalleryResponse addPhoto(Long id, HttpServletRequest request, RoomGalleryResponse roomGalleryResponse) {
        RoomGallery roomGallery = null;
        System.out.println("------------------------------------------------------------------------------------------------");
        System.out.println("checking if request is a MultipartHttpServleRequest");
        System.out.println("------------------------------------------------------------------------------------------------");
        if (request instanceof MultipartHttpServletRequest) {
            System.out.println("------------------------------------------------------------------------------------------------");
            System.out.println("yes, it is");
            System.out.println("------------------------------------------------------------------------------------------------");
            MultipartHttpServletRequest fileRequest = (MultipartHttpServletRequest) request;
            Map<String, MultipartFile> files = fileRequest.getFileMap();
            System.out.println("------------------------------------------------------------------------------------------------");
            System.out.println("checking if the files list is not empty");
            System.out.println("------------------------------------------------------------------------------------------------");
            if (!files.isEmpty()) {
                System.out.println("------------------------------------------------------------------------------------------------");
                System.out.println("no! it's not");
                System.out.println("------------------------------------------------------------------------------------------------");
                for (Map.Entry<String, MultipartFile> fileEntry : files.entrySet()) {
                    System.out.println("------------------------------------------------------------------------------------------------");
                    System.out.println("cycling on files list");
                    System.out.println("------------------------------------------------------------------------------------------------");
                    MultipartFile file = fileEntry.getValue();
                    try {
                        Room room = roomService.find(id);
                        System.out.println("------------------------------------------------------------------------------------------------");
                        System.out.println("found room with id: " + id);
                        System.out.println("------------------------------------------------------------------------------------------------");
                        System.out.println("------------------------------------------------------------------------------------------------");
                        System.out.println("createing filename with pices: " + room.getBedBrekfast().getType() + " " + Replace.replace(" ", "_", room.getBedBrekfast().getName()));
                        System.out.println("------------------------------------------------------------------------------------------------");
                        String filename = MessageDigest.md5(UUID.randomUUID().toString())
                                + "_" + room.getBedBrekfast().getType()
                                + "_" + Replace.replace(" ", "_", room.getBedBrekfast().getName());
                        System.out.println("------------------------------------------------------------------------------------------------");
                        System.out.println("created filename: " + filename);
                        System.out.println("------------------------------------------------------------------------------------------------");
                        Photo photo = new Photo();
                        System.out.println("------------------------------------------------------------------------------------------------");
                        System.out.println("uploading file:" + filename);
                        System.out.println("------------------------------------------------------------------------------------------------");
                        String picUrl = uploader.upload(file, filename, "roomgallery");
                        System.out.println("------------------------------------------------------------------------------------------------");
                        System.out.println("upload complete");
                        System.out.println("------------------------------------------------------------------------------------------------");
                        roomGallery = roomGalleryDao.findByRoom(room);
                        System.out.println("------------------------------------------------------------------------------------------------");
                        System.out.println("searching for existing roomgallery");
                        System.out.println("------------------------------------------------------------------------------------------------");
                        List<Photo> photoList = new ArrayList<Photo>();
                        Integer position = 1;
                        if (roomGallery != null) {
                            System.out.println("------------------------------------------------------------------------------------------------");
                            System.out.println("found existing one");
                            System.out.println("------------------------------------------------------------------------------------------------");
                            photoList = roomGallery.getPhotos();
                            if (photoList.size() > 0) {
                                System.out.println("------------------------------------------------------------------------------------------------");
                                System.out.println("existing one has a photo list not empty");
                                System.out.println("------------------------------------------------------------------------------------------------");
                                Photo lastPhoto = photoList.get(photoList.size() - 1);
                                position = lastPhoto.getDisplayOrder() + 1;
                            }
                        } else {
                            System.out.println("------------------------------------------------------------------------------------------------");
                            System.out.println("not found: creting new one");
                            System.out.println("------------------------------------------------------------------------------------------------");
                            roomGallery = new RoomGallery();
                            roomGallery.setRoom(room);
                        }
                        photoList.add(photo);
                        photo.setDisplayOrder(position);
                        System.out.println("------------------------------------------------------------------------------------------------");
                        System.out.println("placed new photo in position: " + position);
                        System.out.println("------------------------------------------------------------------------------------------------");
                        photo.setUrl(picUrl);
                        photoDao.persist(photo);
                        roomGallery.setPhotos(photoList);
                        roomGalleryDao.persist(roomGallery);
                    } catch (Exception ex) {
                        System.out.println("------------------------------------------------------------------------------------------------");
                        System.out.println("occurred an error" + ex.getStackTrace());
                        System.out.println("------------------------------------------------------------------------------------------------");
                        roomGalleryResponse.addError(Code.Bb.NO_FILE_SELECTED + " " + ex.getMessage());
                    }
                }
            } else {
                System.out.println("------------------------------------------------------------------------------------------------");
                System.out.println("yes, it is");
                System.out.println("------------------------------------------------------------------------------------------------");
                roomGalleryResponse.addError(Code.Bb.NO_FILE_SELECTED + "pipi");
            }
        } else {
            System.out.println("------------------------------------------------------------------------------------------------");
            System.out.println("no! it's not");
            System.out.println("------------------------------------------------------------------------------------------------");
            roomGalleryResponse.addError(Code.Bb.FILE_UPLOAD_ERROR + "bho");
        }
        if (roomGalleryResponse.getErrors().isEmpty()) {
            System.out.println("------------------------------------------------------------------------------------------------");
            System.out.println("error while uploading photo");
            System.out.println("------------------------------------------------------------------------------------------------");
            roomGalleryResponse.setData(roomGallery);
        }
        return roomGalleryResponse;
    }

    @Override
    public RoomGallery get(Long id) {
        return roomGalleryDao.findByRoom(roomService.find(id));
    }

    @Override
    public RoomGalleryResponse get(RoomGalleryGetRequest roomGetRequest, RoomGalleryResponse roomResponse) {
        roomResponse.setData(this.get(roomGetRequest.getId()));
        return roomResponse;
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

    public RoomGallery reorderRoomPhoto(Long gid, ArrayList<Long> pids) {
        Integer position = 0;
        for (Long pid : pids) {
            Photo p = photoDao.find(pid);
            p.setDisplayOrder(++position);
            photoDao.persist(p);
        }
        RoomGallery roomGallery = this.get(gid);
        return roomGallery;
    }

    @Override
    public RoomGalleryResponse reorderRoomPhoto(RoomPhotoReorderRequest roomPhotoReorderRequest, RoomGalleryResponse roomGalleryResponse) {
        roomGalleryResponse.setData(this.reorderRoomPhoto(roomPhotoReorderRequest.getId(), roomPhotoReorderRequest.getPids()));
        return roomGalleryResponse;
    }
}
