package it.adsolut.bbitaly.Request.Validator;

import it.adsolut.bbitaly.dao.PhotoDao;
import javax.validation.ConstraintValidator;
import javax.validation.ConstraintValidatorContext;
import org.springframework.beans.factory.annotation.Autowired;

/**
 *
 * @author marcello
 */
public class PhotoExistImpl implements ConstraintValidator<PhotoExist, Long> {

    @Autowired
    private PhotoDao photodao;
    
    @Override
    public void initialize(PhotoExist a) { }

    @Override
    public boolean isValid(Long t, ConstraintValidatorContext cvc) {
        return photodao.find(t) != null;
    }
    
}
