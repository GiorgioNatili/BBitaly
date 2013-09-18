package it.adsolut.bbitaly.response.vo;

import java.util.Set;

/**
 *
 * @author marcello
 */
public class RoomGallery {
    
    private Long id;
    
    private Room room;
    
    private Set<Photo> photos;

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Set<Photo> getPhotos() {
        return photos;
    }

    public void setPhotos(Set<Photo> photos) {
        this.photos = photos;
    }

    public Room getRoom() {
        return room;
    }

    public void setRoom(Room room) {
        this.room = room;
    }

}
