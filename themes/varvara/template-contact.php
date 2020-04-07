<?php
/**
Template Name: Contact
 */

get_header(); ?>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()): the_post(); ?>
			
		<div class="content-wrap contact-wrap">

			<section class="contact-main">

	            <div class="bg-overlay">
	                <img src="<?php bloginfo('template_directory'); ?>/img/menulogo.svg" alt="menu logo">
	            </div>

				<div class="container-fluid">

					<div class="row">

						<div class="col-md-5 text-col" data-aos="fade-right">

							<div class="text-wrap">

								<h1><?php echo get_the_title(); ?></h1>
								<div class="the-content"><?php echo get_the_content(); ?></div>

							</div>

							<div class="social-wrap">

								<?php 
								$link = get_field('instagram_url', 'option');
								if( $link ): 
								    $link_url = $link['url'];
								    $link_title = $link['title'];
								    $link_target = $link['target'] ? $link['target'] : '_self';
								    ?>
								<h3>Social</h3>
								<div class="instagram-link"><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/Instagram-black.svg" alt="instagram icon"><?php echo esc_html( $link_title ); ?></a></div>
								<?php endif; ?>
							</div>

						</div>

						<div class="col-md-7 contact-col" data-aos="fade-left">

							<div class="contact-form-wrap">

								<?php echo do_shortcode('[contact-form-7 id="222" title="Contact form 1"]'); ?>

							</div>

						</div>

					</div>

				</div>

			</section>

			<?php $gexhibitions = get_field('exhibitions', 'option'); ?>

		<?php if ($gexhibitions) { ?>

			<section class="global-exhibitions">

				<div class="wide-title"><div class="line"></div><div class="title">EXHIBITIONS</div><div class="line"></div></div>

					<div class="container-fluid">

						<div class="row">

						<?php foreach( $gexhibitions as $p): // variable must be called $post (IMPORTANT) ?>

							<a href="<?php echo get_permalink($p->ID); ?>" class="col-lg-3 col-md-6 exhibition-col" data-aos="fade">

								<div class="img-wrap">

								  <?php if ( has_post_thumbnail($p->ID) ) { ?>
								  	
									<?php echo get_the_post_thumbnail($p->ID, 'prevexhibition'); ?>
								 
								  <?php } else { ?>

									<?php echo wp_get_attachment_image(84, 'prevexhibition'); ?>

								  <?php } ?>  	 

								</div>

								<div class="text-wrap">

								<?php $datefrom = get_field('date_from', $p->ID); ?>
								<?php $dateto = get_field('date_to', $p->ID); ?>
								<?php $datefromnew = DateTime::createFromFormat('jS F Y', $datefrom); ?>
								<?php $datetonew = DateTime::createFromFormat('jS F Y', $dateto); ?>

									<h6><?php echo get_the_title($p->ID); ?></h6>
									<p class="date"><?php echo $datefromnew->format('jS F'); ?><?php if (get_field('date_to', $p->ID)) { ?> - <?php echo $datetonew->format('jS F'); ?><?php } ?></p>

								</div>

							</a>

						<?php endforeach; ?>

						</div>

					</div>

			</section>

			<?php } ?>
          
           
		</div>

		<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>