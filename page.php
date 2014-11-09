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
					'post_type' => 'faq',
					'posts_per_page' => -1 
				);
				?>
			    <section class="mac-page-toc">
                <?php 
                    $faq_query = new WP_Query( array(
                        'post_type' => 'faq',
                        'posts_per_page' => -1
                    ));
                    $byHeader = array();
                    while($faq_query -> have_posts()) {
                        $faq_query -> the_post();
                       
                        $byHeader[get_field('faq_section_header', $post -> ID)][] = sprintf('
                        <article class="faq-article" id="%s">
                        <a class="faq-show-hide" href="#">%s</a><br/>
                        <div style="display:none" class="faq-content">%s</div>
                        </article>
                        ', $post -> post_name, $post -> post_title, //
                        $post -> post_content ? apply_filters( 'the_content', $post -> post_content) : $post -> post_excerpt);
                    }
                    foreach($byHeader as $header => $posts) {
                        if(count($posts)) {
                            printf('<h1 class="orange-text faq-section-header">%s</h1>', $header);
                            array_map('printf', $posts);
                        }
                    }
                 ?> 
			    <script type="text/javascript">
			        function toggleFaq(item,animate){
                       var mom = item.parent();
                       var bro = item.siblings('.faq-content');
                       // set this now... timing will affect result later
                       var brovis = !bro.is(':visible');
                       bro.slideToggle(animate?200:0);
                       mom.toggleClass('faq-article-maximize');
                       history.pushState(null, null, '#'+mom.attr('id'));
			        }
			    
			        $('.faq-show-hide').click(function(){
                        toggleFaq($(this),true)
                       return false;
			        });
                    window.location.hash.length>1 && toggleFaq($('#'+location.hash.substr(1)+' a.faq-show-hide'), false);
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