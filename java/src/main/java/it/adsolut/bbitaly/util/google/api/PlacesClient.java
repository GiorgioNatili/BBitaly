/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.util.google.api;

import it.adsolut.bbitaly.util.google.PlaceData;

/**
 *
 * @author marcello
 */
public interface PlacesClient {
    public void setSensor(String sensor);
    public void setLocation(Coordinate location);
    public void setRadius(Radius radius);
    public void setTypes(Types types);
    public PlaceData getResponse() throws Exception;
}
