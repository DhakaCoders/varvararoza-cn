<?php
/**
 * News Archive
 *
 * @author    Varvara Roza Galleries
 * @copyright 2019 The PHA Group
 * @version   1.0
 */

get_header(); ?>

	<?php if (have_posts()) : ?>

		<div class="content-wrap news-archive-page" data-aos="fade">

			<section class="page-title">

				<div class="container-fluid">

	            <div class="bg-overlay">
	                <img src="<?php bloginfo('template_directory'); ?>/img/menulogo.svg" alt="menu logo">
	            </div>

					<h1>News</h1>
					<a class="readmore" href="<?php echo get_post_type_archive_link('exhibitions'); ?>"><span>View upcoming exhibitions<img alt="right arrow" class="style-svg" src="<?php bloginfo('template_directory'); ?>/img/right-arrow.svg"></span></a>

				</div>

			</section>

			<section class="news-posts"> 

				<div class="container-fluid">

					<div class="row">

				<?php while (have_posts()): the_post(); ?>
					
				<a href="<?php echo get_permalink($p->ID); ?>" class="col-lg-3 col-md-6 news-col" data-aos="fade">

					<div class="img-wrap">

					  <?php if ( has_post_thumbnail($p->ID) ) { ?>

						<?php echo get_the_post_thumbnail($p->ID, 'news'); ?>
					 
					  <?php } else { ?>
						
						<?php echo wp_get_attachment_image(287, 'news'); ?>
					  
					  <?php } ?>  


					</div>

					<div class="text-wrap">

						<h6><?php echo get_the_title($p->ID); ?></h6>
						<div class="readmore"><span>Read more</span><img alt="right arrow" class="style-svg" src="<?php bloginfo('template_directory'); ?>/img/right-arrow.svg"></div>

					</div>

				</a>
		            
				<?php endwhile; ?>

					</div>

				</div>

			</section>

			<section class="news-pagination">

				<div class="container-fluid">

					<div class="pagination-wrap">

					<?php
					echo paginate_links( array(
					    'mid_size'        => 10,
					    'prev_text'       => __(''),
					    'next_text'       => __('')
					) );
					?>

					</div>

				</div>

			</section>

		</div>

	<?php endif; ?>

<?php get_footer(); ?>