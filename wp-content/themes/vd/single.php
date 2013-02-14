<?php get_header(); ?>

<section class="blog single_article">
	<div class="sectionheader"><h1><?php the_title(); ?></h1></div>
	<article>
<div class="post_infos clearfix"><div class="date"><span class="day"><?php the_time('d'); ?></span> <span class="month"><?php the_time('m'); ?></span><span class="year"><?php the_time('Y'); ?></span></div></div>

		<?php 
		 wp_reset_query();
		the_content(); ?>
	</article>
</section>

<?php get_template_part( 'contact' ); ?>
<?php get_template_part( 'about' ); ?>
<?php get_template_part( 'realisations' ); ?>
<?php get_template_part( 'lab' ); ?>
	

<?php get_footer(); ?>