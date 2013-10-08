/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.Request.Validator.UserEmailExist;
import it.adsolut.bbitaly.exception.Code;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;
import org.hibernate.validator.constraints.Email;
import org.hibernate.validator.constraints.NotEmpty;

/**
 *
 * @author Marcello
 */
public class UserInsertRequest extends SignedRequest {

    @NotNull(message=Code.User.NAME_NOT_VALID)
    @NotEmpty(message=Code.Sintax.REQUEST_NOT_VALID)
    private String name;

    @NotNull(message=Code.User.SURNAME_NOT_VALID)
    @NotEmpty(message=Code.User.SURNAME_NOT_VALID)
    private String surname;
    
    @NotNull(message=Code.User.EMAIL_NOT_VALID)
    @NotEmpty(message=Code.User.EMAIL_NOT_VALID)
    @Email(message=Code.User.EMAIL_NOT_VALID)
    @UserEmailExist(message=Code.User.EMAIL_NOT_VALID)
    private String email;
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @NotEmpty(message=Code.Sintax.REQUEST_NOT_VALID)
    @Size(min=8,max=18)
    private String password;
    
    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getSurname() {
        return surname;
    }

    public void setSurname(String surname) {
        this.surname = surname;
    }
}
