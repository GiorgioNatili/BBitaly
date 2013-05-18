/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.model.Book;
import java.util.Date;
import java.util.List;

/**
 *
 * @author marcello
 */
public interface BookService {
    public Book delete(Long id);
    public Book activate(Long id);
    public Book get(Long id);
    public List<Book> getByAccomodation(String id);
    public List<Book> getByRoom(Long id);
    public List<Book> getByUser(Long id);
    public Boolean checkAvailability(Long id, Date start, Date end);
    public Book insert(
            String accomodationId, 
            Long roomid, 
            Long userid, 
            Integer daystart, 
            Integer monthstart, 
            Integer yearstart, 
            Integer dayend, 
            Integer monthend, 
            Integer yearend,
            Integer person);
}
