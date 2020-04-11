<?php
/**
Template Name: About
 */

get_header(); ?>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()): the_post(); ?>
			
		<div class="content-wrap about-wrap">

			<section class="about-section1">

            <div class="bg-overlay">
                <img src="<?php bloginfo('template_directory'); ?>/img/menulogo.svg" alt="menu logo">
            </div>

				<div class="container-fluid">

					<div class="row">

					<div class="col-md-5 image-col order-md-2" data-aos="fade-left">

						<?php $image = get_field('section1_image'); 

					    $alt = $image['alt'];
					    $size = 'about';
					    $thumb = $image['sizes'][ $size ]; ?>

						<?php if ($image) { ?>
							<img class="ignorethis" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
						<?php } ?>

					</div>

					<div class="col-md-7 text-col order-md-1" data-aos="fade-right">

						<div class="titles">

						<?php if (get_field('section1_title')) { ?><h1><?php echo get_field('section1_title'); ?></h1><?php } ?>
						<?php if (get_field('section1_subtitle')) { ?><span><?php echo get_field('section1_subtitle'); ?></span><?php } ?>

						</div>

						<div class="content">

							<?php if (get_field('section1_text')) { ?><?php echo get_field('section1_text'); ?><?php } ?>

						</div>

					</div>

					</div>

				</div>

			</section>


			<?php 
				$sec2 = get_field('sec2', get_the_ID());
				if($sec2): 
					$interviews = $sec2['interviews'];
			?>
			<section class="about-interview-sec-wrp">
			  <div class="container-fluid">
				<div class="row">
				  <div class="col-sm-12">
				  	<?php if( !empty($sec2['title']) ): ?>
				  	<div class="wide-title" data-aos="fade"><div class="line"></div>
				  	<div class="title"><?php echo $sec2['title']; ?></div>
				  	<div class="line"></div>
				    </div>
					<?php endif; ?>
					<?php if( $interviews ): ?>
				  	 <div class="about-interview-slider-wrp">
				  	   <div class="AboutInterviewSlider">
				  	   	<?php 
				  	   		foreach( $interviews as $interview ): 
				  	   	?>
				  	   	<div class="about-interview-slide-item">
				  	   	  <div class="about-interview-slide-dsc">
				  	   	  	<?php if( !empty($interview['date']) ) printf('<span>%s</span>', date('jS F', strtotime($interview['date']))) ?>
				  	   	  	<?php if( !empty($interview['title']) ) printf('<h3>%s</h3>', $interview['title']) ?>
				  	   	  	<?php if( !empty($interview['link']) ): ?>
				  	   	  	<a href="<?php echo $interview['link']; ?>">READ MORE</a>
				  	   	  	<?php endif; ?>
				  	   	  </div>
				  	   	</div>
				  	   <?php endforeach; ?>
				  	   </div>
				  	   </div>
				  	   <?php endif; ?>
				  	 </div>
				  </div>
				</div>
			</section>
			<?php endif; ?>


			<section class="about-section2"  style="<?php $image = get_field('section2_image'); $size = 'aboutbg'; $thumb = $image['sizes'][ $size ]; if ($image) { ?>background-image: url(<?php echo $thumb;?>); <?php } else { ?> background-color:black <?php } ?>">

				<div class="container-fluid">

					<div class="row">

						<div class="col-md-5 logo-col" data-aos="fade-right"> 

							<?php if (get_field('section2_logo')) { ?><img src="<?php echo get_field('section2_logo'); ?>" alt="logo"><?php } ?>

						</div>

						<div class="col-md-7 text-col" id="about-anchor" data-aos="fade-left">

							<div class="contents">
								<?php if (get_field('section2_text')) { ?><?php echo get_field('section2_text'); ?><?php } ?>
							</div>

						</div>

					</div>

				</div>

			</section>

			<section class="about-section3" data-aos="fade" data-aos-anchor="#about-anchor">

				<div class="container-fluid">

					<div class="row">

						<?php $images = get_field('gallery');
						if( $images ): ?>

						        <?php foreach( $images as $image ): ?>
						        	<?php $size = 'aboutgallery'; $thumb = $image['sizes'][ $size ]; ?>
						        	<a href="<?php echo get_field('gallery_link'); ?> " class="col-md-3 image-col head-title-line" style="background-image:url(<?php echo $thumb; ?>)">
						        		<div class="overlay">

						        			<span>View gallery images<img alt="right arrow" class="style-svg" src="<?php bloginfo('template_directory'); ?>/img/right-arrow.svg"></span>

						        		</div>
						            </a>
						        <?php endforeach; ?>

						<?php endif; ?>

					</div>

				</div>

			</section>

		<?php $gexhibitions = get_field('exhibitions', 'option'); ?>

		<?php if ($gexhibitions) { ?>

			<section class="global-exhibitions">

				<div class="wide-title" data-aos="fade"><div class="line"></div><div class="title">EXHIBITIONS</div><div class="line"></div></div>

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