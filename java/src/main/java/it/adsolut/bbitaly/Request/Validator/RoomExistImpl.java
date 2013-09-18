/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.Request.Validator;

import it.adsolut.bbitaly.dao.RoomDao;
import javax.validation.ConstraintValidator;
import javax.validation.ConstraintValidatorContext;
import org.springframework.beans.factory.annotation.Autowired;

/**
 *
 * @author marcello
 */
public class RoomExistImpl implements ConstraintValidator<RoomExist, Long> {

    /**
     * @todo togliere il DAO e mettere il service
     */
    @Autowired
    private RoomDao roomdao;

    @Override
    public void initialize(RoomExist a) {
    }

    @Override
    public boolean isValid(Long t, ConstraintValidatorContext cvc) {
        return roomdao.find(t) != null;
    }
}
