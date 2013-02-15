<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo home_url( '/' ); ?>/wp-content/themes/vd/style.css" media="all">
	<!--[if IE]>
<link rel="stylesheet" type="text/css" href="<?php echo home_url( '/' ); ?>/wp-content/themes/vd/ie.css" media="all">
<script type="text/javascript" src="<?php echo home_url( '/' ); ?>wp-content/themes/vd/multi-column.js"></script>
<![endif]-->
	<meta charset="utf-8">
	<meta content='initial-scale=1; maximum-scale=1; user-scalable=0;' name='viewport'/>
	<title><?php wp_title(''); ?></title>	
	<?php wp_head(); ?>
	<!--[if lte IE 8]>
<script language="JavaScript" src="<?php echo home_url( '/' ); ?>/wp-content/themes/vd/js/html5.js"></script>
 <script language="JavaScript" src="<?php echo home_url( '/' ); ?>/wp-content/themes/vd/js/respond.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/16x16.ico" />
</head>
<body class="clearfix">
	<header id="header">
		<a href="<?php echo home_url( '/' ); ?>" class="logo"></a> <h1>Vincent Durand</h1>
		<div id="ancres">
			<ul>
				<li><a href="#blog" onclick="smoothScroll('blog');return false" class="ancre_blog"><div class="newspaper"></div></a></li>
				<li><a href="#contact" onclick="smoothScroll('contact');return false"  class="ancre_contact"><div class="mail2"></div></a></li>
				<li><a href="#about" onclick="smoothScroll('about');return false"  class="ancre_about"><div class="profil"></div></a></li>
				<li><a href="#realisations" onclick="smoothScroll('realisations');return false"  class="ancre_realisations"><div class="monitor"></div></a></li>
				<li><a href="#lab" onclick="smoothScroll('lab');return false"  class="ancre_lab"><div class="beaker"></div></a></li>
			</ul>
		</div>

		<a href="#header" class="ancre_top" id="backtop" onclick="smoothScroll('header');return false">
			<div class="arrowup"></div>
		</a>
	</header>

	