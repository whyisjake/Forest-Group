<?php
/**
 *
 * Forest Group Header File
 * @package    forestgroup
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 *
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
	<meta name="description" content="<?php if ( is_single() ) {
				echo wp_trim_words( strip_shortcodes( get_the_excerpt('...') ), 20 );
			} else {
				bloginfo( 'name' );
				echo " - ";
				bloginfo('description');
			}
	?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>
<body <?php body_class(); ?>>
		
	<header>
		
		<div class="container">
		
			<div class="row">
			
				<div class="span4">
					
					<h1><a href="<?php bloginfo( 'url' ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/sonoma-forest-group.png" alt="Sonoma Forest Conservation Working Group"></a></h1>
					
				</div>
				
				<div class="span8">
					
					<nav>
						<ul class="inline pull-right donate">
							<li><a href="<?php bloginfo(); ?>/contact-us/">Donate</a></li>
							<li>|</li>
							<li><a href="<?php bloginfo(); ?>/contact-us/">Contact</a></li>
						</ul>
					</nav>
					<div class="clearfix"></div>
					<nav>
						<ul class="inline pull-right main">
							<li><a href="<?php bloginfo(); ?>/events/">Events</a></li>
							<li><a href="<?php bloginfo(); ?>/what-we-do/">What We Do</a></li>
							<li><a href="<?php bloginfo(); ?>/resources/">Resources</a></li>
							<li><a href="<?php bloginfo(); ?>/about-us/">About Us</a></li>
						</ul>
					</nav>
					<div class="clearfix"></div>
				</div>
			
			</div>
			
		</div>
		
	</header>