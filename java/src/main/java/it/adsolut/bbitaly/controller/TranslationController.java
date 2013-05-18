package it.adsolut.bbitaly.controller;

import it.adsolut.bbitaly.Request.BbGetTranslationRequest;
import it.adsolut.bbitaly.Request.BbInsertTranslationRequest;
import it.adsolut.bbitaly.Request.RoomGetTranslationRequest;
import it.adsolut.bbitaly.Request.RoomInsertTranslationRequest;
import it.adsolut.bbitaly.response.BbTranslationListResponse;
import it.adsolut.bbitaly.response.BbTranslationResponse;
import it.adsolut.bbitaly.response.RoomTranslationListResponse;
import it.adsolut.bbitaly.response.RoomTranslationResponse;
import it.adsolut.bbitaly.service.Interface.TranslationControllerService;
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
public class TranslationController {

    @Resource(name = "dozermapper")
    protected DozerBeanMapper dozermapper;
    @Resource(name = "translationservice")
    private TranslationControllerService translationService;

    @RequestMapping(value = "/translation/bb", method = RequestMethod.GET)
    public @ResponseBody
    BbTranslationListResponse bbget(@Valid BbGetTranslationRequest bbGetTranslationRequest,
            BindingResult results,
            ModelMap map) {
        BbTranslationListResponse response = new BbTranslationListResponse(dozermapper);
        if (!results.hasErrors()) {
            translationService.getBbTranslation(bbGetTranslationRequest, response);
        } else {
            response.addError(results.getAllErrors());
        }
        return response;
    }

    @RequestMapping(value = "/translation/bb", method = RequestMethod.POST)
    public @ResponseBody
    BbTranslationResponse bbadd(@Valid BbInsertTranslationRequest bbInsertTranslationRequest,
            BindingResult results,
            ModelMap map) {
        BbTranslationResponse response = new BbTranslationResponse(dozermapper);
        if (!results.hasErrors()) {
            translationService.insertBbTranslation(bbInsertTranslationRequest, response);
        } else {
            response.addError(results.getAllErrors());
        }
        return response;
    }

    @RequestMapping(value = "/translation/room", method = RequestMethod.GET)
    public @ResponseBody
    RoomTranslationListResponse roomget(@Valid RoomGetTranslationRequest roomGetTranslationRequest,
            BindingResult results,
            ModelMap map) {
        RoomTranslationListResponse response = new RoomTranslationListResponse(dozermapper);
        if (!results.hasErrors()) {
            translationService.getRoomTranslation(roomGetTranslationRequest, response);
        } else {
            response.addError(results.getAllErrors());
        }
        return response;
    }

    @RequestMapping(value = "/translation/room", method = RequestMethod.POST)
    public @ResponseBody
    RoomTranslationResponse roomadd(@Valid RoomInsertTranslationRequest roomInsertTranslationRequest,
            BindingResult results,
            ModelMap map) {
        RoomTranslationResponse response = new RoomTranslationResponse(dozermapper);
        if (!results.hasErrors()) {
            translationService.insertRoomTranslation(roomInsertTranslationRequest, response);
        } else {
            response.addError(results.getAllErrors());
        }
        return response;
    }
}
