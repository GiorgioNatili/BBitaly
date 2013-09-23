<?php

class Statics {
    
    static function addActiveMenu($menu) {
        return $menu == Yii::app()->controller->id ? 'active' : '';
    }
    
    static function destination($url) {
        return '<input type="hidden" name="destination" value="'.$url.'" />';
    }
    
    static function getEstablishments() {
        return array(
            0   => 'Bed and breakfast',
            1   => 'House',
            2   => 'Holiday Home',
            3   => 'Residence',
            4   => 'Farms',
            5   => 'Hostels'
        );
    }
}
?>
