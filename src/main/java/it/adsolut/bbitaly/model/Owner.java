/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.model;

import javax.persistence.AttributeOverride;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.OneToOne;
import org.hibernate.annotations.SQLDelete;
import org.hibernate.annotations.Where;

/**
 *
 * @author marcello
 */
@Entity(name = "Owner")
@SQLDelete(sql="UPDATE Owner SET deleted = true WHERE id = ?")
@Where(clause="deleted is null")
public class Owner extends User {

    private String address;
    @Column(name="active",insertable=false, updatable=false)
    private Boolean active = Boolean.TRUE;
    @OneToOne
    private City city;
    
    private String phonenumber;
    

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public City getCity() {
        return city;
    }

    public void setCity(City city) {
        this.city = city;
    }

    public Boolean getActive() {
        return active;
    }

    public void setActive(Boolean active) {
        this.active = active;
    }

    public String getPhonenumber() {
        return phonenumber;
    }

    public void setPhonenumber(String phonenumber) {
        this.phonenumber = phonenumber;
    }
    
}
