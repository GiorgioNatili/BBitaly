package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.LangExist;
import it.adsolut.bbitaly.Request.Validator.OwnerExist;
import it.adsolut.bbitaly.exception.Code;
import javax.validation.constraints.NotNull;

/**
 *
 * @author marcello
 */
public class BbGetByOwnerRequest extends SignedRequest {
    
    @NotNull(message=Code.Owner.NOT_FOUND)
    @OwnerExist(message=Code.Owner.NOT_FOUND)
    private Long ownerid;
    
    @NotNull(message=Code.Bb.NOT_LIMIT)
    private Integer limit;
    
    @NotNull(message=Code.Bb.NOT_OFFSET)
    private Integer offset;

    @LangExist(message=Code.Translation.ISO_NOT_EXIST)
    @NotNull(message=Code.Translation.ISO_NOT_EXIST)
    private String lang;
    
    public Integer getLimit() {
        return limit;
    }

    public void setLimit(Integer limit) {
        this.limit = limit;
    }

    public Integer getOffset() {
        return offset;
    }

    public void setOffset(Integer offset) {
        this.offset = offset;
    }

    public Long getOwnerid() {
        return ownerid;
    }

    public void setOwnerid(Long ownerid) {
        this.ownerid = ownerid;
    }

    public String getLang() {
        return lang;
    }

    public void setLang(String lang) {
        this.lang = lang;
    }
    
}
