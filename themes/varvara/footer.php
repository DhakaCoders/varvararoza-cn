<?php if (!is_front_page()) { ?>

	<footer class="mastfoot regular-footer">

		<div class="container-fluid clearfix">

			<div class="footer-border clearfix">

			<div class="footer-left footer-list">

				<span><?php echo get_field('copyright_text', 'option'); ?></span> <span class="sep">|</span> 
				<?php 
				$link = get_field('privacy_link', 'option');
				if( $link ): 
				    $link_url = $link['url'];
				    $link_title = $link['title'];
				    $link_target = $link['target'] ? $link['target'] : '_self';
				    ?>
				    <span><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></span>
				<?php endif; ?>

			</div>

			<div class="footer-right footer-list">


				<?php 
					$fblink = get_field('facebook_url', 'option');
					if( $fblink ): 
					    ?>
			       <span class="instagram-link">
			    	<a href="<?php echo esc_url( $fblink ); ?>" target="_blank"><img class="style-svg" src="<?php bloginfo('template_directory'); ?>/img/instagramicon.svg" alt="instagram icon"></a></span> 
					<?php endif; ?>
					<?php 
					$inslink = get_field('instagram_url', 'option');
					if( $inslink ): 
					    ?>
			       <span class="instagram-link">
			    	<a href="<?php echo esc_url( $inslink ); ?>" target="_blank"><img class="style-svg" src="<?php bloginfo('template_directory'); ?>/img/instagramicon.svg" alt="instagram icon"></a></span> 
				<?php endif; ?>


				<?php 
				$link = get_field('sitemap_link', 'option');
				if( $link ): 
				    $link_url = $link['url'];
				    $link_title = $link['title'];
				    $link_target = $link['target'] ? $link['target'] : '_self';
				    ?>
				    <span><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></span> <span class="sep">|</span> 
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

			</div>

		</div>

	</footer>

<?php } ?>

	<?php wp_footer(); ?>
	
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
        <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
        
		<div class="modal fade enquire_modal" id="enquire_modal" tabindex="-1" role="dialog" aria-labelledby="enquireModalLabel" aria-hidden="true">
		    <div class="modal-dialog" role="document">
		      <div class="modal-content">
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true"><img src="<?php bloginfo('template_directory'); ?>/img/close-modal.png"></span>
		          </button>

		        <div class="modal-body">
		          <div class="fl-enquire-modal-content">
		          	<h3 class="fl-modal-title">Enquire</h3>
		          	<?php 
		          	$fcshortcode = get_field('fcshortcode', 'option');
		          	if( !empty($fcshortcode) ) echo do_shortcode( $fcshortcode );
		          	?>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div> 
	</body>
</html>