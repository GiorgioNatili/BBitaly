package it.adsolut.bbitaly.controller;

import it.adsolut.bbitaly.Request.AuthOwnerRequest;
import it.adsolut.bbitaly.Request.AuthUserRequest;
import it.adsolut.bbitaly.response.OwnerResponse;
import it.adsolut.bbitaly.response.UserResponse;
import it.adsolut.bbitaly.service.Interface.OwnerControllerService;
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

@Controller
public class AuthController {

    @Resource(name = "dozermapper")
    protected DozerBeanMapper dozermapper;
    @Resource(name = "ownerservice")
    private OwnerControllerService ownerService;
    @Resource(name = "userservice")
    private UserControllerService userService;

    @RequestMapping(value = "/auth/owner", method = RequestMethod.GET)
    public @ResponseBody 
    OwnerResponse loginHandler(@Valid AuthOwnerRequest authOwnerRequest,
            BindingResult results,
            ModelMap map) {
        System.out.println("-------------------------------------------------");
        System.out.println("called owner login");
        System.out.println("-------------------------------------------------");
        OwnerResponse ownerResponse = new OwnerResponse(dozermapper);
        if (!results.hasErrors()) {
            ownerResponse = ownerService.login(authOwnerRequest, ownerResponse);
        } else {
            ownerResponse.addError(results.getAllErrors());
        }
        return ownerResponse;
    }
    
    @RequestMapping(value = "/auth/user", method = RequestMethod.GET)
    public @ResponseBody 
    UserResponse loginHandler(@Valid AuthUserRequest authUserRequest,
            BindingResult results,
            ModelMap map) {
        UserResponse userResponse = new UserResponse(dozermapper);
        if (!results.hasErrors()) {
            userResponse = userService.login(authUserRequest, userResponse);
        } else {
            userResponse.addError(results.getAllErrors());
        }
        return userResponse;
    }
}
