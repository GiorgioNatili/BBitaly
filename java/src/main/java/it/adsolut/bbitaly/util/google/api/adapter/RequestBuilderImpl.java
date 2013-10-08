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
public class RequestBuilderImpl implements RequestBuilder{
    
    private String key = "AIzaSyChKmkEO_cPNrA9QUSLV6RC_4XpvP5B0pY";
    
    private String endpoint = "https://maps.googleapis.com/maps/api/place/search/json";

    private Coordinate location;
    
    private Radius radius;
    
    private Types types;
    
    private String sensor = "false";

    @Override
    public void setEndpoint(String endpoint) {
        this.endpoint = endpoint;
    }

    @Override
    public void setKey(String key) {
        this.key = key;
    }

    @Override
    public void setLocation(Coordinate location) {
        this.location = location;
    }

    @Override
    public void setRadius(Radius radius) {
        this.radius = radius;
    }

    @Override
    public void setSensor(String sensor) {
        this.sensor = sensor;
    }

    @Override
    public void setTypes(Types types) {
        this.types = types;
    }
    
    @Override
    public String buildRequest() {
        return endpoint + "?location="+location.getLatitude()+","+location.getLongitude()+"&radius="+radius.getRadius()+"&sensor="+sensor+"&key="+key+"&languate=it";
    }
    
}
