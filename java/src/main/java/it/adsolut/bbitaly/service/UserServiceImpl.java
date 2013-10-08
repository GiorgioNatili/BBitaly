/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.Request.AuthUserRequest;
import it.adsolut.bbitaly.Request.UserDeleteRequest;
import it.adsolut.bbitaly.Request.UserGetRequest;
import it.adsolut.bbitaly.Request.UserInsertRequest;
import it.adsolut.bbitaly.Request.UserUpdateRequest;
import it.adsolut.bbitaly.dao.UserDao;
import it.adsolut.bbitaly.exception.Code;
import it.adsolut.bbitaly.model.User;
import it.adsolut.bbitaly.response.UserResponse;
import it.adsolut.bbitaly.service.Interface.UserControllerService;
import it.adsolut.bbitaly.util.string.MessageDigest;

/**
 *
 * @author marcello
 */
public class UserServiceImpl implements UserService, UserControllerService {

    private UserDao userDao;
    
    public void setUserDao(UserDao userDao) {
        this.userDao = userDao;
    }

    @Override
    public User add(String name, String surname, String email, String password) {
        User user = new User();
        user.setEmail(email);
        user.setSurname(surname);
        user.setName(name);
        user.setPassword(MessageDigest.sha1(password));
        user.setRole("user");
        userDao.persist(user);
        return user;
    }

    @Override
    public UserResponse add(UserInsertRequest userInsertRequest, UserResponse userResponse) {
        User user = this.add(userInsertRequest.getName(),
                userInsertRequest.getSurname(),
                userInsertRequest.getEmail(),
                userInsertRequest.getPassword());
        userResponse.setData(user);
        return userResponse;
    }

    @Override
    public User get(Long id) {
        return userDao.find(id);
    }

    @Override
    public UserResponse get(UserGetRequest userGetRequest, UserResponse userResponse) {
        userResponse.setData(this.get(userGetRequest.getId()));
        return userResponse;
    }

    @Override
    public User delete(Long id) {
        return userDao.delete(id);
    }

    @Override
    public UserResponse delete(UserDeleteRequest userDeleteRequest, UserResponse userResponse) {
        userResponse.setData(this.delete(userDeleteRequest.getId()));
        return userResponse;
    }

    @Override
    public User findByEmail(String email) {
        return userDao.findByEmail(email);
    }

    @Override
    public UserResponse login(AuthUserRequest authUserRequest, UserResponse userResponse) {
        User user = this.findByEmail(authUserRequest.getEmail());
        if (user != null
                && user.getPassword().equals(MessageDigest.sha1(authUserRequest.getPassword()))) {
            userResponse.setData(user);
        }
        return userResponse;
    }

    @Override
    public User activate(Long id) {
        User u = this.get(id);
        u.setActive(Boolean.TRUE);
        this.userDao.persist(u);
        return u;
    }

    @Override
    public UserResponse activate(UserGetRequest userGetRequest, UserResponse userResponse) {
        userResponse.setData(this.activate(userGetRequest.getId()));
        return userResponse;
    }

    @Override
    public UserResponse update(UserUpdateRequest userUpdateRequest, UserResponse userResponse) {
        User oldUser = userDao.find(userUpdateRequest.getId());
        User o = userDao.findByEmail(userUpdateRequest.getEmail());
        if (null != o) {
            if (!o.getId().equals(userUpdateRequest.getId())) {
                userResponse.addError(Code.User.USER_EXIST);
            }
        }
        if (userUpdateRequest.getPassword() == null
                || "".equals(userUpdateRequest.getPassword())) {
            userUpdateRequest.setPassword(oldUser.getPassword());
        } else {
            userUpdateRequest.setPassword(
                    MessageDigest.sha1(userUpdateRequest.getPassword()));
        }
        if (userResponse.getErrors().isEmpty()) {
            userResponse.setData(
                    this.update(
                    userUpdateRequest.getId(),
                    userUpdateRequest.getName(),
                    userUpdateRequest.getSurname(),
                    userUpdateRequest.getEmail(),
                    userUpdateRequest.getPassword()));
        }
        return userResponse;
    }
    
    private User update(Long id, String name, String surname, String email, String password) {
        User u = userDao.find(id);
        u.setName(name);
        u.setSurname(surname);
        u.setEmail(email);
        u.setPassword(password);
        userDao.persist(u);
        return u;
    }
}
