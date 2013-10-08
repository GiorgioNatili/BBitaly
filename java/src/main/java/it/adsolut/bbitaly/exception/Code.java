/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package it.adsolut.bbitaly.exception;

/**
 *
 * @author marcello
 */
public class Code {
    static public class Auth {
        static public final String UNAUTHORIZED_REQUEST = "401";
    }
    static public class Sintax {
        static public final String REQUEST_NOT_VALID = "500";
    }
    static public class Location {
        static public final String NOT_REGION_EXIST = "501";
        static public final String NOT_CITY_EXIST = "502";
        static public final String NOT_LOACTION_EXIST = "503";
    }
    static public class Owner {
        static public final String ALREADY_EXIST = "401";
        static public final String NOT_FOUND = "402";
        static public final String NOT_DELETED = "403";
        static public final String NOT_ACTIVATED = "404";
    }
    static public class Bb {
        static public final String NOT_EXIST = "602";
        static public final String FILE_UPLOAD_ERROR = "603";
        static public final String REQUEST_ERROR = "604";
        static public final String NO_FILE_SELECTED = "605";
        public static final String NOT_DELETED = "606";
        public static final String NOT_ACTIVATED = "607";
        public static final String NO_TYPE_SPECIFIED = "608";
        public static final String NO_PROPERTY_NAME_SPECIFIED = "609";
        public static final String NO_ASSIGNED_SPECIFIED = "610";
        public static final String NO_PHONENUMBER_SPECIFIED = "611";
        public static final String NO_PERSONALEMAIL_SPECIFIED = "612";
        public static final String NO_DESCRIPTION_SPECIFIED = "613";
        public static final String NO_LANG_SPECIFIED = "614";
        public static final String EMAIL_NOT_VALID = "615";
        public static final String NOT_VALID_ADDRESS = "616";
        public static final String NOT_LIMIT = "617";
        public static final String NOT_OFFSET = "618";
        public static final String GALLERY_NOT_EXIST = "619";
    }
    public static class Room {
        public static final String NOT_VALID_MIN_AMOUNT = "700";
        public static final String NOT_VALID_MAX_AMOUNT = "701";
        public static final String NOT_VALID_CAP = "702";
        public static final String NO_SHORT_DESC_PROVIDED = "703";
        public static final String NO_DESC_PROVIDED = "704";
        public static final String NOT_EXIST = "706";
        public static final String NOT_VALID_AMOUNT = "707";
        public static class Price {
            public static final String MONTH_INVALID = "708";
            public static final String DAY_MAP_NOT_GIVEN = "709";
            public static final String OFFER_MAP_NOT_GIVEN = "710";
            public static final String DAY_NOT_VALID = "711";
        }
    }
    public static class User {
        public static final String NAME_NOT_VALID = "900";
        public static final String SURNAME_NOT_VALID = "901";
        public static final String EMAIL_NOT_VALID = "902";
        public static final String USER_EXIST = "903";
        public static final String USER_NOT_EXIST = "904";
    }
    public static class Translation {
        public static final String ISO_NOT_EXIST = "800";
    }
    public static class Search {
        public static final String QUERY_NOT_VALID = "900";
        public static final String DATE_NOT_VALID = "901";
    }
    public static class Photo {
        public static final String NOT_EXIST = "1000";
    }
    public static class Book {
        public static final String NO_SUITABLE_PRICE_FOR_THAT_PERIOD = "100";
        public static final String ROOM_IS_NOT_FREE = "101";
    }
}
