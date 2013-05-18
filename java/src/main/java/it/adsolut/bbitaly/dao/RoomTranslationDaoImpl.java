/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.Room;
import it.adsolut.bbitaly.model.RoomTranslation;
import java.util.Set;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

/**
 *
 * @author marcello
 */
public class RoomTranslationDaoImpl extends HibernateDaoSupport implements RoomTranslationDao{

    @Override
    public void persist(RoomTranslation roomTranslation) {
        getHibernateTemplate().saveOrUpdate(roomTranslation);
    }

    @Override
    public Set<RoomTranslation> findByRoom(Room room) {
        return room.getDescription();
    }
    
}
