<?php
/* @var $this ItineraryController */
/* @var $data Itinerary */
?>

<<<<<<< HEAD
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cover_image')); ?>:</b>
	<?php echo CHtml::encode($data->cover_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_from')); ?>:</b>
	<?php echo CHtml::encode($data->date_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_to')); ?>:</b>
	<?php echo CHtml::encode($data->date_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uid')); ?>:</b>
	<?php echo CHtml::encode($data->uid); ?>
	<br />

	<?php /*
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
=======
<li class="item accordion-group">
    <div class="itinerary-block col2-set" data-toggle="collapse" data-parent="#itinerary_accordion" href="#itinerary_two_<?php echo $index ?>">
            <div class="edit-link"><a href="#"><i class="icon-flag"></i> </a></div>
        <div class="col1">
            <div class="img"><img alt="" src="<?php echo Bucket::load($data->coverImage->img_name) ?>"></div>
        </div>
        <div class="col2">
            <div class="info">
                <h2><?php echo $data->name ?></h2>
                <p>dal:<strong><?php echo date('d/m/Y', $data->date_from) ?></strong> al:<strong><?php echo date('d/m/Y', $data->date_to) ?></strong></p>
                <p><strong>999</strong> strutture prenotate/ 99 citta</p>
            </div>
        </div>
    </div>
    <div class="collapse" id="itinerary_two_<?php echo $index ?>">
        <div class="itinerary-content">
            <div class="description">
                <div class="edit-link"><a href="#"><i class="icon-flag"></i> </a></div>
                <p><?php echo $data->description ?></p>
            </div>
            <div class="map">
                Map
            </div>
            <div class="itinerary-stages">
                <ul class="outcome-list">
                    <?php $j = 1;
                    foreach ($data->itineraryLocations as $location): ?>
                        <li>
                            <div class="count"><?php echo $j++ ?></div>
                            <div class="outcome">
                                <div class="name"><?php echo  $location->name ?></div>
                                <div class="date"><i class="icon-flag"></i><?php echo $location->date_from ?></div>
                                <div class="date"><i class="icon-flag"></i><?php echo $location->date_to ?></div>
                                <div class="day"><i class="icon-flag"></i><?php echo $location->persons ?></div>
                                <div class="delete"><a href="#"><i class="icon-flag"></i> D</a></div>
                            </div>
                        </li>
                    <?php endforeach;  ?>
                </ul>
            </div>
            <div class="button-sets a-center">
                <button class="button booking-btn">
                    <span>
                        <span><i class="icon-flag"> </i>prenota itinerario</span>
                    </span>
                </button>
            </div>
        </div>
    </div>
</li>
>>>>>>> def2c902e2605700237265c6ff0100057658fafc
