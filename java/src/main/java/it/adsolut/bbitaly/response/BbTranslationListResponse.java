package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.BbTranslation;
import it.adsolut.bbitaly.model.City;
import java.util.ArrayList;
import java.util.List;
import java.util.Set;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class BbTranslationListResponse extends Response<Set<BbTranslation>, List<it.adsolut.bbitaly.response.vo.BbTranslation>>{

    public BbTranslationListResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }

    @Override
    protected List<it.adsolut.bbitaly.response.vo.BbTranslation> map(Set<BbTranslation> data) {
        List<it.adsolut.bbitaly.response.vo.BbTranslation> list =  new ArrayList<it.adsolut.bbitaly.response.vo.BbTranslation>();
        for (BbTranslation c : data) {
            list.add(dozermapper.map(c, it.adsolut.bbitaly.response.vo.BbTranslation.class));
        }
        return list;
    }
    
}
