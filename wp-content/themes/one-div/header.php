<!DOCTYPE HTML>

<html lang="fr">

<head>

	<meta charset="UTF-8">

	<meta name="title" content="One div - The single element HTML/CSS icon database">

	

	<meta name="keywords" content="single,element, HTML, CSS, icon, pictos, database">

	<title><?php wp_title(''); ?></title>	

		<?php wp_head(); ?>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/16x16.ico" />

	<script type="text/javascript">



  var _gaq = _gaq || [];

  _gaq.push(['_setAccount', 'UA-36511857-1']);

  _gaq.push(['_trackPageview']);



  (function() {

    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

  })();



</script>

<!--	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script> -->

		<script src="<?php bloginfo('template_url'); ?>/js/jquery.zclip.min.js"></script> 

	</head>



		

	

<body>

		<header id="header">

		<div id="logo">

			<a href="<?php echo home_url( '/' ); ?>" id="logo"><span class="pink chevron1"><</span><span class="baseline">
			<?php if (is_singular('pictos') || is_author()){ ?>
				<div class="onediv_baseline">The single element HTML/CSS icon database</div>				
			<?php
			}else{ ?>
			<h1>The single element HTML/CSS icon database</h1>			
			<?php }?>
			</span><span class="pink chevron2">></span>ne div</a> <br />

		</div>

		<nav id="header_menu">

		<?php wp_nav_menu( array('menu' => 'Menu' )); ?>

		<div class="menu-menu-container">
			<ul id="menu-menu" class="menu">
				<li id="menu-item-137" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-137"><a target="_blank" onclick="_gaq.push(['_trackEvent', 'Donate', 'donate']);" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=7UJ965EU225TC">Donate</a></li>
			</ul>
		</div>

		<?php

if ( is_user_logged_in() ) {

    echo '<div class="power logged"></div>	';

} else {

    echo '<div class="power"></div>	';

}

?>



			

		<div class="login_ajax"><?php login_with_ajax() ?></div>

		</nav>

		<div class="clear"></div>		

		</header>

	



		<!-- AddThis Button BEGIN -->