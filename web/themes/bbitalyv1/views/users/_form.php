
<section>
<!-- InstanceBeginEditable name="EditRegionSection" -->
    <div class="personal-container container">
        <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'owner-form'
        )); ?>
    	<div class="row">
        	<div class="span12">
                <ul class="form-list">
                    <?php echo Statics::destination('/users/update/'. Yii::app()->user->id); ?>
                    <li class="fields info-account">
                        <h2 class="legend">info account</h2>
                    </li>
                    <li class="fields set2">
                        <div class="field">
                            <?php echo $form->labelEx($model,'first_name'); ?>
                            <div class="input-box">
                                <?php echo $form->textField($model,'first_name', array('class' => 'input-field x-medium')); ?>
                            </div>
                            <?php echo $form->error($model,'first_name'); ?>
                        </div>
                        <div class="field">
                            <?php echo $form->labelEx($model,'last_name'); ?>
                            <div class="input-box">
                                <?php echo $form->textField($model,'last_name', array('class' => 'input-field x-medium')); ?>
                            </div>
                            <?php echo $form->error($model,'last_name'); ?>
                        </div>
                    </li>
                    <li class="fields set2">
                        <div class="field">
                            <?php echo $form->labelEx($model,'email'); ?>
                            <div class="input-box">
                                <?php echo $form->textField($model,'email', array('class' => 'input-field x-medium')); ?>
                            </div>
                            <?php echo $form->error($model,'email'); ?>
                        </div>
                        <div class="field">
                            <label class="required" for="Users_password">Password <span class="required">*</span></label>
                            <div class="input-box">
                                <input type="password" placeholder="Enter New Password.." class="input-field x-medium" style="height: 30px;" />
                            </div>
                            <?php echo $form->error($model,'password'); ?>
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
</section><!-- SECTION - END -->