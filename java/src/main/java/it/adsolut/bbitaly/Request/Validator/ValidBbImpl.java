/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.Request.Validator;

import it.adsolut.bbitaly.dao.BedBreakfastDao;
import javax.validation.ConstraintValidator;
import javax.validation.ConstraintValidatorContext;
import org.springframework.beans.factory.annotation.Autowired;

/**
 *
 * @author marcello
 */
public class ValidBbImpl implements ConstraintValidator<ValidBb,String>{

    /**
     * @todo togliere il DAO e mettere il service
     */
    @Autowired
    private BedBreakfastDao bedBreakfastdao;
    
    @Override
    public void initialize(ValidBb a) { }

    @Override
    public boolean isValid(String t, ConstraintValidatorContext cvc) {
        return bedBreakfastdao.find(t) != null;
    }
    
}
