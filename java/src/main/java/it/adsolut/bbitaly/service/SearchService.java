/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.model.BedBreakfast;
import it.adsolut.bbitaly.model.City;
import it.adsolut.bbitaly.model.Location;
import it.adsolut.bbitaly.model.Region;
import java.util.Date;
import java.util.List;

/**
 *
 * @author marcello
 */
public interface SearchService {
    
    public List<Region> fastRegionSearch(String name);
    
    public List<City> fastCitySearch(String name);
    
    public List<Location> fastPoiSearch(String name);
    
    public List<BedBreakfast> fastBbSearch(String name, Date dateStart, Date dateEnd);
}
