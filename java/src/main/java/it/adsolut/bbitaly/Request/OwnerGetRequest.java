/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.OwnerExist;
import it.adsolut.bbitaly.exception.Code;
import javax.validation.constraints.NotNull;

/**
 *
 * @author marcello
 */
public class OwnerGetRequest extends SignedRequest {
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @OwnerExist(message=Code.Owner.NOT_FOUND)
    private Long id;

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }
}
