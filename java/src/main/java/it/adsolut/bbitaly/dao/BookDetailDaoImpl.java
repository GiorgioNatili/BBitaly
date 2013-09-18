package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.BookDetail;
import org.springframework.orm.hibernate3.support.HibernateDaoSupport;

/**
 *
 * @author marcello
 */
public class BookDetailDaoImpl extends HibernateDaoSupport implements BookDetailDao{

    @Override
    public void persist(BookDetail book) {
        getHibernateTemplate().saveOrUpdate(book);
    }
    
}
