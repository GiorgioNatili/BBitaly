package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.Book;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class BookResponse extends Response<Book, it.adsolut.bbitaly.response.vo.Book> {

    public BookResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }

    @Override
    protected it.adsolut.bbitaly.response.vo.Book map(Book data) {
        return dozermapper.map(data, it.adsolut.bbitaly.response.vo.Book.class);
    }
}
