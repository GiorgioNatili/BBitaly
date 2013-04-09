/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.NotCityExist;
import it.adsolut.bbitaly.Request.Validator.OwnerExist;
import it.adsolut.bbitaly.exception.Code;
import javax.validation.constraints.NotNull;
import org.hibernate.validator.constraints.NotEmpty;

/**
 *
 * @author marcello
 */
public class OwnerUpdateRequest extends SignedRequest {

    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @OwnerExist(message=Code.Owner.NOT_FOUND)
    private Long ownerid;
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @NotEmpty(message=Code.Sintax.REQUEST_NOT_VALID)
    private String bbname;
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @NotEmpty(message=Code.Sintax.REQUEST_NOT_VALID)
    private String surname;
    
    private String password;
    
    private String phonenumber;
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @NotEmpty(message=Code.Sintax.REQUEST_NOT_VALID)
    private String email;
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @NotEmpty(message=Code.Sintax.REQUEST_NOT_VALID)
    private String address;
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @NotCityExist(message=Code.Location.NOT_REGION_EXIST)
    private Long admLev1;

    public Long getOwnerid() {
        return ownerid;
    }

    public void setOwnerid(Long ownerid) {
        this.ownerid = ownerid;
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public Long getAdmLev1() {
        return admLev1;
    }

    public void setAdmLev1(Long admLev1) {
        this.admLev1 = admLev1;
    }

    public String getBbname() {
        return bbname;
    }

    public void setBbname(String bbname) {
        this.bbname = bbname;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getSurname() {
        return surname;
    }

    public void setSurname(String surname) {
        this.surname = surname;
    }

    public String getPhonenumber() {
        return phonenumber;
    }

    public void setPhonenumber(String phonenumber) {
        this.phonenumber = phonenumber;
    }
    
}
