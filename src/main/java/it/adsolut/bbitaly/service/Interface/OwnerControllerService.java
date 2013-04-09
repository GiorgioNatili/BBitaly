/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service.Interface;

import it.adsolut.bbitaly.Request.AuthOwnerRequest;
import it.adsolut.bbitaly.Request.OwnerDeleteRequest;
import it.adsolut.bbitaly.Request.OwnerGetRequest;
import it.adsolut.bbitaly.Request.OwnerInsertRequest;
import it.adsolut.bbitaly.Request.OwnerUpdateRequest;
import it.adsolut.bbitaly.response.OwnerResponse;

/**
 *
 * @author marcello
 */
public interface OwnerControllerService {
    public OwnerResponse update(OwnerUpdateRequest ownerUpdateRequest, OwnerResponse ownerUpdateResponse);
    public OwnerResponse insert(OwnerInsertRequest ownerInsertRequest, OwnerResponse ownerInsertResponse);
    public OwnerResponse get(OwnerGetRequest ownerGetRequest, OwnerResponse ownerInsertResponse);
    public OwnerResponse login(AuthOwnerRequest authOwnerRequest, OwnerResponse ownerResponse);
    public OwnerResponse delete(OwnerDeleteRequest ownerDeleteRequest, OwnerResponse bbGalleryResponse);
}
