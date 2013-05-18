/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.BedBreakfast;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class BbResponse extends Response<BedBreakfast,it.adsolut.bbitaly.response.vo.BedBreakfast>{

    public BbResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }

    @Override
    protected it.adsolut.bbitaly.response.vo.BedBreakfast map(BedBreakfast data) {
        return dozermapper.map(data, it.adsolut.bbitaly.response.vo.BedBreakfast.class);
    }
    
}
