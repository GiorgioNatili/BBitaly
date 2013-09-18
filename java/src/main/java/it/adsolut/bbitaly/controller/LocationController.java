/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.controller;

import it.adsolut.bbitaly.Request.CityGetRequest;
import it.adsolut.bbitaly.Request.CountryGetRequest;
import it.adsolut.bbitaly.Request.RegionGetRequest;
import it.adsolut.bbitaly.model.Country;
import it.adsolut.bbitaly.response.CityListResponse;
import it.adsolut.bbitaly.response.CountryListResponse;
import it.adsolut.bbitaly.response.RegionListResponse;
import it.adsolut.bbitaly.service.Interface.LocationControllerService;
import javax.annotation.Resource;
import javax.validation.Valid;
import org.dozer.DozerBeanMapper;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.ResponseBody;

/**
 *
 * @author marcello
 */
@Controller
@RequestMapping(value = "/location")
public class LocationController {
    
    @Resource(name = "locationservice")
    private LocationControllerService locationService;
    
    @Resource(name = "dozermapper")
    protected DozerBeanMapper dozermapper;
    
    @RequestMapping(value = "/country", method = RequestMethod.GET)
    public @ResponseBody 
    CountryListResponse getcountry(@Valid CountryGetRequest countryget, 
            BindingResult results,
            ModelMap map) {
        CountryListResponse countryGetResponse = new CountryListResponse(dozermapper);
        if (!results.hasErrors()) {
            countryGetResponse = locationService.getCountry(countryget, countryGetResponse);
        } else {
            countryGetResponse.addError(results.getAllErrors());
        }
        return countryGetResponse;
    }
    
    @RequestMapping(value = "/region", method = RequestMethod.GET)
    public @ResponseBody 
    RegionListResponse getregion(@Valid RegionGetRequest regionget, 
            BindingResult results,
            ModelMap map) {
        RegionListResponse regionGetResponse = new RegionListResponse(dozermapper);
        if (!results.hasErrors()) {
            regionGetResponse = locationService.getRegion(regionget, regionGetResponse);
        } else {
            regionGetResponse.addError(results.getAllErrors());
        }
        return regionGetResponse;
    }
    
    @RequestMapping(value = "/city", method = RequestMethod.GET)
    public @ResponseBody 
    CityListResponse getcity(@Valid CityGetRequest cityget, 
            BindingResult results,
            ModelMap map) {
        CityListResponse cityGetResponse = new CityListResponse(dozermapper);
        if (!results.hasErrors()) {
            cityGetResponse = locationService.getCity(cityget, cityGetResponse);
        } else {
            cityGetResponse.addError(results.getAllErrors());
        }
        return cityGetResponse;
    }
}
