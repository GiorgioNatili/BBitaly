/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.model.City;
import it.adsolut.bbitaly.model.Country;
import it.adsolut.bbitaly.model.Region;
import java.util.List;

/**
 *
 * @author marcello
 */
public interface L10nService {
    public Country findCountry(Country country);
    public Region findRegion(Region region);
    public City findCity(City city);
    public List<Region> get();
}
