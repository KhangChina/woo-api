<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php 
	$mymedi_theme_options = mymedi_get_theme_options();
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<?php if( $mymedi_theme_options['ts_responsive'] ): ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
	<?php endif; ?>

	<link rel="profile" href="//gmpg.org/xfn/11" />
	<?php 
	mymedi_theme_favicon();
	wp_head(); 
	?>
</head>
<body <?php body_class(); ?>>
<?php
if( function_exists('wp_body_open') ){
	wp_body_open();
}
?>
<?php 
	$enable_header_contact = false;
	$enable_language_currency = false;
	$has_close_icon = false;
	$show_top_menu = false;
	$show_socials = false;
	$show_delivery = false;
	if( ($mymedi_theme_options['ts_header_currency'] || $mymedi_theme_options['ts_header_language']) && !in_array( $mymedi_theme_options['ts_header_layout'], array('v2') ) ){
		$enable_language_currency = true;
	}
	if( !in_array( $mymedi_theme_options['ts_header_layout'], array('v4','v6','v7','v8') ) ){
		$enable_header_contact = true;
	}
	if( in_array( $mymedi_theme_options['ts_header_layout'], array('v3','v6') ) ){
		$has_close_icon = true;
	}
	if( in_array( $mymedi_theme_options['ts_header_layout'], array('v2','v3','v7','v8') ) ){
		$show_top_menu = true;
	}
	if( in_array( $mymedi_theme_options['ts_header_layout'], array('v2','v3','v7','v8') ) ){
		$show_socials = true;
	}
	if( in_array( $mymedi_theme_options['ts_header_layout'], array('v2','v7','v8') ) ){
		$show_delivery = true;
	}
	
	$show_banner = isset($mymedi_theme_options['ts_show_banner_footer']) ? $mymedi_theme_options['ts_show_banner_footer'] : 0;
	$image_banner = isset($mymedi_theme_options['ts_banner_image_footer']) ? $mymedi_theme_options['ts_banner_image_footer']['url'] : '';
?>
<div id="page" class="hfeed site">

	<?php if( !is_page_template('page-templates/blank-page-template.php') ): ?>
	
		<?php if( $show_banner && $image_banner ): ?>
			<div class="image-banner-footer">
				<img src="<?php echo esc_url($image_banner); ?>" alt="<?php esc_attr_e('banner', 'mymedi'); ?>" />
			</div>
		<?php endif; ?>
	
		<?php mymedi_header_store_notice(); ?>
	
		<!-- Page Slider -->
		<?php if( is_page() ): ?>
			<?php if( mymedi_get_page_options('ts_page_slider') && mymedi_get_page_options('ts_page_slider_position') == 'before_header' ): ?>
			<div class="top-slideshow">
				<div class="top-slideshow-wrapper">
					<?php mymedi_show_page_slider(); ?>
				</div>
			</div>
			<?php endif; ?>
		<?php endif; ?>
		
		<!-- Search Full Width -->
		<?php if( $mymedi_theme_options['ts_enable_search'] ): ?>
			
				<div id="ts-search-sidebar" class="ts-floating-sidebar">
					<div class="overlay"></div>
					<div class="ts-sidebar-content">
						<span class="close"></span>
						
						<div class="ts-search-by-category woocommerce">
							<h2 class="title"><?php esc_html_e('Search ', 'mymedi'); ?></h2>
							<?php get_search_form(); ?>
							<div class="ts-search-result-container"></div>
						</div>
					</div>
				</div>
		
		<?php endif; ?>
		
		<!-- Mobile Menu -->
		<div id="group-icon-header" class="ts-floating-sidebar mobile-menu-wrapper hidden <?php echo esc_attr($has_close_icon?'has-close-icon':''); ?>">
		
			<?php if( $has_close_icon ): ?>
			<span class="ic-mobile-menu-close-button">
				<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M25.8736 27.1034L13.2977 14.5274C13.0718 14.3015 12.9858 14.0861 13.083 13.9891L13.9891 13.0829C14.0862 12.9859 14.3015 13.0718 14.5274 13.2977L27.1786 25.9489C27.4045 26.1748 27.4905 26.3901 27.3934 26.4873L26.4872 27.3934C26.3472 27.3827 26.0995 27.3293 25.8736 27.1034Z" fill="#103178"/>
				<path d="M14.603 27.1034L27.1789 14.5274C27.4048 14.3015 27.4907 14.0861 27.3936 13.9891L26.4875 13.0829C26.3904 12.9859 26.1751 13.0718 25.9492 13.2977L13.2979 25.9489C13.072 26.1748 12.9861 26.3901 13.0832 26.4873L13.9893 27.3934C14.1293 27.3827 14.3771 27.3293 14.603 27.1034Z" fill="#103178"/>
				</svg>
			</span>
			<?php endif; ?>
		
			<div class="ts-sidebar-content">
				
				<div class="ts-menu">
					<div class="menu-main-mobile">
						<?php 
						if( has_nav_menu( 'mobile' ) ){
							wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'mobile-menu', 'theme_location' => 'mobile', 'walker' => new MyMedi_Walker_Nav_Menu() ) );
						}else if( has_nav_menu( 'primary' ) ){
							wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'mobile-menu', 'theme_location' => 'primary', 'walker' => new MyMedi_Walker_Nav_Menu() ) );
						}
						else{
							wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'mobile-menu' ) );
						}
						?>
					</div>
				</div>
				
				<div class="group-button-header">
				
					<?php if( $enable_language_currency ): ?>
					<div class="language-currency">
					
						<?php if( $mymedi_theme_options['ts_header_language'] ): ?>
						<div class="header-language"><?php mymedi_wpml_language_selector(); ?></div>
						<?php endif; ?>
						
						<?php if( $mymedi_theme_options['ts_header_currency'] ): ?>
						<div class="header-currency"><?php mymedi_woocommerce_multilingual_currency_switcher(); ?></div>
						<?php endif; ?>
						
					</div>
					<?php endif; ?>

					<?php
					if( $show_top_menu ):
						mymedi_top_header_menu();
					endif;
					?>
					
					<?php if( $enable_header_contact ): ?>
					<div class="header-contact">
						<?php mymedi_header_contact_information(); ?>
					</div>
					<?php endif; ?>
					
					<?php if( $show_delivery ): ?>
					<div class="delivery-message"><?php mymedi_header_delivery_message(); ?></div>
					<?php endif; ?>
					
					<?php
					if( $show_socials && function_exists('ts_header_social_icons') ):
						ts_header_social_icons();
					endif;
					?>
					
				</div>
				
			</div>

		</div>
		
		<!-- Group Icons Bottom -->
		<?php if( !in_array( $mymedi_theme_options['ts_header_layout'], array('v3','v5','v6') ) ): ?>
			
			<div id="ts-group-icons-header" class="ts-group-icons-header visible-phone">
				
				<!-- Menu Icon -->
				<div class="ts-group-meta-icon-toggle">
					<span class="ic-mobile-menu-button">
						<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M33.0652 17H12.6124C12.2449 17 12 16.8947 12 16.7368V15.2632C12 15.1053 12.2449 15 12.6124 15H33.1876C33.5551 15 33.8 15.1053 33.8 15.2632V16.7368C33.6775 16.8947 33.4326 17 33.0652 17Z" fill="#FF9923"/>
						<path d="M33.0652 24H12.6124C12.2449 24 12 23.8947 12 23.7368V22.2632C12 22.1053 12.2449 22 12.6124 22H33.1876C33.5551 22 33.8 22.1053 33.8 22.2632V23.7368C33.6775 23.8421 33.4326 24 33.0652 24Z" fill="#FF9923"/>
						<path d="M33.0652 31H12.6124C12.2449 31 12 30.8947 12 30.7368V29.2632C12 29.1053 12.2449 29 12.6124 29H33.1876C33.5551 29 33.8 29.1053 33.8 29.2632V30.7368C33.6775 30.8947 33.4326 31 33.0652 31Z" fill="#FF9923"/>
						</svg>
					</span>
					<span class="ic-mobile-menu-close-button">
						<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M29.7546 31.1689L15.2923 16.7066C15.0325 16.4468 14.9337 16.1991 15.0454 16.0875L16.0874 15.0454C16.1991 14.9338 16.4467 15.0326 16.7065 15.2924L31.2554 29.8413C31.5152 30.1011 31.614 30.3487 31.5024 30.4604L30.4603 31.5024C30.2993 31.4902 30.0144 31.4287 29.7546 31.1689Z" fill="#103178"/>
						<path d="M16.7934 31.1689L31.2557 16.7066C31.5155 16.4468 31.6143 16.1991 31.5026 16.0875L30.4606 15.0454C30.3489 14.9338 30.1013 15.0326 29.8415 15.2924L15.2926 29.8413C15.0328 30.1011 14.934 30.3487 15.0456 30.4604L16.0877 31.5024C16.2487 31.4902 16.5336 31.4287 16.7934 31.1689Z" fill="#103178"/>
						</svg>
					</span>
				</div>
				
				<!-- Home Icon -->
				<div class="home-icon">
					<a href="<?php echo esc_url( home_url('/') ) ?>">
						<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M31 21V32H16V21" stroke="#FF9923" stroke-width="2" stroke-miterlimit="10"/>
						<path d="M34 23L23.5 14L13 23" stroke="#FF9923" stroke-width="2" stroke-miterlimit="10"/>
						</svg>
					</a>
				</div>
				
				<!-- Myaccount Icon -->
				<?php if( $mymedi_theme_options['ts_enable_tiny_account'] ): ?>
				<div class="my-account-wrapper">
					<?php echo mymedi_tiny_account(false); ?>
				</div>
				<?php endif; ?>
				
				<!-- Wishlist Icon -->
				<?php if( class_exists('YITH_WCWL') && $mymedi_theme_options['ts_enable_tiny_wishlist'] ): ?>
					<div class="my-wishlist-wrapper"><?php echo mymedi_tini_wishlist(); ?></div>
				<?php endif; ?>
				
				<!-- Cart Icon -->
				<?php if( $mymedi_theme_options['ts_enable_tiny_shopping_cart'] && $mymedi_theme_options['ts_header_layout'] != 'v4' ): ?>
				<div class="shopping-cart-wrapper mobile-cart">
					<?php echo mymedi_tiny_cart(true, false); ?>
				</div>
				<?php endif; ?>
					
			</div>
		
		<?php endif; ?>
		
		<!-- Shopping Cart Floating Sidebar -->
		<?php if( class_exists('WooCommerce') && $mymedi_theme_options['ts_enable_tiny_shopping_cart'] && $mymedi_theme_options['ts_shopping_cart_sidebar'] && !is_cart() && !is_checkout() ): ?>
		<div id="ts-shopping-cart-sidebar" class="ts-floating-sidebar">
			<div class="overlay"></div>
			<div class="ts-sidebar-content">
				<span class="close"></span>
				<div class="ts-tiny-cart-wrapper"></div>
			</div>
		</div>
		<?php endif; ?>
		
		<?php mymedi_get_header_template(); ?>
		
	<?php endif; ?>
	
	<?php do_action('mymedi_before_main_content'); ?>

	<div id="main" class="wrapper">