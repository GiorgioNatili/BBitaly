/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.Country;
import it.adsolut.bbitaly.model.Region;
import java.util.ArrayList;
import java.util.List;
import org.hibernate.criterion.DetachedCriteria;
import org.hibernate.criterion.Restrictions;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

/**
 *
 * @author marcello
 */
public class RegionDaoImpl extends HibernateDaoSupport implements RegionDao{

    @Override
    public Region find(Long id) {
        List<Region> regions = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(Region.class).add(Restrictions.idEq(id)));
	if (regions.isEmpty()) {
	    return null;
	} else {
	    return regions.get(0);
	}
    }


    @Override
    public Region findByName(String name) {
        List<Region> regions = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(Region.class).add(Restrictions.eq("name",name)));
	if (regions.isEmpty()) {
	    return null;
	} else {
	    return regions.get(0);
	}
    }

    @Override
    public List<Region> getAllByCountry(Country country) {
        List<Region> regions = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(Region.class).add(Restrictions.eq("country",country)));
	if (regions.isEmpty()) {
            List<Region> regionsList = new ArrayList<Region>();
	    return regionsList;
	} else {
	    return regions;
	}
    }

    @Override
    public void persist(Region region) {
        getHibernateTemplate().saveOrUpdate(region);
    }
    
}
