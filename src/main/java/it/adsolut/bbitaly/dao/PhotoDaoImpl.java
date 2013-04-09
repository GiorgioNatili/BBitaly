/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.Photo;
import java.util.List;
import org.hibernate.criterion.DetachedCriteria;
import org.hibernate.criterion.Restrictions;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

/**
 *
 * @author marcello
 */
public class PhotoDaoImpl  extends HibernateDaoSupport implements PhotoDao{

    @Override
    public void persist(Photo photo) {
        getHibernateTemplate().saveOrUpdate(photo);
    }
    
    @Override
    public Photo find(Long id) {
        List<Photo> photo = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(Photo.class).add(Restrictions.idEq(id)));
	if (photo.isEmpty()) {
	    return null;
	} else {
	    return photo.get(0);
	}
    }

    @Override
    public Photo delete(Long id) {
        Photo p = find(id);
        getHibernateTemplate().delete(p);
        return p;
    }
}
