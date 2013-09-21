<?php
/* @var $this BookingController */
/* @var $model RoomBookings */

$this->breadcrumbs=array(
	'Room Bookings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomBookings', 'url'=>array('index')),
	array('label'=>'Create RoomBookings', 'url'=>array('create')),
	array('label'=>'View RoomBookings', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RoomBookings', 'url'=>array('admin')),
);
?>

<h1>Update RoomBookings <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>