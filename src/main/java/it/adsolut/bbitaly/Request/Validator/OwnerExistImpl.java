/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.Request.Validator;

import it.adsolut.bbitaly.dao.OwnerDao;
import javax.validation.ConstraintValidator;
import javax.validation.ConstraintValidatorContext;
import org.springframework.beans.factory.annotation.Autowired;

/**
 *
 * @author marcello
 */
public class OwnerExistImpl implements ConstraintValidator<OwnerExist, Long> {

    /**
     * @todo togliere il DAO e mettere il service
     */
    @Autowired
    private OwnerDao ownerdao;

    @Override
    public void initialize(OwnerExist a) {
    }

    @Override
    public boolean isValid(Long t, ConstraintValidatorContext cvc) {
        return ownerdao.findByiD(t) != null;
    }
}
