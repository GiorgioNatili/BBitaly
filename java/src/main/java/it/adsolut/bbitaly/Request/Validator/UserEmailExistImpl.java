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
public class UserEmailExistImpl implements ConstraintValidator<UserEmailExist, String> {

    @Autowired
    private UserDao userDao;
    
    @Override
    public void initialize(UserEmailExist a) { }

    @Override
    public boolean isValid(String t, ConstraintValidatorContext cvc) {
        return userDao.findByEmail(t) == null;
    }
    
}
