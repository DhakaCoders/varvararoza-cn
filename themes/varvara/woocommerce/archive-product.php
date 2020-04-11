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
$artistid = $methodd = $arttype = '';
if( isset($_GET['artist-id']) && !empty($_GET['artist-id'])):
	$artistid = $_GET['artist-id'];
endif;
if( isset($_GET['method']) && !empty($_GET['method'])):
	$methodd = $_GET['method'];
endif;
if( isset($_GET['arttype']) && !empty($_GET['arttype'])):
	$arttype = $_GET['arttype'];
endif;
?>
<span id="shopUrl" data-url="<?php echo get_permalink($shopID); ?>" style="display: none;"></span>

<span id="filtertype" data-id="<?php echo $artistid ?>" data-method="<?php echo $methodd ?>" data-arttype="<?php echo $arttype ?>" style="display: none;"></span>
<section class="product-archive">
	<div class="content-wrap">
		<div class="container-fluid">
			<div class="product-filter clearfix">
				<div class="filter-lft fl-filter-cntlr clearfix">
				   <div class="drop-filter filter-1">
				   	<form action="" method="get">
				   		<select name="artist-id" class="drowpdwon-filter" onchange="this.form.submit()">
		                  <option selected="selected" value="0">ALL ARTISTS</option>
		                  <?php 
		                    if( $artquery->have_posts() ): 
	            			while( $artquery->have_posts() ): $artquery->the_post(); 
		                  ?>
		                   <option value="<?php the_ID(); ?>" <?php echo ($artistid == get_the_ID())? 'selected="selected"': '';?>><?php the_title(); ?></option>
		                   <?php endwhile; endif; wp_reset_postdata(); ?>
		                </select> 
		                <?php if( isset($_GET['method']) && !empty($_GET['method'])): ?>
		                <input type="hidden" name="method" value="<?php echo $_GET['method']; ?>">
		            	<?php endif; ?>
		            	<?php if( isset($_GET['arttype']) && !empty($_GET['arttype'])): ?>
		                <input type="hidden" name="arttype" value="<?php echo $_GET['arttype']; ?>">
		                <?php endif; ?>
		            </form>
				   </div>
				   <div class="drop-filter filter-2">
				   	<?php 
		              $methods = get_terms( array(
		                  'taxonomy' => 'methods',
		                  'hide_empty' => false
		              ) );
		            ?>
		            <form action="" method="get">
			   		<select name="method" class="drowpdwon-filter" onchange="this.form.submit()">
	                  <option selected="selected" value="0">ALL METHODS</option>
	                    <?php if ( !empty($methods) ) : ?>
		                <?php 
		                foreach( $methods as $method ) {?>
		                  <option value="<?php echo $method->slug; ?>"  <?php echo ($methodd == $method->slug)? 'selected="selected"': '';?>><?php echo $method->name; ?></option>';
		                <?php }?>
		                <?php endif; ?>
	                </select> 
	                <?php if( isset($_GET['artist-id']) && !empty($_GET['artist-id'])): ?>
	                <input type="hidden" name="artist-id" value="<?php echo $_GET['artist-id']; ?>">
	            	<?php endif; ?>
	            	<?php if( isset($_GET['arttype']) && !empty($_GET['arttype'])): ?>
	                <input type="hidden" name="arttype" value="<?php echo $_GET['arttype']; ?>">
	                <?php endif; ?>
	            	</form>
				   </div>
				   <div class="drop-filter filter-3">
				   	<?php 
		              $art_types = get_terms( array(
		                  'taxonomy' => 'art_type',
		                  'hide_empty' => false
		              ) );
		            ?>
		            <form action="" method="get">
			   		<select name="arttype" class="drowpdwon-filter" onchange="this.form.submit()">
	                  <option selected="selected" value="0">TYPE OF ART</option>
	                   <?php if ( !empty($art_types) ) : ?>
		                <?php 
		                foreach( $art_types as $art_type ) { ?>
		                  <option value="<?php echo $art_type->slug; ?>"  <?php echo ($arttype == $art_type->slug)? 'selected="selected"': '';?>><?php echo $art_type->name; ?></option>';
		                <?php }?>
		                <?php endif; ?>
	                </select> 
	                <?php if( isset($_GET['artist-id']) && !empty($_GET['artist-id'])): ?>
	                <input type="hidden" name="artist-id" value="<?php echo $_GET['artist-id']; ?>">
	            	<?php endif; ?>
	            	<?php if( isset($_GET['method']) && !empty($_GET['method'])): ?>
	                <input type="hidden" name="method" value="<?php echo $_GET['method']; ?>">
	                <?php endif; ?>
	            	</form>
				   </div>
				</div>
				<div class="filter-rgt fl-filter-cntlr clearfix">
				   <div class="drop-filter filter-4">
					    <select class="drowpdwon-filter" id="sortproduct">
						    <option selected="selected" value="">SORT BY</option>
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
