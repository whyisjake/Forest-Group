<?php
/**
 *
 * Forest Group Main Index File
 * @package    forestgroup
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 *
 */
get_header(); ?>

	<div class="container">
		
		<div class="row">
			
			<div class="span8">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
					<?php the_title( '<h1>', '</h1>' ); ?>
					
					<?php the_content(); ?>
					
				<?php endwhile; ?>
				
					<?php comments_template(); ?>
				
				<?php else: ?>
				
				<?php endif; ?>
				
			</div>
			
			<div class="span4">
				
				<h3>Sidebar</h3>
				
			</div>
			
		</div>
		
	</div> <!-- /container -->
	

<?php get_footer(); ?>