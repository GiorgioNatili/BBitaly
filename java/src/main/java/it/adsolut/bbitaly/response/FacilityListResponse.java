package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.Facility;
import java.util.ArrayList;
import java.util.List;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class FacilityListResponse extends Response<List<Facility>, List<it.adsolut.bbitaly.response.vo.Facility>>{

    public FacilityListResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }
    
    @Override
    protected List<it.adsolut.bbitaly.response.vo.Facility> map(List<Facility> data) {
        List<it.adsolut.bbitaly.response.vo.Facility> list =  new ArrayList<it.adsolut.bbitaly.response.vo.Facility>();
        for (Facility f : data) {
            list.add(dozermapper.map(f, it.adsolut.bbitaly.response.vo.Facility.class));
        }
        return list;
    }
    
}
