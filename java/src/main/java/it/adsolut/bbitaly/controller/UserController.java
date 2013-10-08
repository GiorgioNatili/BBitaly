/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.controller;

import it.adsolut.bbitaly.Request.UserDeleteRequest;
import it.adsolut.bbitaly.Request.UserGetRequest;
import it.adsolut.bbitaly.Request.UserInsertRequest;
import it.adsolut.bbitaly.Request.UserUpdateRequest;
import it.adsolut.bbitaly.response.UserResponse;
import it.adsolut.bbitaly.service.Interface.UserControllerService;
import javax.annotation.Resource;
import javax.validation.Valid;
import org.dozer.DozerBeanMapper;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.ResponseBody;

/**
 *
 * @author Marcello
 */
@Controller
public class UserController {
    
    @Resource(name = "dozermapper")
    protected DozerBeanMapper dozermapper;
    
    @Resource(name = "userservice")
    private UserControllerService userService;
    
    @RequestMapping(value = "/user", method = RequestMethod.POST)
    public @ResponseBody
    UserResponse insertOwner(@Valid UserInsertRequest userInsertRequest,
            BindingResult results,
            ModelMap map) {
        UserResponse userResponse = new UserResponse(dozermapper);
        if (!results.hasErrors()) {
            userResponse = userService.add(userInsertRequest, userResponse);
        } else {
            userResponse.addError(results.getAllErrors());
        }
        return userResponse;
    }
    
    @RequestMapping(value = "/user", method = RequestMethod.GET)
    public @ResponseBody
    UserResponse getOwner(@Valid UserGetRequest userGetRequest,
            BindingResult results,
            ModelMap map) {
        UserResponse userResponse = new UserResponse(dozermapper);
        if (!results.hasErrors()) {
            userResponse = userService.get(userGetRequest, userResponse);
        } else {
            userResponse.addError(results.getAllErrors());
        }
        return userResponse;
    }
    
    @RequestMapping(value = "/user/update", method = RequestMethod.POST)
    public @ResponseBody
    UserResponse updateUser(@Valid UserUpdateRequest userUpdateRequest,
            BindingResult results,
            ModelMap map) {
        UserResponse userResponse = new UserResponse(dozermapper);
        if (!results.hasErrors()) {
            userResponse = userService.update(userUpdateRequest, userResponse);
        } else {
            userResponse.addError(results.getAllErrors());
        }
        return userResponse;
    }
    
    @RequestMapping(value = "/user/delete", method = RequestMethod.POST)
    public @ResponseBody
    UserResponse deleteOwner(@Valid UserDeleteRequest userDeleteRequest,
            BindingResult results,
            ModelMap map) {
        UserResponse userResponse = new UserResponse(dozermapper);
        if (!results.hasErrors()) {
            userResponse = userService.delete(userDeleteRequest, userResponse);
        } else {
            userResponse.addError(results.getAllErrors());
        }
        return userResponse;
    }
    
    @RequestMapping(value = "/user/activate", method = RequestMethod.POST)
    public @ResponseBody
    UserResponse activateUser(@Valid UserGetRequest userDeleteRequest,
            BindingResult results,
            ModelMap map) {
        UserResponse userResponse = new UserResponse(dozermapper);
        if (!results.hasErrors()) {
            userResponse = userService.activate(userDeleteRequest, userResponse);
        } else {
            userResponse.addError(results.getAllErrors());
        }
        return userResponse;
    }
}
