	<section id="blog" class="blog">
<div class="sectionheader"><h1><?php _e( 'Blog', 'vd' ); ?></h1><div class="newspaper"></div></div>	
	<?php 
    
        $args = array('post_type' => 'post','paged' => get_query_var( 'paged' ));
        $articles = new WP_Query($args); 
        
         if($articles->have_posts()) : while($articles->have_posts()) : $articles-> the_post();		
		?>
	<article class="blog_post">
		<div class="post_infos clearfix"><a href="<?php the_permalink(); ?>"><h2 class="post_title"><?php the_title(); ?></h2></a><div class="date"><span class="day"><?php the_time('d'); ?></span> <span class="month"><?php the_time('m'); ?></span><span class="year"><?php the_time('Y'); ?></span></div></div>
	 <?php the_excerpt(); ?> 
	</article>		
<?php	endwhile;
?>
   <div class="article_pagination"><?php  theme_pagination($articles);?></div>
<?php
endif;
?>				
</section>