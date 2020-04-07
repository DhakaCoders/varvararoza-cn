<?php
/**
Template Name: Sitemap
 */

get_header(); ?>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()): the_post(); ?>
			
			<div class="content-wrap sitemap-wrap">

			<div class="container-fluid">

			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>

			</div>

			</div>
            
		<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>