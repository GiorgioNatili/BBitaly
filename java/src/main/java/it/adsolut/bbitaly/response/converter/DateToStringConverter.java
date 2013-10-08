/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.response.converter;

import java.util.Date;
import org.dozer.DozerConverter;
import org.joda.time.DateTime;
import org.joda.time.format.DateTimeFormat;
import org.joda.time.format.DateTimeFormatter;

/**
 *
 * @author marcello
 */
public class DateToStringConverter extends DozerConverter<Date, String> {

    public DateToStringConverter() {
        super(Date.class, String.class);
    }

    @Override
    public String convertTo(Date a, String b) {
        DateTimeFormatter format = DateTimeFormat.forPattern("y/M/d");
        if (a == null) {
            return new DateTime(new Date()).toString(format);
        }
        DateTime dateTime = new DateTime(a);
        return dateTime.toString(format);
    }

    @Override
    public Date convertFrom(String b, Date a) {
        return new Date();
    }
}
