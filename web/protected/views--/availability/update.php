<?php
/* @var $this AvailabilityController */
/* @var $model RoomAvailability */

$this->breadcrumbs=array(
	'Room Availabilities'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomAvailability', 'url'=>array('index')),
	array('label'=>'Create RoomAvailability', 'url'=>array('create')),
	array('label'=>'View RoomAvailability', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RoomAvailability', 'url'=>array('admin')),
);
?>

<h1>Update RoomAvailability <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>