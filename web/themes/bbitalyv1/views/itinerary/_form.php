<?php
/* @var $this ItineraryController */
/* @var $model Itinerary */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'itinerary-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<section>
    <div class="itinerary-container container">
        <?php echo $form->errorSummary($model); ?>
    	<div class="row">
        	<div class="span12">
                <div class="itinerary-list">
                    <div class="item i-expand i-edit">
                        <div class="itinerary-block col2-set">
                        	<div class="edit-link passed"><a href="#"><i class="icon-flag"></i> </a></div>
                            <div class="col1">
                                <div class="img img-edit" id="iti-cover-img">
                                    <input type="file" name="cover" />
                                </div>
                            </div>
                            <div class="col2">
                                <div class="info">
                                    <h4>Nome dell'itinerario 001</h4>
                                    <div class="input-box">
                                        <?php echo $form->textField($model,'name',array('size'=>50,'required' => 'required','maxlength'=>50,'placeholder' => 'Itinerary Name..','class' => 'input-field medium')); ?>
                                        <?php echo $form->error($model,'name'); ?>
                                    </div>
                                    <p>dal:<strong>02/02/0202</strong> al:<strong>02/02/0202</strong></p>
                                    <p><strong>999</strong> strutture prenotate/ 99 citta</p>
                                </div>
                            </div>
                        </div>
                        <div class="itinerary-content">
                            <div class="description">
                            	<div class="edit-link passed"><a href="#"><i class="icon-flag"></i> </a></div>
                                <h4>Aggiungi una descrizione al tuo itinerario (max 000 caratteri)</h4>
                                <div class="input-box">
                                    <?php echo $form->textArea($model,'description',array('rows'=>6,'required' => 'required','class' => 'textarea large', 'cols'=>50)); ?>
                                    <?php echo $form->error($model,'description'); ?>
                                </div>
                            </div>
                            <div class="map" id="route-map">
                                Map
                            </div>
                            <script>
                                jQuery(document).ready(function() {
                                   $('#route-map') .gmap3({
                                       map:{
                                        options:{
                                          zoom: 14
                                        }
                                      }
                                   });
                                });
                            </script>
                            <div class="itinerary-stages">
                                <ul class="outcome-list" id="itin-loc-list">
                                    <li class="add-outcome"  id="itin-loc-list-end">
                                    	<div class="count">+</div>
                                        <div class="outcome">
                                            <div class="name"><a href="javascript:void(0);" id="add-location">Aggiungi una nuova localita al tou itinerario</a></div>
                                        </div>
                                    </li>
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
                </div>
            </div>
        </div>    
    </div>
</section><!-- SECTION - END -->

	

	<!--
 <div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cover_image'); ?>
		<?php echo $form->textField($model,'cover_image'); ?>
		<?php echo $form->error($model,'cover_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_from'); ?>
		<?php echo $form->textField($model,'date_from',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'date_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_to'); ?>
		<?php echo $form->textField($model,'date_to',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'date_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'uid'); ?>
		<?php echo $form->textField($model,'uid'); ?>
		<?php echo $form->error($model,'uid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_on'); ?>
		<?php echo $form->textField($model,'created_on',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'created_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_on'); ?>
		<?php echo $form->textField($model,'updated_on',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'updated_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'host_ip'); ?>
		<?php echo $form->textField($model,'host_ip',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'host_ip'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
 -->

<?php $this->endWidget(); ?>
