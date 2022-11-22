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
				
					<!-- Menu Icon -->
					<div class="ts-group-meta-icon-toggle visible-phone">
						<span class="ic-mobile-menu-button">
							<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M33.0652 17H12.6124C12.2449 17 12 16.8947 12 16.7368V15.2632C12 15.1053 12.2449 15 12.6124 15H33.1876C33.5551 15 33.8 15.1053 33.8 15.2632V16.7368C33.6775 16.8947 33.4326 17 33.0652 17Z" fill="#FF9923"/>
							<path d="M33.0652 24H12.6124C12.2449 24 12 23.8947 12 23.7368V22.2632C12 22.1053 12.2449 22 12.6124 22H33.1876C33.5551 22 33.8 22.1053 33.8 22.2632V23.7368C33.6775 23.8421 33.4326 24 33.0652 24Z" fill="#FF9923"/>
							<path d="M33.0652 31H12.6124C12.2449 31 12 30.8947 12 30.7368V29.2632C12 29.1053 12.2449 29 12.6124 29H33.1876C33.5551 29 33.8 29.1053 33.8 29.2632V30.7368C33.6775 30.8947 33.4326 31 33.0652 31Z" fill="#FF9923"/>
							</svg>
						</span>
					</div>

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
						<div class="ts-search-by-category"><?php get_search_form(); ?></div>
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
		
		</div>	
	</div>
</header>