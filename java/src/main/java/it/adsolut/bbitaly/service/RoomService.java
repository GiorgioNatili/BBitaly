/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.model.Room;
import it.adsolut.bbitaly.model.RoomPrice;
import java.util.List;
import java.util.Map;

/**
 *
 * @author marcello
 */
public interface RoomService {
    public Room find(Long id);
    public void persist(Room bb);
    public Room save(
            String bbId, 
            String shortDescription, 
            Integer amount, 
            Integer minCap, 
            Integer maxCap,
            String placeDescription, 
            String generalDescription, 
            String lang,
            Float defaultPrice);
    public Room update(
            Long id, 
            String bbId, 
            String shortDescription, 
            Integer amount, 
            Integer minCap, 
            Integer maxCap,
            String placeDescription, 
            String generalDescription, 
            String lang,
            Float defaultPrice);
    public Room delete(Long id);
    public List<Room> getByBb(String bbid, String prefix);
    public Room addPrice(
            Long id, 
            Integer year, 
            Integer month, 
            Map<Integer,Float> price, 
            Map<Integer,Boolean> isOffer);
    public List<RoomPrice> getPriceByInterval(
            Long id, 
            Integer daystart, 
            Integer monthstart, 
            Integer yearstart, 
            Integer dayend, 
            Integer monthend, 
            Integer yearend );
    public Boolean setAsBooked(Long id);
    public Float getTotalByInterval(Long id,
            Integer daystart,
            Integer monthstart,
            Integer yearstart,
            Integer dayend,
            Integer monthend,
            Integer yearend);
}