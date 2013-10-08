<?php
/* @var $this ItineraryController */
/* @var $model Itinerary */

$this->breadcrumbs=array(
<<<<<<< HEAD
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
=======
	'Itineraries',
	'Create',
);

$this->renderPartial('_form', array('model'=>$model)); ?>
>>>>>>> def2c902e2605700237265c6ff0100057658fafc
