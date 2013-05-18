/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.Facility;
import java.util.List;

/**
 *
 * @author marcello
 */
public interface FacilityDao {
    public List<Facility> get();
    public Facility findById(Long id);
    public void persist(Facility facility);
}
