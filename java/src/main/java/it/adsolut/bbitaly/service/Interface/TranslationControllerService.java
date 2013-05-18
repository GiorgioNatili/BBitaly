/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service.Interface;

import it.adsolut.bbitaly.Request.BbGetTranslationRequest;
import it.adsolut.bbitaly.Request.BbInsertTranslationRequest;
import it.adsolut.bbitaly.Request.RoomGetTranslationRequest;
import it.adsolut.bbitaly.Request.RoomInsertTranslationRequest;
import it.adsolut.bbitaly.response.BbTranslationListResponse;
import it.adsolut.bbitaly.response.BbTranslationResponse;
import it.adsolut.bbitaly.response.RoomTranslationListResponse;
import it.adsolut.bbitaly.response.RoomTranslationResponse;

/**
 *
 * @author marcello
 */
public interface TranslationControllerService {
    public BbTranslationListResponse getBbTranslation(BbGetTranslationRequest bbGetTranslationRequest, BbTranslationListResponse bbTranslationResponse);
    public BbTranslationResponse insertBbTranslation(BbInsertTranslationRequest bbInsertTranslationRequest, BbTranslationResponse bbTranslationResponse);
    public RoomTranslationListResponse getRoomTranslation(RoomGetTranslationRequest roomGetTranslationRequest, RoomTranslationListResponse RoomTranslationResponse);
    public RoomTranslationResponse insertRoomTranslation(RoomInsertTranslationRequest roomInsertTranslationRequest, RoomTranslationResponse bbTranslationResponse);
}
