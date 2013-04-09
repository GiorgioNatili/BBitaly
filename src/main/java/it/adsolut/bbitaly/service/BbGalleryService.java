/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.model.BbGallery;
import it.adsolut.bbitaly.model.Photo;

/**
 *
 * @author marcello
 */
public interface BbGalleryService {
    public BbGallery get(String bbid);
    public Photo delete(Long id);
}
