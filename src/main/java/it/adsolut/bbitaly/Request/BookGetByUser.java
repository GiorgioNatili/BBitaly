package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.UserExist;
import it.adsolut.bbitaly.exception.Code;
import javax.validation.constraints.NotNull;

/**
 *
 * @author marcello
 */
public class BookGetByUser extends SignedRequest {

    @NotNull(message = Code.Sintax.REQUEST_NOT_VALID)
    @UserExist(message = Code.User.USER_NOT_EXIST)
    private Long uid;

    public Long getUid() {
        return uid;
    }

    public void setUid(Long uid) {
        this.uid = uid;
    }
}
