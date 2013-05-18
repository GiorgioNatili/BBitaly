/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.util.google.api.adapter;

import java.net.MalformedURLException;

/**
 *
 * @author marcello
 */
public interface RequestExecuter {
    public String execute(String request) throws Exception,MalformedURLException;
}
