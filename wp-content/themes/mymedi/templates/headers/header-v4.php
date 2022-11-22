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
		
			<div class="header-middle header-sticky">
				<div class="container">
				
					<?php if( $mymedi_theme_options['ts_enable_search'] ): ?>
					<div class="search-button search-icon visible-phone">
						<span class="icon">
							<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M21.6167 27.9833C25.1329 27.9833 27.9833 25.1329 27.9833 21.6167C27.9833 18.1005 25.1329 15.25 21.6167 15.25C18.1005 15.25 15.25 18.1005 15.25 21.6167C15.25 25.1329 18.1005 27.9833 21.6167 27.9833Z" stroke="#FF9923" stroke-width="1.91" stroke-miterlimit="10"/>
							<path d="M32.7495 32.75L25.9912 25.9917" stroke="#FF9923" stroke-width="1.91" stroke-miterlimit="10"/>
							</svg>
						</span>
					</div>
					<?php endif; ?>

					<div class="logo-wrapper"><?php echo mymedi_theme_logo(); ?></div>
					
					<div class="header-right">
							
						<?php if( $mymedi_theme_options['ts_enable_tiny_shopping_cart'] ): ?>
						<div class="shopping-cart-wrapper">
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
						<div class="search-button search-icon visible-ipad-portrait hidden-phone">
							<span class="icon">
								<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M21.6167 27.9833C25.1329 27.9833 27.9833 25.1329 27.9833 21.6167C27.9833 18.1005 25.1329 15.25 21.6167 15.25C18.1005 15.25 15.25 18.1005 15.25 21.6167C15.25 25.1329 18.1005 27.9833 21.6167 27.9833Z" stroke="#FF9923" stroke-width="1.91" stroke-miterlimit="10"/>
								<path d="M32.7495 32.75L25.9912 25.9917" stroke="#FF9923" stroke-width="1.91" stroke-miterlimit="10"/>
								</svg>
							</span>
						</div>
						<?php endif; ?>

						<?php if( $mymedi_theme_options['ts_header_currency'] || $mymedi_theme_options['ts_header_language'] ): ?>
						<div class="language-currency hidden-phone">
						
							<?php if( $mymedi_theme_options['ts_header_currency'] ): ?>
							<div class="header-currency"><?php mymedi_woocommerce_multilingual_currency_switcher(); ?></div>
							<?php endif; ?>
							
							<?php if( $mymedi_theme_options['ts_header_language'] ): ?>
							<div class="header-language"><?php mymedi_wpml_language_selector(); ?></div>
							<?php endif; ?>
							
						</div>
						<?php endif; ?>
						
						<?php if( $mymedi_theme_options['ts_enable_search'] ): ?>
						<div class="ts-search-by-category hidden-ipad-portrait"><?php get_search_form(); ?></div>
						<?php endif; ?>	
						
						<div class="menu-wrapper hidden-phone">
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
						
					</div>
				</div>
			</div>
			
			<div class="header-bottom hidden-phone">
				<div class="container">
					<?php mymedi_header_product_categories(); ?>
				</div>
			</div>
		
		</div>	
	</div>
</header>