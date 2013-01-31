	<section id="blog">
<div class="sectionheader"><h1><?php _e( 'Blog', 'vd' ); ?></h1><div class="newspaper"></div></div>	
	<?php 
		if(have_posts()) : while(have_posts()) : the_post();
		?>
	<article class="blog_post">
		<div class="post_infos clearfix"><h2 class="post_title"><?php the_title(); ?></h2><div class="date"><span class="day"><?php the_time('d'); ?></span> <span class="month"><?php the_time('m'); ?></span><span class="year"><?php the_time('Y'); ?></span></div></div>
	<?php the_content(); ?>
	</article>		
<?php	endwhile;endif;
		?>			
			<?php $args = array(
    'base'         => '%_%',
    'format'       => '?page=%#%',
    'total'        => 1,
    'current'      => 0,
    'show_all'     => False,
    'end_size'     => 1,
    'mid_size'     => 2,
    'prev_next'    => True,
    'prev_text'    => __('<'),
    'next_text'    => __('>'),
    'type'         => 'plain',
    'add_args'     => False )
    ; ?>
    
		<div class="article_pagination"><?php theme_pagination(); ?></div>
</section>