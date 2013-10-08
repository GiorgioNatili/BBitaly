/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.response.converter;

import java.util.HashSet;
import java.util.Set;
import javax.servlet.http.HttpServletRequest;
import org.dozer.DozerConverter;
import org.springframework.web.context.request.RequestAttributes;
import org.springframework.web.context.request.RequestContextHolder;
import org.springframework.web.context.request.ServletRequestAttributes;

/**
 *
 * @author marcello
 */
public abstract class TranslationConverter<T extends Translatable> extends DozerConverter<Set, String>{

    private String defaultLang;
    
    private String langAccessKey;
    
    public TranslationConverter() {
        super(Set.class, String.class);
    }

    public void setLangAccessKey(String langAccessKey) {
        this.langAccessKey = langAccessKey;
    }

    protected String getLangAccessKey() {
        return langAccessKey;
    }
    
    public void setDefaultLang(String defaultLang) {
        this.defaultLang = defaultLang;
    }

    protected String getDefaultLang() {
        return defaultLang;
    }
    
    protected String getRequestedLang() {
        RequestAttributes requestAttributes = RequestContextHolder.getRequestAttributes();
        HttpServletRequest request = ((ServletRequestAttributes) requestAttributes).getRequest();
        String lang = request.getParameter(getLangAccessKey());
        if (lang == null || lang.equals("")) { lang = getDefaultLang(); }
        return lang;
    }
    
    @Override
    public String convertTo(Set a, String b) {
        if (a == null) { return ""; }
        Set<T> translations = (Set<T>) a;
        for (T rt : translations) {
            if (rt.getLang().getPrefix().equals(getRequestedLang())) {
                return getConvertedValue(rt);
            }
        }
        return getConvertedValue(translations.iterator().next());
    }
    
    @Override
    public Set<T> convertFrom(String b, Set a) {
        return new HashSet<T>();
    }
    
    public abstract String getConvertedValue(T data);
}
