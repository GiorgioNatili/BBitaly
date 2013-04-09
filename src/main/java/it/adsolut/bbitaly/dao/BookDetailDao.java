/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.BookDetail;

/**
 *
 * @author marcello
 */
public interface BookDetailDao {
    
    public void persist(BookDetail book);
    
}
