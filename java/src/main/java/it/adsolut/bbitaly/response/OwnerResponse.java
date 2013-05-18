/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.Owner;
import org.dozer.DozerBeanMapper;
import org.dozer.spring.DozerBeanMapperFactoryBean;


/**
 *
 * @author marcello
 */
public class OwnerResponse extends Response<Owner,it.adsolut.bbitaly.response.vo.Owner>{

    public OwnerResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }

    @Override
    protected it.adsolut.bbitaly.response.vo.Owner map(Owner data) {
        return dozermapper.map(data, it.adsolut.bbitaly.response.vo.Owner.class);
    }
}
