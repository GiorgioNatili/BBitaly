/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.BbTranslation;
import it.adsolut.bbitaly.model.BedBreakfast;
import java.util.List;
import java.util.Set;
import org.hibernate.criterion.DetachedCriteria;
import org.hibernate.criterion.Restrictions;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

/**
 *
 * @author marcello
 */
public class BbTranslationDaoImpl extends HibernateDaoSupport implements BbTranslationDao{

    @Override
    public void persist(BbTranslation bBtranslation) {
        getHibernateTemplate().saveOrUpdate(bBtranslation);
    }

    @Override
    public BbTranslation find(Long id) {
        List<BbTranslation> bBtranslation = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(BbTranslation.class).add(Restrictions.idEq(id)));
	if (bBtranslation.isEmpty()) {
	    return null;
	} else {
	    return bBtranslation.get(0);
	}
    }

    @Override
    public Set<BbTranslation> findByBb(BedBreakfast bb) {
        return bb.getDescription();
    }
    
}
