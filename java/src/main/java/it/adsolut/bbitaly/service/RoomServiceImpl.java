/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.Request.AddPriceRequest;
import it.adsolut.bbitaly.Request.PriceGetByIntervalRequest;
import it.adsolut.bbitaly.Request.RoomDeleteRequest;
import it.adsolut.bbitaly.Request.RoomGetByBbRequest;
import it.adsolut.bbitaly.Request.RoomGetRequest;
import it.adsolut.bbitaly.Request.RoomInsertRequest;
import it.adsolut.bbitaly.Request.RoomUpdateRequest;
import it.adsolut.bbitaly.dao.RoomDao;
import it.adsolut.bbitaly.dao.RoomPriceDao;
import it.adsolut.bbitaly.exception.Code;
import it.adsolut.bbitaly.model.BedBreakfast;
import it.adsolut.bbitaly.model.Room;
import it.adsolut.bbitaly.model.RoomPrice;
import it.adsolut.bbitaly.model.RoomTranslation;
import it.adsolut.bbitaly.response.RoomListResponse;
import it.adsolut.bbitaly.response.RoomPriceListResponse;
import it.adsolut.bbitaly.response.RoomResponse;
import it.adsolut.bbitaly.response.RoomTotalPriceResponse;
import it.adsolut.bbitaly.service.Interface.RoomControllerService;
import it.adsolut.bbitaly.util.file.Uploader;
import it.adsolut.bbitaly.util.string.MessageDigest;
import it.adsolut.bbitaly.util.string.Replace;
import java.util.ArrayList;
import java.util.Date;
import java.util.HashSet;
import java.util.Iterator;
import java.util.List;
import java.util.Map;
import java.util.Set;
import java.util.UUID;
import javax.servlet.http.HttpServletRequest;
import org.joda.time.DateTime;
import org.joda.time.Days;
import org.joda.time.format.DateTimeFormat;
import org.joda.time.format.DateTimeFormatter;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.multipart.MultipartHttpServletRequest;

/**
 *
 * @author marcello
 */
public class RoomServiceImpl extends TranslatableService implements RoomService, RoomControllerService {

    private RoomDao roomDao;
    private RoomPriceDao roomPriceDao;
    private BbService bbService;
    private Uploader uploader;

    public void setRoomDao(RoomDao roomDao) {
        this.roomDao = roomDao;
    }

    public RoomPriceDao getRoomPriceDao() {
        return roomPriceDao;
    }

    public void setRoomPriceDao(RoomPriceDao roomPriceDao) {
        this.roomPriceDao = roomPriceDao;
    }

    public void setBbService(BbService bbService) {
        this.bbService = bbService;
    }

    public void setUploader(Uploader uploader) {
        this.uploader = uploader;
    }

    @Override
    public Room find(Long id) {
        return roomDao.find(id);
    }

    private Room persist(Room room, String bbId, String shortDescription, Integer amount,
            Integer minCap, Integer maxCap,
            String placeDescription, String generalDescription, String lang, Float defaultPrice) {
        BedBreakfast bedBreakfast = bbService.get(bbId);
        Set<RoomTranslation> translationSet = new HashSet<RoomTranslation>();
        RoomTranslation translation = translationService.createRoomTranslation(lang, shortDescription, generalDescription, placeDescription);
        try {
            room.setAmount(amount);
            room.setBedBrekfast(bedBreakfast);
            room.setMaxCapacity(maxCap);
            room.setMinCapacity(minCap);
            translationSet.add(translation);
            room.setDescription(translationSet);
            room.setDefaultPrice(defaultPrice);
            roomDao.persist(room);
        } catch (Exception e) {
        }
        return room;
    }

    @Override
    public Room update(Long id, String bbId, String shortDescription, Integer amount,
            Integer minCap, Integer maxCap,
            String placeDescription, String generalDescription, String lang, Float defaultPrice) {
        Room room = roomDao.find(id);
        this.persist(room, bbId, shortDescription, amount, minCap,
                maxCap, placeDescription, generalDescription, lang, defaultPrice);
        return room;
    }

    @Override
    public Room save(String bbId, String shortDescription, Integer amount,
            Integer minCap, Integer maxCap,
            String placeDescription, String generalDescription, String lang, Float defaultPrice) {
        Room room = new Room();
        this.persist(room, bbId, shortDescription, amount, minCap,
                maxCap, placeDescription, generalDescription, lang, defaultPrice);
        return room;
    }

    @Override
    public RoomResponse save(RoomInsertRequest roomInsertRequest, RoomResponse roomResponse) {
        System.out.println("-------------------------------------------------");
        System.out.println("prezzo di default: " + roomInsertRequest.getDefaultPrice());
        System.out.println("-------------------------------------------------");
        roomResponse.setData(this.save(roomInsertRequest.getBbid(),
                roomInsertRequest.getShortDesc(),
                roomInsertRequest.getAmount(),
                roomInsertRequest.getMincap(),
                roomInsertRequest.getMaxcap(),
                roomInsertRequest.getPlaceDesc(),
                roomInsertRequest.getGeneralDesc(),
                roomInsertRequest.getLang(),
                roomInsertRequest.getDefaultPrice()));
        return roomResponse;
    }

    @Override
    public RoomResponse get(RoomGetRequest roomGetRequest, RoomResponse roomResponse) {
        roomResponse.setData(this.find(roomGetRequest.getId()));
        return roomResponse;
    }

    @Override
    public Room delete(Long id) {
        return roomDao.delete(id);
    }

    @Override
    public RoomResponse delete(RoomDeleteRequest roomDeleteRequest, RoomResponse roomResponse) {
        roomResponse.setData(delete(roomDeleteRequest.getId()));
        return roomResponse;
    }

    @Override
    public void persist(Room room) {
        roomDao.persist(room);
    }

    @Override
    public List<Room> getByBb(String bbid, String prefix) {
        return roomDao.getByBb(bbService.get(bbid), prefix);
    }

    @Override
    public RoomListResponse getByBb(RoomGetByBbRequest roomGetRequest, RoomListResponse roomResponse) {
        roomResponse.setData(this.getByBb(roomGetRequest.getId(), roomGetRequest.getLang()));
        return roomResponse;
    }

    @Override
    public RoomResponse update(RoomUpdateRequest roomUpdateRequest, RoomResponse roomResponse) {
        roomResponse.setData(this.update(roomUpdateRequest.getId(),
                roomUpdateRequest.getBbid(),
                roomUpdateRequest.getShortDesc(),
                roomUpdateRequest.getAmount(),
                roomUpdateRequest.getMincap(),
                roomUpdateRequest.getMaxcap(),
                roomUpdateRequest.getPlaceDesc(),
                roomUpdateRequest.getGeneralDesc(),
                roomUpdateRequest.getLang(),
                roomUpdateRequest.getDefaultPrice()));
        return roomResponse;
    }

    @Override
    public RoomResponse setCover(Long id, HttpServletRequest request, RoomResponse roomResponse) {
        Room response = find(id);
        if (request instanceof MultipartHttpServletRequest) {
            MultipartHttpServletRequest fileRequest = (MultipartHttpServletRequest) request;
            Map<String, MultipartFile> files = fileRequest.getFileMap();
            if (!files.isEmpty()) {
                for (Map.Entry<String, MultipartFile> fileEntry : files.entrySet()) {
                    MultipartFile file = fileEntry.getValue();
                    if (!file.isEmpty()) {
                        try {
                            String filename = MessageDigest.md5(UUID.randomUUID().toString())
                                    + String.valueOf(id)
                                    + "_" + response.getBedBrekfast().getType()
                                    + "_" + Replace.replace(" ", "_", response.getBedBrekfast().getName());
                            String picUrl = uploader.upload(file, filename, "roomcover");
                            response.setPhoto(picUrl);
                            roomDao.update(response);
                        } catch (Exception ex) {
                            roomResponse.addError(Code.Bb.NO_FILE_SELECTED);
                        }
                    } else {
                        roomResponse.addError(Code.Bb.NO_FILE_SELECTED);
                    }
                }
            } else {
                roomResponse.addError(Code.Bb.NO_FILE_SELECTED);
            }
        } else {
            roomResponse.addError(Code.Bb.FILE_UPLOAD_ERROR);
        }
        roomResponse.setData(response);
        return roomResponse;
    }

    @Override
    public Room addPrice(Long id, Integer year, Integer month, Map<Integer, Float> price, Map<Integer, Boolean> isOffer) {
        Iterator it = price.entrySet().iterator();
        DateTimeFormatter format = DateTimeFormat.forPattern("y/M/d");
        ArrayList<RoomPrice> prices = new ArrayList<RoomPrice>();
        while (it.hasNext()) {
            Map.Entry<Integer, Float> pairs = (Map.Entry<Integer, Float>) it.next();
            Date date = format.parseDateTime(year + "/" + month + "/" + pairs.getKey()).toDate();
            RoomPrice roomPrice = roomPriceDao.find(id, date);
            if (roomPrice == null) {
                roomPrice = new RoomPrice();
                roomPrice.setDate(date);
            }
            if (!roomPrice.isBooked()) {
                Boolean offer = Boolean.FALSE;
                if (isOffer != null) {
                    if (isOffer.containsKey(pairs.getKey())) {
                        offer = Boolean.TRUE;
                    }
                }
                roomPrice.setIsOffer(offer);
                roomPrice.setPrice(pairs.getValue());
                roomPriceDao.persist(roomPrice);
                prices.add(roomPrice);
            }
            it.remove(); // avoids a ConcurrentModificationException
        }
        Room r = find(id);
        r.setPrice(prices);
        roomDao.persist(r);
        return r;
    }

    @Override
    public RoomResponse addprice(AddPriceRequest addPriceRequest, RoomResponse roomResponse) {
        roomResponse.setData(this.addPrice(addPriceRequest.getRoomId(),
                addPriceRequest.getYear(),
                addPriceRequest.getMonth(),
                addPriceRequest.getPrice(),
                addPriceRequest.getIsOffer()));
        return roomResponse;
    }

    @Override
    public RoomPriceListResponse getPriceByDate(PriceGetByIntervalRequest getPriceByIntervalRequest, RoomPriceListResponse roomPriceListResponse) {
        roomPriceListResponse.setData(this.getPriceByInterval(getPriceByIntervalRequest.getId(),
                getPriceByIntervalRequest.getDayStart(),
                getPriceByIntervalRequest.getMonthStart(),
                getPriceByIntervalRequest.getYearStart(),
                getPriceByIntervalRequest.getDayEnd(),
                getPriceByIntervalRequest.getMonthEnd(),
                getPriceByIntervalRequest.getYearStart()));
        return roomPriceListResponse;
    }

    @Override
    public List<RoomPrice> getPriceByInterval(
            Long id,
            Integer daystart,
            Integer monthstart,
            Integer yearstart,
            Integer dayend,
            Integer monthend,
            Integer yearend) {
        DateTimeFormatter patter = DateTimeFormat.forPattern("y/M/d");
        Date dateStart = patter.parseDateTime(yearstart + "/" + monthstart + "/" + daystart).toDate();
        Date dateEnd = patter.parseDateTime(yearend + "/" + monthend + "/" + dayend).toDate();
        return roomPriceDao.find(id, dateStart, dateEnd);
    }

    @Override
    public Float getTotalByInterval(Long id,
            Integer daystart,
            Integer monthstart,
            Integer yearstart,
            Integer dayend,
            Integer monthend,
            Integer yearend) {
        DateTimeFormatter patter = DateTimeFormat.forPattern("y/M/d");
        Float defaultPrice = this.find(id).getDefaultPrice();
        List<RoomPrice> roomPrices = this.getPriceByInterval(id, daystart, monthstart, yearstart, dayend, monthend, yearend);
        DateTime dtStart = new DateTime(patter.parseDateTime(yearstart + "/" + monthstart + "/" + daystart).toDate());
        DateTime dtEnd = new DateTime(patter.parseDateTime(yearend + "/" + monthend + "/" + dayend).toDate());
        Integer days = Days.daysBetween(dtEnd, dtStart).getDays();
        Integer difference = Math.abs(days);
        if (roomPrices != null) {
            difference = days - roomPrices.size();
        }
        System.out.println("-------------------------------------------------");
        System.out.println("calcolo prezzo per date: " + dtStart + " " + dtEnd);
        Float total = 0F;
        if (roomPrices != null) {
            for (RoomPrice rp : roomPrices) {
                System.out.println("esiste un prezzo specifico per la data " + rp.getDate().toString() + " : " + rp.getPrice());
                total += rp.getPrice();
            }
        }
        System.out.println("il prezzo di dafault per la camera è: " + defaultPrice);
        System.out.println("aggiungo il prezzo di default per " + difference + "giorni");
        total += defaultPrice * difference;
        System.out.println("-------------------------------------------------");
        return total;
    }

    @Override
    public Boolean setAsBooked(Long id) {
        RoomPrice price = roomPriceDao.find(id);
        price.setIsBooked(Boolean.TRUE);
        roomPriceDao.persist(price);
        return Boolean.TRUE;
    }

    @Override
    public RoomTotalPriceResponse getTotalByDate(PriceGetByIntervalRequest getPriceByIntervalRequest, RoomTotalPriceResponse priceResponse) {
        priceResponse.setData(this.getTotalByInterval(getPriceByIntervalRequest.getId(),
                getPriceByIntervalRequest.getDayStart(),
                getPriceByIntervalRequest.getMonthStart(),
                getPriceByIntervalRequest.getYearStart(),
                getPriceByIntervalRequest.getDayEnd(),
                getPriceByIntervalRequest.getMonthEnd(),
                getPriceByIntervalRequest.getYearStart()));
        return priceResponse;
    }
}
