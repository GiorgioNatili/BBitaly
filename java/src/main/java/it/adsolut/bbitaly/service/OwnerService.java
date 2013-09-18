/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.model.Owner;

/**
 *
 * @author marcello
 */
public interface OwnerService {
    public Owner insert(String name,String surname, String email, String password, String address, Long regionid, String phonenumber);
    public Owner findByEmail(String email);
    public Owner findById(Long id);
    public Owner delete(Long id);
    public Owner activate(Long id);
}
