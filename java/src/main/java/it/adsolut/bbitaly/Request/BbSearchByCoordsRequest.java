/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.exception.Code;
import java.util.Date;
import javax.validation.constraints.NotNull;

/**
 *
 * @author marcello
 */
public class BbSearchByCoordsRequest extends SignedRequest {
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    private Float latitude;
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    private Float longitude;
    
//    @NotNull(message=Code.Search.DATE_NOT_VALID)
//    @NotBlank(message=Code.Search.DATE_NOT_VALID)
//    @it.adsolut.bbitaly.Request.Validator.Date(message=Code.Search.DATE_NOT_VALID)
    private Date start;
    
//    @NotNull(message=Code.Search.DATE_NOT_VALID)
//    @NotBlank(message=Code.Search.DATE_NOT_VALID)
//    @it.adsolut.bbitaly.Request.Validator.Date(message=Code.Search.DATE_NOT_VALID)
    private Date end;
    
    private Float radius = 20.00F;

    public Date getEnd() {
        return end;
    }

    public void setEnd(Date end) {
        this.end = end;
    }

    public Float getLatitude() {
        return latitude;
    }

    public void setLatitude(Float latitude) {
        this.latitude = latitude;
    }

    public Float getLongitude() {
        return longitude;
    }

    public void setLongitude(Float longitude) {
        this.longitude = longitude;
    }
    
    public Date getStart() {
        return start;
    }

    public void setStart(Date start) {
        this.start = start;
    }

    public Float getRadius() {
        return radius;
    }

    public void setRadius(Float radius) {
        this.radius = radius;
    }
    
}
