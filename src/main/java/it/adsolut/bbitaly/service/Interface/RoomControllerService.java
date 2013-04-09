/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service.Interface;

import it.adsolut.bbitaly.Request.AddPriceRequest;
import it.adsolut.bbitaly.Request.PriceGetByIntervalRequest;
import it.adsolut.bbitaly.Request.RoomDeleteRequest;
import it.adsolut.bbitaly.Request.RoomGetByBbRequest;
import it.adsolut.bbitaly.Request.RoomGetRequest;
import it.adsolut.bbitaly.Request.RoomInsertRequest;
import it.adsolut.bbitaly.Request.RoomUpdateRequest;
import it.adsolut.bbitaly.response.RoomListResponse;
import it.adsolut.bbitaly.response.RoomPriceListResponse;
import it.adsolut.bbitaly.response.RoomResponse;
import it.adsolut.bbitaly.response.RoomTotalPriceResponse;
import javax.servlet.http.HttpServletRequest;

/**
 *
 * @author marcello
 */
public interface RoomControllerService {
    public RoomResponse save(RoomInsertRequest roomInsertRequest, RoomResponse roomResponse);
    public RoomResponse get(RoomGetRequest roomGetRequest, RoomResponse roomResponse);
    public RoomListResponse getByBb(RoomGetByBbRequest roomGetRequest, RoomListResponse roomResponse);
    public RoomResponse update(RoomUpdateRequest roomUpdateRequest, RoomResponse roomResponse);
    public RoomResponse delete(RoomDeleteRequest roomDeleteRequest, RoomResponse roomResponse);
    public RoomResponse setCover(Long id, HttpServletRequest request, RoomResponse roomResponse);
    public RoomResponse addprice(AddPriceRequest addPriceRequest, RoomResponse roomResponse);
    public RoomPriceListResponse getPriceByDate(PriceGetByIntervalRequest getPriceByIntervalRequest, RoomPriceListResponse roomPriceListResponse);
    public RoomTotalPriceResponse getTotalByDate(PriceGetByIntervalRequest getPriceByIntervalRequest,  RoomTotalPriceResponse priceResponse);
}
