<?php
/* @var $this ItineraryController */
/* @var $model Itinerary */

$this->breadcrumbs=array(
	'Itineraries'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Itinerary', 'url'=>array('index')),
	array('label'=>'Create Itinerary', 'url'=>array('create')),
	array('label'=>'View Itinerary', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Itinerary', 'url'=>array('admin')),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>