package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.LangExist;
import it.adsolut.bbitaly.Request.Validator.RoomExist;
import it.adsolut.bbitaly.Request.Validator.ValidBb;
import it.adsolut.bbitaly.exception.Code;
import javax.validation.constraints.NotNull;
import org.hibernate.validator.constraints.NotBlank;
import org.hibernate.validator.constraints.Range;

/**
 *
 * @author marcello
 */
public class RoomUpdateRequest extends SignedRequest {

    @NotNull(message = Code.Sintax.REQUEST_NOT_VALID)
    @RoomExist(message = Code.Room.NOT_EXIST)
    private Long id;
    
    @NotNull(message = Code.Sintax.REQUEST_NOT_VALID)
    @ValidBb(message = Code.Bb.NOT_EXIST)
    private String bbid;
    
    @NotNull(message = Code.Sintax.REQUEST_NOT_VALID)
    private Float defaultPrice;
    
    @NotNull(message = Code.Room.NO_SHORT_DESC_PROVIDED)
    @NotBlank(message = Code.Room.NO_SHORT_DESC_PROVIDED)
    private String shortDesc;
    
    @NotNull(message = Code.Room.NOT_VALID_AMOUNT)
    @Range(min = 0L, message = Code.Room.NOT_VALID_AMOUNT)
    private Integer amount;
    
    @NotNull(message = Code.Room.NOT_VALID_MIN_AMOUNT)
    private Integer mincap;
    
    @NotNull(message = Code.Room.NOT_VALID_MAX_AMOUNT)
    private Integer maxcap;
    
    private String placeDesc;
    
    @NotNull(message = Code.Room.NO_DESC_PROVIDED)
    @NotBlank(message = Code.Room.NO_DESC_PROVIDED)
    private String generalDesc;
    
    @LangExist(message = Code.Translation.ISO_NOT_EXIST)
    @NotNull(message = Code.Translation.ISO_NOT_EXIST)
    @NotBlank(message = Code.Translation.ISO_NOT_EXIST)
    private String lang;

    public Integer getAmount() {
        return amount;
    }

    public void setAmount(Integer amount) {
        this.amount = amount;
    }

    public String getBbid() {
        return bbid;
    }

    public void setBbid(String bbid) {
        this.bbid = bbid;
    }

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

    public Integer getMaxcap() {
        return maxcap;
    }

    public void setMaxcap(Integer maxcap) {
        this.maxcap = maxcap;
    }

    public Integer getMincap() {
        return mincap;
    }

    public void setMincap(Integer mincap) {
        this.mincap = mincap;
    }

    public String getPlaceDesc() {
        return placeDesc;
    }

    public void setPlaceDesc(String placeDesc) {
        this.placeDesc = placeDesc;
    }

    public String getShortDesc() {
        return shortDesc;
    }

    public void setShortDesc(String shortDesc) {
        this.shortDesc = shortDesc;
    }

    public Float getDefaultPrice() {
        return defaultPrice;
    }

    public void setDefaultPrice(Float defaultPrice) {
        this.defaultPrice = defaultPrice;
    }
    
}
