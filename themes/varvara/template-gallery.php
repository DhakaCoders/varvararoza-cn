<?php
/**
Template Name: Gallery
 */

get_header(); ?>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()): the_post(); ?>
			
		<div class="content-wrap gallery-wrap" data-aos="fade">

			<section class="page-title">

				<div class="container-fluid">

	            <div class="bg-overlay">
	                <img src="<?php bloginfo('template_directory'); ?>/img/menulogo.svg" alt="menu logo">
	            </div>

					<h1><?php echo get_the_title(); ?></h1>
					<a class="readmore" href="<?php echo get_post_type_archive_link('exhibitions'); ?>"><span>View upcoming exhibitions<img alt="right arrow" class="style-svg" src="<?php bloginfo('template_directory'); ?>/img/right-arrow.svg"></span></a>

				</div>

			</section>

			<section class="gallery-section">

				<div class="container-fluid">

					<?php $images = get_field('gallery');

					if( $images ): ?>
						<div class="grid">
 						<div class="grid-sizer"></div>
  						<div class="gutter-sizer"></div>
						<?php $gallerycount = 0; ?>
					        <?php foreach( $images as $image ): ?>
					        	<?php if($gallerycount % 2 == 0){
					        		$size = 'galleryp2';
					        	} else {
					        		$size = 'galleryp1';
	   			   	  	    	} ?>
	   			   	  	    	<?php $url = $image['url']; ?>
					        	<?php $thumb = $image['sizes'][ $size ]; ?>
					        	<a data-fancybox="gallery" href="<?php echo esc_url($url); ?>" class="image grid-item" data-aos="fade">
					        		<img class="main-image ignorethis" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
					            </a>
					        <?php endforeach; ?>
					    </div>
					<?php endif; ?>

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