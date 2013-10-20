<?php
/* @var $this PropertyController */
/* @var $model Property */

$this->breadcrumbs=array(
	$model->title   => '/',
);
echo $this->renderPartial('detail/_main', array(
    'data' => $model,
    'rooms' => $rooms,
    'roomPages' => $roomPages
));
?>

