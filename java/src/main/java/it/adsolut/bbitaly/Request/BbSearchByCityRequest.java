/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.NotCityExist;
import it.adsolut.bbitaly.exception.Code;
import java.util.Date;
import javax.validation.constraints.NotNull;

/**
 *
 * @author marcello
 */
public class BbSearchByCityRequest extends SignedRequest {
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @NotCityExist(message=Code.Location.NOT_CITY_EXIST)
    private Long id;
    
//    @NotNull(message=Code.Search.DATE_NOT_VALID)
//    @NotBlank(message=Code.Search.DATE_NOT_VALID)
//    @it.adsolut.bbitaly.Request.Validator.Date(message=Code.Search.DATE_NOT_VALID)
    private Date start;
    
//    @NotNull(message=Code.Search.DATE_NOT_VALID)
//    @NotBlank(message=Code.Search.DATE_NOT_VALID)
//    @it.adsolut.bbitaly.Request.Validator.Date(message=Code.Search.DATE_NOT_VALID)
    private Date end;

    public Long getId() {
        return id;
    }

    public void setId(Long cityid) {
        this.id = cityid;
    }

    public Date getEnd() {
        return end;
    }

    public void setEnd(Date end) {
        this.end = end;
    }

    public Date getStart() {
        return start;
    }

    public void setStart(Date start) {
        this.start = start;
    }
    
}
