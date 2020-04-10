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

<section >
	
</section>

<section class="product-archive">
	<div class="content-wrap">
		<div class="container-fluid">
			<div class="product-filter clearfix">
				<div class="filter-lft fl-filter-cntlr clearfix">
				   <div class="drop-filter filter-1">
					   <form>
					   		<select class="selectpicker">
			                  <option selected="selected">ALL ARTISTS</option>
			                   <option>Maart 1</option>
			                   <option>Maart 2</option>
			                   <option>Maart 3</option>
			                   <option>Maart 4</option>
			                </select> 
					   </form>
				   </div>
				   <div class="drop-filter filter-2">
					   <form>
					   		<select class="selectpicker">
			                  <option selected="selected">ALL METHODS</option>
			                   <option>Maart 1</option>
			                   <option>Maart 2</option>
			                   <option>Maart 3</option>
			                   <option>Maart 4</option>
			                </select> 
					   </form>
				   </div>
				   <div class="drop-filter filter-3">
					   <form>
					   		<select class="selectpicker">
			                  <option selected="selected">TYPE OF ART</option>
			                   <option>Maart 1</option>
			                   <option>Maart 2</option>
			                   <option>Maart 3</option>
			                   <option>Maart 4</option>
			                </select> 
					   </form>
				   </div>
				</div>
				<div class="filter-rgt fl-filter-cntlr clearfix">
				   <div class="drop-filter filter-4">
					   <form>
					   		<select class="selectpicker">
			                  <option selected="selected">SORT BY</option>
			                   <option>DESC</option>
			                   <option>ASC</option>
			                </select> 
					   </form>
				   </div>
				</div>
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
			        <div class="taxo">
			        	<span class="taxo1">Oil on Canvas</span>
			        	<span class="taxo2">Artist name</span>
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
	</div>
</section>

<div class="fl-modal-btn">
	<button type="button" class="" data-toggle="modal" data-target="#enquire_modal">enquire</button>
</div>

<div class="modal fade" id="enquire_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        <div class="modal-body">
          <span class="modal-bx-title">login to your account</span>
          <form>
            <input type="text"  placeholder="Your phone number">
            <input type="password"  placeholder="Your password">
            <div class="text-center"><a class="forgot-title" href="#">Forgot password?</a></div>
            <input type="submit" value="LOGIN">
          </form>
        </div>
      </div>
    </div>
  </div> 

<?php
get_footer( 'shop' );
