/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.Room;
import java.util.ArrayList;
import java.util.List;
import org.dozer.DozerBeanMapper;


/**
 *
 * @author marcello
 */
public class RoomListResponse extends Response<List<Room>,List<it.adsolut.bbitaly.response.vo.Room>>{

    public RoomListResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }

    @Override
    protected List<it.adsolut.bbitaly.response.vo.Room> map(List<Room> data) {
        List<it.adsolut.bbitaly.response.vo.Room> rooms = new ArrayList<it.adsolut.bbitaly.response.vo.Room>();
        for (Room c : data) {
            rooms.add(dozermapper.map(c, it.adsolut.bbitaly.response.vo.Room.class));
        }
        return rooms;
    }
    
}
