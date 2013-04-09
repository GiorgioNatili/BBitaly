/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.dao.CityDao;
import it.adsolut.bbitaly.dao.CountryDao;
import it.adsolut.bbitaly.dao.RegionDao;
import it.adsolut.bbitaly.model.City;
import it.adsolut.bbitaly.model.Country;
import it.adsolut.bbitaly.model.Region;
import java.util.List;

/**
 *
 * @author marcello
 */
public class L10nServiceImpl extends TranslatableService implements L10nService{
    
    private CountryDao countryDao;
    private RegionDao regionDao;
    private CityDao citydao;

    public void setCountryDao(CountryDao countryDao) {
        this.countryDao = countryDao;
    }

    public void setRegionDao(RegionDao regionDao) {
        this.regionDao = regionDao;
    }

    public void setCitydao(CityDao citydao) {
        this.citydao = citydao;
    }

    @Override
    public Region findRegion(Region region) {
        return regionDao.find(region.getId());
    }
    @Override
    public City findCity(City city) {
        return citydao.find(city.getId());
    }
    
    @Override
    public List<Region> get() {
        Country country = new Country();
        country.setId(29L);
        return regionDao.getAllByCountry(country);
    }

    @Override
    public Country findCountry(Country country) {
        return countryDao.find(country.getId());
    }
    
}
