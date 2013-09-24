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
                        array('label' => '<i class="icon-adjust"></i><br /> Account<span class="arrow-n">&nbsp;</span>','url' => '/users/update/'. Yii::app()->user->id, 'visible'=> !Yii::app()->user->isGuest ),
                        array('label' => '<i class="icon-adjust"></i><br /> Favorites<span class="arrow-up">&nbsp;</span>','url' => '/favorites', 'visible'=> Yii::app()->user->checkAccess('traveler') ),
                        array('label' => '<i class="icon-adjust"></i><br /> Itinerary<span adjust="arrow-n">&nbsp;</span>','url' => '/itinerary', 'visible'=> Yii::app()->user->checkAccess('traveler') ),
                        array('label' => '<i class="icon-adjust"></i><br /> Booking<span adjust="arrow-up">&nbsp;</span>','url' => '/booking', 'visible'=> Yii::app()->user->checkAccess('traveler') ),
                        array('label' => '<i class="icon-adjust"></i><br /> Accommodations<span adjust="arrow-u">&nbsp;</span>','url' => '/property', 'visible'=> Yii::app()->user->checkAccess('owner') ),
                        array('label' => '<i class="icon-adjust"></i><br /> Bookings<span adjust="arrow-up">&nbsp;</span>','url' => '/booking', 'visible'=> Yii::app()->user->checkAccess('owner') ),
                        array('label' => '<i class="icon-adjust"></i><br /> Availability<span adjust="arrow-up">&nbsp;</span>','url' => '/availability', 'visible'=> Yii::app()->user->checkAccess('owner') ),
                        array('label' => '<i class="icon-adjust"></i><br /> Invoices<span adjust="arrow-up">&nbsp;</span>','url' => '/availability/payroll', 'visible'=> Yii::app()->user->checkAccess('owner') ),
                        array('label' => '<i class="icon-adjust"></i><br /> Property<span adjust="arrow-up">&nbsp;</span>','url' => '/property/admin', 'visible'=> Yii::app()->user->checkAccess('admin') ),
                        array('label' => '<i class="icon-adjust"></i><br /> Room<span adjust="arrow-up">&nbsp;</span>','url' => '/room/admin', 'visible'=> Yii::app()->user->checkAccess('admin') ),
                        array('label' => '<i class="icon-adjust"></i><br /> Favorites<span adjust="arrow-up">&nbsp;</span>','url' => '/favorites/admin', 'visible'=> Yii::app()->user->checkAccess('admin') ),
                        array('label' => '<i class="icon-adjust"></i><br /> Itinerary<span adjust="arrow-up">&nbsp;</span>','url' => '/itinerary/admin', 'visible'=> Yii::app()->user->checkAccess('admin') ),
                        array('label' => '<i class="icon-adjust"></i><br /> Booking<span adjust="arrow-up">&nbsp;</span>','url' => '/booking/admin', 'visible'=> Yii::app()->user->checkAccess('admin') ),
                        array('label' => '<i class="icon-adjust"></i><br /> Financials<span adjust="arrow-up">&nbsp;</span>','url' => '/availability/payroll', 'visible'=> Yii::app()->user->checkAccess('admin') ),
                        array('label' => '<i class="icon-adjust"></i><br /> Policy<span adjust="arrow-up">&nbsp;</span>','url' => '/policies/admin', 'visible'=> Yii::app()->user->checkAccess('admin') ),
                    ),
                ));
                ?>
        </div>
    </div>
<div id="content">
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>