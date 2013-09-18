/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.util.google.api;

/**
 *
 * @author marcello
 */
public class Types {
    
    private String joiner = "|";
    
    private String type = "";
    
    public void addType(String type) {
        if (this.type.isEmpty()) {
            this.type += type;
        }
        this.type += joiner+type;
    }

    public String getType() {
        return type;
    }
    
    public String getJoiner() {
        return joiner;
    }

    public void setJoiner(String joiner) {
        this.joiner = joiner;
    }
}
