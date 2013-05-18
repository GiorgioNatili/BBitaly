package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.RoomPrice;
import java.util.ArrayList;
import java.util.List;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class RoomPriceListResponse extends Response<List<RoomPrice>, List<it.adsolut.bbitaly.response.vo.RoomPrice>> {

    public RoomPriceListResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }

    @Override
    protected List<it.adsolut.bbitaly.response.vo.RoomPrice> map(List<RoomPrice> data) {
        if (data == null)  {
            return new ArrayList<it.adsolut.bbitaly.response.vo.RoomPrice>();
        }
        List<it.adsolut.bbitaly.response.vo.RoomPrice> list =  new ArrayList<it.adsolut.bbitaly.response.vo.RoomPrice>();
        for (RoomPrice c : data) {
            list.add(dozermapper.map(c, it.adsolut.bbitaly.response.vo.RoomPrice.class));
        }
        return list;
    }
}
