package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.Policy;
import java.util.ArrayList;
import java.util.List;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class PolicyListResponse extends Response<List<Policy>, List<it.adsolut.bbitaly.response.vo.Policy>>{

    public PolicyListResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }
    
    @Override
    protected List<it.adsolut.bbitaly.response.vo.Policy> map(List<Policy> data) {
        List<it.adsolut.bbitaly.response.vo.Policy> list =  new ArrayList<it.adsolut.bbitaly.response.vo.Policy>();
        for (Policy p : data) {
            list.add(dozermapper.map(p, it.adsolut.bbitaly.response.vo.Policy.class));
        }
        return list;
    }
    
}
