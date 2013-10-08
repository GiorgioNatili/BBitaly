/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.BbTranslation;
import it.adsolut.bbitaly.model.BedBreakfast;
import java.util.Set;

/**
 *
 * @author marcello
 */
public interface BbTranslationDao {
    public void persist(BbTranslation bBtranslation);
    public BbTranslation find(Long id);
    public Set<BbTranslation> findByBb(BedBreakfast bb);
}
