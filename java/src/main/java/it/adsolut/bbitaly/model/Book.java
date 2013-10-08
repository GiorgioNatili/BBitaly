/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.model;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.OneToOne;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import java.util.Date;
import javax.persistence.Column;
import org.hibernate.annotations.SQLDelete;
import org.hibernate.annotations.Where;

/**
 *
 * @author marcello
 */

@Entity(name = "Book")
@SQLDelete(sql="UPDATE book SET deleted = true WHERE id = ?")
@Where(clause="deleted is null")
public class Book {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;
    
    @Column(nullable=false)
    @Temporal(TemporalType.DATE)
    private Date dateStart;
    
    @Column(nullable=false)
    @Temporal(TemporalType.DATE)
    private Date dateEnd;
    
    @OneToOne
    private BedBreakfast bedBreakfast;
    
    @OneToOne
    private Room room;
    
    @OneToOne
    private User user;
    
    @OneToOne
    private BookDetail bookDetail;
    
    private Float price;
    
    private Boolean deleted;
    
    private Boolean active;

    public BedBreakfast getBedBreakfast() {
        return bedBreakfast;
    }

    public void setBedBreakfast(BedBreakfast bedBreakfast) {
        this.bedBreakfast = bedBreakfast;
    }

    public BookDetail getBookDetail() {
        return bookDetail;
    }

    public void setBookDetail(BookDetail bookDetail) {
        this.bookDetail = bookDetail;
    }

    public Date getDateEnd() {
        return dateEnd;
    }

    public void setDateEnd(Date dateEnd) {
        this.dateEnd = dateEnd;
    }

    public Date getDateStart() {
        return dateStart;
    }

    public void setDateStart(Date dateStart) {
        this.dateStart = dateStart;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Float getPrice() {
        return price;
    }

    public void setPrice(Float price) {
        this.price = price;
    }

    public Room getRoom() {
        return room;
    }

    public void setRoom(Room room) {
        this.room = room;
    }

    public User getUser() {
        return user;
    }

    public void setUser(User user) {
        this.user = user;
    }
    
    public Boolean getDeleted() {
        return deleted;
    }

    public void setDeleted(Boolean deleted) {
        this.deleted = deleted;
    }

    public Boolean getActive() {
        return active;
    }

    public void setActive(Boolean active) {
        this.active = active;
    }
    
}
