<?php

/**
 * Description of Image
 *
 * @author marcello
 */
class ImageController extends Adsolut_Controller_Action {
    
    public function adaptiveAction() {
//        http://stanging.bedandbreakfastinitaly.com/it/image/adaptive/id/fce8e5f2ab9142db95b7bb23082722a7/dims/300x188/type/bb/src/cover%7Cfce8e5f2ab9142db95b7bb23082722a7%7Cbedandbreakfast_B&B_Casa_Mira_Napoli.jpg
//        http://cdn.bedandbreakfastinitaly.com/static/cover/bb/fce8e5f2ab9142db95b7bb23082722a7_bedandbreakfast_B&B_Casa_Mira_Napoli.jpg
        $this->view->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $type = $this->getRequest()->getParam("type", 'bb');
        $dims = $this->getRequest()->getParam("dims");
        list($width, $height) = explode("x",  strtolower($dims));
        $imageUri = $this->_parseSrc($this->getRequest()->getParam('src'), $type);
        $imageUri = 'http://cdn.bella-idea.com:8090/static/cover/bb/dcbbbed4e79708d26fc27e4cdfed74b8_Appartamento_Adsolut_Flat.jpeg';
        $thumb = PhpThumbFactory::create($imageUri);
//        $thumb = PhpThumbFactory::create(file_get_contents($imageUri),true);
        $thumb->adaptiveResize($width, $height);
        $thumb->show();
    }
    
    public function _parseSrc($src, $folder) {
        if ($src != "||") {
            list($type, $pid, $name) = explode('|',$src);
//            return "/var/www/cdn.bella-idea.it/static/{$type}/{$folder}/{$pid}_{$name}";    
            $name = urlencode($name);
            return "http://cdn.bedandbreakfastinitaly.com/static/{$type}/{$folder}/{$pid}_{$name}";            
//            return "C:\\Users\\marcello\\Documents\\NetBeansProjects\\bbitaly-new\\bbitaly-new\\target\\bbitaly-new-1.0a\\WEB-INF\\jsp\\static\\{$type}\\{$folder}\\{$pid}_{$name}";            
        }
        return APPLICATION_PATH . "/../public/images/default-nopic.jpg";
    }
}