/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.controller;

import it.adsolut.bbitaly.Request.AddPriceRequest;
import it.adsolut.bbitaly.Request.BbCountByOwnerRequest;
import it.adsolut.bbitaly.Request.BbCountRequest;
import it.adsolut.bbitaly.Request.BbDeleteRequest;
import it.adsolut.bbitaly.Request.BbGalleryGetRequest;
import it.adsolut.bbitaly.Request.BbGetAllRequest;
import it.adsolut.bbitaly.Request.BbGetByOwnerRequest;
import it.adsolut.bbitaly.Request.BbGetRequest;
import it.adsolut.bbitaly.Request.BbInsertRequest;
import it.adsolut.bbitaly.Request.PhotoDeleteRequest;
import it.adsolut.bbitaly.Request.BbPhotoReorderRequest;
import it.adsolut.bbitaly.Request.BbUpdateRequest;
import it.adsolut.bbitaly.Request.FacilityGetRequest;
import it.adsolut.bbitaly.Request.PolicyGetRequest;
import it.adsolut.bbitaly.Request.PriceGetByIntervalRequest;
import it.adsolut.bbitaly.Request.RoomDeleteRequest;
import it.adsolut.bbitaly.Request.RoomGalleryGetRequest;
import it.adsolut.bbitaly.Request.RoomGetByBbRequest;
import it.adsolut.bbitaly.Request.RoomGetRequest;
import it.adsolut.bbitaly.Request.RoomInsertRequest;
import it.adsolut.bbitaly.Request.RoomPhotoReorderRequest;
import it.adsolut.bbitaly.Request.RoomUpdateRequest;
import it.adsolut.bbitaly.response.BbCountResponse;
import it.adsolut.bbitaly.response.BbGalleryResponse;
import it.adsolut.bbitaly.response.BbListResponse;
import it.adsolut.bbitaly.response.BbResponse;
import it.adsolut.bbitaly.response.FacilityListResponse;
import it.adsolut.bbitaly.response.PhotoResponse;
import it.adsolut.bbitaly.response.PolicyListResponse;
import it.adsolut.bbitaly.response.RoomGalleryResponse;
import it.adsolut.bbitaly.response.RoomListResponse;
import it.adsolut.bbitaly.response.RoomPriceListResponse;
import it.adsolut.bbitaly.response.RoomResponse;
import it.adsolut.bbitaly.response.RoomTotalPriceResponse;
import it.adsolut.bbitaly.service.Interface.BbControllerService;
import it.adsolut.bbitaly.service.Interface.BbGalleryControllerService;
import it.adsolut.bbitaly.service.Interface.FacilityControllerService;
import it.adsolut.bbitaly.service.Interface.PolicyControllerService;
import it.adsolut.bbitaly.service.Interface.RoomControllerService;
import it.adsolut.bbitaly.service.Interface.RoomGalleryControllerService;
import javax.annotation.Resource;
import javax.servlet.http.HttpServletRequest;
import javax.validation.Valid;
import org.dozer.DozerBeanMapper;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.WebDataBinder;
import org.springframework.web.bind.annotation.InitBinder;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;

/**
 *
 * @author marcello
 */
@Controller
public class BbController {

    @Resource(name = "dozermapper")
    protected DozerBeanMapper dozermapper;
    @Resource(name = "bbgalleryservice")
    private BbGalleryControllerService bbGalleryService;
    @Resource(name = "roomgalleryservice")
    private RoomGalleryControllerService roomGalleryService;
    @Resource(name = "bbservice")
    private BbControllerService bbService;
    @Resource(name = "facilityservice")
    private FacilityControllerService facilityService;
    @Resource(name = "policyservice")
    private PolicyControllerService policyService;
    @Resource(name = "roomservice")
    private RoomControllerService roomService;

//    @InitBinder
//    public void initBinder(final WebDataBinder binder) {
//        
//    }
    
    @RequestMapping(value = "/bb", method = RequestMethod.POST)
    public @ResponseBody
    BbResponse insertBB(@Valid BbInsertRequest bbInsertRequest,
            BindingResult results,
            ModelMap map) {
        BbResponse bbResponse = new BbResponse(dozermapper);
        if (!results.hasErrors()) {
            bbResponse = bbService.insert(bbInsertRequest, bbResponse);
        } else {
            bbResponse.addError(results.getAllErrors());
        }
        return bbResponse;
    }

    @RequestMapping(value = "/bb/update", method = RequestMethod.POST)
    public @ResponseBody
    BbResponse updateBB(@Valid BbUpdateRequest bbUpdateRequest,
            BindingResult results,
            ModelMap map) {
        BbResponse bbResponse = new BbResponse(dozermapper);
        if (!results.hasErrors()) {
            bbResponse = bbService.update(bbUpdateRequest, bbResponse);
        } else {
            bbResponse.addError(results.getAllErrors());
        }
        return bbResponse;
    }

    @RequestMapping(value = "/bb/delete", method = RequestMethod.POST)
    public @ResponseBody
    BbResponse deleteBB(@Valid BbDeleteRequest bbDeleteRequest,
            BindingResult results,
            ModelMap map) {
        BbResponse bbResponse = new BbResponse(dozermapper);
        if (!results.hasErrors()) {
            bbResponse = bbService.delete(bbDeleteRequest, bbResponse);
        } else {
            bbResponse.addError(results.getAllErrors());
        }
        return bbResponse;
    }

    @RequestMapping(value = "/bb", method = RequestMethod.GET)
    public @ResponseBody
    BbResponse insertBB(@Valid BbGetRequest bbGetRequest,
            BindingResult results,
            ModelMap map) {
        BbResponse bbResponse = new BbResponse(dozermapper);
        if (!results.hasErrors()) {
            bbResponse = bbService.get(bbGetRequest, bbResponse);
        } else {
            bbResponse.addError(results.getAllErrors());
        }
        return bbResponse;
    }

    @RequestMapping(value = "/bb/cover", method = RequestMethod.POST)
    public @ResponseBody
    BbResponse savecover(ModelMap map,
            @RequestParam String id,
            HttpServletRequest request) {
        BbResponse bbResponse = new BbResponse(dozermapper);
        return bbService.setCover(id, request, bbResponse);
    }

    @RequestMapping(value = "/bb/gallery", method = RequestMethod.GET)
    public @ResponseBody
    BbGalleryResponse getgallery(@Valid BbGalleryGetRequest bbGetRequest,
            BindingResult results,
            ModelMap map) {
        BbGalleryResponse bbResponse = new BbGalleryResponse(dozermapper);
        if (!results.hasErrors()) {
            bbResponse = bbGalleryService.get(bbGetRequest, bbResponse);
        } else {
            bbResponse.addError(results.getAllErrors());
        }
        return bbResponse;
    }

    @RequestMapping(value = "/bb/gallery/delete", method = RequestMethod.POST)
    public @ResponseBody
    PhotoResponse deletegalleryphoto(@Valid PhotoDeleteRequest bbDeleteRequest,
            BindingResult results,
            ModelMap map) {
        PhotoResponse photoResponse = new PhotoResponse(dozermapper);
        if (!results.hasErrors()) {
            photoResponse = bbGalleryService.delete(bbDeleteRequest, photoResponse);
        } else {
            photoResponse.addError(results.getAllErrors());
        }
        return photoResponse;
    }

    @RequestMapping(value = "/bb/gallery/update", method = RequestMethod.POST)
    public @ResponseBody
    BbGalleryResponse updategalleryphoto(@Valid BbPhotoReorderRequest bbReorderRequest,
            BindingResult results,
            ModelMap map) {
        BbGalleryResponse photoResponse = new BbGalleryResponse(dozermapper);
        if (!results.hasErrors()) {
            photoResponse = bbGalleryService.reorderBbPhoto(bbReorderRequest, photoResponse);
        } else {
            photoResponse.addError(results.getAllErrors());
        }
        return photoResponse;
    }

    @RequestMapping(value = "/bb/gallery", method = RequestMethod.POST)
    public @ResponseBody
    BbGalleryResponse addphoto(ModelMap map,
            @RequestParam String id,
            HttpServletRequest request) {
        BbGalleryResponse bbGalleryResponse = new BbGalleryResponse(dozermapper);
        return bbGalleryService.addPhoto(id, request, bbGalleryResponse);
    }

    @RequestMapping(value = "/bb/byowner", method = RequestMethod.GET)
    public @ResponseBody
    BbListResponse getbyowner(@Valid BbGetByOwnerRequest bbGetByOwnerRequest,
            BindingResult results,
            ModelMap map) {
        BbListResponse bbListResponse = new BbListResponse(dozermapper);
        if (!results.hasErrors()) {
            bbListResponse = bbService.getByOwner(bbGetByOwnerRequest, bbListResponse);
        } else {
            bbListResponse.addError(results.getAllErrors());
        }
        return bbListResponse;
    }

    @RequestMapping(value = "/bb/all", method = RequestMethod.GET)
    public @ResponseBody
    BbListResponse getall(@Valid BbGetAllRequest bbGetAllRequest,
            BindingResult results,
            ModelMap map) {
        BbListResponse bbListResponse = new BbListResponse(dozermapper);
        if (!results.hasErrors()) {
            bbListResponse = bbService.getAll(bbGetAllRequest, bbListResponse);
        } else {
            bbListResponse.addError(results.getAllErrors());
        }
        return bbListResponse;
    }
    
    @RequestMapping(value = "/bb/allcount", method = RequestMethod.GET)
    public @ResponseBody
    BbCountResponse getall(@Valid BbCountRequest bbCountRequest,
            BindingResult results,
            ModelMap map) {
        BbCountResponse bbCountResponse = new BbCountResponse(dozermapper);
        if (!results.hasErrors()) {
            bbCountResponse = bbService.countCountAll(bbCountRequest, bbCountResponse);
        } else {
            bbCountResponse.addError(results.getAllErrors());
        }
        return bbCountResponse;
    }

    @RequestMapping(value = "/bb/countbyonwer", method = RequestMethod.GET)
    public @ResponseBody
    BbCountResponse countbyowner(@Valid BbCountByOwnerRequest bbCountRequest,
            BindingResult results,
            ModelMap map) {
        BbCountResponse bbCountResponse = new BbCountResponse(dozermapper);
        if (!results.hasErrors()) {
            bbCountResponse = bbService.countByOwner(bbCountRequest, bbCountResponse);
        } else {
            bbCountResponse.addError(results.getAllErrors());
        }
        return bbCountResponse;
    }

    @RequestMapping(value = "/bb/policy", method = RequestMethod.GET)
    public @ResponseBody
    PolicyListResponse getpolicy(@Valid PolicyGetRequest policyGetRequest,
            BindingResult results,
            ModelMap map) {
        PolicyListResponse policyListResponse = new PolicyListResponse(dozermapper);
        if (!results.hasErrors()) {
            policyListResponse = policyService.getAll(policyGetRequest, policyListResponse);
        } else {
            policyListResponse.addError(results.getAllErrors());
        }
        return policyListResponse;
    }

    @RequestMapping(value = "/bb/facility", method = RequestMethod.GET)
    public @ResponseBody
    FacilityListResponse getfacility(@Valid FacilityGetRequest facilityGetRequest,
            BindingResult results,
            ModelMap map) {
        FacilityListResponse facilityListResponse = new FacilityListResponse(dozermapper);
        if (!results.hasErrors()) {
            facilityListResponse = facilityService.getAll(facilityGetRequest, facilityListResponse);
        } else {
            facilityListResponse.addError(results.getAllErrors());
        }
        return facilityListResponse;
    }

    @RequestMapping(value = "/bb/room", method = RequestMethod.POST)
    public @ResponseBody
    RoomResponse addroom(@Valid RoomInsertRequest roomInsertRequest,
            BindingResult results,
            ModelMap map) {
        RoomResponse roomInsertResponse = new RoomResponse(dozermapper);
        if (!results.hasErrors()) {
            roomInsertResponse = roomService.save(roomInsertRequest, roomInsertResponse);
        } else {
            roomInsertResponse.addError(results.getAllErrors());
        }
        return roomInsertResponse;
    }

    @RequestMapping(value = "/bb/room", method = RequestMethod.GET)
    public @ResponseBody
    RoomResponse getroom(@Valid RoomGetRequest roomGetRequest,
            BindingResult results,
            ModelMap map) {
        RoomResponse roomInsertResponse = new RoomResponse(dozermapper);
        if (!results.hasErrors()) {
            roomInsertResponse = roomService.get(roomGetRequest, roomInsertResponse);
        } else {
            roomInsertResponse.addError(results.getAllErrors());
        }
        return roomInsertResponse;
    }

    @RequestMapping(value = "/bb/room/byaccomodation", method = RequestMethod.GET)
    public @ResponseBody
    RoomListResponse getroombyaccomodation(@Valid RoomGetByBbRequest roomGetRequest,
            BindingResult results,
            ModelMap map) {
        RoomListResponse roomResponse = new RoomListResponse(dozermapper);
        if (!results.hasErrors()) {
            roomResponse = roomService.getByBb(roomGetRequest, roomResponse);
        } else {
            roomResponse.addError(results.getAllErrors());
        }
        return roomResponse;
    }

    @RequestMapping(value = "/bb/room/delete", method = RequestMethod.POST)
    public @ResponseBody
    RoomResponse getroom(@Valid RoomDeleteRequest roomDeleteRequest,
            BindingResult results,
            ModelMap map) {
        RoomResponse roomDeleteResponse = new RoomResponse(dozermapper);
        if (!results.hasErrors()) {
            roomDeleteResponse = roomService.delete(roomDeleteRequest, roomDeleteResponse);
        } else {
            roomDeleteResponse.addError(results.getAllErrors());
        }
        return roomDeleteResponse;
    }
    
    @RequestMapping(value = "/bb/room/price", method = RequestMethod.POST)
    public @ResponseBody
    RoomResponse addPrice(@Valid AddPriceRequest addPriceRequest,
            BindingResult results,
            ModelMap map) {
        RoomResponse roomResponse = new RoomResponse(dozermapper);
        if (!results.hasErrors()) {
            roomResponse = roomService.addprice(addPriceRequest, roomResponse);
        } else {
            roomResponse.addError(results.getAllErrors());
        }
        return roomResponse;
    }
    
    @RequestMapping(value = "/bb/room/price", method = RequestMethod.GET)
    public @ResponseBody
    RoomPriceListResponse addPrice(@Valid PriceGetByIntervalRequest priceGetRequest,
            BindingResult results,
            ModelMap map) {
        RoomPriceListResponse roomPriceResponse = new RoomPriceListResponse(dozermapper);
        if (!results.hasErrors()) {
            roomPriceResponse = roomService.getPriceByDate(priceGetRequest, roomPriceResponse);
        } else {
            roomPriceResponse.addError(results.getAllErrors());
        }
        return roomPriceResponse;
    }
    
    @RequestMapping(value = "/bb/room/pricetotal", method = RequestMethod.GET)
    public @ResponseBody
    RoomTotalPriceResponse getTotal(@Valid PriceGetByIntervalRequest priceGetRequest,
            BindingResult results,
            ModelMap map) {
        RoomTotalPriceResponse roomPriceResponse = new RoomTotalPriceResponse(dozermapper);
        if (!results.hasErrors()) {
            roomPriceResponse = roomService.getTotalByDate(priceGetRequest, roomPriceResponse);
        } else {
            roomPriceResponse.addError(results.getAllErrors());
        }
        return roomPriceResponse;
    }

    @RequestMapping(value = "/bb/room/cover", method = RequestMethod.POST)
    public @ResponseBody
    RoomResponse roomcover(ModelMap map,
            @RequestParam Long id,
            HttpServletRequest request) {
        RoomResponse roomResponse = new RoomResponse(dozermapper);
        return roomService.setCover(id, request, roomResponse);
    }

    @RequestMapping(value = "/bb/room/update", method = RequestMethod.POST)
    public @ResponseBody
    RoomResponse roomupdate(@Valid RoomUpdateRequest roomUpdateRequest,
            BindingResult results,
            ModelMap map) {
        RoomResponse roomResponse = new RoomResponse(dozermapper);
        if (!results.hasErrors()) {
            roomResponse = roomService.update(roomUpdateRequest, roomResponse);
        } else {
            roomResponse.addError(results.getAllErrors());
        }
        return roomResponse;
    }

    @RequestMapping(value = "/bb/room/gallery", method = RequestMethod.GET)
    public @ResponseBody
    RoomGalleryResponse getroomgalleryphoto(@Valid RoomGalleryGetRequest roomGalleryGetRequest,
            BindingResult results,
            ModelMap map) {
        RoomGalleryResponse photoResponse = new RoomGalleryResponse(dozermapper);
        if (!results.hasErrors()) {
            photoResponse = roomGalleryService.get(roomGalleryGetRequest, photoResponse);
        } else {
            photoResponse.addError(results.getAllErrors());
        }
        return photoResponse;
    }
    
    @RequestMapping(value = "/bb/room/gallery", method = RequestMethod.POST)
    public @ResponseBody
    RoomGalleryResponse addroomphoto(ModelMap map,
            @RequestParam Long id,
            HttpServletRequest request) {
        RoomGalleryResponse roomGalleryResponse = new RoomGalleryResponse(dozermapper);
        return roomGalleryService.addPhoto(id, request, roomGalleryResponse);
    }
    
    @RequestMapping(value = "/bb/room/gallery/update", method = RequestMethod.POST)
    public @ResponseBody
    RoomGalleryResponse updateroomgalleryphoto(@Valid RoomPhotoReorderRequest roomReorderRequest,
            BindingResult results,
            ModelMap map) {
        RoomGalleryResponse photoResponse = new RoomGalleryResponse(dozermapper);
        if (!results.hasErrors()) {
            photoResponse = roomGalleryService.reorderRoomPhoto(roomReorderRequest, photoResponse);
        } else {
            photoResponse.addError(results.getAllErrors());
        }
        return photoResponse;
    }
}
