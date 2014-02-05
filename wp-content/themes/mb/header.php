<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
 
 global $woo_options, $woocommerce;
 $logoutlink = woocommerce_get_page_id( 'logout' );

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php if ( $woo_options['woo_boxed_layout'] == 'true' ) echo 'boxed'; ?> <?php if (!class_exists('woocommerce')) echo 'woocommerce-deactivated'; ?>">
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php woo_title(''); ?></title>
<?php woo_meta(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" /><?php
	wp_head();
	woo_head();
?>
<script type="text/javascript" src="//use.typekit.net/aqx5ifr.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<script src="<?php echo site_url() ?>/wp-content/themes/mb/includes/js/modernizr.custom.js"></script>
</head>

<body <?php body_class('active-sidebar'); ?>>
<?php woo_top(); ?>

<div id="wrapper">

	
	<div class="top wrap">
	<div id="top">
		<nav class="col-full" role="navigation">

			<?php
				if ( class_exists( 'woocommerce' ) ) { 
					echo '<ul class="nav wc-nav">';
					echo '<li class="logo"><a href="'.esc_url( home_url( '/' )).'"><img src="'.get_template_directory_uri().'/images/ed-logo-horiz.svg" /></a></li>';
					echo '<h3 class="nav-toggle"><a class="menu-button" href="#navigation"></a></h3>';
					if ( is_user_logged_in() ) {
						echo '<li class="my-account"><a href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'">My Account</a></li>';
						}
					if ( is_user_logged_in() ) {
						echo '<li class="logout"><a href="'.get_page_link($logoutlink).'">'.__('Logout','woothemes').'</a></li>'; } 
					else { echo '<li class="login"><a href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'">Login / Register</a></li>'; } 
					echo '<li class="cart">'.current(woocommerce_cart_link()).'</li>'; 
					//echo get_search_form();
					echo '</ul>';
					//echo '<pre>';
					//var_dump($woocommerce);
				
				}
			?>
		</nav>
	</div><!-- /#top -->

   
    
    <?php woo_header_before(); ?>

	<header id="header" class="col-full">
			  
	   
	    
	    <hgroup>
	    	
	    	 <?php
			    $logo = esc_url( get_template_directory_uri() . '/images/logo.png' );
				if ( isset( $woo_options['woo_logo'] ) && $woo_options['woo_logo'] != '' ) { $logo = $woo_options['woo_logo']; }
				if ( isset( $woo_options['woo_logo'] ) && $woo_options['woo_logo'] != '' && is_ssl() ) { $logo = preg_replace("/^http:/", "https:", $woo_options['woo_logo']); }
			?>
			<?php if ( ! isset( $woo_options['woo_texttitle'] ) || $woo_options['woo_texttitle'] != 'true' ) { ?>
			    <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr( get_bloginfo( 'description' ) ); ?>">
			    	<img src="<?php echo $logo; ?>" alt="<?php esc_attr( get_bloginfo( 'name' ) ); ?>" />
			    </a>
		    <?php } ?>
	        
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/e&d-logo.svg" /></a></h1>
			
		      	
		</hgroup>
        
        <?php woo_nav_before(); ?>

		<nav id="navigation" class="col-full" role="navigation">
			
			<?php
			if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
				wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'main-nav', 'menu_class' => 'nav fr', 'theme_location' => 'primary-menu' ) );
			} else {
			?>
	        <ul id="main-nav" class="nav fl">
				<?php if ( is_page() ) $highlight = 'page_item'; else $highlight = 'page_item current_page_item'; ?>
				<li class="<?php echo $highlight; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'woothemes' ); ?></a></li>
				<?php wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&exclude=' ); ?>
			</ul><!-- /#nav -->
	        <?php } ?>
	
		</nav><!-- /#navigation -->
		
		<?php woo_nav_after(); ?>
	
	</header><!-- /#header -->
	</div><!-- top wrap -->
	<?php woo_content_before(); ?>