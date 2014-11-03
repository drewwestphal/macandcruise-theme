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
				<h1 class="orange-text">FAQ</h1>
			<?php 
				$args = array(
					'post_type' => 'faq'
				);
				$faq_query = new WP_Query( $args );
				if ( $faq_query->have_posts() ) {
					while ( $faq_query->have_posts() ) {
						$faq_query->the_post();
						?>
							<article id="<?php echo $post->post_name;?>">
								<h1 class="orange-text"><?php the_title(); ?></h1>
							<?php if ($post->the_content) {?>
								<p><?php the_content(); ?></p>
							<?php  } else { ?>
								<p><?php the_excerpt(); ?></p>
							<?php  }; ?>	
							</article>
					<?php  }; ?>	
				<?php  }; ?>	
			</div>
		</div>
	</section>
<?php } elseif ( is_page( 'News' ) ){ ?>
	<section class="mac-page" id="page-news">
		<div class="container">
			<div class="col-xs-12 col-md-12">
				<h1 class="orange-text">News</h1>
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
			</div>
		</div>
	</section>

<?php }; ?>