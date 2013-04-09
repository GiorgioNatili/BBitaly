package it.adsolut.bbitaly.model;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import org.hibernate.annotations.SQLDelete;
import org.hibernate.annotations.Where;

/**
 *
 * @author marcello
 */
@Entity(name = "BookDetail")
@SQLDelete(sql="UPDATE bookdetail SET deleted = true WHERE id = ?")
@Where(clause="deleted is null")
public class BookDetail {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;
    
    private String accomodationName;
    
    private String roomName;
    
    private String facilityList;
    
    private String policyList;
    
    private Integer person = 1;
    
    private Boolean deleted;

    public String getAccomodationName() {
        return accomodationName;
    }

    public void setAccomodationName(String accomodationName) {
        this.accomodationName = accomodationName;
    }

    public String getFacilityList() {
        return facilityList;
    }

    public void setFacilityList(String facilityList) {
        this.facilityList = facilityList;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getPolicyList() {
        return policyList;
    }

    public void setPolicyList(String policyList) {
        this.policyList = policyList;
    }

    public String getRoomName() {
        return roomName;
    }

    public void setRoomName(String roomName) {
        this.roomName = roomName;
    }

    public Integer getPerson() {
        return person;
    }

    public void setPerson(Integer person) {
        this.person = person;
    }
    
    public Boolean getDeleted() {
        return deleted;
    }

    public void setDeleted(Boolean deleted) {
        this.deleted = deleted;
    }
}
