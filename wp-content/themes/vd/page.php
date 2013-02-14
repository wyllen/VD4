<?php get_header(); ?>

<section class="blog single_article">
	<div class="sectionheader"><h1><?php the_title(); ?></h1></div>
	<article>
		<?php the_content(); ?>
	</article>
</section>

<?php get_template_part( 'contact' ); ?>
<?php get_template_part( 'about' ); ?>
<?php get_template_part( 'realisations' ); ?>
<?php get_template_part( 'lab' ); ?>
	

<?php get_footer(); ?>