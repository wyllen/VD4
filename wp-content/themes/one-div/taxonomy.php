<?php get_header(); ?>

	<div id="content">

		<?php get_sidebar(); ?>	

		<?php
$i=0;
			if(have_posts()) : while(have_posts()) : the_post();			

?>	

		

			<div class="one_div_item <?php $i++;if($i%6== 0){echo 'endline';}?>">

				

				<div class="votes"><?php if(function_exists('the_ratings')) { the_ratings(); } ?></div>

				
<a href="<?php echo get_permalink(); ?>">
				<div class="picto">

					<div class="picto_wrapper">						

						<?php

							$html= get_post_meta($post->ID,'_html_code',true);		

							$html= htmlspecialchars_decode($html)	;		

							$html_copy=$html;

							$html = preg_replace('/([class|id])=["|\']([a-zA-Z0-9_]*)["|\']/','${1}="${2}'.$post->ID.'"', $html);

						echo $html;  ?>

						<style type="text/css">	

						<?php $css= get_post_meta($post->ID,'_css_code',true); 

								$css= str_replace("&#039;", "'", $css);

								$css= str_replace("&quot;", "\"", $css);

								$css_copy=$css;

							   $css = preg_replace('/([#.])([_a-zA-Z0-9]*)([^"em";]*[{|::])/','$1${2}'.$post->ID.'${3}', $css);

								echo $css;

								?>

						</style>

						<textarea name="code_css" id="code_css_<?php echo $post->ID; ?>" style="display:none"><?php echo $css_copy; ?></textarea>

						<textarea name="code_html" id="code_html_<?php echo $post->ID; ?>" style="display:none"><?php echo  $html_copy; ?></textarea>

					</div>

				</div>
</a>
				<a href="" class="button_code html" id="button_html_<?php echo $post->ID; ?>" title="<?php echo $post->ID; ?>">HTML</a>

				<a href="" class="button_code css"  id="button_css_<?php echo $post->ID; ?>" title="<?php echo $post->ID; ?>">CSS</a>

				<a href="<?php bloginfo('template_url'); ?>/codes/<?php echo $post->ID ?>/<?php echo $post->ID ?>.zip" class="button_code zip">ZIP</a>

	<?php
			$chrome=get_post_meta($post->ID,'_chrome_compa',true);			
			$firefox=get_post_meta($post->ID,'_firefox_compa',true);
			$safari=get_post_meta($post->ID,'_safari_compa',true);
			$opera=get_post_meta($post->ID,'_opera_compa',true);
			$ie=get_post_meta($post->ID,'_ie_compa',true);
			?>
			<div class="compatibility">
				<div class="chrome_compa"><?php if(isset($chrome)){ ?><div class="compa<?php echo $chrome ?>"></div> <?php }else{ ?><div class="compa3"></div> <?php } ?></div>
				<div class="firefox_compa"><?php if(isset($firefox)){ ?><div class="compa<?php echo $firefox ?>"></div> <?php }else{ ?><div class="compa3"></div> <?php } ?></div>
				<div class="safari_compa"><?php if(isset($safari)){ ?><div class="compa<?php echo $safari ?>"></div> <?php }else{ ?><div class="compa3"></div> <?php } ?></div>
				<div class="opera_compa"><?php if(isset($opera)){ ?><div class="compa<?php echo $opera ?>"></div> <?php }else{ ?><div class="compa3"></div> <?php } ?></div>
				<div class="ie_compa"><?php if(isset($ie)){ ?><div class="compa<?php echo $ie ?>"></div> <?php }else{ ?><div class="compa3"></div> <?php } ?></div>
			</div>
			

				</div>

			<?php

			endwhile;endif;

			?>

			

			

			

			<div class="clear"></div>		



		</div>

<?php get_footer(); ?>