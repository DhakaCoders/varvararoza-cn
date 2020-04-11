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

<section class="fl-page-bnr" style="background: url('<?php bloginfo('template_directory'); ?>/img/fl-page-banner.jpg');">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="fl-page-bnr-des">
					<h1 class="fl-page-bnr-title">Shop title here</h1>
					<p>A mini description about this section</p>
				</div>
			</div>
		</div>
	</div>
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
			<?php do_shortcode('[ajax_products]'); ?>
		</div>
	</div>
</section>
<div style="height: 50px;"></div>
<?php
get_footer( 'shop' );
