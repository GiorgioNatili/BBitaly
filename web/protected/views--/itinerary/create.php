<?php
/* @var $this ItineraryController */
/* @var $model Itinerary */

$this->breadcrumbs=array(
	'Itineraries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Itinerary', 'url'=>array('index')),
	array('label'=>'Manage Itinerary', 'url'=>array('admin')),
);
?>

<h1>Create Itinerary</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>