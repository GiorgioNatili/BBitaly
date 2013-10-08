<?php

/**
 * Description of Uploader
 *
 * @author marcello
 */
class Adsolut_View_Helper_Maps extends Zend_View_Helper_Abstract {

    private $items;
    private $zoom;
    private $center;

    public function maps($items, $zoom = 2, $center = array(20, 10)) {
        $this->items = $items;
        $this->zoom = $zoom;
        $this->center = $center;
        $this->initHeadScript();
        $this->initExecScript();
        return '<div id="map_canvas" style="width:100%;height:360px"></div>';
    }

    public function initHeadScript() {
        $this->view->headScript()->appendFile('http://maps.googleapis.com/maps/api/js?key=AIzaSyA0yXEOoSBBAhb1ADURFxY3-MAXmHOVKzM&sensor=true');
    }

    public function initExecScript() {
        if (!empty($this->items)) {
            $obj = '';
            foreach ($this->items as $item) {
                $obj .= "{lat:{$item->latitude},lng:{$item->longitude},name:'{$item->name}',type:'{$item->type}'}\n";
            }
            $this->view->placeholder('execScript')->captureStart();
            echo '$(function() {
$("#map_canvas").hole({
        markers:[
            '.$obj.'
        ],
        onBeforeSlide:function(current_index,current_element,target_index,target_element){
            $("#pager .current").html(target_index);
            return true;
        },
        init:function(current_index,current_element,current_count){
            $("#pager .count").html(current_count);
            $(".arrow.left").bind( "click" , function(){$("#map").hole(\'goToPrevious\')});
            $(".arrow.right").bind( "click" , function(){$("#map").hole(\'goToNext\')});
        }
    })
});';
            $this->view->placeholder('execScript')->captureEnd();
        }
    }

}