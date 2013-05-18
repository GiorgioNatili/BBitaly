package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.Request.BookAddRequest;
import it.adsolut.bbitaly.Request.BookGetByAccomodation;
import it.adsolut.bbitaly.Request.BookGetByRoom;
import it.adsolut.bbitaly.Request.BookGetByUser;
import it.adsolut.bbitaly.Request.BookGetRequest;
import it.adsolut.bbitaly.Request.CheckAvailabilityRequest;
import it.adsolut.bbitaly.dao.BookDao;
import it.adsolut.bbitaly.dao.BookDetailDao;
import it.adsolut.bbitaly.exception.Code;
import it.adsolut.bbitaly.model.BedBreakfast;
import it.adsolut.bbitaly.model.Book;
import it.adsolut.bbitaly.model.BookDetail;
import it.adsolut.bbitaly.model.Facility;
import it.adsolut.bbitaly.model.Policy;
import it.adsolut.bbitaly.model.Room;
import it.adsolut.bbitaly.model.RoomPrice;
import it.adsolut.bbitaly.model.RoomTranslation;
import it.adsolut.bbitaly.model.User;
import it.adsolut.bbitaly.response.BbAvailabilityResponse;
import it.adsolut.bbitaly.response.BookListResponse;
import it.adsolut.bbitaly.response.BookResponse;
import it.adsolut.bbitaly.service.Interface.BookControllerService;
import java.util.Date;
import java.util.Iterator;
import java.util.List;
import org.joda.time.DateTime;
import org.joda.time.format.DateTimeFormat;
import org.joda.time.format.DateTimeFormatter;

/**
 *
 * @author marcello
 */
public class BookServiceImpl implements BookService, BookControllerService {

    private BookDao bookDao;
    private BookDetailDao bookDetailDao;
    private UserService userService;
    private BbService bbService;
    private RoomService roomService;

    public BookDao getBookDao() {
        return bookDao;
    }

    public void setBookDao(BookDao bookDao) {
        this.bookDao = bookDao;
    }

    public BookDetailDao getBookDetailDao() {
        return bookDetailDao;
    }

    public void setBookDetailDao(BookDetailDao bookDetailDao) {
        this.bookDetailDao = bookDetailDao;
    }

    public BbService getBbService() {
        return bbService;
    }

    public void setBbService(BbService bbService) {
        this.bbService = bbService;
    }

    public RoomService getRoomService() {
        return roomService;
    }

    public void setRoomService(RoomService roomService) {
        this.roomService = roomService;
    }

    public UserService getUserService() {
        return userService;
    }

    public void setUserService(UserService userService) {
        this.userService = userService;
    }

    @Override
    public Book get(Long id) {
        return bookDao.find(id);
    }

    @Override
    public List<Book> getByAccomodation(String id) {
        return bookDao.findByAccomodation(bbService.get(id));
    }

    @Override
    public List<Book> getByRoom(Long id) {
        return bookDao.findByRoom(roomService.find(id));
    }

    @Override
    public List<Book> getByUser(Long id) {
        return bookDao.findByUser(userService.get(id));
    }

    @Override
    public Book insert(
            String accomodationId,
            Long roomid,
            Long userid,
            Integer daystart,
            Integer monthstart,
            Integer yearstart,
            Integer dayend,
            Integer monthend,
            Integer yearend,
            Integer person) {
        DateTimeFormatter patter = DateTimeFormat.forPattern("y/M/d");
        DateTime dateStart = patter.parseDateTime(yearstart + "/" + monthstart + "/" + daystart);
        DateTime dateEnd = patter.parseDateTime(yearend + "/" + monthend + "/" + dayend);
        BedBreakfast bb = bbService.get(accomodationId);
        Room room = roomService.find(roomid);
        User user = userService.get(userid);
        Book book = new Book();
        book.setBedBreakfast(bb);
        book.setDateStart(dateStart.toDate());
        book.setDateEnd(dateEnd.toDate());
        book.setRoom(room);
        book.setUser(user);
        BookDetail bookDetail = new BookDetail();
        bookDetail.setAccomodationName(bb.getName());
        Iterator iter = room.getDescription().iterator();
        String roomName = "";
        while (iter.hasNext()) {
            RoomTranslation rt = (RoomTranslation) iter.next();
            if ("en".equals(rt.getLang().getPrefix())) {
                roomName = rt.getShortDescription();
                break;
            }
            if ("it".equals(rt.getLang().getPrefix())) {
                roomName = rt.getShortDescription();
            }
        }
        if ("".equals(roomName)) {
            roomName = ((RoomTranslation) room.getDescription().iterator().next()).getShortDescription();
        }
        bookDetail.setRoomName(roomName);

//        StringBuilder bufferFac = new StringBuilder();
//        Iterator iterFac = bb.getFacility().iterator();
//        if (iterFac.hasNext()) {
//            bufferFac.append(iterFac.next());
//            while (iterFac.hasNext()) {
//                bufferFac.append(",");
//                bufferFac.append(((Facility) iterFac.next()).getName());
//            }
//        }
//        bookDetail.setFacilityList(bufferFac.toString());
        bookDetail.setFacilityList("");

//        StringBuilder bufferPol = new StringBuilder();
//        Iterator iterPol = bb.getFacility().iterator();
//        if (iterPol.hasNext()) {
//            bufferPol.append(iterPol.next());
//            while (iterPol.hasNext()) {
//                bufferPol.append(",");
//                bufferPol.append(((Policy) iterPol.next()).getName());
//            }
//        }
//        bookDetail.setPolicyList(bufferPol.toString());
        bookDetail.setPolicyList("");
        bookDetail.setPerson(person);
        Float price = roomService.getTotalByInterval(roomid, daystart, monthstart, yearstart, dayend, monthend, yearend);
        book.setPrice(price);
        book.setBookDetail(bookDetail);
        bookDetailDao.persist(bookDetail);
        bookDao.persist(book);
        return book;
    }

    @Override
    public BookResponse get(BookGetRequest bookGetRequest, BookResponse bookResponse) {
        bookResponse.setData(this.get(bookGetRequest.getId()));
        return bookResponse;
    }

    @Override
    public BookListResponse getByAccomodation(BookGetByAccomodation bookGetRequest, BookListResponse bookResponse) {
        bookResponse.setData(this.getByAccomodation(bookGetRequest.getId()));
        return bookResponse;
    }

    @Override
    public BookListResponse getByRoom(BookGetByRoom bookGetRequest, BookListResponse bookResponse) {
        bookResponse.setData(this.getByRoom(bookGetRequest.getRid()));
        return bookResponse;
    }

    @Override
    public BookListResponse getByUser(BookGetByUser bookGetRequest, BookListResponse bookResponse) {
        bookResponse.setData(this.getByUser(bookGetRequest.getUid()));
        return bookResponse;
    }

    @Override
    public BookResponse insert(BookAddRequest bookAddRequest, BookResponse bookResponse) {
        
        DateTimeFormatter patter = DateTimeFormat.forPattern("y/M/d");
        DateTime dateStart = patter.parseDateTime(bookAddRequest.getYearStart() + "/" + bookAddRequest.getMonthStart() + "/" + bookAddRequest.getDayStart());
        DateTime dateEnd = patter.parseDateTime(bookAddRequest.getYearEnd() + "/" + bookAddRequest.getMonthEnd() + "/" + bookAddRequest.getDayEnd());
        
        Boolean isAvailable = this.checkAvailability(bookAddRequest.getRid(),dateStart.toDate(),dateEnd.toDate());
        if (isAvailable) {
            bookResponse.setData(this.insert(bookAddRequest.getId(),
                    bookAddRequest.getRid(),
                    bookAddRequest.getUid(),
                    bookAddRequest.getDayStart(),
                    bookAddRequest.getMonthStart(),
                    bookAddRequest.getYearStart(),
                    bookAddRequest.getDayEnd(),
                    bookAddRequest.getMonthEnd(),
                    bookAddRequest.getYearEnd(),
                    bookAddRequest.getNumber()));
        } else {
            bookResponse.addError(Code.Book.NO_SUITABLE_PRICE_FOR_THAT_PERIOD);
        }
        return bookResponse;
    }

    @Override
    public Boolean checkAvailability(Long id, Date start, Date end) {
        return this.bookDao.checkAvailability(roomService.find(id), start, end);
    }

    @Override
    public BbAvailabilityResponse checkAvailability(CheckAvailabilityRequest availabilityRequest, BbAvailabilityResponse availabilityResponse) {
        availabilityResponse.setData(this.checkAvailability(
                availabilityRequest.getId(), 
                availabilityRequest.getStart(),
                availabilityRequest.getEnd()));
        return availabilityResponse;
    }

    @Override
    public Book delete(Long id) {
        return this.delete(id);
    }

    @Override
    public Book activate(Long id) {
        Book book = this.get(id);
        book.setActive(Boolean.TRUE);
        this.bookDao.persist(book);
        return book;
    }

    @Override
    public BookResponse delete(BookGetRequest bookGetRequest, BookResponse bookResponse) {
        bookResponse.setData(this.delete(bookGetRequest.getId()));
        return bookResponse;
    }

    @Override
    public BookResponse activate(BookGetRequest bookGetRequest, BookResponse bookResponse) {
        bookResponse.setData(this.activate(bookGetRequest.getId()));
        return bookResponse;
    }
}
