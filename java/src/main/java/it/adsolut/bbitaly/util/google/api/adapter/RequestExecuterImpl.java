/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.util.google.api.adapter;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.MalformedURLException;
import java.net.URL;

/**
 *
 * @author marcello
 */
public class RequestExecuterImpl implements RequestExecuter {

    @Override
    public String execute(String request) throws Exception,MalformedURLException {
//        u = new URL("https://maps.googleapis.com/maps/api/place/search/json?location=41.89051980,12.49424860&radius=20000&types=parkairport|establishment&sensor=true&key=AIzaSyChKmkEO_cPNrA9QUSLV6RC_4XpvP5B0pY");
        URL u = new URL(request);
        InputStream is = (InputStream) u.getContent();
        BufferedReader reader = new BufferedReader(new InputStreamReader(is));
        StringBuilder sb = new StringBuilder();
        String line = null;
        while ((line = reader.readLine()) != null) {
            sb.append(line + "\n");
        }
        is.close();
        System.out.println(request);
        System.out.println(sb.toString());
        return sb.toString();
    }
}
