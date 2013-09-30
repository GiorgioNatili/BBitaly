<?php
/* @var $this PropertyController */
/* @var $model Property */

//echo "<pre>"; print_r($room); exit;

$this->renderPartial('_form', array(
    'model'=>$model,
    'policies' => $policies,
    'property_description' => $property_description,
    'room_desc' => $room_desc,
    'billing'   => $billing,
    'room'  => $room,
    'cRoom' => $cRoom
)); ?>