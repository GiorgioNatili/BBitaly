/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.response;

import java.util.ArrayList;
import java.util.List;
import javax.annotation.Resource;
import org.dozer.DozerBeanMapper;
import org.springframework.validation.ObjectError;

/**
 *
 * @author marcello
 */
public abstract class Response<T,K> {

    @Resource(name = "dozermapper")
    protected DozerBeanMapper dozermapper;
    
    private List<String> errors = new ArrayList<String>();
    
    protected K data;

    public Response(DozerBeanMapper dozermapper) {
        this.dozermapper = dozermapper;
    }

    public List<String> getErrors() {
        return errors;
    }

    public void setErrors(List<String> errors) {
        this.errors = errors;
    }

    public void addError(String code) {
        errors.add(code);
    }

    public void addError(List<ObjectError> errors) {
        for (ObjectError oe : errors) {
            this.addError(oe.getDefaultMessage());
        }
    }

    public K getData(){
        return this.data;
    }
    
    public void setData(T data){
        this.data = map(data);
    }
    
    protected abstract K map(T data);
}
