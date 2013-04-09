package it.adsolut.bbitaly.Request;

/**
 *
 * @author marcello
 */
public class RegionGetRequest extends SignedRequest {
    
    private Long countryid = 29L;

    public Long getCountryid() {
        return countryid;
    }

    public void setCountryid(Long countryid) {
        this.countryid = countryid;
    }
    
}
