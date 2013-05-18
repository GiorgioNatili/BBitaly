/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.Request.PolicyGetRequest;
import it.adsolut.bbitaly.dao.PolicyDao;
import it.adsolut.bbitaly.model.Policy;
import it.adsolut.bbitaly.response.PolicyListResponse;
import it.adsolut.bbitaly.service.Interface.PolicyControllerService;
import java.util.HashSet;
import java.util.List;
import java.util.Set;

/**
 *
 * @author marcello
 */
public class PolicyServiceImpl extends TranslatableService implements PolicyService, PolicyControllerService{

    private PolicyDao policyDao;

    public void setPolicyDao(PolicyDao policyDao) {
        this.policyDao = policyDao;
    }

    @Override
    public Policy getById(Long policyId) {
        return policyDao.findById(policyId);
    }

    @Override
    public Set<Policy> getPolicies(List<Long> policiesIds) {
        Set<Policy> set = new HashSet<Policy>();
        for (Long policyId : policiesIds) {
            Policy policy = getById(policyId);
            if (policy != null) {
                set.add(policy);
            }
        }
        return set;
    }

    @Override
    public List<Policy> getAll() {
        return policyDao.get();
    }

    @Override
    public PolicyListResponse getAll(PolicyGetRequest policyGetAllRequest, PolicyListResponse policyResponse) {
        policyResponse.setData(this.getAll());
        return policyResponse;
    }
    
}
