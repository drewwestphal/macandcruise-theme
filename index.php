<?php get_header(); ?>
<section id="content" role="main">
<!--hero-->
	<section id="hero">
		<div class="container">
			<div class="col-xs-12 col-md-12">
				<h1 id="hero-site-title"><?php echo get_option('mac_settings')['mac_html_friendly_title'];?></h1>
				<h2 id="hero-site-desciption"><?php bloginfo( 'description' ); ?></h2>
				<?php if (get_option('mac_settings')['mac_travel_dates']){ ?>
				<h3 id="hero-travel-dates"><?php echo get_option('mac_settings')['mac_travel_dates'];?></h3>
				<?php  }; ?>
				<?php if (get_option('mac_settings')['mac_travel_description']){ ?>
				<h4 id="hero-travel-description_wide"><?php echo get_option('mac_settings')['mac_travel_description'];?></h4>
				<?php  }; ?>
				<?php 
					if (isset(get_option('mac_settings')['mac_booking_enabled'])) { 
						//book now button?
					} else { ?>
						<p class="orange-text"><?php echo get_option('mac_settings')['mac_mailing_list_cta']; ?></p>
						<?php if( function_exists( 'mc4wp_form' ) ) {
						    mc4wp_form();
						} ?>
				 <?php  }
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
<!--updates-->	
	<section id="updates">
		<div class="container">
			<div class="col-xs-12 col-md-12">
				<span class="glyphicon glyphicon-arrow-left orange-text news-nav" id="news-left"></span>
				<section id="news" class="clearfix">
					<div id="news-cell">
					<?php 
						$args = array(
							'post_type' => 'post',
							'LIMIT'		=> 5
						);
						$news_query = new WP_Query( $args );
						$news_count = $news_query->post_count;
						if ( $news_query->have_posts() ) {
							while ( $news_query->have_posts() ) {
								$news_query->the_post();
								?>
								<a href="<?php echo get_permalink(); ?>" class="orange-text"><?php the_title(); ?></a>
					<?php  }; ?>	
				<?php  }; ?> 
				<?php wp_reset_postdata(); ?>
					</div>
					
				</section>
				<span class="glyphicon glyphicon-arrow-right orange-text news-nav" id="news-right"></span>
				<section id="social">
					<?php if (get_option('mac_settings')['mac_facebook_url']){ ?>
					<a class="social-icon" id="facebook" href="<?php echo get_option('mac_settings')['mac_facebook_url']; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/facebook.png" alt="The Facebook icon."></a>
					<?php  }; ?>
					<?php if (get_option('mac_settings')['mac_twitter_url']){ ?>
					<a class="social-icon" id="twitter" href="<?php echo get_option('mac_settings')['mac_twitter_url']; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/twitter.png" alt="The Twitter icon."></a>
					<?php  }; ?>
				</section>
			</div>
		</div>
	</section>
<!--artists-->	
	<section id="artists">
		<div class="container">
			<div class="col-xs-12 col-md-12">
				<img src="<?php bloginfo('template_directory'); ?>/img/macaroni_anchor.png" alt="A macaroni anchor." id="artists-macaroni-anchor">
			<?php if (get_option('mac_settings')['mac_talent_header']){ ?>
				<h1 id="artists-header" class="orange-text"><?php echo get_option('mac_settings')['mac_talent_header']; ?></h1>
			<?php  }; ?>
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
							<?php 							if ( $artist_query->have_posts() ) {
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
											<div style="padding-top:8px" class="artists-social-icons">
											<?php 
											if($tw=get_field('artist_twitter')){
                                               printf('<a href="%s" target=_blank><img src="%s" alt="twitter icon"/></a>', $tw, get_template_directory_uri().'/img/paul-twitter.png'); 
                                            }
                                            if($fb=get_field('artist_facebook')){
                                               printf('<a href="%s" target=_blank><img src="%s" alt="facebook icon"/></a>', $fb, get_template_directory_uri().'/img/paul-facebook.png'); 
                                            }
                                            if($yt=get_field('artist_youtube')){
                                               printf('<a href="%s" target=_blank><img src="%s" alt="youtube icon"/></a>', $yt, get_template_directory_uri().'/img/paul-youtube.png'); 
                                            }
                                            
											?>
											</div>
										</section>
										<?php  }; ?>
									</div>
									<?php $j++;
								}
							}

							wp_reset_postdata();
                        ?>
					</div>
				</div>
				<div class="carousel" id="artist-carousel">
					<span class="glyphicon glyphicon-arrow-left"></span>
					<?php 						for ($i=0;$i<$count;$i++){ ?>		
							<a href="#item-<?php echo $i; ?>" <?php if ($i===0) { echo 'class="orange-text"'; };?>>&bull;</a>
					<?php 						}
					?>	
					<span class="glyphicon glyphicon-arrow-right"></span>
				</div>
			</div>
		</div>
	</section>
<!--about-->	
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
									<?php if (has_excerpt()){ ?>
										<p><?php the_excerpt(); ?></p>
									<?php } else { ?>
										<p><?php the_content(); ?></p>
									<?php }; ?>
								</div>
							</div>
							<?php 							$k++;
						}
					}

					wp_reset_postdata();
					$count = $artist_query->post_count;
				?>
	</section>
<!--contact-->	
	<section id="contact">
		<div class="container">
			<div class="col-xs-12 col-md-12">
				<h1>Contact Us</h1>
				<form name="form" action="<?php bloginfo('template_directory'); ?>/contact.php" method="post" id="contact-form" novalidate class="clearfix">
					<div class="contact-input" id="contact-input-email">
						<input name="email" type="email" id="email" placeholder="Your email address">
					</div>
					<div class="contact-input" id="contact-input-name">
						<input type="text" id="name" name="name" placeholder="Your name">
					</div>
					<input type="text" id="honeypot" name="honeypot" aria-hidden="true" placeholder="Please leave blank.">
					<div class="contact-comments" id="contact-comments">
						<textarea name="comments" id="comments" placeholder="Your message"></textarea>
					</div>
					<button type="submit" value="Submit">Submit</button>
				</form>
			</div>
		</div>
	</section>
<!--faq-->	
	<div class="faq container">
	<div class="faq col-xs-12 col-md-12">
	<section id="faq">
				<h1 onclick="window.location = 'faq/'" style="cursor:pointer;">FAQS</h1>
				<?php 
				$args = array(
					'post_type' => 'faq',
					'orderby'	=> 'ID',
					'order'		=> 'ASC',
					'meta_query' => array(
				        array(
				            'key' => 'show_on_front_page',
				            'value' => '"show on front page"',
				            'compare' => 'LIKE'
				        )
				    )
				);
				$l=0;
				$faq_query = new WP_Query( $args );
				if ( $faq_query->have_posts() ) {
					$faq_count = $faq_query->post_count;
					?>
					
					<div class="faq-carousel carousel visible-xs-block" id="faq-carousel-small">
						<span class="glyphicon glyphicon-arrow-left"></span>
						<?php 							for ($l=0;$l<$faq_count;$l++){ ?>		
								<a href="#faq-item-small-<?php echo $l; ?>" <?php if ($l===0) { echo 'class="orange-text"'; };?>>&bull;</a>
						<?php 							}
						?>	
						<span class="glyphicon glyphicon-arrow-right"></span>
					</div>
					<div class="faq-carousel carousel hidden-xs" id="faq-carousel-wide">
						<span class="glyphicon glyphicon-arrow-left"></span>
						<?php 							$wide_count = ceil($faq_count/3);
							for ($l=0;$l<$wide_count;$l++){ ?>		
								<a href="#faq-item-wide-<?php echo $l; ?>" <?php if ($l===0) { echo 'class="orange-text"'; };?>>&bull;</a>
						<?php 							}
						?>	
						<span class="glyphicon glyphicon-arrow-right"></span>
					</div>	
					<div id="faq-overflow" style="left:0;">
						<?php
						$faqlink = get_page_by_title('FAQ');
                        $faqlink = get_permalink($faqlink -> ID);
                        $markup = '<div class="faq-group">';
                        $m = 1;
                        while($faq_query -> have_posts()) {
                            $faq_query -> the_post();
                            $markup .= sprintf('<div class="faq-item-container" id="faq-item-%d">', $m);
                            $markup .= sprintf('<div class="faq-item-question"><a href="%s"><h2>%s</h2></a></div>', //
                            $faqlink . '#' . $post -> post_name, get_the_title());
                            $markup .= sprintf('<div class="faq-item-answer">%s</div>', //
                            $post -> post_excerpt ? get_the_excerpt() : get_the_content());
                            $markup .= '</div>';
                            // close faq group && reopen every 3 faq items
                            if($m % 3 === 0) {
                                $markup .= '</div><div class="faq-group">';
                            }
                            $m++;
                        }
                        $markup .= "</div>";
                        echo $markup;
						wp_reset_postdata();
						?>
					</div>
					
				<?php 				}
				?>
				<a id="faq-view-all" href="faq/">View All FAQS</a>
	</section>
			</div>
			</div>
<!--sponsors-->			
	<section id="sponsors">
		<div class="container">
			<div class="col-xs-12 col-md-12">
				<?php 				$args = array(
					'post_type' => 'sponsors',
					'LIMIT'	=> '1'
				);
				$sponsors_query = new WP_Query( $args );
				if ( $sponsors_query->have_posts() ) {
					while ( $sponsors_query->have_posts() ) {
						$sponsors_query->the_post();
						?>
						<h1><?php the_title(); ?></h1>
						<?php 						the_content();
					}
					wp_reset_postdata();
				}
				?>
			</div>
		</div>
	</section>
	
</section>				
<?php wp_footer(); ?>
<style type="text/css">
    #news-cell{
	    width:<?php echo $news_count; ?>00%;
    }
    #news-cell a{
	    width:<?php echo 100/$news_count; ?>%;
    }
    #overflow{
	    width:<?php echo $count; ?>00%;
    }
    .artists-artist{
	    width:<?php echo 100/$count; ?>%;
    }
    #faq-overflow{
	    width:<?php echo $faq_count; ?>00%;
    }
    .faq-item-container{
	    width:<?php echo 100/$faq_count; ?>%;
    }
    #wpadminbar{
	    position: fixed !important;
    }
    @media screen and (min-width:768px){ 
	    #overflow{
	    	width:100%;
	    }
	    .artists-artist{
		    width:33.3%;
	    }
	    #faq-overflow{
		    width:<?php echo $wide_count; ?>00%;
	    }
	    .faq-group{
		    width:<?php echo 100/$wide_count; ?>%;
	    }
	    .faq-item-container{
		    width:33%;
	    }
	}

</style>

