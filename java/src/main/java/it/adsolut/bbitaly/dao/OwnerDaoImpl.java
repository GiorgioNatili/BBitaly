/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.Owner;
import java.util.List;
import org.hibernate.criterion.DetachedCriteria;
import org.hibernate.criterion.Restrictions;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

/**
 *
 * @author marcello
 */
public class OwnerDaoImpl  extends HibernateDaoSupport implements OwnerDao{

    @Override
    public Owner findByEmail(String email) {
        List<Owner> owner= getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(Owner.class)
                    .add(Restrictions.eq("email",email))
                    .add(Restrictions.eq("active", Boolean.TRUE)));
	if (owner.isEmpty()) {
	    return null;
	} else {
            System.out.println("---------------------------------------------");
            System.out.println("found owner"+owner.get(0).getId()+" "+owner.get(0).getName());
            System.out.println("---------------------------------------------");
	    return owner.get(0);
	}
    }

    @Override
    public void insert(Owner entity) {
        getHibernateTemplate().saveOrUpdate(entity);
    }

    @Override
    public Owner findByiD(Long id) {
        List<Owner> owner = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(Owner.class)
                    .add(Restrictions.idEq(id))
                    .add(Restrictions.eq("active", Boolean.TRUE)));
	if (owner.isEmpty()) {
	    return null;
	} else {
	    return owner.get(0);
	}
    }

    @Override
    public Owner delete(Long id) {
        Owner owner = findByiD(id);
        getHibernateTemplate().delete(owner);
        return owner;
    }

    @Override
    public Owner activate(Long id) {
        Owner owner = findByiD(id);
        owner.setActive(Boolean.TRUE);
        getHibernateTemplate().update(owner);
        return owner;
    }
    
}
