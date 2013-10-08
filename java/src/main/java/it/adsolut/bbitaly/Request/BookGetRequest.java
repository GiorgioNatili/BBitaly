package it.adsolut.bbitaly.Request;

/**
 *
 * @author marcello
 */
public class BookGetRequest extends SignedRequest {
    
    private Long id;

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }
    
}
