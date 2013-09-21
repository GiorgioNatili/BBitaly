<?php

class Statics {
    
    static function addActiveMenu($menu) {
        return $menu == Yii::app()->controller->id ? 'active' : '';
    }
    
    static function destination($url) {
        return '<input type="hidden" name="destination" value="'.$url.'" />';
    }
}
?>
