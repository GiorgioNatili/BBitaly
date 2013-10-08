/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.Request.BbGetTranslationRequest;
import it.adsolut.bbitaly.Request.BbInsertTranslationRequest;
import it.adsolut.bbitaly.Request.RoomGetTranslationRequest;
import it.adsolut.bbitaly.Request.RoomInsertTranslationRequest;
import it.adsolut.bbitaly.dao.BbTranslationDao;
import it.adsolut.bbitaly.dao.CountryDao;
import it.adsolut.bbitaly.dao.RoomTranslationDao;
import it.adsolut.bbitaly.model.BbTranslation;
import it.adsolut.bbitaly.model.BedBreakfast;
import it.adsolut.bbitaly.model.Country;
import it.adsolut.bbitaly.model.Room;
import it.adsolut.bbitaly.model.RoomTranslation;
import it.adsolut.bbitaly.response.BbTranslationListResponse;
import it.adsolut.bbitaly.response.BbTranslationResponse;
import it.adsolut.bbitaly.response.RoomTranslationListResponse;
import it.adsolut.bbitaly.response.RoomTranslationResponse;
import it.adsolut.bbitaly.service.Interface.TranslationControllerService;
import java.util.Set;

/**
 *
 * @author marcello
 */
public class TranslationServiceImpl implements TranslationService, TranslationControllerService {

    private CountryDao countryDao;
    private BbTranslationDao bbTranslationDao;
    private RoomTranslationDao roomTranslationDao;
    private BbService bbService;
    private RoomService roomService;

    public void setBbService(BbService bbService) {
        this.bbService = bbService;
    }

    public void setRoomService(RoomService roomService) {
        this.roomService = roomService;
    }

    public BbTranslationDao getBbTranslationDao() {
        return bbTranslationDao;
    }

    public void setBbTranslationDao(BbTranslationDao bbTranslationDao) {
        this.bbTranslationDao = bbTranslationDao;
    }

    public void setRoomTranslationDao(RoomTranslationDao roomTranslationDao) {
        this.roomTranslationDao = roomTranslationDao;
    }

    public CountryDao getCountryDao() {
        return countryDao;
    }

    public void setCountryDao(CountryDao countryDao) {
        this.countryDao = countryDao;
    }

    @Override
    public BbTranslation createBBTranslation(String lang, String description) {
        System.out.println("--------------------------------------------------");
        System.out.println("CREATE BB TRANSLATION");
        System.out.println("--------------------------------------------------");
        BbTranslation bBtranslation = new BbTranslation();
        Country iso = countryDao.findByPrefix(lang);
        bBtranslation.setLang(iso);
        bBtranslation.setDescription(description);
        bbTranslationDao.persist(bBtranslation);
        return bBtranslation;
    }

    @Override
    public RoomTranslation createRoomTranslation(String lang,
            String shortDescription,
            String genralDescription,
            String placeDescription) {
        RoomTranslation roomTranslation = new RoomTranslation();
        Country iso = countryDao.findByPrefix(lang);
        roomTranslation.setLang(iso);
        roomTranslation.setShortDescription(shortDescription);
        roomTranslation.setGeneralDescription(genralDescription);
        roomTranslation.setPlaceDescription(placeDescription);
        roomTranslationDao.persist(roomTranslation);

        return roomTranslation;
    }

    @Override
    public Set<BbTranslation> getBbTranslation(String bbid) {
        return bbTranslationDao.findByBb(bbService.get(bbid));
    }

    @Override
    public Set<RoomTranslation> getRoomTranslation(Long roomid) {
        return roomTranslationDao.findByRoom(roomService.find(roomid));
    }

    @Override
    public BbTranslationResponse insertBbTranslation(BbInsertTranslationRequest bbInsertTranslationRequest, BbTranslationResponse bbTranslationResponse) {
        BedBreakfast bb = bbService.get(bbInsertTranslationRequest.getBbid());
        System.out.println("--------------------------------------------------");
        System.out.println(bbInsertTranslationRequest.getBbid() + " " + bbInsertTranslationRequest.getDescription() + " " + bbInsertTranslationRequest.getLang());
        System.out.println("--------------------------------------------------");
        BbTranslation bbTranslation = null;
        for (BbTranslation bt : bb.getDescription()) {
            System.out.println("--------------------------------------------------");
            System.out.println("checking if "+bt.getLang().getPrefix()+ " == " + bbInsertTranslationRequest.getLang());
            if (bt.getLang().getPrefix().equals(bbInsertTranslationRequest.getLang())) {
                bbTranslation = bt;
                System.out.println("they are equals");
                break;
            }
            System.out.println("--------------------------------------------------");
        }
        if (bbTranslation == null) {
            System.out.println("--------------------------------------------------");
            System.out.println("no translation found creating new one");
            System.out.println("--------------------------------------------------");
            bbTranslation = createBBTranslation(
                    bbInsertTranslationRequest.getLang(),
                    bbInsertTranslationRequest.getDescription());
            bb.getDescription().add(bbTranslation);
            bbService.persist(bb);
        } else {
            System.out.println("--------------------------------------------------");
            System.out.println("found old translation - updating old one");
            System.out.println("--------------------------------------------------");
            bbTranslation.setDescription(bbInsertTranslationRequest.getDescription());
            bbTranslationDao.persist(bbTranslation);
        }
        bbTranslationResponse.setData(bbTranslation);
        return bbTranslationResponse;
    }

    @Override
    public RoomTranslationResponse insertRoomTranslation(RoomInsertTranslationRequest roomInsertTranslationRequest, RoomTranslationResponse roomTranslationResponse) {
        Room room = roomService.find(roomInsertTranslationRequest.getId());
        System.out.println("--------------------------------------------------");
        System.out.println(roomInsertTranslationRequest.getId() + " " + roomInsertTranslationRequest.getGeneralDesc() + " " + roomInsertTranslationRequest.getLang());
        System.out.println("--------------------------------------------------");
        RoomTranslation roomTranslation = null;
        for (RoomTranslation ro : room.getDescription()) {
            System.out.println("--------------------------------------------------");
            System.out.println("checking if "+ro.getLang().getPrefix()+ " == " + roomInsertTranslationRequest.getLang());
            if (ro.getLang().getPrefix().equals(roomInsertTranslationRequest.getLang())) {
                roomTranslation = ro;
                System.out.println("they are equals");
                break;
            }
            System.out.println("--------------------------------------------------");
        }
        if (roomTranslation == null) {
            System.out.println("--------------------------------------------------");
            System.out.println("no translation found creating new one");
            System.out.println("--------------------------------------------------");
            roomTranslation = createRoomTranslation(
                    roomInsertTranslationRequest.getLang(),
                    roomInsertTranslationRequest.getShortDesc(),
                    roomInsertTranslationRequest.getGeneralDesc(),
                    roomInsertTranslationRequest.getPlaceDesc());
            room.getDescription().add(roomTranslation);
            roomService.persist(room);
        } else {
            System.out.println("--------------------------------------------------");
            System.out.println("found old translation - updating old one");
            System.out.println("--------------------------------------------------");
            roomTranslation.setPlaceDescription(roomInsertTranslationRequest.getPlaceDesc());
            roomTranslation.setGeneralDescription(roomInsertTranslationRequest.getGeneralDesc());
            roomTranslation.setShortDescription(roomInsertTranslationRequest.getPlaceDesc());
            roomTranslationDao.persist(roomTranslation);
        }
        roomTranslationResponse.setData(roomTranslation);
        return roomTranslationResponse;
    }

    @Override
    public BbTranslationListResponse getBbTranslation(BbGetTranslationRequest bbGetTranslationRequest, BbTranslationListResponse bbTranslationResponse) {
        bbTranslationResponse.setData(getBbTranslation(bbGetTranslationRequest.getBbid()));
        return bbTranslationResponse;
    }

    @Override
    public RoomTranslationListResponse getRoomTranslation(RoomGetTranslationRequest roomGetTranslationRequest, RoomTranslationListResponse roomTranslationResponse) {
        roomTranslationResponse.setData(getRoomTranslation(roomGetTranslationRequest.getId()));
        return roomTranslationResponse;
    }
}
