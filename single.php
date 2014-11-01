<?php get_header(); ?>
<section id="content" class="mac-page" role="main">
	<div class="container">
	<div class="col-xs-12 col-md-12">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php //get_template_part( 'entry' ); ?>
	<article>
		<h1 class="orange-text"><?php the_title(); ?></h1>
	<?php if ($post->the_content) {?>
		<p><?php the_content(); ?></p>
	<?php  } else { ?>
		<p><?php the_excerpt(); ?></p>
	<?php  }; ?>	
	</article>
<?php endwhile; endif; ?>
<footer class="footer">
<?php //get_template_part( 'nav', 'below-single' ); ?>
</footer>
	</div>
	</div>
</section>
<?php //get_sidebar(); ?>
<?php //get_footer(); ?>