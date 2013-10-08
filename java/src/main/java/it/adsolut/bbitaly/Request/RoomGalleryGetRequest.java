package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.RoomExist;
import it.adsolut.bbitaly.Request.Validator.RoomGalleryExist;
import it.adsolut.bbitaly.exception.Code;
import javax.validation.constraints.NotNull;

/**
 *
 * @author marcello
 */
public class RoomGalleryGetRequest extends SignedRequest {
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @RoomExist(message=Code.Bb.NOT_EXIST)
    @RoomGalleryExist(message=Code.Bb.GALLERY_NOT_EXIST)
    private Long id;

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }
}
