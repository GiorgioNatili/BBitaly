<?php
/* @var $this PoliciesController */
/* @var $model Policies */

$this->breadcrumbs=array(
	'Policies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Policies', 'url'=>array('index')),
	array('label'=>'Manage Policies', 'url'=>array('admin')),
);
?>

<h1>Create Policies</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>