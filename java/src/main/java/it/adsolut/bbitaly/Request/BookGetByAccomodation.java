package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.BbExist;
import it.adsolut.bbitaly.exception.Code;
import javax.validation.constraints.NotNull;

/**
 *
 * @author marcello
 */
public class BookGetByAccomodation extends SignedRequest {

    @NotNull(message = Code.Sintax.REQUEST_NOT_VALID)
    @BbExist(message = Code.Bb.NOT_EXIST)
    private String id;

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }
}
