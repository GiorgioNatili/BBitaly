/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.model.BedBreakfast;
import java.util.Date;
import java.util.List;

/**
 *
 * @author marcello
 */
public interface BbService {
    
    public Long countByOwner(Long id);
    
    public Long countAll();
    
    public BedBreakfast get(String id);
    
    public void persist(BedBreakfast bb);
    
    public BedBreakfast insert(
            Long ownerid, String type, String propertytname, String assignedname, 
            String phonenumber, String personalemail, String address, Long cityId,
            List<Long> facilitiesId, List<Long> policiesId, Boolean directContact,
            String description, String lang);
    
    public BedBreakfast update(
            String bbid, Long ownerid, String type, String propertytname, String assignedname, 
            String phonenumber, String personalemail, String address, Long cityId,
            List<Long> facilitiesId, List<Long> policiesId, Boolean directContact,
            String description, String lang);
    
    public BedBreakfast activate(String id);
    
    public BedBreakfast delete(String id);
    
    public List<BedBreakfast> searchAll(Integer limit, Integer offset);
    
    public List<BedBreakfast> searchByOwner(Long ownerId, Integer limit, Integer offset, String lang);
    
    public List<BedBreakfast> fastBbSearch(String name, Date dateStart, Date dateEnd);
    
    public List<BedBreakfast> searchByCity(Long cityid, Date start, Date end);
    
    public List<BedBreakfast> searchByRegion(Long regionid, Date start, Date end);
    
    public List<BedBreakfast> searchByLocation(String locationid, Date start, Date end, Float radius);
    
    public List<BedBreakfast> searchByCoords(Float latitude, Float longitude, Date start, Date end, Float radius);
    
    public List<BedBreakfast> searchByIds(List<String> ids);
}
