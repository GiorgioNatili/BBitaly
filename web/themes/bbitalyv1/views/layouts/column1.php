<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div class="menu-nav-container">
    	<div class="container">
            <ul class="menu-nav text-center">
                <li class="<?php echo Statics::addActiveMenu('users') ?>">
                    <a href="/users/update/<?php echo Yii::app()->user->id ?>">
                        <i class="icon-adjust"></i>
                        <br>
                        Personal Data
                        <span class="arrow-n">&nbsp;</span>
                    </a>
                </li>
                <li class="<?php echo Statics::addActiveMenu('favorites') ?>">
                    <a href="/favorites">
                        <i class="icon-adjust"></i>
                        <br>
                        Favorites
                        <span class="arrow-up">&nbsp;</span>
                    </a>
                </li>
                <li class="<?php echo Statics::addActiveMenu('itinerary') ?>">
                	<a href="/itinerary">
                        <i class="icon-adjust"></i>
                        <br>
                        Routes
                        <span class="arrow-up">&nbsp;</span>
                    </a>
                </li>
                <li  class="<?php echo Statics::addActiveMenu('booking') ?>">
                	<a href="/booking">
                        <i class="icon-adjust"></i>
                        <br>
                        Reservations
                        <span class="arrow-up">&nbsp;</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
<div id="content">
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>