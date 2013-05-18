/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.util.google.api;

import it.adsolut.bbitaly.util.google.api.adapter.RequestBuilderImpl;
import it.adsolut.bbitaly.util.google.api.adapter.RequestExecuter;
import it.adsolut.bbitaly.util.google.api.adapter.DataUnmarshaller;
import it.adsolut.bbitaly.util.google.PlaceData;

/**
 *
 * @author marcello
 */
public class PlacesClientImpl implements PlacesClient {

    private String key = "AIzaSyChKmkEO_cPNrA9QUSLV6RC_4XpvP5B0pY";
    private String endpoint = "https://maps.googleapis.com/maps/api/place/search/json";
    private Coordinate location;
    private Radius radius;
    private Types types;
    private String sensor = "false";
    private DataUnmarshaller<PlaceData> unmarshaller;
    private RequestBuilderImpl requestBuilder;
    private RequestExecuter requestExecuter;

    public void setRequestBuilder(RequestBuilderImpl requestBuilder) {
        this.requestBuilder = requestBuilder;
    }

    public void setRequestExecuter(RequestExecuter requestExecuter) {
        this.requestExecuter = requestExecuter;
    }

    public void setUnmarshaller(DataUnmarshaller unmarshaller) {
        this.unmarshaller = unmarshaller;
    }

    public void setEndpoint(String endpoint) {
        this.endpoint = endpoint;
    }

    public void setKey(String key) {
        this.key = key;
    }

    @Override
    public void setSensor(String sensor) {
        this.sensor = sensor;
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
    public void setTypes(Types types) {
        this.types = types;
    }

    @Override
    public PlaceData getResponse() throws Exception {
        requestBuilder.setEndpoint(endpoint);
        requestBuilder.setKey(key);
        requestBuilder.setLocation(location);
        requestBuilder.setSensor(sensor);
        requestBuilder.setRadius(radius);
        requestBuilder.setTypes(types);
        String request = requestBuilder.buildRequest();
        String response = requestExecuter.execute(request);
        return unmarshaller.unmarshal(response);
    }
}
