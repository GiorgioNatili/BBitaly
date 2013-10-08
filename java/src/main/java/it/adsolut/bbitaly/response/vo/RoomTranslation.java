package it.adsolut.bbitaly.response.vo;

/**
 *
 * @author marcello
 */
public class RoomTranslation {

    private Long id;
    private Country lang;
    private String shortDescription;
    private String placeDescription;
    private String generalDescription;

    public String getGeneralDescription() {
        return generalDescription;
    }

    public void setGeneralDescription(String generalDescription) {
        this.generalDescription = generalDescription;
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

    public String getPlaceDescription() {
        return placeDescription;
    }

    public void setPlaceDescription(String placeDescription) {
        this.placeDescription = placeDescription;
    }

    public String getShortDescription() {
        return shortDescription;
    }

    public void setShortDescription(String shortDescription) {
        this.shortDescription = shortDescription;
    }
}
