/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.Application;

/**
 *
 * @author marcello
 */
public interface ApplicationDao {
    public Application finByAppId(Long appid);
}
