package it.adsolut.bbitaly.Request.Validator;

import it.adsolut.bbitaly.dao.RoomDao;
import it.adsolut.bbitaly.dao.RoomGalleryDao;
import it.adsolut.bbitaly.model.Room;
import javax.validation.ConstraintValidator;
import javax.validation.ConstraintValidatorContext;
import org.springframework.beans.factory.annotation.Autowired;



/**
 *
 * @author marcello
 */
public class RoomGalleryExistImpl implements ConstraintValidator<RoomGalleryExist, Long>{

    @Autowired
    private RoomGalleryDao roomGalleryDao;
    @Autowired
    private RoomDao roomDao;
    
    @Override
    public void initialize(RoomGalleryExist a) { }

    @Override
    public boolean isValid(Long t, ConstraintValidatorContext cvc) {
        Room room = roomDao.find(t);
        return roomGalleryDao.findByRoom(room) != null;
    }
    
}