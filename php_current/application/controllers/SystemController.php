<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SystemController
 *
 * @author marcello
 */
class SystemController extends Adsolut_Controller_Action {

    public $contexts = array(
        'city' => array('json'),
        'region' => array('json'),
        'updaterelated' => array('json'),
        'checkavailability' => array('json'),
        'adduser' => array('json'),
        'authuser' => array('json'),
        'logout' => array('json'),
    );

    public function init() {
        $this->getResponse()->setHeader("Access-Control-Allow-Origin", "*");
        $this->_helper->contextSwitch()->initContext();
    }

    public function regionAction() {
        $this->view->cities = $this->getResource("core")->get('region-get', array('countryid' => $this->getRequest()->getParam('regionid')))->getData();
    }

    public function cityAction() {
        $this->view->cities = $this->getResource("core")->get('city-get', array('regionid' => $this->getRequest()->getParam('regionid')))->getData();
    }

    public function checkavailabilityAction() {
        $dataStart = new Zend_Date($this->getRequest()->getParam('checkin'), 'dd/MM/y');
        $dataEnd = new Zend_Date($this->getRequest()->getParam('checkout'), 'dd/MM/y');
        $data = $this->getResource("core")->get('book-check', array(
            'id' => $this->getRequest()->getParam('rid'),
            'start' => $dataStart->toString("y-MM-dd"),
            'end' => $dataEnd->toString("y-MM-dd")
                ));
//        d($this->getRequest()->getParams());
        if ($data->hasErrors()) {
            d($data);
            $this->view->js = '
                <div class="float-left" style="padding: 20px;">
                    <h3>' . l('Ci spiace la struttura ') . '<br />' . l('non è disponibile') . '</h3>
                    <a class="button" href="#" onclick="$.facebox.close();return false;">Chiudi</a>
                </div>
                <div class="clear"></div>';
            return;
        }
        $data = $data->getData();
//        die(var_dump($data));
        if ($data->available) {
            $this->view->js = '
            <div style="margin:10px;">
                <div class="float-left" style="margin-right:30px;width:200px;">
                    <h3>' . l('Congratulazioni la struttura è libera') . '</h3>
                    <p>
                    <form action="'.$this->view->url(
                            array(
                        'subdomain' => APPLICATION_SUBDOMAIN,
                        'controller' => 'book',
                        'action' => 'index',
                        'id' => $this->getRequest()->getParam('id')), null, true).'" method="post">
                            <input type="hidden" name="persons" value="'.$this->getRequest()->getParam('persons').'" />
                            <input type="hidden" name="start" value="'.$this->getRequest()->getParam('checkin').'" />
                            <input type="hidden" name="end" value="'.$this->getRequest()->getParam('checkout').'" />
                            <input type="hidden" name="rid" value="'.$this->getRequest()->getParam('rid').'" />
                    <input type="submit" class="button" style="width:200px;" value="'.l('Prenota').'" />
                                    </form>
                    </p>
                </div>
                <div class="clear"></div></div>';
        } else {
            $this->view->js = '
                <div class="float-left" style="width:200px;height:200px;margin-right:20px;background:black">
                </div>
                <div class="float-left">
                    <h3>' . l('Ci spiace la struttura non è disponibile') . '</h3>
                    <p>lorem ipsum dolor sit amet</p>
                </div>
                <div class="clear"></div>';
        }
    }

    public function checkfileexistAction() {
        $this->view->layout()->disableLayout();
        $this->_helper->getHelper("ViewRenderer")->setNoRender();
        $filename = $this->getRequest()->getParam('filename', null);
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $filename)) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function uploadAction() {
        $this->view->layout()->disableLayout();
        $this->_helper->getHelper("ViewRenderer")->setNoRender();
        if (!empty($_FILES)) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . "/upload";
            $targetFile = rtrim($targetPath, '/') . '/' . $_FILES['Filedata']['name'];

            $fileTypes = array('jpg', 'jpeg', 'gif', 'png');
            $fileParts = pathinfo($_FILES['Filedata']['name']);

            if (in_array($fileParts['extension'], $fileTypes)) {
                $params = $this->getRequest()->getParams();
                $id = $params['id'];
                if (isset($params['rid'])) {
                    $id = $params['rid'];
                }
                $params = $this->getRequest()->getParam('id');
                move_uploaded_file($tempFile, $targetFile);
                $this->getResource('core')->putFile($this->getRequest()->getParam('t', 'bb-gallery'), array(
                    'file' => $targetFile,
                    'id' => $id
                ));
//                unlink($targetFile);
                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }

    public function updaterelatedAction() {
        $latitude = $this->getRequest()->getParam('latitude');
        $longitude = $this->getRequest()->getParam('longitude');
        $radius = $this->getRequest()->getParam('radius');
        $relatedWidget = $this->view->related($latitude, $longitude, $radius);
        $this->view->html = str_replace(array("\r", "\n"), "", $relatedWidget->getHtml());
        $this->view->js = $relatedWidget->getRelated();
    }

    public function adduserAction() {
        if ($this->getRequest()->getParam('password') != $this->getRequest()->getParam('c_password')) {
            $this->view->isError = true;
            $this->view->errors = array('10');
            return;
        }
        $data = $this->getResource("core")->post('user', array(
            'name' => $this->getRequest()->getParam('name'),
            'surname' => $this->getRequest()->getParam('surname'),
            'email' => $this->getRequest()->getParam('email'),
            'password' => $this->getRequest()->getParam('password')
                ));
//        $data = $this->getResource("core")->get('user', 
//                array(
//                    'id' => 65536,
//                    'surname' => $this->getRequest()->getParam('surname'),
//                    'email' => $this->getRequest()->getParam('email'),
//                    'password' => $this->getRequest()->getParam('password')
//                ));
        if ($data->hasErrors()) {
//            $this->view->isError = true;
            $this->view->errors = $data->getErrors();
            return;
        }

//        $mail = new Zend_Mail("utf-8");
//        $mail->addTo($this->getRequest()->getParam('email'), $this->getRequest()->getParam('name')." ".$this->getRequest()->getParam('surname'))
//             ->setFrom('info@bella-idea.it', 'Staff bella idea')
//             ->setSubject(l('Registrazione eseguita con successo'))
//             ->setBodyHtml($html)
//             ->send();
//        $this->_forward('authuser',null,null,array(
//            'email' => $data->email,
//            'password' => $this->getRequest()->getParam('password'),
//        ));

        /**
         * @todo sendmail : "uid={$data->getData()->id}&url=/it/book/index/start/2012-06-05/end/2012-06-28/id/05aed2229251345bedfa7680c5"
         */
        $this->view->eval = 0;
        $this->view->js = '<div class="grey" style="margin-right:20px;"><h3>' . l('ancora un ultimo passaggio...') . '</h3><div class="float-left" style="width:500px;">' . l('Controlla la tua e-mail! Troverai un messaggio di benvenuto nella casella di posta da te indicata nel modulo di registrazione. Nel caso in cui non dovessi ricevere il nostro messaggio entro 24 ore, controlla anche la posta indesiderata. In caso di ulteriori ritardi, contatta il nostro staff all\'indirizzo:') . '<br/><br/><a href="mailto:info@bella-idea.com">info@bedandbreakfastinitaly.com</a></div><div class="clear"></div></div>';
    }

    public function authuserAction() {
        $authAdapter = new Adsolut_Auth_Adapter(
                        $this->getRequest()->getParam('email'),
                        $this->getRequest()->getParam('password'),
                        'auth-user');
        $zendAuth = Zend_Auth::getInstance();
        $result = $zendAuth->authenticate($authAdapter);
        if (!$result->isValid()) {
            $this->view->isError = true;
            $this->view->errors = array('11');
            return;
        }
        $this->view->eval = 1;
        $this->view->js = 'document.location.href="' . $this->getRequest()->getParam('redirecturl', $this->view->url(array('controller' => 'index', 'action' => 'index'))) . '";';
    }

    public function logoutAction() {
        $zendAuth = Zend_Auth::getInstance()->clearIdentity();
        $this->view->response = 'document.location.href="' . $this->view->url(array('language' => $this->view->language, 'controller' => 'index', 'action' => 'index', 'subdomain' => 'www'), null, true) . '"';
    }

}