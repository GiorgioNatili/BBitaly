/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.util.google.api.adapter;

import com.google.gson.Gson;
import it.adsolut.bbitaly.util.google.PlaceData;

/**
 *
 * @author marcello
 */
public class JsonPlacesDataMarshallerImpl implements DataUnmarshaller<PlaceData>{

    private Gson gson;

    public Gson getGson() {
        return gson;
    }

    public void setGson(Gson gson) {
        this.gson = gson;
    }

    @Override
    public PlaceData unmarshal(String json) {
        return gson.fromJson(json, PlaceData.class);
    }
}
