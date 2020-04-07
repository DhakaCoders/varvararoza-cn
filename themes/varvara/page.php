<?php
/**
 * Default Page
 *
 * @author    Varvara Roza Galleries
 * @copyright 2019 The PHA Group
 * @version   1.0
 */

get_header(); ?>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()): the_post(); ?>
			
			<div class="content-wrap">

			<div class="container-fluid">

			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>

			</div>

			</div>
            
		<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>