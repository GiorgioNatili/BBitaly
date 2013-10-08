/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.User;
import java.util.List;
import org.hibernate.criterion.DetachedCriteria;
import org.hibernate.criterion.Restrictions;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

/**
 *
 * @author marcello
 */
public class UserDaoImpl  extends HibernateDaoSupport implements UserDao{

    @Override
    public void persist(User user) {
        getHibernateTemplate().saveOrUpdate(user);
    }
    
    @Override
    public User find(Long id) {
        List<User> user = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(User.class).add(Restrictions.idEq(id)));
	if (user.isEmpty()) {
	    return null;
	} else {
	    return user.get(0);
	}
    }

    @Override
    public User findByEmail(String email) {
        List<User> user = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(User.class).add(Restrictions.eq("email",email)));
	if (user.isEmpty()) {
	    return null;
	} else {
	    return user.get(0);
	}
    }

    @Override
    public User delete(Long id) {
        User u = find(id);
        getHibernateTemplate().delete(u);
        return u;
    }
}
