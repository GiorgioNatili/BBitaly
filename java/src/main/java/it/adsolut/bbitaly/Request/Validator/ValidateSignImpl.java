package it.adsolut.bbitaly.Request.Validator;

import it.adsolut.bbitaly.Request.SignedRequest;
import it.adsolut.bbitaly.dao.ApplicationDao;
import it.adsolut.bbitaly.model.Application;
import it.adsolut.bbitaly.util.string.MessageDigest;
import javax.servlet.http.HttpServletRequest;
import javax.validation.ConstraintValidator;
import javax.validation.ConstraintValidatorContext;
import org.springframework.beans.factory.annotation.Autowired;

/**
 *
 * @author marcello
 */
public class ValidateSignImpl implements ConstraintValidator<ValidateSign, SignedRequest> {

    @Autowired
    private ApplicationDao applicationDao;

    @Autowired(required=true)
    private HttpServletRequest request;
    
    @Override
    public void initialize(ValidateSign a) {
    }

    @Override
    public boolean isValid(SignedRequest t, ConstraintValidatorContext cvc) {
//        String remotehost = request.getRemoteHost();
//        Application app = applicationDao.finByAppId(t.getAppid());
//        Boolean isValid = Boolean.FALSE;
//        if (app != null) {
//            if (remotehost.equals(app.getRemotehost())) {
//                String validSig = MessageDigest.md5(app.getId() + app.getPrivatekey());
//                if (validSig.equals(t.getSignature())) {
//                    isValid = Boolean.TRUE;
//                }
//            }
//        }
//        return isValid;
        return Boolean.TRUE;
    }
}
