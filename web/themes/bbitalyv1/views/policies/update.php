<?php
/* @var $this PoliciesController */
/* @var $model Policies */

$this->breadcrumbs=array(
	'Policies',
	ucfirst($model->name),
	'Update',
);
 $this->renderPartial('_form', array('model'=>$model)); ?>