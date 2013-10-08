/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.util.string;

/**
 *
 * @author marcello
 */
public class MessageDigest {

    public static String md5(String string) {
        try {
            java.security.MessageDigest md = java.security.MessageDigest.getInstance("MD5");
            byte[] array = md.digest(string.getBytes());
            StringBuilder sb = new StringBuilder();
            for (int i = 0; i < array.length; ++i) {
                sb.append(Integer.toHexString((array[i] & 0xFF) | 0x100).substring(1, 3));
            }
            return sb.toString();
        } catch (java.security.NoSuchAlgorithmException e) {
        }
        return null;
    }

    public static String sha1(String input) {
        try {
            java.security.MessageDigest md = java.security.MessageDigest.getInstance("SHA1");
            md.update(input.getBytes());
            byte[] output = md.digest();
            char hexDigit[] = {'0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F'};
            StringBuilder buf = new StringBuilder();
            for (int j = 0; j < output.length; j++) {
                buf.append(hexDigit[(output[j] >> 4) & 0x0f]);
                buf.append(hexDigit[output[j] & 0x0f]);
            }
            return buf.toString();
        } catch (java.security.NoSuchAlgorithmException e) {
        }
        return null;
    }
}