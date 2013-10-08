/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.BedBreakfast;
import it.adsolut.bbitaly.model.Book;
import it.adsolut.bbitaly.model.Room;
import it.adsolut.bbitaly.model.User;
import java.util.Date;
import java.util.List;

/**
 *
 * @author marcello
 */
public interface BookDao {
    public Book delete(Long id);
    public void persist(Book book);
    public Book find(Long id);
    public List<Book> findByAccomodation(BedBreakfast bb);
    public List<Book> findByRoom(Room room);
    public List<Book> findByUser(User user);
    public Boolean checkAvailability(Room bb, Date start, Date end);
}
