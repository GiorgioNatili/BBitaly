<?php

/**
 * Description of Uploader
 *
 * @author marcello
 */
class Adsolut_View_Helper_Uploader extends Zend_View_Helper_Abstract{
    
    private $id = 'file';
    private $callback = 'void(0)';
    private $maxfile;
    private $destination;
    
    public function uploader($id, $callback = null, $maxfile=3, $destination="bb-gallery") {
        $this->id = $id;
        $this->maxfile = $maxfile;
        $this->destination = $destination;
        if (null !== $callback) {
            $this->callback = $callback.'(evt, data)';
        }
        $this->initHeadScript();
        $this->initExecScript();
        return $this->view->partial("/block/uploader.phtml", array('id' => $this->id));
    }
    
    public function initHeadScript() {
        $this->view->headScript()->appendFile('/js/jquery.uploadify.js');
        $this->view->headScript()->appendFile('/js/swfobject.js');
    }
    
    public function initExecScript() {
        $this->view->placeholder('execScript')->captureStart();
        echo "$(document).ready(function() {
  $('#".$this->id."').uploadify({
    'swf'            : '/js/uploadify.swf',
    'uploader'       : '".$this->view->url(array('controller'=>'system','action'=>'upload','t' => $this->destination))."',
    'checkExisting'  : '".$this->view->url(array('controller'=>'system','action'=>'checkfileexist'))."',
    'cancelImage'    : '/images/closelabel.png',
    'folder'         : '/upload',
    'multi'          : true,
    'queueSizeLimit' : ".$this->maxfile.",
    'auto'           : true,
    'onUploadComplete' : function(evt, data) {
        return {$this->callback};
    }
  });
});";
        $this->view->placeholder('execScript')->captureEnd();
    }
}