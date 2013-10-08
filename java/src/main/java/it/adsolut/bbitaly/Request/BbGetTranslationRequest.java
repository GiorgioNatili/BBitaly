package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.BbExist;
import it.adsolut.bbitaly.exception.Code;
import javax.validation.constraints.NotNull;

/**
 *
 * @author marcello
 */
public class BbGetTranslationRequest extends SignedRequest {
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @BbExist(message=Code.Bb.NOT_EXIST)
    public String bbid;

    public String getBbid() {
        return bbid;
    }

    public void setBbid(String bbid) {
        this.bbid = bbid;
    }

}
