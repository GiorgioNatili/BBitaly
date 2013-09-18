package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.RoomGallery;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class RoomGalleryResponse extends Response<RoomGallery, it.adsolut.bbitaly.response.vo.RoomGallery>{

    public RoomGalleryResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }

    @Override
    protected it.adsolut.bbitaly.response.vo.RoomGallery map(RoomGallery data) {
        return dozermapper.map(data, it.adsolut.bbitaly.response.vo.RoomGallery.class);
    }

}
