package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.RoomTranslation;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class RoomTranslationResponse extends Response<RoomTranslation, it.adsolut.bbitaly.response.vo.RoomTranslation> {

    public RoomTranslationResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }

    @Override
    protected it.adsolut.bbitaly.response.vo.RoomTranslation map(RoomTranslation data) {
        return dozermapper.map(data, it.adsolut.bbitaly.response.vo.RoomTranslation.class);
    }
    
}
