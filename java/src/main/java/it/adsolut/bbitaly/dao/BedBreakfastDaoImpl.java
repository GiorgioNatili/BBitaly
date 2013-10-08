/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.BedBreakfast;
import it.adsolut.bbitaly.model.City;
import it.adsolut.bbitaly.model.Location;
import it.adsolut.bbitaly.model.Owner;
import it.adsolut.bbitaly.model.Region;
import it.adsolut.bbitaly.util.string.MessageDigest;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import org.hibernate.Criteria;
import org.hibernate.Hibernate;
import org.hibernate.criterion.DetachedCriteria;
import org.hibernate.criterion.Projections;
import org.hibernate.criterion.Property;
import org.hibernate.criterion.Restrictions;
import org.joda.time.DateTime;
import org.joda.time.format.DateTimeFormat;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

/**
 *
 * @author marcello
 */
public class BedBreakfastDaoImpl extends HibernateDaoSupport implements BedBreakfastDao {

    @Override
    public void persist(BedBreakfast bedBreakfast) {
        if (bedBreakfast.getId() == null || "".equals(bedBreakfast.getId())) {
            bedBreakfast.setId(
                    MessageDigest.md5(
                    bedBreakfast.getName()
                    + bedBreakfast.getContactemail()
                    + bedBreakfast.getLatitude()
                    + bedBreakfast.getLongitude()));
        }
        getHibernateTemplate().saveOrUpdate(bedBreakfast);
    }

    @Override
    public BedBreakfast find(String id) {
        List<BedBreakfast> bb = getHibernateTemplate().findByCriteria(
                DetachedCriteria.forClass(BedBreakfast.class).add(Restrictions.idEq(id)).add(Restrictions.eq("active", Boolean.TRUE)));
        if (bb.isEmpty()) {
            return null;
        } else {
            return bb.get(0);
        }
    }

    @Override
    public BedBreakfast findByEmail(String email) {
        List<BedBreakfast> bb = getHibernateTemplate().findByCriteria(
                DetachedCriteria.forClass(BedBreakfast.class).add(Restrictions.eq("contactemail", email)).add(Restrictions.eq("active", Boolean.TRUE)));
        if (bb.isEmpty()) {
            return null;
        } else {
            return bb.get(0);
        }
    }

    @Override
    public void update(BedBreakfast bedBreakfast) {
        getHibernateTemplate().update(bedBreakfast);
    }

    @Override
    public BedBreakfast delete(String id) {
        BedBreakfast bb = find(id);
        getHibernateTemplate().delete(bb);
        return bb;
    }

    @Override
    public BedBreakfast activate(String id) {
        BedBreakfast bb = find(id);
        bb.setActive(Boolean.TRUE);
        getHibernateTemplate().update(bb);
        return bb;
    }

    /**
     * SELECT * 
    FROM bb
    JOIN room r on ( bb.id = r.bedBrekfast_id)
    WHERE bb.id NOT IN ( SELECT DISTINCT b.bedBreakfast_id
    FROM book b
    WHERE  
    ( dateStart BETWEEN '2012-05-01' AND '2012-05-03' ) OR (  dateEnd BETWEEN '2012-05-01' AND '2012-05-03' )   and b.room_id = r.id)
     * @param name
     * @return 
     */
    @Override
    public List<BedBreakfast> fastBbSearch(String name, Date dateStart, Date dateEnd) {
        System.out.println("-------------------------------------------------");
        System.out.println("name: " + name);
        System.out.println("-------------------------------------------------");
        DateTime jDateStart = new DateTime(dateStart);
        DateTime jDateEnd = new DateTime(dateEnd);
        jDateStart.toString(DateTimeFormat.forPattern("y-M-d"));
        String query = "SELECT DISTINCT bb.id as id "
                + "FROM bb "
                + "JOIN Room r on ( bb.id = r.bedBrekfast_id)"
                + "JOIN City c on ( bb.city_id = c.id)"
                + "JOIN Region re on ( c.region_id = re.id)"
                + "JOIN Country co on (c.country_id = co.id)"
                + "WHERE (bb.name like \"%" + name + "%\" OR re.name like \"%" + name + "%\" OR co.name like \"%" + name + "%\")"
                + "AND bb.id NOT IN ( "
                + "SELECT DISTINCT b.bedBreakfast_id "
                + "FROM Book b "
                + "WHERE  (dateStart BETWEEN '" + jDateStart.toString(DateTimeFormat.forPattern("y-M-d")) + "' AND '" + jDateEnd.toString(DateTimeFormat.forPattern("y-M-d")) + "') "
                + "OR (dateEnd BETWEEN '" + jDateStart.toString(DateTimeFormat.forPattern("y-M-d")) + "' AND '" + jDateEnd.toString(DateTimeFormat.forPattern("y-M-d")) + "') "
                + "and b.room_id = r.id)";
        System.out.println("-------------------------------------------------");
        System.out.println(query);
        System.out.println("-------------------------------------------------");
        List<String> ids = getHibernateTemplate().getSessionFactory()
                .getCurrentSession()
                .createSQLQuery(query)
                .addScalar("id", Hibernate.STRING)
                .list();
        List<BedBreakfast> bb = new ArrayList<BedBreakfast>();
        System.out.println("-------------------------------------------------");
        System.out.println("LUNGHEZZA TROVATI: " + ids.size());
        System.out.println("-------------------------------------------------");
        for (String v : ids) {
            System.out.println(v);
            bb.add(find(v));
        }
        System.out.println("Trovati " + bb.size()+ " STRUTTURE");
        System.out.println("-------------------------------------------------");
        return bb;
    }

    @Override
    public List<BedBreakfast> search(City city, Date start, Date end) {
        return getHibernateTemplate().findByCriteria(
                DetachedCriteria.forClass(BedBreakfast.class).add(Restrictions.eq("city", city)));
    }

    @Override
    public List<BedBreakfast> search(Region region, Date start, Date end) {
        return getHibernateTemplate().findByCriteria(
                DetachedCriteria.forClass(BedBreakfast.class).createAlias("city", "c").add(Restrictions.eq("c.region", region)));
    }

    @Override
    public List<BedBreakfast> search(Location location, Date start, Date end, Float radius) {
        String query = "SELECT *, "
                + "( 6371 * ACOS( COS( RADIANS( " + location.getLatitude() + " ) ) * COS( RADIANS( latitude ) ) * COS( RADIANS( longitude ) "
                + "- RADIANS( " + location.getLongitude() + " ) ) "
                + "+ SIN( RADIANS( " + location.getLatitude() + " ) ) * SIN( RADIANS( latitude ) ) ) ) AS distance "
                + "FROM bb HAVING distance < " + radius
                + " ORDER BY distance";
        System.out.println(query);
        return getHibernateTemplate().getSessionFactory().getCurrentSession().createSQLQuery(query).addEntity(BedBreakfast.class).list();
    }

    @Override
    public List<BedBreakfast> search(Float latitude, Float longitude, Date start, Date end, Float radius) {
        String query = "SELECT *, "
                + "( 6371 * ACOS( COS( RADIANS( " + latitude + " ) ) * COS( RADIANS( latitude ) ) * COS( RADIANS( longitude ) "
                + "- RADIANS( " + longitude + " ) ) "
                + "+ SIN( RADIANS( " + latitude + " ) ) * SIN( RADIANS( latitude ) ) ) ) AS distance "
                + "FROM bb HAVING distance < " + radius
                + " ORDER BY distance";
        System.out.println(query);
        return getHibernateTemplate().getSessionFactory().getCurrentSession().createSQLQuery(query).addEntity(BedBreakfast.class).list();
    }

    @Override
    public List<BedBreakfast> getAll(Integer limit, Integer offset) {
        Criteria dc = getSession().createCriteria(BedBreakfast.class, "bb").setProjection(Projections.distinct(Property.forName("id")));
        List<String> a = dc.list();
        List<BedBreakfast> bb = new ArrayList<BedBreakfast>();
        for (String v : a) {
            System.out.println(v);
            bb.add(find(v));
        }
        return bb;
//        return getHibernateTemplate().findByCriteria(
//                DetachedCriteria.forClass(BedBreakfast.class, "b").addOrder(Order.desc("b.updated")),
//                offset, limit);
    }

    @Override
    public Long getCountAll() {
        return (Long) getHibernateTemplate().findByCriteria(
                DetachedCriteria.forClass(BedBreakfast.class, "b").setProjection(Projections.rowCount())).get(0);
    }

    @Override
    public List<BedBreakfast> getByOwner(Owner owner, Integer limit, Integer offset, String prefix) {
        Criteria dc = getSession().createCriteria(BedBreakfast.class, "bb").setProjection(Projections.distinct(Property.forName("id"))) //                .createAlias("bb.description", "ds")
                //                .createAlias("ds.lang", "l")
                .add(Restrictions.eq("bb.owner", owner));
//                .add(Restrictions.eq("l.prefix", prefix));
        List<String> a = dc.list();
        List<BedBreakfast> bb = new ArrayList<BedBreakfast>();
        for (String v : a) {
            System.out.println(v);
            bb.add(find(v));
        }
        return bb;
    }

    @Override
    public Long countByOwner(Owner owner) {
        return (Long) getHibernateTemplate().findByCriteria(
                DetachedCriteria.forClass(BedBreakfast.class).setResultTransformer(Criteria.DISTINCT_ROOT_ENTITY).setProjection(Projections.rowCount()).add(Restrictions.eq("owner", owner))).get(0);
    }

    @Override
    public List<BedBreakfast> search(List<String> ids) {
        return getHibernateTemplate().findByCriteria(
                DetachedCriteria.forClass(BedBreakfast.class).setResultTransformer(Criteria.DISTINCT_ROOT_ENTITY).add(Restrictions.in("id", ids)));
    }
}
