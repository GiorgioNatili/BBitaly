<?php
/* @var $this AvailabilityController */
/* @var $data Room */
/* @var $index int */

?>

<li class="item accordion-group">
    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'room-calendar-form-'.$index,
            'enableAjaxValidation'=>false,
    )); ?>
    <?php echo $form->errorSummary($data); ?>
    <div class="availability-block col2-set">
            <div class="col1">
                <div class="count"><?php echo str_pad($index + 1,3,'0',STR_PAD_LEFT) ?></div>
            <div class="name">
                    <h2><?php echo $data->title ?></h2>
            </div>
        </div>
        <div class="col2">
            <div class="input-box">
                <label>Prezzo di default</label>
                <?php echo $form->textField($data,'price', array('class' => 'input-field small text-right', 'maxlength' => 10)); ?>
                
            </div>
            <div class="input-box">
                    <label>Prezzo in offerta</label>
                <input type="text" class="input-field small" value="" />
            </div>
        </div>
        <div class="availability-trigger">
                <a href="#availability_<?php echo $index ?>" data-parent="#availability_accordion" data-toggle="collapse">&nbsp;</a>
        </div>
    </div>
    <div class="collapse" id="availability_<?php echo $index ?>">
        <div class="availability-content">
            <div class="calendar-container">
                <div class="calendar-nav a-center">
                    <div class="cnav-right pull-right"><a href="#"><i class="icon-adjust"></i></a></div>
                    <div class="cnav-left pull-left"><a class="disabled" href="#"><i class="icon-adjust"></i></a></div>
                    <span class="month">Gennaio</span>
                    <span class="year">2013</span>
                </div>
                <?php echo $this->drawCalendar($data,date('m'), date('Y')) ?>
            </div>
            <div class="actions a-center">
                    <button class="button green-btn">
                    <span><span>salva modifiche</span></span>
                </button>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</li>