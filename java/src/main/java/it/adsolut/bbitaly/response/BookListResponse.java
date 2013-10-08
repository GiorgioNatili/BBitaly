package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.Book;
import java.util.ArrayList;
import java.util.List;
import org.dozer.DozerBeanMapper;

/**
 *
 * @author marcello
 */
public class BookListResponse extends Response<List<Book>, List<it.adsolut.bbitaly.response.vo.Book>> {

    public BookListResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }

    @Override
    protected List<it.adsolut.bbitaly.response.vo.Book> map(List<Book> data) {
        List<it.adsolut.bbitaly.response.vo.Book> list =  new ArrayList<it.adsolut.bbitaly.response.vo.Book>();
        for (Book b : data) {
            list.add(dozermapper.map(b, it.adsolut.bbitaly.response.vo.Book.class));
        }
        return list;
    }
}
