<?php
if( !isset($data) ){
	$data = mymedi_get_theme_options();
}

update_option('ts_load_dynamic_style', 0);

$default_options = array(
				'ts_responsive'										=> 1
				,'ts_enable_rtl'									=> 0
				,'ts_layout_fullwidth'								=> 0
				,'ts_enable_search'									=> 1
				,'ts_custom_button_style'							=> 0
				,'ts_custom_header_icons_color'						=> 0
				,'ts_logo_width'									=> "216"
				,'ts_device_logo_width'								=> "144"
				,'ts_custom_font_ttf'								=> array( 'url' => '' )
		);
		
foreach( $default_options as $option_name => $value ){
	if( isset($data[$option_name]) ){
		$default_options[$option_name] = $data[$option_name];
	}
}

extract($default_options);
		
$default_colors = array(

				'ts_main_content_bg_color'									=> "#ffffff"
				,'ts_text_color'											=> "#5B6C8F"
				,'ts_heading_color'											=> "#103178"
				,'ts_link_color'											=> "#103178"
				,'ts_link_color_hover'										=> "#ff9923"
				,'ts_border_color'											=> "#f0f2f5"
				,'ts_input_bg_color'										=> "#f0f2f5"
				,'ts_primary_color'											=> "#103178"
				,'ts_text_color_in_bg_primary'								=> "#ffffff"
				,'ts_secondary_color'										=> "#ff9923"
				,'ts_text_color_in_bg_secondary'							=> "#ffffff"
				,'ts_button_background_color'								=> "#ff9923"
				,'ts_button_text_color'										=> "#ffffff"
				,'ts_button_background_hover'								=> "transparent"
				,'ts_button_text_hover'										=> "#ff9923"
				
				// STORE NOTICE
				,'ts_notice_bg_color'										=> "#ffffff"
				,'ts_notice_text_color'										=> "#103178"
				,'ts_notice_dark_bg_color'									=> "#103178"
				,'ts_notice_dark_text_color'								=> "#FFC800"
				,'ts_header_icon_color'										=> "#ff9923"
				,'ts_header_icon_color_hover'								=> "#103178"
				,'ts_header_count_number_bg_color'							=> "#103178"
				,'ts_header_count_number_text_color'						=> "#ffffff"
				
				// HEADER LIGHT
				,'ts_top_header_bg_color'									=> "#f0f2f5"
				,'ts_top_header_text_color'									=> "#5B6C8F"
				,'ts_top_header_border_color'								=> "#d9dee8"
				,'ts_middle_header_bg_color'								=> "#ffffff"
				,'ts_middle_header_text_color'								=> "#5B6C8F"
				,'ts_middle_header_border_color'							=> "#d9dee8"				
				,'ts_bottom_header_bg_color'								=> "#ffffff"
				,'ts_bottom_header_text_color'								=> "#5B6C8F"
				,'ts_bottom_header_border_color'							=> "#d9dee8"
				,'ts_menu_text_color'										=> "#103178"
				
				// HEADER DARK
				,'ts_top_header_dark_bg_color'								=> "#103178"
				,'ts_top_header_dark_text_color'							=> "#ffffff"
				,'ts_top_header_dark_border_color'							=> "#284686"
				,'ts_middle_header_dark_bg_color'							=> "#103178"
				,'ts_middle_header_dark_text_color'							=> "#ffffff"
				,'ts_middle_header_dark_border_color'						=> "#284686"
				,'ts_bottom_header_dark_bg_color'							=> "#103178"
				,'ts_bottom_header_dark_text_color'							=> "#9BABCD"
				,'ts_bottom_header_dark_border_color'						=> "#284686"
				,'ts_dark_menu_text_color'									=> "#ffffff"
				
				// PRODUCT
				,'ts_product_del_color'										=> "#202020"
				,'ts_rating_color'											=> "#848484"
				,'ts_rating_fill_color'										=> "#202020"
				,'ts_group_product_icon_background_color'					=> "#f0f2f5"
				,'ts_group_product_icon_text_color'							=> "#103178"
				,'ts_group_product_icon_text_hover_color'					=> "#ff9923"
				,'ts_shop_separate_background'								=> "#F7F8FA"
				,'ts_product_images_summary_background'						=> "#f0f2f5"
				,'ts_product_sale_label_text_color'							=> "#ffffff"
				,'ts_product_sale_label_background_color'					=> "#ff9923"
				,'ts_product_new_label_text_color'							=> "#ffffff"
				,'ts_product_new_label_background_color'					=> "#12A05C"
				,'ts_product_feature_label_text_color'						=> "#ffffff"
				,'ts_product_feature_label_background_color'				=> "#F00000"
				,'ts_product_outstock_label_text_color'						=> "#ffffff"
				,'ts_product_outstock_label_background_color'				=> "#d6d8db"
				
				// GROUP ICONS MOBILE
				,'ts_bottom_bar_background'									=> "#ffffff"
				,'ts_bottom_bar_border_color'								=> "#f0f2f5"
				,'ts_bottom_bar_icon_color'									=> "#ff9923"
);

$data = apply_filters('mymedi_custom_style_data', $data);

foreach( $default_colors as $option_name => $default_color ){
	if( isset($data[$option_name]['rgba']) ){
		$default_colors[$option_name] = $data[$option_name]['rgba'];
	}
	else if( isset($data[$option_name]['color']) ){
		$default_colors[$option_name] = $data[$option_name]['color'];
	}
}

extract( $default_colors );

/* Parse font option. Ex: if option name is ts_body_font, we will have variables below:
* ts_body_font (font-family)
* ts_body_font_weight
* ts_body_font_style
* ts_body_font_size
* ts_body_font_line_height
* ts_body_font_letter_spacing
*/
$font_option_names = array(
							'ts_body_font',
							'ts_body_font_medium',
							'ts_body_font_semi_bold',
							'ts_body_font_bold',
							'ts_heading_font',
							'ts_menu_font',
							'ts_sub_menu_font',
							);
$font_size_option_names = array( 
							'ts_h1_font', 
							'ts_h2_font', 
							'ts_h3_font', 
							'ts_h4_font', 
							'ts_h5_font', 
							'ts_h6_font',
							'ts_button_font',							
							'ts_h1_ipad_font', 
							'ts_h2_ipad_font', 
							'ts_h3_ipad_font', 
							'ts_h4_ipad_font',
							'ts_button_ipad_font',
							);
$font_option_names = array_merge($font_option_names, $font_size_option_names);
foreach( $font_option_names as $option_name ){
	$default = array(
		$option_name 						=> 'inherit'
		,$option_name . '_weight' 			=> 'normal'
		,$option_name . '_style' 			=> 'normal'
		,$option_name . '_size' 			=> 'inherit'
		,$option_name . '_line_height' 		=> 'inherit'
		,$option_name . '_letter_spacing' 	=> 'inherit'
	);
	if( is_array($data[$option_name]) ){
		if( !empty($data[$option_name]['font-family']) ){
			$default[$option_name] = $data[$option_name]['font-family'];
		}
		if( !empty($data[$option_name]['font-weight']) ){
			$default[$option_name . '_weight'] = $data[$option_name]['font-weight'];
		}
		if( !empty($data[$option_name]['font-style']) ){
			$default[$option_name . '_style'] = $data[$option_name]['font-style'];
		}
		if( !empty($data[$option_name]['font-size']) ){
			$default[$option_name . '_size'] = $data[$option_name]['font-size'];
		}
		if( !empty($data[$option_name]['line-height']) ){
			$default[$option_name . '_line_height'] = $data[$option_name]['line-height'];
		}
		if( !empty($data[$option_name]['letter-spacing']) ){
			$default[$option_name . '_letter_spacing'] = $data[$option_name]['letter-spacing'];
		}
	}
	extract( $default );
}
?>	
	
	/*
		1. CUSTOM FONT FAMILY
		2. CUSTOM FONT SIZE
		3. CUSTOM COLOR
		4. DOKAN
		5. RESPONSIVE
	*/
	
	<?php if( isset($ts_custom_font_ttf) && $ts_custom_font_ttf['url'] ):?>
	/*** Custom Font ***/
	@font-face {
		font-family: 'CustomFont';
		src:url('<?php echo esc_url($ts_custom_font_ttf['url']); ?>') format('truetype');
		font-weight: normal;
		font-style: normal;
	}
	<?php endif; ?>
	
	<?php if( isset($ts_logo_width) ):?>
	header .logo img,
	header .logo-header img{
		width: <?php echo absint($ts_logo_width); ?>px;
	}
	<?php endif; ?>
	
	<?php if( isset($ts_device_logo_width) ):?>
	.sticky-wrapper.is-sticky .logo img,
	.sticky-wrapper.is-sticky .logo-header img{
		width: <?php echo absint($ts_device_logo_width); ?>px;
	}
	@media only screen and (max-width: 1279px){
		.coming-soon-logo,
		header .logo img,
		header .logo-header img{
			width: <?php echo absint($ts_device_logo_width); ?>px;
		}
	}
	<?php endif; ?>
	
	/*------------------------------------------------------
		1. CUSTOM FONT FAMILY
	-------------------------------------------------------*/
	html,
	body,
	label,
	input,
	textarea,
	keygen,
	select,
	button,
	form table label,
	.ts-button.fa,
	li.fa,
	h3.product-name,
	.woocommerce ul.cart_list li a, 
	.woocommerce ul.product_list_widget li a,
	.font-body,
	body table.compare-list,
	.ts-product-brand-wrapper .item .heading-title{
		font-family: <?php echo esc_html($ts_body_font); ?>;
		font-style: <?php echo esc_html($ts_body_font_style); ?>;
		font-weight: <?php echo esc_html($ts_body_font_weight); ?>;
	}
	::-webkit-input-placeholder{
		font-family: <?php echo esc_html($ts_body_font); ?>;
		font-style: <?php echo esc_html($ts_body_font_style); ?>;
		font-weight: <?php echo esc_html($ts_body_font_weight); ?>;
	}
	:-moz-placeholder{
		font-family: <?php echo esc_html($ts_body_font); ?>;
		font-style: <?php echo esc_html($ts_body_font_style); ?>;
		font-weight: <?php echo esc_html($ts_body_font_weight); ?>;
	}
	::-moz-placeholder{
		font-family: <?php echo esc_html($ts_body_font); ?>;
		font-style: <?php echo esc_html($ts_body_font_style); ?>;
		font-weight: <?php echo esc_html($ts_body_font_weight); ?>;
	}
	:-ms-input-placeholder{
		font-family: <?php echo esc_html($ts_body_font); ?>;
		font-style: <?php echo esc_html($ts_body_font_style); ?>;
		font-weight: <?php echo esc_html($ts_body_font_weight); ?>;
	}
	.font-normal,
	.feature-excerpt,
	del.h1, del.h2, del.h3, del.h4, del.h5, del.h6,
	.vc_custom_heading.font-normal,
	.ts-header .menu-wrapper nav > ul.menu > li .sub-menu, 
	.ts-header .menu-wrapper nav > ul > li .sub-menu,
	.ts-menu ul li .menu-desc,
	.ts-header .menu-wrapper nav > ul.menu > li.font-body, 
	.ts-header .menu-wrapper nav > ul > li.font-body,
	.mobile-menu-wrapper .ts-menu li.font-body .sub-menu li,
	.mobile-menu-wrapper .ts-menu .sub-menu .sub-menu li:not(.font-body){
		font-weight: <?php echo esc_html($ts_body_font_weight) . ' !important'; ?>;
	}
	.widget_categories ul ul li,
	.ts-product-categories-widget,
	.widget_pages ul ul li,
	.widget_nav_menu ul ul li{
		font-weight: <?php echo esc_html($ts_body_font_weight); ?>
	}
	strong,
	.hightlight,
	.price,
	.cats-portfolio a,
	.woocommerce div.product .ts-shortcode p.price ins, 
	.woocommerce div.product .ts-shortcode span.price ins,
	.ul-style-none li,
	.ts-search-result-container .view-all-wrapper a,
	.product-label-rectangle .product .product-label .onsale, 
	.product-label-rectangle .product .product-label .new, 
	.product-label-rectangle .product .product-label .featured, 
	.product-label-rectangle .product .product-label .out-of-stock,
	.ts-list-of-product-categories-wrapper h3.heading-title,
	.widget_product_categories ul.product-categories > li > a,
	.footer-container .vc_custom_heading,
	.counter-wrapper > div,
	.widget_categories > ul > li,
	.widget_categories ul li.current-cat-ancestor > a,
	.widget_categories ul li.current-cat-parent > a,
	.widget_nav_menu ul > li,
	.widget_pages ul li,
	.ts-product-categories-widget > ul > li > a,
	.meta-content .sku-wrapper > span:first-child, 
	.meta-content .brands-link > span:first-child, 
	.meta-content .tags-link > span:first-child,
	.meta-content .cats-link > span:first-child,
	.woocommerce-cart .woocommerce-cart-form .woocommerce-Price-amount,
	.woocommerce-cart .cart-collaterals .woocommerce-Price-amount,
	.woocommerce-checkout .woocommerce-Price-amount,
	.woocommerce table.shop_table.order_details .woocommerce-Price-amount,
	.woocommerce ul#shipping_method .amount,
	.meta-content .portfolio-info > span:first-child,
	.ts-banner .banner-wrapper h2,
	.yith-wfbt-section .total_price_label,
	.woocommerce-grouped-product-list-item__price,
	.woocommerce-tabs .panel .block-image-2-columns li a{
		font-family: <?php echo esc_html($ts_body_font_medium); ?>;
		font-style: <?php echo esc_html($ts_body_font_medium_style); ?>;
		font-weight: <?php echo esc_html($ts_body_font_medium_weight); ?>;
	}
	.ts-header .menu-wrapper,
	.ts-header .menu-wrapper .sub-menu h1,	
	.ts-header .menu-wrapper .sub-menu h2,	
	.ts-header .menu-wrapper .sub-menu h3:not(.product-name),	
	.ts-header .menu-wrapper .sub-menu h4,	
	.ts-header .menu-wrapper .sub-menu h5,	
	.ts-header .menu-wrapper .sub-menu h6,	
	.ts-header .menu-wrapper nav > ul.menu > li,
	.ts-header .menu-wrapper nav > ul > li,
	.ts-header .menu-wrapper li.category-bold .sub-menu .ts-list-of-product-categories-wrapper ul li,
	.ts-header .menu-wrapper li.category-bold .sub-menu .ts-list-of-product-categories-wrapper + .ts-button-wrapper .ts-button,
	.mobile-menu-wrapper .ts-menu ul li:not(.font-body){
		font-family: <?php echo esc_html($ts_menu_font); ?>;
		font-style: <?php echo esc_html($ts_menu_font_style); ?>;
		font-weight: <?php echo esc_html($ts_menu_font_weight); ?>;
	}
	.ts-header .menu-wrapper .sub-menu,
	.ts-header .menu-wrapper nav > ul.menu .sub-menu li,
	.ts-header .menu-wrapper nav > ul .sub-menu li,
	.mobile-menu-wrapper .ts-menu ul li.font-body,
	.mobile-menu-wrapper .ts-menu ul li .sub-menu{
		font-family: <?php echo esc_html($ts_sub_menu_font); ?>;
		font-style: <?php echo esc_html($ts_sub_menu_font_style); ?>;
		font-weight: <?php echo esc_html($ts_sub_menu_font_weight); ?>;
	}
	a.button,
	button, 
	input[type^="submit"], 
	.ts-button,
	a.button-readmore,
	.ts-banner-button a,
	.woocommerce a.button, 
	.woocommerce button.button, 
	.woocommerce input.button,  
	.woocommerce a.button.alt, 
	.woocommerce button.button.alt, 
	.woocommerce input.button.alt,  
	.woocommerce a.button.disabled, 
	.woocommerce a.button:disabled, 
	.woocommerce a.button:disabled[disabled], 
	.woocommerce button.button.disabled, 
	.woocommerce button.button:disabled, 
	.woocommerce button.button:disabled[disabled], 
	.woocommerce input.button.disabled, 
	.woocommerce input.button:disabled, 
	.woocommerce input.button:disabled[disabled],
	.woocommerce #respond input#submit, 
	.shopping-cart p.buttons a, 
	.woocommerce .wishlist_table .product-add-to-cart a,
	.ts-header .ts-megamenu .ts-list-of-product-categories-wrapper .list-categories > ul:first-child,
	.woocommerce div.product .quantity label.ts-screen-reader-text,
	.woocommerce div.product form.cart .variations label,
	.more-less-buttons a,
	.ts-product-feature,
	body table.compare-list .add-to-cart td a,
	body table.compare-list .add-to-cart td a:not(.unstyled_button),
	.meta-wrapper-2 .quantity .screen-reader-text,
	input[type="submit"].dokan-btn, 
	a.dokan-btn, 
	.dokan-btn{
		font-family: <?php echo esc_html($ts_body_font_medium); ?>;
		font-style: <?php echo esc_html($ts_body_font_medium_style); ?>;
		font-weight: <?php echo esc_html($ts_body_font_medium_weight); ?>;
	}
	.font-bold,
	.ul-style.font-bold li,
	.ul-style-none.font-bold li,
	.tagcloud a,
	.tags-link a,
	.footer-container a.button.button-light,
	.ts-shortcode .load-more-wrapper .load-more, 
	.ts-shop-load-more .load-more,
	.ts-portfolio-wrapper .cats-portfolio > a,
	.entry-meta-middle .date-time,
	.counter-wrapper > div .number > span,
	.meta-wrapper .stock-quantity > span,
	blockquote .author,
	blockquote cite,
	.author-info .author-role,
	.vc_custom_heading.font-normal strong,
	.mailchimp-subscription .subscribe-email .button,
	.list-categories ul.tabs li.current, 
	.column-tabs ul.tabs li.current,
	body.wpb-js-composer .vc_general.vc_tta-tabs .vc_tta-tab.vc_active,
	.commentlist li.comment .entry-meta-top,
	.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta,
	.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta strong,
	.woocommerce .widget_price_filter .price_slider_amount .button,
	.woocommerce .woocommerce-widget-layered-nav-dropdown .woocommerce-widget-layered-nav-dropdown__submit,
	.woocommerce-page .widget_price_filter .price_slider_amount .button,
	.woocommerce-tabs table tbody > tr > td,
	.comment-meta .edit,
	.comment-meta .reply,
	.woocommerce-Address-title a.edit,
	.logged-in-as > a,
	h3.font-normal strong,
	.widget_categories ul ul li.current-cat,
	.widget_categories ul ul li.current-cat-ancestor > a,
	.widget_categories ul ul li.current-cat-parent > a,
	.ts-product-categories-widget ul ul li.current > a,
	.ts-product-categories-widget ul li.cat-parent.active > a,
	#main-content .woocommerce.columns-1 > .products .product .meta-wrapper > .product-name,
	#main-content .woocommerce:not(.columns-1) > .products .product .meta-wrapper > .product-name:not(:first-child),
	.woocommerce #review_form #respond .comment-reply-title,
	.filter-widget-area-button a,
	.woocommerce .woocommerce-ordering .orderby-current,
	.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
	.woocommerce #review_form #respond #commentform label,
	.woocommerce table.shop_table th,
	.cart-collaterals .cart_totals table.shop_table tbody tr.shipping td:before,
	.cart-collaterals .cart_totals table.shop_table tbody tr.cart-subtotal td:before, 
	.cart-collaterals .cart_totals table.shop_table tbody tr.order-total td:before,
	.woocommerce table.shop_table_responsive tr td::before, 
	.woocommerce-page table.shop_table_responsive tr td::before,
	.wishlist_table .product-price,
	.woocommerce div.product p.price ins, 
	.woocommerce div.product span.price ins,
	table.my_account_orders .amount,
	table.my_account_orders .woocommerce-orders-table__cell-order-number,
	.widget_price_filter .price_slider_amount .button,
	.woocommerce-account .woocommerce-MyAccount-navigation li.is-active,
	.woocommerce div.product div.summary .availability,
	.woocommerce div.product div.summary form.cart .variations select,
	.ts-product-attribute div.option:not(.color) a,
	div.product .single-navigation > a > span,
	.woocommerce div.product .yith-wfbt-items .price > .amount,
	div.product .yith-wfbt-section .yith-wfbt-form .yith-wfbt-items li span.checkboxbutton.checked + a,
	div.product .yith-wfbt-section .yith-wfbt-form .yith-wfbt-items li span.checkboxbutton.checked + .product-name,
	.ts-write-a-review-button,
	.yith-wfbt-section .total_price,
	.ts-portfolio-wrapper .filter-bar li.current,
	.product-filter-by-brand ul li.selected label,
	.product-filter-by-price ul li.chosen label,
	.product-filter-by-availability ul li input[checked="checked"] + label,
	.woocommerce .woocommerce-widget-layered-nav-list .woocommerce-widget-layered-nav-list__item--chosen a,
	.header-top .header-left strong,
	.wishlist_table .amount,
	.woocommerce-error strong, 
	.woocommerce-info strong, 
	.woocommerce-message strong,
	.woocommerce-error a, 
	.woocommerce-info a, 
	.woocommerce-message a,
	.ts-banner .banner-wrapper .discount,
	.meta-wrapper-2 > .price{
		font-family: <?php echo esc_html($ts_body_font_semi_bold); ?>;
		font-style: <?php echo esc_html($ts_body_font_semi_bold_style); ?>;
		font-weight: <?php echo esc_html($ts_body_font_semi_bold_weight); ?>;
	}
	header .logo-wrapper .logo a,
	div.product .yith-wfbt-section .yith-wfbt-images td:not(:last-child) > a:after{
		font-family: <?php echo esc_html($ts_body_font_bold); ?>;
		font-style: <?php echo esc_html($ts_body_font_bold_style); ?>;
		font-weight: <?php echo esc_html($ts_body_font_bold_weight); ?>;
	}
	h1, h2, h3, h4, h5, h6, 
	.h1, .h2, .h3, .h4, .h5, .h6,
	.woocommerce-cart .cart-collaterals .cart_totals > h2{
		font-family: <?php echo esc_html($ts_heading_font); ?>;
		font-style: <?php echo esc_html($ts_heading_font_style); ?>;
		font-weight: <?php echo esc_html($ts_heading_font_weight); ?>;
	}
	.product-style-6 .products .product h3,
	.product-style-6.woocommerce .products .product h3{
		font-weight: <?php echo esc_html($ts_heading_font_weight); ?>;
	}
	
	/*------------------------------------------------------
		II. CUSTOM FONT SIZE
	-------------------------------------------------------*/
	html,
	body,
	.ts-button.fa,
	li.fa,
	.font-body,
	h3.product-name,
	.ts-tiny-account-wrapper .dropdown-container,
	.ts-feature-wrapper .feature-header .feature-title,
	.style-icon .products .product-category .meta-wrapper h3.heading-title,
	.woocommerce > form.checkout #order_review .amount,
	.ts-product-brand-wrapper .item .heading-title,
	.comments-area #comment-wrapper .heading-title > small,
	.woocommerce-checkout textarea, 
	.woocommerce-checkout select, 
	.woocommerce-checkout .woocommerce-shipping-fields, 
	html .woocommerce-checkout input[type^="search"], 
	html .woocommerce-checkout input[type^="text"], 
	html .woocommerce-checkout input[type^="email"], 
	html .woocommerce-checkout input[type^="password"], 
	html .woocommerce-checkout input[type^="number"], 
	html .woocommerce-checkout input[type^="tel"],
	table.wishlist_table,
	.widget_categories ul ul li,
	.widget_pages ul ul li,
	.widget_nav_menu ul ul li,
	.ts-product-categories-widget ul ul li,
	.product-style-3 .ts-megamenu-container .ts-shortcode .products .product .meta-wrapper-2 .loop-add-to-cart .button,
	.product-style-4 .ts-megamenu-container .ts-shortcode .products .product .meta-wrapper-2 .loop-add-to-cart .button,
	body table.compare-list tr.remove td > a .remove:before,
	.woocommerce tr.remove div.blockUI.blockOverlay:after,
	.woocommerce .widget_price_filter .price_slider_amount .price_label span,
	.woocommerce div.product.show-tabs-content-default .woocommerce-tabs #reviews #reply-title a{
		font-size: <?php echo esc_html($ts_body_font_size); ?>;
		line-height: <?php echo esc_html($ts_body_font_line_height); ?>;
	}
	label,
	input,
	textarea,
	select,
	button,
	form table label,
	.header-top ul li,
	.woocommerce-address-fields textarea, 
	.woocommerce-address-fields select, 
	html .woocommerce-address-fields input[type^="text"], 
	html .woocommerce-address-fields input[type^="email"], 
	html .woocommerce-address-fields input[type^="password"], 
	html .woocommerce-address-fields input[type^="number"], 
	html .woocommerce-address-fields input[type^="tel"],
	.wishlist_table .item-details-table td > .amount,
	.wishlist_table ins,
	.wishlist_table del,
	.footer-container .button,
	.before-loop-wrapper #ts-filter-widget-area label,
	div.product .yith-wfbt-section .yith-wfbt-form .yith-wfbt-items li .product-name,
	.product-style-2 .product-group-button > div.loop-add-to-cart a,
	.woocommerce table.compare-list a.button.loading:after,
	.product-style-3 .cross-sells .products .product .meta-wrapper-2 .loop-add-to-cart .button, 
	.product-style-3 .up-sells .products .product .meta-wrapper-2 .loop-add-to-cart .button, 
	.product-style-3 .related .products .product .meta-wrapper-2 .loop-add-to-cart .button,
	.product-style-4 .cross-sells .products .product .meta-wrapper-2 .loop-add-to-cart .button, 
	.product-style-4 .up-sells .products .product .meta-wrapper-2 .loop-add-to-cart .button, 
	.product-style-4 .related .products .product .meta-wrapper-2 .loop-add-to-cart .button,
	.product-style-3 .ts-shortcode .products .product .meta-wrapper-2 .loop-add-to-cart .button,
	.product-style-4 .ts-shortcode .products .product .meta-wrapper-2 .loop-add-to-cart .button,
	.product-style-3 .woocommerce.main-products:not(.columns-1) > .products .product .meta-wrapper-2 .loop-add-to-cart .button,
	.product-style-4 .woocommerce.main-products:not(.columns-1) > .products .product .meta-wrapper-2 .loop-add-to-cart .button,
	.woocommerce.main-products:not(.columns-1) > .products .product-group-button-meta > div.loop-add-to-cart a{
		font-size: <?php echo esc_html($ts_body_font_size); ?>;
	}
	::-webkit-input-placeholder{
		font-size: <?php echo esc_html($ts_body_font_size); ?>;
	}
	:-moz-placeholder{
		font-size: <?php echo esc_html($ts_body_font_size); ?>;
	}
	::-moz-placeholder{
		font-size: <?php echo esc_html($ts_body_font_size); ?>;
	}
	:-ms-input-placeholder{
		font-size: <?php echo esc_html($ts_body_font_size); ?>;
	}
	.feature-excerpt{
		font-size: <?php echo esc_html($ts_body_font_size) . ' !important'; ?>;
	}
	.ts-store-notice{
		font-size: <?php echo esc_html( absint($ts_body_font_size) - 1 ) . 'px'; ?>;
	}
	h1, .h1,
	a.button.h1,
	.ts-button-wrapper.h1 a.ts-button,
	.ts-heading.h1 > .heading,
	.entry-content h4.entry-title,
	.comments-area .heading-title,
	.ts-mailchimp-subscription-shortcode.heading-h1 .heading-title,
	.single-portfolio .entry-content header .entry-title,
	.columns-1 .list-posts article.sticky h4.entry-title,
	.columns-2 .list-posts article.sticky h4.entry-title,
	.columns-3 .list-posts article.sticky h4.entry-title,
	.ts-shortcode .shortcode-heading-wrapper h2,
	.woocommerce div.product .summary .price,
	.form-center .widget-title-wrapper .heading-title,
	.form-vertical .widget-title-wrapper .heading-title,
	.ts-product-in-category-tab-wrapper .column-tabs .heading-title,
	.ts-product-in-product-type-tab-wrapper .column-tabs .heading-title{
		font-size: <?php echo esc_html($ts_h1_font_size); ?>;
		line-height: <?php echo esc_html($ts_h1_font_line_height); ?>; 
	}
	h2, .h2,
	a.button.h2,
	.ts-button-wrapper.h2 a.ts-button,
	.ts-heading.h2 > .heading,
	.ts-mailchimp-subscription-shortcode .heading-title,
	.woocommerce-billing-fields > h3,
	.woocommerce > form.checkout #order_review_heading,
	.woocommerce div.product .product_title,
	.yith-wfbt-section .total_price,
	#ts-quickshop-modal .woocommerce div.product .summary .price,
	.ts-feature-wrapper.vertical-icon.has-subtitle .feature-header .feature-title,
	.ts-feature-wrapper.vertical-image.has-subtitle .feature-header .feature-title{
		font-size: <?php echo esc_html($ts_h2_font_size); ?>;
		line-height: <?php echo esc_html($ts_h2_font_line_height); ?>; 
	}
	#main-content .woocommerce.columns-1 .product .meta-wrapper-2 .price{
		font-size: <?php echo esc_html($ts_h2_font_size); ?>;
	}
	h3, .h3,
	a.button.h3,
	.ts-button-wrapper.h3 a.ts-button,
	.ts-heading.h3 > .heading,
	.related-posts .theme-title,
	.comments-area #comment-wrapper .heading-title,
	.single-portfolio > .ts-portfolio-wrapper .shortcode-title,
	.list-categories ul.tabs li, 
	.column-tabs ul.tabs li,
	body.wpb-js-composer .vc_general.vc_tta-tabs .vc_tta-tab,
	.form-vertical .newsletter,
	.columns-2 .list-posts article h4.entry-title,
	.woocommerce div.product .woocommerce-tabs ul.tabs li a,
	.vc_col-sm-3 .columns-1 .shortcode-heading-wrapper h2,
	.vc_col-sm-4 .columns-1 .shortcode-heading-wrapper h2,
	.ts-feature-wrapper .feature-subtitle,
	.ts-portfolio-wrapper .filter-bar li,
	.ts-banner .banner-wrapper h2,
	.woocommerce #review_form #respond .comment-reply-title,
	#main-content > .site-content > .woocommerce > .ts-shortcode.ts-product .shortcode-heading-wrapper .shortcode-title{
		font-size: <?php echo esc_html($ts_h3_font_size); ?>;
		line-height: <?php echo esc_html($ts_h3_font_line_height); ?>;
	}
	h4, .h4,
	a.button.h4,
	.ts-button-wrapper.h4 a.ts-button,
	.ts-heading.h4 > .heading,
	.ts-products-widget h2,
	.ts-blogs .entry-content h4.entry-title,
	.columns-3 .list-posts article h4.entry-title,
	.woocommerce div.product.tabs-in-summary .woocommerce-tabs ul.tabs li a,
	.ts-feature-wrapper.vertical-icon .feature-header .feature-title,
	.ts-feature-wrapper.vertical-image .feature-header .feature-title{
		font-size: <?php echo esc_html($ts_h4_font_size); ?>;
		line-height: <?php echo esc_html($ts_h4_font_line_height); ?>;
	}
	h5, .h5,
	a.button.h5,
	.ts-button-wrapper.h5 a.ts-button,
	.price,
	.woocommerce div.product .ts-shortcode p.price, 
	.woocommerce div.product .ts-shortcode span.price,
	.ts-list-of-product-categories-wrapper h3.heading-title,
	.vc_tta.vc_general h4.vc_tta-panel-title,
	body.wpb-js-composer .vc_toggle .vc_toggle_title h4,
	.portfolio-inner .portfolio-meta h4,
	.widget_categories > ul > li,
	.widget_nav_menu ul > li,
	.widget_pages ul li,
	.ts-product-categories-widget .ts-product-categories-widget > ul > li,
	.widget_product_categories ul.product-categories > li > a,
	.ts-search-result-container .view-all-wrapper a,
	.ts-col-18 .ts-blogs.columns-3 .entry-content h4.entry-title,
	.ts-blogs.columns-4 .entry-content h4.entry-title,
	.columns-3 .ts-col-18 .list-posts article h4.entry-title,
	.ts-megamenu-widgets-container .widget .widgettitle,
	.woocommerce-page.archive #left-sidebar .widget-container .widget-title,
	.woocommerce-page.archive #right-sidebar .widget-container .widget-title,
	.woocommerce-page.archive .filter-widget-area .widget-container .widget-title,
	.woocommerce-account .woocommerce-MyAccount-navigation li,
	.product-group-button-meta > div.loop-add-to-cart .button.loading:after,
	body.wpb-js-composer .vc_tta.vc_general .vc_tta-panel-title>a,
	.footer-container .ts-social-icons .social-icons,
	.product-style-5 .ts-product.meta-center .products .product h3,
	.ts-heading.h5 > .heading{
		font-size: <?php echo esc_html($ts_h5_font_size); ?>;
		line-height: <?php echo esc_html($ts_h5_font_line_height); ?>;
	}
	h6, .h6,
	a.button.h6,
	.ts-heading.h6 > .heading{
		font-size: <?php echo esc_html($ts_h6_font_size); ?>;
		line-height: <?php echo esc_html($ts_h6_font_line_height); ?>; 
	}
	.ts-header .menu-wrapper,
	.mobile-menu-wrapper .ts-menu ul li:not(.font-body),
	.ts-header .menu-wrapper li.category-bold .sub-menu .ts-list-of-product-categories-wrapper ul li,
	.ts-header .menu-wrapper li.category-bold .sub-menu .ts-list-of-product-categories-wrapper + .ts-button-wrapper .ts-button{
		font-size: <?php echo esc_html($ts_menu_font_size); ?>;
	}
	.ts-menu ul li .menu-desc,
	.ts-header .menu-wrapper nav > ul.menu > li.font-body, 
	.ts-header .menu-wrapper nav > ul > li.font-body,
	.mobile-menu-wrapper .ts-menu ul li.font-body,
	.mobile-menu-wrapper .ts-menu ul li.font-body .sub-menu li,
	.mobile-menu-wrapper .ts-menu ul .sub-menu .sub-menu li{
		font-size: <?php echo esc_html( absint($ts_menu_font_size) - 2 ) . 'px'; ?>;
	}
	.ts-header .menu-wrapper .sub-menu,
	.ts-header .menu-wrapper .sub-menu .widget_nav_menu ul > li{
		font-size: <?php echo esc_html($ts_sub_menu_font_size); ?>;
	}
	small,
	.header-top,
	.header-top ul li a,
	.woocommerce-error, 
	.woocommerce-info, 
	.woocommerce-message,
	.header-currency,
	.header-language,
	body .wpml-ls-legacy-dropdown a.wpml-ls-item-toggle > *,
	body .wpml-ls-legacy-dropdown-click a.wpml-ls-item-toggle > *,
	.ts-menu ul li .menu-desc,
	.breadcrumb-title-wrapper .breadcrumb-title .breadcrumbs,
	body .group-button-header .wpml-ls-legacy-dropdown a.wpml-ls-item-toggle > *,
	body .group-button-header .wpml-ls-legacy-dropdown-click a.wpml-ls-item-toggle > *,
	.woocommerce ul.cart_list li dl,
	ul.product_list_widget li dl,
	.woocommerce ul.product_list_widget li dl,
	.ts-blogs-widget .post_list_widget .entry-meta-top,
	.comment_list_widget .comment-meta .meta,
	.woocommerce-tabs table,
	.product-category .meta-wrapper .count,
	.product-category .meta-wrapper a.button,
	.button-readmore.small,
	.ts-shortcode .shop-more a.button,
	.ts-shortcode .show-all-button a.button,
	.woocommerce .woocommerce-error .button, 
	.woocommerce .woocommerce-info .button, 
	.woocommerce .woocommerce-message .button,
	.entry-meta-middle,
	.entry-author .role,
	.woocommerce-product-details__short-description,
	.ts-product-feature,
	.products .product .product-brands,
	.woocommerce .products .product .product-categories,
	.products .product .product-sku,
	.woocommerce .products .product .short-description,
	.meta-wrapper-2 .quantity .screen-reader-text,
	.woocommerce .product-group-button-meta > div.button-in a,
	.before-loop-wrapper,
	.before-loop-wrapper label,
	.woocommerce table.shop_table th,
	.woocommerce ul#shipping_method li label,
	.woocommerce > form.checkout #order_review,
	.woocommerce > form.checkout #order_review label,
	.woocommerce-shipping-fields,
	.woocommerce-checkout label,
	.woocommerce-billing-fields label,
	.woocommerce-cart .cart-collaterals .cart_totals > h2,
	.cart-collaterals .cart_totals table.shop_table tbody tr.shipping td:before,
	.cart-collaterals .cart_totals table.shop_table tbody tr.cart-subtotal td:before, 
	.cart-collaterals .cart_totals table.shop_table tbody tr.order-total td:before,
	.woocommerce table.shop_table_responsive tr td::before, 
	.woocommerce-page table.shop_table_responsive tr td::before,
	.cart-collaterals .woocommerce-shipping-destination, 
	.cart-collaterals .woocommerce-shipping-calculator,
	.shipping-calculator-form,
	.shipping-calculator-form,
	.shipping-calculator-form input,
	.shipping-calculator-form input[type="text"],
	.woocommerce form .shipping-calculator-form button[name="calc_shipping"],
	.woocommerce-cart .select2-container--default .select2-search--dropdown .select2-search__field,
	.woocommerce div.product div.summary form.cart .variations select,
	.woocommerce-cart .select2-results li,
	.button-in.wishlist a.loading:after,
	.button-in a.compare.loading:after,
	.woocommerce .products .product .meta-wrapper-2 a.compare,
	.woocommerce .products .product .meta-wrapper-2 a.compare .ts-tooltip,
	.woocommerce div.product .summary > a.button.compare .ts-tooltip:before,
	.woocommerce .products .product .meta-wrapper-2 a.compare .ts-tooltip:before,
	.woocommerce .products .product .meta-wrapper-2 .yith-wcwl-add-to-wishlist a .ts-tooltip:before,
	.woocommerce .products .product .meta-wrapper-2 .yith-wcwl-add-to-wishlist.added a:before,
	.woocommerce div.product .summary .yith-wcwl-add-to-wishlist a .ts-tooltip:before,
	.woocommerce div.product .summary .yith-wcwl-add-to-wishlist.added a:before,
	.cross-sells .products .product-group-button-meta > div.compare a.added:after,
	.up-sells .products .product-group-button-meta > div.compare a.added:after,
	.related .products .product-group-button-meta > div.compare a.added:after,
	.ts-shortcode .products .product-group-button-meta > div.compare a.added:after,
	.woocommerce.main-products:not(.columns-1) > .products .product-group-button-meta > div.compare a.added:after,
	.woocommerce div.product div.summary .yith-wcwl-add-to-wishlist a,
	.woocommerce div.product div.summary .yith-wcwl-add-to-wishlist a .ts-tooltip,
	.woocommerce div.product div.summary .yith-wcwl-add-to-wishlist a:before,
	.woocommerce div.product div.summary .yith-wcwl-add-to-wishlist a .ts-tooltip:before,
	.woocommerce div.product div.summary a.compare,
	.woocommerce div.product div.summary a.compare:before,
	.woocommerce div.product div.summary a.compare .ts-tooltip,
	.woocommerce div.product div.summary a.compare .ts-tooltip:before,
	.woocommerce.main-products.columns-1 > .products .product-group-button-meta > .button-in a,
	.woocommerce.main-products.columns-1 > .products .product-group-button-meta > .button-in a:before,
	.woocommerce.main-products.columns-1 > .products .product-group-button-meta > .button-in .ts-tooltip,
	.woocommerce.main-products.columns-1 > .products .product-group-button-meta > .button-in .ts-tooltip:before,
	.woocommerce div.product div.summary .product-brands,
	.woocommerce div.product .images .product-label .onsale,
	.woocommerce div.product .images .product-label .new,
	.woocommerce div.product .images .product-label .featured,
	.woocommerce div.product .images .product-label .out-of-stock,
	.woocommerce div.product div.summary .meta-content,
	.woocommerce div.product div.summary .variations_form .variations .attribute > .label,
	.woocommerce div.product form.cart .reset_variations,
	.woocommerce div.product .yith-wfbt-items .price,
	.woocommerce div.product .yith-wfbt-items .price del,
	div.product .yith-wfbt-section .yith-wfbt-form .yith-wfbt-items li,
	div.product .yith-wfbt-section .yith-wfbt-form .yith-wfbt-items label,
	.yith-wfbt-section .total_price_label,
	.woocommerce #review_form #respond #commentform label,
	.ts-product-attribute div.option a,
	body table.compare-list .add-to-cart td a,
	body table.compare-list .add-to-cart td a:not(.unstyled_button),
	.woocommerce .wishlist_table .product-add-to-cart a,
	.woocommerce .wishlist_table .product-add-to-cart a.alt,
	div.product .yith-wfbt-section .yith-wfbt-form .yith-wfbt-items li .product-name,
	div.product .single-navigation > a > span,
	.product .counter-wrapper .ref-wrapper,
	.group-button-header,
	.wishlist_table span.wishlist-in-stock, 
	.wishlist_table span.wishlist-out-of-stock,
	.wishlist_table.images_grid li .item-details table.item-details-table td.label, 
	.wishlist_table.mobile li .item-details table.item-details-table td.label, 
	.wishlist_table.mobile li table.additional-info td.label, 
	.wishlist_table.modern_grid li .item-details table.item-details-table td.label,
	.wishlist_table:not(.mobile) td .variation,
	.wishlist_table .dateadded,
	.wishlist_table .item-details-table,
	body table.compare-list,
	table.compare-list tbody th,
	.woocommerce form .form-row span em,
	.woocommerce form.checkout_coupon,
	.woocommerce table.my_account_orders,
	.threesixty .nav_bar a:before,
	.woocommerce ul.order_details li strong,
	.wishlist_table .product-add-to-cart .button.loading:after,
	.woocommerce .checkout-login-coupon-wrapper form.login{
		font-size: <?php echo esc_html( absint($ts_body_font_size) - 2 ) . 'px'; ?>;
	}
	.shipping-calculator-form ::-webkit-input-placeholder{
		font-size: <?php echo esc_html( absint($ts_body_font_size) - 2 ) . 'px'; ?>;
	}
	.shipping-calculator-form :-moz-placeholder{
		font-size: <?php echo esc_html( absint($ts_body_font_size) - 2 ) . 'px'; ?>;
	}
	.shipping-calculator-form ::-moz-placeholder{
		font-size: <?php echo esc_html( absint($ts_body_font_size) - 2 ) . 'px'; ?>;
	}
	.shipping-calculator-form :-ms-input-placeholder{
		font-size: <?php echo esc_html( absint($ts_body_font_size) - 2 ) . 'px'; ?>;
	}

	/*** Button ***/
	a.button,
	button, 
	input[type^="submit"], 
	.ts-button,
	a.button-readmore,
	.ts-banner-button a,
	.woocommerce a.button, 
	.woocommerce button.button, 
	.woocommerce input.button,  
	.woocommerce a.button.alt, 
	.woocommerce button.button.alt, 
	.woocommerce input.button.alt,  
	.woocommerce a.button.disabled, 
	.woocommerce a.button:disabled, 
	.woocommerce a.button:disabled[disabled], 
	.woocommerce button.button.disabled, 
	.woocommerce button.button:disabled, 
	.woocommerce button.button:disabled[disabled], 
	.woocommerce input.button.disabled, 
	.woocommerce input.button:disabled, 
	.woocommerce input.button:disabled[disabled],
	.woocommerce #respond input#submit, 
	.shopping-cart p.buttons a, 
	.woocommerce .widget_price_filter .price_slider_amount .button,
	.woocommerce-page .widget_price_filter .price_slider_amount .button,
	.woocommerce .woocommerce-widget-layered-nav-dropdown .woocommerce-widget-layered-nav-dropdown__submit,
	.woocommerce div.product .summary a.compare,
	.woocommerce div.product .summary .yith-wcwl-add-to-wishlist a,
	.more-less-buttons a,
	.ts-shortcode .load-more-wrapper .load-more, 
	.ts-shop-load-more .load-more,
	input[type="submit"].dokan-btn, 
	a.dokan-btn, 
	.dokan-btn{
		font-size: <?php echo esc_html($ts_h5_font_size); ?>;
	}
	textarea,
	select,
	html input[type^="search"],
	html input[type^="text"], 
	html input[type^="email"],
	html input[type^="password"],
	html input[type^="number"],
	html input[type^="tel"],
	.chosen-container a.chosen-single,
	.woocommerce-checkout .form-row .chosen-container-single .chosen-single,
	#add_payment_method table.cart td.actions .coupon .input-text, 
	.woocommerce-cart table.cart td.actions .coupon .input-text, 
	.woocommerce-checkout table.cart td.actions .coupon .input-text, 
	.woocommerce-page table.cart td.actions .coupon .input-text,
	.ts-store-notice .close:before,
	.cart_list li .cart-item-wrapper a.remove:before,
	.woocommerce .widget_shopping_cart .cart_list li a.remove:before,
	.woocommerce.widget_shopping_cart .cart_list li a.remove:before,
	body .wishlist_table.mobile li .additional-info-wrapper .product-remove:before,
	.search-button:before,
	.search-table .search-content.loading ~ .search-button:before,
	.ts-search-result-container > p{
		font-size: <?php echo esc_html($ts_button_font_size); ?>;
	}

	@media screen and (max-width: 1279px){	
		h1, .h1,
		a.button.h1,
		.ts-button-wrapper.h1 a.ts-button,
		.ts-heading.h1 > .heading,
		.comments-area .heading-title,
		.ts-shortcode .shortcode-heading-wrapper h2,
		.single-portfolio .entry-content header .entry-title,
		.columns-1 .list-posts article.sticky h4.entry-title,
		.columns-2 .list-posts article.sticky h4.entry-title,
		.columns-3 .list-posts article.sticky h4.entry-title,
		.woocommerce div.product .summary .price,
		.ts-mailchimp-subscription-shortcode.heading-h1 .heading-title,
		.woocommerce-tabs .panel .ul-style-none.style-horizontal li .h1-big,
		.form-center .widget-title-wrapper .heading-title,
		.form-vertical .widget-title-wrapper .heading-title,
		.ts-product-in-category-tab-wrapper .column-tabs .heading-title,
		.ts-product-in-product-type-tab-wrapper .column-tabs .heading-title{
			font-size: <?php echo esc_html($ts_h1_ipad_font_size); ?>;
			line-height: <?php echo esc_html($ts_h1_ipad_font_line_height); ?>;
		}
		h2, .h2,
		a.button.h2,
		.ts-button-wrapper.h2 a.ts-button,
		.ts-heading.h2 > .heading,
		.entry-content h4.entry-title,
		.ts-mailchimp-subscription-shortcode .heading-title,
		.woocommerce-billing-fields > h3,
		.woocommerce > form.checkout #order_review_heading,
		.woocommerce div.product .product_title,
		.yith-wfbt-section .total_price,
		.ts-feature-wrapper.vertical-icon.has-subtitle .feature-header .feature-title,
		.ts-feature-wrapper.vertical-image.has-subtitle .feature-header .feature-title{
			font-size: <?php echo esc_html($ts_h2_ipad_font_size); ?>;
			line-height: <?php echo esc_html($ts_h2_ipad_font_line_height); ?>;
		}
		h3, .h3,
		a.button.h3,
		.ts-button-wrapper.h3 a.ts-button,
		.ts-heading.h3 > .heading,
		.related-posts .theme-title,
		.comments-area #comment-wrapper .heading-title,
		.single-portfolio > .ts-portfolio-wrapper .shortcode-title,
		.list-categories ul.tabs li, 
		.column-tabs ul.tabs li,
		body.wpb-js-composer .vc_general.vc_tta-tabs .vc_tta-tab,
		.form-vertical .newsletter,
		.columns-2 .list-posts article h4.entry-title,
		.woocommerce div.product .woocommerce-tabs ul.tabs li a,
		.vc_col-sm-3 .columns-1 .shortcode-heading-wrapper h2,
		.vc_col-sm-4 .columns-1 .shortcode-heading-wrapper h2,
		.ts-feature-wrapper .feature-subtitle,
		.ts-banner .banner-wrapper h2,
		.woocommerce #review_form #respond .comment-reply-title,
		#main-content > .site-content > .woocommerce > .ts-shortcode.ts-product .shortcode-heading-wrapper .shortcode-title{
			font-size: <?php echo esc_html($ts_h3_ipad_font_size); ?>;
			line-height: <?php echo esc_html($ts_h3_ipad_font_line_height); ?>;
		}
		#main-content .woocommerce.columns-1 .product .meta-wrapper-2 .price{
			font-size: <?php echo esc_html($ts_h3_ipad_font_size); ?>;
		}
		h4, .h4,
		a.button.h4,
		.ts-button-wrapper.h4 a.ts-button,
		.ts-heading.h4 > .heading,
		.ts-products-widget h2,
		.ts-portfolio-wrapper .filter-bar li,
		.woocommerce div.product.tabs-in-summary .woocommerce-tabs ul.tabs li a,
		.ts-feature-wrapper.vertical-icon .feature-header .feature-title,
		.ts-feature-wrapper.vertical-image .feature-header .feature-title{
			font-size: <?php echo esc_html($ts_h4_ipad_font_size); ?>;
			line-height: <?php echo esc_html($ts_h4_ipad_font_line_height); ?>;
		}
		.ts-header .menu-wrapper .sub-menu .widget-title,
		.ts-header .menu-wrapper .sub-menu .widgettitle,
		.ts-header .menu-wrapper .sub-menu .ts-list-of-product-categories-wrapper h3.heading-title{
			font-size: <?php echo esc_html($ts_menu_font_size); ?>;
		}
		.ts-header .menu-wrapper,
		.ts-header .menu-wrapper li.category-bold .sub-menu .ts-list-of-product-categories-wrapper ul li,
		.ts-header .menu-wrapper li.category-bold .sub-menu .ts-list-of-product-categories-wrapper + .ts-button-wrapper .ts-button{
			font-size: <?php echo esc_html( absint($ts_menu_font_size) - 1 ) . 'px'; ?>;
		}
		.ts-menu ul li .menu-desc,
		.ts-header .menu-wrapper nav > ul.menu > li.font-body, 
		.ts-header .menu-wrapper nav > ul > li.font-body{
			font-size: <?php echo esc_html( absint($ts_menu_font_size) - 3 ) . 'px'; ?>;
		}
		.ts-header .menu-wrapper .sub-menu,
		.ts-header .menu-wrapper .sub-menu .widget_nav_menu ul > li{
			font-size: <?php echo esc_html( absint($ts_sub_menu_font_size) - 1 ) . 'px'; ?>;
		}	
		a.button,
		button, 
		input[type^="submit"], 
		.ts-button,
		a.button-readmore,
		.ts-banner-button a,
		.woocommerce a.button, 
		.woocommerce button.button, 
		.woocommerce input.button,  
		.woocommerce a.button.alt, 
		.woocommerce button.button.alt, 
		.woocommerce input.button.alt,  
		.woocommerce a.button.disabled, 
		.woocommerce a.button:disabled, 
		.woocommerce a.button:disabled[disabled], 
		.woocommerce button.button.disabled, 
		.woocommerce button.button:disabled, 
		.woocommerce button.button:disabled[disabled], 
		.woocommerce input.button.disabled, 
		.woocommerce input.button:disabled, 
		.woocommerce input.button:disabled[disabled],
		.woocommerce #respond input#submit, 
		.shopping-cart p.buttons a, 
		.woocommerce .widget_price_filter .price_slider_amount .button,
		.woocommerce-page .widget_price_filter .price_slider_amount .button,
		.woocommerce .woocommerce-widget-layered-nav-dropdown .woocommerce-widget-layered-nav-dropdown__submit,
		.woocommerce div.product .summary a.compare,
		.woocommerce div.product .summary .yith-wcwl-add-to-wishlist a,
		.more-less-buttons a,
		input[type="submit"].dokan-btn, 
		a.dokan-btn, 
		.dokan-btn,
		textarea,
		select,
		html input[type^="search"],
		html input[type^="text"], 
		html input[type^="email"],
		html input[type^="password"],
		html input[type^="number"],
		html input[type^="tel"],
		.chosen-container a.chosen-single,
		.woocommerce-checkout .form-row .chosen-container-single .chosen-single,
		#add_payment_method table.cart td.actions .coupon .input-text, 
		.woocommerce-cart table.cart td.actions .coupon .input-text, 
		.woocommerce-checkout table.cart td.actions .coupon .input-text, 
		.woocommerce-page table.cart td.actions .coupon .input-text,
		.ts-store-notice .close:before,
		.cart_list li .cart-item-wrapper a.remove:before,
		.woocommerce .widget_shopping_cart .cart_list li a.remove:before,
		.woocommerce.widget_shopping_cart .cart_list li a.remove:before,
		body .wishlist_table.mobile li .additional-info-wrapper .product-remove:before,
		.product-style-3 .ts-megamenu-container .ts-shortcode .products .product .meta-wrapper-2 .loop-add-to-cart .button,
		.product-style-4 .ts-megamenu-container .ts-shortcode .products .product .meta-wrapper-2 .loop-add-to-cart .button,
		.search-button:before,
		.search-table .search-content.loading ~ .search-button:before,
		.ts-search-result-container > p,
		.wc-proceed-to-checkout .button.continue-shopping{
			font-size: <?php echo esc_html($ts_body_font_size); ?>;
		}
		::-webkit-input-placeholder{
			font-size: <?php echo esc_html($ts_body_font_size); ?>;
		}
		:-moz-placeholder{
			font-size: <?php echo esc_html($ts_body_font_size); ?>;
		}
		::-moz-placeholder{
			font-size: <?php echo esc_html($ts_body_font_size); ?>;
		}
		:-ms-input-placeholder{
			font-size: <?php echo esc_html($ts_body_font_size); ?>;
		}
	}
	@media screen and (max-width: 991px){
		.style-default .products .product-category .meta-wrapper h3.heading-title{
			font-size: <?php echo esc_html($ts_h5_font_size); ?>;
		}
	}
	
	/*------------------------------------------------------
		III. CUSTOM COLOR
	-------------------------------------------------------*/
	/*** Body color ***/
	body,
	.body-color,
	.body-color a,
	html input:focus:invalid:focus, 
	html select:focus:invalid:focus,
	.ul-style.body-color li,
	.ul-style-none.body-color li,
	.quantity .qty, 
	.woocommerce .quantity .qty,
	.quantity .minus, 
	.quantity .plus,
	.ts-menu ul li .menu-desc,
	.header-v3 header .wpml-ls-legacy-dropdown .wpml-ls-sub-menu, 
	.header-v3 header .wpml-ls-legacy-dropdown-click .wpml-ls-sub-menu, 
	.header-v3 header .header-currency ul,
	.header-v3 .top-header-menu > ul li ul.sub-menu li,
	.header-v5 .shopping-cart-wrapper .dropdown-container, 
	.header-v5 .my-account-wrapper .dropdown-container, 
	.header-v5 header .wpml-ls-legacy-dropdown .wpml-ls-sub-menu, 
	.header-v5 header .wpml-ls-legacy-dropdown-click .wpml-ls-sub-menu, 
	.header-v5 header .header-currency ul,
	.header-v7 header .wpml-ls-legacy-dropdown .wpml-ls-sub-menu, 
	.header-v7 header .wpml-ls-legacy-dropdown-click .wpml-ls-sub-menu, 
	.header-v7 header .header-currency ul,
	.header-v7 .top-header-menu > ul li ul.sub-menu li,
	table.my_account_orders,
	body table.compare-list,
	.h1.body-color, .h2.body-color, .h3.body-color, .h4.body-color, .h5.body-color, .h6.body-color,
	.breadcrumb-title-wrapper .breadcrumb-title .page-title .count,
	.select2-container--default .select2-selection--single .select2-selection__rendered,
	.select2-container--default .select2-selection--single .select2-selection__placeholder,
	.woocommerce div.product div.summary .yith-wcwl-add-to-wishlist a,
	.woocommerce div.product div.summary .yith-wcwl-add-to-wishlist a .ts-tooltip,
	.woocommerce div.product div.summary .yith-wcwl-add-to-wishlist a:before,
	.woocommerce div.product div.summary .yith-wcwl-add-to-wishlist a .ts-tooltip:before,
	.woocommerce div.product div.summary a.compare,
	.woocommerce div.product div.summary a.compare:before,
	.woocommerce div.product div.summary a.compare .ts-tooltip,
	.woocommerce div.product div.summary a.compare .ts-tooltip:before,
	.woocommerce.main-products.columns-1 > .products .product-group-button-meta > .button-in a,
	.woocommerce.main-products.columns-1 > .products .product-group-button-meta > .button-in a:before,
	.woocommerce.main-products.columns-1 > .products .product-group-button-meta > .button-in .ts-tooltip,
	.woocommerce.main-products.columns-1 > .products .product-group-button-meta > .button-in .ts-tooltip:before,
	.ts-product-attribute div.option .ts-tooltip,
	.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta,
	.woocommerce #reviews #cancel-comment-reply-link,
	.woocommerce-info, 
	.woocommerce-message,
	.dokan-store #reviews #comments ol.commentlist li .comment-text time,
	.meta-wrapper-2 .product-group-button-meta > div.button-in a{
		color: <?php echo esc_html($ts_text_color); ?>;
	}
	.woocommerce div.product div.images .woocommerce-product-gallery__trigger::before{
		border-color: <?php echo esc_html($ts_text_color); ?>;
	}
	.woocommerce div.product div.images .woocommerce-product-gallery__trigger::after{
		background: <?php echo esc_html($ts_text_color); ?>;
	}

	/*** Heading ***/
	.heading-color,
	h1, h2, h3, h4, h5, h6,
	.h1, .h2, .h3, .h4, .h5, .h6,
	body.wpb-js-composer .vc_toggle_title .vc_toggle_icon,
	.product-name,
	h3.product-name,
	.form-vertical .newsletter,
	#commentform p label,
	.ts-feature-wrapper .feature-subtitle,
	body #yith-woocompare table.compare-list tbody th,
	.woocommerce div.product .woocommerce-tabs ul.tabs li a,
	.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
	.woocommerce div.product .woocommerce-tabs ul.tabs li.active a{
		color: <?php echo esc_html($ts_heading_color); ?>;
	}
	
	/*** Link ***/
	a,
	.woocommerce-MyAccount-content strong,
	.woocommerce-MyAccount-content a{
		color: <?php echo esc_html($ts_link_color); ?>;
	}
	a:hover,
	a:active,
	a:focus,
	.ts-header .menu-wrapper ul li.nopd:hover:before,
	.ts-header .menu-wrapper ul li.nopd:hover > a:not(.button),
	.woocommerce-MyAccount-content a:hover{
		color: <?php echo esc_html($ts_link_color_hover); ?>;
	}
	
	/*** Secondary color ***/
	.counter-wrapper > div .number > span,
	.sale-label > .wpb_wrapper{
		background: <?php echo esc_html($ts_secondary_color); ?>;
		color: <?php echo esc_html($ts_text_color_in_bg_primary); ?>;
	}
	.my-wishlist-wrapper > a .wishlist-number, 
	.shopping-cart-wrapper .cart-control .cart-number{
		background: <?php echo esc_html($ts_header_count_number_bg_color); ?>;
		color: <?php echo esc_html($ts_header_count_number_text_color); ?>;
	}
	.header-v5 .my-wishlist-wrapper > a .wishlist-number, 
	.header-v5 .shopping-cart-wrapper .cart-control .cart-number{
		background: <?php echo esc_html($ts_secondary_color); ?>;
	}
	.shopping-cart-wrapper svg path,
	.my-wishlist-wrapper svg path,
	.search-button svg path,
	.my-account-wrapper svg path,
	.header-transparent.header-text-light .header-template > div:not(.is-sticky) .shopping-cart-wrapper:hover svg path,
	.header-transparent.header-text-light .header-template > div:not(.is-sticky) .my-wishlist-wrapper:hover svg path,
	.header-transparent.header-text-light .header-template > div:not(.is-sticky) .search-button:hover svg path,
	.header-transparent.header-text-light .header-template > div:not(.is-sticky) .my-account-wrapper:hover svg path{
		stroke: <?php echo esc_html($ts_secondary_color); ?>;
	}
	.header-transparent.header-text-light .header-template > div:not(.is-sticky) .ic-mobile-menu-button:hover svg path{
		fill: <?php echo esc_html($ts_secondary_color); ?>;
	}
	.header-v5 .shopping-cart-wrapper:hover svg path,
	.header-v5 .my-wishlist-wrapper:hover svg path,
	.header-v5 .my-account-wrapper:hover svg path{
		stroke: <?php echo esc_html($ts_text_color_in_bg_primary); ?>;
	}
	.shopping-cart-wrapper:hover svg path,
	.my-wishlist-wrapper:hover svg path,
	.search-button:hover svg path,
	.my-account-wrapper:hover svg path{
		stroke: <?php echo esc_html($ts_primary_color); ?>;
	}
	.icon-menu-sticky-header svg path{
		fill: <?php echo esc_html($ts_primary_color); ?>;
	}
	
	<?php if( isset($ts_custom_header_icons_color) && $ts_custom_header_icons_color ): ?>
		.shopping-cart-wrapper svg path,
		.my-wishlist-wrapper svg path,
		.search-button svg path,
		.my-account-wrapper svg path,
		.header-transparent.header-text-light .header-template > div:not(.is-sticky) .shopping-cart-wrapper:hover svg path,
		.header-transparent.header-text-light .header-template > div:not(.is-sticky) .my-wishlist-wrapper:hover svg path,
		.header-transparent.header-text-light .header-template > div:not(.is-sticky) .search-button:hover svg path,
		.header-transparent.header-text-light .header-template > div:not(.is-sticky) .my-account-wrapper:hover svg path{
			stroke: <?php echo esc_html($ts_header_icon_color); ?>;
		}
		.header-transparent.header-text-light .header-template > div:not(.is-sticky) .ic-mobile-menu-button:hover svg path{
			fill: <?php echo esc_html($ts_header_icon_color); ?>;
		}
		.shopping-cart-wrapper:hover svg path,
		.my-wishlist-wrapper:hover svg path,
		.search-button:hover svg path,
		.my-account-wrapper:hover svg path{
			stroke: <?php echo esc_html($ts_header_icon_color_hover); ?>;
		}
		.icon-menu-sticky-header svg path{
			fill: <?php echo esc_html($ts_header_icon_color); ?>;
		}
		.icon-menu-sticky-header:hover svg path{
			fill: <?php echo esc_html($ts_header_icon_color_hover); ?>;
		}
	<?php endif; ?>
	
	.hightlight,
	.secondary-color,
	.secondary-color h1, .secondary-color h2, .secondary-color h3, .secondary-color h4, .secondary-color h5, .secondary-color h6,
	.secondary-color .h1, .secondary-color .h2, .secondary-color .h3, .secondary-color .h4, .secondary-color .h5, .secondary-color .h6,
	.ul-style-none.secondary-color li,
	.ul-style.icon-secondary li:before,
	.ol-style.icon-secondary li:before,
	.header-v5 .ts-store-notice,
	.search-button:hover .icon:before,
	.shopping-cart-wrapper:hover a > .ic-cart:before,
	.ts-tiny-account-wrapper:hover .account-control:before,
	.my-wishlist-wrapper:hover a:before,
	.ts-floating-sidebar .close:hover:after, 
	.ts-popup-modal .close:hover,
	body #cboxClose:hover:after,
	html body > h1 a.close:hover,
	#ts-product-360-modal .close:hover:after,
	#ts-quickshop-modal span.close:hover, 
	#ts-add-to-cart-popup-modal span.close:hover,
	body table.compare-list tr.remove td > a:hover,
	.woocommerce table.shop_table .product-remove:hover a:before,
	.cart_list li .cart-item-wrapper a.remove:hover:before,
	.woocommerce .widget_shopping_cart .cart_list li a.remove:hover:before,
	.woocommerce.widget_shopping_cart .cart_list li a.remove:hover:before,
	body table.compare-list tr.remove td > a:hover .remove:before,
	body .pp_pic_holder a.pp_close:hover,
	.ts-header .menu-wrapper ul li:hover,
	.header-v5 .ts-header .menu-wrapper ul li:hover,
	.woocommerce div.product .summary > form.cart .button.single_add_to_cart_button.loading:after,
	.woocommerce #main-content.ts-col-24 div.product.summary-2-columns:not(.images-summary-background) .summary-column-2 .button.loading:after,
	.header-language a:hover,
	.header-currency a:hover,
	body .wpml-ls-legacy-dropdown a:hover, 
	body .wpml-ls-legacy-dropdown a:focus, 
	body .wpml-ls-legacy-dropdown .wpml-ls-current-language:hover>a,
	body .wpml-ls-legacy-dropdown-click a:hover, 
	body .wpml-ls-legacy-dropdown-click a:focus, 
	body .wpml-ls-legacy-dropdown-click .wpml-ls-current-language:hover>a,
	.my-account-wrapper a:hover,
	.shopping-cart-wrapper a:hover,
	h3.product-name:hover,
	.search-button:hover:before,
	.header-v5 .header-language a:hover, 
	body.header-v5 .wpml-ls-legacy-dropdown a.wpml-ls-item-toggle:hover, 
	body.header-v5 .wpml-ls-legacy-dropdown-click a.wpml-ls-item-toggle:hover,
	.header-v5 .header-currency a:hover,
	.widget_categories li.current-cat > a,
	.widget_categories ul li.current-cat-ancestor > a,
	.widget_categories ul li.current-cat-parent > a,
	.ts-product-categories-widget ul li.current,
	.ts-product-categories-widget li.cat-parent.active > a,
	.yith-wfbt-section .total_price,
	.yith-wfbt-section .total_price .woocommerce-Price-amount,
	#main-content .woocommerce.columns-1 .product .meta-wrapper-2 .price,
	.woocommerce div.product .summary .price,
	.meta-content .cats-link a:hover, 
	.meta-content .tags-link a:hover,
	.product .product-brands a:hover,
	.woocommerce .products .product .product-categories a:hover,
	.product-filter-by-brand ul li:hover label,
	.product-filter-by-availability ul li:hover label,
	.product-filter-by-price ul li:hover label,
	.woocommerce .woocommerce-widget-layered-nav-list .woocommerce-widget-layered-nav-list__item--chosen a:hover,
	.woocommerce div.product div.summary .yith-wcwl-add-to-wishlist a:hover,
	.woocommerce div.product div.summary .yith-wcwl-add-to-wishlist a:hover .ts-tooltip,
	.woocommerce div.product div.summary .yith-wcwl-add-to-wishlist a:hover:before,
	.woocommerce div.product div.summary .yith-wcwl-add-to-wishlist a:hover .ts-tooltip:before,
	.woocommerce div.product div.summary a.compare:hover,
	.woocommerce div.product div.summary a.compare:hover:before,
	.woocommerce table.compare-list a.button.loading:after,
	.woocommerce div.product div.summary a.compare:hover .ts-tooltip,
	.woocommerce div.product div.summary a.compare:hover .ts-tooltip:before,
	.woocommerce.main-products.columns-1 > .products .product-group-button-meta > .button-in:hover a,
	.woocommerce.main-products.columns-1 > .products .product-group-button-meta > .button-in:hover a:before,
	.woocommerce.main-products.columns-1 > .products .product-group-button-meta > .button-in:hover .ts-tooltip,
	.woocommerce.main-products.columns-1 > .products .product-group-button-meta > .button-in:hover .ts-tooltip:before{
		color: <?php echo esc_html($ts_secondary_color); ?>;
	}
	.woocommerce > form.checkout #order_review,
	.product-filter-by-color ul li a:before, 
	.ts-product-attribute div.option.color a:before,
	.product-wrapper .color-swatch > div:before,
	div.product .yith-wfbt-section .yith-wfbt-form,
	.woocommerce-account .woocommerce-MyAccount-navigation li:hover,
	.woocommerce-account .woocommerce-MyAccount-navigation li.is-active{
		border-color: <?php echo esc_html($ts_secondary_color); ?>;
	}
	.woocommerce-page.archive .woocommerce > .ts-product.ts-slider .products .owl-stage-outer, 
	.woocommerce .ts-product-deals-wrapper:not(.ts-slider) .products, 
	.woocommerce .ts-product-deals-wrapper.ts-slider .products .owl-stage-outer, 
	.woocommerce.columns-1 .ts-product-deals-wrapper.ts-slider .products, 
	.entry-content .woocommerce .ts-product:not(.ts-slider) .products, 
	.entry-content .woocommerce .ts-product.ts-slider .products .owl-stage-outer,
	.product-style-3 #main-content > .site-content > .woocommerce > .ts-shortcode.ts-product .owl-stage-outer:before,
	.product-style-3 #main-content > .site-content > .woocommerce > .ts-shortcode.ts-product .owl-stage-outer:after,
	.product-style-3 .woocommerce .ts-product-deals-wrapper .products .owl-stage-outer:after,
	.product-style-3 .woocommerce .ts-product-deals-wrapper .products .owl-stage-outer:before{
		border-color: <?php echo esc_html($ts_secondary_color) . ' !important'; ?>;
	}
	.product-style-3 #main-content > .site-content > .woocommerce > .ts-shortcode.ts-product .product:not(.product-category),
	.product-style-3 .ts-product-deals-wrapper.ts-slider .products .product:not(.product-category){
		border-left-color: <?php echo esc_html($ts_secondary_color) . ' !important'; ?>;
	}
	.rtl.product-style-3 #main-content > .site-content > .woocommerce > .ts-shortcode.ts-product .product:not(.product-category){
		border-left-color: <?php echo esc_html($ts_border_color) . ' !important'; ?>;
		border-right-color: <?php echo esc_html($ts_secondary_color) . ' !important'; ?>;
	}
	nav > ul.menu li > a .menu-label:before,
	nav > ul.menu ul.sub-menu li a:hover,
	.ts-menu ul li.current-menu-item > a, 
	.ts-menu ul li.current_page_parent > a, 
	.ts-menu ul li.current-menu-parent > a, 
	.ts-menu ul li.current_page_item > a, 
	.ts-menu ul li.current-menu-ancestor > a, 
	.ts-menu ul li.current-page-ancestor > a, 
	.ts-menu ul li.current-product_cat-ancestor > a,
	.ts-menu ul li.current-menu-item .ts-menu-drop-icon, 
	.ts-menu ul li.current_page_parent .ts-menu-drop-icon, 
	.ts-menu ul li.current-menu-parent .ts-menu-drop-icon, 
	.ts-menu ul li.current_page_item .ts-menu-drop-icon, 
	.ts-menu ul li.current-menu-ancestor .ts-menu-drop-icon, 
	.ts-menu ul li.current-page-ancestor .ts-menu-drop-icon, 
	.ts-menu ul li.current-product_cat-ancestor .ts-menu-drop-icon,
	.ts-menu ul .sub-menu li.current-menu-item > a, 
	.ts-menu ul .sub-menu li.current_page_parent > a, 
	.ts-menu ul .sub-menu li.current-menu-parent > a, 
	.ts-menu ul .sub-menu li.current_page_item > a, 
	.ts-menu ul .sub-menu li.current-menu-ancestor > a, 
	.ts-menu ul .sub-menu li.current-page-ancestor > a, 
	.ts-menu ul .sub-menu li.current-product_cat-ancestor > a,
	.ts-menu ul .sub-menu li.current-menu-item .ts-menu-drop-icon, 
	.ts-menu ul .sub-menu li.current_page_parent .ts-menu-drop-icon, 
	.ts-menu ul .sub-menu li.current-menu-parent .ts-menu-drop-icon, 
	.ts-menu ul .sub-menu li.current_page_item .ts-menu-drop-icon, 
	.ts-menu ul .sub-menu li.current-menu-ancestor .ts-menu-drop-icon, 
	.ts-menu ul .sub-menu li.current-page-ancestor .ts-menu-drop-icon, 
	.ts-menu ul .sub-menu li.current-product_cat-ancestor .ts-menu-drop-icon,
	.ts-floating-sidebar a:hover{
		color: <?php echo esc_html($ts_secondary_color); ?>;
	}
	.menu-sub-label,
	.product-style-3.woocommerce-page.archive .woocommerce > .ts-product.ts-slider .products .owl-stage-outer .product .product-wrapper:before,
	.product-style-3 .woocommerce .ts-product-deals-wrapper:not(.ts-slider) .products .product .product-wrapper:before,
	.product-style-3 .woocommerce .ts-product-deals-wrapper.ts-slider .products .owl-stage-outer .product .product-wrapper:before,
	.product-style-3 .woocommerce.columns-1 .ts-product-deals-wrapper.ts-slider .products .product .product-wrapper:before,
	.product-style-3 .entry-content .woocommerce .ts-product:not(.ts-slider) .products .product .product-wrapper:before,
	.product-style-3 .entry-content .woocommerce .ts-product.ts-slider .products .owl-stage-outer .product .product-wrapper:before{
		background-color: <?php echo esc_html($ts_secondary_color); ?>;
	}
	.menu-sub-label:before {
		border-left-color: <?php echo esc_html($ts_secondary_color); ?>;
		border-right-color: <?php echo esc_html($ts_secondary_color); ?>;
	}
	
	/*** Primary Color ***/
	.primary-color,
	.primary-color h1, .primary-color h2, .primary-color h3, .primary-color h4, .primary-color h5, .primary-color h6,
	.primary-color .h1, .primary-color .h2, .primary-color .h3, .primary-color .h4, .primary-color .h5, .primary-color .h6,
	.ul-style-none.primary-color li,
	.ul-style.icon-primary li:before,
	.ol-style.icon-primary li:before,
	header .logo-wrapper .logo a,
	.breadcrumbs-container > span.current,
	.ts-floating-sidebar .close:after,
	#ts-product-360-modal .close:after,
	#ts-quickshop-modal span.close, 
	#ts-add-to-cart-popup-modal span.close,
	html body > h1 a.close,
	body table.compare-list tr.remove td > a,
	.woocommerce table.shop_table .product-remove a:before,
	.cart_list li .cart-item-wrapper a.remove:before,
	.woocommerce .widget_shopping_cart .cart_list li a.remove:before,
	.woocommerce.widget_shopping_cart .cart_list li a.remove:before,
	body table.compare-list tr.remove td > a .remove:before,
	body .wishlist_table.mobile li .additional-info-wrapper .product-remove:before,
	body .pp_pic_holder a.pp_close,
	.ts-group-meta-icon-toggle .icon,
	.meta-wrapper .stock-quantity > span,
	.widget_product_search > form:before,
	.counter-wrapper > div,
	.ul-style li:before,
	.ol-style li:before,
	.woocommerce-product-details__short-description,
	.ts-product-feature,
	.ul-style-none li,
	.widget_categories ul ul li.current-cat a,
	.ts-product-categories-widget ul li.current a,
	.meta-content .sku-wrapper > span:first-child, 
	.meta-content .brands-link > span:first-child, 
	.meta-content .tags-link > span:first-child, 
	.meta-content .cats-link > span:first-child,
	.infinity-scroll .ts-shop-load-more.loading .load-more:before,
	.woocommerce table.shop_table.cart th,
	.woocommerce table.shop_table th,
	.woocommerce-Price-amount,
	.woocommerce ul#shipping_method .amount,
	.woocommerce form .form-row label, 
	.woocommerce-page form .form-row label,
	.woocommerce-cart .cart-collaterals .cart_totals > h2,
	.cart-collaterals .cart_totals table.shop_table tbody tr.shipping td:before,
	.cart-collaterals .cart_totals table.shop_table tbody tr.cart-subtotal td:before, 
	.cart-collaterals .cart_totals table.shop_table tbody tr.order-total td:before,
	body .select2-container--default .select2-selection--single .select2-selection__arrow,
	.woocommerce div.product div.summary form.cart .variations select,
	.woocommerce form .show-password-input, 
	.woocommerce-page form .show-password-input,
	.cart-collaterals .amount,
	.shipping-calculator-form,
	.shipping-calculator-form input,
	.shipping-calculator-form input[type="text"],
	body .select2-search--dropdown:before,
	body .shipping-calculator-form .select2-container--default .select2-selection--single .select2-selection__rendered,
	.price,
	.product-on-sale-form label,
	.woocommerce .before-loop-wrapper strong,
	.ts-tiny-cart-wrapper .total, 
	.widget_shopping_cart .total,
	.search-button:before,
	.ts-portfolio-wrapper .filter-bar li,
	.meta-content .portfolio-info > span:first-child,
	.widget_recent_comments ul li .comment-author-link:before,
	article a.thumbnail:hover,
	fieldset legend,
	.cats-portfolio a,
	.woocommerce-tabs table,
	.cart_list li .cart-item-wrapper a.remove:before,
	.woocommerce .widget_shopping_cart .cart_list li a.remove:before,
	.woocommerce.widget_shopping_cart .cart_list li a.remove:before,
	body .wishlist_table.mobile li .additional-info-wrapper .product-remove:before,
	.woocommerce div.product div.summary .yith-wcwl-add-to-wishlist a,
	.woocommerce div.product div.summary .yith-wcwl-add-to-wishlist a .ts-tooltip,
	.woocommerce div.product div.summary a.compare,
	.woocommerce div.product div.summary a.compare .ts-tooltip,
	.woocommerce.main-products.columns-1 > .products .product-group-button-meta > .wishlist a,
	.woocommerce.main-products.columns-1 > .products .product-group-button-meta > .wishlist a .ts-tooltip,
	.woocommerce.main-products.columns-1 > .products .product-group-button-meta > .compare a.compare,
	.woocommerce.main-products.columns-1 > .products .product-group-button-meta > .compare a.compare .ts-tooltip,
	.woocommerce table.shop_table_responsive tr td::before, 
	.woocommerce-page table.shop_table_responsive tr td::before,
	.list-categories ul.tabs li,
	.column-tabs ul.tabs li,
	body.wpb-js-composer .vc_general.vc_tta-tabs .vc_tta-tab,
	.commentlist li.comment .author,
	.author-info .author-role .author,
	.commentlist li.comment .comment-text,
	.wc-proceed-to-checkout .button.continue-shopping,
	.meta-wrapper-2 .quantity .screen-reader-text,
	.widget_price_filter .price_slider_amount .price_label > span:first-child:after,
	.filter-widget-area-button a,
	.wishlist_table.images_grid li .item-details table.item-details-table td.label, 
	.wishlist_table.mobile li .item-details table.item-details-table td.label, 
	.wishlist_table.mobile li table.additional-info td.label, 
	.wishlist_table.modern_grid li .item-details table.item-details-table td.label,
	.woocommerce div.product div.summary .variations_form .variations .attribute > .label,
	.ts-product-attribute div.option:not(.color) a:hover,
	.ts-product-attribute div.option:not(.color).selected a,
	.woocommerce .woocommerce-ordering .orderby-current,
	.product-per-page-form ul.perpage .perpage-current:after,
	.woocommerce .woocommerce-ordering .orderby-current:after,
	.yith-wfbt-section .total_price_label,
	.woocommerce div.product p.price, 
	.woocommerce div.product span.price,
	.woocommerce div.product .quantity label.ts-screen-reader-text,
	.products .product .short-description,
	.product-filter-by-brand ul li label,
	.product-filter-by-availability ul > li label,
	.product-filter-by-price ul li label,
	.woocommerce .woocommerce-widget-layered-nav-list .woocommerce-widget-layered-nav-list__item,
	.mobile-menu-wrapper .ts-menu ul li:not(.font-body),
	.header-v2 .header-middle .header-right > .header-contact,
	.woocommerce ul.order_details li strong,
	.woocommerce #reviews #comments ol.commentlist li,
	.woocommerce #reviews #comments ol.commentlist li .woocommerce-review__author,
	.woocommerce #review_form #respond #commentform label,
	.woocommerce #review_form #respond p.comment-notes,
	.woocommerce #review_form #respond .comment-reply-title{
		color: <?php echo esc_html($ts_primary_color); ?>;
	}
	.shipping-calculator-form ::-webkit-input-placeholder{
		color: <?php echo esc_html($ts_primary_color); ?>;
	}
	.shipping-calculator-form :-moz-placeholder{
		color: <?php echo esc_html($ts_primary_color); ?>;
	}
	.shipping-calculator-form ::-moz-placeholder{
		color: <?php echo esc_html($ts_primary_color); ?>;
	}
	.shipping-calculator-form :-ms-input-placeholder{
		color: <?php echo esc_html($ts_primary_color); ?>;
	}
	.images-thumbnails > .thumbnails .thumbnails-container ul li:hover,
	.style-icon-background .products .product-category .product-wrapper > a:hover{
		border-color: <?php echo esc_html($ts_primary_color); ?>;
	}
	.tagcloud a,
	.tags-link a,
	#to-top a:hover,
	.ts-portfolio-wrapper .cats-portfolio > a,
	.owl-nav > .owl-prev, 
	.owl-nav > .owl-next,
	.ts-pagination ul li a:focus,
	.ts-pagination ul li a:hover,
	.ts-pagination ul li span.current,
	.post-nav-links > .post-page-numbers:focus,
	.post-nav-links > .post-page-numbers:hover,
	.post-nav-links > .post-page-numbers.current,
	.woocommerce nav.woocommerce-pagination ul li a:focus, 
	.woocommerce nav.woocommerce-pagination ul li a:hover, 
	.woocommerce nav.woocommerce-pagination ul li span.current,
	body .select2-container--default .select2-results__option--highlighted[aria-selected], 
	body .select2-container--default .select2-results__option[aria-selected=true], 
	body .select2-container--default .select2-results__option[data-selected=true],
	div.product .yith-wfbt-section .yith-wfbt-images td:not(:last-child):not(.image_plus) > a:after,
	html body > h1{
		background: <?php echo esc_html($ts_primary_color); ?>;
		color: <?php echo esc_html($ts_text_color_in_bg_secondary); ?>;
	}
	.owl-dots > div > span,
	.ts-instagram-wrapper .item a:hover:before,
	.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
	.ts-megamenu-widgets-container .widget_media_image > a,
	.widget-container.product-filter-by-brand ul > li.selected label:before,
	.product-filter-by-availability ul li input[checked="checked"] + label:before,
	.product-filter-by-price ul li.chosen label:before,
	.woocommerce .woocommerce-widget-layered-nav-list .woocommerce-widget-layered-nav-list__item--chosen a:before,
	.woocommerce .widget_rating_filter ul li.chosen a::before,
	.woocommerce .widget_price_filter .ui-slider-horizontal .ui-slider-range:before{
		background: <?php echo esc_html($ts_primary_color); ?>;	
	}
	div.product .yith-wfbt-section .yith-wfbt-form .yith-wfbt-items li span.checkboxbutton.checked:before,
	header .dropdown-container ul.cart_list::-webkit-scrollbar-thumb,
	.select2-container--default .select2-results>.select2-results__options::-webkit-scrollbar-thumb,
	.woocommerce-terms-and-conditions::-webkit-scrollbar-thumb,
	.product-filter-by-brand .product-filter-by-brand-wrapper > ul::-webkit-scrollbar-thumb,
	#ts-quickshop-modal div.product > .summary::-webkit-scrollbar-thumb,
	header .dropdown-container ul.cart_list::-webkit-scrollbar-thumb:hover,
	.select2-container--default .select2-results>.select2-results__options::-webkit-scrollbar-thumb:hover,
	.woocommerce-terms-and-conditions::-webkit-scrollbar-thumb:hover,
	.product-filter-by-brand .product-filter-by-brand-wrapper > ul::-webkit-scrollbar-thumb:hover,
	#ts-quickshop-modal div.product > .summary::-webkit-scrollbar-thumb:hover{
		background-color: <?php echo esc_html($ts_primary_color); ?>;
	}
	.ts-product-attribute div.option:not(.color) a:hover,
	.ts-product-attribute div.option:not(.color).selected a,
	.woocommerce div.product div.images .flex-control-thumbs li img.flex-active,
	.woocommerce div.product div.images .flex-control-thumbs li img:hover{
		border-color: <?php echo esc_html($ts_primary_color); ?>;
	}
	.header-transparent.header-text-light .header-template > div.is-sticky .header-middle .ts-menu > nav.main-menu > ul.menu > li.bg-transparent,
	.header-transparent.header-text-light .header-template > div.is-sticky .header-middle .menu-wrapper nav > ul.menu > li.bg-transparent,	
	.header-transparent.header-text-light .header-template > div.is-sticky .header-middle .ts-menu > nav.main-menu > ul.menu > li.bg-transparent > .ts-menu-drop-icon,
	.header-transparent.header-text-light .header-template > div.is-sticky .header-middle .menu-wrapper nav > ul.menu > li.bg-transparent > a,
	.header-transparent.header-text-light .header-template > div.is-sticky .header-middle .header-language .wpml-ls > ul > li.bg-transparent > a,
	.header-transparent.header-text-light .header-template > div.is-sticky .header-middle .header-currency .wcml_currency_switcher > a,
	.header-transparent.header-text-light .header-template > div:not(.is-sticky) .my-wishlist-wrapper > a .wishlist-number,
	.header-transparent.header-text-light .header-template > div:not(.is-sticky) .shopping-cart-wrapper .cart-control .cart-number{
		color: <?php echo esc_html($ts_primary_color); ?>;
	}
	
	/*** Border color ***/
	*,
	table,
	table td,
	table th,
	.woocommerce > .products,
	#tab-more_seller_product > .products,
	.woocommerce .ts-product .products,
	.woocommerce .products .product,
	.meta-wrapper .stock-quantity:before,
	.group-features .ts-feature-wrapper,
	.ts-products-widget ul.product_list_widget,
	.widget_products ul.product_list_widget,
	.ts-products-widget ul.product_list_widget li,
	.widget_products ul.product_list_widget li,
	.single .entry-content:after,
	.commentlist li.comment,
	.commentlist ol.children,
	#commentform textarea,
	.ts-product-brand-wrapper .items,
	.ts-product-brand-wrapper .items .item,
	.entry-author,
	.navigation-bottom,
	.woocommerce table.shop_table td,
	.woocommerce table.shop_table tbody th, 
	.woocommerce table.shop_table tfoot td, 
	.woocommerce table.shop_table tfoot th,
	div.product .yith-wfbt-section .yith-wfbt-images td,
	.ts-megamenu-widgets-container .widget_media_image a,
	.product-wrapper .thumbnail-wrapper img,
	.woocommerce-cart .cart-collaterals .cart_totals:before,
	.product-style-3 .ts-shortcode.ts-slider .products .owl-stage-outer:before,
	.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content:after,
	.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content:before,
	body .wishlist_table.images_grid li .item-details table.item-details-table td, 
	body .wishlist_table.mobile li .item-details table.item-details-table td,
	body .wishlist_table.mobile li table.additional-info td, 
	body .wishlist_table.modern_grid li .item-details table.item-details-table td,
	body #yith-woocompare table.compare-list tbody th, 
	body #yith-woocompare table.compare-list tbody td,
	.woocommerce div.product div.images .flex-control-thumbs li img,
	.woocommerce div.product.thumbnail-border div.images .flex-viewport,
	.woocommerce div.product .woocommerce-tabs .panel,
	div.product .yith-wfbt-section .yith-wfbt-form:before,
	.woocommerce .woocommerce-tabs table.shop_attributes,
	.woocommerce .woocommerce-tabs table.shop_attributes td,
	.woocommerce .woocommerce-tabs table.shop_attributes th,
	.woocommerce div.product form.cart .group_table,
	.woocommerce div.product form.cart .group_table tr,
	.woocommerce div.product form.cart .group_table td,
	div.product.tabs-in-summary .woocommerce-tabs,
	.woocommerce div.product.tabs-in-summary .woocommerce-tabs,
	.woocommerce #reviews #comments ol.commentlist li,
	.ts-products-widget-wrapper.image-border ul.product_list_widget li > a.ts-wg-thumbnail img,
	.list-posts > article:after,
	.list-posts > .ts-blog-banner:after{
		border-color: <?php echo esc_html($ts_border_color); ?>;
	}	
	.product-style-3 .ts-shortcode .products .product:not(.product-category):hover .product-wrapper,
	.product-style-3 .woocommerce.main-products:not(.columns-1) > .products .product:not(.product-category):hover .product-wrapper{
		box-shadow: 0 0 0 1px <?php echo esc_html($ts_border_color); ?>;
	}
	.is-style-stripes table tbody tr:nth-child(odd),
	.wp-block-table.is-style-stripes tbody tr:nth-child(odd),
	.woocommerce-tabs table tbody > tr > th,
	.woocommerce .woocommerce-tabs table.shop_attributes tr > th,
	.style-icon-background .product-category .product-wrapper > a,
	.quantity .number-button,
	.woocommerce-terms-and-conditions,
	.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content,
	#add_payment_method #payment div.payment_box, 
	.woocommerce-cart #payment div.payment_box, 
	.woocommerce-checkout #payment div.payment_box,
	.woocommerce.archive #main-content:not(.ts-col-24) .before-loop-wrapper,
	#main-content.ts-col-18 .woocommerce.main-products .products .list-categories,
	#main-content.ts-col-12 .woocommerce.main-products .products .list-categories{
		background: <?php echo esc_html($ts_border_color); ?>;
	}
	#add_payment_method #payment div.payment_box::before,
	.woocommerce-cart #payment div.payment_box::before, 
	.woocommerce-checkout #payment div.payment_box::before{
		border-bottom-color: <?php echo esc_html($ts_border_color); ?>;
	}
	.ts-dropcap,
	.has-drop-cap:first-letter{
		color: <?php echo esc_html($ts_primary_color); ?>;
	}
	blockquote,
	html pre,
	.ts-dropcap.style-2,
	body.wpb-js-composer .vc_toggle .vc_toggle_title,
	.widget-container li.cat-parent > span.icon-toggle{
		background: <?php echo esc_html($ts_border_color); ?>;
		color: <?php echo esc_html($ts_primary_color); ?>;
	}
	.list-posts article.sticky{
		background: <?php echo esc_html($ts_border_color); ?>;
	}
	.add-to-cart-popup-content .action .button.view-cart{
		background: <?php echo esc_html($ts_border_color); ?>;
		color: <?php echo esc_html($ts_primary_color); ?>;
		border-color: <?php echo esc_html($ts_border_color); ?>;
	}
	.add-to-cart-popup-content .action .button.view-cart:hover{
		background: transparent;
		border-color: <?php echo esc_html($ts_primary_color); ?>;
	}
	<?php if( strpos($ts_primary_color, 'rgba') !== false ): ?>
	.woocommerce-tabs table,
	.woocommerce-tabs table td, 
	.woocommerce-tabs table th,
	.woocommerce .woocommerce-tabs table.shop_attributes tr th,
	.woocommerce .woocommerce-tabs table.shop_attributes tr td,
	.woocommerce div.product.summary-2-columns:not(.images-summary-background) .summary-column-2 .group_table,
	.woocommerce div.product.summary-2-columns:not(.images-summary-background) .summary-column-2 .group_table tr,
	.woocommerce div.product.summary-2-columns:not(.images-summary-background) .summary-column-2 .group_table td,
	.woocommerce .before-loop-wrapper *{
		border-color: <?php echo esc_html(str_replace('1)', '0.1)', esc_html($ts_primary_color))); ?>;
	}
	.woocommerce-page div.product .woocommerce > .ts-product.ts-slider .products .owl-stage-outer{
		border-color: <?php echo esc_html(str_replace('1)', '0.1)', esc_html($ts_primary_color))) . ' !important'; ?>;
	}
	<?php endif; ?>
	
	/*** Maincontent background ***/
	#main,
	blockquote.quote-light,
	.quote-light blockquote,
	.shopping-cart-wrapper .dropdown-container:before,
	.my-account-wrapper .dropdown-container:before,
	header .wcml_currency_switcher > ul:before, 
	header .wpml-ls-legacy-dropdown ul.wpml-ls-sub-menu:before,
	header .wpml-ls-legacy-dropdown-click ul.wpml-ls-sub-menu:before,
	body > .ts-search-result-container,
	.add-to-cart-popup-container,
	.ts-floating-sidebar .ts-sidebar-content,
	.related-upsells-products-wrapper .owl-stage-outer,
	.products .owl-stage-outer:before, 
	.google-map-container .information,
	.ts-popup-modal .quickshop-content,
	.has-margin .products .product .product-wrapper,
	#main-content.ts-col-24 .woocommerce.main-products > .products .product .product-wrapper,
	.woocommerce .woocommerce-ordering .orderby ul:before, 
	.product-per-page-form ul.perpage ul:before,
	body table.compare-list,
	.woocommerce > .products .product-group-button-meta > div .button.loading:before,
	.woocommerce div.product .summary > form.cart .button.single_add_to_cart_button.loading:before,
	.dropdown-container ul.cart_list li.loading:before, 
	div.blockUI.blockOverlay:before, 
	.woocommerce div.blockUI.blockOverlay:before,
	.ts-product-attribute .button-tooltip:before,
	div.product .single-navigation > a .product-info,
	.product-style-2 .product-group-button > div.loop-add-to-cart .button.loading:before,
	.archive.ajax-pagination .woocommerce > .products.loading:after,
	.product-group-button-meta > div.loop-add-to-cart .button.loading:before,
	.wishlist_table .product-add-to-cart a.loading:before,
	#main-content.ts-col-24 div.product.images-summary-background .yith-wfbt-section.woocommerce:before,
	.woocommerce table.compare-list a.button.loading:before,
	.image-banner-footer ~ footer > .footer-container,
	.woocommerce.archive #main-content.ts-col-24:before, 
	.woocommerce.archive #main-content.ts-col-24 .ts-product.best_selling:before, 
	.woocommerce.archive #main-content.ts-col-24 .ts-active-filters:before, 
	.woocommerce.archive #main-content.ts-col-24 .before-loop-wrapper:before,
	.woocommerce div.product:not(.images-summary-background) .woocommerce-product-gallery__image.flex-active-slide,
	.woocommerce #main-content.ts-col-24 #content div.product.images-summary-background div.summary, 
	.woocommerce #main-content.ts-col-24 div.product.images-summary-background div.summary, 
	.woocommerce-page #main-content.ts-col-24 #content div.product.images-summary-background div.summary, 
	.woocommerce-page #main-content.ts-col-24 div.product.images-summary-background div.summary,
	.woocommerce div.product div.summary .yith-wcwl-add-to-wishlist a.loading:before,
	.woocommerce div.product div.summary a.compare.loading:before,
	.woocommerce.main-products.columns-1 > .products .product-group-button-meta > div:not(.loop-add-to-cart) a.loading:before{
		background: <?php echo esc_html($ts_main_content_bg_color); ?>;
	}
	.ts-header .menu-wrapper nav > ul.menu li ul.sub-menu:before,
	.top-header-menu > ul li ul.sub-menu:before{
		background-color: <?php echo esc_html($ts_main_content_bg_color); ?>;
	}
	<?php if( strpos($ts_main_content_bg_color, 'rgba') !== false ): ?>
	.product-content.show-more-less:before{
		background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0,<?php echo esc_html(str_replace('1)', '0)', esc_html($ts_main_content_bg_color))); ?>),to(<?php echo esc_html($ts_main_content_bg_color); ?>));
		background-image: linear-gradient(to bottom,<?php echo esc_html(str_replace('1)', '0)', esc_html($ts_main_content_bg_color))); ?> 0,<?php echo esc_html($ts_main_content_bg_color); ?> 100%);
	}
	<?php endif; ?>
	
	/*** Input ***/
	textarea,
	select,
	html input[type^="search"],
	html input[type^="text"], 
	html input[type^="email"],
	html input[type^="password"],
	html input[type^="number"],
	html input[type^="tel"],
	.ts-floating-sidebar .ts-search-by-category input[type^="text"],
	.header-v5 .ts-floating-sidebar .ts-search-by-category input[type^="text"],
	.chosen-container a.chosen-single,
	.woocommerce-checkout .form-row .chosen-container-single .chosen-single,
	#add_payment_method table.cart td.actions .coupon .input-text, 
	.woocommerce-cart table.cart td.actions .coupon .input-text, 
	.woocommerce-checkout table.cart td.actions .coupon .input-text, 
	.woocommerce-page table.cart td.actions .coupon .input-text,
	.woocommerce .widget_price_filter .price_slider_amount .price_label > span:first-child:before,
	.woocommerce .widget_price_filter .price_slider_amount .price_label > span:last-child,
	body .select2-container--default .select2-selection--single .select2-selection__rendered{
		background: <?php echo esc_html($ts_input_bg_color); ?>;
		color: <?php echo esc_html($ts_text_color); ?>;
	}
	::-webkit-input-placeholder{
		color: <?php echo esc_html($ts_text_color); ?>;
	}
	:-moz-placeholder{
		color: <?php echo esc_html($ts_text_color); ?>;
	}
	::-moz-placeholder{
		color: <?php echo esc_html($ts_text_color); ?>;
	}
	:-ms-input-placeholder{
		color: <?php echo esc_html($ts_text_color); ?>;
	}
	.select2-container--default .select2-selection--multiple,
	.select2-container--default.select2-container--focus .select2-selection--multiple{
		background-color: <?php echo esc_html($ts_input_bg_color); ?> !important;
		border-color: <?php echo esc_html($ts_input_bg_color); ?> !important;
	}
	/*** Button ***/
	a.button,
	button, 
	input[type^="submit"], 
	.ts-button,
	a.button-readmore,
	.ts-banner-button a,
	.woocommerce a.button, 
	.woocommerce button.button, 
	.woocommerce input.button,  
	.woocommerce a.button.alt:hover, 
	.woocommerce button.button.alt:hover, 
	.woocommerce input.button.alt:hover,  
	.woocommerce #respond input#submit, 
	.woocommerce #payment #place_order, 
	.woocommerce-page #payment #place_order,
	.dropdown-footer > a.button.view-cart:hover,
	.woocommerce .dropdown-footer > a.button.view-cart:hover,
	.shopping-cart p.buttons a, 
	.woocommerce div.product .summary a.compare,
	.woocommerce div.product .summary .yith-wcwl-add-to-wishlist a,
	.more-less-buttons a,
	body table.compare-list .add-to-cart td a,
	body table.compare-list .add-to-cart td a:not(.unstyled_button),
	input[type="submit"].dokan-btn, 
	a.dokan-btn, 
	.dokan-btn,
	.button.button-light:hover,
	a.button.button-light:hover,
	.product-category .meta-wrapper a.button:hover,
	.ts-shortcode .shop-more a.button:hover,
	.ts-shortcode .show-all-button a.button:hover,
	.woocommerce div.product div.summary form.cart .button,
	.woocommerce .wishlist_table .product-add-to-cart a:hover,
	.woocommerce .wishlist_table .product-add-to-cart a.alt:hover,
	.product-style-3 .ts-megamenu-container .ts-shortcode .products .product .meta-wrapper-2 .loop-add-to-cart .button,
	.product-style-4 .ts-megamenu-container .ts-shortcode .products .product .meta-wrapper-2 .loop-add-to-cart .button,
	.woocommerce .widget_shopping_cart .buttons a:first-child:hover, 
	.woocommerce.widget_shopping_cart .buttons a:first-child:hover,
	.woocommerce .wc-proceed-to-checkout .button.checkout-button{
		border-color: <?php echo esc_html($ts_secondary_color); ?>;
		background: <?php echo esc_html($ts_secondary_color); ?>;
		color: <?php echo esc_html($ts_text_color_in_bg_primary); ?>;
	}
	.button.button-light,
	a.button.button-light,
	.button.button-light.button-alt:hover,
	a.button.button-light.button-alt:hover,
	.product-category .meta-wrapper a.button,
	.ts-shortcode .shop-more a.button,
	.ts-shortcode .show-all-button a.button,
	.woocommerce .wishlist_table .product-add-to-cart a,
	.woocommerce .wishlist_table .product-add-to-cart a.alt{
		border-color: <?php echo esc_html($ts_border_color); ?>;
		background: <?php echo esc_html($ts_main_content_bg_color); ?>;
		color: <?php echo esc_html($ts_primary_color); ?>;
	}
	.button.button-light.button-alt,
	a.button.button-light.button-alt{
		background: transparent;
		border-color: <?php echo esc_html($ts_text_color); ?>;
		color: <?php echo esc_html($ts_main_content_bg_color); ?>
	}
	a.button:hover,
	button:hover, 
	input[type^="submit"]:hover, 
	.ts-button:hover,
	a.button-readmore:hover,
	.ts-banner-button a:hover,
	.woocommerce a.button:hover, 
	.woocommerce button.button:hover, 
	.woocommerce input.button:hover,  
	.woocommerce a.button.alt, 
	.woocommerce button.button.alt, 
	.woocommerce input.button.alt,  
	.woocommerce #respond input#submit:hover, 
	.woocommerce #payment #place_order:hover, 
	.woocommerce-page #payment #place_order:hover,
	.dropdown-footer > a.button.view-cart,
	.woocommerce .dropdown-footer > a.button.view-cart,
	.shopping-cart p.buttons a:hover, 
	.woocommerce div.product .summary a.compare:hover,
	.woocommerce div.product .summary .yith-wcwl-add-to-wishlist a:hover,
	.more-less-buttons a:hover,
	body table.compare-list .add-to-cart td a:hover,
	body table.compare-list .add-to-cart td a:not(.unstyled_button):hover,
	.woocommerce div.product div.summary form.cart .button:hover,
	.product-style-3 .ts-megamenu-container .ts-shortcode .products .product .meta-wrapper-2 .loop-add-to-cart .button:hover,
	.product-style-4 .ts-megamenu-container .ts-shortcode .products .product .meta-wrapper-2 .loop-add-to-cart .button:hover,
	.woocommerce .widget_shopping_cart .buttons a:first-child, 
	.woocommerce.widget_shopping_cart .buttons a:first-child,
	input[type="submit"].dokan-btn:hover,
	a.dokan-btn:hover, 
	.dokan-btn:hover,
	.woocommerce .wc-proceed-to-checkout .button.checkout-button:hover{
		border-color: <?php echo esc_html($ts_secondary_color); ?>;
		background: transparent;
		color: <?php echo esc_html($ts_secondary_color); ?>;
	}
	.ts-button-wrapper.button-text a.ts-button:hover,
	.ts-header .menu-wrapper ul li:hover .ts-button-wrapper.button-text a.ts-button:hover{
		color: <?php echo esc_html($ts_secondary_color); ?>;
	}
	.product-style-2 .product-group-button > div.loop-add-to-cart a, 
	.woocommerce.main-products:not(.columns-1) > .products .product-group-button-meta > div.loop-add-to-cart a{
		border-color: <?php echo esc_html($ts_secondary_color) . ' !important'; ?>;
		background: <?php echo esc_html($ts_secondary_color) . ' !important'; ?>;
		color: <?php echo esc_html($ts_text_color_in_bg_primary) . ' !important'; ?>;
	}
	.product-style-2 .product-group-button > div.loop-add-to-cart a:hover, 
	.woocommerce.main-products:not(.columns-1) > .products .product-group-button-meta > div.loop-add-to-cart a:hover{
		background: <?php echo esc_html($ts_text_color_in_bg_primary) . ' !important'; ?>;
		color: <?php echo esc_html($ts_secondary_color) . ' !important'; ?>;
		border-color: <?php echo esc_html($ts_secondary_color) . ' !important'; ?>;
	}
	.product-style-2 .product-group-button > div.loop-add-to-cart .button.loading:after,
	.product-group-button-meta > div.loop-add-to-cart .button.loading:after{
		color: <?php echo esc_html($ts_secondary_color); ?>;
	}
	body.wpb-js-composer .vc_tta.vc_general .vc_tta-panel-title>a,
	div.product .yith-wfbt-section .yith-wfbt-form .yith-wfbt-items li span.checkboxbutton:before{
		background-color: <?php echo esc_html($ts_secondary_color); ?>;
	}
	.error404 a.button,
	.ts-shortcode .load-more-wrapper .load-more,
	.ts-shop-load-more .load-more,
	.woocommerce-cart table.cart td.actions .button:not([disabled]){
		background: <?php echo esc_html($ts_primary_color) . ' !important'; ?>;
		color: <?php echo esc_html($ts_text_color_in_bg_primary) . ' !important'; ?>;
		border-color: <?php echo esc_html($ts_primary_color) . ' !important'; ?>;
	}
	.error404 a.button:hover,
	.ts-shortcode .load-more-wrapper .load-more:hover,
	.ts-shop-load-more .load-more:hover,
	.woocommerce-cart table.cart td.actions .button:not([disabled]):hover{
		background: transparent !important;
		border-color: <?php echo esc_html($ts_primary_color) . ' !important'; ?>;
		color: <?php echo esc_html($ts_primary_color) . ' !important'; ?>;
	}
	.ts-button-wrapper.button-text a.ts-button,
	.woocommerce table.my_account_orders .button,
	.woocommerce-MyAccount-content .woocommerce-pagination--without-numbers > a,
	.woocommerce .widget_price_filter .price_slider_amount .button,
	.woocommerce .woocommerce-widget-layered-nav-dropdown .woocommerce-widget-layered-nav-dropdown__submit,
	.ts-header .menu-wrapper ul li:hover .ts-button-wrapper.button-text a.ts-button{
		color: <?php echo esc_html($ts_primary_color); ?>;
	}
	<?php if( isset($ts_custom_button_style) && $ts_custom_button_style ): ?>
	a.button,
	button, 
	input[type^="submit"], 
	.ts-button,
	a.button-readmore,
	.ts-banner-button a,
	.woocommerce a.button, 
	.woocommerce button.button, 
	.woocommerce input.button,  
	.woocommerce a.button.alt:hover, 
	.woocommerce button.button.alt:hover, 
	.woocommerce input.button.alt:hover,  
	.woocommerce #respond input#submit, 
	.woocommerce #payment #place_order, 
	.woocommerce-page #payment #place_order,
	.dropdown-footer > a.button.view-cart:hover,
	.woocommerce .dropdown-footer > a.button.view-cart:hover,
	.shopping-cart p.buttons a, 
	.woocommerce div.product .summary a.compare,
	.woocommerce div.product .summary .yith-wcwl-add-to-wishlist a,
	.more-less-buttons a,
	body table.compare-list .add-to-cart td a,
	body table.compare-list .add-to-cart td a:not(.unstyled_button),
	input[type="submit"].dokan-btn, 
	a.dokan-btn, 
	.dokan-btn,
	.button.button-light:hover,
	a.button.button-light:hover,
	.product-category .meta-wrapper a.button:hover,
	.ts-shortcode .shop-more a.button:hover,
	.ts-shortcode .show-all-button a.button:hover,
	.woocommerce div.product div.summary form.cart .button,
	.woocommerce .wishlist_table .product-add-to-cart a:hover,
	.woocommerce .wishlist_table .product-add-to-cart a.alt:hover,
	.product-style-3 .ts-megamenu-container .ts-shortcode .products .product .meta-wrapper-2 .loop-add-to-cart .button,
	.product-style-4 .ts-megamenu-container .ts-shortcode .products .product .meta-wrapper-2 .loop-add-to-cart .button,
	.woocommerce .widget_shopping_cart .buttons a:first-child:hover, 
	.woocommerce.widget_shopping_cart .buttons a:first-child:hover,
	.woocommerce .wc-proceed-to-checkout .button.checkout-button{
		border-color: <?php echo esc_html($ts_button_background_color); ?>;
		background: <?php echo esc_html($ts_button_background_color); ?>;
		color: <?php echo esc_html($ts_button_text_color); ?>;
	}
	.product-style-2 .product-group-button > div.loop-add-to-cart a, 
	.woocommerce.main-products:not(.columns-1) > .products .product-group-button-meta > div.loop-add-to-cart a{
		border-color: <?php echo esc_html($ts_button_background_color) . ' !important'; ?>;
		background: <?php echo esc_html($ts_button_background_color) . ' !important'; ?>;
		color: <?php echo esc_html($ts_button_text_color) . ' !important'; ?>;
	}
	.product-style-2 .product-group-button > div.loop-add-to-cart a:hover, 
	.woocommerce.main-products:not(.columns-1) > .products .product-group-button-meta > div.loop-add-to-cart a:hover{
		background: <?php echo esc_html($ts_button_background_hover) . ' !important'; ?>;
		color: <?php echo esc_html($ts_button_text_hover) . ' !important'; ?>;
		border-color: <?php echo esc_html($ts_button_text_hover) . ' !important'; ?>;
	}
	.product-style-2 .product-group-button > div.loop-add-to-cart .button.loading:after,
	.product-group-button-meta > div.loop-add-to-cart .button.loading:after{
		color: <?php echo esc_html($ts_button_background_color); ?>;
	}
	a.button:hover,
	button:hover, 
	input[type^="submit"]:hover, 
	.ts-button:hover,
	a.button-readmore:hover,
	.ts-banner-button a:hover,
	.woocommerce a.button:hover, 
	.woocommerce button.button:hover, 
	.woocommerce input.button:hover,  
	.woocommerce a.button.alt, 
	.woocommerce button.button.alt, 
	.woocommerce input.button.alt,  
	.woocommerce #respond input#submit:hover, 
	.woocommerce #payment #place_order:hover, 
	.woocommerce-page #payment #place_order:hover,
	.dropdown-footer > a.button.view-cart,
	.woocommerce .dropdown-footer > a.button.view-cart,
	.shopping-cart p.buttons a:hover, 
	.woocommerce div.product .summary a.compare:hover,
	.woocommerce div.product .summary .yith-wcwl-add-to-wishlist a:hover,
	.more-less-buttons a:hover,
	body table.compare-list .add-to-cart td a:hover,
	body table.compare-list .add-to-cart td a:not(.unstyled_button):hover,
	.woocommerce div.product div.summary form.cart .button:hover,
	.product-style-3 .ts-megamenu-container .ts-shortcode .products .product .meta-wrapper-2 .loop-add-to-cart .button:hover,
	.product-style-4 .ts-megamenu-container .ts-shortcode .products .product .meta-wrapper-2 .loop-add-to-cart .button:hover,
	.woocommerce .widget_shopping_cart .buttons a:first-child, 
	.woocommerce.widget_shopping_cart .buttons a:first-child,
	input[type="submit"].dokan-btn:hover,
	a.dokan-btn:hover, 
	.dokan-btn:hover,
	.woocommerce .wc-proceed-to-checkout .button.checkout-button:hover{
		border-color: <?php echo esc_html($ts_button_text_hover); ?>;
		background: <?php echo esc_html($ts_button_background_hover); ?>;
		color: <?php echo esc_html($ts_button_text_hover); ?>;
	}
	<?php endif; ?>
	
	/*** Special Button ***/
	.special-button,
	a.button.special-button{
		background: <?php echo esc_html($ts_notice_dark_text_color); ?>;
		border-color: <?php echo esc_html($ts_notice_dark_text_color); ?>;
		color: <?php echo esc_html($ts_main_content_bg_color); ?>;
	}
	.special-button:hover,
	a.button.special-button:hover{
		background: transparent;
		border-color: <?php echo esc_html($ts_notice_dark_text_color); ?>;
		color: <?php echo esc_html($ts_notice_dark_text_color) . ' !important'; ?>;
	}
	.special-button-color{
		color: <?php echo esc_html($ts_notice_dark_text_color); ?>;
	}

	/*** Store Notice ***/
	/* Dark */
	.ts-store-notice{
		background: <?php echo esc_html($ts_notice_dark_bg_color); ?>;
		color: <?php echo esc_html($ts_notice_dark_text_color); ?>;
	}
	/* Light */
	.header-v3 .ts-store-notice,
	.header-v7 .ts-store-notice,
	.header-v4 .ts-store-notice,
	.header-v6 .ts-store-notice{
		background: <?php echo esc_html($ts_notice_bg_color); ?>;
		color: <?php echo esc_html($ts_notice_text_color); ?>;
	}
	
	/*** Header ***/
	/* Light header */
	.header-top{
		background: <?php echo esc_html($ts_top_header_bg_color); ?>;
		color: <?php echo esc_html($ts_top_header_text_color); ?>;
	}
	.header-top,
	.top-header-menu ul li,
	.header-top div.header-right > div,
	.ts-store-notice,
	.language-currency:after{
		border-color: <?php echo esc_html($ts_top_header_border_color); ?>;
	}
	.header-middle{
		background: <?php echo esc_html($ts_middle_header_bg_color); ?>;
		color: <?php echo esc_html($ts_middle_header_text_color); ?>;
		border-color: <?php echo esc_html($ts_middle_header_border_color); ?>;
	}
	.header-bottom{
		background: <?php echo esc_html($ts_bottom_header_bg_color); ?>;
		color: <?php echo esc_html($ts_bottom_header_text_color); ?>;
		border-color: <?php echo esc_html($ts_bottom_header_border_color); ?>;
	}
	.ts-header .menu-wrapper ul li{
		color: <?php echo esc_html($ts_menu_text_color); ?>;
	}
	.header-v9.header-text-default .header-middle .language-currency:after,
	.header-v9 .header-middle .language-currency:after{
		border-color: <?php echo esc_html($ts_middle_header_text_color); ?>;
	}
	
	/* Dark header */
	.header-v3 .header-top,
	.header-v7 .header-top,
	.header-v5 .header-top{
		background: <?php echo esc_html($ts_top_header_dark_bg_color); ?>;
		color: <?php echo esc_html($ts_top_header_dark_text_color); ?>;
		border-color: <?php echo esc_html($ts_top_header_dark_border_color); ?>;
	}
	.header-v5 .header-middle{
		background: <?php echo esc_html($ts_middle_header_dark_bg_color); ?>;
		color: <?php echo esc_html($ts_middle_header_dark_text_color); ?>;
		border-color: <?php echo esc_html($ts_middle_header_dark_border_color); ?>;
	}
	.header-v5 .header-bottom{
		background: <?php echo esc_html($ts_bottom_header_dark_bg_color); ?>;
		color: <?php echo esc_html($ts_bottom_header_dark_text_color); ?>;
		border-color: <?php echo esc_html($ts_bottom_header_dark_border_color); ?>;
	}
	.header-v5 .ts-header .menu-wrapper nav > ul > li{
		color: <?php echo esc_html($ts_dark_menu_text_color); ?>;
	}
	.header-v5 .header-sticky .icon-menu-sticky-header svg path{
		fill: <?php echo esc_html($ts_dark_menu_text_color); ?>;
	}
	.header-v5 .ts-store-notice{
		border-color: <?php echo esc_html($ts_top_header_dark_border_color); ?>;
	}
	.ts-header .header-middle .header-right .menu-wrapper nav > ul.menu > li:first-child, 
	.ts-header .header-middle .header-right .menu-wrapper nav > ul > li:first-child,
	.ts-header .header-bottom.hidden .menu-wrapper nav > ul.menu > li:first-child, 
	.ts-header .header-bottom.hidden .menu-wrapper nav > ul > li:first-child{
		background: <?php echo esc_html($ts_primary_color); ?>;
		color: <?php echo esc_html($ts_text_color_in_bg_secondary); ?>;
	}
	body:not(.header-text-light) .ts-header .header-middle .header-right .menu-wrapper nav > ul.menu > li.bg-transparent:first-child, 
	body:not(.header-text-light) .ts-header .header-middle .header-right .menu-wrapper nav > ul > li.bg-transparent:first-child{
		color: <?php echo esc_html($ts_primary_color); ?>;
	}
	.ts-header .header-middle .header-right .menu-wrapper nav > ul.menu > li:first-child:hover, 
	.ts-header .header-middle .header-right .menu-wrapper nav > ul > li:first-child:hover{
		color: <?php echo esc_html($ts_secondary_color); ?>;
	}
	.header-v5 .header-currency > .wcml_currency_switcher > a,
	body.header-v5 .wpml-ls-legacy-dropdown a.wpml-ls-item-toggle, 
	body.header-v5 .wpml-ls-legacy-dropdown-click a.wpml-ls-item-toggle,
	.header-v5 .header-bottom .header-right,
	.header-v5 .ts-header .menu-wrapper nav > ul.menu > li.font-body, 
	.header-v5 .ts-header .menu-wrapper nav > ul > li.font-body{
		color: <?php echo esc_html($ts_bottom_header_dark_text_color); ?>;
	}
	.header-v3 .top-header-menu ul li,
	.header-v3 .header-top div.header-right > div,
	.header-v7 .top-header-menu ul li,
	.header-v7 .header-top div.header-right > div,
	.header-v5 .header-top,
	.header-v5 .language-currency:after{
		border-color: <?php echo esc_html($ts_top_header_dark_border_color); ?>;
	}
	.header-v5 .ts-search-by-category input[type^="text"]{
		background: <?php echo esc_html($ts_main_content_bg_color); ?>;
	}
	.header-v5 .header-middle .ts-header .menu-wrapper ul li,
	.header-v5 .header-bottom .ts-header .menu-wrapper ul li{
		color: <?php echo esc_html($ts_dark_menu_text_color); ?>;
	}

	/*** Product ***/
	.group_table del, 
	.price del, 
	.price del .amount, 
	.product-price del,
	.wishlist_table del,
	.wishlist_table:not(.mobile) td .variation,
	.wishlist_table .dateadded,
	.ts-testimonial-wrapper .item .author-role .role, 
	.ts-testimonial-wrapper .item .author-role .date{
		color: <?php echo esc_html($ts_product_del_color); ?>;
	}
	.group_table ins, 
	.price ins, 
	.product-price ins,
	.ts-shortcode .price ins,
	.woocommerce div.product p.price ins, 
	.woocommerce div.product span.price ins,
	.price ins .woocommerce-Price-amount,
	.yith-wfbt-items .price ins,
	.yith-wfbt-items .price ins .woocommerce-Price-amount{
		color: <?php echo esc_html($ts_secondary_color); ?>;
	}
	.woocommerce p.stars a,
	.woocommerce p.stars a:hover ~ a,
	.woocommerce p.stars.selected a.active ~ a,
	.woocommerce .star-rating:before,
	.ts-testimonial-wrapper .rating:before, 
	blockquote .rating:before{
		color: <?php echo esc_html($ts_rating_color); ?>;
	}
	.woocommerce p.stars:hover a,
	.woocommerce p.stars.selected a,
	.woocommerce .star-rating span:before,
	.ts-testimonial-wrapper .rating span:before, 
	blockquote .rating span:before{
		color: <?php echo esc_html($ts_rating_fill_color); ?>;
	}
	.product-group-button > div,
	.ts-shortcode .product-group-button-meta > .button-in,
	.cross-sells .product-group-button-meta > .button-in,
	.up-sells .product-group-button-meta > .button-in,
	.related .product-group-button-meta > .button-in,
	.woocommerce.main-products:not(.columns-1) > .products .product-group-button-meta > .button-in,
	.product-group-button .button-tooltip:before,
	body:not(.product-style-2) .product-group-button .button-tooltip:before, 
	.product-style-2 .product-group-button > div:not(.loop-add-to-cart) .button-tooltip:before{
		background-color: <?php echo esc_html($ts_group_product_icon_background_color); ?>;
	}
	.product-group-button > div a:after,
	.woocommerce .product-group-button a.button.loading:before, 
	.woocommerce .product-group-button button.button.loading:before, 
	.woocommerce .product-group-button input.button.loading:before, 
	.woocommerce .product-group-button a.button.loading:after, 
	.woocommerce .product-group-button button.button.loading:after, 
	.woocommerce .product-group-button input.button.loading:after, 
	.woocommerce .product-group-button a.button.added:before, 
	.woocommerce .product-group-button button.button.added:before, 
	.woocommerce .product-group-button input.button.added:before,
	.product-group-button-meta > div a:after,
	.woocommerce .product-group-button-meta a.button.loading:before, 
	.woocommerce .product-group-button-meta button.button.loading:before, 
	.woocommerce .product-group-button-meta input.button.loading:before, 
	.woocommerce .product-group-button-meta a.button.loading:after, 
	.woocommerce .product-group-button-meta button.button.loading:after, 
	.woocommerce .product-group-button-meta input.button.loading:after, 
	.woocommerce .product-group-button-meta a.button.added:before, 
	.woocommerce .product-group-button-meta button.button.added:before, 
	.woocommerce .product-group-button-meta input.button.added:before,
	.product-group-button .button-tooltip,
	.product-group-button-meta .button-tooltip{
		color: <?php echo esc_html($ts_group_product_icon_text_color); ?>;
	}
	.product-group-button .button-tooltip:after,
	body:not(.product-style-2) .product-group-button .button-tooltip:after,
	.product-style-2 .product-group-button > div:not(.loop-add-to-cart) .button-tooltip:after{
		border-left-color: <?php echo esc_html($ts_group_product_icon_background_color); ?>;
	}

	/*** Product Label ***/
	.woocommerce .product .product-label .onsale{
		color: <?php echo esc_html($ts_product_sale_label_text_color); ?>;
		background: <?php echo esc_html($ts_product_sale_label_background_color); ?>;
	}
	.woocommerce .product .product-label .new{
		color: <?php echo esc_html($ts_product_new_label_text_color); ?>;
		background: <?php echo esc_html($ts_product_new_label_background_color); ?>;
	}
	.woocommerce .product .product-label .featured{
		color: <?php echo esc_html($ts_product_feature_label_text_color); ?>;
		background: <?php echo esc_html($ts_product_feature_label_background_color); ?>;
	}
	.woocommerce .product .product-label .out-of-stock{
		color: <?php echo esc_html($ts_product_outstock_label_text_color); ?>;
		background: <?php echo esc_html($ts_product_outstock_label_background_color); ?>;
	}
	.product-label-rectangle .ts-product-deals-wrapper .product .product-label .onsale,
	.product-label-square .ts-product-deals-wrapper .product .product-label .onsale{
		background: <?php echo esc_html($ts_primary_color); ?>;
	}

	/*** Loading ***/
	.vc_row.loading:after,
	.images.loading:after,
	div.wpcf7 .ajax-loader:after,
	.thumbnails.loading:after,
	.image-gallery.loading:after,
	figure.gallery.loading:after,
	article .thumbnail.loading:after,
	.thumbnails-container.loading:after,
	.ts-blogs-wrapper.loading .content-wrapper:after,
	.ts-blogs-widget .ts-blogs-widget-wrapper.loading:after,
	.related-posts.loading .content-wrapper:after,
	.ts-portfolio-wrapper.loading:after,
	.ts-recent-comments-widget .ts-recent-comments-widget-wrapper.loading:after,
	.widget-container .gallery.loading figure:after,
	.images-slider-wrapper .image-items.loading:after,
	.ts-instagram-wrapper.loading:after,
	.ts-team-members .loading:after,
	.ts-testimonial-wrapper .items.loading:after,
	.ts-twitter-slider .items.loading:after,
	.ts-logo-slider-wrapper.loading .content-wrapper:after,
	.search-table .search-content.loading ~ .search-button:before,
	/*** Product ***/
	.column-products.loading:after,
	.woocommerce a.button.loading:after,
	.woocommerce button.button.loading:after,
	.woocommerce input.button.loading:after,
	.wishlist_table .product-add-to-cart a.loading:after,
	div.blockUI.blockOverlay:after,
	.woocommerce div.blockUI.blockOverlay:after,
	div.product .summary .yith-wcwl-add-to-wishlist a.loading:after,
	.archive .woocommerce > .products.loading:before,
	.dropdown-container ul.cart_list li.loading:after,
	.ts-product-category-wrapper .content-wrapper.loading:after,
	.ts-product-in-category-tab-wrapper ul.tabs.loading:after,
	.woocommerce .product figure.loading:after,
	.ts-product .content-wrapper.loading:after,
	.ts-products-widget .ts-products-widget-wrapper.loading:after,
	/*** Popup/Modal ***/
	#cboxLoadingGraphic:after,
	body .pp_pic_holder .pp_loaderIcon:before{
		color: <?php echo esc_html($ts_primary_color); ?>;
	}
	.woocommerce.archive #main-content.ts-col-24:before{
		background: <?php echo esc_html($ts_shop_separate_background); ?>;
	}
	.woocommerce #main-content.ts-col-24 div.product.summary-2-columns:not(.images-summary-background) .summary-column-2 .button.loading:before,
	.woocommerce #main-content.ts-col-24 div.product.summary-2-columns:not(.images-summary-background) .summary-column-2,
	.woocommerce #main-content.ts-col-24 div.product.images-summary-background .product-images-summary:before,
	.woocommerce div.product.images-summary-background div.images .woocommerce-product-gallery__wrapper .zoomImg{
		background-color: <?php echo esc_html($ts_product_images_summary_background); ?>;
	}
	/* Group icons device */
	.ts-group-icons-header{
		background: <?php echo esc_html($ts_bottom_bar_background); ?>;
		border-color: <?php echo esc_html($ts_bottom_bar_border_color); ?>;
	}
	.ts-group-icons-header .home-icon svg path,
	.ts-group-icons-header .shopping-cart-wrapper svg path, 
	.ts-group-icons-header .my-wishlist-wrapper svg path, 
	.ts-group-icons-header .search-button svg path, 
	.ts-group-icons-header .my-account-wrapper svg path,
	.ts-group-icons-header .home-icon:hover svg path,
	.ts-group-icons-header .shopping-cart-wrapper:hover svg path, 
	.ts-group-icons-header .my-wishlist-wrapper:hover svg path, 
	.ts-group-icons-header .search-button:hover svg path, 
	.ts-group-icons-header .my-account-wrapper:hover svg path{
		stroke: <?php echo esc_html($ts_bottom_bar_icon_color); ?>;
	}
	.ts-group-icons-header .ts-group-meta-icon-toggle svg path{
		fill: <?php echo esc_html($ts_bottom_bar_icon_color); ?>;
	}
	.mobile-menu-wrapper .ic-mobile-menu-close-button svg path,
	.menu-mobile-active .ts-group-icons-header .ts-group-meta-icon-toggle svg path{
		fill: <?php echo esc_html($ts_secondary_color); ?>;
	}
	@media only screen and (min-width: 1279px){
		.product-group-button > div a:hover:after,
		.woocommerce .product-group-button a.button.loading:hover:before, 
		.woocommerce .product-group-button button.button.loading:hover:before, 
		.woocommerce .product-group-button input.button.loading:hover:before, 
		.woocommerce .product-group-button a.button.loading:hover:after, 
		.woocommerce .product-group-button button.button.loading:hover:after, 
		.woocommerce .product-group-button input.button.loading:hover:after, 
		.woocommerce .product-group-button a.button.added:hover:before, 
		.woocommerce .product-group-button button.button.added:hover:before, 
		.woocommerce .product-group-button input.button.added:hover:before,
		.product-group-button-meta > div a:hover:after,
		.woocommerce .product-group-button-meta a.button.loading:hover:before, 
		.woocommerce .product-group-button-meta button.button.loading:hover:before, 
		.woocommerce .product-group-button-meta input.button.loading:hover:before, 
		.woocommerce .product-group-button-meta a.button.loading:hover:after, 
		.woocommerce .product-group-button-meta button.button.loading:hover:after, 
		.woocommerce .product-group-button-meta input.button.loading:hover:after, 
		.woocommerce .product-group-button-meta a.button.added:hover:before, 
		.woocommerce .product-group-button-meta button.button.added:hover:before, 
		.woocommerce .product-group-button-meta input.button.added:hover:before{
			color: <?php echo esc_html($ts_group_product_icon_text_hover_color); ?>;
		}
	}
	@media only screen and (max-width: 1279px){
		.product-style-1 .cross-sells .products .product .product-group-button-meta > .loop-add-to-cart .button:after,
		.product-style-1 .up-sells .products .product .product-group-button-meta > .loop-add-to-cart .button:after,
		.product-style-1 .related .products .product .product-group-button-meta > .loop-add-to-cart .button:after,
		.product-style-1 .ts-shortcode .products .product-group-button-meta > .loop-add-to-cart .button:after,
		.product-style-1 .woocommerce.main-products:not(.columns-1) > .products .product-group-button-meta > .loop-add-to-cart .button:after,
		.product-style-1 .cross-sells .products .product .product-group-button-meta > .loop-add-to-cart .button.loading:before,
		.product-style-1 .up-sells .products .product .product-group-button-meta > .loop-add-to-cart .button.loading:before,
		.product-style-1 .related .products .product .product-group-button-meta > .loop-add-to-cart .button.loading:before,
		.product-style-1 .ts-shortcode .products .product-group-button-meta > .loop-add-to-cart .button.loading:after,
		.product-style-1 .woocommerce.main-products:not(.columns-1) > .products .product-group-button-meta > .loop-add-to-cart .button.loading:after,
		.product-style-1 .cross-sells .products .product .product-group-button-meta > .loop-add-to-cart .button.added:before,
		.product-style-1 .up-sells .products .product .product-group-button-meta > .loop-add-to-cart .button.added:before,
		.product-style-1 .related .products .product .product-group-button-meta > .loop-add-to-cart .button.added:before,
		.product-style-1 .ts-shortcode .products .product-group-button-meta > .loop-add-to-cart .button.added:before,
		.product-style-1 .woocommerce.main-products:not(.columns-1) > .products .product-group-button-meta > .loop-add-to-cart .button.added:before{
			color: <?php echo esc_html($ts_group_product_icon_text_color); ?>;
		}
		.product-style-1 .cross-sells .products .product .product-group-button-meta > .loop-add-to-cart,
		.product-style-1 .up-sells .products .product .product-group-button-meta > .loop-add-to-cart,
		.product-style-1 .related .products .product .product-group-button-meta > .loop-add-to-cart,
		.product-style-1 .ts-shortcode .products .product-group-button-meta > .loop-add-to-cart,
		.product-style-1 .woocommerce.main-products:not(.columns-1) > .products .product-group-button-meta > .loop-add-to-cart{
			background: <?php echo esc_html($ts_group_product_icon_background_color); ?>;
		}
		.woocommerce div.product div.summary form.cart .button, 
		.woocommerce .wishlist_table .product-add-to-cart a:hover, 
		.woocommerce .wishlist_table .product-add-to-cart a.alt:hover{
			border-color: <?php echo esc_html($ts_border_color); ?>;
			background: <?php echo esc_html($ts_main_content_bg_color); ?>;
			color: <?php echo esc_html($ts_primary_color); ?>;
		}
	}
	
	/******* 4. DOKAN *******/
	input[type="submit"].dokan-btn-default,
	a.dokan-btn-default,
	.dokan-btn-default,
	body .wp-core-ui .button.button-primary{
		border-color: <?php echo esc_html($ts_secondary_color); ?>;
		background: <?php echo esc_html($ts_secondary_color); ?>;
		color: <?php echo esc_html($ts_text_color_in_bg_secondary); ?>;
	}
	input[type="submit"].dokan-btn-default:hover,
	a.dokan-btn-default:hover,
	.dokan-btn-default:hover,
	input[type="submit"].dokan-btn-default:focus,
	a.dokan-btn-default:focus,
	.dokan-btn-default:focus,
	input[type="submit"].dokan-btn-default:active,
	a.dokan-btn-default:active,
	.dokan-btn-default:active,
	input[type="submit"].dokan-btn-default.active,
	a.dokan-btn-default.active,
	.dokan-btn-default.active,
	.open .dropdown-toggleinput[type="submit"].dokan-btn-default,
	.open .dropdown-togglea.dokan-btn-default,
	.open .dropdown-toggle.dokan-btn-default,
	body .wp-core-ui .button.button-primary.focus,
	body .wp-core-ui .button.button-primary.hover,
	body .wp-core-ui .button.button-primary:focus,
	body .wp-core-ui .button.button-primary:hover,
	input[type="submit"].dokan-btn-default.disabled,
	a.dokan-btn-default.disabled,
	.dokan-btn-default.disabled,
	input[type="submit"].dokan-btn-default[disabled],
	a.dokan-btn-default[disabled],
	.dokan-btn-default[disabled],
	fieldset[disabled] input[type="submit"].dokan-btn-default,
	fieldset[disabled] a.dokan-btn-default,
	fieldset[disabled] .dokan-btn-default,
	input[type="submit"].dokan-btn-default.disabled:hover,
	a.dokan-btn-default.disabled:hover,
	.dokan-btn-default.disabled:hover,
	input[type="submit"].dokan-btn-default[disabled]:hover,
	a.dokan-btn-default[disabled]:hover,
	.dokan-btn-default[disabled]:hover,
	fieldset[disabled] input[type="submit"].dokan-btn-default:hover,
	fieldset[disabled] a.dokan-btn-default:hover,
	fieldset[disabled] .dokan-btn-default:hover,
	input[type="submit"].dokan-btn-default.disabled:focus,
	a.dokan-btn-default.disabled:focus,
	.dokan-btn-default.disabled:focus,
	input[type="submit"].dokan-btn-default[disabled]:focus,
	a.dokan-btn-default[disabled]:focus,
	.dokan-btn-default[disabled]:focus,
	fieldset[disabled] input[type="submit"].dokan-btn-default:focus,
	fieldset[disabled] a.dokan-btn-default:focus,
	fieldset[disabled] .dokan-btn-default:focus,
	input[type="submit"].dokan-btn-default.disabled:active,
	a.dokan-btn-default.disabled:active,
	.dokan-btn-default.disabled:active,
	input[type="submit"].dokan-btn-default[disabled]:active,
	a.dokan-btn-default[disabled]:active,
	.dokan-btn-default[disabled]:active,
	fieldset[disabled] input[type="submit"].dokan-btn-default:active,
	fieldset[disabled] a.dokan-btn-default:active,
	fieldset[disabled] .dokan-btn-default:active,
	input[type="submit"].dokan-btn-default.disabled.active,
	a.dokan-btn-default.disabled.active,
	.dokan-btn-default.disabled.active,
	input[type="submit"].dokan-btn-default[disabled].active,
	a.dokan-btn-default[disabled].active,
	.dokan-btn-default[disabled].active,
	fieldset[disabled] input[type="submit"].dokan-btn-default.active,
	fieldset[disabled] a.dokan-btn-default.active,
	fieldset[disabled] .dokan-btn-default.active{
		border-color: <?php echo esc_html($ts_secondary_color); ?>;
		background: transparent;
		color: <?php echo esc_html($ts_secondary_color); ?>;
	}
	.dokan-product-edit-area header.dokan-pro-edit-breadcrumb h1 a.view-product:hover{
		color: <?php echo esc_html($ts_primary_color); ?>;
	}
	ul.subsubsub li.active a,
	body table.dokan-table thead th,
	.dokan-form-horizontal .dokan-form-group label,
	.dokan-single-store .dokan-store-tabs ul li a,
	.dokan-product-search-form button.dokan-btn:before,
	.dokan-reports-content .dokan-reports-area ul.chart-legend li strong,
	.dokan-alert-info,
	ul.dokan_tabs li a,
	.dokan-form-horizontal .dokan-control-label,
	#tab-seller .list-unstyled li > span:first-child:not(.seller-rating),
	.dokan-dashboard .dokan-dashboard-content article.dashboard-content-area .dashboard-widget .widget-title,
	.dokan-orders-content .dokan-orders-area ul.order-statuses-filter li.active a,
	body .select2-container--default .select2-selection--multiple .select2-selection__choice,
	.dokan-dashboard .dokan-dashboard-content article.dashboard-content-area .dashboard-widget.big-counter .count{
		color: <?php echo esc_html($ts_primary_color); ?>;
	}
	.dokan-progress-bar-info,
	.dokan-single-store .profile-frame .profile-info-box .profile-info-summery-wrapper .profile-info-summery{
		background-color: <?php echo esc_html($ts_primary_color); ?>;
	}
	.pagination-wrap ul.pagination > li > span.current,
	.dokan-pagination-container .dokan-pagination li.active a,
	.dokan-single-store .dokan-store-tabs ul li a:hover{
		background: <?php echo esc_html($ts_primary_color); ?>;
		color: <?php echo esc_html($ts_text_color_in_bg_primary); ?>;
	}
	<?php if( strpos($ts_primary_color, 'rgba') !== false ): ?>
	.dokan-single-store .profile-frame .profile-info-box .profile-info-summery-wrapper .profile-info-summery{
		background-color: <?php echo esc_html(str_replace('1)', '0.6)', esc_html($ts_primary_color))); ?>
	}
	<?php endif; ?>
	.dokan-alert-info,
	.dokan-dashboard .dokan-message,
	.dokan-dashboard .dokan-info,
	.dokan-dashboard .dokan-error,
	.dokan-dashboard .dokan-panel,
	.dokan-dashboard .dokan-alert,
	.dokan-product-listing .dokan-product-listing-area .product-listing-top,
	.dokan-dashboard .dokan-dashboard-content article.dashboard-content-area .dashboard-widget .widget-title,
	.dokan-dashboard .dokan-dashboard-content article.dashboard-content-area .dashboard-widget,
	.dokan-dashboard-content ul.dokan_tabs li,
	.dokan-dashboard-content ul.dokan_tabs,
	.dokan-dashboard header.dokan-dashboard-header h1,
	.dokan-reviews-content .dokan-reviews-area .dokan-comments-wrap select,
	.dokan-single-store .dokan-store-tabs ul,
	.dokan-single-store .dokan-store-tabs ul li,
	.dokan-single-store .profile-frame .profile-info-box.profile-layout-layout1 .profile-info-summery-wrapper,
	.dokan-single-store .profile-frame .profile-info-box.profile-layout-layout2 .profile-info-summery-wrapper,
	.dokan-single-store .profile-frame.profile-frame-no-banner .profile-layout-layout3 .profile-info-summery-wrapper .profile-info-summery,
	.dokan-form-control,
	.dokan-table > thead > tr > th, 
	.dokan-table > tbody > tr > th, 
	.dokan-table > tfoot > tr > th, 
	.dokan-table > thead > tr > td, 
	.dokan-table > tbody > tr > td, 
	.dokan-table > tfoot > tr > td{
		border-color: <?php echo esc_html($ts_border_color); ?>;
	}
	.dokan-progress,
	.dokan-alert-info,
	input.dokan-form-control,
	textarea.dokan-form-control,
	body select.dokan-form-control,
	.dokan-dashboard .dokan-progress,
	body .select2-container .select2-search--inline .select2-search__field{
		background: <?php echo esc_html($ts_input_bg_color); ?>;
	}
	
	/******* 5. RESPONSIVE *******/
	<?php if( isset($data['ts_responsive']) && $data['ts_responsive'] == 1 ): ?>
		@media only screen and (max-width: 767px){
			.columns-1 .list-posts article.sticky h4.entry-title,
			.columns-2 .list-posts article.sticky h4.entry-title,
			.columns-3 .list-posts article.sticky h4.entry-title{
				font-size: <?php echo esc_html($ts_h3_ipad_font_size); ?>;
				line-height: <?php echo esc_html($ts_h3_ipad_font_line_height); ?>;
			}
			body #yith-woocompare table.compare-list tr th:first-child{
				display: none;
			}
			body #yith-woocompare table.compare-list tbody tr td:first-of-type{
				border-left-width: 1px;
			}
			.woocommerce-page.archive #left-sidebar .widget-container .widget-title,
			.woocommerce-page.archive #right-sidebar .widget-container .widget-title,
			.woocommerce-page.archive .filter-widget-area .widget-container .widget-title{
				font-size: <?php echo esc_html($ts_body_font_size); ?>;
				line-height: <?php echo esc_html($ts_body_font_line_height); ?>;
			}
			.list-categories ul.tabs li,
			.column-tabs ul.tabs li,
			body.wpb-js-composer .vc_general.vc_tta-tabs .vc_tta-tab{
				font-size: <?php echo esc_html($ts_h5_font_size); ?>;
				line-height: <?php echo esc_html($ts_h5_font_line_height); ?>;
			}
			html body > h1 a.close:before{
				color: <?php echo esc_html($ts_primary_color); ?>;
			}
			.header-v5 .header-top{
				border-color: <?php echo esc_html($ts_bottom_bar_border_color); ?>;
			}
			.header-v1 .search-button svg path,
			.header-v4 .search-button svg path,
			.header-v7 .search-button svg path{
				stroke: <?php echo esc_html($ts_primary_color); ?>;
			}
		}
	<?php endif; ?>
	
<?php update_option('ts_load_dynamic_style', 1); // uncomment after finished this file ?>	