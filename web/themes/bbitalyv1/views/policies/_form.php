<?php
/* @var $this PoliciesController */
/* @var $model Policies */
/* @var $form CActiveForm */
?>

<section>
<!-- InstanceBeginEditable name="EditRegionSection" -->
    <div class="personal-container container">
        <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'owner-form'
        )); ?>
    	<div class="row">
        	<div class="span12">
                <ul class="form-list">
                    <li class="fields info-account">
                        <h2 class="legend">Create Policy</h2>
                    </li>
                    <li class="fields set2">
                        <div class="field">
                            <?php echo $form->labelEx($model,'name'); ?>
                            <div class="input-box">
                                <?php echo $form->textField($model,'name', array('class' => 'input-field x-medium')); ?>
                            </div>
                            <?php echo $form->error($model,'name'); ?>
                        </div>
                    </li>
                    <li class="fields set2">
                        
                        <div class="field">
                            <?php echo $form->labelEx($model,'description'); ?>
                            <div class="input-box">
                                <?php echo $form->textArea($model,'description', array('class' => 'input-field x-large')); ?>
                            </div>
                            <?php echo $form->error($model,'description'); ?>
                        </div>
                    </li>
                </ul>
                <div class="form-action text-center">
                    <div class="button-sets">
                        <button class="button">
                            <span>
                                <span>
                                    <?php echo $model->isNewRecord ? 'Create Policy' : 'Update Policty' ?>
                                </span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
<!-- InstanceEndEditable -->
</section><!-- SECTION - END -->