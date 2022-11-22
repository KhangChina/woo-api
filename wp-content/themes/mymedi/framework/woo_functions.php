<?php 
/*** Tiny account ***/
if( !function_exists('mymedi_tiny_account') ){
	function mymedi_tiny_account( $show_dropdown = true ){
		$login_url = '#';
		$register_url = '#';
		$profile_url = '#';
		$logout_url = wp_logout_url(get_permalink());
		
		if( class_exists('WooCommerce') ){
			$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
			if ( $myaccount_page_id ) {
			  $login_url = get_permalink( $myaccount_page_id );
			  $register_url = $login_url;
			  $profile_url = $login_url;
			}		
		}
		else{
			$login_url = wp_login_url();
			$register_url = wp_registration_url();
			$profile_url = admin_url( 'profile.php' );
		}
		
		$_user_logged = is_user_logged_in();
		ob_start();
		?>
		<div class="ts-tiny-account-wrapper">
			<div class="account-control">
				<?php if( !$_user_logged ): ?>
				<a class="login" href="<?php echo esc_url($login_url); ?>" title="<?php esc_attr_e('Sign in', 'mymedi'); ?>">
					<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M22.4999 23.2684C25.0617 23.2684 27.1385 21.1916 27.1385 18.6298C27.1385 16.068 25.0617 13.9912 22.4999 13.9912C19.9381 13.9912 17.8613 16.068 17.8613 18.6298C17.8613 21.1916 19.9381 23.2684 22.4999 23.2684Z" stroke="#FF9923" stroke-width="1.91" stroke-miterlimit="10"/>
					<path d="M14 31.7684L14.2995 30.1088C14.6534 28.1923 15.6674 26.4602 17.1655 25.2135C18.6636 23.9668 20.551 23.2843 22.5 23.2845V23.2845C24.4513 23.285 26.3406 23.9698 27.839 25.2197C29.3374 26.4696 30.35 28.2055 30.7005 30.125L31 31.7845" stroke="#FF9923" stroke-width="1.91" stroke-miterlimit="10"/>
					</svg>
					<?php esc_html_e('Sign in', 'mymedi'); ?>
				</a>
				<?php else: ?>
				<a class="my-account" href="<?php echo esc_url($profile_url); ?>" title="<?php esc_attr_e('My Account', 'mymedi'); ?>">
					<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M22.4999 23.2684C25.0617 23.2684 27.1385 21.1916 27.1385 18.6298C27.1385 16.068 25.0617 13.9912 22.4999 13.9912C19.9381 13.9912 17.8613 16.068 17.8613 18.6298C17.8613 21.1916 19.9381 23.2684 22.4999 23.2684Z" stroke="#FF9923" stroke-width="1.91" stroke-miterlimit="10"/>
					<path d="M14 31.7684L14.2995 30.1088C14.6534 28.1923 15.6674 26.4602 17.1655 25.2135C18.6636 23.9668 20.551 23.2843 22.5 23.2845V23.2845C24.4513 23.285 26.3406 23.9698 27.839 25.2197C29.3374 26.4696 30.35 28.2055 30.7005 30.125L31 31.7845" stroke="#FF9923" stroke-width="1.91" stroke-miterlimit="10"/>
					</svg>
					<?php esc_html_e('My Account', 'mymedi'); ?>
				</a>
				<?php endif; ?>
				
				<?php if( $show_dropdown ): ?>
				<div class="account-dropdown-form dropdown-container">
					<div class="form-content">	
						<?php if( !$_user_logged ): ?>
							<?php wp_login_form( array('form_id' => 'ts-login-form') ); ?>
						<?php else: ?>
							<ul>
								<?php do_action('mymedi_before_my_account_dropdown_list'); ?>
								<li><a class="my-account" href="<?php echo esc_url($profile_url); ?>"><?php esc_html_e( 'My Account', 'mymedi' ); ?></a></li>
								<li><a class="log-out" href="<?php echo esc_url($logout_url); ?>"><?php esc_html_e( 'Logout', 'mymedi' ); ?></a></li>
							</ul>
						<?php endif; ?>
					</div>
				</div>
				<?php endif; ?>
				
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}

/*** Tiny Cart ***/
if( !function_exists('mymedi_tiny_cart') ){
	function mymedi_tiny_cart( $show_cart_control = true, $show_cart_dropdown = true ){
		if( !class_exists('WooCommerce') ){
			return '';
		}
		$cart_empty = WC()->cart->is_empty();
		$cart_url = wc_get_cart_url();
		$checkout_url = wc_get_checkout_url();
		$cart_number = WC()->cart->get_cart_contents_count();
		ob_start();
		?>
			<div class="ts-tiny-cart-wrapper">
				<?php if( $show_cart_control ): ?>
				<div class="cart-icon">
					<a class="cart-control" href="<?php echo esc_url($cart_url); ?>" title="<?php esc_attr_e('View your shopping cart', 'mymedi'); ?>">
						<span class="ic-cart">
							<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M18.0085 26.9441L30.7335 24.5817V17.4781H15.4585" stroke="#FF9923" stroke-width="1.91" stroke-miterlimit="10"/>
								<path d="M12.4331 15.1158H14.8248L17.9998 26.9441L16.6164 29.0008C16.484 29.2022 16.4145 29.4378 16.4164 29.6782V29.6782C16.4164 29.998 16.5446 30.3047 16.7728 30.5309C17.001 30.7571 17.3104 30.8841 17.6331 30.8841H27.5498" stroke="#FF9923" stroke-width="1.91" stroke-miterlimit="10"/>
								<path d="M27.55 32.4618C27.9872 32.4618 28.3416 32.1105 28.3416 31.6771C28.3416 31.2437 27.9872 30.8924 27.55 30.8924C27.1127 30.8924 26.7583 31.2437 26.7583 31.6771C26.7583 32.1105 27.1127 32.4618 27.55 32.4618Z" stroke="#FF9923" stroke-width="1.91" stroke-miterlimit="10"/>
								<path d="M19.5915 32.4618C20.0287 32.4618 20.3831 32.1105 20.3831 31.6771C20.3831 31.2437 20.0287 30.8924 19.5915 30.8924C19.1542 30.8924 18.7998 31.2437 18.7998 31.6771C18.7998 32.1105 19.1542 32.4618 19.5915 32.4618Z" stroke="#FF9923" stroke-width="1.91" stroke-miterlimit="10"/>
							</svg>
						</span>
						<span class="cart-number"><?php echo esc_html($cart_number) ?></span>
					</a>
					
					<?php if( $show_cart_dropdown ): ?>
					<span class="cart-drop-icon drop-icon"></span>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				
				<?php if( $show_cart_dropdown ): ?>
				<div class="cart-dropdown-form dropdown-container woocommerce">
					<div class="form-content">
						<?php if( $cart_empty ): ?>
							<h3 class="cart-number emty-title"><?php echo sprintf( esc_html__('Cart (%d)', 'mymedi'), $cart_number ) ?></h3>
							<label><?php esc_html_e('Your cart is currently empty', 'mymedi'); ?></label>
						<?php else: ?>
							<h3 class="cart-number"><?php echo sprintf( esc_html__('Cart (%d)', 'mymedi'), $cart_number ) ?></h3>
							<div class="cart-wrapper">
								<div class="cart-content">
									<ul class="cart_list">
										<?php 
										foreach( WC()->cart->get_cart() as $cart_item_key => $cart_item ):
											$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
											if ( !( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) ){
												continue;
											}
											$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
										?>
											<li class="woocommerce-mini-cart-item">
												<a class="thumbnail" href="<?php echo esc_url($product_permalink); ?>">
													<?php echo apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key ); ?>
												</a>
												<div class="cart-item-wrapper">	
													<h3 class="product-name">
														<a href="<?php echo esc_url($product_permalink); ?>">
															<?php echo apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key); ?>
														</a>
													</h3>
													<?php 
													if( $_product->is_sold_individually() ){
														$product_quantity = '<span class="quantity">1</span>';
													}else{
														$product_quantity = woocommerce_quantity_input( array(
															'input_name'  	=> "cart[{$cart_item_key}][qty]",
															'input_value' 	=> $cart_item['quantity'],
															'max_value'   	=> $_product->get_max_purchase_quantity(),
															'min_value'   	=> '0',
															'product_name'  => $_product->get_name()
														), $_product, false );
													}

													echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
													?>
													<span class="price"><?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?></span>
													
													<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-cart_item_key="%s">&times;</a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_html__( 'Remove this item', 'mymedi' ), $cart_item_key ), $cart_item_key ); ?>
												</div>
											</li>
										
										<?php endforeach; ?>
									</ul>
									<div class="dropdown-footer">
										<div class="total"><span class="total-title primary-text"><?php esc_html_e('Subtotal : ', 'mymedi'); ?></span><?php echo WC()->cart->get_cart_subtotal(); ?></div>
										
										<a href="<?php echo esc_url($cart_url); ?>" class="button view-cart"><?php esc_html_e('View Cart', 'mymedi'); ?></a>
										<a href="<?php echo esc_url($checkout_url); ?>" class="button checkout-button"><?php esc_html_e('Checkout', 'mymedi'); ?></a>
									</div>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<?php endif; ?>
			</div>
		<?php
		return ob_get_clean();
	}
}
add_filter('woocommerce_add_to_cart_fragments', 'mymedi_tiny_cart_filter');
function mymedi_tiny_cart_filter($fragments){
	$cart_sidebar = mymedi_get_theme_options('ts_shopping_cart_sidebar');
	$fragments['.ts-tiny-cart-wrapper'] = mymedi_tiny_cart(true, !$cart_sidebar);
	if( $cart_sidebar ){
		$fragments['#ts-shopping-cart-sidebar .ts-tiny-cart-wrapper'] = mymedi_tiny_cart(false, true);
	}
	return $fragments;
}

add_action('wp_ajax_mymedi_update_cart_quantity', 'mymedi_update_cart_quantity');
add_action('wp_ajax_nopriv_mymedi_update_cart_quantity', 'mymedi_update_cart_quantity');
function mymedi_update_cart_quantity(){
	if( isset($_POST['cart_item_key'], $_POST['qty']) ){
		$cart_item_key = $_POST['cart_item_key'];
		$qty = $_POST['qty'];
		$cart =  WC()->cart->get_cart();
		if( isset($cart[$cart_item_key]) ){
			$qty = apply_filters( 'woocommerce_stock_amount_cart_item', wc_stock_amount( preg_replace( '/[^0-9\.]/', '', $qty ) ), $cart_item_key );
			if( !($qty === '' || $qty === $cart[$cart_item_key]['quantity']) ){
				if( !($cart[$cart_item_key]['data']->is_sold_individually() && $qty > 1) ){
					WC()->cart->set_quantity( $cart_item_key, $qty, false );
					$cart_updated = apply_filters( 'woocommerce_update_cart_action_cart_updated', true );
					if( $cart_updated ){
						WC()->cart->calculate_totals();
					}
				}
			}
		}
		WC_AJAX::get_refreshed_fragments();
	}
}

/** Tini wishlist **/
function mymedi_tini_wishlist(){
	if( !(class_exists('WooCommerce') && class_exists('YITH_WCWL')) ){
		return;
	}
	
	ob_start();
	
	$wishlist_page_id = get_option( 'yith_wcwl_wishlist_page_id' );
	if( function_exists( 'wpml_object_id_filter' ) ){
		$wishlist_page_id = wpml_object_id_filter( $wishlist_page_id, 'page', true );
	}
	$wishlist_page = get_permalink( $wishlist_page_id );
	
	$count = yith_wcwl_count_products();
	
	?>
	<a title="<?php esc_attr_e('Wishlist', 'mymedi'); ?>" href="<?php echo esc_url($wishlist_page); ?>" class="tini-wishlist">
		<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M14.41 24.78L14.08 24.4529C13.5764 23.9557 13.1765 23.365 12.9032 22.7146C12.6299 22.0641 12.4885 21.3667 12.4871 20.6622C12.4843 19.2392 13.0518 17.8734 14.065 16.8653C15.0781 15.8571 16.4538 15.2892 17.8894 15.2864C19.325 15.2836 20.7029 15.8462 21.72 16.8504L23 18.139L24.28 16.8504C24.777 16.3356 25.3726 15.9243 26.0321 15.6406C26.6916 15.357 27.4015 15.2067 28.1203 15.1986C28.8392 15.1905 29.5524 15.3247 30.2182 15.5935C30.884 15.8622 31.4889 16.26 31.9976 16.7635C32.5062 17.267 32.9083 17.8661 33.1803 18.5257C33.4523 19.1853 33.5887 19.892 33.5814 20.6045C33.5742 21.317 33.4235 22.0209 33.1382 22.675C32.8529 23.329 32.4387 23.92 31.92 24.4133L31.59 24.7403L23 33.2746L17.07 27.3968L14.41 24.78Z" stroke="#FF9923" stroke-width="1.91" stroke-miterlimit="10"/>
		</svg>
		<?php esc_html_e('Wishlist ', 'mymedi'); ?><span class="wishlist-number"><span>(</span><?php echo esc_html($count); ?><span>)</span></span>
	</a>
	<?php
	return ob_get_clean();
}

function mymedi_update_tini_wishlist() {
	die(mymedi_tini_wishlist());
}

add_action('wp_ajax_mymedi_update_tini_wishlist', 'mymedi_update_tini_wishlist');
add_action('wp_ajax_nopriv_mymedi_update_tini_wishlist', 'mymedi_update_tini_wishlist');

if( !function_exists('mymedi_woocommerce_multilingual_currency_switcher') ){
	function mymedi_woocommerce_multilingual_currency_switcher(){
		if( class_exists('woocommerce_wpml') && class_exists('WooCommerce') && class_exists('SitePress') ){
			global $sitepress, $woocommerce_wpml;
			
			if( !isset($woocommerce_wpml->multi_currency) ){
				return;
			}
			
			$settings = $woocommerce_wpml->get_settings();
			
			$format = isset($settings['wcml_curr_template']) && $settings['wcml_curr_template'] != '' ? $settings['wcml_curr_template']:'%code%';
			$wc_currencies = get_woocommerce_currencies();
			if( !isset($settings['currencies_order']) ){
				$currencies = $woocommerce_wpml->multi_currency->get_currency_codes();
			}else{
				$currencies = $settings['currencies_order'];
			}
			
			$selected_html = '';
			foreach( $currencies as $currency ){
				if($woocommerce_wpml->settings['currency_options'][$currency]['languages'][$sitepress->get_current_language()] == 1 ){
					$currency_format = preg_replace(array('#%name%#', '#%symbol%#', '#%code%#'),
													array($wc_currencies[$currency], get_woocommerce_currency_symbol($currency), $currency), $format);
						
					if( $currency == $woocommerce_wpml->multi_currency->get_client_currency() ){
						$selected_html = '<a href="javascript: void(0)" class="wcml-cs-active-currency">'.$currency_format.'</a>';
						break;
					}
				}
			}
			
			echo '<div class="wcml_currency_switcher">';
				echo wp_kses($selected_html, 'mymedi_link');
				echo '<ul>';
			
				foreach( $currencies as $currency ){
					if($woocommerce_wpml->settings['currency_options'][$currency]['languages'][$sitepress->get_current_language()] == 1 ){
						$currency_format = preg_replace(array('#%name%#', '#%symbol%#', '#%code%#'),
														array($wc_currencies[$currency], get_woocommerce_currency_symbol($currency), $currency), $format);
						echo '<li><a rel="' . $currency . '">' . $currency_format . '</a></li>';
					}
				}
				
				echo '</ul>';
			echo '</div>';
		}
		else if( class_exists('WOOCS') && class_exists('WooCommerce') ){ /* Support WooCommerce Currency Switcher */
			global $WOOCS;
			$currencies = $WOOCS->get_currencies();
			if( !is_array($currencies) ){
				return;
			}
			?>
			<div class="wcml_currency_switcher">
				<a href="javascript: void(0)" class="wcml-cs-active-currency"><?php echo esc_html($WOOCS->current_currency); ?></a>
				<ul>
					<?php 
					foreach( $currencies as $key => $currency ){
						$link = add_query_arg('currency', $currency['name']);
						echo '<li rel="'.$currency['name'].'"><a href="'.esc_url($link).'">'.esc_html($currency['name']).'</a></li>';
					}
					?>
				</ul>
			</div>
			<?php
		}else{
			do_action('mymedi_header_currency_switcher'); /* Allow use another currency switcher */
		}
	}
}

add_filter( 'wcml_multi_currency_ajax_actions', 'mymedi_wcml_multi_currency_ajax_actions_filter' );
if( !function_exists('mymedi_wcml_multi_currency_ajax_actions_filter') ){
	function mymedi_wcml_multi_currency_ajax_actions_filter( $actions ){
		$actions[] = 'remove_from_wishlist';
		$actions[] = 'mymedi_ajax_search';
		$actions[] = 'mymedi_load_quickshop_content';
		$actions[] = 'mymedi_update_cart_quantity';
		$actions[] = 'mymedi_load_product_added_to_cart';
		$actions[] = 'ts_get_product_content_in_category_tab';
		return $actions;
	}
}

if( !function_exists('mymedi_wpml_language_selector') ){
	function mymedi_wpml_language_selector(){
		if( class_exists('SitePress') ){
			do_action('wpml_add_language_selector');
		}
		else{
			do_action('mymedi_header_language_switcher'); /* Allow use another language switcher */
		}
	}
}

if( !function_exists('mymedi_header_product_categories') ){
	function mymedi_header_product_categories(){
		if( !mymedi_get_theme_options('ts_enable_header_product_categories') || !shortcode_exists('ts_product_categories') ){
			return;
		}
		
		$atts = array(
			'style'		=> 'icon'
			,'per_page'	=> 9
			,'columns'	=> 7
			,'is_slider'=> 1
		);
		
		$product_categories = mymedi_get_theme_options('ts_header_product_categories');
		if( is_array($product_categories) ){
			$atts['ids'] = implode(',', $product_categories);
		}
		
		$atts = apply_filters('mymedi_header_product_categories_atts', $atts);
		
		$atts_str = array();
		foreach( $atts as $k => $v ){
			$atts_str[] = $k . '="'.$v.'"';
		}
		echo do_shortcode('[ts_product_categories '.implode(' ', $atts_str).']');
	}
}