/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.City;
import java.util.ArrayList;
import java.util.List;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class CityListResponse extends Response<List<City>, List<it.adsolut.bbitaly.response.vo.City>> {

    public CityListResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }
    
    @Override
    protected List<it.adsolut.bbitaly.response.vo.City> map(List<City> data) {
        List<it.adsolut.bbitaly.response.vo.City> list =  new ArrayList<it.adsolut.bbitaly.response.vo.City>();
        for (City c : data) {
            list.add(dozermapper.map(c, it.adsolut.bbitaly.response.vo.City.class));
        }
        return list;
    }

    
}
