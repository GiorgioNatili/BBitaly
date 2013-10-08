package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.ValidateSign;
import it.adsolut.bbitaly.exception.Code;

/**
 *
 * @author marcello
 */
@ValidateSign(message=Code.Auth.UNAUTHORIZED_REQUEST)
public class SignedRequest {
    
    private Long appid;
    
    private String signature;

    public Long getAppid() {
        return appid;
    }

    public void setAppid(Long appid) {
        this.appid = appid;
    }

    public String getSignature() {
        return signature;
    }

    public void setSignature(String signature) {
        this.signature = signature;
    }
    
}
