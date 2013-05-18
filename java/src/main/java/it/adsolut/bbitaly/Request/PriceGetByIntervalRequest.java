package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.RoomExist;
import it.adsolut.bbitaly.exception.Code;
import javax.validation.constraints.NotNull;
import org.hibernate.validator.constraints.Range;

/**
 *
 * @author marcello
 */
public class PriceGetByIntervalRequest extends SignedRequest {
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @RoomExist(message=Code.Room.NOT_EXIST)
    private Long id;
    
    @Range(min=1,max=31,message=Code.Room.Price.DAY_NOT_VALID)
    private Integer dayStart;
    
    @Range(min=1,max=31,message=Code.Room.Price.DAY_NOT_VALID)
    private Integer dayEnd;
    
    @Range(min=1,max=12,message=Code.Room.Price.MONTH_INVALID)
    private Integer monthStart;
    
    @Range(min=1,max=12,message=Code.Room.Price.MONTH_INVALID)
    private Integer monthEnd;
    
    private Integer yearStart;
    
    private Integer yearEnd;

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Integer getDayEnd() {
        return dayEnd;
    }

    public void setDayEnd(Integer dayEnd) {
        this.dayEnd = dayEnd;
    }

    public Integer getDayStart() {
        return dayStart;
    }

    public void setDayStart(Integer dayStart) {
        this.dayStart = dayStart;
    }

    public Integer getMonthEnd() {
        return monthEnd;
    }

    public void setMonthEnd(Integer monthEnd) {
        this.monthEnd = monthEnd;
    }

    public Integer getMonthStart() {
        return monthStart;
    }

    public void setMonthStart(Integer monthStart) {
        this.monthStart = monthStart;
    }

    public Integer getYearEnd() {
        return yearEnd;
    }

    public void setYearEnd(Integer yearEnd) {
        this.yearEnd = yearEnd;
    }

    public Integer getYearStart() {
        return yearStart;
    }

    public void setYearStart(Integer yearStart) {
        this.yearStart = yearStart;
    }
    
}
