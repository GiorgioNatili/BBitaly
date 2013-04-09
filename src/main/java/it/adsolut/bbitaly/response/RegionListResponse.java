/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.Region;
import java.util.ArrayList;
import java.util.List;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class RegionListResponse extends Response<List<Region>, List<it.adsolut.bbitaly.response.vo.Region>> {

    public RegionListResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }
    
    @Override
    protected List<it.adsolut.bbitaly.response.vo.Region> map(List<Region> data) {
        List<it.adsolut.bbitaly.response.vo.Region> list =  new ArrayList<it.adsolut.bbitaly.response.vo.Region>();
        for (Region r : data) {
            list.add(dozermapper.map(r, it.adsolut.bbitaly.response.vo.Region.class));
        }
        return list;
    }

    
}
