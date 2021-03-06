<?php
// Template Name: Home
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?><?php
/**
 * Index Template
 *
 * Here we setup all logic and XHTML that is required for the index template, used as both the homepage
 * and as a fallback template, if a more appropriate template file doesn't exist for a specific context.
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
	 
?>
  	<div class="banner-wrapper clearfix">
    	<div class="homepage-banner">
				<a href="<?php the_field('feature-link'); ?>"><img src="<?php the_field('feature-image'); ?>" alt="" /></a>
    	</div>
  	</div><!--banner-wrap -->
    
    <div class="featured-products clearfix">
    	<div class="dots"><h2>Featured Products</h2></div>
				<!-- Elastislide Carousel -->
				<ul id="carousel" class="elastislide-list">
				<?php
					$args = array(
						'tax_query' => array(
							array(
								'taxonomy' => 'product_cat',
								'field' => 'slug',
								'terms' => array('featured'),
							)
						),
						'posts_per_page' => -1,
						);
								query_posts($args); if ( have_posts() ) : while ( have_posts() ) : the_post();
							?>
					<li>
						<a href="<?php the_permalink();?>"><img src="<?php the_field('image');?>" alt="<?php the_title();?>" />
							<p><strong><?php the_field('caption');?></strong> <em>Buy Now</em></p>
						</a>
					</li>
				<?php endwhile; endif; wp_reset_query(); ?>
				</ul>
    	<div class="dots"></div>
    </div><!-- featured-products -->
		
    <div id="content" class="col-full clearfix">
			<?php woo_main_before(); ?>
	    <section class="col-left tout-block">
	    	<article class="tout col-left">
	    		<a href="<?php the_field('link-1'); ?>">
	    			<img class="file-svg" src="<?php the_field('svg-1');?>" alt="featured artist"/>
	    			<img class="file-png" src="<?php the_field('png-1');?>" alt="featured artist"/>
	    		</a>
	    	</article>
	    	<article class="tout col-left">
	    		<a href="<?php the_field('link-2'); ?>">
		    		<img class="file-svg" src="<?php the_field('svg-2');?>" alt="Shop"/>
	    			<img class="file-png" src="<?php the_field('png-2');?>" alt="featured artist"/>
	    		</a>
	    	</article>
	    	<article class="tout col-left">
	    		<a href="<?php the_field('link-3'); ?>">
		    		<img class="file-svg" src="<?php the_field('svg-3');?>" alt="Blog"/>
	    			<img class="file-png" src="<?php the_field('png-3');?>" alt="featured artist"/>
	  			</a>
	    	</article>
	    </section>
			<section id="main" class="col-left">  
    </div><!-- /#content -->
<?php get_footer(); ?>