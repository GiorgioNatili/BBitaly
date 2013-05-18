/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.Request.FacilityGetRequest;
import it.adsolut.bbitaly.dao.FacilityDao;
import it.adsolut.bbitaly.model.Facility;
import it.adsolut.bbitaly.response.FacilityListResponse;
import it.adsolut.bbitaly.service.Interface.FacilityControllerService;
import java.util.ArrayList;
import java.util.HashSet;
import java.util.List;
import java.util.Set;

/**
 *
 * @author marcello
 */
public class FacilityServiceImpl extends TranslatableService implements FacilityService, FacilityControllerService{

    private FacilityDao facilityDao;

    public void setFacilityDao(FacilityDao facilityDao) {
        this.facilityDao = facilityDao;
    }
    
    @Override
    public Facility getById(Long facilitiesId) {
        return facilityDao.findById(facilitiesId);
    }

    @Override
    public Set<Facility> getFacilities(List<Long> facilitiesIds) {
        Set<Facility> set = new HashSet<Facility>();
        for (Long facilitiesId : facilitiesIds) {
            Facility facility = getById(facilitiesId);
            if (facility != null) {
                set.add(facility);
            }
        }
        return set;
    }

    @Override
    public List<Facility> getAll() {
        return facilityDao.get();
    }

    @Override
    public FacilityListResponse getAll(FacilityGetRequest facilityGetAllRequest, FacilityListResponse facilityResponse) {
        facilityResponse.setData(this.getAll());
        return facilityResponse;
    }
    
}
