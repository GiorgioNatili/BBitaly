/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.controller;

import it.adsolut.bbitaly.Request.OwnerDeleteRequest;
import it.adsolut.bbitaly.Request.OwnerGetRequest;
import it.adsolut.bbitaly.Request.OwnerInsertRequest;
import it.adsolut.bbitaly.Request.OwnerUpdateRequest;
import it.adsolut.bbitaly.response.OwnerResponse;
import it.adsolut.bbitaly.service.Interface.OwnerControllerService;
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
 * @author marcello
 */
@Controller
public class OwnerController {

    @Resource(name = "dozermapper")
    protected DozerBeanMapper dozermapper;
    @Resource(name = "ownerservice")
    private OwnerControllerService ownerService;

    @RequestMapping(value = "/owner", method = RequestMethod.POST)
    public @ResponseBody
    OwnerResponse insertOwner(@Valid OwnerInsertRequest ownerInsertRequest,
            BindingResult results,
            ModelMap map) {
        OwnerResponse ownerResponse = new OwnerResponse(dozermapper);
        if (!results.hasErrors()) {
            ownerResponse = ownerService.insert(ownerInsertRequest, ownerResponse);
        } else {
            ownerResponse.addError(results.getAllErrors());
        }
        return ownerResponse;
    }

    @RequestMapping(value = "/owner", method = RequestMethod.GET)
    public @ResponseBody
    OwnerResponse getOwner(@Valid OwnerGetRequest ownerGetRequest,
            BindingResult results,
            ModelMap map) {
        OwnerResponse ownerResponse = new OwnerResponse(dozermapper);
        if (!results.hasErrors()) {
            ownerResponse = ownerService.get(ownerGetRequest, ownerResponse);
        } else {
            ownerResponse.addError(results.getAllErrors());
        }
        return ownerResponse;
    }
    
    @RequestMapping(value = "/owner/update", method = RequestMethod.POST)
    public @ResponseBody
    OwnerResponse updateOwner(@Valid OwnerUpdateRequest ownerUpdateRequest,
            BindingResult results,
            ModelMap map) {
        OwnerResponse ownerResponse = new OwnerResponse(dozermapper);
        if (!results.hasErrors()) {
            ownerResponse = ownerService.update(ownerUpdateRequest, ownerResponse);
        } else {
            ownerResponse.addError(results.getAllErrors());
        }
        return ownerResponse;
    }
    
    @RequestMapping(value = "/owner/delete", method = RequestMethod.POST)
    public @ResponseBody
    OwnerResponse updateOwner(@Valid OwnerDeleteRequest ownerDeleteRequest,
            BindingResult results,
            ModelMap map) {
        OwnerResponse ownerResponse = new OwnerResponse(dozermapper);
        if (!results.hasErrors()) {
            ownerResponse = ownerService.delete(ownerDeleteRequest, ownerResponse);
        } else {
            ownerResponse.addError(results.getAllErrors());
        }
        return ownerResponse;
    }
}
