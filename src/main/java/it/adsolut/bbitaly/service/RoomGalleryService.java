/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.model.Photo;
import it.adsolut.bbitaly.model.RoomGallery;

/**
 *
 * @author marcello
 */
public interface RoomGalleryService {
    public RoomGallery get(Long bbid);
    public Photo delete(Long id);
}
