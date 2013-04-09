package it.adsolut.bbitaly.response.vo;

/**
 *
 * @author marcello
 */
public class BookDetail {
    private Long id;
    
    private String accomodationName;
    
    private String roomName;
    
    private String facilityList;
    
    private String policyList;

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
    
}
