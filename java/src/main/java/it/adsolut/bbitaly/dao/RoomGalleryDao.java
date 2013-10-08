/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.Room;
import it.adsolut.bbitaly.model.RoomGallery;

/**
 *
 * @author marcello
 */
public interface RoomGalleryDao {

    public RoomGallery findByRoom(Room bb);

    public void persist(RoomGallery bbGallery);
    
    public void addChild(RoomGallery roomGallery);
}
