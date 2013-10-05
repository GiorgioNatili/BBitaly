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
                <div class="main-calendar">
                    <div class="mc-head c-days">
                            <div class="cell">lunedi</div>
                        <div class="cell">martedi</div>
                        <div class="cell">mercoledi</div>
                        <div class="cell">giovedi</div>
                        <div class="cell">venerdi</div>
                        <div class="cell">sabato</div>
                        <div class="cell">domenica</div>                                        	
                    </div>
                    <div class="mc-body c-dates">
                            <div class="cell blank">
                            &nbsp;
                        </div>
                        <div class="cell blank">
                            &nbsp;
                        </div>
                        <div class="cell available">
                            <div class="date">1</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">2</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">3</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">4</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">5</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">6</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">7</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">8</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">9</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">10</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">11</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">12</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">13</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">14</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">15</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">16</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">17</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">18</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">19</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">20</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">21</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">22</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">23</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">24</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">25</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">26</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell available">
                            <div class="date">27</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="" />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1">
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell booked">
                            <div class="date">28</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="9999,00 &euro;" disabled />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1" disabled />
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell booked">
                            <div class="date">29</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="9999,00 &euro;" disabled />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1" disabled />
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell booked">
                            <div class="date">30</div>
                            <div class="input-box">
                                    <input type="text" class="input-field small" value="9999,00 &euro;" disabled />
                            </div>
                            <div class="input-box">
                                    <input type="checkbox" class="checkbox" value="1" disabled />
                                    <label>Offerta</label>
                            </div>
                        </div>
                        <div class="cell blank">
                                &nbsp;
                        </div>
                        <div class="cell blank">
                                &nbsp;
                        </div>
                        <div class="cell blank">
                                &nbsp;
                        </div>
                    </div>
                </div>
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