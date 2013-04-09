package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.BbGallery;
import it.adsolut.bbitaly.model.Photo;
import it.adsolut.bbitaly.model.Room;
import it.adsolut.bbitaly.model.RoomGallery;
import java.util.List;
import org.hibernate.Hibernate;
import org.hibernate.criterion.DetachedCriteria;
import org.hibernate.criterion.Restrictions;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;
import org.springframework.transaction.annotation.Transactional;

/**
 *
 * @author marcello
 */
public class RoomGalleryDaoImpl extends HibernateDaoSupport implements RoomGalleryDao {

    @Override
    public RoomGallery findByRoom(Room room) {
        List<RoomGallery> galleries = getHibernateTemplate().findByCriteria(
                DetachedCriteria.forClass(RoomGallery.class).add(Restrictions.eq("room", room)));
        if (galleries.isEmpty()) {
            return null;
        } else {
            return galleries.get(0);
        }
    }

    @Override
    public void persist(RoomGallery roomGallery) {
        getHibernateTemplate().saveOrUpdate(roomGallery);
    }
    
    @Override
    @Transactional
    public void addChild(RoomGallery roomGallery) {
        RoomGallery gall = this.findByRoom(roomGallery.getRoom());
        Long accid = 0L;
        if (gall == null) {
            String query = "insert into roomgallery (room_id) values ('" + roomGallery.getRoom().getId() + "')";
            getHibernateTemplate().getSessionFactory().getCurrentSession().createSQLQuery(query).executeUpdate();
            String idQuery = "select id from roomgallery where room_id = '" + roomGallery.getRoom().getId() + "'";
            List<Long> ids = getHibernateTemplate().getSessionFactory().getCurrentSession().createSQLQuery(idQuery).addScalar("id", Hibernate.LONG).list();
            System.out.println("[LOG PHOTO]------------------------------------------------------------------------------------------------");
            System.out.println("[LOG PHOTO]trovati id: " + ids.size());
            System.out.println("[LOG PHOTO]------------------------------------------------------------------------------------------------");
            accid = ids.get(0);
        } else {
            accid = roomGallery.getId();
        }

        List<Photo> photos = roomGallery.getPhotos();
        for (Photo p : photos) {
            String insertphoto = "insert ignore into roomgallery_photo values ("+accid+", "+p.getId()+")";
            getHibernateTemplate().getSessionFactory().getCurrentSession().createSQLQuery(insertphoto).executeUpdate();
        }
//        getHibernateTemplate().saveOrUpdate(bbGallery);
    }

}
