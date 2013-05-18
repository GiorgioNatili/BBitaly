package it.adsolut.bbitaly.Request.Validator;

import it.adsolut.bbitaly.dao.BbGalleryDao;
import it.adsolut.bbitaly.dao.BedBreakfastDao;
import it.adsolut.bbitaly.model.BedBreakfast;
import javax.validation.ConstraintValidator;
import javax.validation.ConstraintValidatorContext;
import org.springframework.beans.factory.annotation.Autowired;

/**
 *
 * @author marcello
 */
public class BbGalleryExistImpl implements ConstraintValidator<BbGalleryExist, String>{

    @Autowired
    private BbGalleryDao bbGalleryDao;
    @Autowired
    private BedBreakfastDao bbDao;
    
    @Override
    public void initialize(BbGalleryExist a) { }

    @Override
    public boolean isValid(String t, ConstraintValidatorContext cvc) {
        BedBreakfast bb = bbDao.find(t);
        return bbGalleryDao.findByBb(bb) != null;
    }
    
}
