package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.response.vo.BedBreakfastCount;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class BbCountResponse extends Response<Long, it.adsolut.bbitaly.response.vo.BedBreakfastCount> {

    public BbCountResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }
    
    @Override
    protected BedBreakfastCount map(Long data) {
        /**
         * @todo fix this in a more elegant way 
         */
        BedBreakfastCount count = new BedBreakfastCount();
        count.setCount(data);
        return count;
    }
    
}
