/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.Photo;

/**
 *
 * @author marcello
 */
public interface PhotoDao {
    public void persist(Photo photo);
    public Photo find(Long id);
    public Photo delete(Long id);
}
