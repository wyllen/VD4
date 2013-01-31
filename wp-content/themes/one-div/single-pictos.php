<?php get_header(); ?>

	<div id="content">

		<?php get_sidebar(); ?>	

		

		<?php

			if (have_posts()) : the_post();	
		?>	

		<div id="picto_infos">
		
		
			
			<div class="picto">

					<div class="picto_wrapper">						

						<?php

							$html= get_post_meta($post->ID,'_html_code',true);		

							$html= htmlspecialchars_decode($html)	;		

							$html_copy=$html;

							$html = preg_replace('/([class|id])=["|\']([a-zA-Z0-9_]*)["|\']/','${1}="${2}'.$post->ID.'"', $html);
							//$html = preg_replace('/([class|id])=["|\']([a-zA-Z0-9_]*)["|\']>/','${1}="${2}'.$post->ID.'" >'.the_title('','',false), $html);

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
				
				<div class="picto_more">
				
					<h1><?php the_title(); ?></h1>
				
					<div class="picto_author">By <?php the_author_posts_link(); ?></div>
					
					<div class="picto_votes"><?php if(function_exists('the_ratings')) { the_ratings(); } ?></div>
						
					<div class="picto_sources">
					
						<a href="" class="button_code html" id="button_html_<?php echo $post->ID; ?>" title="<?php echo $post->ID; ?>" onclick="_gaq.push(['_trackEvent', 'HTML', '<?php the_title(); ?><?php echo $post->ID; ?>']);">HTML</a>

						<a href="" class="button_code css"  id="button_css_<?php echo $post->ID; ?>" title="<?php echo $post->ID; ?>" onclick="_gaq.push(['_trackEvent', 'CSS', '<?php the_title(); ?><?php echo $post->ID; ?>']);">CSS</a>

						<a href="<?php bloginfo('template_url'); ?>/codes/<?php echo $post->ID ?>/<?php echo $post->ID ?>.zip" class="button_code zip" onclick="_gaq.push(['_trackEvent', 'ZIP', '<?php the_title(); ?><?php echo $post->ID; ?>']);">ZIP</a>
					</div>
					
				</div>
				
				<div class="clear"></div>
				
			
		</div>


		<div id="picto_related">
		
		<?php

		//$args['fields'] = 'all';

		//var_dump($post->ID);
		$terms = get_the_terms($post->ID, 'pictos_categories');

		if ($terms!=null){
			?>

			

			<?php

		//var_dump($terms);

		//$cat=$terms['taxonomy'];

		$count=0;
		$tagid=null;
		foreach($terms as $t){

			if($t->count>=$count){
				$tagid=$t->slug;
				$count=$t->count;
			}

		}

		//echo $tagid;

		$args = array(

			'posts_per_page'=>6,

				'post_type'=> 'pictos',

				'taxonomy'=> 'pictos_categories',

				'term' => $tagid,

				'post__not_in' => array($post->ID) ,

				'meta_key' , 'ratings_score',

				'orderby' , 'meta_value_num',

				'order' , 'DESC'

			);

//var_dump($args);
		$i=0; 
		$pictos = new WP_Query($args); 

			if($pictos->have_posts()) : 
				echo '<h2>Same categorie:</h2>';
				while($pictos->have_posts()) 
					: $pictos-> the_post();

	//var_dump($post);		

?>	

		<a href="<?php echo get_permalink(); ?>">

			<div class="one_div_item <?php $i++;if($i%6== 0){echo 'endline';}?>">

				

					<div class="picto">

					<div class="picto_wrapper">						

						<?php

							$html= get_post_meta($post->ID,'_html_code',true);		

							$html= htmlspecialchars_decode($html)	;		

							$html_copy=$html;

							$html = preg_replace('/([class|id])=["|\']([a-zA-Z0-9_]*)["|\']/','${1}="${2}'.$post->ID.'"', $html);
							//$html = preg_replace('/([class|id])=["|\']([a-zA-Z0-9_]*)["|\']>/','${1}="${2}'.$post->ID.'" >'.the_title('','',false), $html);

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

						

			</div>
</a>
			<?php

			endwhile;endif;

			?>
			
			<div class="clear"></div>	

		<?php } ?>
		</div>

		<?php wp_reset_postdata(); ?>
		<div id="picto_comments">
			<h2>Comments:</h2>
			<?php comments_template(); ?>
			<div class="clear"></div>	
		</div>



		<?php

			endif;

		?>
			

			

		<div class="clear"></div>

	

		</div>

	

<?php get_footer(); ?>