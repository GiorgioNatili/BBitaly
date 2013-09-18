/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.BedBreakfast;
import it.adsolut.bbitaly.model.City;
import it.adsolut.bbitaly.model.Location;
import it.adsolut.bbitaly.model.Owner;
import it.adsolut.bbitaly.model.Region;
import java.util.Date;
import java.util.List;

/**
 *
 * @author marcello
 */
public interface BedBreakfastDao {

    public Long countByOwner(Owner owner);
    public Long getCountAll();
    public void persist(BedBreakfast bedBreakfast);
    public void update(BedBreakfast bedBreakfast);
    public List<BedBreakfast> fastBbSearch(String name, Date dateStart, Date dateEnd);
    public BedBreakfast find(String id);
    public BedBreakfast findByEmail(String email);
    public BedBreakfast activate(String id);
    public BedBreakfast delete(String id);
    public List<BedBreakfast> search(City city, Date start, Date end);
    public List<BedBreakfast> search(Region region, Date start, Date end);
    public List<BedBreakfast> search(Location region, Date start, Date end, Float radius);
    public List<BedBreakfast> search(Float latitude, Float longitude, Date start, Date end, Float radius);
    public List<BedBreakfast> search(List<String> ids);
    public List<BedBreakfast> getAll(Integer limit, Integer offset);
    public List<BedBreakfast> getByOwner(Owner owner, Integer limit, Integer offset, String prefix);
}
