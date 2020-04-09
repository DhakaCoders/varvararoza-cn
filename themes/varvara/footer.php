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
				$link = get_field('instagram_url', 'option');
				if( $link ): 
				    $link_url = $link['url'];
				    $link_title = $link['title'];
				    $link_target = $link['target'] ? $link['target'] : '_self';
				    ?>
				    <span class="instagram-link"><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><img class="style-svg" src="<?php bloginfo('template_directory'); ?>/img/instagramicon.svg" alt="instagram icon"><?php echo esc_html( $link_title ); ?></a></span> <span class="sep">|</span> 
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
	
	</body>
</html>