/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service.Interface;

import it.adsolut.bbitaly.Request.BbCountByOwnerRequest;
import it.adsolut.bbitaly.Request.BbCountRequest;
import it.adsolut.bbitaly.Request.BbDeleteRequest;
import it.adsolut.bbitaly.Request.BbGetAllRequest;
import it.adsolut.bbitaly.Request.BbGetByOwnerRequest;
import it.adsolut.bbitaly.Request.BbGetRequest;
import it.adsolut.bbitaly.Request.BbInsertRequest;
import it.adsolut.bbitaly.Request.BbUpdateRequest;
import it.adsolut.bbitaly.response.BbCountResponse;
import it.adsolut.bbitaly.response.BbListResponse;
import it.adsolut.bbitaly.response.BbResponse;
import javax.servlet.http.HttpServletRequest;

/**
 *
 * @author marcello
 */
public interface BbControllerService {
    public BbListResponse getAll(BbGetAllRequest bbGetAllRequest, BbListResponse bbResponse);
    public BbListResponse getByOwner(BbGetByOwnerRequest bbGetByOwnerRequest, BbListResponse bbResponse);
    public BbCountResponse countCountAll(BbCountRequest bbCountRequest, BbCountResponse bbResponse);
    public BbCountResponse countByOwner(BbCountByOwnerRequest bbGetByOwnerRequest, BbCountResponse bbResponse);
    public BbResponse insert(BbInsertRequest bbInsertRequest, BbResponse bbResponse);
    public BbResponse get(BbGetRequest bbGetRequest, BbResponse bbResponse);
    public BbResponse setCover(String id, HttpServletRequest request, BbResponse bbResponse);
    public BbResponse update(BbUpdateRequest bbUpdateRequest, BbResponse bbResponse);
    public BbResponse delete(BbDeleteRequest bbDeleteRequest, BbResponse bbResponse);
}
