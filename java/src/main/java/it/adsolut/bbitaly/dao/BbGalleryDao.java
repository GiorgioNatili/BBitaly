/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.BbGallery;
import it.adsolut.bbitaly.model.BedBreakfast;

/**
 *
 * @author marcello
 */
public interface BbGalleryDao {

    public BbGallery findByBb(BedBreakfast bb);

    public void persist(BbGallery bbGallery);
    
    public void addChild(BbGallery bbGallery);
    
    public void delete(BbGallery bbGallery);
    
}
