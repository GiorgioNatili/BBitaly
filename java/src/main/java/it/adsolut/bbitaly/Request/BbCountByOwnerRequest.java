package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.OwnerExist;
import it.adsolut.bbitaly.exception.Code;
import javax.validation.constraints.NotNull;

/**
 *
 * @author marcello
 */
public class BbCountByOwnerRequest extends SignedRequest {
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @OwnerExist(message=Code.Owner.NOT_FOUND)
    private Long ownerid;

    public Long getOwnerid() {
        return ownerid;
    }

    public void setOwnerid(Long ownerid) {
        this.ownerid = ownerid;
    }
    
}
