<?php 
/*
Template Name:Art Advisory
*/
get_header();
$thisID = 341;
if( !empty($thisID) ): 
$page = get_post( $thisID ); 
?>
<section class="page-banner">
  <div class="page-banner-controller" style="overflow: hidden;">
    <div class="page-banner-bg" style="background-image:url(<?php echo THEME_URI; ?>/img/page-bnr.jpg);">
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
<section class="art-post-grid-sec-wrp">
	<div class="container-fluid">
	  <div class="row">
	  	<div class="col-sm-12">
	  	  <div class="art-post-grid-block clearfix">
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
		  	  <div class="art-post-grid-wrp clearfix">
		  	  	<?php echo do_shortcode('[ajax_art]'); ?>
		  	  </div>
	  	  </div>
	  	</div>
	  </div>
	</div>
</section>

<?php get_footer();?>