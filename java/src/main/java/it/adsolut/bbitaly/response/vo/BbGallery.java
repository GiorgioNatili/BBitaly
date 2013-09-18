package it.adsolut.bbitaly.response.vo;

import java.util.Set;

/**
 *
 * @author marcello
 */
public class BbGallery {
    
    private Long id;
    
    private BedBreakfast accomodation;
    
    private Set<Photo> photos;

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

    public Set<Photo> getPhotos() {
        return photos;
    }

    public void setPhotos(Set<Photo> photos) {
        this.photos = photos;
    }
    
}
