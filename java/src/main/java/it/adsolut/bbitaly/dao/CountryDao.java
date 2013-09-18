/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.Country;
import java.util.List;

/**
 *
 * @author marcello
 */
public interface CountryDao {
    public Country find(Long id);
    public void persist(Country country);
    public List<Country> getAll();
    public Country findByPrefix(String lang);
}
