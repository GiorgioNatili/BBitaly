/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.City;
import it.adsolut.bbitaly.model.Location;
import it.adsolut.bbitaly.model.Region;
import java.util.List;
import org.apache.lucene.search.Query;
import org.hibernate.criterion.DetachedCriteria;
import org.hibernate.criterion.Restrictions;
import org.hibernate.search.FullTextSession;
import org.hibernate.search.Search;
import org.hibernate.search.SearchFactory;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;
import org.springframework.transaction.annotation.Transactional;

/**
 *
 * @author marcello
 */
public class LocationDaoImpl extends HibernateDaoSupport implements LocationDao {
    
    @Override
    public Location find(String id) {
        List<Location> location = getHibernateTemplate().findByCriteria(
                DetachedCriteria.forClass(Location.class).add(Restrictions.idEq(id)));
        if (location.isEmpty()) {
            return null;
        } else {
            return location.get(0);
        }
    }
    
    @Override
    public Location findByName(String name) {
        List<Location> location = getHibernateTemplate().findByCriteria(
                DetachedCriteria.forClass(Location.class).add(Restrictions.eq("name", name)));
        if (location.isEmpty()) {
            return null;
        } else {
            System.out.println(location.get(0).getId() + " " + location.get(0).getName());
            return location.get(0);
        }
    }
    
    @Override
    public void persist(Location location) {
        getHibernateTemplate().saveOrUpdate(location);
    }
    
    @Override
    public List<Location> fastPoiSearch(String name) {
        FullTextSession textSession = Search.getFullTextSession(getSession());
        SearchFactory searchFactory = textSession.getSearchFactory();
        Query q = searchFactory.buildQueryBuilder()
                .forEntity(Location.class)
                .get()
                .keyword().onField("name").matching(name)
                .createQuery();
        return textSession.createFullTextQuery(q, Location.class).list();
    }
    
    @Override
    public List<Region> fastRegionSearch(String name) {
        FullTextSession textSession = Search.getFullTextSession(getSession());
        SearchFactory searchFactory = textSession.getSearchFactory();
        Query q = searchFactory.buildQueryBuilder()
                .forEntity(Region.class)
                .get()
                .keyword().onField("name").matching(name)
                .createQuery();
        return textSession.createFullTextQuery(q, Region.class).list();
    }
    
    @Override
    public List<City> fastCitySearch(String name) {
        FullTextSession textSession = Search.getFullTextSession(getSession());
        SearchFactory searchFactory = textSession.getSearchFactory();
        Query q = searchFactory.buildQueryBuilder()
                .forEntity(City.class)
                .get()
                .keyword().onField("name").matching(name)
                .createQuery();
        return textSession.createFullTextQuery(q, City.class).list();
    }
    
}
