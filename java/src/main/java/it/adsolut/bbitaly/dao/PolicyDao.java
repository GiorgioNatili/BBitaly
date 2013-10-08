/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.Policy;
import java.util.List;

/**
 *
 * @author marcello
 */
public interface PolicyDao {
    public List<Policy> get();
    public Policy findById(Long id);
    public void persist(Policy policy);
}
