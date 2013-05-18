/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.util.google.api;

import it.adsolut.bbitaly.util.google.GeocodeData;

/**
 *
 * @author marcello
 */
public interface GeocodeClient {
    public void setAddress(String address);
    public void setSensor(String true_or_false);
    public GeocodeData getResponse() throws Exception; 
}
