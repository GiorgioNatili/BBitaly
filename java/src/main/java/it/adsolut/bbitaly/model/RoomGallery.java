package it.adsolut.bbitaly.model;

import java.util.List;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.persistence.OneToOne;
import javax.persistence.OrderBy;
import org.hibernate.annotations.Where;

/**
 *
 * @author marcello
 */
@Entity(name = "roomgallery")
public class RoomGallery {
    
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;
    
    @OneToOne(fetch=FetchType.EAGER)
    private Room room;
    
    @OneToMany(fetch=FetchType.EAGER)
    @OrderBy("displayOrder, id")
    @Where(clause="deleted is null")
    private List<Photo> photos;

    public Room getRoom() {
        return room;
    }

    public void setRoom(Room room) {
        this.room = room;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public List<Photo> getPhotos() {
        return photos;
    }

    public void setPhotos(List<Photo> photos) {
        this.photos = photos;
    }
    
}
