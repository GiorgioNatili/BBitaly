/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.Request.Validator;

import it.adsolut.bbitaly.dao.UserDao;
import javax.validation.ConstraintValidator;
import javax.validation.ConstraintValidatorContext;
import org.springframework.beans.factory.annotation.Autowired;

/**
 *
 * @author Marcello
 */
public class UserExistImpl implements ConstraintValidator<UserExist, Long> {

    /**
     * @todo togliere il DAO e mettere il service
     */
    @Autowired
    private UserDao userdao;

    @Override
    public void initialize(UserExist a) { }

    @Override
    public boolean isValid(Long t, ConstraintValidatorContext cvc) {
        return userdao.find(t) != null;
    }
}