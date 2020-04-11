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
$shopID = get_option( 'woocommerce_shop_page_id' );
$sorting = '';
if(isset($_COOKIE['sorting']) && !empty($_COOKIE['sorting'])) {
	$sorting = $_COOKIE['sorting'];
}

  $artquery = new Wp_Query(array(
    'post_type' => 'artists',
    'post_per_page' => -1
  ));



if( !empty($shopID) ): 
$page = get_post( $shopID ); 
?>

<section class="fl-page-bnr" style="background: url('<?php bloginfo('template_directory'); ?>/img/fl-page-banner.jpg');">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="fl-page-bnr-des">
					<h1 class="fl-page-bnr-title"><?php echo $page->post_title; ?></h1>
					<?php echo wpautop($page->post_content); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
endif; 
if( isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING']) ){
	$type = explode('=', $_SERVER['QUERY_STRING']);
	var_dump($type);
	if( isset($type[0]) && isset($type[1]) && isset($type[2]) ){
		if( ($type[0] == 'artist-id') && ($type[1] == 'method') && ($type[2] == 'arttype') ){
			$qstr = '?artist-id='.$type[0].'&method='.$type[1].'&arttype='.$type[2];

		}elseif( ($type[0] == 'artist-id') && ($type[1] == 'arttype') && ($type[2] == 'method') ){
			$qstr = '?artist-id='.$type[0].'&arttype='.$type[1].'&method='.$type[2];

		}elseif( ($type[0] == 'method') && ($type[1] == 'artist-id') && ($type[2] == 'arttype') ){
			$qstr = '?method='.$type[0].'&artist-id='.$type[1].'&arttype='.$type[2];

		} elseif( ($type[0] == 'method') && ($type[1] == 'arttype') && ($type[2] == 'artist-id') ){
			$qstr = '?method='.$type[0].'&arttype='.$type[1].'&artist-id='.$type[2];

		}elseif( ($type[0] == 'arttype') && ($type[1] == 'method') && ($type[2] == 'artist-id') ){
			$qstr = '?arttype='.$type[0].'&method='.$type[1].'&artist-id='.$type[2];

		}elseif( ($type[0] == 'arttype') && ($type[1] == 'artist-id') && ($type[2] == 'method') ){
			$qstr = '?arttype='.$type[0].'&artist-id='.$type[1].'&method='.$type[2];
		}
		
	} elseif( isset($type[0]) && isset($type[1]) ){
		if( ($type[0] == 'artist-id') && ($type[1] == 'method') ){
			$qstr = '?artist-id='.$type[0].'&method='.$type[1];

		} elseif( ($type[0] == 'artist-id') && ($type[1] == 'arttype') ){
			$qstr = '?artist-id='.$type[0].'&arttype='.$type[1];

		}elseif( ($type[0] == 'method') && ($type[1] == 'artist-id') ){
			$qstr = '?method='.$type[0].'&artist-id='.$type[1];

		}elseif( ($type[0] == 'method') && ($type[1] == 'arttype') ){
			$qstr = '?method='.$type[0].'&arttype='.$type[1];

		}elseif( ($type[0] == 'arttype') && ($type[1] == 'artist-id') ){
			$qstr = '?arttype='.$type[0].'&artist-id='.$type[1];

		}elseif( ($type[0] == 'arttype') && ($type[1] == 'method') ){
			$qstr = '?arttype='.$type[0].'&method='.$type[1];

		}
	} else {
		if( ($type[0] == 'artist-id') ){
			$qstr = '?artist-id='.$type[0];

		} elseif( ($type[0] == 'method') ){
			$qstr = '?method='.$type[0];

		}elseif( ($type[0] == 'arttype') ){
			$qstr = '?arttype='.$type[0];
		}
	}
} else {
	$qstr = '';
}

?>
<span id="shopUrl" data-url="<?php echo get_permalink($shopID).$qstr; ?>" style="display: none;"></span>
<section class="product-archive">
	<div class="content-wrap">
		<div class="container-fluid">
			<div class="product-filter clearfix">
				<div class="filter-lft fl-filter-cntlr clearfix">
				   <div class="drop-filter filter-1">
				   		<select id="artist_name" class="drowpdwon-filter" onchange="this.form.submit()">
		                  <option selected="selected" value="">ALL ARTISTS</option>
		                  <?php 
		                    if( $artquery->have_posts() ): 
	            			while( $artquery->have_posts() ): $artquery->the_post(); 
		                  ?>
		                   <option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
		                   <?php endwhile; endif; wp_reset_postdata(); ?>
		                </select> 
				   </div>
				   <div class="drop-filter filter-2">
				   	<?php 
		              $methods = get_terms( array(
		                  'taxonomy' => 'methods',
		                  'hide_empty' => false
		              ) );
		            ?>
			   		<select id="methods" class="drowpdwon-filter">
	                  <option selected="selected">ALL METHODS</option>
	                    <?php if ( !empty($methods) ) : ?>
		                <?php 
		                foreach( $methods as $method ) {
		                  echo '<option value="' . $method->slug . '">'.$method->name.'</option>';
		                }
		                ?>
		                <?php endif; ?>
	                </select> 
				   </div>
				   <div class="drop-filter filter-3">
				   	<?php 
		              $art_types = get_terms( array(
		                  'taxonomy' => 'art_type',
		                  'hide_empty' => false
		              ) );
		            ?>
			   		<select id="art-type" class="drowpdwon-filter">
	                  <option selected="selected">TYPE OF ART</option>
	                   <?php if ( !empty($art_types) ) : ?>
		                <?php 
		                foreach( $art_types as $art_type ) {
		                  echo '<option value="' . $art_type->slug . '">'.$art_type->name.'</option>';
		                }
		                ?>
		                <?php endif; ?>
	                </select> 
				   </div>
				</div>
				<div class="filter-rgt fl-filter-cntlr clearfix">
				   <div class="drop-filter filter-4">
					    <select class="drowpdwon-filter" id="sortproduct">
						    <option selected="selected">SORT BY</option>
			                <option value="desc" <?php echo ($sorting == 'desc')? 'selected="selected"': '';?>>DESC</option>
			                <option value="asc" <?php echo ($sorting == 'asc')? 'selected="selected"': '';?>>ASC</option>
		                </select>
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
