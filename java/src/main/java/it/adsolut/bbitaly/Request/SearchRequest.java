/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.exception.Code;
import java.util.Date;
import javax.validation.constraints.NotNull;
import org.hibernate.validator.constraints.NotBlank;
import org.hibernate.validator.constraints.NotEmpty;
import org.springframework.format.annotation.DateTimeFormat;

/**
 *
 * @author marcello
 */
public class SearchRequest extends SignedRequest {
    
    @NotNull(message=Code.Search.QUERY_NOT_VALID)
    @NotEmpty(message=Code.Search.QUERY_NOT_VALID)
    @NotBlank(message=Code.Search.QUERY_NOT_VALID)
    private String name;
    
    @DateTimeFormat(iso=DateTimeFormat.ISO.DATE)
    private Date start;
    
    @DateTimeFormat(iso=DateTimeFormat.ISO.DATE)
    private Date end;

    public java.util.Date getEnd() {
        return end;
    }

    public void setEnd(Date end) {
        this.end = end;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public Date getStart() {
        return start;
    }

    public void setStart(Date start) {
        this.start = start;
    }
}
