<section>
	<div class="login-register">
    	<div class="container text-center">
        	<div class="bb-connect">
	        	<a href="#">Not a member yet?</a>
            </div>
        </div>
        <div class="facebook-connect text-center">
        	<h4>Connect with facebook</h4>
                <a href="<?php echo Yii::app()->facebook->getLoginUrl(array(
                    'scopes' => 'email, publish_actions, publish_stream, share_item, status_update, user_location'
                )) ?>">&nbsp;</a>
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
                            'id'=>'traveler-form'
                    )); ?>
                    <div class="tab-wrap">
                        <ul class="form-list">
                            <li class="fields set2">
                                <input type="hidden" name="_t" value="<?php echo Users::ROLE_TRAVELER ?>" />
                                <div class="field">
                                    <?php echo $form->labelEx($model,'first_name'); ?>
                                    <div class="input-box">
                                        <?php echo $form->textField($model,'first_name', array('class' => 'input-field medium')); ?>
                                    </div>
                                    <?php echo $form->error($model,'first_name'); ?>
                                </div>
                                <div class="field">
                                    <?php echo $form->labelEx($model,'last_name'); ?>
                                    <div class="input-box">
                                        <?php echo $form->textField($model,'last_name', array('class' => 'input-field medium')); ?>
                                    </div>
                                    <?php echo $form->error($model,'last_name'); ?>
                                </div>
                            </li>
                            <li class="fields set2">
                                <div class="field">
                                    <?php echo $form->labelEx($model,'email'); ?>
                                    <div class="input-box">
                                        <?php echo $form->textField($model,'email', array('class' => 'input-field medium')); ?>
                                    </div>
                                    <?php echo $form->error($model,'email'); ?>
                                </div>
                                <div class="field">
                                    <label>Confirm your e-mail</label>
                                    <div class="input-box">
                                        <input type="text" class="input-field medium" value="" />
                                    </div>
                                </div>
                            </li>
                            
                            <li class="fields set2">
                                <div class="field">
                                    <label class="required" for="Users_password">Password <span class="required">*</span></label>
                                    <div class="input-box">
                                        <?php echo $form->passwordField($model,'password', array('class' => 'input-field medium')); ?>
                                    </div>
                                    <?php echo $form->error($model,'password'); ?>
                                </div>
                                <div class="field">
                                    <label>Confirm Password</label>
                                    <div class="input-box">
                                        <input type="password"  class="input-field medium" value="" />
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
                            'id'=>'owner-form'
                    )); ?>
                    <div class="tab-wrap">
                        <input type="hidden" name="_t" value="<?php echo Users::ROLE_OWNER ?>" />
                    	<ul class="form-list">
                        	<li class="fields info-account">
                            	<h2 class="legend">info account</h2>
                            </li>
                            <li class="fields set2">
                                <div class="field">
                                    <?php echo $form->labelEx($model,'first_name'); ?>
                                    <div class="input-box">
                                        <?php echo $form->textField($model,'first_name', array('class' => 'input-field medium')); ?>
                                    </div>
                                    <?php echo $form->error($model,'first_name'); ?>
                                </div>
                                <div class="field">
                                    <?php echo $form->labelEx($model,'last_name'); ?>
                                    <div class="input-box">
                                        <?php echo $form->textField($model,'last_name', array('class' => 'input-field medium')); ?>
                                    </div>
                                    <?php echo $form->error($model,'last_name'); ?>
                                </div>
                            </li>
                            <li class="fields set2">
                                <div class="field">
                                    <?php echo $form->labelEx($model,'email'); ?>
                                    <div class="input-box">
                                        <?php echo $form->textField($model,'email', array('class' => 'input-field medium')); ?>
                                    </div>
                                    <?php echo $form->error($model,'email'); ?>
                                </div>
                                <div class="field">
                                    <label>Confirm your e-mail</label>
                                    <div class="input-box">
                                        <input type="text" class="input-field medium" value="" />
                                    </div>
                                </div>
                            </li>
                            
                            <li class="fields set2">
                                <div class="field">
                                    <label class="required" for="Users_password">Password <span class="required">*</span></label>
                                    <div class="input-box">
                                        <?php echo $form->passwordField($model,'password', array('class' => 'input-field medium')); ?>
                                    </div>
                                    <?php echo $form->error($model,'password'); ?>
                                </div>
                                <div class="field">
                                    <label>Confirm Password</label>
                                    <div class="input-box">
                                        <input type="password"  class="input-field medium" value="" />
                                    </div>
                                </div>
                            </li>
                            
                            <li class="fields information-structure">
                            	<h2 class="legend">information structure</h2>
                            </li>
                            
                            <li class="fields">
                                <div class="field">
                                    <?php echo $form->labelEx($property,'title'); ?>
                                    <div class="input-box">
                                        <?php echo $form->textField($property,'title', array('class' => 'input-field medium')); ?>
                                    </div>
                                    <?php echo $form->error($property,'title'); ?>
                                </div>
                            </li>
                            <li class="fields set4">
                                <div class="field">
                                    <label>Type of establishment</label>
                                    <div class="input-box">
                                        <?php 
                                        echo $form->dropDownList(
                                                $property,
                                                'type',
                                                $property_types,
                                                array(
                                                    'class' => 'selecbox x-medium'
                                                )
                                                );
                                        ?>
                                    </div>
                                </div>
                                <div class="field">
                                    <?php echo $form->labelEx($property,'people_min'); ?>
                                    <div class="input-box">
                                        <?php echo $form->textField($property,'people_min', array('class' => 'input-field x-small')); ?>
                                    </div>
                                    <?php echo $form->error($property,'people_min'); ?>
                                </div>
                                <div class="field">
                                    <?php echo $form->labelEx($property,'people_max'); ?>
                                    <div class="input-box">
                                        <?php echo $form->textField($property,'people_max', array('class' => 'input-field x-small')); ?>
                                    </div>
                                    <?php echo $form->error($property,'people_max'); ?>
                                </div>
                                <div class="field">
                                    <?php echo $form->labelEx($property,'base_price'); ?>
                                    <div class="input-box">
                                        <?php echo $form->textField($property,'base_price', array('class' => 'input-field x-small')); ?>
                                    </div>
                                    <?php echo $form->error($property,'base_price'); ?>
                                </div>
                                <div class="field">
                                    <label>Total Rooms *</label>
                                    <div class="input-box">
                                        <input type="text" name="total_rooms" class="input-field x-small" />
                                    </div>
                                </div>
                            </li>
                            <li class="fields set2 adresses">
                            	<div class="field">
                                    <h2>Address</h2>
                                    <p>Enter the address of your business.</p>
                                    <div class="input-box">
                                        <?php echo $form->textField($property,'address', array('class' => 'input-field medium fAddr', 'placeholder' => 'Street Info etc.')); ?>
                                        <?php echo $form->error($property,'address'); ?>
                                    </div>
                                    <div class="input-box">
                                        <?php echo $form->textField($property,'city', array('class' => 'input-field medium fCity', 'placeholder' => 'City..')); ?>
                                        <?php echo $form->error($property,'city'); ?>
                                    </div>
                                    <div class="input-box">
                                        <?php echo $form->textField($property,'zip_code', array('class' => 'input-field medium fZipCode', 'placeholder' => 'Zip Code..')); ?>
                                        <?php echo $form->error($property,'zip_code'); ?>
                                    </div>
                                </div>
                                <div class="field">
                                	<div class="map" id="quick-map">Map</div>
                                </div>
                                <script type="text/javascript">
                                    jQuery(document).ready(function() {
                                       $('#quick-map') .gmap3();
                                       $('.fZipCode').blur(function(e) {
                                           var _a = $('.fAddr').val()
                                               , _c = $('.fCity').val()
                                               , _z = e.target.value
                                               , _f = '';
                                               
                                           _f += ( typeof _a !== 'undefined' && _a.length > 0 ) ? _a : '';
                                           _f += ( typeof _z !== 'undefined' && _z.length > 0 ) ? ', '+_z : '';
                                           _f += ( typeof _c !== 'undefined' && _c.length > 0 ) ? ' '+_c : '';
                                           // Time to append country for accurate results
                                           _f += ' Italy';
                                           $("#quick-map").gmap3({
                                            marker:{
                                              address: _f
                                            },
                                            map:{
                                              options:{
                                                zoom: 14
                                              }
                                            }
                                          });
                                       });
                                    });
                                </script>
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
</section><!-- SECTION - END -->