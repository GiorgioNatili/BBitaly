package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.Photo;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class PhotoResponse extends Response<Photo, it.adsolut.bbitaly.response.vo.Photo>{

    public PhotoResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }

    @Override
    protected it.adsolut.bbitaly.response.vo.Photo map(Photo data) {
        return dozermapper.map(data, it.adsolut.bbitaly.response.vo.Photo.class);
    }
    
}
