<?php
/* @var $this PoliciesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Policies',
);

$this->menu=array(
	array('label'=>'Create Policies', 'url'=>array('create')),
	array('label'=>'Manage Policies', 'url'=>array('admin')),
);
?>

<h1>Policies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
