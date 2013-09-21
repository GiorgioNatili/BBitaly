<?php
/* @var $this BookingController */
/* @var $model RoomBookings */

$this->breadcrumbs=array(
	'Room Bookings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomBookings', 'url'=>array('index')),
	array('label'=>'Manage RoomBookings', 'url'=>array('admin')),
);
?>

<h1>Create RoomBookings</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>