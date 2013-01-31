<section id="realisations">
<div class="sectionheader">	<h1><?php _e( 'Réalisations', 'vd' ); ?></h1><div class="monitor"></div></div>
	<label for="checkrea" class="boxbutton reabutton">La suite!</label>
	<input id="checkrea" type="checkbox">
	<article>
		
		<ul id="list_rea">
		
		<?php

        $i=0; $reas = new WP_Query('post_type=realisations&posts_per_page=-1&order=DESC'); 

            if($reas->have_posts()) : while($reas->have_posts()) : $reas-> the_post();     

            $image= get_images_src('mid',false,$post->ID);     
//var_dump($image);
		?>  


		<li><a href="<?php the_permalink(); ?>"><img src="<?php echo $image['image1'][0]; ?>"  class="imgrea" alt=""></a></li>
		
            <?php

            endwhile;endif;

            ?>
	</ul>	
	</article>
</section>