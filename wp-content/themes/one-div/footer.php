<footer id="footer">

<?php wp_footer(); ?>

<script type="text/javascript">

					$(document).ready(function(){

						$('a.button_code.html').zclip({

			path:'<?php bloginfo('template_url'); ?>/js/ZeroClipboard.swf',

			copy:function(){

				return $('#code_html_'+$(this).attr("title")).val();

			}

					});

				

						$('a.button_code.css').zclip({

						path:'<?php bloginfo('template_url'); ?>/js/ZeroClipboard.swf',

						copy:function(){

						return $('#code_css_'+$(this).attr("title")).val();

						}

					});

					// The link with ID "copy-description" will copy

					// the text of the paragraph with ID "description"

		

		

		

		

	

					});

				</script>	
<div id="copyright">® 2012 One div</div>
				<div id="addthis">

					

					

					<!-- AddThis Button BEGIN -->

					<div class="addthis_toolbox addthis_default_style ">

					

					<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> 	

					<a class="addthis_button_tweet" tw:via="One_div"></a> 		

					<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>  		

					

					

					</div>

					<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50af82a460df6dfd"></script>

					<!-- AddThis Button END -->
<div id="followme">
					<a href="https://twitter.com/One_div" class="twitter-follow-button" data-show-count="false" data-lang="fr">Follow @One_div</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</div>
				</div>

				

				

				

</footer>

</body>

</html>