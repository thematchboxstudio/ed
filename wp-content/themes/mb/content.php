<?php
//BLOG PAGE CONTENT
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * The default template for displaying content
 */

	global $woo_options;
 
?>            

	<article <?php post_class('clearfix'); ?>>
	
		<section class="post-content">
			<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-thumb' ); ?>
			<a class="blog-thumb" href="<?php the_permalink();?>"><img src="<?php echo $image[0]; ?>" alt="" /></a>
			<?php endif; ?>
		    
			<header>
				<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<?php woo_post_meta(); ?>
			</header>
	
			<section class="entry">
				<p><?php echo get_excerpt(200); ?>
			</section>
	
			  
		</section><!--/.post-content -->

	</article><!-- /.post -->