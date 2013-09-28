<?php
/* @var $this PropertyController */
/* @var $model Property */

//echo "<pre>"; print_r($billing); exit;

$this->renderPartial('_form', array(
    'model'=>$model,
    'policies' => $policies,
    'property_description' => $property_description,
    'room_desc' => $room_description,
    'billing'   => $billing,
    'room'  => $room
)); ?>