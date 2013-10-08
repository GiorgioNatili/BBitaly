/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.util.string;

/**
 *
 * @author marcello
 */
public class Replace {
    
    public static String replace(String search, String replace, String subject) {
        StringBuilder result = new StringBuilder(subject);
        int pos = 0;
        while (true) {
            pos = result.indexOf(search, pos);
            if (pos != -1) {
                result.replace(pos, pos + search.length(), replace);
            } else {
                break;
            }
        }
        return result.toString();
    }
    
}
