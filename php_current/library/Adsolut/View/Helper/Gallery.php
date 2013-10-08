<?php

/**
 * Description of Uploader
 *
 * @author marcello
 */
class Adsolut_View_Helper_Gallery extends Zend_View_Helper_Abstract {

    private $id = 'gallery';

    public function gallery($photos) {
        $this->initHeadScript();
        $this->initExecScript();
        usort($photos, array($this, 'compare'));
        return $this->view->partial("/block/gallery-front.phtml", array('photos' => $photos, 'id' => $this->id));
    }

    private function compare($a, $b) {
        if ($a->displayOrder == $b->displayOrder) {
            return 0;
        }
        return $a->displayOrder < $b->displayOrder ? -1 : 1;
    }

    public function initHeadScript() {
//        $this->view->headScript()->appendFile('/js/jquery.pikachoose.full.js');
    }

    public function initExecScript() {
        $this->view->placeholder('execScript')->captureStart();
        echo "$(document).ready(
        function (){ 
            $(\"#{$this->id}\")
            .after('<div id=\"nav\">')
            .cycle({ 
                fx:     'fade', 
                speed:  'fast', 
                timeout: 0, 
                pager:  '#nav',
            pagerAnchorBuilder: function(idx, slide) {
                var margin = 'margin-right:10px;';
                if ((idx + 1) % 5 == 0) {
                    margin = 'margin-right:0px;'
                }
                var src = $(slide).attr('ref');
                return '<li class=\"float-left\" style=\"margin-top:10px;'+margin+'\"><a href=\"#\"><img src=\"' + src + '\" width=\"94\" height=\"94\" /></a></li>'; 
                }
            });
        });";
        $this->view->placeholder('execScript')->captureEnd();
    }

}