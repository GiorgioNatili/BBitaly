/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.model;

import java.util.ArrayList;
import java.util.List;
import java.util.Set;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.persistence.OneToOne;
import org.hibernate.annotations.SQLDelete;
import org.hibernate.annotations.Where;

/**
 *
 * @author marcello
 */
@Entity(name = "Room")
@SQLDelete(sql="UPDATE room SET deleted = true WHERE id = ?")
@Where(clause="deleted is null")
public class Room {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;
    
    @OneToOne
    private BedBreakfast bedBrekfast;
    
    private Integer amount = 1;
    
    @Column(nullable = false)
    private Integer minCapacity = 1;
    
    @Column(nullable = false)
    private Integer maxCapacity;
    
    @OneToMany(fetch= FetchType.EAGER)
    private Set<RoomTranslation> description;
    
    @OneToMany
    private List<Book> book;
    
    @OneToMany
    private List<RoomPrice> price;
    
    private Boolean deleted;
    
    private String photo;

    private Float defaultPrice;
    
    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Set<RoomTranslation> getDescription() {
        return description;
    }

    public void setDescription(Set<RoomTranslation> description) {
        this.description = description;
    }

    public Integer getAmount() {
        return amount;
    }

    public void setAmount(Integer amount) {
        this.amount = amount;
    }

    public BedBreakfast getBedBrekfast() {
        return bedBrekfast;
    }

    public void setBedBrekfast(BedBreakfast bedBrekfast) {
        this.bedBrekfast = bedBrekfast;
    }

    public List<Book> getBook() {
        return book;
    }

    public void setBook(List<Book> book) {
        this.book = book;
    }
    
    public Integer getMaxCapacity() {
        return maxCapacity;
    }

    public void setMaxCapacity(Integer maxCapacity) {
        this.maxCapacity = maxCapacity;
    }

    public Integer getMinCapacity() {
        return minCapacity;
    }

    public void setMinCapacity(Integer minCapacity) {
        this.minCapacity = minCapacity;
    }

    public Boolean getDeleted() {
        return deleted;
    }

    public void setDeleted(Boolean deleted) {
        this.deleted = deleted;
    }

    public String getPhoto() {
        return photo;
    }

    public void setPhoto(String photo) {
        this.photo = photo;
    }

    public List<RoomPrice> getPrice() {
        return price;
    }

    public void setPrice(List<RoomPrice> price) {
        this.price = price;
    }

    public Float getDefaultPrice() {
        return defaultPrice;
    }

    public void setDefaultPrice(Float defaultPrice) {
        this.defaultPrice = defaultPrice;
    }
    
}
