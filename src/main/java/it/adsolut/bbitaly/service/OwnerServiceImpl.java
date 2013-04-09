/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.service;

import it.adsolut.bbitaly.Request.AuthOwnerRequest;
import it.adsolut.bbitaly.Request.OwnerDeleteRequest;
import it.adsolut.bbitaly.Request.OwnerGetRequest;
import it.adsolut.bbitaly.Request.OwnerInsertRequest;
import it.adsolut.bbitaly.Request.OwnerUpdateRequest;
import it.adsolut.bbitaly.dao.OwnerDao;
import it.adsolut.bbitaly.exception.Code;
import it.adsolut.bbitaly.model.City;
import it.adsolut.bbitaly.model.Owner;
import it.adsolut.bbitaly.response.OwnerResponse;
import it.adsolut.bbitaly.service.Interface.OwnerControllerService;
import it.adsolut.bbitaly.util.string.MessageDigest;

/**
 *
 * @author marcello
 */
public class OwnerServiceImpl extends TranslatableService implements OwnerService, OwnerControllerService {

    private OwnerDao ownerDao;
    private L10nService l10nservice;

    public void setL10nService(L10nService l10nservice) {
        this.l10nservice = l10nservice;
    }

    public void setOwnerDao(OwnerDao ownerDao) {
        this.ownerDao = ownerDao;
    }

    @Override
    public Owner findByEmail(String email) {
        return ownerDao.findByEmail(email);
    }

    private Owner update(Long ownerid, String bbname, String surname, String email, String address, Long admLev1, String password, String phonenumber) {
        Owner owner = ownerDao.findByiD(ownerid);
        return this.persist(owner, bbname, surname, email, address, admLev1, password, phonenumber);
    }

    @Override
    public Owner insert(String name, String surname, String email, String password, String address, Long regionid, String phonenumber) {
        Owner owner = new Owner();
        return this.persist(owner, name, surname, email, address, regionid, password, phonenumber);
    }

    @Override
    public Owner findById(Long id) {
        return ownerDao.findByiD(id);
    }

    @Override
    public Owner delete(Long id) {
        return ownerDao.delete(id);
    }

    @Override
    public Owner activate(Long id) {
        Owner owner = ownerDao.activate(id);
        return owner;
    }

    @Override
    public OwnerResponse insert(OwnerInsertRequest ownerInsertRequest, OwnerResponse ownerInsertResponse) {
        Owner owner = insert(ownerInsertRequest.getBbname(),
                ownerInsertRequest.getSurname(),
                ownerInsertRequest.getEmail(),
                MessageDigest.sha1(ownerInsertRequest.getPassword()),
                ownerInsertRequest.getAddress(),
                ownerInsertRequest.getAdmLev1(),
                ownerInsertRequest.getPhonenumber());
        ownerInsertResponse.setData(owner);
        return ownerInsertResponse;
    }

    @Override
    public OwnerResponse get(OwnerGetRequest ownerGetRequest, OwnerResponse ownerResponse) {
        ownerResponse.setData(this.findById(ownerGetRequest.getId()));
        return ownerResponse;
    }

    @Override
    public OwnerResponse login(AuthOwnerRequest authOwnerRequest, OwnerResponse ownerResponse) {
        System.out.println("-------------------------------------------------");
            System.out.println("owner: " + authOwnerRequest.getEmail());
            System.out.println("pass : " + authOwnerRequest.getPassword());
            System.out.println("-------------------------------------------------");
        Owner owner = this.findByEmail(authOwnerRequest.getEmail());
        if (owner != null
                && owner.getPassword().equals(MessageDigest.sha1(authOwnerRequest.getPassword()))) {
            ownerResponse.setData(owner);
            System.out.println("-------------------------------------------------");
            System.out.println("login success");
            System.out.println("-------------------------------------------------");
        } else{
            System.out.println("-------------------------------------------------");
            System.out.println("owner is null");
            System.out.println("-------------------------------------------------");
        }
        return ownerResponse;
    }

    @Override
    public OwnerResponse update(OwnerUpdateRequest ownerUpdateRequest, OwnerResponse ownerUpdateResponse) {
        Owner oldOwner = ownerDao.findByiD(ownerUpdateRequest.getOwnerid());
        Owner o = ownerDao.findByEmail(ownerUpdateRequest.getEmail());
        if (null != o) {
            if (o.getId() != ownerUpdateRequest.getOwnerid()) {
                ownerUpdateResponse.addError(Code.Owner.ALREADY_EXIST);
            }
        }
        if (ownerUpdateRequest.getPassword() == null
                || "".equals(ownerUpdateRequest.getPassword())) {
            ownerUpdateRequest.setPassword(oldOwner.getPassword());
        } else {
            ownerUpdateRequest.setPassword(
                    MessageDigest.sha1(ownerUpdateRequest.getPassword()));
        }
        if (ownerUpdateResponse.getErrors().isEmpty()) {
            ownerUpdateResponse.setData(
                    this.update(
                    ownerUpdateRequest.getOwnerid(),
                    ownerUpdateRequest.getBbname(),
                    ownerUpdateRequest.getSurname(),
                    ownerUpdateRequest.getEmail(),
                    ownerUpdateRequest.getAddress(),
                    ownerUpdateRequest.getAdmLev1(),
                    ownerUpdateRequest.getPassword(),
                    ownerUpdateRequest.getPhonenumber()));
        }
        return ownerUpdateResponse;
    }

    private Owner persist(Owner owner, String bbname, String surname, String email, String address, Long admLev1, String password, String phonenumber) {
        City c = new City();
        c.setId(admLev1);
        City city = l10nservice.findCity(c);
        owner.setPassword(password);
        owner.setAddress(address);
        owner.setEmail(email);
        owner.setName(bbname);
        owner.setSurname(surname);
        owner.setCity(city);
        owner.setRole("owner");
        owner.setPhonenumber(phonenumber);
        ownerDao.insert(owner);
        return owner;
    }

    @Override
    public OwnerResponse delete(OwnerDeleteRequest ownerDeleteRequest, OwnerResponse bbGalleryResponse) {
        bbGalleryResponse.setData(delete(ownerDeleteRequest.getId()));
        return bbGalleryResponse;
    }
}
