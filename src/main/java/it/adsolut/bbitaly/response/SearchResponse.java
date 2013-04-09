/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.BedBreakfast;
import it.adsolut.bbitaly.model.City;
import it.adsolut.bbitaly.model.Location;
import it.adsolut.bbitaly.model.Region;
import java.util.ArrayList;
import java.util.List;
import javax.annotation.Resource;
import org.dozer.DozerBeanMapper;
import org.springframework.validation.ObjectError;

/**
 *
 * @author marcello
 */
public class SearchResponse {

    private class Items {

        protected DozerBeanMapper dozermapper;
        private List<it.adsolut.bbitaly.response.vo.BedBreakfast> bedBreakfasts;
        private List<it.adsolut.bbitaly.response.vo.Location> locations;
        private List<it.adsolut.bbitaly.response.vo.Region> regions;
        private List<it.adsolut.bbitaly.response.vo.City> cities;

        public Items(DozerBeanMapper dozermapper) {
            this.dozermapper = dozermapper;
            bedBreakfasts = new ArrayList();
            locations = new ArrayList();
            regions = new ArrayList();
            cities = new ArrayList();
        }

        public List<it.adsolut.bbitaly.response.vo.BedBreakfast> getBedBreakfasts() {
            return bedBreakfasts;
        }

        public List<it.adsolut.bbitaly.response.vo.City> getCities() {
            return cities;
        }

        public List<it.adsolut.bbitaly.response.vo.Location> getLocations() {
            return locations;
        }

        public List<it.adsolut.bbitaly.response.vo.Region> getRegions() {
            return regions;
        }

        public void setBedBreakfasts(List<BedBreakfast> bedBreakfasts) {
            System.out.println("---------------------------------------------");
            System.out.println("LUNGHEZZA IN RESPONSE: " + bedBreakfasts.size());
            System.out.println("---------------------------------------------");
            for (BedBreakfast b : bedBreakfasts) {
                this.bedBreakfasts.add(dozermapper.map(b, it.adsolut.bbitaly.response.vo.BedBreakfast.class));
            }
        }

        private void setRegions(List<Region> regions) {
            for (Region r : regions) {
                this.regions.add(dozermapper.map(r, it.adsolut.bbitaly.response.vo.Region.class));
            }
        }

        private void setCities(List<City> cities) {
            for (City c : cities) {
                this.cities.add(dozermapper.map(c, it.adsolut.bbitaly.response.vo.City.class));
            }
        }

        private void setPois(List<Location> locations) {
            for (Location l : locations) {
                this.locations.add(dozermapper.map(l, it.adsolut.bbitaly.response.vo.Location.class));
            }
        }
    }
    @Resource(name = "dozermapper")
    protected DozerBeanMapper dozermapper;
    
    private List<String> errors = new ArrayList<String>();
    private Items data;

    public SearchResponse(DozerBeanMapper dozerBeanMapper) {
        this.dozermapper = dozerBeanMapper;
        this.data = new Items(dozermapper);
    }

    public List<String> getErrors() {
        return errors;
    }

    public void setErrors(List<String> errors) {
        this.errors = errors;
    }

    public void addError(String code) {
        errors.add(code);
    }

    public void addError(List<ObjectError> errors) {
        for (ObjectError oe : errors) {
            this.addError(oe.getDefaultMessage());
        }
    }

    public Items getData() {
        return data;
    }

    public void setBbs(List<BedBreakfast> bbs) {
        data.setBedBreakfasts(bbs);
    }

    public void setRegions(List<Region> regions) {
        data.setRegions(regions);
    }

    public void setCities(List<City> cities) {
        data.setCities(cities);
    }

    public void setPois(List<Location> locations) {
        data.setPois(locations);
    }
}
