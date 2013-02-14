<?php get_header(); ?>


<?php get_template_part( 'blog' ); ?>
<?php get_template_part( 'contact' ); ?>
<?php get_template_part( 'about' ); ?>

<?php wp_reset_query(); ?>
<section id="<?php the_slug();?>" class="realisations single_rea">
	<div class="sectionheader"><h1><?php the_title(); ?></h1></div>
	<article>
		<div class="rea_preview">
			  <?php $image= get_images_src('original',false,$post->ID); ?>
			   <img src="<?php echo $image['image1'][0]; ?>"  class="imgrea" alt="">
		</div>
		<?php 		 
		the_content(); ?>
	</article>
</section>

<?php get_template_part( 'realisations' ); ?>
<?php get_template_part( 'lab' ); ?>
	

<?php get_footer(); ?>