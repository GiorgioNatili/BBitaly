/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.User;
import org.dozer.DozerBeanMapper;


/**
 *
 * @author Marcello
 */
public class UserResponse extends Response<User,it.adsolut.bbitaly.response.vo.User> {

    public UserResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }

    @Override
    protected it.adsolut.bbitaly.response.vo.User map(User data) {
        return dozermapper.map(data, it.adsolut.bbitaly.response.vo.User.class);
    }
    
}
