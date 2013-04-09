package it.adsolut.bbitaly.model;

import java.util.List;
import javax.persistence.CascadeType;
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
@Entity(name = "bbgallery")
public class BbGallery {
    
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;
    
    @OneToOne
    private BedBreakfast accomodation;
    
    @OneToMany(fetch=FetchType.EAGER)
    @OrderBy("displayOrder, id")
    @Where(clause="deleted is null")
    private List<Photo> photos;

    public BedBreakfast getAccomodation() {
        return accomodation;
    }

    public void setAccomodation(BedBreakfast accomodation) {
        this.accomodation = accomodation;
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
