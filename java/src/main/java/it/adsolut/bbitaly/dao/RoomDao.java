/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.BedBreakfast;
import it.adsolut.bbitaly.model.Room;
import java.util.List;

/**
 *
 * @author marcello
 */
public interface RoomDao {
    public void persist(Room room);
    public Room find(Long id);
    public Room delete(Long id);
    public List<Room> getByBb(BedBreakfast bb, String prefix);
    public void update(Room room);
}
