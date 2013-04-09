/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.City;
import it.adsolut.bbitaly.model.Location;
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
public class CityDaoImpl extends HibernateDaoSupport implements CityDao{

    @Override
    public void persist(City city) {
        getHibernateTemplate().saveOrUpdate(city);
    }

    @Override
    public List<City> findByName(String name) {
        List<City> cities = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(City.class)
                    .add(Restrictions.eq("name", name)));
        return cities;
    }

    @Override
    public City find(Long id) {
        List<City> cities = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(City.class).add(Restrictions.idEq(id)));
	if (cities.isEmpty()) {
	    return null;
	} else {
	    return cities.get(0);
	}
    }

    @Override
    public List<City> findByRegion(Region region) {
        List<City> cities = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(City.class).add(Restrictions.eq("region",region)));
	if (cities.isEmpty()) {
            List<City> cityList = new ArrayList<City>();
	    return cityList;
	} else {
	    return cities;
	}
    }
    
}
