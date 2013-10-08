<section>
	<div class="login-register">
    	<div class="container text-center">
        	<div class="bb-connect">
	        	<a href="#">Not a member yet?</a>
            </div>
        </div>
        <div class="facebook-connect text-center">
        	<h4>Connect with facebook</h4>
            <a href="#">asdasdasd</a>
            <p>We will not publish anything without your permission.</p>
        </div>
        <div class="container login-register-tab">
            <ul class="nav nav-tabs" id="bbTab">
                <li class="active"><a href="#traveller"><i class="icon-flag"></i> I'm a travellr</a></li>
                <li><a href="#property_owner"><i class="icon-flag"></i> I'am a property owner</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="traveller">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'login-form',
                            'enableClientValidation'=>true,
                            'clientOptions'=>array(
                                    'validateOnSubmit'=>true,
                            ),
                    )); ?>
                    <div class="tab-wrap">
                        <ul class="form-list">
                            <li class="fields set2">
                                
                                <div class="field">
                                    <?php echo $form->labelEx($model,'first_name'); ?>
                                    <div class="input-box">
                                        <?php echo $form->textField($model,'first_name', array('class' => 'input-field medium')); ?>
                                    </div>
                                </div>
                                <div class="field">
                                    <?php echo $form->labelEx($model,'last_name'); ?>
                                    <div class="input-box">
                                        <?php echo $form->textField($model,'last_name', array('class' => 'input-field medium')); ?>
                                    </div>
                                </div>
                            </li>
                            <li class="fields set2">
                                <div class="field">
                                    <?php echo $form->labelEx($model,'email'); ?>
                                    <div class="input-box">
                                        <?php echo $form->textField($model,'email', array('class' => 'input-field medium')); ?>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Confirm your e-mail</label>
                                    <div class="input-box">
                                        <input type="text" class="input-field medium" value="" />
                                    </div>
                                </div>
                            </li>
                            <li class="fields">
                                <div class="note-accept">
                                    <div class="input-box">
                                        <input type="checkbox" class="checkbox" value="" />
                                    </div>
                                    <p>I accept the terms of cancellation, the house rules, the <a href="#">terms of repayment</a> and the host's <a href="#">terms of service</a>.</p>
                                </div>
                            </li>
                            <li class="fields text-center">
                                <div class="button-sets">
                                    <button class="button">
                                        <span>
                                            <span>
                                                Register
                                            </span>
                                        </span>
                                    </button>
                                </div>
                            </li>
                            <li class="fields text-center">
                                <div class="note-mark">
                                    <i class="icon-home"></i> 
                                    Soon you'll get an email with the password needed to access the portal.
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
                <div class="tab-pane" id="property_owner">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'login-form',
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                                'validateOnSubmit'=>true,
                        ),
                )); ?>
                    <div class="tab-wrap">
                    	<ul class="form-list">
                        	<li class="fields info-account">
                            	<h2 class="legend">info account</h2>
                            </li>
                            <li class="fields set2">
                                <div class="field">
                                    <label>Name</label>
                                    <div class="input-box">
                                        <input type="text" class="input-field medium" value="" />
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Surname</label>
                                    <div class="input-box">
                                        <input type="text" class="input-field medium" value="" />
                                    </div>
                                </div>
                            </li>
                            <li class="fields set2">
                                <div class="field">
                                    <label>E-mail</label>
                                    <div class="input-box">
                                        <input type="text" class="input-field medium" value="" />
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Confirm your e-mail</label>
                                    <div class="input-box">
                                        <input type="text" class="input-field medium" value="" />
                                    </div>
                                </div>
                            </li>
                            <li class="fields information-structure">
                            	<h2 class="legend">information structure</h2>
                            </li>
                            <li class="fields">
	                            <div class="field">
                                    <label>Property name</label>
                                    <div class="input-box">
                                        <input type="text" class="input-field large" value="" />
                                    </div>
                                </div>
							</li>
                            <li class="fields set4">
                                <div class="field">
                                    <label>Type of establishment</label>
                                    <div class="input-box">
                                        <select class="selectbox x-medium">
                                        	<option>Type</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Minimum No. of people</label>
                                    <div class="input-box">
                                        <input type="text" class="input-field small" value="" />
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Max people</label>
                                    <div class="input-box">
                                        <input type="text" class="input-field small" value="" />
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Base Price</label>
                                    <div class="input-box">
                                        <input type="text" class="input-field x-small" value="" />
                                    </div>
                                </div>
                            </li>
                            <li class="fields set2 adresses">
                            	<div class="field">
                                	<h2>Address</h2>
                                    <p>Enter the address of your business.</p>
                                    <label>Address</label>
                                    <div class="input-box">
                                        <input type="text" class="input-field medium" value="" />
                                    </div>
                                </div>
                                <div class="field">
                                	<div class="map">Map</div>
                                </div>
                            </li>
                            <li class="fields">
                                <div class="note-accept">
                                    <div class="input-box">
                                        <input type="checkbox" class="checkbox" value="" />
                                    </div>
                                    <p>I accept the terms of cancellation, the house rules, the <a href="#">terms of repayment</a> and the host's <a href="#">terms of service</a>.</p>
                                </div>
                            </li>
                            <li class="fields text-center">
                                <div class="button-sets">
                                    <button class="button">
                                        <span>
                                            <span>
                                                Register
                                            </span>
                                        </span>
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
<!-- InstanceEndEditable -->
    <div class="breadcrumbs">
	    <ul class="container">
		    <li>
            	<a href="#">Home</a>
                <span>/</span>
			</li>
		    <li>
            	<strong>Active</strong>
			</li>
	    </ul>
    </div>
</section><!-- SECTION - END -->