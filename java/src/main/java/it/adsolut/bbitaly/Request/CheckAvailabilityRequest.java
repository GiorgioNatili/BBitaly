package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.RoomExist;
import it.adsolut.bbitaly.exception.Code;
import java.util.Date;
import javax.validation.constraints.NotNull;
import org.springframework.format.annotation.DateTimeFormat;

/**
 *
 * @author marcello
 */
public class CheckAvailabilityRequest extends SignedRequest {
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @RoomExist(message=Code.Bb.NOT_EXIST)
    private Long id;
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @DateTimeFormat(iso=DateTimeFormat.ISO.DATE)
    private Date start;
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @DateTimeFormat(iso=DateTimeFormat.ISO.DATE)
    private Date end;

    public Date getEnd() {
        return end;
    }

    public void setEnd(Date end) {
        this.end = end;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }
    
    public Date getStart() {
        return start;
    }

    public void setStart(Date start) {
        this.start = start;
    }
    
}
