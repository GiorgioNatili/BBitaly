/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.exception;

/**
 *
 * @author marcello
 */
public class Exception extends RuntimeException { 

    protected Integer code = null;
    
    protected String message = null;
    
    public Exception(String message){
        super(message);
        setCode(4);
    }

    public Integer getCode() {
        return code;
    }

    public void setCode(Integer code) {
        this.code = code;
    }
}