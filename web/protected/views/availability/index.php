<?php
/* @var $this AvailabilityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Room Availabilities',
);

$this->menu=array(
	array('label'=>'Create RoomAvailability', 'url'=>array('create')),
	array('label'=>'Manage RoomAvailability', 'url'=>array('admin')),
);
?>

<h1>Room Availabilities</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
