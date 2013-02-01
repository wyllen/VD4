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
			<li>
				HTML
			</li>
			<li>CSS</li>
			<li>PHP</li>
			<li>SQL</li>
			<li>JS</li>
			</ul>
		</div>
	</article>
</section>
