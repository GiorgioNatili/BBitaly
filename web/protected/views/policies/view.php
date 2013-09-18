<?php
/* @var $this PoliciesController */
/* @var $model Policies */

$this->breadcrumbs=array(
	'Policies'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Policies', 'url'=>array('index')),
	array('label'=>'Create Policies', 'url'=>array('create')),
	array('label'=>'Update Policies', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Policies', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Policies', 'url'=>array('admin')),
);
?>

<h1>View Policies #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'status',
		'created_on',
	),
)); ?>
