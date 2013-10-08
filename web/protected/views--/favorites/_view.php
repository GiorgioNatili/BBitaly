<?php
/* @var $this FavoritesController */
/* @var $data Favorites */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('property_id')); ?>:</b>
	<?php echo CHtml::encode($data->property_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('favorited_on')); ?>:</b>
	<?php echo CHtml::encode($data->favorited_on); ?>
	<br />


</div>