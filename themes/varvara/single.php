<?php
/**
 * Single post
 *
 * @author    Varvara Roza Galleries
 * @copyright 2019 The PHA Group
 * @version   1.0
 */

get_header(); ?>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()): the_post(); ?>
			
			<div class="content-wrap news-page" data-aos="fade">

				<section class="page-title">

					<div class="container-fluid">

		            <div class="bg-overlay">
		                <img src="<?php bloginfo('template_directory'); ?>/img/menulogo.svg" alt="menu logo">
		            </div>

					<h1><?php the_title(); ?></h1>

					</div> 

				</section>

				<section class="news-contents">

					<div class="container-fluid">

						<div class="row">

							<div class="col-md-4 image-share-col">

								<div class="the-image">

								  <?php if ( has_post_thumbnail($p->ID) ) { ?>

									<?php echo get_the_post_thumbnail($p->ID, 'news'); ?>
								 
								  <?php } else { ?>
									
									<?php echo wp_get_attachment_image(287, 'news'); ?>
								  
								  <?php } ?>  

								</div>

								<div class="share-links">

									<p>Share article via..</p>
									<div class="the-share-links">
									<p><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=&summary=&source="><img src="<?php bloginfo('template_directory'); ?>/img/linkedin.svg" class="style-svg" alt="linkedin icon"><span>Linkedin</span></a></p>
									<p><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/facebook.svg" class="style-svg" alt="facebook icon"><span>Facebook</span></a></p>
									<p><a href="mailto:enteremailhere@gmail.com?&subject=Check%20this%20article%20out!&body=<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/email.svg" class="style-svg" alt="email icon"><span>Email</span></a></p>
									</div>
								</div>

							</div>

							<div class="col-md-8 text-col">

								<div class="the-details">

									<span>Written by <?php echo get_the_author(); ?> • Published <?php echo get_the_date(); ?></span>

								</div>

								<div class="the-content">

									<?php echo get_the_content(); ?>

								</div>

							</div>

						</div>

					</div>

				</section>

				<?php $args = array("posts_per_page" => 4, "orderby" => "rand");
				  $posts_array = get_posts($args); ?>

				<section class="news-posts related-posts"> 

					<div class="container-fluid">

						<div class="row">

							<?php foreach($posts_array as $p): ?>
								
							<a href="<?php echo get_permalink($p->ID); ?>" class="col-lg-3 col-md-6 news-col">

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
					            
							<?php endforeach; ?>

						</div>

					</div>

				</section>

			</div>
            
		<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>