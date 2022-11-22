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
			<div class="header-sticky">
				<div class="header-top visible-ipad">
					<div class="header-contact hidden-phone">
						<?php mymedi_header_contact_information(); ?>
					</div>
					
					<div id="ts-group-icons-header" class="container ts-group-icons-header visible-phone">
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
						
						<!-- Search Icon -->
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
						
						<!-- Myaccount Icon -->
						<?php if( $mymedi_theme_options['ts_enable_tiny_account'] ): ?>
						<div class="my-account-wrapper visible-phone">
							<?php echo mymedi_tiny_account(false); ?>
						</div>
						<?php endif; ?>
						
						<!-- Wishlist Icon -->
						<?php if( class_exists('YITH_WCWL') && $mymedi_theme_options['ts_enable_tiny_wishlist'] ): ?>
							<div class="my-wishlist-wrapper visible-phone"><?php echo mymedi_tini_wishlist(); ?></div>
						<?php endif; ?>
						
						<!-- Cart Icon -->
						<?php if( $mymedi_theme_options['ts_enable_tiny_shopping_cart'] && $mymedi_theme_options['ts_header_layout'] != 'v4' ): ?>
						<div class="shopping-cart-wrapper mobile-cart visible-phone">
							<?php echo mymedi_tiny_cart(true, false); ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
					
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
								<div class="search-button search-icon visible-ipad hidden-phone">
									<span class="icon">
										<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M21.6167 27.9833C25.1329 27.9833 27.9833 25.1329 27.9833 21.6167C27.9833 18.1005 25.1329 15.25 21.6167 15.25C18.1005 15.25 15.25 18.1005 15.25 21.6167C15.25 25.1329 18.1005 27.9833 21.6167 27.9833Z" stroke="#FF9923" stroke-width="1.91" stroke-miterlimit="10"/>
										<path d="M32.7495 32.75L25.9912 25.9917" stroke="#FF9923" stroke-width="1.91" stroke-miterlimit="10"/>
										</svg>
									</span>
								</div>
							<?php endif; ?>

							<?php if( $mymedi_theme_options['ts_header_currency'] || $mymedi_theme_options['ts_header_language'] ): ?>
							<div class="language-currency">
							
								<?php if( $mymedi_theme_options['ts_header_currency'] ): ?>
								<div class="header-currency"><?php mymedi_woocommerce_multilingual_currency_switcher(); ?></div>
								<?php endif; ?>
								
								<?php if( $mymedi_theme_options['ts_header_language'] ): ?>
								<div class="header-language"><?php mymedi_wpml_language_selector(); ?></div>
								<?php endif; ?>
								
							</div>
							<?php endif; ?>
							
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