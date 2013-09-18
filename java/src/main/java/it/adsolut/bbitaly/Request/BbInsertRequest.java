/*
 * To change this template; choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.LangExist;
import it.adsolut.bbitaly.Request.Validator.NotCityExist;
import it.adsolut.bbitaly.Request.Validator.OwnerExist;
import it.adsolut.bbitaly.exception.Code;
import java.util.List;
import javax.validation.constraints.NotNull;
import org.hibernate.validator.constraints.Email;
import org.hibernate.validator.constraints.NotBlank;
import org.hibernate.validator.constraints.NotEmpty;

/**
 *
 * @author marcello
 */
public class BbInsertRequest extends SignedRequest {

    @NotNull(message=Code.Bb.NO_PROPERTY_NAME_SPECIFIED)
    @NotEmpty(message=Code.Bb.NO_PROPERTY_NAME_SPECIFIED)
    private String propertytname;
    
    @NotNull(message=Code.Bb.NO_TYPE_SPECIFIED)
    @NotEmpty(message=Code.Bb.NO_TYPE_SPECIFIED)
    private String type;
            
    @NotNull(message=Code.Bb.NO_ASSIGNED_SPECIFIED)
    @NotEmpty(message=Code.Bb.NO_ASSIGNED_SPECIFIED)
    private String assignedname;
            
    @NotNull(message=Code.Bb.NO_PHONENUMBER_SPECIFIED)
    @NotEmpty(message=Code.Bb.NO_PHONENUMBER_SPECIFIED)
    private String phonenumber;
            
    @NotNull(message=Code.Bb.NO_PERSONALEMAIL_SPECIFIED)
    @NotEmpty(message=Code.Bb.NO_PERSONALEMAIL_SPECIFIED)
    @Email(message=Code.Bb.EMAIL_NOT_VALID)
    private String personalemail;
            
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @NotEmpty(message=Code.Sintax.REQUEST_NOT_VALID)
    private List<Long> facilitiesId;
            
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @NotEmpty(message=Code.Sintax.REQUEST_NOT_VALID)
    private List<Long> policiesId;
            
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    private Boolean directContact;
            
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @OwnerExist(message=Code.Owner.NOT_FOUND)
    private Long ownerid;
            
    @NotNull(message=Code.Bb.NO_DESCRIPTION_SPECIFIED)
    @NotBlank(message=Code.Bb.NO_DESCRIPTION_SPECIFIED)
    @NotEmpty(message=Code.Bb.NO_DESCRIPTION_SPECIFIED)
    private String description;

    @NotNull(message=Code.Bb.NOT_VALID_ADDRESS)
    @NotBlank(message=Code.Bb.NOT_VALID_ADDRESS)
    @NotEmpty(message=Code.Bb.NOT_VALID_ADDRESS)
    private String address;
    
    @NotNull(message=Code.Location.NOT_REGION_EXIST)
    @NotCityExist(message=Code.Location.NOT_REGION_EXIST)
    private Long cityid;
    
    @NotNull(message=Code.Bb.NO_LANG_SPECIFIED)
    @LangExist(message=Code.Translation.ISO_NOT_EXIST)
    @NotEmpty(message=Code.Bb.NO_LANG_SPECIFIED)
    private String lang;

    public String getAssignedname() {
        return assignedname;
    }

    public void setAssignedname(String assignedname) {
        this.assignedname = assignedname;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public Boolean getDirectContact() {
        return directContact;
    }

    public void setDirectContact(Boolean directContact) {
        this.directContact = directContact;
    }
    
    public List<Long> getFacilitiesId() {
        return facilitiesId;
    }

    public void setFacilitiesId(List<Long> facilitiesId) {
        this.facilitiesId = facilitiesId;
    }

    public String getLang() {
        return lang;
    }

    public void setLang(String lang) {
        this.lang = lang;
    }

    public Long getOwnerid() {
        return ownerid;
    }

    public void setOwnerid(Long ownerid) {
        this.ownerid = ownerid;
    }

    public String getPersonalemail() {
        return personalemail;
    }

    public void setPersonalemail(String personalemail) {
        this.personalemail = personalemail;
    }

    public String getPhonenumber() {
        return phonenumber;
    }

    public void setPhonenumber(String phonenumber) {
        this.phonenumber = phonenumber;
    }

    public List<Long> getPoliciesId() {
        return policiesId;
    }

    public void setPoliciesId(List<Long> policiesId) {
        this.policiesId = policiesId;
    }

    public String getPropertytname() {
        return propertytname;
    }

    public void setPropertytname(String propertytname) {
        this.propertytname = propertytname;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public Long getCityid() {
        return cityid;
    }

    public void setCityid(Long cityid) {
        this.cityid = cityid;
    }
    
}
