<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
$query = new WP_Query(array( 
	'post_type'=> 'product',
	'posts_per_page' => 12,
	) 
);
?>
<section class="product-archive">
	<div class="content-wrap">
		<div class="container-fluid">
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
		        <div class="product-grid-img"><a href="<?php echo get_permalink( $product->get_id() ); ?>" class="overlay-link"></a>
		        <?php echo $product_thumb; ?>
		        </div>
		        <div class="product-grid-title">
		        <h5><a href="<?php echo get_permalink( $product->get_id() ); ?>"><?php echo get_the_title(); ?></a></h5>
		        </div>
		        <div class="taxo">
		        	<span class="taxo1">Oil on Canvas</span>
		        	<span class="taxo2">Artist name</span>
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
	</div>
</section>
<?php
get_footer( 'shop' );
