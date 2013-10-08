package it.adsolut.bbitaly.response.vo;

/**
 *
 * @author marcello
 */
public class Book {
    private Long id;
    private String dateStart;
    private String dateEnd;
    private BedBreakfast bedBreakfast;
    private Room room;
    private User user;
    private BookDetail bookDetail;
    private Float price;

    public BedBreakfast getBedBreakfast() {
        return bedBreakfast;
    }

    public void setBedBreakfast(BedBreakfast bedBreakfast) {
        this.bedBreakfast = bedBreakfast;
    }

    public BookDetail getBookDetail() {
        return bookDetail;
    }

    public void setBookDetail(BookDetail bookDetail) {
        this.bookDetail = bookDetail;
    }

    public String getDateEnd() {
        return dateEnd;
    }

    public void setDateEnd(String dateEnd) {
        this.dateEnd = dateEnd;
    }

    public String getDateStart() {
        return dateStart;
    }

    public void setDateStart(String dateStart) {
        this.dateStart = dateStart;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Float getPrice() {
        return price;
    }

    public void setPrice(Float price) {
        this.price = price;
    }

    public Room getRoom() {
        return room;
    }

    public void setRoom(Room room) {
        this.room = room;
    }

    public User getUser() {
        return user;
    }

    public void setUser(User user) {
        this.user = user;
    }
    
}
