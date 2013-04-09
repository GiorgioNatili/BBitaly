package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.RoomPrice;
import java.util.Date;
import java.util.List;
import org.hibernate.criterion.DetachedCriteria;
import org.hibernate.criterion.Restrictions;
import org.joda.time.DateTime;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;
import org.springframework.transaction.annotation.Transactional;

/**
 *
 * @author marcello
 */
@Transactional
public class RoomPriceDaoImpl extends HibernateDaoSupport implements RoomPriceDao {

    @Override
    public void persist(RoomPrice roomPrice) {
        getHibernateTemplate().saveOrUpdate(roomPrice);
    }

    @Override
    public RoomPrice find(Long id, Date date) {
        
        DateTime  dt = new DateTime(date);
        String sql = "select p.* "
                + "from RoomPrice as p "
                + "left join Room_RoomPrice r on (p.id = r.price_id) "
                + "where p.date = \""+dt.toString("y/M/d")+"\"  "
                + "and r.Room_id = "+id+"";
        
        List<RoomPrice> roomPrice = getHibernateTemplate()
                .getSessionFactory()
                .getCurrentSession()
                .createSQLQuery(sql)
                .addEntity(RoomPrice.class)
                .list();
	if (roomPrice.isEmpty()) {
	    return null;
	} else {
	    return roomPrice.get(0);
	}
    }

    @Override
    public List<RoomPrice> find(Long id, Date dateStart, Date dateEnd) {
        DateTime  dts = new DateTime(dateStart);
        DateTime  dte = new DateTime(dateEnd);
        String sql = "select p.* "
                + "from RoomPrice as p "
                + "left join Room_RoomPrice r on (p.id = r.price_id) "
                + "where p.date between \""+dts.toString("y/M/d")+"\" "
                + "and \""+dte.toString("y/M/d") +"\" "
                + "and r.Room_id = "+id+"";

        List<RoomPrice> roomPrice = getHibernateTemplate()
                .getSessionFactory()
                .getCurrentSession()
                .createSQLQuery(sql)
                .addEntity(RoomPrice.class)
                .list();
	if (roomPrice.isEmpty()) {
	    return null;
	} else {
	    return roomPrice;
	}
    }

    @Override
    public RoomPrice find(Long id) {
        List<RoomPrice> roomPrice = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(RoomPrice.class).add(Restrictions.idEq(id)));
	if (roomPrice.isEmpty()) {
	    return null;
	} else {
	    return roomPrice.get(0);
	}
    }
}
