/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.util.image;

import java.awt.image.BufferedImage;
import org.im4java.core.ConvertCmd;
import org.im4java.core.IMOperation;
import org.im4java.core.Stream2BufferedImage;

/**
 *
 * @author marcello
 */
public class PhotoEditorImpl implements PhotoEditor{

    @Override
    public BufferedImage resize(BufferedImage input, Integer dimx, Integer dimy) throws PhotoEditException {
        if (input.getHeight() < dimy && input.getWidth() < dimx) {
            dimx = input.getWidth();
            dimy = input.getHeight();
        }
        ConvertCmd cmd = new ConvertCmd();
        Stream2BufferedImage s2b = new Stream2BufferedImage();
        cmd.setOutputConsumer(s2b);
        IMOperation imo = new IMOperation();
        imo.addImage();
        imo.resize(dimx, dimy);

        imo.addImage("jpg:-");

        try {
            cmd.run(imo, input);
        } catch (Exception e) {
            throw new PhotoEditException(e.getMessage());
        }
        return s2b.getImage();

    }

    @Override
    public BufferedImage crop(BufferedImage input, Integer dimx, Integer dimy) throws PhotoEditException {
        ConvertCmd cmd = new ConvertCmd();
        Stream2BufferedImage s2b = new Stream2BufferedImage();
        cmd.setOutputConsumer(s2b);
        IMOperation imo = new IMOperation();
        imo.addImage();
        imo.extent(dimx, dimy).gravity("center");

        imo.addImage("jpg:-");

        try {
            cmd.run(imo, input);
        } catch (Exception e) {
            throw new PhotoEditException(e.getMessage());
        }
        return s2b.getImage();
    }

    @Override
    public BufferedImage square(BufferedImage input) throws PhotoEditException {
        Integer squareDim = input.getHeight();
        if (input.getWidth() < input.getHeight()) {
            squareDim = input.getWidth();
        }
        ConvertCmd cmd = new ConvertCmd();
        Stream2BufferedImage s2b = new Stream2BufferedImage();
        cmd.setOutputConsumer(s2b);
        IMOperation imo = new IMOperation();
        imo.addImage();
        imo.extent(squareDim, squareDim).gravity("center");
        imo.addImage("jpg:-");
        try {
            cmd.run(imo, input);
        } catch (Exception e) {
            throw new PhotoEditException(e.getMessage());
        }
        return s2b.getImage();
    }

    @Override
    public BufferedImage squareAndResize(BufferedImage input, Integer dim) throws PhotoEditException {
        Integer squareDim = input.getHeight();
        if (input.getWidth() < input.getHeight()) {
            squareDim = input.getWidth();
        }
        ConvertCmd cmd = new ConvertCmd();
        Stream2BufferedImage s2b = new Stream2BufferedImage();
        cmd.setOutputConsumer(s2b);
        IMOperation imo = new IMOperation();
        imo.addImage();
        imo.extent(squareDim, squareDim).gravity("center");
        if (dim < squareDim) {
            imo.resize(dim, dim);
        }
        imo.addImage("jpg:-");

        try {
            cmd.run(imo, input);
        } catch (Exception e) {
            throw new PhotoEditException(e.getMessage());
        }
        return s2b.getImage();
    }
}
