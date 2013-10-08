package it.adsolut.bbitaly.Request;

import java.util.List;

/**
 *
 * @author marcello
 */
public class BbSearchByIdsRequest extends SignedRequest {
    
    public List<String> ids;

    public List<String> getIds() {
        return ids;
    }

    public void setIds(List<String> ids) {
        this.ids = ids;
    }
}
