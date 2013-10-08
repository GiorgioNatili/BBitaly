package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.NotRegionExist;
import it.adsolut.bbitaly.exception.Code;
import javax.validation.constraints.NotNull;

/**
 *
 * @author marcello
 */
public class CityGetRequest extends SignedRequest {
    
    @NotNull(message=Code.Location.NOT_REGION_EXIST)
    @NotRegionExist(message=Code.Location.NOT_REGION_EXIST)
    private Long regionid;

    public Long getRegionid() {
        return regionid;
    }

    public void setRegionid(Long regionid) {
        this.regionid = regionid;
    }
    
    
}
