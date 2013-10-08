package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.RoomExist;
import it.adsolut.bbitaly.exception.Code;
import java.util.Map;
import javax.validation.constraints.NotNull;
import org.hibernate.validator.constraints.Range;

/**
 *
 * @author marcello
 */
public class AddPriceRequest extends SignedRequest {
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @RoomExist(message=Code.Room.NOT_EXIST)
    private Long roomId;
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    private Integer year;
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @Range(min=1,max=12,message=Code.Room.Price.MONTH_INVALID)
    private Integer month;
    
    @NotNull(message=Code.Room.Price.DAY_MAP_NOT_GIVEN)
    private Map<Integer,Float> price;
    
    private Map<Integer,Boolean> isOffer = null;

    public Map<Integer, Boolean> getIsOffer() {
        return isOffer;
    }

    public void setIsOffer(Map<Integer, Boolean> isOffer) {
        this.isOffer = isOffer;
    }

    public Integer getYear() {
        return year;
    }

    public void setYear(Integer year) {
        this.year = year;
    }
    
    public Integer getMonth() {
        return month;
    }

    public void setMonth(Integer month) {
        this.month = month;
    }

    public Map<Integer, Float> getPrice() {
        return price;
    }

    public void setPrice(Map<Integer, Float> price) {
        this.price = price;
    }

    public Long getRoomId() {
        return roomId;
    }

    public void setRoomId(Long roomId) {
        this.roomId = roomId;
    }
    
}
