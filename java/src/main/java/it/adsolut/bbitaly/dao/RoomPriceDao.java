package it.adsolut.bbitaly.dao;

import it.adsolut.bbitaly.model.RoomPrice;
import java.util.Date;
import java.util.List;

/**
 *
 * @author marcello
 */
public interface RoomPriceDao {
    public void persist(RoomPrice roomPrice);
    public RoomPrice find(Long id);
    public RoomPrice find(Long id, Date date);
    public List<RoomPrice> find(Long id, Date dateStart, Date dateEnd);
}
