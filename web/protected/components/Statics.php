<?php

class Statics {
    
    static function addActiveMenu($menu) {
        return $menu == Yii::app()->controller->id ? 'active' : '';
    }
}
?>
