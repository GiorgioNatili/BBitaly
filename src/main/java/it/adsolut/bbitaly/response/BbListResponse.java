/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.BedBreakfast;
import java.util.ArrayList;
import java.util.List;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class BbListResponse extends Response<List<BedBreakfast>, List<it.adsolut.bbitaly.response.vo.BedBreakfast>> {

    public BbListResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }
    
    @Override
    protected List<it.adsolut.bbitaly.response.vo.BedBreakfast> map(List<BedBreakfast> data) {
        List<it.adsolut.bbitaly.response.vo.BedBreakfast> list =  new ArrayList<it.adsolut.bbitaly.response.vo.BedBreakfast>();
        for (BedBreakfast b : data) {
            list.add(dozermapper.map(b, it.adsolut.bbitaly.response.vo.BedBreakfast.class));
        }
        return list;
    }

    
}
