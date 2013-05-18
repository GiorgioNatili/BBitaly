package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.BbGallery;
import it.adsolut.bbitaly.model.BedBreakfast;
import it.adsolut.bbitaly.model.Photo;
import java.util.ArrayList;
import java.util.List;
import org.hibernate.Hibernate;
import org.hibernate.SQLQuery;
import org.hibernate.criterion.DetachedCriteria;
import org.hibernate.criterion.Restrictions;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;
import org.springframework.transaction.annotation.Transactional;

/**
 *
 * @author marcello
 */
public class BbGalleryDaoImpl extends HibernateDaoSupport implements BbGalleryDao {

    @Override
    public BbGallery findByBb(BedBreakfast bb) {
        List<BbGallery> galleries = getHibernateTemplate().findByCriteria(
                DetachedCriteria.forClass(BbGallery.class).add(Restrictions.eq("accomodation", bb)));
        if (galleries.isEmpty()) {
            return null;
        } else {
            return galleries.get(0);
        }
    }

    @Override
    public void persist(BbGallery bbGallery) {
        getHibernateTemplate().saveOrUpdate(bbGallery);
    }

    @Override
    @Transactional
    public void addChild(BbGallery bbGallery) {
        BbGallery gall = this.findByBb(bbGallery.getAccomodation());
        Long accid = 0L;
        if (gall == null) {
            String query = "insert into bbgallery (accomodation_id) values ('" + bbGallery.getAccomodation().getId() + "')";
            getHibernateTemplate().getSessionFactory().getCurrentSession().createSQLQuery(query).executeUpdate();
            String idQuery = "select id from bbgallery where accomodation_id = '" + bbGallery.getAccomodation().getId() + "'";
            List<Long> ids = getHibernateTemplate().getSessionFactory().getCurrentSession().createSQLQuery(idQuery).addScalar("id", Hibernate.LONG).list();
            System.out.println("[LOG PHOTO]------------------------------------------------------------------------------------------------");
            System.out.println("[LOG PHOTO]trovati id: " + ids.size());
            System.out.println("[LOG PHOTO]------------------------------------------------------------------------------------------------");
            accid = ids.get(0);
        } else {
            accid = bbGallery.getId();
        }

        List<Photo> photos = bbGallery.getPhotos();
        for (Photo p : photos) {
            String insertphoto = "insert ignore into bbgallery_photo values ("+accid+", "+p.getId()+")";
            getHibernateTemplate().getSessionFactory().getCurrentSession().createSQLQuery(insertphoto).executeUpdate();
        }
//        getHibernateTemplate().saveOrUpdate(bbGallery);
    }

    @Override
    public void delete(BbGallery bbGallery) {
        getHibernateTemplate().delete(bbGallery);
        getSession().flush();
    }
}
