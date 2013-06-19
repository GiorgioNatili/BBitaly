<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>


  <div id="wrapper">
  <div id="header-bg">
 
  <div id="navigation">
  
  <div class="usefullinks">
  <div class="logo_img">
  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
  <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
  </a>
  </div>
  <div class="header-align">
      <ul class="ul-header">
      <li class="login-utente">
      <a href="#">Accedi</a>
      </li>
      <li class="login-albergatore">
      <a href="#">Registrati</a>
      </li>
	  <li class="Selectlang">
      <a id="lang-menu-item" href="#">select language</a>
      </li>
	  
	  
      
      </ul>
      
				
					
	
	</div>
	<div class="socila-icons">
	
	<?php print render($page['header']); ?>
	</div>
	</div>
	
	
	
	
	</div> 
	</div>
  </div>
  
  
  
  
  <div id="page-wrapper">
  
  
    <div id="sidebar"><?php if($page['sidebar_first']) { print render($page['sidebar_first']); } ?></div>
	
    <div id="content">
	
      <?php // print $messages; ?>
	  
      <h1><?php if($title) { print $title; } ?></h1>
      <div class="tabs"><?php if ($tabs) { print render($tabs); } ?></div>
      <?php print render($page['help']); ?>
      <ul class="action-links"><?php if($action_links) { print render($action_links); } ?>
	  </ul>
	   <?php print render($page['content']); ?>
	  <div id="newsearch">
        <div>
            <span id="claim">Il tuo bed and breakfast in Italia! </span><br />
            <span id="summary">Qui troverai la vacanza che cercavi tra le 999.000 località e  le 999.000 strutture ricettive.</span><br />
        </div>
        <div class=" form clearfix">
            <form action="#" method="post" class="clearfix">
                <div class="item inline text"><input  type="text" name="location" class="location" placeholder="Cerca la località"/></div>
                <div class="item inline checkin"><input  type="text" name="checkin" class="datepicker checkin" value="checkin"/></div>
                <div class="item inline checkout"><input  type="text" name="checkout" class="datepicker checkout" value="checkout"/></div>
                <div class="item inline persons">
                    <div class="holder">
                        <div class="selectHolder">Persone</div>
                        <select name="persons">
						
						<?php
						
							for ($i=1;$i<=6;$i++) {
								echo "<option value='$i'>$i</option>";
							}
						
						?>

                                                    </select>
                    </div>
                </div>
                <div class="item sub">
                    <input type="submit"/>
                </div>
            </form>
        </div>
    </div>
    
	  
	 
    </div>
  </div>
  
  
  
  
  <div id="wrappers">
<div class="contents">
<a href="">
<div class="frst">
<img alt="" src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/ltinerari-icon.png"/>
<h2>Itinerari consigliati</h2>
</div>
</a>


<a href="">
<div class="frst" style="border:none;">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/bb-in-icon.png" alt=""/>
<h2 class="text">B&amp;B in evidenza</h2>
</div>
</a>
<a href="">
<div class="frst" style="border:none;">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/bb-piu-icon.png" alt=""/>
<h2 class="text">B&amp;B piu popolari</h2>
</div>
</a>
</div>
</div>
<div id="wrapper2">

<div class="content1">

<a href="">

<div class="images">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/blog_image_1.png" alt=""/>
</div>
<div class="back">
<div class="middle"></div>
<div class="date">

<h2 class="nome">Nome dell'itinerario 001
</h2>
<p class="dal">da1:<b>12/09/2012</b> al:<b>20/09/2012</b><br/>
<b>999 </b>structure prenotate</p>
</div>
<div class="icon1">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/image-r-arrow-icon.png" alt=""/>
</div>
</div>
<div class="right"></div></a>
</div>


<div class="content2">
<a href="">
<div class="images">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/blog_image_2.png" alt=""/>
</div>
<div class="back1">
<div class="date">

<h2 class="nome">Nome dell'itinerario 001
</h2>
<p class="dal">da1:<b>12/09/2012</b>al:<b>20/09/2012</b><br/>
<b>999</b> structure prenotate</p>
</div>
<div class="icon1">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/image-r-arrow-icon.png" alt=""/>
</div>
</div></a>
</div>


<div class="content2">
<a href="">
<div class="images">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/blog_image_3.png" alt=""/>
</div>
<div class="back1">
<div class="date">

<h2 class="nome">Nome dell'itinerario 001
</h2>
<p class="dal">da1:<b>12/09/2012</b> al:<b>20/09/2012</b><br/>
<b>999</b> structure prenotate</p>
</div>
<div class="icon1">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/image-r-arrow-icon.png" alt=""/>
</div>
</div></a>
</div>

<div class="content2">
<a href="">
<div class="images">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/blog_image_4.png" alt=""/>
</div>
<div class="back1">
<div class="date">

<h2 class="nome">Nome dell'itinerario 001
</h2>
<p class="dal">da1:<b>12/09/2012</b> al:<b>20/09/2012</b><br/>
<b>999</b> structure prenotate</p>
</div>
<div class="icon1">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/image-r-arrow-icon.png" alt=""/>
</div>
</div></a>
</div>



<div class="content2">
<a href="">
<div class="images">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/blog_image_5.png" alt=""/>
</div>
<div class="back1">
<div class="date">

<h2 class="nome">Nome dell'itinerario 001
</h2>
<p class="dal">da1:<b>12/09/2012</b> al:<b>20/09/2012</b><br/>
<b>999</b> structure prenotate</p>
</div>
<div class="icon1">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/image-r-arrow-icon.png" alt=""/>
</div>
</div></a>
</div>
<div class="content3">
<p class="conti">Sfoglia altri contenuti...</p>
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/down-arrow-icon.png" alt=""/>

</div>

<div class="room">

<!--
<div class="room2">
<a href="">
<div class="room3">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/content_display_image_1.png" alt=""/>
</div></a>
<div class="button">
<div class="press">
<div class="likeicon">
<div class="praes"><img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/praes-icon.png" alt=""/></div>
<div class="para"><p>999,00 &euro;</p></div>
</div>
<div class="likeicon1">
<div class="praes">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/like-icon.png" alt=""/>
</div>
<div class="para1">
<p>78</p>

</div>
</div>
</div>
</div>
<div class="box">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/frattamaggiore-titel-actev-box-bg.png" alt=""/>
</div>
<div id="copyicon">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/frattamaggiore-icon - Copy.png" alt=""/>

</div>

<div class="text3">Frattamaggiore localita molto lunga /Napoli
</div>
</div>-->
<div class="room_gallery" style="float:left;">
<a href="">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/content_display_image_1.png" alt=""/>
</a><div class="button1">
<div class="press">
<div class="likeicon">
<div class="praes"><img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/praes-icon.png" alt=""/></div>
<div class="para"><p>999,00 &euro;</p></div>
</div>
<div class="likeicon1">
<div class="praes">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/like-icon.png" alt=""/>
</div>
<div class="para1">
<p>78</p>

</div>
</div>
</div>
</div>
<div class="box1">
<p>Nome della struttura ricettiva molto lungo lunghissimo</p>
</div>
<div class="copyicon">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/frattamaggiore-icon-copy.png" alt=""/>

</div>
<div class="text3">Frattamaggiore localita molto lunga /Napoli
</div>
</div>

<div class="room_gallery">
<a href="">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/content_display_image_2.png" alt=""/>
</a><div class="button1">
<div class="press">
<div class="likeicon">
<div class="praes"><img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/praes-icon.png" alt=""/></div>
<div class="para"><p>999,00 &euro;</p></div>
</div>
<div class="likeicon1">
<div class="praes">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/like-icon.png" alt=""/>
</div>
<div class="para1">
<p>78</p>

</div>
</div>
</div>
</div>
<div class="box1">
<p>Nome della struttura ricettiva molto lungo lunghissimo</p>
</div>
<div class="copyicon">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/frattamaggiore-icon-copy.png" alt=""/>

</div>
<div class="text3">Frattamaggiore localita molto lunga /Napoli
</div>
</div>

</div>


<!-- scd-->


<div class="room">


<div style="float:left;" class="room_gallery">
<a href="">

<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/content_display_image_3.png" alt=""/>
</a>
<div class="button1">
<div class="press">
<div class="likeicon">
<div class="praes"><img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/praes-icon.png" alt=""/></div>
<div class="para"><p>999,00 &euro;</p></div>
</div>
<div class="likeicon1">
<div class="praes">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/like-icon.png" alt=""/>
</div>
<div class="para1">
<p>78</p>

</div>
</div>
</div>
</div>
<div class="box1">
<p>Nome della struttura ricettiva molto lungo lunghissimo</p>
</div>
<div class="copyicon">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/frattamaggiore-icon-copy.png" alt=""/>

</div>
<div class="text3">Frattamaggiore localita molto lunga /Napoli
</div>
</div>



<div class="room_gallery">
<a href=""><img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/content_display_image_4.png" alt=""/>
</a><div class="button1">
<div class="press">
<div class="likeicon">
<div class="praes"><img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/praes-icon.png" alt=""/></div>
<div class="para"><p>999,00 &euro;</p></div>
</div>
<div class="likeicon1">
<div class="praes">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/like-icon.png" alt=""/>
</div>
<div class="para1">
<p>78</p>

</div>
</div>
</div>
</div>
<div class="box1">
<p>Nome della struttura ricettiva molto lungo lunghissimo</p>
</div>
<div class="copyicon">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/frattamaggiore-icon-copy.png" alt=""/>

</div>
<div class="text3">Frattamaggiore localita molto lunga /Napoli
</div>
</div>
</div>


<div class="content5">
<p class="conti">Sfoglia altri contenuti...</p>
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/down-arrow-icon.png" alt=""/>

</div>

<!--3rd-->

<div class="room">
<!--
<div class="room2">
<div class="roomroom">
<a href=""><img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/content2_display_image_1.png" alt=""/>
</div></a>
<div class="red">

<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/red-color-rank-icon.png" alt=""/>
</div>
<div class="button2">
<div class="press">
<div class="likeicon">
<div class="praes"><img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/praes-icon.png" alt=""/></div>
<div class="para" style="border:none;"><p>999,00 &euro;</p>
</div>
</div>
</div>
</div>
<div class="box">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/red-color-titel-actev-box-bg.png" alt=""/>
</div>
<div class="copyicon">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/frattamaggiore-icon- copy.png" alt=""/>

</div>

<div class="text3">Frattamaggiore localita molto lunga /Napoli
</div>
</div>-->
<div class="redroom1" style="float:left;">
<a href="">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/content2_display_image_1.png" alt=""/>
</a>
<div class="heart">

<!--<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/red-color-rank-icon.png" alt=""/>-->
<div class="price">
78
</div>
</div>

<div class="button2">
<div class="press">
<div class="likeicon">
<div class="praes"><img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/praes-icon.png" alt=""/></div>
<div class="para" style="border:none;"><p>999,00 &euro;</p></div>
</div>
</div>
</div>
<div class="box2">
<p>Nome della struttura ricettiva molto lungo lunghissimo</p>
</div>
<div class="copyicon">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/frattamaggiore-icon-copy.png" alt=""/>

</div>
<div class="text3">Frattamaggiore localita molto lunga /Napoli
</div>
</div>




<div class="redroom1">
<a href="">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/content2_display_image_2.png" alt=""/>
</a>
<div class="heart">
<div class="price">
78
</div>

</div>
<div class="button2">
<div class="press">
<div class="likeicon">
<div class="praes"><img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/praes-icon.png" alt=""/></div>
<div class="para" style="border:none;"><p>999,00 &euro;</p></div>
</div>
</div>
</div>
<div class="box2">
<p>Nome della struttura ricettiva molto lungo lunghissimo</p>
</div>
<div class="copyicon">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/frattamaggiore-icon-copy.png" alt=""/>

</div>
<div class="text3">Frattamaggiore localita molto lunga /Napoli
</div>
</div>


</div>

<!--4rd-->

<div class="room">
<div style="float:left;" class="redroom1">
<a href="">
<div class="bedroom">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/content2_display_image_3.png" alt=""/>
</div>
</a>
<div class="heart">

<div class="price">
78
</div>
</div>
<div class="button2">
<div class="press">
<div class="likeicon">
<div class="praes"><img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/praes-icon.png" alt=""/></div>
<div class="para" style="border:none;"><p>999,00 &euro;</p></div>
</div>
</div>
</div>
<div class="box2">
<p>Nome della struttura ricettiva molto lungo lunghissimo</p>
</div>
<div class="copyicon">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/frattamaggiore-icon-copy.png" alt=""/>

</div>
<div class="text3">Frattamaggiore localita molto lunga /Napoli
</div>
</div>




<div class="redroom1">
<a href=""><div class="bedroom">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/content2_display_image_4.png" alt=""/>
</div></a>
<div class="heart">

<div class="price">
78
</div>
</div>
<div class="button2">
<div class="press">
<div class="likeicon">
<div class="praes"><img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/praes-icon.png" alt=""/></div>
<div class="para" style="border:none;"><p>999,00 &euro;</p></div>
</div>
</div>
</div>
<div class="box2">
<p>Nome della struttura ricettiva molto lungo lunghissimo</p>
</div>
<div class="copyicon">
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/frattamaggiore-icon-copy.png" alt=""/>

</div>
<div class="text3">Frattamaggiore localita molto lunga /Napoli
</div>
</div>


</div>




<div class="content4">
<p class="conti">Sfoglia altri contenuti...</p>
<img src="<?php $path = drupal_get_path('theme', 'bbitaly'); echo $path;?>/images/down-arrow-icon.png" alt=""/>

</div>
  
 
  
  </div>
  
  
  <!-- /.section, /#footer -->
	<div id="footer">
<div id="footer_wrap">
<div id="copyright">
<div class="foote-img">
&nbsp;
</div>
<div class="footer-con">
                        <section>
                            Copyright © 2012 BBItaly <sup>®</sup><br/>
                            Tutti i diritti riservati.<br/> 
                            <br /><a href="">web agency napoli</a>
                        </section>
                        
                        </div>
                    </div>
                    
                    <div id="social-pages">
<ul>
<li id="facebook-page">
<a href="https://www.facebook.com/pages/Bed-And-Breakfast-in-Italy/228921990498383" target="_blank" data-block="">
&nbsp;
</a>
</li>
<li id="googleplus-page">
<a href="https://plus.google.com/u/0/b/103711838752058855961/103711838752058855961/posts" target="_blank" data-block="">
&nbsp;
</a>
</li>
<li id="twitter-page">
<a href="https://twitter.com/BBItaly" target="_blank" data-block="">
&nbsp;
</a>
</li>
<li id="pinterest-page">
<a href="https://pinterest.com/bbitaly/" target="_blank" data-block="">
&nbsp;
</a>
</li>
</ul>
</div>
					
					<div id="list">
					<ul>
					
					<li><a href="#">Chi siamo</a></li>
					<li><a href="#">Termini e condizioni d'uso</a></li>
                    <li><a href="#">Privacys</a></li>
					<li><a href="#">Contatti</a></li>
					</ul>
					
					</div>
					
					
</div>
</div>
  
  

