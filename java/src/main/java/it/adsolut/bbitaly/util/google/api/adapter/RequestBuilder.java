/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.util.google.api.adapter;

import it.adsolut.bbitaly.util.google.api.Coordinate;
import it.adsolut.bbitaly.util.google.api.Radius;
import it.adsolut.bbitaly.util.google.api.Types;

/**
 *
 * @author marcello
 */
public interface RequestBuilder {
    public void setEndpoint(String endpoint);
    public void setKey(String key);
    public void setLocation(Coordinate location);
    public void setRadius(Radius radius);
    public void setSensor(String sensor);
    public void setTypes(Types types);
    public String buildRequest();
}
