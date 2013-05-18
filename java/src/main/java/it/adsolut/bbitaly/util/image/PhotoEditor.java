/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.util.image;

import java.awt.image.BufferedImage;

/**
 *
 * @author marcello
 */
public interface PhotoEditor {

    public BufferedImage resize(BufferedImage input, Integer dimx, Integer dimy) throws PhotoEditException;

    public BufferedImage crop(BufferedImage input, Integer dimx, Integer dimy) throws PhotoEditException;

    public BufferedImage square(BufferedImage input) throws PhotoEditException;

    public BufferedImage squareAndResize(BufferedImage input, Integer dim) throws PhotoEditException;
}
