/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service.Interface;

import it.adsolut.bbitaly.Request.PolicyGetRequest;
import it.adsolut.bbitaly.response.PolicyListResponse;

/**
 *
 * @author marcello
 */
public interface PolicyControllerService {
    public PolicyListResponse getAll(PolicyGetRequest policyGetAllRequest, PolicyListResponse policyResponse);
}
