<?php
/**
 * Exhibitions Single
 *
 * @author    Varvara Roza Galleries
 * @copyright 2019 The PHA Group
 * @version   1.0
 */

get_header(); ?>

<div class="content-wrap exhibitions-single-page">

	<section class="exhibition-titles" data-aos="fade">

		<div class="container-fluid">

            <div class="bg-overlay">
                <img src="<?php bloginfo('template_directory'); ?>/img/menulogo.svg" alt="menu logo">
            </div>

			<div class="titles-main">

				<p class="date"><?php echo get_field('date_from') ?><?php if (get_field('date_to')) { ?> - <?php echo get_field('date_to'); ?><?php } ?></p>
				<h1><?php echo get_the_title(); ?></h1>
				<?php if (get_field('eventbrite_link')) { ?>

					

<noscript><a href="https://www.eventbrite.co.uk/e/stavros-ditsios-tickets-<?php the_field('eventbrite_link'); ?>" rel="noopener noreferrer" target="_blank"></noscript>
<!-- You can customize this button any way you like -->
<button class="btn" id="eventbrite-widget-modal-trigger-<?php the_field('eventbrite_link'); ?>" type="button">Book ticket</button>
<noscript></a>Buy Tickets on Eventbrite</noscript>

<script src="https://www.eventbrite.co.uk/static/widgets/eb_widgets.js"></script>

<script type="text/javascript">
    var exampleCallback = function() {
        console.log('Order complete!');
    };

    window.EBWidgets.createWidget({
        widgetType: 'checkout',
        eventId: '<?php the_field('eventbrite_link'); ?>',
        modal: true,
        modalTriggerElementId: 'eventbrite-widget-modal-trigger-<?php the_field('eventbrite_link'); ?>',
        onOrderComplete: exampleCallback
    });
</script>

				<?php } ?>




			</div>

			<div class="titles-details">
				<?php if (get_field('address')) { ?><p class="address"><?php echo get_field('address'); ?></p><?php } ?>
				<?php if (get_field('times')) { ?><p class="times"><?php echo get_field('times'); ?></p><?php } ?>
			</div>

		</div>

	</section>



	<section class="exhibition-content" data-aos="fade-up">

		<div class="container-fluid">

			<?php echo get_the_content(); ?>

		</div>

	</section>

	<section class="exhibition-gallery">

		<div class="container-fluid">

		<?php if( have_rows('gallery') ): ?>

			<div class="row">

				<?php $gallerycount = 0; ?>

				<?php while ( have_rows('gallery') ) : the_row(); ?>

				<?php $gallerycount++; ?>

					<div class="col-md-3 gallery-col<?php if ($gallerycount > 4) { ?> align-bottom<?php } ?>" data-aos="fade-up">
						
						<?php 
						$image = get_sub_field('image'); 
						$url = $image['url'];
						$title = $image['title'];
						$alt = $image['alt']; 
						if ($gallerycount == 1 || $gallerycount == 3 || $gallerycount == 6 || $gallerycount == 8) {
						$size = 'gallery1';
						} else if ($gallerycount == 2 || $gallerycount == 4 || $gallerycount == 5 || $gallerycount == 7) {
						$size = 'gallery2';	
						}
						$sizemob = 'gallerymob';
    					$thumb = $image['sizes'][ $size ]; 
    					$thumbmob = $image['sizes'][ $sizemob ]; ?>

						<a data-fancybox="gallery" class="image-wrap" href="<?php echo esc_url($url); ?>" title="<?php echo esc_attr($title); ?>">
        					<img class="main-image" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
							<img class="mob-image" src="<?php echo esc_url($thumbmob); ?>" alt="<?php echo esc_attr($alt); ?>" />
	    				</a>

						<div class="text-wrap">
							<p class="type"><?php echo get_sub_field('type'); ?></p>
							<p class="dimensions"><?php echo get_sub_field('dimensions'); ?></p>
						</div>

						<div class="enquire">
							<a href="mailto:<?php echo get_field('enquiry_email'); ?>" class="btn">Enquire</a>
						</div>

					</div>

					<?php if ($gallerycount == 8) {
						$gallerycount = 0;
					} ?>	

				<?php endwhile; ?>

			</div>

		<?php endif; ?>

	</div>

	</section>

</div>

<?php get_footer(); ?>