package it.adsolut.bbitaly.response;

import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class StatusResponse extends Response<Boolean, Boolean> {

    public StatusResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }
    
    @Override
    protected Boolean map(Boolean data) {
        return data;
    }
    
}
