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
 					
 				</div>
 				
 			</div>
 			
 		</div>
 		
 	</footer>

<?php wp_footer(); ?>
</body>
</html>