/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.Request.CityGetRequest;
import it.adsolut.bbitaly.Request.CountryGetRequest;
import it.adsolut.bbitaly.Request.RegionGetRequest;
import it.adsolut.bbitaly.dao.CityDao;
import it.adsolut.bbitaly.dao.CountryDao;
import it.adsolut.bbitaly.dao.LocationDao;
import it.adsolut.bbitaly.dao.RegionDao;
import it.adsolut.bbitaly.model.City;
import it.adsolut.bbitaly.model.Country;
import it.adsolut.bbitaly.model.Location;
import it.adsolut.bbitaly.model.Region;
import it.adsolut.bbitaly.response.CityListResponse;
import it.adsolut.bbitaly.response.CountryListResponse;
import it.adsolut.bbitaly.response.RegionListResponse;
import it.adsolut.bbitaly.service.Interface.LocationControllerService;
import it.adsolut.bbitaly.util.google.GeocodeResult;
import it.adsolut.bbitaly.util.google.PlaceResult;
import it.adsolut.bbitaly.util.google.api.Coordinate;
import it.adsolut.bbitaly.util.google.api.GeocodeClient;
import it.adsolut.bbitaly.util.google.api.PlacesClient;
import it.adsolut.bbitaly.util.google.api.Radius;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author marcello
 */
public class LocationServiceImpl extends TranslatableService implements LocationService, LocationControllerService {

    private LocationDao locationDao;
    private CityDao cityDao;
    private RegionDao regionDao;
    private CountryDao countryDao;
    private PlacesClient placeclient;
    private GeocodeClient geocodeclient;

    public void setCityDao(CityDao CityDao) {
        this.cityDao = CityDao;
    }

    public void setRegionDao(RegionDao regionDao) {
        this.regionDao = regionDao;
    }

    public void setCountryDao(CountryDao countryDao) {
        this.countryDao = countryDao;
    }
    
    public void setLocationDao(LocationDao locationDao) {
        this.locationDao = locationDao;
    }

    public void setGeocodeclient(GeocodeClient geocodeclient) {
        this.geocodeclient = geocodeclient;
    }

    public void setPlaceclient(PlacesClient placeclient) {
        this.placeclient = placeclient;
    }

    @Override
    public Location get(String id) {
        return locationDao.find(id);
    }

    @Override
    public List<PlaceResult> searchNearbyPoi(String city, String address) throws Exception {
        geocodeclient.setAddress(address + "," + city);
        geocodeclient.setSensor("false");
        List<GeocodeResult> resg = geocodeclient.getResponse().getResults();
        Coordinate c = new Coordinate();
        c.setLatitude(resg.get(0).getGeometry().getLocation().get("lat"));
        c.setLongitude(resg.get(0).getGeometry().getLocation().get("lng"));
        placeclient.setLocation(c);

        Radius r = new Radius();
        r.setRadius(2000);
        placeclient.setRadius(r);

        placeclient.setSensor("true");
        List<PlaceResult> placeResult = placeclient.getResponse().getResults();
        addLocation(placeResult);
        return placeResult;
    }

    @Override
    public Coordinate searchCoordByAddress(String city, String address) throws Exception {
        geocodeclient.setAddress(address + "," + city);
        geocodeclient.setSensor("false");
        List<GeocodeResult> resg = geocodeclient.getResponse().getResults();
        Coordinate c = new Coordinate();
        c.setLatitude(resg.get(0).getGeometry().getLocation().get("lat"));
        c.setLongitude(resg.get(0).getGeometry().getLocation().get("lng"));
        return c;
    }

    @Override
    public List<City> searchCity(String cityName) throws Exception {
        geocodeclient.setAddress(cityName + ",italia");
        geocodeclient.setSensor("false");
        List<City> cities = getCity(geocodeclient.getResponse().getResults());
        List<City> citiesToReturn = new ArrayList<City>();
        for (City city : cities) {
            List<City> cityFromDb;
            cityFromDb = cityDao.findByName(city.getName());
            if (cityFromDb.isEmpty()) {
                cityDao.persist(city);
            }
            citiesToReturn.add(city);
        }
        return citiesToReturn;
    }

    private List<City> getCity(List<GeocodeResult> results) {
        List<City> cities = new ArrayList<City>();
        for (GeocodeResult place : results) {
            City city = new City();
            city.setName(place.getAddress_components().get(0).getLong_name());
            Region region = regionDao.findByName(
                    place.getAddress_components().get(2).getLong_name() + " - " + place.getAddress_components().get(1).getLong_name());
            city.setRegion(region);
            city.setCountry(region.getCountry());
            cities.add(city);
        }
        return cities;
    }

    private void addLocation(List<PlaceResult> placeResults) {
        for (PlaceResult placeResult : placeResults) {
            try {
                Location l = new Location();
                l.setId(placeResult.getId());
                l.setLatitude(placeResult.getGeometry().getLocation().get("lat"));
                l.setLongitude(placeResult.getGeometry().getLocation().get("lng"));
                l.setName(placeResult.getName());
                locationDao.persist(l);
            } catch (Exception ex) {
                System.out.println("già presente : " + ex.getMessage());
            }
        }
    }

    @Override
    public List<Region> fastRegionSearch(String name) {
        return locationDao.fastRegionSearch(name);
    }

    @Override
    public List<City> fastCitySearch(String name) {
        return locationDao.fastCitySearch(name);
    }

    @Override
    public List<Location> fastPoiSearch(String name) {
        return locationDao.fastPoiSearch(name);
    }

    @Override
    public RegionListResponse getRegion(RegionGetRequest regionGetRequest, RegionListResponse regionListResponse) {
        Country c = new Country();
        c.setId(regionGetRequest.getCountryid());
        regionListResponse.setData(regionDao.getAllByCountry(c));
        return regionListResponse;
    }

    @Override
    public CityListResponse getCity(CityGetRequest cityGetRequest, CityListResponse cityListResponse) {
        Region r = new Region();
        r.setId(cityGetRequest.getRegionid());
        cityListResponse.setData(cityDao.findByRegion(r));
        return cityListResponse;
    }

    @Override
    public CountryListResponse getCountry(CountryGetRequest CountryGetRequest, CountryListResponse countryListResponse) {
        countryListResponse.setData(this.countryDao.getAll());
        return countryListResponse;
    }
}
