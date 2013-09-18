/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.Request.Validator;

import it.adsolut.bbitaly.dao.CityDao;
import javax.validation.ConstraintValidator;
import javax.validation.ConstraintValidatorContext;
import org.springframework.beans.factory.annotation.Autowired;

/**
 *
 * @author marcello
 */
public class NotCityExistImpl implements ConstraintValidator<NotCityExist, Long> {

    /**
     * @todo togliere il DAO e mettere il service
     */
    @Autowired
    private CityDao citydao;

    @Override
    public void initialize(NotCityExist a) {
    }

    @Override
    public boolean isValid(Long t, ConstraintValidatorContext cvc) {
        return citydao.find(t) != null;
    }
}
