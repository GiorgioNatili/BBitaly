/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.response.converter;

import it.adsolut.bbitaly.model.RoomTranslation;

/**
 *
 * @author Marcello
 */
public class RoomPlaceDescriptionConverter extends TranslationConverter<RoomTranslation> {

    @Override
    public String getConvertedValue(RoomTranslation data) {
        return data.getPlaceDescription();
    }
}
