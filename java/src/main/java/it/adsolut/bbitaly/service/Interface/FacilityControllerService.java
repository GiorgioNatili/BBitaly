/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service.Interface;

import it.adsolut.bbitaly.Request.FacilityGetRequest;
import it.adsolut.bbitaly.Request.PolicyGetRequest;
import it.adsolut.bbitaly.response.FacilityListResponse;
import it.adsolut.bbitaly.response.PolicyListResponse;

/**
 *
 * @author marcello
 */
public interface FacilityControllerService {
    public FacilityListResponse getAll(FacilityGetRequest facilityGetAllRequest, FacilityListResponse facilityResponse);
}
