
<?php
/* @var $this PropertyController */
/* @var $model Property */
/* @var $form CActiveForm */
?>

<section>
<!-- InstanceBeginEditable name="EditRegionSection" -->
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'property-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
    <div class="container account-container">
    	<div class="row account-tabbable" id="account_tabbable">
            <div class="left-nav span3">
                <ul class="account-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#account_tab_pane1"><span>Informazioni struttura</span></a>
                        <span class="arrow-w">&nbsp;</span>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#account_tab_pane2"><span>Foto e descrizioni struttura</span></a>
                        <span class="arrow-w">&nbsp;</span>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#account_tab_pane3"><span>Foto e descrizioni camere</span></a>
                        <span class="arrow-w">&nbsp;</span>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#account_tab_pane4"><span>Servizi</span></a>
                        <span class="arrow-w">&nbsp;</span>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#account_tab_pane5"><span>Policy</span></a>
                        <span class="arrow-w">&nbsp;</span>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#account_tab_pane6"><span>Informazioni Fatturazione</span></a>
                        <span class="arrow-w">&nbsp;</span>
                    </li>
                </ul>
            </div>
            <div class="span9 tab-content">
            	<div class="tab-pane active" id="account_tab_pane1">
                    <div class="account-content">
                        <ul class="form-list">
                            <li class="fields">
                                <h2 class="legend">informazioni struttura</h2>
                            </li>
                            <li class="fields set2">
                                <div class="field">
                                    <label>Nome della struttura</label>
                                    <div class="input-box">
                                        <?php echo $form->textField($model,'title', array('class' => 'input-field medium')); ?>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Tipologia struttura</label>
                                    <div class="input-box">
                                        <?php echo $form->dropDownList($model,'type', Statics::getEstablishments(), array('class' => 'selectbox medium')) ?>
                                        
                                    </div>
                                </div>
                            </li>
                            <li class="fields set3">
                                <div class="field">
                                    <label>Nr. minimo di persone</label>
                                    <div class="input-box">
                                        <?php echo $form->textField($model,'people_min', array('class' => 'input-field x-small text-right')); ?>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Nr. massimo di persone</label>
                                    <div class="input-box">
                                        <?php echo $form->textField($model,'people_max', array('class' => 'input-field x-small text-right')); ?>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Prezzo</label>
                                    <div class="input-prepend input-box">
                                        <span class="add-on">&euro;</span>
                                        <?php echo $form->textField($model,'base_price', array('class' => 'input-field x-small text-right')); ?>
                                      </div>

                                </div>
                            </li>
                            <li>
                                <hr/>
                            </li>
                            <li class="fields set2">
                                <div class="field">
                                    <h2>Address</h2>
                                    <p>Enter the address of your business.</p>
                                    <div class="input-box">
                                        <?php echo $form->textField($model,'address', array('class' => 'input-field medium fAddr', 'placeholder' => 'Street Info etc.')); ?>
                                        <?php echo $form->error($model,'address'); ?>
                                    </div>
                                    <div class="input-box">
                                        <?php echo $form->textField($model,'city', array('class' => 'input-field medium fCity', 'placeholder' => 'City..')); ?>
                                        <?php echo $form->error($model,'city'); ?>
                                    </div>
                                    <div class="input-box">
                                        <?php echo $form->textField($model,'zip_code', array('class' => 'input-field medium fZipCode', 'placeholder' => 'Zip Code..')); ?>
                                        <?php echo $form->error($model,'zip_code'); ?>
                                    </div>
                                </div>
                                <div class="field">
                                	<div class="map" id="quick-map">Map</div>
                                </div>
                                <script type="text/javascript">
                                    jQuery(document).ready(function() {
                                       $('#quick-map').gmap3(
                                               <?php
                                               if ( $model->isNewRecord === false ) : ?>
                                                  {
                                                    marker:{
                                                      address: "<?php echo $model->address.' '. $model->zip_code.', '. $model->city.' Italy' ?>"
                                                    },
                                                    map:{
                                                      options:{
                                                        zoom: 14
                                                      }
                                                    }
                                                }
                                               <?php else: ?>
                                                   {}
                                               <?php endif; ?>
                                        );
                                       $('.fZipCode').blur(function(e) {
                                           console.log("Blur..");
                                           var _a = $('.fAddr').val()
                                               , _c = $('.fCity').val()
                                               , _z = e.target.value
                                               , _f = '';
                                               
                                           _f += ( typeof _a !== 'undefined' && _a.length > 0 ) ? _a : '';
                                           _f += ( typeof _z !== 'undefined' && _z.length > 0 ) ? ', '+_z : '';
                                           _f += ( typeof _c !== 'undefined' && _c.length > 0 ) ? ' ,'+_c : '';
                                           // Time to append country for accurate results
                                           _f += ', Italy';
                                           console.log(_f);
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
                        </ul>
                    </div>
                </div><!-- TAB PANE #1 - END -->
                <div class="tab-pane" id="account_tab_pane2">
                	<div class="account-content">
                    	<div class="property-detail">
                        	<h2 class="legend">descrizione</h2>
                            <div class="description">Inserisci la descrizione della struttura nelle diverse lingue! (max 000 battute)</div>
                            <div class="languages-pills" id="languages-pills">
                                <div  class="tab-pane">
                                    <ul class="nav nav-pills">
                                        <li class="active"><a data-toggle="tab" href="#language-pane1"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_flag-1.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#language-pane2"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_flag-2.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#language-pane3"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_flag-3.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#language-pane4"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_flag-4.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#language-pane5"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_flag-5.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#language-pane6"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_flag-6.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#language-pane7"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_flag-7.png" alt="" /></a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <?php //echo "<pre>"; print_r($model->descriptions); exit; ?>
                                        <?php if (count($model->descriptions) >= 1): ?>
                                            <?php $counter = 1; foreach ($model->descriptions[0]->attributes as $col => $val): ?>
                                                <?php if (substr($col, 0,4) == 'lang'): ?>
                                                    <div class="tab-pane <?php echo $counter === 1 ? 'active' : '' ?>" id="language-pane<?php echo $counter++ ?>">
                                                        <div class="desc">
                                                            <div class="input-box">
                                                                <?php echo $form->textArea($model->descriptions[0],$col, array('class' => 'input-field x-large text-left')); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                        <?php $counter = 1; 
                                            if ( !empty($property_description)):
                                            foreach ($property_description->attributes as $col => $val): 
                                                if (substr($col, 0,4) == 'lang'): ?>
                                                <div class="tab-pane <?php echo $counter == 1 ? 'active' : '' ?>" id="language-pane<?php echo $counter++ ?>">
                                                    <div class="desc">
                                                        <div class="input-box">
                                                            <input type="text" name="Description[<?php echo $col ?>]" class="input-field x-large text-left" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif;
                                        endif;?>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="photo-gallery">
                            	<h2 class="legend">photogallery</h2>
                            	<div class="thumb-main">
                                	<div class="img">
                                    	<input type="file" class="avator" />
                                        <p>inserisci un'immagine di copertina <br>(max 2MB)</p>
                                    </div>
                                </div>
                                <hr class="dotted"/>
                                <p>Inserisci le altre immagini della tua struttura per completare la photogallery</p>
                                <ul class="thumb-list">
                                	<li>
                                    	<div class="img">
	                                    	<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_list-img-1.jpg" /></a>
                                        </div>
                                        <div class="hover">
                                        	<a href="#" class="thumb-edit">Edit</a>
                                            <a href="#" class="thumb-delete">Delete</a>
                                        </div>
                                    </li>
                                    <li>
                                    	<div class="img">
	                                    	<a href="#">&nbsp;</a>
                                        </div>
                                        <div class="hover">
                                        	<a href="#" class="thumb-edit">Edit</a>
                                            <a href="#" class="thumb-delete">Delete</a>
                                        </div>
                                    </li>
                                    <li>
                                    	<div class="img">
	                                    	<a href="#">&nbsp;</a>
                                        </div>
                                        <div class="hover">
                                        	<a href="#" class="thumb-edit">Edit</a>
                                            <a href="#" class="thumb-delete">Delete</a>
                                        </div>
                                    </li>
                                    <li>
                                    	<div class="img">
	                                    	<a href="#">&nbsp;</a>
                                        </div>
                                        <div class="hover">
                                        	<a href="#" class="thumb-edit">Edit</a>
                                            <a href="#" class="thumb-delete">Delete</a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                                <ul class="thumb-list">
                                	<li>
                                    	<div class="img">
	                                    	<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_list-img-1.jpg" /></a>
                                        </div>
                                        <div class="hover">
                                        	<a href="#" class="thumb-edit">Edit</a>
                                            <a href="#" class="thumb-delete">Delete</a>
                                        </div>
                                    </li>
                                    <li>
                                    	<div class="img">
	                                    	<a href="#">&nbsp;</a>
                                        </div>
                                        <div class="hover">
                                        	<a href="#" class="thumb-edit">Edit</a>
                                            <a href="#" class="thumb-delete">Delete</a>
                                        </div>
                                    </li>
                                    <li>
                                    	<div class="img">
	                                    	<a href="#">&nbsp;</a>
                                        </div>
                                        <div class="hover">
                                        	<a href="#" class="thumb-edit">Edit</a>
                                            <a href="#" class="thumb-delete">Delete</a>
                                        </div>
                                    </li>
                                    <li>
                                    	<div class="img">
	                                    	<a href="#">&nbsp;</a>
                                        </div>
                                        <div class="hover">
                                        	<a href="#" class="thumb-edit">Edit</a>
                                            <a href="#" class="thumb-delete">Delete</a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                                <ul class="thumb-list">
                                	<li>
                                    	<div class="img">
	                                    	<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_list-img-1.jpg" /></a>
                                        </div>
                                        <div class="hover">
                                        	<a href="#" class="thumb-edit">Edit</a>
                                            <a href="#" class="thumb-delete">Delete</a>
                                        </div>
                                    </li>
                                    <li>
                                    	<div class="img">
	                                    	<a href="#">&nbsp;</a>
                                        </div>
                                        <div class="hover">
                                        	<a href="#" class="thumb-edit">Edit</a>
                                            <a href="#" class="thumb-delete">Delete</a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- TAB PANE #2 - END -->
                <div class="tab-pane" id="account_tab_pane3">
                	<div class="account-content">
                    	<div class="property-detail">
                            <div class="photo-gallery">
                            	<h2 class="legend">photogallery</h2>
                                <p>Inserisci le altre immagini della tua struttura per completare la photogallery</p>
                                <ul class="thumb-list jcarousel-skin-tango jcarousel-horizontal">
                                	<li>
                                    	<div class="img">
                                            <a href="#"><img src="<?php echo $this->getAssetsUrl() ?>img/bb_list-img-1.jpg" /></a>
                                        </div>
                                        <div class="hover">
                                        	<a href="#" class="thumb-edit">Edit</a>
                                            <a href="#" class="thumb-delete">Delete</a>
                                        </div>
                                    </li>
                                    <li>
                                    	<div class="img">
	                                    	<a href="#">&nbsp;</a>
                                        </div>
                                        <div class="hover">
                                        	<a href="#" class="thumb-edit">Edit</a>
                                            <a href="#" class="thumb-delete">Delete</a>
                                        </div>
                                    </li>
                                    <li>
                                    	<div class="img">
	                                    	<a href="#">&nbsp;</a>
                                        </div>
                                        <div class="hover">
                                        	<a href="#" class="thumb-edit">Edit</a>
                                            <a href="#" class="thumb-delete">Delete</a>
                                        </div>
                                    </li>
                                    <li>
                                    	<div class="img">
	                                    	<a href="#">&nbsp;</a>
                                        </div>
                                        <div class="hover">
                                        	<a href="#" class="thumb-edit">Edit</a>
                                            <a href="#" class="thumb-delete">Delete</a>
                                        </div>
                                    </li>
                                    <li>
                                    	<div class="img">
	                                    	<a href="#">&nbsp;</a>
                                        </div>
                                        <div class="hover">
                                        	<a href="#" class="thumb-edit">Edit</a>
                                            <a href="#" class="thumb-delete">Delete</a>
                                        </div>
                                    </li>
                                    <li>
                                    	<div class="img">
	                                    	<a href="#">&nbsp;</a>
                                        </div>
                                        <div class="hover">
                                        	<a href="#" class="thumb-edit">Edit</a>
                                            <a href="#" class="thumb-delete">Delete</a>
                                        </div>
                                    </li>
                                    <li>
                                    	<div class="img">
	                                    	<a href="#">&nbsp;</a>
                                        </div>
                                        <div class="hover">
                                        	<a href="#" class="thumb-edit">Edit</a>
                                            <a href="#" class="thumb-delete">Delete</a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                                <div class="thumb-nav">&nbsp;</div>
                            </div>
                            <hr/>
                            <ul class="form-list">
                            	<li class="fields">
                                    <h2 class="legend">info</h2>
                                    <p>Compila i campi con le informazioni base della camera.</p>
                                </li>
                            	<li class="fields set3">
                                    <div class="field">
                                        <label>Nr. minimo di persone</label>
                                        <div
                                            class="input-box">
                                            <?php echo $form->textField($room,'people_min', array('class' => 'input-field small')); ?>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label>Nr. massimo di persone</label>
                                        <div class="input-box">
                                            <?php echo $form->textField($room,'people_max', array('class' => 'input-field small')); ?>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label>Prezzo base</label>
                                        <div class="input-box">
                                            <?php echo $form->textField($room,'price', array('class' => 'input-field x-small')); ?>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label>Total Rooms</label>
                                        <div class="input-box">
                                            <input type="text" name="total_rooms" value="<?php echo $model->isNewRecord ? 1 : 10 ?>" class="input-field x-small text-right" maxlength="3" />
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <hr class="dotted"/>
                            <h2 class="legend">descrizione</h2>
                            <div class="description">Inserisci la descrizione della struttura nelle diverse lingue</div>
							<div class="languages-pills" id="languages-pills">
                                <div  class="tab-pane">
                                    <ul class="nav nav-pills">
                                        <li class="active"><a data-toggle="tab" href="#room-desc-1"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_flag-1.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#room-desc-2"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_flag-2.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#room-desc-3"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_flag-3.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#room-desc-4"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_flag-4.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#room-desc-5"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_flag-5.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#room-desc-6"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_flag-6.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#room-desc-7"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_flag-7.png" alt="" /></a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <?php //echo "<pre>"; print_r($model->rooms[0]->descriptions[0]->attributes); exit; ?>
                                        <?php if (count($model->descriptions) >= 1): ?>
                                            <?php $counter = 1; foreach ($model->descriptions[0]->attributes as $col => $val): ?>
                                                <?php if (substr($col, 0,4) == 'lang'): ?>
                                                    <div class="tab-pane <?php echo $counter === 1 ? 'active' : '' ?>" id="room-desc-<?php echo $counter++ ?>">
                                                        <div class="desc">
                                                            <div class="input-box">
                                                                <?php echo $form->textField($model->descriptions[0],$col, array('class' => 'input-field x-large text-left')); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <?php $counter = 1; foreach ($room_desc->attributes as $col => $val): 
                                                if (substr($col, 0,4) == 'lang'): ?>
                                                <div class="tab-pane <?php echo $counter == 1 ? 'active' : '' ?>" id="room-desc-<?php echo $counter++ ?>">
                                                    <div class="desc">
                                                        <div class="input-box">
                                                            <input type="text" name="Room[Description][<?php echo $col ?>]" class="input-field x-large text-left" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                    	<ul class="number-steps a-center">
                        	<li class="visited"><a href="#">01</a></li>
                            <li class="visited"><a href="#">02</a></li>
                            <li class="active"><a href="#">03</a></li>
                            <li class="disabled"><a href="#">04</a></li>
                        </ul>
                    </div>
                </div><!-- TAB PANE #3 - END -->
                <div class="tab-pane" id="account_tab_pane4">
                	<div class="account-content">
                    	<div class="services-detail">
                        	<h2 class="legend">servizi</h2>
                            <div class="description">
                            	Seleziona tutti i servizi della tua struttura! Sono divisi per categoria.
                            </div>
                            <div class="services-pills" id="services-pills">
                                <div  class="tab-pane">
                                    <ul class="nav nav-pills">
                                        <li class="active"><a data-toggle="tab" href="#serrvice-pane1"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_service-1.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#serrvice-pane2"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_service-2.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#serrvice-pane3"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_service-3.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#serrvice-pane4"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_service-4.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#serrvice-pane5"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_service-5.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#serrvice-pane6"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_service-6.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#serrvice-pane7"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_service-7.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#serrvice-pane8"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_service-8.png" alt="" /></a></li>
                                        <li class=""><a data-toggle="tab" href="#serrvice-pane9"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_service-9.png" alt="" /></a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="serrvice-pane1">
                                            <h4>Struttura</h4>
                                            <ul class="structure-list">
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox disabled" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="serrvice-pane2">
                                            <h4>Struttura</h4>
                                            <ul class="structure-list">
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox disabled" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="serrvice-pane3">
                                            <h4>Struttura</h4>
                                            <ul class="structure-list">
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox disabled" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="serrvice-pane4">
                                            <h4>Struttura</h4>
                                            <ul class="structure-list">
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox disabled" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="serrvice-pane5">
                                            <h4>Struttura</h4>
                                            <ul class="structure-list">
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox disabled" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="serrvice-pane6">
                                            <h4>Struttura</h4>
                                            <ul class="structure-list">
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox disabled" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="serrvice-pane7">
                                            <h4>Struttura</h4>
                                            <ul class="structure-list">
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox disabled" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="serrvice-pane8">
                                            <h4>Struttura</h4>
                                            <ul class="structure-list">
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox disabled" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="serrvice-pane9">
                                            <h4>Struttura</h4>
                                            <ul class="structure-list">
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox disabled" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <button type="button" value="0" class="btn btn-checkbox" data-toggle="button">&nbsp;</button>
                                                    </div>
                                                    <label>nome 001</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- TAB PANE #4 - END -->
                <div class="tab-pane" id="account_tab_pane5">
                	<div class="account-content">
                        <ul class="policy-list btn-group" data-toggle="buttons-radio">
                            <?php foreach ($policies as $policy): ?>
                                <li>
                                    <div class="input-box">
                                        <button onclick="choosePolicy(this)"  type="button" <?php  ?> value="<?php echo $policy->id ?>" class="btn btn-radio <?php echo (($model->isNewRecord === false) && ($model->rooms[0]->policy == $policy->id) ? 'active' : '')?>" data-toggle="button">&nbsp;</button>
                                    </div>
                                    <div class="desc-box">
                                        <h2><?php echo $policy->name ?></h2>
                                        <p><?php echo $policy->description ?></p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                                <input type="hidden" name="Room[policy]" id="fPolicy"  />
                        </ul>
                        <hr/>
                        <ul class="policy-list btn-group" data-toggle="buttons-checkbox">
                            <li>
                                <div class="input-box">
                                    <button type="button" value="0" class="btn btn-checkbox">&nbsp;</button>
                                </div>
                                <div class="desc-box">
                                    <h2>tariffa prepagata non rimborsabile</h2>
                                    <p>E  possibile per il "viaggiatore" annullare la prenotazione effettuata entro 10gg dalla data del check-in. In caso di superamento di tale termine o in caso di no-show la struttura prelevera un importo pari al costo della prima notte.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div><!-- TAB PANE #5 - END -->
                <div class="tab-pane" id="account_tab_pane6">
                	<div class="account-content">
                        <ul class="form-list">
                            <li class="fields">
                                <h2 class="legend">anagrafica</h2>
                                <p>Inserisci i dati della persona responsabile.</p>
                            </li>
                            <li class="fields set2">
                                <div class="field">
                                    <label>Selezione</label>
                                    <div class="input-box">
                                        <?php echo $form->dropDownList($billing,'salutation', Statics::getSalutations(), array('class' => 'selectbox medium')) ?>
                                    </div>
                                </div>
                            </li>
                            <li class="fields set2">
                                <div class="field">
                                    <label>Nome</label>
                                    <div class="input-box">
                                        <?php echo $form->textField($billing,'first_name', array('class' => 'input-field medium')); ?>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Cognome</label>
                                    <div class="input-box">
                                        <?php echo $form->textField($billing,'last_name', array('class' => 'input-field medium')); ?>
                                    </div>
                                </div>
                            </li>
                            <li class="fields set2">
                                <div class="field">
                                    <label>Email</label>
                                    <div class="input-box">
                                        <?php echo $form->textField($billing,'email', array('class' => 'input-field medium')); ?>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Citta</label>
                                    <div class="input-box">
                                        <?php echo $form->textField($billing,'city', array('class' => 'input-field medium')); ?>
                                    </div>
                                </div>
                            </li>
                            <li class="fields set2">
                                <div class="field">
                                    <label>Indirizzo</label>
                                    <div class="input-box">
                                        <?php echo $form->textField($billing,'address', array('class' => 'input-field medium')); ?>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Cap / zip code</label>
                                    <div class="input-box">
                                        <?php echo $form->textField($billing,'zip_code', array('class' => 'input-field medium')); ?>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr/>
                            </li>
                            <li class="fields paypal-fix">
                                <h2>carte di credito</h2>
                                <p>Inserisci i dati del tuo account paypal o SEPA.</p>
                                <div class="field">
                                    <div class="paypal-box">
                                        <img src="img/bb_paypal-logo.png" alt="paypal" />
                                    </div>
                                    <label>Inserisci l'e-mail</label>
                                    <div class="input-box">
                                        <input type="text" value="Lorem ipsum dolor sit amet" class="input-field medium">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dotted" />
                            </li>
                            <li>
                                <h2>addebito diretto sepa</h2>
                            </li>
                            <li class="fields set2">
                                <div class="field">
                                    <label>Intestatario conto corrente</label>
                                    <div class="input-box">
                                        <input type="text" value="Lorem ipsum dolor sit amet" class="input-field medium">
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Iban</label>
                                    <div class="input-box">
                                        <input type="text" value="Lorem ipsum dolor sit amet" class="input-field medium">
                                    </div>
                                </div>
                                <div class="form-action text-center">
                                    <div class="button-sets">
                                        <button class="button">
                                            <span>
                                                <span>
                                                    Create Property
                                                </span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div><!-- TAB PANE #6 - END -->
                <ul class="pager wizard">
                    <li class="next"><a href="javascript:void(0);">next step <i class="icon-home icon-white"></i></a></li>
                </ul>
			</div>
        </div>
    </div>
<?php $this->endWidget(); ?>
</section><!-- SECTION - END -->