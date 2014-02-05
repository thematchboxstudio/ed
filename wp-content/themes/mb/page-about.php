<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Template Name: About
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a page ('page' post_type) unless another page template overrules this one.
 * @link http://codex.wordpress.org/Pages
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
?>
    <div class="dots"></div>
    <div id="content" class="page col-full">
    
    	
		<section id="main" class="col-left"> 	
		    	<?php woo_main_before(); ?>
		
        <?php
        	if ( have_posts() ) { $count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>                                                           
			<article <?php post_class(); ?>>
				
				<header>
			  	<h1><?php the_title(); ?></h1>
				</header>
				
				<section class="entry">
        	<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
       	</section><!-- /.entry -->
				<?php //edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>
            
         				<section class="meet-the-designers">
					<h1>Meet the Designers</h1>
						<ul class="products">
		    <?php
					$terms = get_terms('product_cat', array('child_of' => 61, 'orderby' => 'title','order'=> 'ASC'));
						foreach ($terms as $term) {
							$wpq = array ('orderby' => 'rand','taxonomy'=>'product_cat','term'=>$term->slug, 'posts_per_page' => 1 );
							$myquery = new WP_Query ($wpq);
							$article_count = $myquery->post_count;

							
				 $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
				 $image = wp_get_attachment_url( $thumbnail_id ); 

								if ($article_count) {
									while ($myquery->have_posts()) : $myquery->the_post();
									echo "<li class='product'><a href=\"".get_term_link($term->slug, 'product_cat')."\"><img src='".$image."'/>";
									echo "<h3 class=\"term-heading\" id=\"".$term->slug."\">";
									echo $term->name;
									echo "</h3></a></li>";
									endwhile;
								}
						}?>
						</ul>
 				</section>
            
            
			</article><!-- /.post -->
            
			<?php
			
			} // End WHILE Loop
			} else {
			?>
			
			<article <?php post_class(); ?>>
      	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
      </article><!-- /.post -->
        <?php } // End IF Statement ?>  
        
		</section><!-- /#main -->
		
		<?php woo_main_after(); ?>
        <?php get_sidebar(); ?>
    </div><!-- /#content -->
		<div class="dots"></div>
<?php get_footer(); ?>