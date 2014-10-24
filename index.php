<?php get_header(); ?>
<section id="content" role="main">
	<section id="hero">
		<div class="container">
			<div class="col-xs-12 col-md-12">
				<h1 id="hero-site-title"><?php echo get_option('mac_settings')['mac_html_friendly_title'];?></h1>
				<h2 id="hero-site-desciption"><?php bloginfo( 'description' ); ?></h2>
				<?php if (get_option('mac_settings')['mac_travel_dates']){ ?>
				<h3 id="hero-travel-dates"><?php echo get_option('mac_settings')['mac_travel_dates'];?></h3>
				<? }; ?>
				<?php if (get_option('mac_settings')['mac_travel_description']){ ?>
				<h4 id="hero-travel-description_wide"><?php echo get_option('mac_settings')['mac_travel_description'];?></h4>
				<? }; ?>
				<?php 
					if (get_option('mac_settings')['mac_booking_enabled']) { 
						//book now button?
					} else { ?>
						<p class="orange-text"><?php echo get_option('mac_settings')['mac_mailing_list_cta']; ?></p>
						<?php if( function_exists( 'mc4wp_form' ) ) {
						    mc4wp_form();
						} ?>
				 <? }
				?>
				<section id="hero-more-info">
					<div id="hero-more-info-button">
						<h1 class="orange-text">More Info</h1>
						<span class="glyphicon glyphicon-remove orange-text rotate"></span>
					</div>
					<div id="hero-travel-description_narrow" class="hidden"><p><?php echo get_option('mac_settings')['mac_travel_description'];?></p></div>
				</section>
			</div>
		</div>
	</section>
	<section id="updates">
		<div class="container">
			<div class="col-xs-12 col-md-12">
				<section id="news" class="clearfix">
					<div id="news-cell">
						<p>This needs to be <span class="orange-text">variablized</span>. Vestibulum id ligula porta felis euismod semper.</p>
					</div>
				</section>
				<section id="social">
					<?php if (get_option('mac_settings')['mac_facebook_url']){ ?>
					<a class="social-icon" id="facebook" href="<?php echo get_option('mac_settings')['mac_facebook_url']; ?>" target="_blank"><img src="/wp-content/themes/MacAndCruise/img/facebook.png" alt="The Facebook icon."></a>
					<? }; ?>
					<?php if (get_option('mac_settings')['mac_twitter_url']){ ?>
					<a class="social-icon" id="twitter" href="<?php echo get_option('mac_settings')['mac_twitter_url']; ?>" target="_blank"><img src="/wp-content/themes/MacAndCruise/img/twitter.png" alt="The Twitter icon."></a>
					<? }; ?>
				</section>
			</div>
		</div>
	</section>
	<section id="artists">
		<div class="container">
			<div class="col-xs-12 col-md-12">
				<img src="/wp-content/themes/MacAndCruise/img/macaroni_anchor.png" alt="A macaroni anchor." id="artists-macaroni-anchor">
			<?php if (get_option('mac_settings')['mac_talent_header']){ ?>
				<h1 id="artists-header" class="orange-text"><?php echo get_option('mac_settings')['mac_talent_header']; ?></h1>
			<? }; ?>
						<?php 
							$args = array(
								'post_type' => 'artist',
								'orderby'	=> 'ID',
								'order'		=> 'ASC'
							);
							$artist_query = new WP_Query( $args );
							$j=0;
							$count = $artist_query->post_count;
							?>
				<div id="artists-artist-container">
					<div id="overflow">
						<div class="inner">
							<?php
							if ( $artist_query->have_posts() ) {
								while ( $artist_query->have_posts() ) {
									$artist_query->the_post();
									?>
									<div class="artists-artist" id="item-<?php echo $j; ?>">
										<div class="artists-featured-image">
											<?php the_post_thumbnail(); ?>
										</div>
										<div class="artists-name">
											<p><?php the_title(); ?></p>
										</div>
										<?php if ($post->post_excerpt) {?>
										<section class="artist-more-info">
											<div class="artist-more-info-button" id="item-<?php echo $j; ?>-button">
												<h2 class="orange-text">More Info</h2>
												<span class="glyphicon glyphicon-remove orange-text rotate"></span>
											</div>
											<div class="artists-description nope">
												<?php the_excerpt(); ?>
											</div>
										</section>
										<? }; ?>
									</div>
									<?php
									$j++;
								}
							}
							/* Restore original Post Data */
							wp_reset_postdata();
						?>
						</div>
					</div>
				</div>
				<div class="carousel" id="artist-carousel">
					<span class="glyphicon glyphicon-arrow-left"></span>
					<?php
						for ($i=0;$i<$count;$i++){ ?>		
							<a href="#item-<?php echo $i; ?>" <?php if ($i===0) { echo 'class="orange-text"'; };?>>&bull;</a>
					<?php
						}
					?>	
					<span class="glyphicon glyphicon-arrow-right"></span>
				</div>
			</div>
		</div>
	</section>
	
	<section id="about">
				<?php 
					$args = array(
						'post_type' => 'about',
						'orderby'	=> 'ID',
						'order'		=> 'ASC'
					);
					$k=0;
					$about_query = new WP_Query( $args );
					if ( $about_query->have_posts() ) {
						while ( $about_query->have_posts() ) {
							$about_query->the_post();
							?>
							<div class="about-item clearfix <?php if ($k % 2 == 0) { echo 'right'; };?>">
								<?php the_post_thumbnail(); ?>
								<div class="about-info">
									<h1><?php the_title(); ?></h1>
									<?php if (the_excerpt()){ ?>
										<p><?php the_excerpt(); ?></p>
									<?php } else { ?>
										<p><?php the_content(); ?></p>
									<?php }; ?>
								</div>
							</div>
							<?php
							$k++;
						}
					}

					wp_reset_postdata();
					$count = $artist_query->post_count;
				?>
	</section>
	<section id="contact">
		<div class="container">
			<div class="col-xs-12 col-md-12">
				<h1>Contact Us</h1>
				<form name="form" action="contact.php" method="post" id="contact-form" novalidate class="clearfix">
					<input name="email" type="email" id="email" placeholder="Your email address">
					<input type="text" id="name" name="name" placeholder="Your name">
					<textarea name="comments" placeholder="Your message"></textarea>
					<button type="submit" value="Submit">Submit</button>
				</form>
			</div>
		</div>
	</section>
	<section id="faq">
		<h1>FAQS</h1>
		<?php 
					$args = array(
						'post_type' => 'faq',
						'orderby'	=> 'ID',
						'order'		=> 'ASC'
					);
					$l=0;
					$faq_query = new WP_Query( $args );
					if ( $faq_query->have_posts() ) {
						$faq_count = $faq_query->post_count;
						?>
						
						<div class="carousel visible-*-block" id="faq-carousel-small">
							<span class="glyphicon glyphicon-arrow-left"></span>
							<?php
								for ($l=0;$l<$faq_count;$l++){ ?>		
									<a href="#faq-item-small-<?php echo $l; ?>" <?php if ($l===0) { echo 'class="orange-text"'; };?>>&bull;</a>
							<?php
								}
							?>	
							<span class="glyphicon glyphicon-arrow-right"></span>
						</div>
						<div class="carousel hidden-xs" id="faq-carousel-wide">
							<span class="glyphicon glyphicon-arrow-left"></span>
							<?php
								for ($l=0;$l<$faq_count;$l++){ ?>		
									<a href="#faq-item-wide-<?php echo $l; ?>" <?php if ($l===0) { echo 'class="orange-text"'; };?>>&bull;</a>
							<?php
								}
							?>	
							<span class="glyphicon glyphicon-arrow-right"></span>
						</div>
						
						<?php
					}
		?>
	</section>
	
</section>				





<br><br><br>
<?php //print_r(get_option('mac_settings')); ?>
<style type="text/css">
    #overflow{
	    width:<?php echo $count; ?>00%;
    }
    .artists-artist{
	    width:<?php echo 100/$count; ?>%;
    }
    @media screen and (min-width:768px){ 
	    #overflow{
	    	width:100%;
	    }
	}

</style>

<script src="/wp-content/themes/MacAndCruise/js/js_behavior.js"></script>