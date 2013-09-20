<?php
/* @var $this AvailabilityController */
/* @var $model RoomAvailability */

$this->breadcrumbs=array(
	'Room Availabilities'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RoomAvailability', 'url'=>array('index')),
	array('label'=>'Create RoomAvailability', 'url'=>array('create')),
	array('label'=>'Update RoomAvailability', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RoomAvailability', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoomAvailability', 'url'=>array('admin')),
);
?>

<h1>View RoomAvailability #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'room_id',
		'booking_id',
		'is_booked',
		'day',
		'month',
		'year',
		'on_offer',
		'price',
		'created_on',
	),
)); ?>
