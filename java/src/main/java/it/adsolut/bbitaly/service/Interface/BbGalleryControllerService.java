/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service.Interface;

import it.adsolut.bbitaly.Request.BbGalleryGetRequest;
import it.adsolut.bbitaly.Request.PhotoDeleteRequest;
import it.adsolut.bbitaly.Request.BbPhotoReorderRequest;
import it.adsolut.bbitaly.response.BbGalleryResponse;
import it.adsolut.bbitaly.response.PhotoResponse;
import javax.servlet.http.HttpServletRequest;

/**
 *
 * @author marcello
 */
public interface BbGalleryControllerService {
    public BbGalleryResponse reorderBbPhoto(BbPhotoReorderRequest bbPhotoReorderRequest, BbGalleryResponse bbGalleryResponse);
    public BbGalleryResponse addPhoto(String id, HttpServletRequest request, BbGalleryResponse bbGalleryResponse);
    public BbGalleryResponse get(BbGalleryGetRequest bbGetRequest, BbGalleryResponse bbResponse);
    public PhotoResponse delete(PhotoDeleteRequest bbPhotoDeleteRequest, PhotoResponse bbGalleryResponse);
}
