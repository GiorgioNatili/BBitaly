package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.RoomTranslation;
import java.util.ArrayList;
import java.util.List;
import java.util.Set;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class RoomTranslationListResponse extends Response<Set<RoomTranslation>, List<it.adsolut.bbitaly.response.vo.RoomTranslation>>{

    public RoomTranslationListResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }

    @Override
    protected List<it.adsolut.bbitaly.response.vo.RoomTranslation> map(Set<RoomTranslation> data) {
        List<it.adsolut.bbitaly.response.vo.RoomTranslation> list =  new ArrayList<it.adsolut.bbitaly.response.vo.RoomTranslation>();
        for (RoomTranslation c : data) {
            list.add(dozermapper.map(c, it.adsolut.bbitaly.response.vo.RoomTranslation.class));
        }
        return list;
    }
    
}
