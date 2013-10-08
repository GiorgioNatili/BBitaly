/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service.Interface;

import it.adsolut.bbitaly.Request.CityGetRequest;
import it.adsolut.bbitaly.Request.CountryGetRequest;
import it.adsolut.bbitaly.Request.RegionGetRequest;
import it.adsolut.bbitaly.response.CityListResponse;
import it.adsolut.bbitaly.response.CountryListResponse;
import it.adsolut.bbitaly.response.RegionListResponse;

/**
 *
 * @author marcello
 */
public interface LocationControllerService {
    public CountryListResponse getCountry(CountryGetRequest CountryGetRequest, CountryListResponse countryListResponse);
    public RegionListResponse getRegion(RegionGetRequest regionGetRequest, RegionListResponse regionListResponse);
    public CityListResponse getCity(CityGetRequest cityGetRequest, CityListResponse cityListResponse);
}
