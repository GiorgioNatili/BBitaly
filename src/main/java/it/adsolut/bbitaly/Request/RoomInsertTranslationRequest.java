package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.LangExist;
import it.adsolut.bbitaly.Request.Validator.RoomExist;
import it.adsolut.bbitaly.exception.Code;
import javax.validation.constraints.NotNull;
import org.hibernate.validator.constraints.NotBlank;

/**
 *
 * @author marcello
 */
public class RoomInsertTranslationRequest extends SignedRequest {

    @NotNull(message = Code.Sintax.REQUEST_NOT_VALID)
    @RoomExist(message = Code.Room.NOT_EXIST)
    private Long id;
    
    @NotNull(message = Code.Room.NO_SHORT_DESC_PROVIDED)
    @NotBlank(message = Code.Room.NO_SHORT_DESC_PROVIDED)
    private String shortDesc;
    
    @NotNull(message = Code.Room.NO_DESC_PROVIDED)
    @NotBlank(message = Code.Room.NO_DESC_PROVIDED)
    private String generalDesc;
    
    @NotNull(message = Code.Room.NO_DESC_PROVIDED)
    @NotBlank(message = Code.Room.NO_DESC_PROVIDED)
    private String placeDesc;
    
    @LangExist(message = Code.Translation.ISO_NOT_EXIST)
    @NotNull(message = Code.Translation.ISO_NOT_EXIST)
    @NotBlank(message = Code.Translation.ISO_NOT_EXIST)
    private String lang;

    public String getGeneralDesc() {
        return generalDesc;
    }

    public void setGeneralDesc(String generalDesc) {
        this.generalDesc = generalDesc;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getLang() {
        return lang;
    }

    public void setLang(String lang) {
        this.lang = lang;
    }

    public String getShortDesc() {
        return shortDesc;
    }

    public void setShortDesc(String shortDesc) {
        this.shortDesc = shortDesc;
    }

    public String getPlaceDesc() {
        return placeDesc;
    }

    public void setPlaceDesc(String placeDesc) {
        this.placeDesc = placeDesc;
    }
    
}
