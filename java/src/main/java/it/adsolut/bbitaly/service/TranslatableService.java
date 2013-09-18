/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

/**
 *
 * @author marcello
 */
public abstract class TranslatableService {
    
    protected TranslationService translationService;

    public TranslationService getTranslationService() {
        return translationService;
    }

    public void setTranslationService(TranslationService translationService) {
        this.translationService = translationService;
    }
    
}
