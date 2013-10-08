/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.Request.BbSearchByCityRequest;
import it.adsolut.bbitaly.Request.BbSearchByCoordsRequest;
import it.adsolut.bbitaly.Request.BbSearchByIdsRequest;
import it.adsolut.bbitaly.Request.BbSearchByPoiRequest;
import it.adsolut.bbitaly.Request.BbSearchByRegionRequest;
import it.adsolut.bbitaly.Request.SearchRequest;
import it.adsolut.bbitaly.model.BedBreakfast;
import it.adsolut.bbitaly.model.City;
import it.adsolut.bbitaly.model.Location;
import it.adsolut.bbitaly.model.Region;
import it.adsolut.bbitaly.response.BbListResponse;
import it.adsolut.bbitaly.response.SearchResponse;
import it.adsolut.bbitaly.service.Interface.SearchControllerService;
import java.util.Date;
import java.util.List;

/**
 *
 * @author marcello
 */
public class SearchServiceImpl implements SearchService, SearchControllerService {

    private LocationService locationService;
    private BbService bbService;

    public void setLocationService(LocationService locationService) {
        this.locationService = locationService;
    }

    public void setBbService(BbService bbService) {
        this.bbService = bbService;
    }

    @Override
    public List<Region> fastRegionSearch(String name) {
        return locationService.fastRegionSearch(name);
    }

    @Override
    public List<City> fastCitySearch(String name) {
        return locationService.fastCitySearch(name);
    }

    @Override
    public List<Location> fastPoiSearch(String name) {
        return locationService.fastPoiSearch(name);
    }

    @Override
    public List<BedBreakfast> fastBbSearch(String name, Date dateStart, Date dateEnd) {
        return bbService.fastBbSearch(name,dateStart,dateEnd);
    }

    @Override
    public SearchResponse search(SearchRequest searchRequest, SearchResponse searchResponse) {
        System.out.println("-------------------------------------------------");
        System.out.println("start: "+searchRequest.getStart().toString() +" - end:"+searchRequest.getEnd().toString());
        System.out.println("-------------------------------------------------");
        List<Region> regions = fastRegionSearch(searchRequest.getName());
        List<City> cities = fastCitySearch(searchRequest.getName());
        List<Location> location = fastPoiSearch(searchRequest.getName());
        List<BedBreakfast> bbs = fastBbSearch(searchRequest.getName(),searchRequest.getStart(),searchRequest.getEnd());
        System.out.println("-------------------------------------------------");
        System.out.println("LUNGHEZZA: " + bbs.size());
        System.out.println("-------------------------------------------------");
        searchResponse.setBbs(bbs);
        searchResponse.setCities(cities);
        searchResponse.setRegions(regions);
        searchResponse.setPois(location);
        return searchResponse;
    }

    @Override
    public BbListResponse searchByCity(BbSearchByCityRequest bbSearchByCityRequest, BbListResponse bbSearchResponse) {
        bbSearchResponse.setData(bbService.searchByCity(bbSearchByCityRequest.getId(),
                bbSearchByCityRequest.getStart(),
                bbSearchByCityRequest.getEnd()));
        return bbSearchResponse;
    }

    @Override
    public BbListResponse searchByRegion(BbSearchByRegionRequest bbSearchByRegionRequest, BbListResponse bbSearchResponse) {
        bbSearchResponse.setData(bbService.searchByRegion(bbSearchByRegionRequest.getId(),
                bbSearchByRegionRequest.getStart(),
                bbSearchByRegionRequest.getEnd()));
        return bbSearchResponse;
    }

    @Override
    public BbListResponse searchByPoi(BbSearchByPoiRequest bbSearchByPoiRequest, BbListResponse bbSearchResponse) {
        bbSearchResponse.setData(bbService.searchByLocation(bbSearchByPoiRequest.getId(),
                bbSearchByPoiRequest.getStart(),
                bbSearchByPoiRequest.getEnd(),
                bbSearchByPoiRequest.getRadius()));
        return bbSearchResponse;
    }

    @Override
    public BbListResponse searchByCoords(BbSearchByCoordsRequest bbSearchCoordsRequest, BbListResponse bbSearchResponse) {
        bbSearchResponse.setData(bbService.searchByCoords(bbSearchCoordsRequest.getLatitude(),
                bbSearchCoordsRequest.getLongitude(),
                bbSearchCoordsRequest.getStart(),
                bbSearchCoordsRequest.getEnd(),
                bbSearchCoordsRequest.getRadius()));
        return bbSearchResponse;
    }
    
    @Override
    public BbListResponse searchByIds(BbSearchByIdsRequest bbSearchByIdsRequest, BbListResponse bbSearchResponse) {
        bbSearchResponse.setData(bbService.searchByIds(bbSearchByIdsRequest.getIds()));
        return bbSearchResponse;
    }
}
