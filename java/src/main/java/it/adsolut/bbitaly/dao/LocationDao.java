/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.City;
import it.adsolut.bbitaly.model.Location;
import it.adsolut.bbitaly.model.Region;
import java.util.List;

/**
 *
 * @author marcello
 */
public interface LocationDao {

    public Location find(String id);

    public Location findByName(String name);
    
    public void persist(Location location);
    
    public List <Location> fastPoiSearch(String name);
    
    public List<Region> fastRegionSearch(String name);
    
    public List<City> fastCitySearch(String name);
}
