<?php
/* @var $this ItineraryController */
/* @var $model Itinerary */

$this->breadcrumbs=array(
	'Itineraries'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Itinerary', 'url'=>array('index')),
	array('label'=>'Create Itinerary', 'url'=>array('create')),
	array('label'=>'Update Itinerary', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Itinerary', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Itinerary', 'url'=>array('admin')),
);
?>

<h1>View Itinerary #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'cover_image',
		'date_from',
		'date_to',
		'uid',
		'created_on',
		'updated_on',
		'host_ip',
	),
)); ?>
