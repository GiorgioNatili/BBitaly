package it.adsolut.bbitaly.response.vo;

/**
 *
 * @author marcello
 */
public class RoomPrice {
    
    private Long id;
    
    private String date;
    
    private Float price;
    
    private Boolean isOffer;
    
    private Boolean isBooked;

    public String getDate() {
        return date;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }
    
    public void setIsOffer(Boolean isOffer) {
        this.isOffer = isOffer;
    }
    
    public Boolean isOffer() {
        return isOffer;
    }

    public Float getPrice() {
        return price;
    }

    public void setPrice(Float price) {
        this.price = price;
    }

    public Boolean isBooked() {
        return isBooked;
    }

    public void setIsBooked(Boolean isBooked) {
        this.isBooked = isBooked;
    }
    
}
