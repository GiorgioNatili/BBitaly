/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.NotRegionExist;
import it.adsolut.bbitaly.exception.Code;
import java.util.Date;
import javax.validation.constraints.NotNull;

/**
 *
 * @author marcello
 */
public class BbSearchByRegionRequest extends SignedRequest {
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @NotRegionExist(message=Code.Location.NOT_REGION_EXIST)
    private Long id;
    
//    @NotNull(message=Code.Search.DATE_NOT_VALID)
//    @NotBlank(message=Code.Search.DATE_NOT_VALID)
//    @it.adsolut.bbitaly.Request.Validator.Date(message=Code.Search.DATE_NOT_VALID)
    private Date start;
    
//    @NotNull(message=Code.Search.DATE_NOT_VALID)
//    @NotBlank(message=Code.Search.DATE_NOT_VALID)
//    @it.adsolut.bbitaly.Request.Validator.Date(message=Code.Search.DATE_NOT_VALID)
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

    public void setId(Long regionid) {
        this.id = regionid;
    }

    public Date getStart() {
        return start;
    }

    public void setStart(Date start) {
        this.start = start;
    }
    
}
