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

    <!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo $asset ?>js/jquery-1.8.2.js"></script>
    <script src="<?php echo $asset ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $asset ?>js/bootstrap.custom.js"></script>

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
            <a href="index.html" class="brand"><img src="<?php echo $asset ?>img/bb_logo.png" alt="bbitaly" /></a>
            <div class="nav-mid">
                <ul class="nav">
                    <li><a href="#"><i class="icon-user"></i> Log In</a></li>
                    <li><a href="#"><i class="icon-pencil"></i> Register</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-flag"></i> select language</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">langugae 1</a></li>
                            <li><a href="#">langugae 2</a></li>
                        </ul>	
                    </li>
                </ul>
            </div>
            <div class="social-share pull-right">
                <a href="#"><img src="<?php echo $asset ?>img/bb_social-links.png" alt="" /></a>
            </div>
        </div>
      </div>
    </div>
</header><!-- HEADER - END -->
<?php echo $content ?>
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