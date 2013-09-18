/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.util.google.api.adapter;

import com.google.gson.Gson;
import it.adsolut.bbitaly.util.google.GeocodeData;

/**
 *
 * @author marcello
 */
public class JsonGeocodeDataMarshallerImpl implements DataUnmarshaller<GeocodeData> {

    private Gson gson;

    public Gson getGson() {
        return gson;
    }

    public void setGson(Gson gson) {
        this.gson = gson;
    }

    @Override
    public GeocodeData unmarshal(String json) {
        return gson.fromJson(json, GeocodeData.class);
    }
    
}
