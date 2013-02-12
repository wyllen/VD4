<section id="about">
	<div class="sectionheader"><h1><?php _e( 'A propos', 'vd' ); ?></h1><div class="profil"></div>	</div>
	<article class="front">
		<div class="pres">
		<img src="<?php bloginfo('template_url'); ?>/images/profil.png" class="profilimg">
	<?php	$contact = new WP_Query('page_id=12'); 
            if($contact->have_posts()) : $contact-> the_post();
            the_content();

            endif;
            ?>
		</div>
		<label for="checkskills" class="boxbutton skillsbutton"><div class="tools"></div></label><input id="checkskills" type="checkbox">
		<div class="skills">
			<ul>
		<?php $labs = new WP_Query('post_type=skills&posts_per_page=-1&orderby=menu_order'); 

            if($labs->have_posts()) : while($labs->have_posts()) : $labs-> the_post();     
 ?>		
 <li <?php if($post->post_parent ){echo'class="skill_child"';} ?> > <?php the_title(); ?> <?php if (get_post_meta($post->ID,'_skill_level',false)>=0){echo '<div class="skill_lvl lvl'.get_post_meta($post->ID,'_skill_level',true).'"></div>';}; ?>  </li>

			<?php

            endwhile;endif;

            ?>
			</ul>
		</div>
	</article>
</section>
