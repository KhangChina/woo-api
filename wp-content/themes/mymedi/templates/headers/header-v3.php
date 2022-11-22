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
					<div class="header-right">												
						
						<?php 
						if( function_exists('ts_header_social_icons') ):
							ts_header_social_icons();
						endif;
						?>
						
						<?php mymedi_top_header_menu(); ?>
						
						<div class="header-contact"><?php mymedi_header_contact_information(); ?></div>
						
					</div>
				</div>
			</div>
			
			<div class="header-middle header-sticky">
				<div class="container">

					<div class="logo-wrapper"><?php echo mymedi_theme_logo(); ?></div>
					
					<div class="header-right">
							
						<?php if( $mymedi_theme_options['ts_enable_tiny_shopping_cart'] ): ?>
						<div class="shopping-cart-wrapper">
							<?php echo mymedi_tiny_cart(); ?>
						</div>
						<?php endif; ?>
						
						<?php if( class_exists('YITH_WCWL') && $mymedi_theme_options['ts_enable_tiny_wishlist'] ): ?>
							<div class="my-wishlist-wrapper"><?php echo mymedi_tini_wishlist(); ?></div>
						<?php endif; ?>
						
						<?php if( $mymedi_theme_options['ts_enable_tiny_account'] ): ?>
						<div class="my-account-wrapper">							
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
						
						<?php 
						if( function_exists('ts_header_social_icons') ):
							ts_header_social_icons();
						endif;
						?>
						
						<div class="search-menu-wrapper">
							<div class="search-menu">
								<?php if( $mymedi_theme_options['ts_enable_search'] ): ?>
								<div class="ts-search-by-category"><?php get_search_form(); ?></div>
								<?php endif; ?>	
								
								<div class="menu-wrapper">
									<div class="ts-menu">
										<span class="ic-mobile-menu-button visible-ipad"></span>
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
		</div>	
	</div>
</header>