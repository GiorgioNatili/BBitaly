/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.City;
import it.adsolut.bbitaly.model.Region;
import java.util.List;

/**
 *
 * @author marcello
 */
public interface CityDao {
    public void persist(City city);
    public List<City> findByName(String name);
    public List<City> findByRegion(Region region);
    public City find(Long id);
}
