<?php
/**
 *
 * Forest Group Archive Template
 * @package    forestgroup
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 *
 */
get_header(); ?>

	<div class="container content">
		
		<div class="row">
			
			<div class="span8">
			
				<?php if (is_archive( 'event' )) {
					echo '<img src="http://sonomaforests.org/wp-content/uploads/2013/04/events-header.jpg">';
				} ?>
			
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
					<?php the_title( '<h1><a href="' . get_permalink() . '">', '</a></h1>' ); ?>
						
					<?php the_excerpt(); ?>
					
					<p><a href="<?php the_permalink(); ?>"><span class="label label-success">More...</span></a></p>
					
				<?php endwhile; ?>
				
					<?php // comments_template(); ?>
				
				<?php else: ?>
				
				<?php endif; ?>
				
			</div>
			
			<?php get_sidebar(); ?>
			
		</div>
		
	</div> <!-- /container -->
	

<?php get_footer(); ?>