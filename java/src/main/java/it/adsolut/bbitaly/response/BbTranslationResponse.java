package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.BbTranslation;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class BbTranslationResponse extends Response<BbTranslation, it.adsolut.bbitaly.response.vo.BbTranslation> {

    public BbTranslationResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }

    @Override
    protected it.adsolut.bbitaly.response.vo.BbTranslation map(BbTranslation data) {
        return dozermapper.map(data, it.adsolut.bbitaly.response.vo.BbTranslation.class);
    }
    
}
