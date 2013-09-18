<?php

/**
 * Description of AddBookmark
 *
 * @author marcello
 */
class Adsolut_View_Helper_AddBookmark extends Zend_View_Helper_Abstract{
    
    public function addBookmark(){
        
        $this->initHeadScript();
        $this->initExecScript();
        return $this->view->partial('block/bookmarkbar.phtml', array(
            'items' => $items
        ));
    }
    
    public function initHeadScript() {
        
    }
    
    public function initExecScript() {
        
    }
}