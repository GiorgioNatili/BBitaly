/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.Configuration;

import it.adsolut.bbitaly.dao.CityDao;
import it.adsolut.bbitaly.dao.CountryDao;
import it.adsolut.bbitaly.dao.FacilityDao;
import it.adsolut.bbitaly.dao.PolicyDao;
import it.adsolut.bbitaly.dao.RegionDao;
import it.adsolut.bbitaly.model.City;
import it.adsolut.bbitaly.model.Country;
import it.adsolut.bbitaly.model.Facility;
import it.adsolut.bbitaly.model.Policy;
import it.adsolut.bbitaly.model.Region;
import org.hibernate.CacheMode;
import org.hibernate.FlushMode;
import org.hibernate.ScrollMode;
import org.hibernate.ScrollableResults;
import org.hibernate.SessionFactory;
import org.hibernate.Transaction;
import org.hibernate.search.FullTextSession;
import org.hibernate.search.Search;
import org.hibernate.classic.Session;
import org.springframework.beans.factory.InitializingBean;
import org.springframework.beans.factory.annotation.Autowired;

/**
 *
 * @author marcello
 */
public final class Initialize implements InitializingBean{

    public static final Integer BATCH_SIZE = 20;
    
    private String[] classesname;
    @Autowired
    public SessionFactory sessionFactory;
    @Autowired
    private CountryDao countrydao;
    @Autowired
    private RegionDao regiondao;
    @Autowired
    private CityDao citydao;
    @Autowired
    private FacilityDao facilitydao;
    @Autowired
    private PolicyDao policydao;

    public void setClassname(String[] classname) {
        this.classesname = classname;
    }

    public void setCountryDao(CountryDao countryDao) {
        this.countrydao = countryDao;
    }

    public void setFacilityDao(FacilityDao facilityDao) {
        this.facilitydao = facilityDao;
    }

    public void setPolicyDao(PolicyDao policyDao) {
        this.policydao = policyDao;
    }

    public void setRegionDao(RegionDao regionDao) {
        this.regiondao = regionDao;
    }

    public void setSessionFactory(SessionFactory sessionFactory) {
        this.sessionFactory = sessionFactory;
    }

    public void setCityDao(CityDao citydao) {
        this.citydao = citydao;
    }
    
    public void init() throws ClassNotFoundException {
        Session session = sessionFactory.openSession();
//        FullTextSession fullTextSession = Search.getFullTextSession(session);
//        fullTextSession.setFlushMode(FlushMode.MANUAL);
//        fullTextSession.setCacheMode(CacheMode.IGNORE);
//        Transaction transaction = fullTextSession.beginTransaction();
//        for (String classname : classesname) {
//            Class clazz = this.getClass().getClassLoader().loadClass(classname);
//            ScrollableResults results = fullTextSession.createCriteria(clazz)
//                    .setFetchSize(BATCH_SIZE)
//                    .scroll(ScrollMode.FORWARD_ONLY);
//            int index = 0;
//            while (results.next()) {
//                index++;
//                fullTextSession.index(results.get(0));
//                if (index % BATCH_SIZE == 0) {
//                    fullTextSession.flushToIndexes();
//                    fullTextSession.clear(); 
//                }
//            }
//        }
//        transaction.commit();


        Country c3 = new Country();
        c3.setName("Espana");
        c3.setPrefix("es");
        countrydao.persist(c3);
        
        Country c2 = new Country();
        c2.setName("England");
        c2.setPrefix("en");
        countrydao.persist(c2);
        
        Country c = new Country();
        c.setName("Italia");
        c.setPrefix("it");
        countrydao.persist(c);
        
        Region r = new Region();
        r.setName("Campania - Napoli");
        r.setCountry(c);
        regiondao.persist(r);
        Region r2 = new Region();
        r2.setName("Sardegna - Cagliari");
        r2.setCountry(c);
        regiondao.persist(r2);
        
        City cy = new City();
        cy.setCountry(c);
        cy.setName("Napoli");
        cy.setRegion(r);
        citydao.persist(cy);
        City cy2 = new City();
        cy2.setCountry(c);
        cy2.setName("Cagliari");
        cy2.setRegion(r2);
        citydao.persist(cy2);
        
        Facility f1 = new Facility();
        f1.setName("fac1");
        f1.setType(1);
        facilitydao.persist(f1);
        
        Facility f2 = new Facility();
        f2.setName("fac2");
        f2.setType(1);
        facilitydao.persist(f2);
        
        Facility f3 = new Facility();
        f3.setName("fac3");
        f3.setType(1);
        facilitydao.persist(f3);

        Policy p1 = new Policy();
        p1.setName("pol1");
        p1.setType(1);
        policydao.persist(p1);
        
        Policy p2 = new Policy();
        p2.setName("pol2");
        p2.setType(1);
        policydao.persist(p2);
        
        Policy p3 = new Policy();
        p3.setName("pol3");
        p3.setType(1);
        policydao.persist(p3);
        session.flush();
        session.clear();
    }

    @Override
    public void afterPropertiesSet() throws Exception {
        init();
    }
}
