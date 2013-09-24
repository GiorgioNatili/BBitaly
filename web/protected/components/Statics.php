<?php

class Statics {
    
    static function addActiveMenu($menu) {
        return $menu == Yii::app()->controller->id ? 'active' : '';
    }
    
    static function destination($url) {
        return '<input type="hidden" name="destination" value="'.$url.'" />';
    }
    
    static function getEstablishments() {
        $set = array(
            0   => 'Bed and breakfast',
            1   => 'House',
            2   => 'Holiday Home',
            3   => 'Residence',
            4   => 'Farms',
            5   => 'Hostels'
        );
        
        return (func_num_args() > 0 ? $set[func_get_arg(0)] : $set);
    }
}
?>
