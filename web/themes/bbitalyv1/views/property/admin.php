<?php
/* @var $this PropertyController */
/* @var $model Property */

$this->breadcrumbs=array(
	'Properties'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Property', 'url'=>array('index')),
	array('label'=>'Create Property', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#property-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Properties</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'property-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'type',
		'people_min',
		'people_max',
		'address',
                array(
                    'name' => 'is_featured',
                    'header' => "Featured?",
                    'filter' => array('0' => 'No','1' => 'Yes'),
                    'value' => '($data->is_featured == 1) ? ("Yes") : ("No")'
                ),
		/*
		'city',
		'zip_code',
		'cover_image',
		'uid',
		'created_on',
		*/
		array(
                    'class'=>'CButtonColumn',
                    'updateButtonUrl'=>'Yii::app()->createUrl("/property/update", array("id" =>  $data["id"], "destination" => "/property/admin"))',
		),
	),
)); ?>
