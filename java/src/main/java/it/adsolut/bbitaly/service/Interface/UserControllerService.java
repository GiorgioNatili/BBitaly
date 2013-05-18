/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service.Interface;

import it.adsolut.bbitaly.Request.AuthUserRequest;
import it.adsolut.bbitaly.Request.UserDeleteRequest;
import it.adsolut.bbitaly.Request.UserGetRequest;
import it.adsolut.bbitaly.Request.UserInsertRequest;
import it.adsolut.bbitaly.Request.UserUpdateRequest;
import it.adsolut.bbitaly.response.UserResponse;

/**
 *
 * @author Marcello
 */
public interface UserControllerService {
    public UserResponse activate(UserGetRequest userGetRequest, UserResponse UserResponse);
    public UserResponse add(UserInsertRequest userInsertRequest, UserResponse UserResponse);
    public UserResponse get(UserGetRequest userGetRequest, UserResponse userResponse);
    public UserResponse update(UserUpdateRequest userUpdateRequest, UserResponse userResponse);
    public UserResponse delete(UserDeleteRequest userDeleteRequest, UserResponse userResponse);
    public UserResponse login(AuthUserRequest authUserRequest, UserResponse userResponse);
}
