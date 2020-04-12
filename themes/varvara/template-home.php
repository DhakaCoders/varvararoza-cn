<?php
/**
Template Name: Home
 */

get_header(); ?>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()): the_post(); ?>
			
		<div class="content-wrap home-wrap">

		 <section class="homepage"> 	

				<?php if( have_rows('slider') ): ?>

					<?php $slidecount = 0; ?>

					<div class="homepage__home-slider">

						   <?php while ( have_rows('slider') ) : the_row(); ?>

						   	<?php $slidecount++; ?>

						   		<div class="slidecount-<?php echo $slidecount; ?> homepage__home-slider__background colour-<?php echo get_sub_field('slider_colour'); ?> type-<?php echo get_sub_field('slider_type'); ?>" data-attr="<?php echo get_sub_field('slider_colour'); ?>">

						   		<div class="bg-overlay" style="<?php $image = get_sub_field('image'); $size = 'slider'; $thumb = $image['sizes'][ $size ]; if ($image) { ?>background-image: url(<?php echo $thumb;?>); <?php } else { ?> background-color:black <?php } ?>"></div>
						   			
									<div class="container-fluid">
 
										<?php if (get_sub_field('slider_type') == 'home') { ?>

											<div class="slider-pos-center slider-home-contents">

												<?php $image = get_sub_field('logo'); 
												$alt = $image['alt']; ?>
												<?php if ($image) { ?>
													<div id="lottie" class="custom-svg-anim">

												</div>
												<?php } ?>
												<?php if (get_sub_field('logo_caption')) { ?><h1><?php the_sub_field('logo_caption'); ?></h1><?php } ?>

											</div>

											<a href="<?php echo get_sub_field('link'); ?>" class="slider-pos-bottom slider-main-contents">

												<?php if (get_sub_field('subtitle')) { ?><span class="sub"><?php the_sub_field('subtitle'); ?></span><?php } ?>
												<?php if (get_sub_field('title')) { ?><div class="title-wrap"><h2><?php the_sub_field('title'); ?></h2><div class="arrow"><img class="style-svg" src="<?php bloginfo('template_directory'); ?>/img/Rollover-details.svg" alt="rollover details"><span>Details</span></div></div><?php } ?>

											</a>

										<?php } else { ?>

										<a href="<?php echo get_sub_field('link'); ?>" class="slider-pos-center slider-main-contents">

												<?php if (get_sub_field('subtitle')) { ?><span class="sub"><?php the_sub_field('subtitle'); ?></span><?php } ?>
												<?php if (get_sub_field('title')) { ?><div class="title-wrap"><h2><?php the_sub_field('title'); ?></h2><div class="arrow"><img class="style-svg" src="<?php bloginfo('template_directory'); ?>/img/Rollover-details.svg" alt="rollover details"><span>Details</span></div></div><?php } ?>

											</a>

										<?php } ?>

										<div class="slider-bottom">

											<?php if (get_sub_field('name')) { ?><span><strong><?php the_sub_field('name'); ?></strong></span><br><?php } ?>
											<?php if (get_sub_field('artist')) { ?><span><?php the_sub_field('artist'); ?></span><?php } ?>

										</div>

									</div>

						   		</div>

						    <?php endwhile; ?>

					</div>

					<footer class="mastfoot home-footer">

					<div class="container-fluid">

						<div class="footer-right footer-list footer-list-1">
							<?php 
							$fblink = get_field('facebook_url', 'option');
							if( $fblink && !empty($fblink) ): 
							    ?>
					       <span class="instagram-link">
					    	<a href="<?php echo esc_url( $fblink ); ?>" target="_blank"><img class="style-svg" src="<?php bloginfo('template_directory'); ?>/img/instagramicon.svg" alt="instagram icon"></a></span> 
							<?php endif; ?>
							<?php 
							$inslink = get_field('instagram_url', 'option');
							if( $inslink && !empty($inslink) ): 
							?>
					       <span class="instagram-link">
					    	<a href="<?php echo esc_url( $inslink ); ?>" target="_blank"><img class="style-svg" src="<?php bloginfo('template_directory'); ?>/img/instagramicon.svg" alt="instagram icon"></a></span> 
							<?php endif; ?>


							<?php 
							$link = get_field('newsletter_link', 'option');
							if( $link ): 
							    $link_url = $link['url'];
							    $link_title = $link['title'];
							    $link_target = $link['target'] ? $link['target'] : '_self';
							    ?>
							    <span><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></span>
							<?php endif; ?>

						</div>

						<div class="footer-right footer-list footer-list-2">

							<?php 
							$link = get_field('privacy_link', 'option');
							if( $link ): 
							    $link_url = $link['url'];
							    $link_title = $link['title'];
							    $link_target = $link['target'] ? $link['target'] : '_self';
							    ?>
							    <span><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></span> <span class="sep">|</span> 
							<?php endif; ?>
							<span><?php echo get_field('copyright_text', 'option'); ?></span>


						</div>

					</div>

				</footer>

				<?php endif; ?>

		 </section>
            
		</div>

		<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>