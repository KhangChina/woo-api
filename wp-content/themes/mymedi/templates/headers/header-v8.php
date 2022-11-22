<?php
$mymedi_theme_options = mymedi_get_theme_options();

$header_classes = array();
if( $mymedi_theme_options['ts_enable_sticky_header'] ){
	$header_classes[] = 'has-sticky';
}

if( !$mymedi_theme_options['ts_enable_tiny_shopping_cart'] ){
	$header_classes[] = 'hidden-cart';
}

if( !$mymedi_theme_options['ts_enable_tiny_wishlist'] || !class_exists('WooCommerce') || !class_exists('YITH_WCWL') ){
	$header_classes[] = 'hidden-wishlist';
}

if( !$mymedi_theme_options['ts_enable_search'] ){
	$header_classes[] = 'hidden-search';
}

?>
<header class="ts-header <?php echo esc_attr(implode(' ', $header_classes)); ?>">
	<div class="header-container">
		<div class="header-template">
		
			<div class="header-top">
				<div class="container">
					<div class="header-left hidden-ipad">
						<?php mymedi_header_delivery_message(); ?>
					</div>
					<div class="header-right">
						
						<?php if( $mymedi_theme_options['ts_header_currency'] ): ?>
						<div class="header-currency hidden-phone"><?php mymedi_woocommerce_multilingual_currency_switcher(); ?></div>
						<?php endif; ?>
						
						<?php if( $mymedi_theme_options['ts_header_language'] ): ?>
						<div class="header-language hidden-phone"><?php mymedi_wpml_language_selector(); ?></div>
						<?php endif; ?>
						
						<?php 
						if( function_exists('ts_header_social_icons') ):
							ts_header_social_icons();
						endif;
						?>
						
						<?php mymedi_top_header_menu(); ?>
					</div>
				</div>
			</div>
		
			<div class="header-sticky">
				<div class="header-middle has-icon-menu-sticky-header">
					<div class="container">

						<div class="logo-wrapper"><?php echo mymedi_theme_logo(); ?></div>
						
						<span class="icon-menu-sticky-header hidden-phone">
							<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M31.2 18.8H14.5C14.2 18.8 14 18.6 14 18.3V15.5C14 15.2 14.2 15 14.5 15H31.3C31.6 15 31.8 15.2 31.8 15.5V18.3C31.7 18.6 31.5 18.8 31.2 18.8Z" fill="#103178"/>
							<path d="M31.2 24.8H14.5C14.2 24.8 14 24.6 14 24.3V21.5C14 21.2 14.2 21 14.5 21H31.3C31.6 21 31.8 21.2 31.8 21.5V24.3C31.7 24.5 31.5 24.8 31.2 24.8Z" fill="#103178"/>
							<path d="M31.2 30.7H14.5C14.2 30.7 14 30.5 14 30.2V27.4C14 27.1 14.2 26.9 14.5 26.9H31.3C31.6 26.9 31.8 27.1 31.8 27.4V30.2C31.7 30.5 31.5 30.7 31.2 30.7Z" fill="#103178"/>
							</svg>
						</span>
						
						<?php if( $mymedi_theme_options['ts_enable_search'] ): ?>
						<div class="ts-search-by-category hidden-ipad"><?php get_search_form(); ?></div>
						<?php endif; ?>
						
						<div class="header-right">
							
							<?php if( $mymedi_theme_options['ts_enable_tiny_shopping_cart'] ): ?>
							<div class="shopping-cart-wrapper hidden-phone">
								<?php echo mymedi_tiny_cart(); ?>
							</div>
							<?php endif; ?>
							
							<?php if( class_exists('YITH_WCWL') && $mymedi_theme_options['ts_enable_tiny_wishlist'] ): ?>
								<div class="my-wishlist-wrapper hidden-phone"><?php echo mymedi_tini_wishlist(); ?></div>
							<?php endif; ?>
							
							<?php if( $mymedi_theme_options['ts_enable_tiny_account'] ): ?>
							<div class="my-account-wrapper hidden-phone">							
								<?php echo mymedi_tiny_account(); ?>
							</div>
							<?php endif; ?>
							
							<?php if( $mymedi_theme_options['ts_enable_search'] ): ?>
							<div class="search-button search-icon visible-ipad">
								<span class="icon">
									<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M21.6167 27.9833C25.1329 27.9833 27.9833 25.1329 27.9833 21.6167C27.9833 18.1005 25.1329 15.25 21.6167 15.25C18.1005 15.25 15.25 18.1005 15.25 21.6167C15.25 25.1329 18.1005 27.9833 21.6167 27.9833Z" stroke="#FF9923" stroke-width="1.91" stroke-miterlimit="10"/>
									<path d="M32.7495 32.75L25.9912 25.9917" stroke="#FF9923" stroke-width="1.91" stroke-miterlimit="10"/>
									</svg>
								</span>
							</div>
							<?php endif; ?>
							
							<div class="header-contact visible-ipad hidden-phone"><?php mymedi_header_contact_information(); ?></div>
							
						</div>
					</div>
				</div>
			
				<div class="header-bottom hidden-phone">
					<div class="container">					
						<div class="menu-wrapper">
								
							<div class="ts-menu">
								<?php 
									if ( has_nav_menu( 'primary' ) ) {
										wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'main-menu pc-menu ts-mega-menu-wrapper','theme_location' => 'primary','walker' => new MyMedi_Walker_Nav_Menu() ) );
									}
									else{
										wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'main-menu pc-menu ts-mega-menu-wrapper' ) );
									}
								?>
							</div>
							
						</div>
						<div class="header-right ts-alignright hidden-ipad">
							<?php mymedi_header_contact_information(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</header>