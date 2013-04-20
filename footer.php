<?php
/**
 *
 * Forest Group Main Footer File
 * @package    forestgroup
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 *
 */
 ?>
 	
 	<div class="tagline">
 		
 		<div class="container">
 			
 			<div class="row">
 				
 				<div class="span12">
 					
 					<p class="center"><em>Protecting forests across landscapes and through generations&hellip;</em></p>
 					
 				</div>
 				
 			</div>
 			
 		</div>
 		
 	</div>

 	<footer>
 		
 		<div class="container">
 			
 			<div class="row">
 				
 				<div class="span3">
 				
 					<?php fg_get_weather(); ?>
 				
 				</div>
 				
 				<div class="span3">
 					
 					<h3>Events</h3>
 					
 					<?php fg_upcoming_events(); ?>
 					
 				</div>
 				
 				<div class="span3">
 					
 					<h3>Pages</h3>
 					<ul class="unstyled">
 						<?php wp_list_pages( 'title_li=' ); ?>	
 					</ul>
 					
 					
 				</div>
 				
 				<div class="span3">
 					
 					<h3>Join our email list</h3>
 					
					<div id="mc_embed_signup">
						<form action="http://sonomaforests.us4.list-manage.com/subscribe/post?u=dbe5f15aa4259988b741354f7&amp;id=edbc7edb26" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
							<input type="text" value="" name="NAME" class="name" id="mce-NAME" placeholder="Name" required>
							<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email Address" required>
							<div class="clear">
								<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-success">
							</div>
						</form>
					</div>
					
 				</div>
 				
 			</div>
 			
 			<div class="wimp center">
				<p><a href="http://gives.beawimp.org" target="_blank"><img style="vertical-align:middle" src="<?php echo get_stylesheet_directory_uri(); ?>/img/WIMPgivesFooter.png" width="48" height="34" border="0" scale="0"></a> Website donated and built by <a href="htp://gives.beawimp.org" target="_blank">WIMPgives</a>.</p>
				<p>&copy; 2013 Sonoma County Forest Conservation Working Group &mdash; All Rights Reserved.</p>
			</div>
 			
 		</div>
 		
 	</footer>

<?php wp_footer(); ?>
</body>
</html>