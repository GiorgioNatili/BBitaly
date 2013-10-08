/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.response;

import it.adsolut.bbitaly.model.Room;
import org.dozer.DozerBeanMapper;


/**
 *
 * @author marcello
 */
public class RoomResponse extends Response<Room,it.adsolut.bbitaly.response.vo.Room>{

    public RoomResponse(DozerBeanMapper dozermapper) {
        super(dozermapper);
    }

    @Override
    protected it.adsolut.bbitaly.response.vo.Room map(Room data) {
        return dozermapper.map(data, it.adsolut.bbitaly.response.vo.Room.class);
    }
    
}
