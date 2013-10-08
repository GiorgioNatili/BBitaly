<?php

/**
 * Description of Title
 *
 * @author marcello
 */
class Adsolut_View_Helper_Seo extends Zend_View_Helper_Abstract {
    const HOME = 'home';
    const DETAIL = 'detail';
    const SEARCH = 'search';

    public function Seo($patternName, $params1= null) {
        switch ($patternName) {
            case self::HOME:
                $patternTitle = Models_Configuration::get('title-pattern-home');
                $title = $this->_createString($patternTitle);
                $patternKeyword = Models_Configuration::get('keyword-pattern-home');
                $keyword = $this->_createString($patternKeyword);
                $patternDescription = Models_Configuration::get('description-home');
                $description = $this->_createString($patternDescription);
                $this->view->headTitle($title);
                $this->view->headMeta()->setName('keywords', $keyword)
                        ->appendName('description', $description);
                break;
            case self::DETAIL:
                $patternTitle = Models_Configuration::get('title-pattern-detail');
                $title = $this->_createString($patternTitle, $params1);
                $patternKeyword = Models_Configuration::get('keyword-pattern-detail');
                $keyword = $this->_createString($patternKeyword, $params1);
                $patternDescription = Models_Configuration::get('description-detail', '{description}');
                $description = $this->_createString($patternDescription, $params1);
                $this->view->headTitle($title);
                $this->view->headMeta()->setName('keywords', $keyword)
                        ->appendName('description', $description);
                break;
            case self::SEARCH:
                $patternTitle = Models_Configuration::get('title-pattern-profiledsearch');
                $title = $this->_createString($patternTitle,$params1);
                $this->view->headTitle($title);
                break;
        }
    }

    private function _createString($pattern, $params1 = null) {
//        if ($params1 == null) {
//            return $pattern;
//        }
        if (is_string($params1)) {
            return str_replace('{keyword}',$params1,$pattern);
        }
        $placeHName = $params1->name;
        $placeHDistrict = $params1->city->region->name . " " . $params1->city->region->country->name;
        $placeHCity = $params1->city->name;
        $placeHType = $params1->type;
        $placeHDescription = $params1->description;
        $placeHSitename = $_SERVER['HTTP_HOST'];
        $title = str_replace(array(
            '{name}',
            '{district}',
            '{city}',
            '{type}',
            '{description}',
            '{sitename}'
                ), array(
            $placeHName,
            $placeHDistrict,
            $placeHCity,
            $placeHType,
            $placeHDescription,
            $placeHSitename
                ), $pattern);
        return $title;
    }

}