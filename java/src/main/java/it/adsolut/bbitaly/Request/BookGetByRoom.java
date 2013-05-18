package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.RoomExist;
import it.adsolut.bbitaly.exception.Code;
import javax.validation.constraints.NotNull;

/**
 *
 * @author marcello
 */
public class BookGetByRoom extends SignedRequest {

    @NotNull(message = Code.Sintax.REQUEST_NOT_VALID)
    @RoomExist(message = Code.Room.NOT_EXIST)
    private Long rid;

    public Long getRid() {
        return rid;
    }

    public void setRid(Long rid) {
        this.rid = rid;
    }
}
