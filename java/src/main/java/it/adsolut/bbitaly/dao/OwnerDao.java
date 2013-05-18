/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.Owner;

/**
 *
 * @author marcello
 */
public interface OwnerDao{
    public Owner findByiD(Long id);
    public Owner findByEmail(String email);
    public void insert(Owner entity);
    public Owner delete(Long id);
    public Owner activate(Long id);
}
