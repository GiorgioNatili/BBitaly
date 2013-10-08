package it.adsolut.bbitaly.Request;

import it.adsolut.bbitaly.exception.Code;
import javax.validation.constraints.NotNull;
import org.hibernate.validator.constraints.Email;

/**
 *
 * @author marcello
 */
public class AuthOwnerRequest extends SignedRequest {
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    @Email(message=Code.User.EMAIL_NOT_VALID)
    private String email;
    
    @NotNull(message=Code.Sintax.REQUEST_NOT_VALID)
    private String password;

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }
    
}
