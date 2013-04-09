/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.Country;
import it.adsolut.bbitaly.model.Region;
import java.util.List;

/**
 *
 * @author marcello
 */
public interface RegionDao {
    public Region find(Long id);
    public Region findByName(String name);
    public List<Region> getAllByCountry(Country country);
    public void persist(Region region);
}
