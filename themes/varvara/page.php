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
			<?php if( is_cart() OR is_checkout() OR is_account_page() OR is_wc_endpoint_url() ) echo '<div class="woo-page-cntlr">'; ?>

			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>
			<?php if( is_cart() OR is_checkout() OR is_account_page() OR is_wc_endpoint_url() ) echo '</div>'; ?>
			</div>

			</div>
            
		<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>