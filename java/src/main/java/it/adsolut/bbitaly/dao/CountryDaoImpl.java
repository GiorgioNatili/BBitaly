/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.Country;
import java.util.List;
import org.hibernate.criterion.DetachedCriteria;
import org.hibernate.criterion.Restrictions;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

/**
 *
 * @author marcello
 */
public class CountryDaoImpl extends HibernateDaoSupport implements CountryDao{
    
    @Override
    public Country find(Long id) {
        List<Country> countries = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(Country.class).add(Restrictions.idEq(id)));
	if (countries.isEmpty()) {
	    return null;
	} else {
	    return countries.get(0);
	}
    }

    @Override
    public void persist(Country country) {
        getHibernateTemplate().saveOrUpdate(country);
    }

    @Override
    public Country findByPrefix(String lang) {
        List<Country> countries = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(Country.class).add(Restrictions.eq("prefix",lang)));
	if (countries.isEmpty()) {
	    return null;
	} else {
	    return countries.get(0);
	}
    }

    @Override
    public List<Country> getAll() {
        List<Country> countries = getHibernateTemplate().findByCriteria(
                DetachedCriteria.forClass(Country.class));
        return countries;
    }
    
}
