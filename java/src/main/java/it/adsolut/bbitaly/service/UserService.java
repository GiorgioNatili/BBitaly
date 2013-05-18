/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.model.User;

/**
 *
 * @author marcello
 */
public interface UserService {
    public User add(String name, String username, String email, String password);
    public User activate(Long id);
    public User get(Long id);
    public User delete(Long id);
    public User findByEmail(String email);
}
