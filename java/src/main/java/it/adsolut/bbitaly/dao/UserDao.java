/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.User;

/**
 *
 * @author marcello
 */
public interface UserDao {
    public void persist(User user);
    public User find(Long id);
    public User findByEmail(String email);
    public User delete(Long id);
}
