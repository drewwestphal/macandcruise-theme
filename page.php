<?php get_header(); ?>
<?php if ( is_front_page() ) { ?>
	<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="header">
	<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
	</header>
	<section class="entry-content">
	<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
	<?php the_content(); ?>
	<div class="entry-links"><?php wp_link_pages(); ?></div>
	</section>
	</article>
	<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>
	</section>
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
<?php } elseif ( is_page( 'FAQ' ) ){ ?>
	<section class="mac-page" id="page-faq">
		<div class="container">
			<div class="col-xs-12 col-md-12">
				<h1 class="orange-text"><?php the_title(); ?></h1>
			    <?php if (have_posts()) : while (have_posts()) : the_post();?>
		            <div class="mac-page-intro"><?php the_content(); ?></div>
			    <?php endwhile; endif; 
			    $args = array(
					'post_type' => 'faq'
				);
				?>
			    <section class="mac-page-toc">
				    <?php $faq_query = new WP_Query( $args );
						if ( $faq_query->have_posts() ) {
							while ( $faq_query->have_posts() ) {
								$faq_query->the_post();
								?>
                            <article class="faq-article" id="<?php echo $post->post_name;?>">
                                    <a class="faq-show-hide" href="#">
                                        <?php the_title(); ?>
                                    </a><br>
                            <div style="display:none" class="faq-content">
                            <?php if ($post->the_content) {?>
                                <?php the_content(); ?>
                            <?php  } else { ?>
                                <?php the_excerpt(); ?>
                            <?php  }; ?>    
                            </div>
                            </article>
						<?php  }; ?>	
					<?php  }; ?>	
			    <script type="text/javascript">
			        $('.faq-show-hide').click(function(){
                       var mom = $(this).parent();
                       var bro = $(this).siblings('.faq-content');
			           // set this now... timing will affect result later
			           var brovis = !bro.is(':visible');
                       bro.slideToggle({
                           duration:200,
                           easing:'linear'
                       });
                       mom.toggleClass('faq-article-maximize');
                       history.pushState(null, null, '#'+mom.attr('id'));
                       return false;
			        });
                    window.location.hash.length>1 && $('#'+location.hash.substr(1)+' a.faq-show-hide').click();
			    </script>
			    </section>
				<script src="<?php bloginfo('template_directory'); ?>/js/js_behavior.js"></script>
				<?php wp_footer(); ?>
			</div>
		</div>
	</section>
<?php } elseif ( is_page( 'News' ) ){ ?>
	<section class="mac-page" id="page-news">
		<div class="container">
			<div class="col-xs-12 col-md-12">
				<h1 class="orange-text">News</h1>
			    <?php if (have_posts()) : while (have_posts()) : the_post();?>
		            <p class="mac-page-intro"><?php the_content(); ?></p>
			    <?php endwhile; endif; ?>
			<?php 
				$args = array(
					'post_type' => 'post'
				);
				$post_query = new WP_Query( $args );
				if ( $post_query->have_posts() ) {
					while ( $post_query->have_posts() ) {
						$post_query->the_post();
						?>
							<article>
								<h1 class="orange-text"><?php the_title(); ?></h1>
							<?php if ($post->the_content) {?>
								<p><?php the_content(); ?></p>
							<?php  } else { ?>
								<p><?php the_excerpt(); ?></p>
							<?php  }; ?>	
							</article>
					<?php  }; ?>	
				<?php  }; ?>
				<?php wp_footer(); ?>	
			</div>
		</div>
	</section>

<?php }; ?>