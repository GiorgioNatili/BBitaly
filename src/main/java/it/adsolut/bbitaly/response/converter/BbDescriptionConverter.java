/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.response.converter;

import it.adsolut.bbitaly.model.BbTranslation;

/**
 *
 * @author marcello
 */
public class BbDescriptionConverter extends TranslationConverter<BbTranslation> {


    @Override
    public String getConvertedValue(BbTranslation data) {
        return data.getDescription();
    }
}
