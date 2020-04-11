<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'clearfix', $product ); ?>>
	<div class="backbtn"><a href="javascript:history.back()"><img src="<?php bloginfo('template_directory'); ?>/img/back-btn-arrow.png"> <span>BACK</span></a></div>
	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>
<?php
	$query = new WP_Query(array( 
		'post_type'=> 'product',
		'posts_per_page' => 4,
		'orderby' => 'date',
		'order' => 'desc',
		) 
	);	
	?>

<div class="related-products clearfix">
	<div class="wide-title"><div class="line"></div>
		<div class="title">Related Products</div>
		<div class="line"></div>
	</div>
	<ul class="product-lists clearfix">
		<?php 
		$product_thumb = '';
		while($query->have_posts()): $query->the_post(); 
		global $product, $woocommerce, $post;
		$thumb_id = get_post_thumbnail_id($product->get_id());
		if(!empty($thumb_id)){
		    $product_thumb = cbv_get_image_tag($thumb_id, 'prodgrid');
		}
		?>
		<li class="product-list gallery-col">

		<div class="product-grid-inr">
		<div class="fl-product-grd-img"><a href="<?php echo get_permalink( $product->get_id() ); ?>" class="overlay-link"></a>
		<?php echo $product_thumb; ?>
		</div>
		<div class="fl-product-grd-des">
		    <h5 class="fl-product-grd-title"><a href="<?php echo get_permalink( $product->get_id() ); ?>"><?php echo get_the_title(); ?></a></h5>
		    <div class="fl-taxo">
		    	<span class="fl-taxo1">Oil on Canvas</span>
		    	<span class="fl-taxo2">Artist name</span>
		    </div>
		</div>
		<div class="wc-enquire">
			<?php
			 if ($product->get_price() <= 0){
			?>
			<a href="#">Enquire</a>
			<?php }else{ ?>
				<div class="loop-price">
		         	<strong class="price-label">Price:</strong><?php echo $product->get_price_html(); ?>
		        </div>
			<?php } ?>
		</div>
		 
		</div>
		</li>
		<?php endwhile; ?>
	</ul>
</div>	
<?php do_action( 'woocommerce_after_single_product' ); ?>
