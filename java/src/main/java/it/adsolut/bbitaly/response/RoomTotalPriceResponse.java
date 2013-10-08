package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.response.vo.RoomTotalPrice;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class RoomTotalPriceResponse extends Response<Float, it.adsolut.bbitaly.response.vo.RoomTotalPrice> {

    public RoomTotalPriceResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }
    
    @Override
    protected RoomTotalPrice map(Float data) {
        RoomTotalPrice total = new RoomTotalPrice();
        total.setTotal(data);
        return total;
    }
    
}
