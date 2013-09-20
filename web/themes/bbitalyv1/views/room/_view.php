<?php
/* @var $this RoomController */
/* @var $data Room */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('property_id')); ?>:</b>
	<?php echo CHtml::encode($data->property_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('people_min')); ?>:</b>
	<?php echo CHtml::encode($data->people_min); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('people_max')); ?>:</b>
	<?php echo CHtml::encode($data->people_max); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('policy')); ?>:</b>
	<?php echo CHtml::encode($data->policy); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('is_refundable')); ?>:</b>
	<?php echo CHtml::encode($data->is_refundable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_on')); ?>:</b>
	<?php echo CHtml::encode($data->created_on); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_on')); ?>:</b>
	<?php echo CHtml::encode($data->updated_on); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('host_ip')); ?>:</b>
	<?php echo CHtml::encode($data->host_ip); ?>
	<br />

	*/ ?>

</div>