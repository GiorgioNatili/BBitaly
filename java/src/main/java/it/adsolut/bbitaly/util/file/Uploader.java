/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.util.file;

import java.io.IOException;
import org.springframework.web.multipart.MultipartFile;

/**
 *
 * @author marcello
 */
public interface Uploader {
    public String upload(MultipartFile orig, String destName, String type) throws IOException;
}
