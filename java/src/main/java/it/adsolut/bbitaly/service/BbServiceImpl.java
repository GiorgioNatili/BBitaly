/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.Request.BbCountByOwnerRequest;
import it.adsolut.bbitaly.Request.BbCountRequest;
import it.adsolut.bbitaly.Request.BbDeleteRequest;
import it.adsolut.bbitaly.Request.BbGetAllRequest;
import it.adsolut.bbitaly.Request.BbGetByOwnerRequest;
import it.adsolut.bbitaly.Request.BbGetRequest;
import it.adsolut.bbitaly.Request.BbInsertRequest;
import it.adsolut.bbitaly.Request.BbUpdateRequest;
import it.adsolut.bbitaly.dao.BedBreakfastDao;
import it.adsolut.bbitaly.exception.Code;
import it.adsolut.bbitaly.model.BbTranslation;
import it.adsolut.bbitaly.model.BedBreakfast;
import it.adsolut.bbitaly.model.City;
import it.adsolut.bbitaly.model.Country;
import it.adsolut.bbitaly.model.Location;
import it.adsolut.bbitaly.model.Owner;
import it.adsolut.bbitaly.model.Region;
import it.adsolut.bbitaly.response.BbCountResponse;
import it.adsolut.bbitaly.response.BbListResponse;
import it.adsolut.bbitaly.response.BbResponse;
import it.adsolut.bbitaly.service.Interface.BbControllerService;
import it.adsolut.bbitaly.util.file.Uploader;
import it.adsolut.bbitaly.util.google.api.Coordinate;
import it.adsolut.bbitaly.util.string.Replace;
import java.util.Date;
import java.util.HashSet;
import java.util.List;
import java.util.Map;
import java.util.Set;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.http.HttpServletRequest;
import org.springframework.transaction.annotation.Transactional;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.multipart.MultipartHttpServletRequest;

/**
 *
 * @author marcello
 */
@Transactional
public class BbServiceImpl extends TranslatableService implements BbService, BbControllerService {

    private BedBreakfastDao bedBreakfastDao;
    private OwnerService ownerService;
    private FacilityService facilityService;
    private PolicyService policyService;
    private Uploader uploader;
    private L10nService l10nService;
    private LocationService locationService;

    public void setBedBreakfastDao(BedBreakfastDao bedBreakfastDao) {
        this.bedBreakfastDao = bedBreakfastDao;
    }

    public void setOwnerService(OwnerService ownerService) {
        this.ownerService = ownerService;
    }

    public void setFacilityService(FacilityService facilityService) {
        this.facilityService = facilityService;
    }

    public void setPolicyService(PolicyService policyService) {
        this.policyService = policyService;
    }

    public void setLocationService(LocationService locationService) {
        this.locationService = locationService;
    }

    public void setL10nService(L10nService l10nService) {
        this.l10nService = l10nService;
    }

    public void setUploader(Uploader uploader) {
        this.uploader = uploader;
    }

    @Override
    public BedBreakfast get(String id) {
        BedBreakfast bedBreakfast = bedBreakfastDao.find(id);
        return bedBreakfast;
    }

    @Override
    public BedBreakfast update(
            String bbid, Long ownerid, String type, String propertytname, String assignedname,
            String phonenumber, String personalemail, String address, Long cityId,
            List<Long> facilitiesId, List<Long> policiesId, Boolean directContact,
            String description, String lang) {
        BedBreakfast bedBreakfast = bedBreakfastDao.find(bbid);
        return this.persist(bedBreakfast, ownerid, type, propertytname, assignedname,
                phonenumber, personalemail, address, cityId,
                facilitiesId, policiesId, directContact, description, lang);
    }

    @Override
    public BedBreakfast insert(
            Long ownerid, String type, String propertytname, String assignedname,
            String phonenumber, String personalemail, String address, Long cityId,
            List<Long> facilitiesId, List<Long> policiesId, Boolean directContact,
            String description, String lang) {
        BedBreakfast bedBreakfast = new BedBreakfast();
        return this.persist(bedBreakfast, ownerid, type, propertytname, assignedname,
                phonenumber, personalemail, address, cityId,
                facilitiesId, policiesId, directContact, description, lang);
    }

    private BedBreakfast persist(
            BedBreakfast bedBreakfast, Long ownerid, String type, String propertytname, String assignedname,
            String phonenumber, String personalemail, String address, Long cityId,
            List<Long> facilitiesId, List<Long> policiesId, Boolean directContact,
            String description, String lang) {

        City r = new City();
        r.setId(cityId);
        City city = l10nService.findCity(r);
        
        Owner owner = ownerService.findById(ownerid);
        Set<BbTranslation> translationSet = new HashSet<BbTranslation>();
        BbTranslation translation = translationService.createBBTranslation(lang, description);
        bedBreakfast.setType(type);
        bedBreakfast.setAssignedname(assignedname);
        bedBreakfast.setContactemail(personalemail);
        bedBreakfast.setOwner(owner);
        bedBreakfast.setPhone(phonenumber);
        bedBreakfast.setName(propertytname);
        bedBreakfast.setRank(0);
        bedBreakfast.setFacility(facilityService.getFacilities(facilitiesId));
        bedBreakfast.setPolicy(policyService.getPolicies(policiesId));
        translationSet.add(translation);
        bedBreakfast.setDescription(translationSet);
        bedBreakfast.setAddress(address);
        bedBreakfast.setCity(city);
        try {
            Coordinate coord = locationService.searchCoordByAddress(city.getName()+", "+city.getCountry().getName(), address);
            locationService.searchNearbyPoi(city.getName()+", "+city.getCountry().getName(), address);
            bedBreakfast.setLatitude(coord.getLatitude());
            bedBreakfast.setLongitude(coord.getLongitude());
        } catch (Exception ex) {
            Logger.getLogger(BbServiceImpl.class.getName()).log(Level.SEVERE, null, ex);
        }

        bedBreakfastDao.persist(bedBreakfast);
        return bedBreakfast;
    }

    @Override
    public BedBreakfast activate(String id) {
        BedBreakfast bedBreakfast = bedBreakfastDao.activate(id);
        return bedBreakfast;
    }

    @Override
    public BedBreakfast delete(String id) {
        BedBreakfast bedBreakfast = bedBreakfastDao.delete(id);
        return bedBreakfast;
    }

    @Override
    public BbResponse insert(BbInsertRequest bbInsertRequest, BbResponse bbResponse) {
        bbResponse.setData(this.insert(
                bbInsertRequest.getOwnerid(),
                bbInsertRequest.getType(),
                bbInsertRequest.getPropertytname(),
                bbInsertRequest.getAssignedname(),
                bbInsertRequest.getPhonenumber(),
                bbInsertRequest.getPersonalemail(),
                bbInsertRequest.getAddress(),
                bbInsertRequest.getCityid(),
                bbInsertRequest.getFacilitiesId(),
                bbInsertRequest.getPoliciesId(),
                bbInsertRequest.getDirectContact(),
                bbInsertRequest.getDescription(),
                bbInsertRequest.getLang()));
        return bbResponse;
    }

    @Override
    public BbResponse get(BbGetRequest bbGetRequest, BbResponse bbResponse) {
        bbResponse.setData(this.get(bbGetRequest.getId()));
        return bbResponse;
    }

    @Override
    public BbResponse setCover(String id, HttpServletRequest request, BbResponse bbResponse) {
        BedBreakfast response = get(id);
        if (request instanceof MultipartHttpServletRequest) {
            MultipartHttpServletRequest fileRequest = (MultipartHttpServletRequest) request;
            Map<String, MultipartFile> files = fileRequest.getFileMap();
            if (!files.isEmpty()) {
                for (Map.Entry<String, MultipartFile> fileEntry : files.entrySet()) {
                    MultipartFile file = fileEntry.getValue();
                    if (!file.isEmpty()) {
                        try {
                            String filename = String.valueOf(id)
                                    + "_" + response.getType()
                                    + "_" + Replace.replace(" ", "_", response.getName());
                            String picUrl = uploader.upload(file, filename, "cover");
                            response.setPhoto(picUrl);
                            bedBreakfastDao.update(response);
                        } catch (Exception ex) {
                            bbResponse.addError(Code.Bb.NO_FILE_SELECTED+" "+ex.getMessage());
                        }
                    } else {
                        bbResponse.addError("1-"+Code.Bb.NO_FILE_SELECTED);
                    }
                }
            } else {
                bbResponse.addError("2-"+Code.Bb.NO_FILE_SELECTED);
            }
        } else {
            bbResponse.addError("3-"+Code.Bb.FILE_UPLOAD_ERROR);
        }
        bbResponse.setData(response);
        return bbResponse;
    }

    @Override
    public List<BedBreakfast> fastBbSearch(String name, Date dateStart, Date dateEnd) {
        return bedBreakfastDao.fastBbSearch(name, dateStart, dateEnd);
    }

    @Override
    public List<BedBreakfast> searchByCity(Long cityid, Date start, Date end) {
        City c = new City();
        c.setId(cityid);
        City city = l10nService.findCity(c);
        return bedBreakfastDao.search(city, start, end);
    }

    @Override
    public List<BedBreakfast> searchByRegion(Long regionid, Date start, Date end) {
        Region r = new Region();
        r.setId(regionid);
        Region region = l10nService.findRegion(r);
        return bedBreakfastDao.search(region, start, end);
    }

    @Override
    public List<BedBreakfast> searchByLocation(String locationid, Date start, Date end, Float radius) {
        Location location = locationService.get(locationid);
        return bedBreakfastDao.search(location, start, end, radius);
    }

    @Override
    public List<BedBreakfast> searchAll(Integer limit, Integer offset) {
        return bedBreakfastDao.getAll(limit, offset);
    }

    @Override
    public List<BedBreakfast> searchByOwner(Long ownerId, Integer limit, Integer offset, String lang) {
        Owner owner = ownerService.findById(ownerId);
        return bedBreakfastDao.getByOwner(owner, limit, offset, lang);
    }

    @Override
    public BbListResponse getAll(BbGetAllRequest bbGetAllRequest, BbListResponse bbListResponse) {
        bbListResponse.setData(this.searchAll(bbGetAllRequest.getLimit(), bbGetAllRequest.getOffset()));
        return bbListResponse;
    }

    @Override
    public BbListResponse getByOwner(BbGetByOwnerRequest bbGetByOwnerRequest, BbListResponse bbListResponse) {
        bbListResponse.setData(this.searchByOwner(
                bbGetByOwnerRequest.getOwnerid(),
                bbGetByOwnerRequest.getLimit(),
                bbGetByOwnerRequest.getOffset(),
                bbGetByOwnerRequest.getLang()));
        return bbListResponse;
    }

    @Override
    public BbCountResponse countByOwner(BbCountByOwnerRequest bbGetByOwnerRequest, BbCountResponse bbResponse) {
        bbResponse.setData(this.countByOwner(bbGetByOwnerRequest.getOwnerid()));
        return bbResponse;
    }

    @Override
    public Long countByOwner(Long id) {
        Owner owner = ownerService.findById(id);
        return bedBreakfastDao.countByOwner(owner);
    }

    @Override
    public BbResponse update(BbUpdateRequest bbUpdateRequest, BbResponse bbResponse) {
        bbResponse.setData(this.update(
                bbUpdateRequest.getId(),
                bbUpdateRequest.getOwnerid(),
                bbUpdateRequest.getType(),
                bbUpdateRequest.getPropertytname(),
                bbUpdateRequest.getAssignedname(),
                bbUpdateRequest.getPhonenumber(),
                bbUpdateRequest.getPersonalemail(),
                bbUpdateRequest.getAddress(),
                bbUpdateRequest.getCityid(),
                bbUpdateRequest.getFacilitiesId(),
                bbUpdateRequest.getPoliciesId(),
                bbUpdateRequest.getDirectContact(),
                bbUpdateRequest.getDescription(),
                bbUpdateRequest.getLang()));
        return bbResponse;
    }

    @Override
    public BbResponse delete(BbDeleteRequest bbDeleteRequest, BbResponse bbResponse) {
        bbResponse.setData(delete(bbDeleteRequest.getId()));
        return bbResponse;
    }

    @Override
    public void persist(BedBreakfast bb) {
        bedBreakfastDao.persist(bb);
    }

    @Override
    public Long countAll() {
        return bedBreakfastDao.getCountAll();
    }
    
    @Override
    public BbCountResponse countCountAll(BbCountRequest bbCountRequest, BbCountResponse bbResponse) {
        bbResponse.setData(this.countAll());
        return bbResponse;
    }

    @Override
    public List<BedBreakfast> searchByCoords(Float latitude, Float longitude, Date start, Date end, Float radius) {
        return bedBreakfastDao.search(latitude, longitude, start, end, radius);
    }

    @Override
    public List<BedBreakfast> searchByIds(List<String> ids) {
        return bedBreakfastDao.search(ids);
    }
}
