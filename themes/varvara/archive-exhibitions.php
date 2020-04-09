<?php
/**
 * Exhibitions Archive
 *
 * @author    Varvara Roza Galleries
 * @copyright 2019 The PHA Group
 * @version   1.0
 */

get_header(); ?>

<div class="content-wrap exhibitions-archive-page">

<?php $nextexhibition = get_field('next_exhibition', 32); ?>
<?php $upcomingexhibitions = get_field('upcoming_exhibitions', 32); ?>
<?php $previousexhibitions = get_field('previous_exhibitions', 32); ?>

<?php if ($nextexhibition) { ?>

	<section class="next-exhibition">

		<div class="container-fluid">

			<?php foreach( $nextexhibition as $p):  ?>

				<div class="row">

					<div class="col-md-6 image-col" data-aos="fade-right">

					  <?php if ( has_post_thumbnail($p->ID) ) { ?>

						<?php echo get_the_post_thumbnail($p->ID, 'nextexhibition'); ?>
					 
					  <?php } else { ?>

						<?php echo wp_get_attachment_image(84, 'nextexhibition'); ?>

					  <?php } ?>  	 

					</div>

					<div class="col-md-6 text-col" data-aos="fade-left">

						<div class="details">

							<p class="next">NEXT EXHIBITION</p>
							<p class="date"><?php echo get_field('date_from', $p->ID); ?><?php if (get_field('date_to', $p->ID)) { ?> - <?php echo get_field('date_to', $p->ID); ?><?php } ?></p>						
							<?php if (get_field('address', $p->ID)) { ?><p class="address"><?php echo get_field('address', $p->ID); ?></p><?php } ?>

						</div>

						<div class="titles">

							<h1><?php echo get_the_title($p->ID); ?></h1>
							<a href="<?php echo get_permalink($p->ID); ?>">View displayed artwork<img alt="right arrow" class="style-svg" src="<?php bloginfo('template_directory'); ?>/img/right-arrow.svg"></a>

						</div>

						<div class="book-ticket">

							<?php if (get_field('eventbrite_link', $p->ID)) { ?>

								<noscript><a href="https://www.eventbrite.co.uk/e/stavros-ditsios-tickets-<?php the_field('eventbrite_link', $p->ID); ?>" rel="noopener noreferrer" target="_blank"></noscript>
								<!-- You can customize this button any way you like -->
								<button class="btn" id="eventbrite-widget-modal-trigger-<?php the_field('eventbrite_link', $p->ID); ?>" type="button">Book ticket</button>
								<noscript></a>Buy Tickets on Eventbrite</noscript>

								<script src="https://www.eventbrite.co.uk/static/widgets/eb_widgets.js"></script>

								<script type="text/javascript">
								    var exampleCallback = function() {
								        console.log('Order complete!');
								    };

								    window.EBWidgets.createWidget({
								        widgetType: 'checkout',
								        eventId: '<?php the_field('eventbrite_link', $p->ID); ?>',
								        modal: true,
								        modalTriggerElementId: 'eventbrite-widget-modal-trigger-<?php the_field('eventbrite_link', $p->ID); ?>',
								        onOrderComplete: exampleCallback
								    });
								</script>

							<?php } ?>

						</div>

					</div>

				</div>

			<?php endforeach; ?>

		</div>

	</section>

<?php } ?>


<section class="ex-upcoming-slider-sec-wrp">
	<div class="container-fluid">
	  <div class="row">
	  	<div class="col-sm-12">
	  	  <div class="ex-upcoming-slider-wrp">
	  	  	 <div class="wide-title" data-aos="fade"><div class="line"></div><div class="title">UpCOMING EXHIbitions</div><div class="line"></div></div>
	  	  	 <div class="ex-upcoming-slider">
	  	  	 	<div class="ex-upcoming-slide-item">
	  	  	 	  <div class="ex-upcoming-slide-two-part clearfix">
	  	  	 	  	<div class="ex-upcoming-slide-two-lft">
	  	  	 	  	  <div class="ex-upcoming-slide-two-img" style="background-image:url(img/ex-upcoming-slide-two-img.png);">
	  	  	 	  	  	<!-- <img src="img/ex-upcoming-slide-two-img.png"> -->
	  	  	 	  	  </div>
	  	  	 	  	</div>
	  	  	 	  	<div class="ex-upcoming-slide-two-rgt">
	  	  	 	  	   <div class="ex-upcoming-slide-two-dsc">
	  	  	 	  	   	 <span>UPCOMING</span>
	  	  	 	  	   	 <span>2nd December 2019 - 20th December 2019</span>
	  	  	 	  	   	 <span>J/M Gallery, 230 Portobelo Road, London, W11 1LJ</span>
	  	  	 	  	   	 <h2 class="ex-upcoming-slide-two-title">Maria Chatzilampou</h2>
	  	  	 	  	   	 <a href="#">View displayed artwork</a>
	  	  	 	  	   	 <div class="ex-upcoming-btn">
	  	  	 	  	   	 	<a href="#">Ticket Request</a>
	  	  	 	  	   	 </div>
	  	  	 	  	   </div>
	  	  	 	  	</div>
	  	  	 	  </div>
	  	  	 	</div>
	  	  	 </div>
	  	  </div>
	  	</div>
	  </div>
	</div>
</section>


<?php if ($upcomingexhibitions) { ?>

	<section class="upcoming-exhibitions">

			<div class="wide-title" data-aos="fade"><div class="line"></div><div class="title">UPCOMING EXHIBITIONS</div><div class="line"></div></div>

			<div class="container-fluid">

			<?php foreach( $upcomingexhibitions as $p):  ?>

				<div class="row">

					<div class="col-md-5 image-col" data-aos="fade-right">

					  <?php if ( has_post_thumbnail($p->ID) ) { ?>
					  	
						<?php echo get_the_post_thumbnail($p->ID, 'upcomingexhibition'); ?>
					 
					  <?php } else { ?>

						<?php echo wp_get_attachment_image(84, 'upcomingexhibition'); ?>

					  <?php } ?>  	 
							

						</div>

					<div class="col-md-7 text-col" data-aos="fade-left">

						<div class="details">

							<p class="next">UPCOMING EXHIBITION</p>
							<p class="date"><?php echo get_field('date_from', $p->ID); ?><?php if (get_field('date_to', $p->ID)) { ?> - <?php echo get_field('date_to', $p->ID); ?><?php } ?></p>						

						</div>

						<div class="titles">

							<h2><?php echo get_the_title($p->ID); ?></h2>
							<a href="<?php echo get_permalink($p->ID); ?>">View displayed artwork<img alt="right arrow" class="style-svg" src="<?php bloginfo('template_directory'); ?>/img/right-arrow.svg"></a>

						</div>

						<div class="book-ticket">

							<?php if (get_field('eventbrite_link', $p->ID)) { ?>

								<noscript><a href="https://www.eventbrite.co.uk/e/stavros-ditsios-tickets-<?php the_field('eventbrite_link', $p->ID); ?>" rel="noopener noreferrer" target="_blank"></noscript>
								<!-- You can customize this button any way you like -->
								<button class="btn" id="eventbrite-widget-modal-trigger-<?php the_field('eventbrite_link', $p->ID); ?>" type="button">Book ticket</button>
								<noscript></a>Buy Tickets on Eventbrite</noscript>

								<script src="https://www.eventbrite.co.uk/static/widgets/eb_widgets.js"></script>

								<script type="text/javascript">
								    var exampleCallback = function() {
								        console.log('Order complete!');
								    };

								    window.EBWidgets.createWidget({
								        widgetType: 'checkout',
								        eventId: '<?php the_field('eventbrite_link', $p->ID); ?>',
								        modal: true,
								        modalTriggerElementId: 'eventbrite-widget-modal-trigger-<?php the_field('eventbrite_link', $p->ID); ?>',
								        onOrderComplete: exampleCallback
								    });
								</script>

							<?php } ?>

						</div>

					</div>

				</div>

			<?php endforeach; ?>

		</div>

	</section>

<?php } ?>

<?php if ($previousexhibitions) { ?>

	<section class="previous-exhibitions">

		<div class="wide-title" data-aos="fade"><div class="line"></div><div class="title">PREVIOUS EXHIBITIONS</div><div class="line"></div></div>

		<div class="container-fluid">

			<div class="row">

			<?php foreach( $previousexhibitions as $p):  ?>

				<a href="<?php echo get_permalink($p->ID); ?>" class="col-lg-3 col-md-6 exhibition-col" data-aos="fade">

					<div class="img-wrap">

					  <?php if ( has_post_thumbnail($p->ID) ) { ?>
					  	
						<?php echo get_the_post_thumbnail($p->ID, 'prevexhibition'); ?>
					 
					  <?php } else { ?>

						<?php echo wp_get_attachment_image(84, 'prevexhibition'); ?>

					  <?php } ?>  	 

					</div>

					<div class="text-wrap">

						<h6><?php echo get_the_title($p->ID); ?></h6>
						<p class="date"><?php echo get_field('date_from', $p->ID); ?><?php if (get_field('date_to', $p->ID)) { ?> - <?php echo get_field('date_to', $p->ID); ?><?php } ?></p>

					</div>

				</a>

			<?php endforeach; ?>

			</div>

		</div>

	</section>

<?php } ?>

</div>

<?php get_footer(); ?>