/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.controller;

import it.adsolut.bbitaly.dao.LocationDao;
import it.adsolut.bbitaly.model.BbTranslation;
import it.adsolut.bbitaly.model.BedBreakfast;
import it.adsolut.bbitaly.model.Country;
import it.adsolut.bbitaly.model.Owner;
import it.adsolut.bbitaly.model.Room;
import it.adsolut.bbitaly.model.RoomTranslation;
import it.adsolut.bbitaly.response.RoomResponse;
import it.adsolut.bbitaly.service.LocationService;
import it.adsolut.bbitaly.service.UserService;
import it.adsolut.bbitaly.util.google.GeocodeResult;
import it.adsolut.bbitaly.util.google.PlaceData;
import it.adsolut.bbitaly.util.google.PlaceResult;
import it.adsolut.bbitaly.util.google.api.Coordinate;
import it.adsolut.bbitaly.util.google.api.GeocodeClient;
import it.adsolut.bbitaly.util.google.api.PlacesClient;
import it.adsolut.bbitaly.util.google.api.Radius;
import it.adsolut.bbitaly.util.google.api.Types;
import java.util.HashSet;
import java.util.List;
import java.util.Set;
import javax.annotation.Resource;
import org.dozer.DozerBeanMapper;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.ResponseBody;

/**
 *
 * @author marcello
 */
@Controller
public class IndexController {

    @Resource(name = "locationdao")
    private LocationDao locationdao;
    @Resource(name = "locationservice")
    private LocationService locationService;
    @Resource(name = "userservice")
    private UserService userService;
    @Resource(name = "gmapclient")
    private PlacesClient gmapclient;
    @Resource(name = "gmapgeocodeclient")
    private GeocodeClient geocodeclient;
//    @RequestMapping(value = "/bb/{id}", method = RequestMethod.GET)
//    public @ResponseBody
//    ModelMap indexAction(@PathVariable Long id, ModelMap map) {
//        List<Location> locations = new ArrayList<Location>();
//        if (locationService.get(id) == null) {
//            throw new NullPointerException("ciao");
//        }
//        locations.add(locationService.get(id));
//        locations.add(locationService.get(id));
//        locations.add(locationService.get(id));
//        map.addAttribute("data", locations);
//        return map;
//    }
    @Resource(name = "dozermapper")
    protected DozerBeanMapper dozermapper;

    @RequestMapping(value = "/solr", method = RequestMethod.GET)
    public @ResponseBody
    ModelMap query(ModelMap map) {
        return map.addAttribute("res", locationdao.fastPoiSearch("napoli"));
    }
    
    @RequestMapping(value = "/testmap", method = RequestMethod.GET)
    public @ResponseBody
    RoomResponse map(ModelMap map) {
        /**
         * DATI CHE PRENDERò DAL DB
         */
        Owner o = new Owner();
        o.setActive(Boolean.TRUE);
        o.setAddress("test address");
        o.setEmail("test@email.com");
        o.setId(1L);
        o.setName("test name");

        BedBreakfast bb = new BedBreakfast();
        bb.setId("1S");
        bb.setName("test prop");
        bb.setAssignedname("cacca");
        bb.setPhone("980779");
        bb.setContactemail("ugfwe@vwvwr.it");
        bb.setType("BB");
        bb.setRank(0);
        bb.setActive(Boolean.TRUE);
        bb.setAddress("test address");

        Set<BbTranslation> bbTranslations = new HashSet<BbTranslation>();
        Country c1 = new Country();
        c1.setName("italia");
        c1.setPrefix("it");

        Country c2 = new Country();
        c2.setName("spagna");
        c2.setPrefix("es");

        BbTranslation bbTranslation = new BbTranslation();
        bbTranslation.setDescription("ciao caro");
        bbTranslation.setLang(c1);

        BbTranslation bbTranslation2 = new BbTranslation();
        bbTranslation2.setDescription("ciao caro2");
        bbTranslation2.setLang(c2);

        bbTranslations.add(bbTranslation);
        bbTranslations.add(bbTranslation2);
        bb.setDescription(bbTranslations);
        bb.setLatitude(14.1F);
        bb.setLongitude(12.8F);

        bb.setOwner(o);

        Set<RoomTranslation> rts = new HashSet<RoomTranslation>();
        RoomTranslation rt1 = new RoomTranslation();
        rt1.setGeneralDescription("gen it");
        rt1.setPlaceDescription("place it");
        rt1.setShortDescription("short it");
        rt1.setLang(c1);
        rts.add(rt1);

        RoomTranslation rt2 = new RoomTranslation();
        rt2.setGeneralDescription("gen es");
        rt2.setPlaceDescription("place es");
        rt2.setShortDescription("short es");
        rt2.setLang(c2);
        rts.add(rt2);

        Room r1 = new Room();
        r1.setAmount(5);
        r1.setMinCapacity(1);
        r1.setMaxCapacity(5);
        r1.setBedBrekfast(bb);
        r1.setDescription(rts);

        //trovare un modo per iniettare il dozer mapper in oggetti creati al volo
        RoomResponse r = new RoomResponse(dozermapper);
        //metodo che verrà invocato dal service
        r.setData(r1);
        return r;
    }

    @RequestMapping(value = "/test/{address}/{radius}/{types}", method = RequestMethod.GET)
    public @ResponseBody
    ModelMap testAction(ModelMap map,
            @PathVariable String address,
            @PathVariable Integer radius,
            @PathVariable String types) throws Exception {
        geocodeclient.setAddress(address);
        geocodeclient.setSensor("false");
        List<GeocodeResult> resg = geocodeclient.getResponse().getResults();

        Coordinate c = new Coordinate();
        c.setLatitude(resg.get(0).getGeometry().getLocation().get("lat"));
        c.setLongitude(resg.get(0).getGeometry().getLocation().get("lng"));
        gmapclient.setLocation(c);

        Radius r = new Radius();
        r.setRadius(radius);
        gmapclient.setRadius(r);

        gmapclient.setSensor("true");

        Types t = new Types();
        t.addType(types);
        gmapclient.setTypes(t);

        PlaceData mapData = gmapclient.getResponse();
        List<PlaceResult> res = mapData.getResults();
        Integer i = 0;
        for (PlaceResult place : res) {
            map.addAttribute(place.getId(), place.getName());
            i++;
        }
        return map;
    }
}