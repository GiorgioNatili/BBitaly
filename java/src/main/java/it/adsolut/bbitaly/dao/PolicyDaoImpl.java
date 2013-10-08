/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.Policy;
import java.util.List;
import org.hibernate.criterion.DetachedCriteria;
import org.hibernate.criterion.Restrictions;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

/**
 *
 * @author marcello
 */
public class PolicyDaoImpl extends HibernateDaoSupport implements PolicyDao{

    @Override
    public List<Policy> get() {
        List<Policy> policies = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(Policy.class));
	if (policies.isEmpty()) {
	    return null;
	} else {
	    return policies;
	}
    }

    @Override
    public Policy findById(Long id) {
        List<Policy> policies = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(Policy.class).add(Restrictions.idEq(id)));
	if (policies.isEmpty()) {
	    return null;
	} else {
	    return policies.get(0);
	}
    }

    @Override
    public void persist(Policy policy) {
        getHibernateTemplate().saveOrUpdate(policy);
    }
    
}
