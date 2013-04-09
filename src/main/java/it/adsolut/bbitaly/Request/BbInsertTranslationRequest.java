package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.BbExist;
import it.adsolut.bbitaly.Request.Validator.LangExist;
import it.adsolut.bbitaly.exception.Code;
import javax.validation.constraints.NotNull;
import org.hibernate.validator.constraints.NotBlank;
import org.hibernate.validator.constraints.NotEmpty;

/**
 *
 * @author marcello
 */
public class BbInsertTranslationRequest extends SignedRequest {

    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @BbExist(message=Code.Bb.NOT_EXIST)
    public String bbid;
    
    @NotNull(message = Code.Bb.NO_LANG_SPECIFIED)
    @LangExist(message = Code.Translation.ISO_NOT_EXIST)
    @NotEmpty(message = Code.Bb.NO_LANG_SPECIFIED)
    private String lang;
    
    @NotNull(message = Code.Bb.NO_DESCRIPTION_SPECIFIED)
    @NotBlank(message = Code.Bb.NO_DESCRIPTION_SPECIFIED)
    @NotEmpty(message = Code.Bb.NO_DESCRIPTION_SPECIFIED)
    private String description;

    public String getBbid() {
        return bbid;
    }

    public void setBbid(String bbid) {
        this.bbid = bbid;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getLang() {
        return lang;
    }

    public void setLang(String lang) {
        this.lang = lang;
    }
    
}
