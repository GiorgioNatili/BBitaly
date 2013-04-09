/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.model.Policy;
import java.util.List;
import java.util.Set;

/**
 *
 * @author marcello
 */
public interface PolicyService {
    public Policy getById(Long policyId);
    public Set<Policy> getPolicies(List<Long> policiesIds);
    public List<Policy> getAll();
}
