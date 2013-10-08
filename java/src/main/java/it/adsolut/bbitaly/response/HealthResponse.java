package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.response.vo.Health;
import java.util.Map;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class HealthResponse extends Response<Map<String,String>, it.adsolut.bbitaly.response.vo.Health> {

    public HealthResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }
    
    @Override
    protected Health map(Map<String, String> data) {
        Health health = new Health();
        health.setCommittedVirtualMemorySize(data.get("getCommittedVirtualMemorySize"));
        health.setCpuLoad(data.get("getSystemCpuLoad"));
        health.setFreePhysicalMemorySize(data.get("getFreePhysicalMemorySize"));
        health.setFreeSwapSpaceSize(data.get("getFreeSwapSpaceSize"));
        health.setTotalPhysicalMemorySize(data.get("getTotalPhysicalMemorySize"));
        health.setTotalSwapSpaceSize(data.get("getTotalSwapSpaceSize"));
        return health;
    }
    
}
