package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.PhotoListExist;
import it.adsolut.bbitaly.Request.Validator.RoomExist;
import it.adsolut.bbitaly.exception.Code;
import java.util.ArrayList;
import javax.validation.constraints.NotNull;

/**
 *
 * @author marcello
 */
public class RoomPhotoReorderRequest extends SignedRequest {
    
    @NotNull(message = Code.Sintax.REQUEST_NOT_VALID)
    @RoomExist(message = Code.Bb.NOT_EXIST)
    private Long id;
    
    @PhotoListExist(message = Code.Photo.NOT_EXIST)
    private ArrayList<Long> pids;

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public ArrayList<Long> getPids() {
        return pids;
    }

    public void setPids(ArrayList<Long> pids) {
        this.pids = pids;
    }
    
}
