/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.Request.Validator;

import it.adsolut.bbitaly.dao.LocationDao;
import javax.validation.ConstraintValidator;
import javax.validation.ConstraintValidatorContext;
import org.springframework.beans.factory.annotation.Autowired;

/**
 *
 * @author marcello
 */
public class NotLocationImpl implements ConstraintValidator<NotLocationExist, String> {

    @Autowired
    private LocationDao locationdao;
    
    @Override
    public void initialize(NotLocationExist a) { }

    @Override
    public boolean isValid(String t, ConstraintValidatorContext cvc) {
        return locationdao.find(t) != null;
    }
    
}
