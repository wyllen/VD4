<?php get_header(); ?>

	<div id="content">

	<?php get_sidebar();

echo'<div id="page_content">';
		if(have_posts()) : while(have_posts()) : the_post();

		the_content();	

		endwhile;endif;

echo'</div>';

		?>	

		</div>

<?php get_footer(); ?>