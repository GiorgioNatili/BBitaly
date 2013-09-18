package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.BbGallery;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class BbGalleryResponse extends Response<BbGallery, it.adsolut.bbitaly.response.vo.BbGallery>{

    public BbGalleryResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }

    @Override
    protected it.adsolut.bbitaly.response.vo.BbGallery map(BbGallery data) {
        return dozermapper.map(data, it.adsolut.bbitaly.response.vo.BbGallery.class);
    }

}
