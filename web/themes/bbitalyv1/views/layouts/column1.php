<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div class="menu-nav-container">
    	<div class="container">
            <?php
                $this->widget('zii.widgets.CMenu', array(
                    'skin' => 'bbitalyv1',
                    'encodeLabel'=>false,
                    'htmlOptions' => array('class' =>'menu-nav text-center'),
                    'items'=>array(
                        array('label' => '<i class="icon-account"></i><br>dati personali<span class="arrow-up">&nbsp;</span>','url' => '/users/update/'. Yii::app()->user->id, 'visible'=> !Yii::app()->user->isGuest ),
                        array('label' => '<i class="icon-favorites"></i><br>Favorites<span class="arrow-up">&nbsp;</span>','url' => '/favorites', 'visible'=> Yii::app()->user->checkAccess('traveler') ),
                        array('label' => '<i class="icon-itinerary"></i><br>Itinerary<span class="arrow-up">&nbsp;</span>','url' => '/itinerary', 'visible'=> Yii::app()->user->checkAccess('traveler') ),
                        array('label' => '<i class="icon-booking"></i><br>Reservations<span class="arrow-up">&nbsp;</span>','url' => '/booking', 'visible'=> Yii::app()->user->checkAccess('traveler') ),
                        
                        array('label' => '<i class="icon-favorites"></i><br>modifica struttura<span class="arrow-up">&nbsp;</span>','url' => '/property', 'visible'=> Yii::app()->user->checkAccess('owner') ),
                        array('label' => '<i class="icon-itinerary"></i><br>prenotazioni<span class="arrow-up">&nbsp;</span>','url' => '/booking', 'visible'=> Yii::app()->user->checkAccess('owner') ),
                        //array('label' => '<i class="icon-booking"></i><br>disponibilita<span class="arrow-up">&nbsp;</span>','url' => '/availability', 'visible'=> Yii::app()->user->checkAccess('owner') ),
                        array('label' => '<i class="icon-booking"></i><br>fatture<span class="arrow-up">&nbsp;</span>','url' => '/availability/payroll', 'visible'=> Yii::app()->user->checkAccess('owner') ),
                        
                        array('label' => '<i class="icon-accommodations"></i><br>struttura<span class="arrow-up">&nbsp;</span>','url' => '/property/admin', 'visible'=> Yii::app()->user->checkAccess('admin') ),
                        array('label' => '<i class="icon-itinerary"></i><br>camera<span class="arrow-up">&nbsp;</span>','url' => '/room/admin', 'visible'=> Yii::app()->user->checkAccess('admin') ),
                        array('label' => '<i class="icon-favorites"></i><br>Favorites<span class="arrow-up">&nbsp;</span>','url' => '/favorites/admin', 'visible'=> Yii::app()->user->checkAccess('admin') ),
                        array('label' => '<i class="icon-itinerary"></i><br>Itinerary<span class="arrow-up">&nbsp;</span>','url' => '/itinerary/admin', 'visible'=> Yii::app()->user->checkAccess('admin') ),
                        array('label' => '<i class="icon-booking"></i><br>Booking<span class="arrow-up">&nbsp;</span>','url' => '/availability/admin', 'visible'=> Yii::app()->user->checkAccess('admin') ),
                        //array('label' => '<i class="icon-invoices"></i><br>Invoice<span class="arrow-up">&nbsp;</span>','url' => '/availability/payroll', 'visible'=> Yii::app()->user->checkAccess('admin') ),
                        array('label' => '<i class="icon-invoices"></i><br>Services<span class="arrow-up">&nbsp;</span>','url' => '/services/admin', 'visible'=> Yii::app()->user->checkAccess('admin') ),
                        array('label' => '<i class="icon-tick-green"></i><br>Policy<span class="arrow-up">&nbsp;</span>','url' => '/policies/admin', 'visible'=> Yii::app()->user->checkAccess('admin') ),
                    ),
                ));
                ?>
        </div>
    </div>
<div id="content">
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>