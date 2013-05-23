<?php

class Adsolut_View_Helper_SelectOptions extends Zend_View_Helper_Abstract {

    public function selectOptions($options) {
        $array = array();
        $string = '';
        foreach ($options as $item) {
            list($regionName, $city) = explode(" - ", $item->name);
            $array[$regionName][$item->id] = $city;
        }
        $keys = array_keys($array);
        sort($keys);
        foreach ($keys as $value) {
            $string .= '<optgroup label="'.$value.'">';
            foreach ($array[$value] as $j => $v) {
                $string .= '<option value="'.$j.'">'.$v.'</option>';
            }
            $string .= '</optgroup>';
        }
        return $string;
    }
}