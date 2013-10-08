<<<<<<< HEAD
<?php
/* @var $this AvailabilityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Room Availabilities',
);

$this->menu=array(
	array('label'=>'Create RoomAvailability', 'url'=>array('create')),
	array('label'=>'Manage RoomAvailability', 'url'=>array('admin')),
);
?>

<h1>Room Availabilities</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
=======
<section>
<!-- InstanceBeginEditable name="EditRegionSection" -->
    
	<div class="availability-container container">
    	<div class="row">
        	<div class="span12">
            	<ul class="availability-list" id="availability_accordion">
                	<li class="item accordion-group">
                    	<div class="availability-block col2-set">
                        	<div class="col1">
                            	<div class="count">01</div>
                                <div class="name">
                                	<h2>Nome della camera lorem ipsum</h2>
                                </div>
                            </div>
                            <div class="col2">
                            	<div class="input-box">
                                	<label>Prezzo di default</label>
                                    <input type="text" class="input-field small" value="" />
                                </div>
                                <div class="input-box">
                                	<label>Prezzo in offerta</label>
                                    <input type="text" class="input-field small" value="" />
                                </div>
                            </div>
                            <div class="availability-trigger">
	                            <a href="#availability_one" data-parent="#availability_accordion" data-toggle="collapse">&nbsp;</a>
                            </div>
                        </div>
                        <div class="collapse in" id="availability_one">
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
                    </li>
                    <li class="item accordion-group">
                    	<div class="availability-block col2-set">
                        	<div class="col1">
                            	<div class="count">01</div>
                                <div class="name">
                                	<h2>Nome della camera lorem ipsum</h2>
                                </div>
                            </div>
                            <div class="col2">
                            	<div class="input-box">
                                	<label>Prezzo di default</label>
                                    <input type="text" class="input-field small" value="" />
                                </div>
                                <div class="input-box">
                                	<label>Prezzo in offerta</label>
                                    <input type="text" class="input-field small" value="" />
                                </div>
                            </div>
                            <div class="availability-trigger">
	                            <a href="#availability_two" data-parent="#availability_accordion" data-toggle="collapse">&nbsp;</a>
                            </div>
                        </div>
                        <div class="collapse" id="availability_two">
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
                                            <div class="cell available">
                                            	<div class="date">2</div>
                                                <div class="input-box">
	                                                <input type="text" class="input-field small" value="9999,00 &euro;" />
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
                                            <div class="cell booked">
                                            	<div class="date">7</div>
                                                <div class="input-box">
	                                                <input type="text" class="input-field small" value="9999,00 &euro;" disabled />
                                                </div>
                                                <div class="input-box">
                                                	<input type="checkbox" class="checkbox" value="1" disabled />
                                                	<label>Offerta</label>
                                                </div>
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
                    </li>
                    <li class="item accordion-group">
                    	<div class="availability-block col2-set">
                        	<div class="col1">
                            	<div class="count">01</div>
                                <div class="name">
                                	<h2>Nome della camera lorem ipsum</h2>
                                </div>
                            </div>
                            <div class="col2">
                            	<div class="input-box">
                                	<label>Prezzo di default</label>
                                    <input type="text" class="input-field small" value="" />
                                </div>
                                <div class="input-box">
                                	<label>Prezzo in offerta</label>
                                    <input type="text" class="input-field small" value="" />
                                </div>
                            </div>
                            <div class="availability-trigger">
	                            <a href="#availability_three" data-parent="#availability_accordion" data-toggle="collapse">&nbsp;</a>
                            </div>
                        </div>
                        <div class="collapse" id="availability_three">
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
                                            <div class="cell available">
                                            	<div class="date">2</div>
                                                <div class="input-box">
	                                                <input type="text" class="input-field small" value="9999,00 &euro;" />
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
                                            <div class="cell booked">
                                            	<div class="date">7</div>
                                                <div class="input-box">
	                                                <input type="text" class="input-field small" value="9999,00 &euro;" disabled />
                                                </div>
                                                <div class="input-box">
                                                	<input type="checkbox" class="checkbox" value="1" disabled />
                                                	<label>Offerta</label>
                                                </div>
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
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section><!-- SECTION - END -->
>>>>>>> def2c902e2605700237265c6ff0100057658fafc
