/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.Request.Validator;

import javax.validation.ConstraintValidator;
import javax.validation.ConstraintValidatorContext;

/**
 *
 * @author marcello
 */
public class DateValidatorImpl  implements ConstraintValidator<Date, java.util.Date>{

    @Override
    public void initialize(Date a) {
        throw new UnsupportedOperationException("Not supported yet.");
    }

    @Override
    public boolean isValid(java.util.Date t, ConstraintValidatorContext cvc) {
        throw new UnsupportedOperationException("Not supported yet.");
    }
    
}
