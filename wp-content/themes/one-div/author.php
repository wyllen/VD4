<?php get_header(); ?>
	<div id="content" class="author_page">
	<?php get_sidebar();
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
$myid = $curauth->ID;query_posts("author=$myid&posts_per_page=-1");
	?>

        <div id="authorhovi"><?php if (function_exists('get_avatar')) { echo get_avatar($curauth->user_email, '120' ,'',$curauth->nickname );}?></div>
     <div id="about_author">
        <h1><?php echo $curauth->nickname; ?></h1>
      <?php	if(!empty($curauth->user_description)){?>
        <h2>About <?php echo $curauth->nickname; ?>:</h2>
        <?php echo '<p>'.$curauth->user_description.'</p>';
   			 }
    	?>
    	<?php if(!empty($curauth->user_url)){ ?>
    	<h2>Website:</h2>
    	<a href="<?php echo $curauth->user_url; ?>" ><?php echo $curauth->user_url; ?></a>  
       <?php } ?>
        <?php if (empty($curauth->googleplus)&&empty($curauth->viadeo)&&empty($curauth->linkedin)&&empty($curauth->facebook)&&empty($curauth->twitter)){} else { ?>
        <h2>Socials:</h2>
        <ul>
          <?php if (!empty($curauth->googleplus)){ ?>
            <li><?php echo '<a class="external" rel="me" href="'.$curauth->googleplus.'" title="'.$curauth->nickname.' on Google+" target="_blank">+'.$curauth->nickname.'</a>'; ?></li>
          <?php } if (!empty($curauth->twitter)){ ?>
            <li><?php echo '<a class="external" rel="me" href="'.$curauth->twitter.'" title="'.$curauth->nickname.' on Twitter" target="_blank">'.$curauth->nickname.' on Twitter</a>'; ?></li>
          <?php } if (!empty($curauth->facebook)){ ?>
            <li><?php echo '<a class="external" rel="me" href="'.$curauth->facebook.'" title="'.$curauth->nickname.' on Facebook" target="_blank">'.$curauth->nickname.' on Facebook</a>'; ?></li>
          <?php } if (!empty($curauth->linkedin)){ ?>
            <li><?php echo '<a class="external" rel="me" href="'.$curauth->linkedin.'" title="'.$curauth->nickname.' on Linkedin" target="_blank">'.$curauth->nickname.' on Linkedin</a>'; ?></li>
          <?php } if (!empty($curauth->viadeo)){ ?>
            <li><?php echo '<a class="external" rel="me" href="'.$curauth->viadeo.'" title="'.$curauth->nickname.' on Viadéo" target="_blank">'.$curauth->nickname.' on Viadéo</a>'; ?></li>
          <?php } ?>
        </ul>
        <?php } ?>             
    
        <?php $comments = get_comments("author_email=$curauth->user_email&number=1"); 
        if(!empty($comments)){ ?>
           <h2>Last comment: </h2>
           <?php } 
        foreach($comments as $comment) :
          $theid = $comment->comment_post_ID;
          echo '<p class="myem">'.get_comment_date( 'd F Y', $comment->comment_ID ).' - <strong><a href="'.get_permalink($theid).'" title="'.get_the_title($theid).'">'.get_the_title($theid).'</a></strong></p>
        		<p>'.$comment->comment_content.'</p>';
        endforeach; ?>        
  	</div>
  	<div class="clear"></div>

  	<div id="author_creations">
  	<h2>Creations:</h2>

  	<?php
		$i=0; $pictos = new WP_Query('post_type=pictos&author='.$myid.'&posts_per_page=-1&order=DESC'); 

			if($pictos->have_posts()) : while($pictos->have_posts()) : $pictos-> the_post();

			

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
</a>

				<a href="" class="button_code html" id="button_html_<?php echo $post->ID; ?>" title="<?php echo $post->ID; ?>" onclick="_gaq.push(['_trackEvent', 'HTML', '<?php the_title(); ?><?php echo $post->ID; ?>']);">HTML</a>

				<a href="" class="button_code css"  id="button_css_<?php echo $post->ID; ?>" title="<?php echo $post->ID; ?>" onclick="_gaq.push(['_trackEvent', 'CSS', '<?php the_title(); ?><?php echo $post->ID; ?>']);">CSS</a>

				<a href="<?php bloginfo('template_url'); ?>/codes/<?php echo $post->ID ?>/<?php echo $post->ID ?>.zip" class="button_code zip" onclick="_gaq.push(['_trackEvent', 'ZIP', '<?php the_title(); ?><?php echo $post->ID; ?>']);">ZIP</a>


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


	</div>
<?php get_footer(); ?>
   
                                                  
         
     