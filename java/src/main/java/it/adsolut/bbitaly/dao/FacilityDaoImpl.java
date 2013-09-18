/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.Facility;
import java.util.List;
import org.hibernate.criterion.DetachedCriteria;
import org.hibernate.criterion.Restrictions;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

/**
 *
 * @author marcello
 */
public class FacilityDaoImpl extends HibernateDaoSupport implements FacilityDao{

    @Override
    public List<Facility> get() {
        List<Facility> facilities = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(Facility.class));
	if (facilities.isEmpty()) {
	    return null;
	} else {
	    return facilities;
	}
    }

    @Override
    public Facility findById(Long id) {
        List<Facility> facilities = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(Facility.class).add(Restrictions.idEq(id)));
	if (facilities.isEmpty()) {
	    return null;
	} else {
	    return facilities.get(0);
	}
    }

    @Override
    public void persist(Facility facility) {
        getHibernateTemplate().saveOrUpdate(facility);
    }
    
}
