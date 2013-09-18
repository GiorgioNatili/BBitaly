<?php
/* @var $this AvailabilityController */
/* @var $model RoomAvailability */

$this->breadcrumbs=array(
	'Room Availabilities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomAvailability', 'url'=>array('index')),
	array('label'=>'Manage RoomAvailability', 'url'=>array('admin')),
);
?>

<h1>Create RoomAvailability</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>