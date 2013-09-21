<?php
/* @var $this BookingController */
/* @var $model RoomBookings */

$this->breadcrumbs=array(
	'Room Bookings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RoomBookings', 'url'=>array('index')),
	array('label'=>'Create RoomBookings', 'url'=>array('create')),
	array('label'=>'Update RoomBookings', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RoomBookings', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoomBookings', 'url'=>array('admin')),
);
?>

<h1>View RoomBookings #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'room_id',
		'user_id',
		'booked_on',
		'host_ip',
	),
)); ?>
