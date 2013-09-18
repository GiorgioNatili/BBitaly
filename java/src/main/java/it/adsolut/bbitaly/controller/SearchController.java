/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.controller;

import it.adsolut.bbitaly.Request.BbSearchByCityRequest;
import it.adsolut.bbitaly.Request.BbSearchByCoordsRequest;
import it.adsolut.bbitaly.Request.BbSearchByIdsRequest;
import it.adsolut.bbitaly.Request.BbSearchByPoiRequest;
import it.adsolut.bbitaly.Request.BbSearchByRegionRequest;
import it.adsolut.bbitaly.Request.SearchRequest;
import it.adsolut.bbitaly.response.BbListResponse;
import it.adsolut.bbitaly.response.SearchResponse;
import it.adsolut.bbitaly.service.Interface.SearchControllerService;
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
@RequestMapping(value = "/search", method = RequestMethod.GET)
public class SearchController {
    
    @Resource(name = "dozermapper")
    protected DozerBeanMapper dozermapper;
    
    @Resource(name = "searchservice")
    protected SearchControllerService searchService;
    
    @RequestMapping(value = "/semantic", method = RequestMethod.GET)
    public @ResponseBody 
    SearchResponse searchPoi(@Valid SearchRequest searchRequest, 
            BindingResult results,
            ModelMap map) {
        SearchResponse searchResponse = new SearchResponse(dozermapper);
        if (!results.hasErrors()) {
            searchResponse = searchService.search(searchRequest, searchResponse);
        } else {
            searchResponse.addError(results.getAllErrors());
        }
        return searchResponse;
    }
    
    @RequestMapping(value = "/bycity", method = RequestMethod.GET)
    public @ResponseBody 
    BbListResponse searchbycity(@Valid BbSearchByCityRequest searchRequest, 
            BindingResult results,
            ModelMap map) {
        BbListResponse searchResponse = new BbListResponse(dozermapper);
        if (!results.hasErrors()) {
            searchResponse = searchService.searchByCity(searchRequest, searchResponse);
        } else {
            searchResponse.addError(results.getAllErrors());
        }
        return searchResponse;
    }
    
    @RequestMapping(value = "/byregion", method = RequestMethod.GET)
    public @ResponseBody 
    BbListResponse searchbyregion(@Valid BbSearchByRegionRequest searchRequest, 
            BindingResult results,
            ModelMap map) {
        BbListResponse searchResponse = new BbListResponse(dozermapper);
        if (!results.hasErrors()) {
            searchResponse = searchService.searchByRegion(searchRequest, searchResponse);
        } else {
            searchResponse.addError(results.getAllErrors());
        }
        return searchResponse;
    }
    
    @RequestMapping(value = "/bypoi", method = RequestMethod.GET)
    public @ResponseBody 
    BbListResponse searchbyregion(@Valid BbSearchByPoiRequest searchRequest, 
            BindingResult results,
            ModelMap map) {
        BbListResponse searchResponse = new BbListResponse(dozermapper);
        if (!results.hasErrors()) {
            searchResponse = searchService.searchByPoi(searchRequest, searchResponse);
        } else {
            searchResponse.addError(results.getAllErrors());
        }
        return searchResponse;
    }
    
    @RequestMapping(value = "/bycoords", method = RequestMethod.GET)
    public @ResponseBody 
    BbListResponse searchbycoords(@Valid BbSearchByCoordsRequest searchRequest, 
            BindingResult results,
            ModelMap map) {
        BbListResponse searchResponse = new BbListResponse(dozermapper);
        if (!results.hasErrors()) {
            searchResponse = searchService.searchByCoords(searchRequest, searchResponse);
        } else {
            searchResponse.addError(results.getAllErrors());
        }
        return searchResponse;
    }
    
    @RequestMapping(value = "/byids", method = RequestMethod.GET)
    public @ResponseBody 
    BbListResponse searchbyids(@Valid BbSearchByIdsRequest searchRequest, 
            BindingResult results,
            ModelMap map) {
        BbListResponse searchResponse = new BbListResponse(dozermapper);
        if (!results.hasErrors()) {
            searchResponse = searchService.searchByIds(searchRequest, searchResponse);
        } else {
            searchResponse.addError(results.getAllErrors());
        }
        return searchResponse;
    }
    
    
}
