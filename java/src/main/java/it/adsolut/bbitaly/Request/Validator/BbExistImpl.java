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
public class BbExistImpl implements ConstraintValidator<BbExist, String>{
    /**
     * @todo togliere il DAO e mettere il service
     */
    @Autowired
    private BedBreakfastDao countrydao;

    @Override
    public void initialize(BbExist a) {
    }

    @Override
    public boolean isValid(String t, ConstraintValidatorContext cvc) {
        return countrydao.find(t) != null;
    }
}
