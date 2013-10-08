package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.response.vo.BedBreakfastAvailable;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class BbAvailabilityResponse extends Response<Boolean, it.adsolut.bbitaly.response.vo.BedBreakfastAvailable> {

    public BbAvailabilityResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }
    
    @Override
    protected BedBreakfastAvailable map(Boolean data) {
        /**
         * @todo fix this in a more elegant way 
         */
        BedBreakfastAvailable available = new BedBreakfastAvailable();
        available.setAvailable(data);
        return available;
    }
    
}
