/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.BedBreakfast;
import it.adsolut.bbitaly.model.Book;
import it.adsolut.bbitaly.model.Room;
import it.adsolut.bbitaly.model.User;
import java.math.BigInteger;
import java.util.Date;
import java.util.List;
import org.hibernate.Hibernate;
import org.hibernate.criterion.DetachedCriteria;
import org.hibernate.criterion.Order;
import org.hibernate.criterion.Restrictions;
import org.joda.time.DateTime;
import org.joda.time.format.DateTimeFormat;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;
import org.springframework.transaction.annotation.Transactional;

/**
 *
 * @author marcello
 */
@Transactional
public class BookDaoImpl  extends HibernateDaoSupport implements BookDao {

    @Override
    public void persist(Book book) {
        getHibernateTemplate().saveOrUpdate(book);
    }
    
    @Override
    public Book find(Long id) {
        List<Book> book = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(Book.class).add(Restrictions.idEq(id)));
	if (book.isEmpty()) {
	    return null;
	} else {
	    return book.get(0);
	}
    }

    @Override
    public List<Book> findByAccomodation(BedBreakfast bb) {
        List<Book> cities = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(Book.class)
                    .add(Restrictions.eq("bedBreakfast", bb)));
        return cities;
    }

    @Override
    public List<Book> findByRoom(Room room) {
        List<Book> cities = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(Book.class)
                    .add(Restrictions.eq("room", room)));
        return cities;
    }

    @Override
    public List<Book> findByUser(User user) {
        List<Book> cities = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(Book.class)
                    .add(Restrictions.eq("user", user))
                    .add(Restrictions.isNull("deleted"))
                    .add(Restrictions.isNull("active"))
                    .addOrder(Order.asc("dateStart")));
        return cities;
    }

    @Override
    public Boolean checkAvailability(Room room, Date start, Date end) {
        DateTime jDateStart = new DateTime(start);
        DateTime jDateEnd = new DateTime(end);
        jDateStart.toString(DateTimeFormat.forPattern("y-M-d"));
        String query = "SELECT IF(COUNT(DISTINCT b.bedBreakfast_id)>0,false,true) as count "
                + "FROM Book b "
                + "WHERE  ((dateStart BETWEEN '"+jDateStart.toString(DateTimeFormat.forPattern("y-M-d"))+"' AND '"+jDateEnd.toString(DateTimeFormat.forPattern("y-M-d"))+"') "
                + "OR (dateEnd BETWEEN '"+jDateStart.toString(DateTimeFormat.forPattern("y-M-d"))+"' AND '"+jDateEnd.toString(DateTimeFormat.forPattern("y-M-d"))+"')) "
                + "and b.room_id = "+room.getId();
        System.out.println("-------------------------------------------------");
        System.out.println(query);
        System.out.println("-------------------------------------------------");
        BigInteger a = (BigInteger)(getHibernateTemplate().getSessionFactory()
                .getCurrentSession()
                .createSQLQuery(query)
                .addScalar("count").list().get(0));
        return !(a.intValue() == 0);
    }

    @Override
    public Book delete(Long id) {
        Book b = find(id);
        getHibernateTemplate().delete(b);
        return b;
    }
}
