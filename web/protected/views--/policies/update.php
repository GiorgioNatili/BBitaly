<?php
/* @var $this PoliciesController */
/* @var $model Policies */

$this->breadcrumbs=array(
	'Policies'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Policies', 'url'=>array('index')),
	array('label'=>'Create Policies', 'url'=>array('create')),
	array('label'=>'View Policies', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Policies', 'url'=>array('admin')),
);
?>

<h1>Update Policies <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>