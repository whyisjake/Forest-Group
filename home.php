<?php
/**
 *
 * Forest Group Home Page
 * @package    forestgroup
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 *
 */
get_header(); ?>

	<div class="hero">
		
		<div class="container">
		
			<p>Helping private landowners in Sonoma County sustain healthy forests, oak woodlands and watersheds.</p>	
			
		</div>
		
	</div>

	<div class="waist">

		<div class="container">
			
			<div class="row">
				
				<div class="span4">
					
					<h3>Resources</h3>
					<h4>Get More Information</h4>
					
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/leaves.jpg" alt="Leaves">
					
				</div>
				
				<div class="span4">
					
					<h3>Coming Events</h3>	
					<h4>See What's Coming Next</h4>
					
					<?php fg_upcoming_events(); ?>
					
				</div>
				
				<div class="span4">
					
					<h3>Event Sign-Up</h3>
					<h4>Request a Workshop</h4>
					
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/party-people.jpg" alt="Leaves">
					
				</div>
				<div class="clearfix"></div>
				
			</div>
			
			<div class="row">
				
				<div class="span4">
					
					<a href="<?php bloginfo('url'); ?>/resources/" class="btn btn-success">Learn More</a>
					
				</div>
				
				<div class="span4">
					
					<a href="<?php bloginfo('url'); ?>/events/" class="btn btn-success">View All Events</a>
					
				</div>
				
				<div class="span4">
					
					<a href="<?php bloginfo('url'); ?>/contact-us/" class="btn btn-success">Contact Us</a>
					
				</div>
				
			</div>
			
		</div> <!-- /container -->
	
	</div><!-- /Waist -->
	
	<div class="map">
		
		<div class="container">
			
			<h3>Workshops, lectures, funding <div>information and technical expertise</div></h3>
			<p><small>on forestry and conservation through our volunteers and interagency associations including:</small></p>
			
			<div class="row">
				<div class="span4 offset2">
					<ul>
						<li><a target="_blank" href="http://www.sonomaopenspace.org/">Sonoma County Agricultural Preservation &amp; Open Space District</a></li>
						<li><a target="_blank" href="http://www.sonomalandtrust.org/">Sonoma Land Trust</a></li>
						<li><a target="_blank" href="http://www.santarosa.edu">Santa Rosa Junior College</a></li>
						<li><a target="_blank" href="http://www.fire.ca.gov/">CAL FIRE</a></li>
					</ul>
				</div>
				<div class="span4">
					
					<ul>
						<li><a target="_blank" href="http://ucanr.edu/">University of California Cooperative Extension</a></li>
						<li><a target="_blank" href="http://carcd.org/">Resource Conservation Districts</a></li>
						<li><a target="_blank" href="http://grwc.info">Watershed Councils</a></li>
						<li><a target="_blank" href="http://www.firesafesonoma.org/main/">Fire Safe Council</a></li>
					</ul>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
	<div class="who">
	
		<div class="container">
		
			<div class="row">
				
				<div class="span5">
					
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/peeps.png" alt="Peeps">
					
				</div>
				
				<div class="span6 offset1 who-are-we">
					
					<h3>Who Are We?</h3>
					
					<p>We are a group with forestry and conservation expertise working to provide information and resources to forest landowners with the goal of protecting, sustaining and increasing the health of forests, woodlands, and watersheds in Sonoma County. Members represent local and regional land trusts, watershed councils, and state and local agencies.</p>
					<p>Workshops and lectures include marketing forest products, managing inventories, fish and wildlife habitat, fire safety, land conservation, conservation easements, carbon sequestration, funding information, and more. We offer consultations and referrals.</p>
					
				</div>
				
			</div>
			
			<div class="row">
				
				<div class="arrow">
					
					
				</div>
				
				<div class="span12 center">
					
					<p><a href="#" class="btn btn-success btn-large btn-flat">Upcoming Events</a></p>
					<p><a href="#" class="norm">Join our email list</a></p>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
	<div class="topo">
	
		<div class="container">
			
			<div class="span12">
				
				<p>Sonoma County's conifer forests and oak woodlands cover 514,000 acres. More than 93% of parcels are smaller than 100 acres. <a href="<?php echo bloginfo( 'url' ); ?>/wp-content/uploads/2013/04/SUDDEN-OAK-DEATH-FACT-SHEET.doc">Sudden Oak Death</a> occurs on about 80,000 acres.</p>
				
			</div>
			
		</div>
		
	</div>
	

<?php get_footer(); ?>