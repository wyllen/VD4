<section id="contact">
<div class="sectionheader">	<h1><?php _e( 'Contact', 'vd' ); ?></h1><div class="mail2"></div>	</div>
	<article><?php

			$contact = new WP_Query('page_id=16'); 
            if($contact->have_posts()) : $contact-> the_post();
            the_content();

            endif;
            ?>
		
		<label for="checkcontact" class="boxbutton contactbutton"><div class="mail"></div></label><input id="checkcontact" type="checkbox">
		<div class="contactform">
			<?php echo do_shortcode('[contact-form-7 id="57" title="Contact"]'); ?>
		</div>
	</article>
</section>