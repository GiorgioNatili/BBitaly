<?php
/* @var $this PropertyController */
/* @var $model Property */

$this->renderPartial('_form', array(
    'model'=>$model,
    'policies' => $policies,
    'property_description' => $property_description,
    'room_desc' => $room_description,
    'billing'   => $billing,
    'room'  => $room
)); ?>