/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.model.Facility;
import java.util.List;
import java.util.Set;

/**
 *
 * @author marcello
 */
public interface FacilityService {
    public Facility getById(Long facilitiesId);
    public Set<Facility> getFacilities(List<Long> facilitiesIds);
    public List<Facility> getAll();
}
