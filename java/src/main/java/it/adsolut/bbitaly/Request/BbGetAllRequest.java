package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.exception.Code;
import javax.validation.constraints.NotNull;

/**
 *
 * @author marcello
 */
public class BbGetAllRequest extends SignedRequest {
    
    @NotNull(message=Code.Bb.NOT_LIMIT)
    private Integer limit;
    
    @NotNull(message=Code.Bb.NOT_OFFSET)
    private Integer offset;

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
}
