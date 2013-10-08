/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.util.file;

import java.io.File;
import java.io.IOException;
import java.util.Map;
import org.springframework.web.multipart.MultipartFile;

/**
 *
 * @author marcello
 */
public class UploaderImpl implements Uploader {

    private String path;
    private String publicPath;
    private char extSeparator;
    private Map<String, Map<String, String>> folder;

    public void setPath(String path) {
        this.path = path;
    }

    public void setPublicPath(String publicPath) {
        this.publicPath = publicPath;
    }

    public void setTypes(Map types) {
        this.folder = types;
    }

    public void setExtSeparator(char extSeparator) {
        this.extSeparator = extSeparator;
    }

    @Override
    public String upload(MultipartFile orig, String destName, String type) throws IOException {
        Filename filename = new Filename(orig.getOriginalFilename());
        String finalpath = path + folder.get(type).get("internal") + destName + extSeparator + filename.extension();
        System.out.println("--------------------------------");
        System.out.println("destination: " + finalpath);
        System.out.println("--------------------------------");
        File destination = new File(finalpath);
        orig.transferTo(destination);
        return publicPath + folder.get(type).get("external") + destName + extSeparator + filename.extension();
    }
}
