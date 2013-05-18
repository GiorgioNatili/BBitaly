/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.model.City;
import it.adsolut.bbitaly.model.Location;
import it.adsolut.bbitaly.model.Region;
import it.adsolut.bbitaly.util.google.PlaceResult;
import it.adsolut.bbitaly.util.google.api.Coordinate;
import java.util.List;

/**
 *
 * @author marcello
 */
public interface LocationService {
    public Location get(String id);
    public List<PlaceResult> searchNearbyPoi(String city, String address) throws Exception;
    public Coordinate searchCoordByAddress(String city, String address) throws Exception;
    public List<City> searchCity(String name) throws Exception;
    public List<Region> fastRegionSearch(String name);
    public List<City> fastCitySearch(String name);
    public List<Location> fastPoiSearch(String name);
}
