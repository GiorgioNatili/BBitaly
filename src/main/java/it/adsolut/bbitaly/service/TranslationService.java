/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.model.BbTranslation;
import it.adsolut.bbitaly.model.RoomTranslation;
import java.util.Set;

/**
 *
 * @author marcello
 */
public interface TranslationService {
    public BbTranslation createBBTranslation(String lang, String description);
    public RoomTranslation createRoomTranslation(String lang, String 
            shortDescription, String genralDescription, String placeDescription);
    public Set<BbTranslation> getBbTranslation(String bbid);
    public Set<RoomTranslation> getRoomTranslation(Long roomid);
}
