<?php
/* @var $this ServicesController */
/* @var $model Services */
/* @var $form CActiveForm */
?>
<div class="form">
    
    <div class="personal-container container">
        <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'services-form',
                'enableAjaxValidation'=>false,
                'htmlOptions' => array('enctype' => 'multipart/form-data')
        )); ?>
        
    	<div class="row">
        	<div class="span12">
                <ul class="form-list">
                    <?php echo Statics::destination('/services/admin'); ?>
                    <li class="fields info-account">
                        <h2 class="legend">Services</h2>
                    </li>
                    <li class="fields set2">
                        <div class="field">
                            <?php echo $form->labelEx($model,'parent_id'); ?>
                            <div class="input-box">
                                <?php echo $form->dropDownList($model,'parent_id', CHtml::listData($parent, 'id', 'name'), array(
                                    'class' => 'selectbox medium',
                                    'empty' => '- Select Parent -'
                                    )) ?>
                            </div>
                            <?php echo $form->error($model,'parent_id'); ?>
                        </div>
                        <div class="field">
                            <?php echo $form->labelEx($model,'entity'); ?>
                            <div class="input-box">
                                <?php echo $form->dropDownList($model,'entity', CHtml::listData($entities, 'id', 'name'), array(
                                    'class' => 'selectbox medium',
                                    'empty' => '- Select Entity -')) ?>
                            </div>
                            <?php echo $form->error($model,'entity'); ?>
                        </div>
                        
                    </li>
                    <li class="fields set2">
                        <div class="field">
                            <?php echo $form->labelEx($model,'name'); ?>
                            <div class="input-box">
                                <?php echo $form->textField($model,'name', array('class' => 'input-field x-medium')); ?>
                            </div>
                            <?php echo $form->error($model,'name'); ?>
                        </div>
                        
                        <div class="field">
                            <?php echo $form->labelEx($model,'icon'); ?>
                            <div class="input-box">
                                <?php echo $form->fileField($model, 'icon', array('class' => 'avatar')); ?>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="form-action text-center">
                    <div class="button-sets">
                        <button class="button">
                            <span>
                                <span>
                                    Save Changes
                                </span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>

</div><!-- form -->