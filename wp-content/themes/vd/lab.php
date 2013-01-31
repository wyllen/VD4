<section id="lab">
<div class="sectionheader">	<h1><?php _e( 'Le labo', 'vd' ); ?></h1><div class="beaker"></div></div>
	<label for="checklab" class="boxbutton labbutton">Plus!</label>
    <input id="checklab" type="checkbox">
    <article>
<?php

        $i=0; $labs = new WP_Query('post_type=labs&posts_per_page=-1&order=DESC'); 

            if($labs->have_posts()) : while($labs->have_posts()) : $labs-> the_post();     

            $image= get_images_src('full',false,$post->ID);     
//var_dump($image);
?>  
        <a  href="<?php echo get_post_meta($post->ID,'_laburl',true); ?>" target="_blank" class="lab_item">		
        <div class="hexagon hexagon2">
            <div class="hexagon-in1">
                <div class="hexagon-in2" style="background-image: url(<?php echo $image['image1'][0]; ?>);">                
                </div>
             </div>
         </div>
         </a>

            <?php

            endwhile;endif;

            ?>
            
       
	</article>
</section>