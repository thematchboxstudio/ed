<?php
/**
 * Template Name: About Us
 *
 */
	get_header();
	global $woo_options;
?>
    <div class="dots"></div>
    <div id="content" class="page col-full">
    
    	
		<section id="main" class="col-left"> 	
		    	<?php woo_main_before(); ?>
              
			<article <?php post_class(); ?>>
				
				<header>
			  	<h1><?php the_title(); ?></h1>
				</header>
				
				<section class="entry">
        	<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
       	</section><!-- /.entry -->
				
				<section class="meet-the-designers">
					<h1>Meet the Designers</h1>
						<ul class="products">
	
						</ul>
 				</section>
	
			</article><!-- /.post -->
      <?php edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>

		
        
		</section><!-- /#main -->
		
		<?php woo_main_after(); ?>
        <?php get_sidebar(); ?>
    </div><!-- /#content -->
		<div class="dots"></div>
<?php get_footer(); ?>