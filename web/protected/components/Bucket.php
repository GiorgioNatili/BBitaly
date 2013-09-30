<?php

class Bucket {
    
    private $_fileName = null;
    
    private $_dirName = null;
    
    private $_absPath = null;
    
    private $_checkSum = null;
    
    public function __construct($file) {
        if ( $file instanceof CUploadedFile) {
            $md5_file = md5_file($file->tempName);
            $ext = image_type_to_extension(exif_imagetype($file->tempName));
            $this->_checkSum = $md5_file;
            $this->_fileName = $md5_file.$ext;
            $this->_dirName = $this->_findDir($md5_file);
            $this->_absPath = DOC_ROOT.DS.'bucket'.DS.$this->getDirName().DS. $this->getFileName();
        }
    }
    
    public static function load($filename) {
        return '/bucket'.DS.self::_findDir($filename, true).DS. $filename;
    }


    private static function _findDir($checksum, $fromName = false) {
        if ( $fromName === true)
            return substr(substr ($checksum, 0,  strpos ($checksum, '.')), -2);
        return substr($checksum, -2);
    }
    
    public function getChecksum() {
        return $this->_checkSum;
    }
    
    public function getFileName() {
        return $this->_fileName;
    }
    
    public function getDirName() {
        return $this->_dirName;
    }
    
    public function getMovePath() {
        return $this->_absPath;
    }
}