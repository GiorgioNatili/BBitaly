package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.Application;
import java.util.List;
import org.hibernate.criterion.DetachedCriteria;
import org.hibernate.criterion.Restrictions;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

/**
 *
 * @author marcello
 */
public class ApplicationDaoImpl extends HibernateDaoSupport implements ApplicationDao {

    @Override
    public Application finByAppId(Long appid) {
        List<Application> application = getHibernateTemplate().findByCriteria(
		DetachedCriteria.forClass(Application.class).add(Restrictions.eq("id", appid)));
	if (application.isEmpty()) {
	    return null;
	} else {
	    return application.get(0);
	}
    }
    
}
