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

 	<footer>
 		
 		<div class="container">
 			
 			<div class="row">
 				
 				<div class="span3">
 				
 					<?php fg_get_weather(); ?>
 				
 				</div>
 				
 				<div class="span3">
 					
 					<h3>Events</h3>
 					
 					<?php 
						$args = array(
							'posts_per_page'	=> 2,
							'no_found_rows' 	=> true,
							'post_type'			=> 'event'
						);

						$the_query = new WP_Query( $args );
					?>

					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					
						<h4><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a></h4>
						<?php
							$meta = get_post_meta(get_the_ID(), 'StartTime');
							if ( !empty( $meta[0] ) ) {
								echo '<p>' . $meta[0];
							}
							echo ' &mdash; ';
							$endtime = get_post_meta(get_the_ID(), 'EndTime');
							if ( !empty( $endtime[0] ) ) {
								echo $endtime[0];
							}
							$date = get_post_meta( get_the_ID(), 'Date' );
							if ( !empty( $date[0] )) {
								echo ', ' . $date[0] . '</p>';
							}
							$loc = get_post_meta(get_the_ID(), 'Location');
							if (!empty($loc[0])) {
								echo '<p>' . $loc[0] . '</p>';
							}
						?>
					
					<?php endwhile; wp_reset_postdata(); ?>
 					
 				</div>
 				
 				<div class="span3">
 					
 					<h3>Pages</h3>
 					
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