/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.util.google.api;

import it.adsolut.bbitaly.util.google.GeocodeData;
import it.adsolut.bbitaly.util.google.api.adapter.DataUnmarshaller;
import it.adsolut.bbitaly.util.google.api.adapter.RequestExecuter;
import it.adsolut.bbitaly.util.string.Replace;

/**
 *
 * @author marcello
 */
public class GeocodeClientImpl implements GeocodeClient{

    private String address;
    
    private String sensor;

    private DataUnmarshaller<GeocodeData> unmarshaller;
    
    private String endpoint;
    
    private RequestExecuter requestExecuter;
    
    public String getAddress() {
        return address;
    }

    @Override
    public void setAddress(String address) {
        this.address = address;
    }

    public String getSensor() {
        return sensor;
    }

    @Override
    public void setSensor(String sensor) {
        this.sensor = sensor;
    }

    public void setEndpoint(String endpoint) {
        this.endpoint = endpoint;
    }
    
    public void setUnmarshaller(DataUnmarshaller<GeocodeData> unmarshaller) {
        this.unmarshaller = unmarshaller;
    }

    public void setRequestExecuter(RequestExecuter requestExecuter) {
        this.requestExecuter = requestExecuter;
    }
    
    @Override
    public GeocodeData getResponse() throws Exception {
        address = Replace.replace(" ", "+", address);
        String uri = endpoint+"?address="+address+"&sensor="+sensor+"&language=it";
        String response = requestExecuter.execute(uri);
        return unmarshaller.unmarshal(response);
    }
    
}
