package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.RoomExist;
import it.adsolut.bbitaly.exception.Code;
import javax.validation.constraints.NotNull;

/**
 *
 * @author marcello
 */
public class RoomDeleteRequest extends SignedRequest {
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @RoomExist(message=Code.Room.NOT_EXIST)
    private Long id;

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }
}
