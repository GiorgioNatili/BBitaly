<?php

/**
 * Description of TourSite
 *
 * @author marcello
 */
class Adsolut_View_Helper_TourSite extends Zend_View_Helper_Abstract {

    public function tourSite($page, array $config) {
        xdebug_disable();
        $request = Zend_Controller_Front::getInstance()->getRequest();
        $this->initHeadScript();
        $this->initExecScript($page, $config);
        return $this->view->partial("toursite/{$page}.phtml");
    }

    public function initHeadScript() {
        $this->view->headScript()->appendFile('/js/adsolut.toursite.js');
    }

    public function initExecScript($page, array $config) {
        $nodeListArr = array();
        foreach ($config as $nodeid) {
            $nodeListArr[] =  "\t\t{nodeid:'{$nodeid}', tipid:'{$nodeid}-tip'}\n";
        }
        $nodeListStr = implode(',',$nodeListArr);
        $nodeList = "[\n{$nodeListStr}\t]";
        $this->view->placeholder('execScript')->captureStart();
        echo "
            var options = {
        page: '{$page}',
        start : 0,
        nodelist : {$nodeList},
        hole: {
            frame_style : {
                background:'black',
                opacity:'.5'
            },
            hole_style : {
                background:'transparent'
            }
        },
        tooltip: {
            dimx:150,
            dimy:200,
            bgcolor:'transparent',
            margin:10
        }
    };
    $(function(){
        wizard.create().show(options);
    })
";
        $this->view->placeholder('execScript')->captureEnd();
    }

}