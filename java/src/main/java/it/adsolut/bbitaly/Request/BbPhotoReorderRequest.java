package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.BbExist;
import it.adsolut.bbitaly.Request.Validator.PhotoListExist;
import it.adsolut.bbitaly.exception.Code;
import java.util.ArrayList;
import javax.validation.constraints.NotNull;

/**
 *
 * @author marcello
 */
public class BbPhotoReorderRequest extends SignedRequest {
    
    @NotNull(message = Code.Sintax.REQUEST_NOT_VALID)
    @BbExist(message = Code.Bb.NOT_EXIST)
    private String id;
    
    @PhotoListExist(message = Code.Photo.NOT_EXIST)
    private ArrayList<Long> pids;

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public ArrayList<Long> getPids() {
        return pids;
    }

    public void setPids(ArrayList<Long> pids) {
        this.pids = pids;
    }
    
}
