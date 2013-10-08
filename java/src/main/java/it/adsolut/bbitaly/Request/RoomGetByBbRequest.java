package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.BbExist;
import it.adsolut.bbitaly.Request.Validator.LangExist;
import it.adsolut.bbitaly.exception.Code;
import javax.validation.constraints.NotNull;

/**
 *
 * @author marcello
 */
public class RoomGetByBbRequest extends SignedRequest {
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @BbExist(message=Code.Bb.NOT_EXIST)
    private String id;

    @LangExist(message=Code.Translation.ISO_NOT_EXIST)
    @NotNull(message=Code.Translation.ISO_NOT_EXIST)
    private String lang;
    
    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getLang() {
        return lang;
    }

    public void setLang(String lang) {
        this.lang = lang;
    }
    
}
