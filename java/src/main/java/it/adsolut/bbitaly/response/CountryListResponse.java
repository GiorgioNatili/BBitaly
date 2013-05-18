package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.Country;
import java.util.ArrayList;
import java.util.List;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class CountryListResponse extends Response<List<Country>, List<it.adsolut.bbitaly.response.vo.Country>>  {

    public CountryListResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }
    
    @Override
    protected List<it.adsolut.bbitaly.response.vo.Country> map(List<Country> data) {
        List<it.adsolut.bbitaly.response.vo.Country> list =  new ArrayList<it.adsolut.bbitaly.response.vo.Country>();
        for (Country c : data) {
            list.add(dozermapper.map(c, it.adsolut.bbitaly.response.vo.Country.class));
        }
        return list;
    }
    
}
