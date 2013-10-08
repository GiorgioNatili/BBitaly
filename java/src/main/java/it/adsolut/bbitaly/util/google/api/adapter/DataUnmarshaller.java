/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.util.google.api.adapter;

/**
 *
 * @author marcello
 */
public interface DataUnmarshaller<T> {
    public T unmarshal(String json);
}
