/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.Request.Validator;

import it.adsolut.bbitaly.dao.RegionDao;
import javax.validation.ConstraintValidator;
import javax.validation.ConstraintValidatorContext;
import org.springframework.beans.factory.annotation.Autowired;

/**
 *
 * @author marcello
 */
public class NotRegionExistImpl  implements ConstraintValidator<NotRegionExist, Long> {

    @Autowired
    private RegionDao regiondao;
    
    @Override
    public void initialize(NotRegionExist a) { }

    @Override
    public boolean isValid(Long t, ConstraintValidatorContext cvc) {
        return regiondao.find(t) != null;
    }
    
}
