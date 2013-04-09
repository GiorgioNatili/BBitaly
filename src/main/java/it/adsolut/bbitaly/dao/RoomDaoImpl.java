/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.BedBreakfast;
import it.adsolut.bbitaly.model.Room;
import java.util.List;
import org.hibernate.Criteria;
import org.hibernate.criterion.DetachedCriteria;
import org.hibernate.criterion.Restrictions;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

/**
 *
 * @author marcello
 */
public class RoomDaoImpl  extends HibernateDaoSupport implements RoomDao{

    @Override
    public void persist(Room room) {
        getHibernateTemplate().saveOrUpdate(room);
    }
    
    @Override
    public Room find(Long id) {
        List<Room> room = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(Room.class).add(Restrictions.eq("id",id)));
	if (room.isEmpty()) {
	    return null;
	} else {
	    return room.get(0);
	}
    }
    
    @Override
    public Room delete(Long id) {
        Room r = find(id);
        getHibernateTemplate().delete(r);
        return r;
    }

    @Override
    public List<Room> getByBb(BedBreakfast bb, String prefix) {
        return getHibernateTemplate().findByCriteria(
                DetachedCriteria.forClass(Room.class,"r")
                .setResultTransformer(Criteria.DISTINCT_ROOT_ENTITY)
                .createAlias("r.description", "d")
                .createAlias("r.bedBrekfast", "b")
                .createAlias("b.description", "bds")
                .createAlias("bds.lang", "l")
                .createAlias("d.lang", "c")
                .add(Restrictions.eq("l.prefix", prefix))
                .add(Restrictions.eq("c.prefix", prefix))
                .add(Restrictions.eq("bedBrekfast", bb)));
    }

    @Override
    public void update(Room room) {
        getHibernateTemplate().update(room);
    }
}
