<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
	global $woo_options;
	
	$logoutlink = woocommerce_get_page_id( 'logout' );

	echo '<div class="footer-wrap">';

	$total = 4;
	if ( isset( $woo_options['woo_footer_sidebars'] ) && ( $woo_options['woo_footer_sidebars'] != '' ) ) {
		$total = $woo_options['woo_footer_sidebars'];
	}

	if ( ( woo_active_sidebar( 'footer-1' ) ||
		   woo_active_sidebar( 'footer-2' ) ||
		   woo_active_sidebar( 'footer-3' ) ||
		   woo_active_sidebar( 'footer-4' ) ) && $total > 0 ) {

?>

	<?php woo_footer_before(); ?>
	
		<section id="footer-widgets" class="col-full col-<?php echo $total; ?> fix">
	
			<?php $i = 0; while ( $i < $total ) { $i++; ?>
				<?php if ( woo_active_sidebar( 'footer-' . $i ) ) { ?>
	
			<div class="block footer-widget-<?php echo $i; ?>">
	        	<?php woo_sidebar( 'footer-' . $i ); ?>
			</div>
	
		        <?php } ?>
			<?php } // End WHILE Loop ?>
	
		</section><!-- /#footer-widgets  -->
	<?php } // End IF Statement ?>
		<footer id="footer" class="col-full">
			<div class="footer-top clearfix">
				<div class="menu-list fluid">
					<h2>Service</h2>
					<?php wp_nav_menu( array( 'menu' => 'service-nav' ) ); ?>
					
					<?php if ( is_user_logged_in() ) {
						echo '<ul id="menu-service-nav" class="menu">';
						echo '<li class="my-account"><a href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'">My Account</a></li>';
						echo '<li class="logout"><a href="'.get_page_link($logoutlink).'">'.__('Logout','woothemes').'</a></li>'; 
						} 

					else { echo '<li class="login"><a href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'">Login / Register</a></li>'; } ?>

				</div>
	
				<div class="menu-list fluid">
					<h2>Company</h2>
					<?php wp_nav_menu( array( 'menu' => 'company-nav' ) ); ?>
				</div>
	
				<div class="menu-list social fluid">
					<ul>
						<li class="fb"><a href="">facebook</a>
						<li class="tw"><a href="">twitter</a>
						<li class="email"><a href="">email</a>
					</ul>
				</div>
	
				<div class="menu-list sign-up fluid">
						<form id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" method="post" action="http://matchboxstudio.createsend.com/t/r/s/tyiituk/" target="_blank" novalidate>
						<label for="pihiij-pihiij">sign up here for special offers, news and more!</label>
						<input type="email" name="cm-tyiituk-tyiituk" class="joinbox" value="Your email" onfocus="if (this.value == 'Your email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Your email';}" placeholder="Your email" id="pihiij-pihiij">
						<input type="submit" class="submit button" value="GO">
						</form>
				</div>
			</div><?php // footer-top ?>

		
	
			<div id="copyright" class="col-left">
				<p><?php bloginfo(); ?> &copy; <?php echo date( 'Y' ); ?>. <?php _e( 'All Rights Reserved.', 'woothemes' ); ?> Site by <a href="http://matchboxstudio.com">The Matchbox Studio</a></p>
				
				<?php if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top-menu' ) ) { ?>
			<?php wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'top-nav', 'menu_class' => 'nav fl', 'theme_location' => 'top-menu' ) ); ?>
			<?php } ?>
			
			</div>

	
		</footer><!-- /#footer  -->
	
	</div><!-- / footer-wrap -->

</div><!-- /#wrapper -->

<?php wp_footer(); ?>
<?php woo_foot(); ?>
<script type="text/javascript" src="<?php echo site_url() ?>/wp-content/themes/mb/includes/js/jquerypp.custom.js"></script>
<?php if(is_front_page()) { ?>
			<script type="text/javascript" src="<?php echo site_url() ?>/wp-content/themes/mb/includes/js/jquery.elastislide.js"></script>
			<script type="text/javascript">
				$( '#carousel' ).elastislide();
		</script>
<?php } ?>
</body>
</html>