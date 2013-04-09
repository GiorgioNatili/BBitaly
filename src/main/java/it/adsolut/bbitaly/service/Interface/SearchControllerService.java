/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service.Interface;

import it.adsolut.bbitaly.Request.BbSearchByCityRequest;
import it.adsolut.bbitaly.Request.BbSearchByCoordsRequest;
import it.adsolut.bbitaly.Request.BbSearchByIdsRequest;
import it.adsolut.bbitaly.Request.BbSearchByPoiRequest;
import it.adsolut.bbitaly.Request.BbSearchByRegionRequest;
import it.adsolut.bbitaly.Request.SearchRequest;
import it.adsolut.bbitaly.response.BbListResponse;
import it.adsolut.bbitaly.response.SearchResponse;

/**
 *
 * @author marcello
 */
public interface SearchControllerService {
    public SearchResponse search(SearchRequest searchRequest, SearchResponse searchResponse);
    public BbListResponse searchByCity(BbSearchByCityRequest bbSearchByCityRequest, BbListResponse bbSearchResponse);
    public BbListResponse searchByRegion(BbSearchByRegionRequest bbSearchByRegionRequest, BbListResponse bbSearchResponse);
    public BbListResponse searchByPoi(BbSearchByPoiRequest bbSearchByPoiRequest, BbListResponse bbSearchResponse);
    public BbListResponse searchByCoords(BbSearchByCoordsRequest bbSearchCoordsRequest, BbListResponse bbSearchResponse);
    public BbListResponse searchByIds(BbSearchByIdsRequest bbSearchIdsRequest, BbListResponse bbSearchResponse);
}
