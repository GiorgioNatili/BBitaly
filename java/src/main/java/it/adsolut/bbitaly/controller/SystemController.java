package it.adsolut.bbitaly.controller;

import it.adsolut.bbitaly.Request.ServerHealthRequest;
import it.adsolut.bbitaly.Request.ServerStatusRequest;
import it.adsolut.bbitaly.response.HealthResponse;
import it.adsolut.bbitaly.response.StatusResponse;
import java.lang.management.ManagementFactory;
import java.lang.management.OperatingSystemMXBean;
import java.lang.reflect.Method;
import java.lang.reflect.Modifier;
import java.util.HashMap;
import java.util.Map;
import javax.annotation.Resource;
import javax.validation.Valid;
import org.dozer.DozerBeanMapper;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.ResponseBody;

/**
 *
 * @author marcello
 */
@Controller
public class SystemController {

    @Resource(name = "dozermapper")
    protected DozerBeanMapper dozermapper;

    @RequestMapping(value = "/status", method = RequestMethod.GET)
    public @ResponseBody
    StatusResponse status(@Valid ServerStatusRequest statusRequest,
            BindingResult results,
            ModelMap map) {
        StatusResponse statusResponse = new StatusResponse(dozermapper);
        statusResponse.setData(Boolean.TRUE);
        return statusResponse;
    }

    @RequestMapping(value = "/health", method = RequestMethod.GET)
    public @ResponseBody
    HealthResponse health(@Valid ServerHealthRequest statusRequest,
            BindingResult results,
            ModelMap map) {
        System.out.println("-------------------------------------------------");
        OperatingSystemMXBean operatingSystemMXBean = ManagementFactory.getOperatingSystemMXBean();

        Map<String, String> values = new HashMap<String, String>();
        for (Method method : operatingSystemMXBean.getClass().getDeclaredMethods()) {
            method.setAccessible(true);
            if (method.getName().startsWith("get")
                    && Modifier.isPublic(method.getModifiers())) {
                Object value;
                String printable = "";
                try {
                    value = method.invoke(operatingSystemMXBean);
                    if (method.getName().equals("getFreePhysicalMemorySize")
                            || method.getName().equals("getFreeSwapSpaceSize")
                            || method.getName().equals("getTotalPhysicalMemorySize")
                            || method.getName().equals("getCommittedVirtualMemorySize")
                            || method.getName().equals("getTotalSwapSpaceSize")) {
                        value = (((Long) value) / 1024) / 1024;
                    } else if (method.getName().equals("getSystemCpuLoad")
                            || method.getName().equals("getProcessCpuLoad")) {
                        value = ((Double) value) * 100;
                    }
                    printable = value + "";
                    values.put(method.getName(), printable);
                } catch (Exception e) {
                    value = e;
                }
            }
        }
        System.out.println("-------------------------------------------------");
        HealthResponse statusResponse = new HealthResponse(dozermapper);
        statusResponse.setData(values);
        return statusResponse;
    }
}
