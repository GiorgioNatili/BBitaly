package it.adsolut.bbitaly.controller;

import it.adsolut.bbitaly.Request.BookAddRequest;
import it.adsolut.bbitaly.Request.BookGetByAccomodation;
import it.adsolut.bbitaly.Request.BookGetByRoom;
import it.adsolut.bbitaly.Request.BookGetByUser;
import it.adsolut.bbitaly.Request.BookGetRequest;
import it.adsolut.bbitaly.Request.CheckAvailabilityRequest;
import it.adsolut.bbitaly.response.BbAvailabilityResponse;
import it.adsolut.bbitaly.response.BookListResponse;
import it.adsolut.bbitaly.response.BookResponse;
import it.adsolut.bbitaly.service.Interface.BookControllerService;
import javax.annotation.Resource;
import javax.validation.Valid;
import org.dozer.DozerBeanMapper;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.ResponseBody;

@Controller
public class BookController {

    @Resource(name = "dozermapper")
    protected DozerBeanMapper dozermapper;
    @Resource(name = "bookservice")
    private BookControllerService bookService;

    @RequestMapping(value = "/book", method = RequestMethod.GET)
    public @ResponseBody 
    BookResponse get(@Valid BookGetRequest bookGetRequest,
            BindingResult results,
            ModelMap map) {
        BookResponse bookResponse = new BookResponse(dozermapper);
        if (!results.hasErrors()) {
            bookResponse = bookService.get(bookGetRequest, bookResponse);
        } else {
            bookResponse.addError(results.getAllErrors());
        }
        return bookResponse;
    }
    
    @RequestMapping(value = "/book", method = RequestMethod.POST)
    public @ResponseBody 
    BookResponse add(@Valid BookAddRequest bookAddRequest,
            BindingResult results,
            ModelMap map) {
        BookResponse bookResponse = new BookResponse(dozermapper);
        if (!results.hasErrors()) {
            bookResponse = bookService.insert(bookAddRequest, bookResponse);
        } else {
            bookResponse.addError(results.getAllErrors());
        }
        return bookResponse;
    }
    
    @RequestMapping(value = "/book/byAccomodation", method = RequestMethod.GET)
    public @ResponseBody 
    BookListResponse getByAccomoadtion(@Valid BookGetByAccomodation bookGetRequest,
            BindingResult results,
            ModelMap map) {
        BookListResponse bookListResponse = new BookListResponse(dozermapper);
        if (!results.hasErrors()) {
            bookListResponse = bookService.getByAccomodation(bookGetRequest, bookListResponse);
        } else {
            bookListResponse.addError(results.getAllErrors());
        }
        return bookListResponse;
    }
    
    @RequestMapping(value = "/book/byRoom", method = RequestMethod.GET)
    public @ResponseBody 
    BookListResponse getByRoom(@Valid BookGetByRoom bookGetRequest,
            BindingResult results,
            ModelMap map) {
        BookListResponse bookListResponse = new BookListResponse(dozermapper);
        if (!results.hasErrors()) {
            bookListResponse = bookService.getByRoom(bookGetRequest, bookListResponse);
        } else {
            bookListResponse.addError(results.getAllErrors());
        }
        return bookListResponse;
    }
    
    @RequestMapping(value = "/book/byUser", method = RequestMethod.GET)
    public @ResponseBody 
    BookListResponse getByUser(@Valid BookGetByUser bookGetRequest,
            BindingResult results,
            ModelMap map) {
        BookListResponse bookListResponse = new BookListResponse(dozermapper);
        if (!results.hasErrors()) {
            bookListResponse = bookService.getByUser(bookGetRequest, bookListResponse);
        } else {
            bookListResponse.addError(results.getAllErrors());
        }
        return bookListResponse;
    }
    
    @RequestMapping(value = "/book/check", method = RequestMethod.GET)
    public @ResponseBody 
    BbAvailabilityResponse check(@Valid CheckAvailabilityRequest availabilityRequest,
            BindingResult results,
            ModelMap map) {
        BbAvailabilityResponse availabilityResponse = new BbAvailabilityResponse(dozermapper);
        if (!results.hasErrors()) {
            availabilityResponse = bookService.checkAvailability(availabilityRequest, availabilityResponse);
        } else {
            availabilityResponse.addError(results.getAllErrors());
        }
        return availabilityResponse;
    }
    
    @RequestMapping(value = "/book/delete", method = RequestMethod.POST)
    public @ResponseBody 
    BookResponse delete(@Valid BookGetRequest bookGetRequest,
            BindingResult results,
            ModelMap map) {
        BookResponse bookResponse = new BookResponse(dozermapper);
        if (!results.hasErrors()) {
            bookResponse = bookService.delete(bookGetRequest, bookResponse);
        } else {
            bookResponse.addError(results.getAllErrors());
        }
        return bookResponse;
    }
    
    @RequestMapping(value = "/book/activate", method = RequestMethod.POST)
    public @ResponseBody 
    BookResponse activate(@Valid BookGetRequest bookGetRequest,
            BindingResult results,
            ModelMap map) {
        BookResponse bookResponse = new BookResponse(dozermapper);
        if (!results.hasErrors()) {
            bookResponse = bookService.activate(bookGetRequest, bookResponse);
        } else {
            bookResponse.addError(results.getAllErrors());
        }
        return bookResponse;
    }
}
