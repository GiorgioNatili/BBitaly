/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service.Interface;

import it.adsolut.bbitaly.Request.RoomGalleryGetRequest;
import it.adsolut.bbitaly.Request.PhotoDeleteRequest;
import it.adsolut.bbitaly.Request.RoomPhotoReorderRequest;
import it.adsolut.bbitaly.response.RoomGalleryResponse;
import it.adsolut.bbitaly.response.PhotoResponse;
import javax.servlet.http.HttpServletRequest;

/**
 *
 * @author marcello
 */
public interface RoomGalleryControllerService {
    public RoomGalleryResponse reorderRoomPhoto(RoomPhotoReorderRequest roomPhotoReorderRequest, RoomGalleryResponse roomGalleryResponse);
    public RoomGalleryResponse addPhoto(Long id, HttpServletRequest request, RoomGalleryResponse roomGalleryResponse);
    public RoomGalleryResponse get(RoomGalleryGetRequest roomGetRequest, RoomGalleryResponse roomResponse);
    public PhotoResponse delete(PhotoDeleteRequest roomPhotoDeleteRequest, PhotoResponse roomGalleryResponse);
}
