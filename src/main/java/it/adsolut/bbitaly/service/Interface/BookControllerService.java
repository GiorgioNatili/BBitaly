package it.adsolut.bbitaly.service.Interface;

import it.adsolut.bbitaly.Request.BookAddRequest;
import it.adsolut.bbitaly.Request.BookGetByAccomodation;
import it.adsolut.bbitaly.Request.BookGetByRoom;
import it.adsolut.bbitaly.Request.BookGetByUser;
import it.adsolut.bbitaly.Request.BookGetRequest;
import it.adsolut.bbitaly.Request.CheckAvailabilityRequest;
import it.adsolut.bbitaly.response.BbAvailabilityResponse;
import it.adsolut.bbitaly.response.BookListResponse;
import it.adsolut.bbitaly.response.BookResponse;

/**
 *
 * @author marcello
 */
public interface BookControllerService {
    public BookResponse delete(BookGetRequest bookGetRequest, BookResponse bookResponse);
    public BookResponse activate(BookGetRequest bookGetRequest, BookResponse bookResponse);
    public BookResponse get(BookGetRequest bookGetRequest, BookResponse bookResponse);
    public BookListResponse getByAccomodation(BookGetByAccomodation bookGetRequest, BookListResponse bookResponse);
    public BookListResponse getByRoom(BookGetByRoom bookGetRequest, BookListResponse bookResponse);
    public BookListResponse getByUser(BookGetByUser bookGetRequest, BookListResponse bookResponse);
    public BookResponse insert(BookAddRequest bookAddRequest, BookResponse bookResponse);
    public BbAvailabilityResponse checkAvailability(CheckAvailabilityRequest availabilityRequest, BbAvailabilityResponse availabilityResponse);
}
