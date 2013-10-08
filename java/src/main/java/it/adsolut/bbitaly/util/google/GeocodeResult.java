/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.util.google;

import java.util.List;

/**
 *
 * @author marcello
 */
public class GeocodeResult {
    
    private Geometry geometry;
    
    private String formatted_address;
    
    private List<String> types;

    private List<Item> address_components;

    public List<Item> getAddress_components() {
        return address_components;
    }

    public void setAddress_components(List<Item> address_components) {
        this.address_components = address_components;
    }

    public String getFormatted_address() {
        return formatted_address;
    }

    public void setFormatted_address(String formatted_address) {
        this.formatted_address = formatted_address;
    }
    
    public String getFormattedAddress() {
        return formatted_address;
    }

    public void setFormattedAddress(String formatted_address) {
        this.formatted_address = formatted_address;
    }
    
    public String getAddress() {
        return formatted_address;
    }

    public void setAddress(String formatted_address) {
        this.formatted_address = formatted_address;
    }

    public Geometry getGeometry() {
        return geometry;
    }

    public void setGeometry(Geometry geometry) {
        this.geometry = geometry;
    }

    public List<String> getTypes() {
        return types;
    }

    public void setTypes(List<String> types) {
        this.types = types;
    }
}
