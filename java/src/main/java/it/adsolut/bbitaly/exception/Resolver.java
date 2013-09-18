/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.exception;

import java.util.HashMap;
import java.util.Map;
import java.util.regex.Matcher;
import java.util.regex.Pattern;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.springframework.web.servlet.HandlerExceptionResolver;
import org.springframework.web.servlet.ModelAndView;

/**
 *
 * @author marcello
 */
public class Resolver  implements HandlerExceptionResolver {

    @Override
    public ModelAndView resolveException(HttpServletRequest hsr, HttpServletResponse hsr1, Object o, java.lang.Exception exception) {
        ModelAndView mav = new ModelAndView();
        Map<String,String> error = new HashMap<String,String>();
        error.put("code", "200");
        error.put("message", exception.getMessage());
        mav.setViewName("error.json.jsp");
        
        String ru = hsr.getRequestURI();
        Pattern p = Pattern.compile("(.xml)");
        Matcher m = p.matcher(ru);
        if (m.groupCount() > 1) {
            mav.setViewName("error.xml.jsp");
        }
        mav.addObject("error", error);
        return mav;
    }
    
}
