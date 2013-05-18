/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.model;

import java.util.Date;
import java.util.Set;
import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToMany;
import javax.persistence.OneToMany;
import javax.persistence.OneToOne;
import javax.persistence.PrePersist;
import javax.persistence.Temporal;
import org.hibernate.annotations.Generated;
import org.hibernate.annotations.GenerationTime;
import org.hibernate.annotations.SQLDelete;
import org.hibernate.annotations.Where;
import org.hibernate.search.annotations.DocumentId;
import org.hibernate.search.annotations.Field;
import org.hibernate.search.annotations.Indexed;

/**
 *
 * @author marcello
 */
@Entity(name = "bb")
@SQLDelete(sql = "UPDATE bb SET deleted = true WHERE id = ?")
@Where(clause = "deleted is null")
@Indexed
public class BedBreakfast {

    @Id
    @DocumentId
    private String id;
    
    @Field(name="name")
    private String name;
    
    @Field
    @Column(nullable = false, columnDefinition = "Float(10,6)")
    private Float latitude;
    
    @Field
    @Column(nullable = false, columnDefinition = "Float(10,6)")
    private Float longitude;
    
    @Column(length = 50, nullable = false)
    private String assignedname;
    
    @Column(length = 50, nullable = false)
    private String phone;
    
    @Column(length = 50, nullable = false)
    private String contactemail;
    
    private String type;
    
    private Integer rank = 0;
    
    private String checkin;
    
    private String checkout;
    
    private String photo;
    
    @Field
    private Boolean active = Boolean.TRUE;
    
    @Column(nullable = false)
    private String address;
    
    @OneToOne
    private City city;
    
    @OneToOne
    private Owner owner;
    
    @ManyToMany(fetch = FetchType.EAGER)
    @JoinColumn(nullable = true)
    private Set<Facility> facility;
    
    @ManyToMany(fetch = FetchType.EAGER)
    @JoinColumn(nullable = true)
    private Set<Policy> policy;
    
    @OneToMany(fetch = FetchType.EAGER, cascade = {CascadeType.REMOVE})
    private Set<BbTranslation> description;
    
    @Field
    private Boolean deleted;
    
    @Column(insertable=false, updatable=false, columnDefinition="timestamp default current_timestamp")
    @Generated(value=GenerationTime.INSERT)
    @Temporal(javax.persistence.TemporalType.DATE)
    private Date created;
    
    @Generated(value=GenerationTime.ALWAYS)
    @Temporal(javax.persistence.TemporalType.DATE)
    private Date updated;

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getAssignedname() {
        return assignedname;
    }

    public void setAssignedname(String assignedname) {
        this.assignedname = assignedname;
    }

    public String getContactemail() {
        return contactemail;
    }

    public void setContactemail(String contactemail) {
        this.contactemail = contactemail;
    }

    public String getPhone() {
        return phone;
    }

    public void setPhone(String phone) {
        this.phone = phone;
    }

    public Integer getRank() {
        return rank;
    }

    public void setRank(Integer rank) {
        this.rank = rank;
    }

    public Owner getOwner() {
        return owner;
    }

    public void setOwner(Owner owner) {
        this.owner = owner;
    }

    public Set<Policy> getPolicy() {
        return policy;
    }

    public void setPolicy(Set<Policy> policy) {
        this.policy = policy;
    }

    public String getCheckin() {
        return checkin;
    }

    public void setCheckin(String checkin) {
        this.checkin = checkin;
    }

    public String getCheckout() {
        return checkout;
    }

    public void setCheckout(String checkout) {
        this.checkout = checkout;
    }

    public Set<Facility> getFacility() {
        return facility;
    }

    public void setFacility(Set<Facility> facility) {
        this.facility = facility;
    }

    public String getPhoto() {
        return photo;
    }

    public void setPhoto(String photo) {
        this.photo = photo;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }

    public Boolean getActive() {
        return active;
    }

    public void setActive(Boolean active) {
        this.active = active;
    }

    public Set<BbTranslation> getDescription() {
        return description;
    }

    public void setDescription(Set<BbTranslation> description) {
        this.description = description;
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public Float getLatitude() {
        return latitude;
    }

    public void setLatitude(Float latitude) {
        this.latitude = latitude;
    }

    public Float getLongitude() {
        return longitude;
    }

    public void setLongitude(Float longitude) {
        this.longitude = longitude;
    }

    public City getCity() {
        return city;
    }

    public void setCity(City city) {
        this.city = city;
    }

    public Boolean getDeleted() {
        return deleted;
    }

    public void setDeleted(Boolean deleted) {
        this.deleted = deleted;
    }

    @PrePersist
    protected void onCreate() {
        this.created = new Date();
    }
}
