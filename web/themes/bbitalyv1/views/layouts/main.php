<?php 
$theme = Yii::app()->theme->baseUrl; 
$asset = $theme.'/assets/';

?>
<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Welcome to BBitaly</title>
<!-- InstanceEndEditable -->
<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo $asset ?>css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="<?php echo $asset ?>css/bootstrap.base.css" media="screen">
	<link rel="stylesheet" href="<?php echo $asset ?>css/bootstrap.icons.css" media="screen">

    <!-- Optional theme -->
    <link rel="stylesheet" href="<?php echo $asset ?>css/bootstrap-theme.min.css">
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script src="<?php echo $asset ?>js/jquery-1.8.2.js"></script>
    <script src="<?php echo $asset ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $asset ?>js/bootstrap.custom.js"></script>
    <script src="<?php echo $asset ?>js/gmap3.min.js"></script>

    <!--[if lt IE 9]>  
    <script src="js/html5.js"></script>  
    <![endif]-->  
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>
<body>
<header>
    <div class="navbar">
      <div class="navbar-inner">
        <div class="container">
            <a href="/" class="brand"><img src="<?php echo $asset ?>img/bb_logo.png" alt="bbitaly" /></a>
            <div class="nav-mid">
                
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'skin' => 'bbitalyv1',
                    'encodeLabel'=>false,
                    'htmlOptions' => array('class' =>'nav'),
                    'items'=>array(
                        array('label' => '<i class="icon-briefcase"></i> Account','url' => '/users/update/'. Yii::app()->user->id, 'visible'=> ! Yii::app()->user->isGuest ),
                        array('label' => '<i class="icon-lock"></i> Logout','url' => '/site/logout', 'visible'=> ! Yii::app()->user->isGuest ),
                        array('label' => '','template'=> 
                            '<a href="#"
                            id="popover_login" 
                            data-placement="bottom" 
                            rel="popover" 
                            data-html="true" '.
                            'data-content=\'<ul class="form-list">'.
                            '<form method="POST" action="/site/login">'.
                            '<li>
                                <label>email</label>
                                <div class="input-box">
                                    <input type="text" placeholder="Email?" name="LoginForm[email]" class="input-field small" value="" />
                                </div>
                            </li>
                            <li>
                                <label>password</label>
                                <div class="input-box">
                                    <input type="password" placeholder="Your Password?" name="LoginForm[password]" class="input-field small" />
                                </div>
                            </li>
                            <li class="a-center">
                                <div class="button-sets">
                                    <button class="button login-btn" type="submit">
                                        <span><span>accedi</span></span>
                                    </button>
                                </div>
                                <p><a href="#">hai dimenticato la password?</a></p>
                            </li>'.
                            '</form></ul>\'><i class="icon-user"></i> Accedi</a>'
                        ,'itemOptions' => array('class' => 'popover-login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'<i class="icon-pencil"></i> Register', 'url'=>array('users/join'), 'visible'=>Yii::app()->user->isGuest),
                        array(
                            'itemOptions ' => array('class' => 'dropdown'),
                            'label' => 'llanguage', 
                            'template' =>
                                '<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-flag"></i> select language</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">langugae 1</a></li>
                                    <li><a href="#">langugae 2</a></li>
                                </ul>	'),
                    ),
                ));
                ?>
            </div>
            
            <div class="social-share pull-right">
                <a href="#"><img src="<?php echo $asset ?>img/bb_social-links.png" alt="" /></a>
            </div>
        </div>
      </div>
    </div>
</header><!-- HEADER - END -->
<?php
$flashes = Yii::app()->user->getFlashes();
if ( $flashes ):
?>
<div style="padding: 10px;">
    <?php
            foreach( $flashes as $key => $message) { ?>
                <div class="alert alert-block alert-<?php echo $key ?>">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4><?php echo ucfirst($key) ?></h4>
                    <?php echo $message ?>
                </div>
        <?php    }
        ?>
</div>

<?php endif; ?>
<?php echo $content ?>
<div class="breadcrumbs">
    <ul class="container">
        <li>
            <a href="#">Home</a>
            <span>/</span>
        </li>
        <?php 
        if ( isset($this->breadcrumbs) ):
            foreach ($this->breadcrumbs as $breadcrumb ): ?>
                <strong><?php echo $breadcrumb ?></strong>
            <?php endforeach;
        endif;
        ?>
    </ul>
</div>
<footer>
	<div class="container">
    	<div class="row">
        	<div class="span4">
            	<div class="copyright">
	            	<address>Copyright &copy; 2012 bedebreakfastinitaly.com &trade; <br>Tutti i diritti riservati.</address>
                    <a href="#">web agency napoli</a>
                </div>
            </div>
            <div class="span4">
            	<div class="social-links">
                	<a href="#"><i class="icon-facebook icon-white"></i></a>
                    <a href="#"><i class="icon-googleplus icon-white"></i></a>
                    <a href="#"><i class="icon-twitter icon-white"></i></a>
                    <a href="#"><i class="icon-pinterest icon-white"></i></a>
                </div>
            </div>
            <div class="span4">
            	<div class="nav">
                	<ul class="quick-links">
                    	<li><a href="#">About</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Contacts</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer><!-- FOOTER - END -->
</body>
<!-- InstanceEnd --></html>