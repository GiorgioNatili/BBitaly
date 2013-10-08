/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.Request.Validator;

import it.adsolut.bbitaly.dao.CountryDao;
import javax.validation.ConstraintValidator;
import javax.validation.ConstraintValidatorContext;
import org.springframework.beans.factory.annotation.Autowired;

/**
 *
 * @author marcello
 */
public class LangExistImpl implements ConstraintValidator<LangExist, String> {

    /**
     * @todo togliere il DAO e mettere il service
     */
    @Autowired
    private CountryDao countrydao;

    @Override
    public void initialize(LangExist a) {
    }

    @Override
    public boolean isValid(String t, ConstraintValidatorContext cvc) {
        return countrydao.findByPrefix(t) != null;
    }
}
