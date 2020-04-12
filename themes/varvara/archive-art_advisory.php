<?php 
/*
Template Name:Art Advisory
*/
get_header();
$thisID = 376;
$artsort = 'desc';
if(isset($_COOKIE['artsort']) && !empty($_COOKIE['artsort'])) {
	$artsort = $_COOKIE['artsort'];
}

if( !empty($thisID) ): 
$page = get_post( $thisID ); 
?>
<section class="page-banner">
  <div class="page-banner-controller" style="overflow: hidden;">
    <div class="page-banner-bg" style="background-image:url(<?php echo THEME_URI; ?>/img/fl-page-banner.jpg);">
    </div>
    <div class="page-banner-des">
        <div>
          <h1 class="page-banner-title"><?php echo $page->post_title; ?></h1>
          <?php echo wpautop($page->post_content); ?>
        </div>
    </div>
  </div>
</section><!-- end of page-banner -->
<?php endif; ?>
<span id="artSortString" data-string="<?php echo $artsort; ?>" style="display: none;"></span>
<section class="art-post-grid-sec-wrp">
	<div class="container-fluid">
	  <div class="row">
	  	<div class="col-sm-12">
	  	  <div class="art-post-grid-block clearfix">
	  	  	<div class="filter-rgt fl-filter-cntlr clearfix">
			   <div class="drop-filter filter-4">
			   		<select class="selectpicker" id="artSort" data-url="<?php echo get_permalink($thisID); ?>">
	                    <option selected="selected" value="">SORT BY</option>
		                <option value="desc" <?php echo ($artsort == 'desc')? 'selected="selected"': '';?>>DESC</option>
		                <option value="asc" <?php echo ($artsort == 'asc')? 'selected="selected"': '';?>>ASC</option>
	                </select> 
			   </div>
			</div>
		  	  <div class="art-post-grid-wrp clearfix">
		  	  	<?php echo do_shortcode('[ajax_art]'); ?>
		  	  </div>
	  	  </div>
	  	</div>
	  </div>
	</div>
</section>

<?php get_footer();?>