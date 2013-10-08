/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.Room;
import it.adsolut.bbitaly.model.RoomTranslation;
import java.util.Set;

/**
 *
 * @author marcello
 */
public interface RoomTranslationDao {

    public void persist(RoomTranslation roomTranslation);
    public Set<RoomTranslation> findByRoom(Room bb);
}
