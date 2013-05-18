package it.adsolut.bbitaly.Request.Validator;

import it.adsolut.bbitaly.dao.PhotoDao;
import java.util.ArrayList;
import javax.validation.ConstraintValidator;
import javax.validation.ConstraintValidatorContext;
import org.springframework.beans.factory.annotation.Autowired;

/**
 *
 * @author marcello
 */
public class PhotoListExistImpl implements ConstraintValidator<PhotoListExist, ArrayList<Long>> {

    @Autowired
    private PhotoDao photodao;
    
    @Override
    public void initialize(PhotoListExist a) { }

    @Override
    public boolean isValid(ArrayList<Long> t, ConstraintValidatorContext cvc) {
        for (Long id : t) {
            if (photodao.find(id) == null) { return false; }
        }
        return true;
    }
    
}
