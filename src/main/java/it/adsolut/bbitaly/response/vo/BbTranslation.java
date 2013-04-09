package it.adsolut.bbitaly.response.vo;

/**
 *
 * @author marcello
 */
public class BbTranslation {

    private Long id;
    private Country lang;
    private String description;

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Country getLang() {
        return lang;
    }

    public void setLang(Country lang) {
        this.lang = lang;
    }
}
