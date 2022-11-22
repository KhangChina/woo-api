jQuery(function($){
	"use strict";
	var on_touch = !$('body').hasClass('ts_desktop');
	
	/** Remove loading from fullwidth row **/
	$(document).on('vc-full-width-row-single', function(e, data){
		data.el.removeClass('loading');
	});
	
	/** Mega menu **/
	ts_mega_menu_change_state();
	$('.widget_nav_menu .menu-item-has-children .sub-menu').before('<span class="ts-menu-drop-icon"></span>');
	
	/** Menu on IPAD **/
	if( on_touch || $(window).width() < 768 ){
		ts_menu_action_on_ipad();
	}
	
	/** Sticky Menu **/
	if( typeof mymedi_params != 'undefined' && mymedi_params.sticky_header == 1 ){
		ts_sticky_menu();
	}
	
	$('.icon-menu-sticky-header').on('click', function(){
		$('header .header-bottom').slideToggle();
		ts_mega_menu_change_state();
	});
	
	/*** Verticle Sidebar menu (header v2) ***/
	if( $('.main-menu-sidebar-wrapper').length > 0 && $(window).width() > 767 ){
		if( $('.main-menu-sidebar-wrapper .ts-menu-drop-icon').length > 0 ){
			$('.main-menu-sidebar-wrapper .sub-menu').hide();
		}
		$('.main-menu-sidebar-wrapper .ts-menu-drop-icon').on('click', function(){
			var is_active = $(this).hasClass('active');
			var sub_menu = $(this).siblings('.sub-menu');
			
			if( is_active ){
				sub_menu.slideUp(250);
				sub_menu.find('.sub-menu').hide();
				sub_menu.find('.ts-menu-drop-icon').removeClass('active');
			}
			else{
				sub_menu.slideDown(250);
			}
			$(this).toggleClass('active');
		});
	}
	
	/*** Store Notice ***/
	if( $('.ts-store-notice').length && typeof Cookies == 'function' ){
		$('.ts-store-notice .close').on('click', function(){
			$('.ts-store-notice').slideUp();
			Cookies.set('ts_store_notice', 'hidden', { expires: 1 });
		});
	}
	
	/** Device - Resize action **/
	$(window).on('resize orientationchange', $.throttle(250, function(){
		ts_mega_menu_change_state();
	}));
	
	/** Shopping cart on ipad **/
	if( on_touch ){
		$(document).on('click', '.ts-tiny-cart-wrapper span.drop-icon', function(){
			$(this).parent().parent().parent().toggleClass('active');
			/* Reset Dropdown Icon Class On Ipad */
			$('.ts-menu-drop-icon').removeClass('active');
			$('.ts-menu .sub-menu').hide();
		});
	}
	
	/** Header Currency - Language on sidebar **/
	$('#group-icon-header .header-currency, #group-icon-header .header-language').find('ul:last').siblings('a').on('click', function(e){
		e.preventDefault();
		$(this).siblings('ul').slideToggle();
		$(this).toggleClass('active');
	});
	
	/** To Top button **/
	$(window).on('scroll', function(){
		if( $(this).scrollTop() > 100 ){
			$('#to-top').addClass('on');
		} else {
			$('#to-top').removeClass('on');
		}
	});
	
	$('#to-top .scroll-button').on('click', function(){
		$('body,html').animate({
			scrollTop: '0px'
		}, 1000);
		return false;
	});
	
	/** Banner under footer **/
	if( $('.image-banner-footer').length ){
		function set_footer_banner_padding(){
			var padding_bottom = ( $(window).width() <= 767 && $('.ts-group-icons-header').length ) ? $('.image-banner-footer').height() + $('.ts-group-icons-header').height() : $('.image-banner-footer').height();
			$('#page').css({'padding-bottom': padding_bottom + 'px' });
		}
		
		set_footer_banner_padding();
		
		$(window).on('resize', $.throttle(250, function(){
			set_footer_banner_padding();
		}));
	}
	
	/** Quickshop **/
	$(document).on('click', 'a.quickshop', function( e ){
		e.preventDefault();
		
		var product_id = $(this).data('product_id');
		if( product_id === undefined ){
			return;
		}
		
		var container = $('#ts-quickshop-modal');
		container.addClass('loading');
		container.find('.quickshop-content').html('');
		$.ajax({
			type : 'POST'
			,url : mymedi_params.ajax_url	
			,data : {action : 'mymedi_load_quickshop_content', product_id: product_id}
			,success : function(response){
				container.find('.quickshop-content').html( response );
				
				container.removeClass('loading').addClass('show');
				
				var $target = container.find('.woocommerce-product-gallery.images');
				
				if( typeof $.fn.flexslider == 'function' ){
					var options = $.extend( {
						selector: '.woocommerce-product-gallery__wrapper > .woocommerce-product-gallery__image', /* in target */
						start: function() {
							$target.css( 'opacity', 1 );
						},
						after: function( slider ) {
							quickshop_init_zoom( container.find('.woocommerce-product-gallery__image').eq( slider.currentSlide ), $target );
						}
					}, mymedi_params.flexslider );

					$target.flexslider( options );

					container.find( '.woocommerce-product-gallery__wrapper .woocommerce-product-gallery__image:eq(0) .wp-post-image' ).one( 'load', function() {
						var $image = $( this );

						if ( $image ) {
							setTimeout( function() {
								var setHeight = $image.closest( '.woocommerce-product-gallery__image' ).height();
								var $viewport = $image.closest( '.flex-viewport' );

								if ( setHeight && $viewport ) {
									$viewport.height( setHeight );
								}
							}, 100 );
						}
					} ).each( function() {
						if ( this.complete ) {
							$( this ).trigger( 'load' );
						}
					} );
				}
				else{
					$target.css( 'opacity', 1 );
				}
				
				quickshop_init_zoom( container.find('.woocommerce-product-gallery__image').eq(0), $target );
				
				$target.on('woocommerce_gallery_reset_slide_position', function(){
					if( typeof $.fn.flexslider == 'function' ){
						$target.flexslider( 0 );
					}
				});
				
				$target.on('woocommerce_gallery_init_zoom', function(){
					quickshop_init_zoom( container.find('.woocommerce-product-gallery__image').eq(0), $target );
				});
				
				container.find('form.variations_form').wc_variation_form();
				container.find('form.variations_form .variations select').change();
				$('body').trigger('wc_fragments_loaded');
				
				container.find('form.variations_form').on('click', '.reset_variations', function(){
					$(this).parents('.variations').find('.ts-product-attribute .option').removeClass('selected');
				});
			}
		});
	});
	
	function quickshop_init_zoom( zoomTarget, $target ){
		if( typeof $.fn.zoom != 'function' ){
			return;
		}
		
		var galleryWidth = $target.width(), zoomEnabled  = false;
		
		$( zoomTarget ).each( function( index, target ) {
			var image = $( target ).find( 'img' );

			if ( image.attr( 'data-large_image_width' ) > galleryWidth ) {
				zoomEnabled = true;
				return false;
			}
		} );
		
		/* But only zoom if the img is larger than its container. */
		if ( zoomEnabled ) {
			var zoom_options = $.extend( {
				touch: false
			}, mymedi_params.zoom_options );

			if ( 'ontouchstart' in document.documentElement ) {
				zoom_options.on = 'click';
			}

			zoomTarget.trigger( 'zoom.destroy' );
			zoomTarget.zoom( zoom_options );

			setTimeout( function() {
				if ( zoomTarget.find(':hover').length ) {
					zoomTarget.trigger( 'mouseover' );
				}
			}, 100 );
		}
	}
	
	$(document).on('click', '.ts-popup-modal .close, .ts-popup-modal .overlay', function(){
		$('.ts-popup-modal').removeClass('show');
		$('.ts-popup-modal .quickshop-content').html(''); /* prevent conflict with lightbox on single product */
	});
	
	/** Wishlist **/
	$(document).on('click', '.add_to_wishlist, .product a.compare:not(.added)', function(){
		$(this).addClass('loading');
	});
	
	$('body').on('added_to_wishlist', function(){
		ts_update_tini_wishlist();
		$('.add_to_wishlist').removeClass('loading');
		$('.yith-wcwl-wishlistaddedbrowse.show, .yith-wcwl-wishlistexistsbrowse.show').parent('.button-in.wishlist').addClass('added');
	});
	
	$('body').on('removed_from_wishlist added_to_cart', function(){
		if( $('.wishlist_table').length ){
			ts_update_tini_wishlist();
		}
	});
	
	/** Compare **/
	$('body').on('yith_woocompare_open_popup', function(){
		$('.product a.compare').removeClass('loading');
	});
	
	/** Product name min height **/
	function ts_product_name_min_height(){
		$('.woocommerce .products').each(function(){
			var max_height = 0;
			var product_name = $(this).find('.product .product-name');
			product_name.css('min-height', 0);
			product_name.each(function(i, e){
				if( $(e).height() > max_height ){
					max_height = $(e).height();
				}
			});
			product_name.css('min-height', max_height);
		});
	}
	
	if( typeof mymedi_params != 'undefined' && mymedi_params.product_name_min_height == 1 ){
		$(window).on('load resize ts_product_name_min_height', $.throttle(250, function(){
			ts_product_name_min_height();
		}));
	}
	
	/*** Color Swatch ***/
	$(document).on('click', '.products .product .color-swatch > div', function(){
		$(this).siblings().removeClass('active');
		$(this).addClass('active');
		/* Change thumbnail */
		var image_src = $(this).data('thumb');
		$(this).closest('.product').find('figure img:first').attr('src', image_src).removeAttr('srcset sizes');
		/* Change price */
		var term_id = $(this).data('term_id');
		var variable_prices = $(this).parent().siblings('.variable-prices');
		var price_html = variable_prices.find('[data-term_id="'+term_id+'"]').html();
		$(this).closest('.product').find('.meta-wrapper > .price').html( price_html ).addClass('variation-price');
	});
	
	/*** Stock - Variation Price - Variable Product ***/
	function single_variable_product_reset_stock( wrapper ){
		var stock_html = wrapper.find('p.availability').data('original');
		var classes = wrapper.find('p.availability').data('class');
		if( classes == '' ){
			classes = 'in-stock';
		}
		wrapper.find('p.availability span').html(stock_html);
		wrapper.find('p.availability').removeClass('in-stock out-of-stock').addClass(classes);
	}
	
	$(document).on('found_variation', 'form.variations_form', function( e, variation ){
		var wrapper = $(this).parents('.summary');
		if( wrapper.find('.single_variation .stock').length > 0 ){
			var stock_html = wrapper.find('.single_variation .stock').html();
			var classes = wrapper.find('.single_variation .stock').hasClass('out-of-stock')?'out-of-stock':'in-stock';
			wrapper.find('p.availability span').html(stock_html);
			wrapper.find('p.availability').removeClass('in-stock out-of-stock').addClass(classes);
		}
		else{
			single_variable_product_reset_stock( wrapper );
		}
		
		if( variation.price_html ){
			wrapper.find('.ts-variation-price').html( variation.price_html ).removeClass('hidden');
			wrapper.find('p.price').addClass('hidden');
		}
	});
	
	$(document).on('reset_image', 'form.variations_form', function(){
		var wrapper = $(this).parents('.summary');
		single_variable_product_reset_stock( wrapper );
		
		wrapper.find('p.price').removeClass('hidden');
		wrapper.find('.ts-variation-price').addClass('hidden');
	});
	
	/*** Hide product attribute if not available ***/
	$(document).on('update_variation_values', 'form.variations_form', function(){
		if( $(this).find('.ts-product-attribute').length > 0 ){
			$(this).find('.ts-product-attribute').each(function(){
				var attr = $(this);
				var values = [];
				attr.siblings('select').find('option').each(function(){
					if( $(this).attr('value') ){
						values.push( $(this).attr('value') );
					}
				});
				attr.find('.option').removeClass('hidden');
				attr.find('.option').each(function(){
					if( $.inArray($(this).attr('data-value'), values) == -1 ){
						$(this).addClass('hidden');
					}
				});
			});
		}
	});
	
	/*** Single ajax add to cart ***/
	if( typeof mymedi_params != 'undefined' && mymedi_params.ajax_add_to_cart == 1 && !$('body').hasClass('woocommerce-cart') ){
		$(document).on('submit', '.product:not(.product-type-external) .summary form.cart', function(e){
			e.preventDefault();
			var form = $(this);
			var product_url = form.attr('action');
			var data = form.serialize();
			if( !form.hasClass('variations_form') && !form.hasClass('grouped_form') ){
				data += '&add-to-cart=' + form.find('[name="add-to-cart"]').val()
			}
			form.find('.single_add_to_cart_button').removeClass('added').addClass('loading');
			$.post(product_url, data, function( result ){
				$( document.body ).trigger('wc_fragment_refresh');
				var message_wrapper = $('#ts-ajax-add-to-cart-message');
				var error = '';
				result = $('<div>' + result + '</div>');
				if( result.find('.woocommerce-error').length ){
					error = result.find('.woocommerce-error li:first').html();
				}
				form.find('.single_add_to_cart_button').removeClass('loading').addClass('added');
				message_wrapper.removeClass('error');
				if( error ){
					message_wrapper.addClass('error');
					message_wrapper.find('.error-message').html( error );
					form.find('.single_add_to_cart_button').removeClass('added');
				}
				
				message_wrapper.addClass('show');
				setTimeout(function(){
					message_wrapper.removeClass('show');
				}, 2000);
			});
		});
	}
	
	/*** Custom Orderby on Product Page ***/
	$('form.woocommerce-ordering ul.orderby ul a').on('click', function(e){
		e.preventDefault();
		if( $(this).hasClass('current') ){
			return;
		}
		var form = $('form.woocommerce-ordering');
		var data = $(this).attr('data-orderby');
		form.find('select.orderby').val(data).trigger('change');
	});
	
	/*** Per page on Product page ***/
	$('form.product-per-page-form ul.perpage ul a').on('click', function(e){
		e.preventDefault();
		if( $(this).hasClass('current') ){
			return;
		}
		var form = $('form.product-per-page-form');
		var data = $(this).attr('data-perpage');
		form.find('select.perpage').val(data);
		form.submit();
	});
	
	/*** Product Columns Selector ***/
	$('.ts-product-columns-selector span').on('click', function(){
		var col = $(this).data('col');
		$(this).addClass('selected').siblings().removeClass('selected');
		$('#main-content .woocommerce.main-products').removeClass('columns-1 columns-2 columns-3 columns-4 columns-5 columns-6');
		$('#main-content .woocommerce.main-products').addClass('columns-' + col);
		setTimeout(function(){
			$(window).trigger('ts_product_name_min_height');
		}, 250);
	});
	
	/*** Quantity on shop page ***/
	$(document).on('change', '.products .product input[name="quantity"]', function(){
		var add_to_cart_button = $(this).parents('.product').find('.add_to_cart_button');
		var quantity = parseInt( $(this).val() );
		add_to_cart_button.attr('data-quantity', quantity );
		/* For non ajax */
		var href = '?add-to-cart=' + add_to_cart_button.eq(0).attr('data-product_id') + '&quantity=' + quantity;
		add_to_cart_button.attr('href', href);
	});
	
	/*** Widget toggle ***/
	$('.widget-title-wrapper a.block-control').on('click', function(e){
		e.preventDefault();
		$(this).toggleClass('active');
		$(this).parent().siblings(':not(script)').fadeToggle(200);
	});
	
	ts_widget_toggle();
	if( !on_touch ){
		$(window).on('resize', $.throttle(250, function(){
			ts_widget_toggle();
		}));
	}
	
	/*** Sort by toggle ***/
	$('.woocommerce-ordering li .orderby-current , .product-per-page-form li .perpage-current').on('click', function(e){
		$(this).siblings('.dropdown').fadeToggle(200);
        $(this).toggleClass('active');
		$(this).parent().parent().toggleClass('active');
		var type = $(this).hasClass('orderby-current')?'perpage':'orderby';
		hide_orderby_per_page_dropdown( type );
	});
	
	function hide_orderby_per_page_dropdown( type ){
		if( type == 'orderby' ){
			var selector = $('.woocommerce-ordering li .orderby-current');
		}
		else if( type == 'perpage' ){
			var selector = $('.product-per-page-form li .perpage-current');
		}
		else{
			var selector = $('.woocommerce-ordering li .orderby-current, .product-per-page-form li .perpage-current');
		}
		selector.siblings('.dropdown').fadeOut(200);
        selector.removeClass('active');
		selector.parent().parent().removeClass('active');
	}
	
	/* Image Lazy Load */
	if( $('img.ts-lazy-load').length ){
		$(window).on('scroll ts_lazy_load', function(){
			var scroll_top = $(this).scrollTop();
			var window_height = $(this).height();
			$('img.ts-lazy-load:not(.loaded)').each(function(){
				if( $(this).data('src') && $(this).offset().top < scroll_top + window_height + 900 ){
					$(this).attr('src', $(this).data('src')).addClass('loaded');
				}
			});
		});
		
		if( $('img.ts-lazy-load:first').offset().top < $(window).scrollTop() + $(window).height() + 200 ){
			$(window).trigger('ts_lazy_load');
		}
	}
	
	/* WooCommerce Quantity Increment */
	$( document ).on( 'click', '.plus, .minus', function() {
		var $qty		= $( this ).closest( '.quantity' ).find( '.qty' ),
			currentVal	= parseFloat( $qty.val() ),
			max			= parseFloat( $qty.attr( 'max' ) ),
			min			= parseFloat( $qty.attr( 'min' ) ),
			step		= $qty.attr( 'step' );

		if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
		if ( max === '' || max === 'NaN' ) max = '';
		if ( min === '' || min === 'NaN' ) min = 0;
		if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

		if ( $( this ).is( '.plus' ) ) {
			if ( max && ( max == currentVal || currentVal > max ) ) {
				$qty.val( max );
			} else {
				$qty.val( currentVal + parseFloat( step ) );
			}
		} else {
			if ( min && ( min == currentVal || currentVal < min ) ) {
				$qty.val( min );
			} else if ( currentVal > 0 ) {
				$qty.val( currentVal - parseFloat( step ) );
			}
		}

		$qty.trigger( 'change' );
	});
	
	/* Ajax Search */
	if( typeof mymedi_params != 'undefined' && mymedi_params.ajax_search == 1 ){
		ts_ajax_search();
	}
	/* Search - Shopping Cart Sidebar */
	$(document).on('click', '.search-button .icon, .shopping-cart-wrapper .cart-control', function(e){
		$('.ts-floating-sidebar .close').trigger('click');
		var is_cart = $(this).is('.cart-control');
		if( is_cart ){
			if( $('#ts-shopping-cart-sidebar').length > 0 ){
				e.preventDefault();
				$('#ts-shopping-cart-sidebar').addClass('active');
				$('body').addClass('floating-sidebar-active');
				
				/* Reset search header version 1 */
				$('.header-middle .ts-search-by-category').removeClass('active');
				$('header .search-button').removeClass('active');
				$('body').removeClass('search-active');
				
				/* Reset Dropdown Icon Class On Ipad */
				$('.ts-menu-drop-icon').removeClass('active');
				var on_touch = !$('body').hasClass('ts_desktop');
				if( on_touch || $(window).width() < 768 ){
					$('.ts-menu-drop-icon').removeClass('active');
					$('.ts-menu .sub-menu').hide();
				}
			}
		}
		else if( $('#ts-search-sidebar').length > 0 ){
			$('#ts-search-sidebar').addClass('active');
			$('body').addClass('floating-sidebar-active');
			setTimeout(function(){
				$('#ts-search-sidebar input[name="s"]').focus();
			}, 600);
			
			/* Reset search header version 1 */
			$('.header-middle .ts-search-by-category').removeClass('active');
			$('header .search-button').removeClass('active');
			$('body').removeClass('search-active');
			
			/* Reset Dropdown Icon Class On Ipad */
			$('.ts-menu-drop-icon').removeClass('active');
			var on_touch = !$('body').hasClass('ts_desktop');
			if( on_touch || $(window).width() < 768 ){
				$('.ts-menu-drop-icon').removeClass('active');
				$('.ts-menu .sub-menu').hide();
			}
		}
		else if( $('.header-middle .ts-search-by-category').length > 0 ){
			$('.header-middle .ts-search-by-category').toggleClass('active');
			$('header .search-button').toggleClass('active');
			$('body').toggleClass('search-active');
			setTimeout(function(){
				$('.header-middle .ts-search-by-category input[name="s"]').focus();
			}, 600);
			
			/* Reset Dropdown Icon Class On Ipad */
			$('.ts-menu-drop-icon').removeClass('active');
			var on_touch = !$('body').hasClass('ts_desktop');
			if( on_touch || $(window).width() < 768 ){
				$('.ts-menu-drop-icon').removeClass('active');
				$('.ts-menu .sub-menu').hide();
			}
		}
	});
	$('.ts-floating-sidebar .overlay, .ts-floating-sidebar .close').on('click', function(){
		$('.ts-floating-sidebar').removeClass('active');
		$('body').removeClass('floating-sidebar-active');
		$('.filter-widget-area-button.style-sidebar a').removeClass('active');
		$('#main-content').removeClass('show-filter-sidebar');
	});
	
	/* Add To Cart Effect */
	if( !$('body').hasClass('woocommerce-cart') ){
		$(document.body).on('adding_to_cart', function( e, $button, data ){
			if( wc_add_to_cart_params.cart_redirect_after_add == 'no' ){
				if( typeof mymedi_params != 'undefined' && mymedi_params.add_to_cart_effect == 'show_popup' && typeof $button != 'undefined' ){
					var product_id = $button.attr('data-product_id');
					var container = $('#ts-add-to-cart-popup-modal');
					container.addClass('adding');
					$.ajax({
						type : 'POST'
						,url : mymedi_params.ajax_url
						,data : {action : 'mymedi_load_product_added_to_cart', product_id: product_id}
						,success : function(response){
							container.find('.add-to-cart-popup-content').html( response );
							if( container.hasClass('loading') ){
								container.removeClass('loading').addClass('show');
							}
							container.removeClass('adding');
						}
					});
				}
			}
		});
		
		$(document.body).on('added_to_cart', function( e, fragments, cart_hash, $button ){
			/* Show Cart Sidebar */
			if( typeof mymedi_params != 'undefined' && mymedi_params.show_cart_after_adding == 1 ){
				$('.shopping-cart-wrapper .cart-control').trigger('click');
				return;
			}
			/* Cart Fly Effect */
			if( typeof mymedi_params != 'undefined' && typeof $button != 'undefined' ){
				if( mymedi_params.add_to_cart_effect == 'fly_to_cart' ){
					var cart = $('.shopping-cart-wrapper');
					if( cart.length == 2 ){
						if( $(window).width() > 767 ){
							cart = $('.shopping-cart-wrapper:not(.mobile-cart)');
						}
						else{
							cart = $('.shopping-cart-wrapper.mobile-cart');
						}
					}
					if( cart.length == 1 ){
						var product_img = $button.closest('section.product').find('figure img').eq(0);
						if( product_img.length == 1 ){
							var effect_time = 800;
							var cart_in_sticky = $('.is-sticky .shopping-cart-wrapper').length;
							if( cart_in_sticky ){
								effect_time = 500;
							}
							
							var imgclone_height = product_img.width()?150 * product_img.height() / product_img.width():150;
							var imgclone_small_height = product_img.width()?75 * product_img.height() / product_img.width():75;
							
							var imgclone = product_img.clone().offset({top: product_img.offset().top, left: product_img.offset().left})
								.css({'opacity': '0.6', 'position': 'absolute', 'height': imgclone_height + 'px', 'width': '150px', 'z-index': '99999999'})
								.appendTo($('body'))
								.animate({'top': cart.offset().top + cart.height()/2, 'left': cart.offset().left, 'width': 75, 'height': imgclone_small_height}, effect_time, 'linear');
							
							if( !cart_in_sticky && cart.parents('.header-vertical').length == 0 ){
								$('body,html').animate({
									scrollTop: '0px'
								}, effect_time);
							}
							
							imgclone.animate({
								'width': 0
								,'height': 0
							}, function(){
								$(this).detach()
							});
						}
					}
				}
				if( mymedi_params.add_to_cart_effect == 'show_popup' ){
					var container = $('#ts-add-to-cart-popup-modal');
					if( container.hasClass('adding') ){
						container.addClass('loading');
					}
					else{
						container.addClass('show');
					}
				}
			}
		});
	}
	
	/* Disable Ajax Remove Cart Item on Cart and Checkout page */
	if( $('body').hasClass('woocommerce-cart') || $('body').hasClass('woocommerce-checkout') ){
		$(document.body).off('click', '.remove_from_cart_button');
	}
	
	/* Show cart after removing item */
	$(document.body).on('click', '.shopping-cart-wrapper .remove_from_cart_button', function(){
		$('.shopping-cart-wrapper:not(.mobile-cart)').addClass('updating');
	});
	$(document.body).on('removed_from_cart', function(){
		if( !$('.shopping-cart-wrapper:not(.mobile-cart)').is(':hover') ){
			$('.shopping-cart-wrapper:not(.mobile-cart)').removeClass('updating');
		}
	});
	
	/* Change cart item quantity */
	$(document).on('change', '.ts-tiny-cart-wrapper .qty', function(){
		var qty = parseFloat($(this).val());
		var max = parseFloat($(this).attr('max'));
		if( max !== 'NaN' && max < qty ){
			qty = max;
			$(this).val( max );
		}
		var cart_item_key = $(this).attr('name').replace('cart[', '').replace('][qty]', '');
		$(this).parents('.woocommerce-mini-cart-item').addClass('loading');
		$('.shopping-cart-wrapper:not(.mobile-cart)').addClass('updating');
		$('.woocommerce-message').remove();
		$.ajax({
			type : 'POST'
			,url : mymedi_params.ajax_url
			,data : {action : 'mymedi_update_cart_quantity', qty: qty, cart_item_key: cart_item_key}
			,success : function(response){
				if( !response ){
					return;
				}
				$( document.body ).trigger( 'added_to_cart', [ response.fragments, response.cart_hash ] );
				if( !$('.shopping-cart-wrapper:not(.mobile-cart)').is(':hover') ){
					$('.shopping-cart-wrapper:not(.mobile-cart)').removeClass('updating');
				}
			}
		});
	});
	
	$(document).on('mouseleave', '.shopping-cart-wrapper.updating',function(){ 
		$(this).removeClass('updating');
	});
	
	/* Filter Widget Area */
	var filter_sidebar_interval;
	$('.filter-widget-area-button a').on('click', function(){
		$(this).toggleClass('active');
		$('#ts-filter-widget-area').toggleClass('active');
		$('#main-content').toggleClass('show-filter-sidebar');
			
		if( $('#ts-filter-widget-area').hasClass('active') ){
			filter_sidebar_interval = setInterval(function(){
				var filter_height = $('#ts-filter-widget-area .filter-widget-area').height() + 100;
				var bestseller_height = $('.ts-product-wrapper.best_selling').length ? $('.ts-product-wrapper.best_selling').height() + 50 : 0;
				$('#main-content').css('min-height', filter_height + bestseller_height);
			}, 1000);
		}
		else{
			clearInterval( filter_sidebar_interval );
			$('#main-content').css('min-height', '');
		}
		hide_orderby_per_page_dropdown('both');
		return false;
	});
	
	if( $('.ts-active-filters .widget_layered_nav_filters').length ){
		$('.filter-widget-area-button.style-sidebar a').trigger('click');
	}
	
	/* Product On Sale Checkbox */
	$('.product-on-sale-form input[type="checkbox"]').on('change', function(){
		$(this).parents('form').submit();
	});
	
	/* Single post - Related posts - Gallery slider */
	ts_single_related_post_gallery_slider();
	
	/* Single Product - Variable Product options */
	$(document).on('click', '.variations_form .ts-product-attribute .option a', function(){
		var _this = $(this);
		var val = _this.closest('.option').data('value');
		var selector = _this.closest('.ts-product-attribute').siblings('select');
		if( selector.length > 0 ){
			if( selector.find('option[value="' + val + '"]').length > 0 ){
				selector.val(val).change();
				_this.closest('.ts-product-attribute').find('.option').removeClass('selected');
				_this.closest('.option').addClass('selected');
			}
		}
		return false;
	});
	
	$('.variations_form').on('click', '.reset_variations', function(){
		$(this).closest('.variations').find('.ts-product-attribute .option').removeClass('selected');
	});
	
	/* Related - Upsell - Crosssell products slider */
	$('.single-product .related .products, .single-product .upsells .products, .woocommerce .cross-sells .products').each(function(){
		var _this = $(this);
		if( _this.find('.product').length > 1 ){
			_this.owlCarousel({
				loop: true
				,nav: true
				,navText: [,]
				,navSpeed: 1000
				,rtl: $('body').hasClass('rtl')
				,margin: 0
				,navRewind: false
				,responsiveBaseElement: _this
				,responsiveRefreshRate: 1000
				,responsive:{0:{items:1},320:{items:2},680:{items:3},940:{items:4},1025:{items:5}}
			});
		}
	});
	
	/* Background Video - Youtube Video */
	if( typeof $.fn.YTPlayer == 'function' ){
		$('.ts-youtube-video-bg').each(function(index, element){
			var selector = $(this);
			var poster = selector.data('poster');
			var property = selector.data('property') && typeof selector.data('property') == 'string' ? eval('(' + selector.data('property') + ')') : selector.data('property');
			
			if( ! on_touch ) {
				var player = selector.YTPlayer();
				
				player.on('YTPPlay', function(){
					selector.removeClass('pausing').addClass('playing');
					selector.closest('.vc_row').addClass('playing');
					if( poster ){
						selector.css({'background-image':''});
						selector.find('.mbYTP_wrapper').css({'opacity':1});
					}
				});
				
				player.on('YTPPause YTPEnd', function(){
					selector.removeClass('playing').addClass('pausing');
					selector.closest('.vc_row').removeClass('playing');
					if( poster ){
						selector.css({'background-image':'url(' + poster + ')'});
						selector.find('.mbYTP_wrapper').css({'opacity':0});
					}
				});
				
				player.on('YTPChanged', function(){
					if( !property.autoPlay && poster ){
						selector.css({'background-image':'url(' + poster + ')'});
					}
				});
			}
			else if( poster ) {
				selector.css({'background-image':'url(' + poster + ')'});
			}
		});
	}
	
	/* Background Video - Hosted Video */
	$('.ts-hosted-video-bg').each(function(){
		var selector = $(this);
		var video = selector.find('video');
		var video_dom = video.get(0);
		if( video.hasClass('loop') ){
			video_dom.loop = true;
		}
		if( video.hasClass('muted') ){
			video_dom.muted = true;
		}
		
		var poster = selector.data('poster');
		if( poster ){
			selector.css({'background-image':'url(' + poster + ')'});
		}
		
		var control = selector.find('.video-control');
		control.on('click', function(){
			if( !selector.hasClass('playing') ){
				video_dom.play();
				selector.css({'background-image':''});
				selector.removeClass('pausing').addClass('playing');
				selector.closest('.vc_row').addClass('playing');
			}
			else{
				video_dom.pause();
				if( poster ){
					selector.css({'background-image':'url(' + poster + ')'});
				}
				selector.removeClass('playing').addClass('pausing');
				selector.closest('.vc_row').removeClass('playing');
			}
		});
		if( !on_touch && video.hasClass('autoplay') ){
			control.trigger('click');
		}
	});
	
	/* Single Portfolio Lightbox */
	if( typeof $.fn.prettyPhoto == 'function' ){
		$('.single-portfolio .thumbnail a[rel^="prettyPhoto"]').prettyPhoto({
			show_title: false
			,deeplinking: false
			,social_tools: false
		});
	}
	
	/* Single Portfolio Slider */
	ts_generate_single_portfolio_slider();

});

/*** Mega menu ***/
function ts_mega_menu_change_state(){
	/* Reset Dropdown Icon Class On Ipad */
	jQuery('.ts-menu-drop-icon').removeClass('active');
	
	if( Math.max( window.outerWidth, jQuery(window).width() ) > 767 ){
	
		var padding_left = 0, container_width = 0;
		var container = jQuery('.header-sticky .container:first');
		var container_stretch = jQuery('.header-sticky');
		if( container.length <= 0 ){
			container = jQuery('.header-sticky');
			if( container.length <= 0 ){
				return;
			}
			container_width = container.outerWidth();
		}
		else{
			container_width = container.width();
			padding_left = parseInt(container.css('padding-left'));
		}
		var container_offset = container.offset();
		
		var container_stretch_width = container_stretch.outerWidth();
		var container_stretch_offset = container_stretch.offset();
		
		setTimeout(function(){
			jQuery('.ts-menu nav.main-menu > ul.menu > .ts-megamenu-fullwidth').each(function(index, element){
				var current_offset = jQuery(element).offset();
				if( jQuery(element).hasClass('ts-megamenu-fullwidth-stretch') ){
					var left = current_offset.left - container_stretch_offset.left;
					jQuery(element).children('ul.sub-menu').css({'width':container_stretch_width+'px','left':-left+'px','right':'auto'});
				}
				else{
					var left = current_offset.left - container_offset.left - padding_left;
					jQuery(element).children('ul.sub-menu').css({'width':container_width+'px','left':-left+'px','right':'auto'});
				}
			});
			
			jQuery('.ts-menu nav.main-menu > ul.menu').children('.ts-megamenu-columns-1, .ts-megamenu-columns-2, .ts-megamenu-columns-3, .ts-megamenu-columns-4').each(function(index, element){	
				jQuery(element).children('ul.sub-menu').css({'max-width':container_width+'px'});
				var sub_menu_width = jQuery(element).children('ul.sub-menu').outerWidth();
				var item_width = jQuery(element).outerWidth();
				jQuery(element).children('ul.sub-menu').css({'left':'-'+(sub_menu_width/2 - item_width/2)+'px','right':'auto'});
				
				var container_left = container_offset.left;
				var container_right = container_left + container_width;
				var item_left = jQuery(element).offset().left;
				
				var overflow_left = (sub_menu_width/2 > (item_left + item_width/2 - container_left));
				var overflow_right = ((sub_menu_width/2 + item_left + item_width/2) > container_right);
				if( overflow_left ){
					var left = item_left - container_left - padding_left;
					jQuery(element).children('ul.sub-menu').css({'left':-left+'px','right':'auto'});
				}
				if( overflow_right && !overflow_left ){
					var left = item_left - container_left - padding_left;
					left = left - ( container_width - sub_menu_width );
					jQuery(element).children('ul.sub-menu').css({'left':-left+'px','right':'auto'});
				}
			});
			
			/* Remove hide class after loading */
			jQuery('ul.menu li.menu-item').removeClass('hide');
			
		},800);
		
	}
	else{
		jQuery('#wpadminbar').css('position', 'fixed');
	
		/* Remove hide class after loading */
		jQuery('ul.menu li.menu-item').removeClass('hide');
	}
	
	jQuery('.ic-mobile-menu-button').off('click');
	jQuery('.ic-mobile-menu-button').on('click', function(){
		jQuery('#page').addClass('menu-mobile-active');
	});
	
	jQuery('.ic-mobile-menu-close-button').off('click');
	jQuery('.ic-mobile-menu-close-button').on('click', function(){
		jQuery('#page').removeClass('menu-mobile-active');
	});
	
}

function ts_menu_action_on_ipad(){
	/* Main Menu Drop Icon */
	jQuery('.ts-menu nav.main-menu .ts-menu-drop-icon').on('click', function(){
		
		var is_active = jQuery(this).hasClass('active');
		var sub_menu = jQuery(this).siblings('.sub-menu');
		
		jQuery('.ts-menu nav.main-menu .ts-menu-drop-icon').removeClass('active');
		jQuery('.ts-menu nav.main-menu .sub-menu').hide();
		
		jQuery(this).parents('.sub-menu').show();
		jQuery(this).parents('.sub-menu').siblings('.ts-menu-drop-icon').addClass('active');
		
		/* Reset Dropdown Cart */
		jQuery('header .shopping-cart-wrapper').removeClass('active');
		
		if( sub_menu.length > 0 ){
			if( is_active ){
				sub_menu.fadeOut(250);
				jQuery(this).removeClass('active');
			}
			else{
				sub_menu.fadeIn(250);
				jQuery(this).addClass('active');
			}
		}
	});
	
	/* Mobile Menu Drop Icon */
	if( jQuery('.ts-menu nav.mobile-menu .ts-menu-drop-icon').length > 0 ){
		jQuery('.ts-menu nav.mobile-menu .sub-menu').hide();
	}
	jQuery('.ts-menu nav.mobile-menu .ts-menu-drop-icon').on('click', function(){
		var is_active = jQuery(this).hasClass('active');
		var sub_menu = jQuery(this).siblings('.sub-menu');
		
		if( is_active ){
			sub_menu.slideUp(250);
			sub_menu.find('.sub-menu').hide();
			sub_menu.find('.ts-menu-drop-icon').removeClass('active');
		}
		else{
			sub_menu.slideDown(250);
		}
		jQuery(this).toggleClass('active');
	});

}

/*** End Mega menu ***/

/*** Sticky Menu ***/
function ts_sticky_menu(){	
	var top_spacing = 0;
	if( jQuery('body').hasClass('admin-bar') && jQuery('#wpadminbar').length > 0 ){
		top_spacing = jQuery('#wpadminbar').height();
	}
	var top_begin = jQuery('header.ts-header').height() + 300;
	
	if( jQuery('.header-transparent .breadcrumb-title-wrapper').length > 0 ){
		top_begin = jQuery('.header-transparent .breadcrumb-title-wrapper').height();
	}
	
	setTimeout( function(){
		jQuery('.header-sticky').sticky({
				topSpacing: top_spacing
				,topBegin: top_begin
				,scrollOnTop : function (){
					ts_mega_menu_change_state();
					jQuery('body > .select2-container--open').removeClass('sticky');
					jQuery('header .header-bottom').css('display', '');
				}
				,scrollOnBottom : function (){
					ts_mega_menu_change_state();
					jQuery('body > .select2-container--open').addClass('sticky');
				}					
			});
	}, 200);
}

/*** Custom Wishlist ***/
function ts_update_tini_wishlist(){
	if( typeof mymedi_params == 'undefined' ){
		return;
	}
		
	var wishlist_wrapper = jQuery('.my-wishlist-wrapper');
	if( wishlist_wrapper.length == 0 ){
		return;
	}
	
	wishlist_wrapper.addClass('loading');
	
	jQuery.ajax({
		type : 'POST'
		,url : mymedi_params.ajax_url
		,data : {action : 'mymedi_update_tini_wishlist'}
		,success : function(response){
			var first_icon = wishlist_wrapper.children('i.fa:first');
			wishlist_wrapper.html(response);
			if( first_icon.length > 0 ){
				wishlist_wrapper.prepend(first_icon);
			}
			wishlist_wrapper.removeClass('loading');
		}
	});
}

/*** End Custom Wishlist***/

/*** Widget toggle ***/
function ts_widget_toggle(){
	jQuery('.wpb_widgetised_column .widget-title-wrapper a.block-control, .footer-container .widget-title-wrapper a.block-control').remove();
	if( typeof mymedi_params != 'undefined' && mymedi_params.responsive == 0 ){
		return;
	}
	if( Math.max( window.outerWidth, jQuery(window).width() ) >= 768 ){
		jQuery('.widget-title-wrapper a.block-control').removeClass('active').hide();
		jQuery('.widget-title-wrapper a.block-control').parent().siblings(':not(script)').show();
	}
	else{
		jQuery('.widget-title-wrapper a.block-control').removeClass('active').show();
		jQuery('.widget-title-wrapper a.block-control').parent().siblings(':not(script)').hide();
		jQuery('.wpb_widgetised_column .widget-title-wrapper, .footer-container .widget-title-wrapper').siblings(':not(script)').show();
	}
}

/*** Ajax search ***/
function ts_ajax_search(){
	var search_string = '';
	var search_previous_string = '';
	var search_timeout;
	var search_delay = 700;
	var search_input;
	var search_cache_data = {};
	jQuery('body').append('<div id="ts-search-result-container" class="ts-search-result-container woocommerce"></div>');
	var search_result_container = jQuery('#ts-search-result-container');
	var search_result_container_sidebar = jQuery('#ts-search-sidebar .ts-search-result-container');
	var is_sidebar = false;
	
	jQuery('.ts-header .search-content input[name="s"], #ts-search-sidebar input[name="s"]').on('keyup', function(e){
		is_sidebar = jQuery(this).parents('#ts-search-sidebar').length > 0;
		search_input = jQuery(this);
		search_result_container.hide();
		
		search_string = jQuery(this).val().trim();
		if( search_string.length < 2 ){
			search_input.parents('.search-content').removeClass('loading');
			return;
		}
		
		if( search_cache_data[search_string] ){
			if( !is_sidebar ){
				search_result_container.html(search_cache_data[search_string]);
				search_result_container.show();
			}
			else{
				search_result_container_sidebar.html(search_cache_data[search_string]);
			}
			search_previous_string = '';
			search_input.parents('.search-content').removeClass('loading');
			
			return;
		}
		
		clearTimeout(search_timeout);
		search_timeout = setTimeout(function(){
			if( search_string == search_previous_string || search_string.length < 2 ){
				return;
			}
			
			search_previous_string = search_string;
		
			search_input.parents('.search-content').addClass('loading');
			
			jQuery.ajax({
				type : 'POST'
				,url : mymedi_params.ajax_url
				,data : {action : 'mymedi_ajax_search', search_string: search_string, category: ''}
				,error : function(xhr,err){
					search_input.parents('.search-content').removeClass('loading');
				}
				,success : function(response){
					if( response != '' ){
						response = JSON.parse(response);
						if( response.search_string == search_string ){
							search_cache_data[search_string] = response.html;
							if( !is_sidebar ){
								search_result_container.html(response.html);
								
								search_result_container.css({
									'position': 'absolute'
									,'top': search_input.offset().top + search_input.outerHeight() + 10
									,'left': 0
									,'width': jQuery(window).width()
									,'display': 'block'
								});
							}
							else{
								search_result_container_sidebar.html(response.html);
							}
							
							search_input.parents('.search-content').removeClass('loading');
						}
					}
					else{
						search_input.parents('.search-content').removeClass('loading');
					}
				}
			});
		}, search_delay);
	});
	
	search_result_container.on('mouseleave', function(){ 
		search_result_container.hide(); 
	});
	
	jQuery('body').on('click', function(){
		search_result_container.hide();
	});
	
	jQuery(document).on('click', '.ts-search-result-container .view-all-wrapper a', function(e){
		e.preventDefault();
		search_input.parents('form').submit();
	});
}

/*** Single post - Related posts - Gallery slider ***/
function ts_single_related_post_gallery_slider(){
	if( jQuery('.single-post figure.gallery, .list-posts .post-item .gallery figure, .ts-blogs-widget .thumbnail.gallery figure').length > 0 ){
		var _this = jQuery('.single-post figure.gallery, .list-posts .post-item .gallery figure, .ts-blogs-widget .thumbnail.gallery figure');
		var slider_data = {
			items: 1
			,loop: true
			,nav: true
			,dots: false
			,animateIn: 'fadeIn'
			,animateOut: 'fadeOut'
			,navText: [,]
			,navSpeed: 1000
			,rtl: jQuery('body').hasClass('rtl')
			,margin: 10
			,navRewind: false
			,autoplay: true
			,autoplayTimeout: 4000
			,autoplayHoverPause: true
			,autoplaySpeed: false
			,autoHeight: true
			,mouseDrag: false
			,responsive:{0:{items:1}}
			,onInitialized: function(){
				_this.removeClass('loading');
				_this.parent('.gallery').addClass('loaded').removeClass('loading');
			}
		};
		_this.each(function(){
			var validate_slider = true;
			
			if( jQuery(this).find('img').length <= 1 ){
				validate_slider = false;
			}
			
			if( validate_slider ){
				jQuery(this).owlCarousel(slider_data);
			}
			else{
				jQuery(this).removeClass('loading');
				jQuery(this).parent('.gallery').removeClass('loading');
			}
		});
	}
	
	if( jQuery('.single-post .related-posts.loading').length > 0 ){
		var _this = jQuery('.single-post .related-posts.loading');
		var slider_data = {
			loop: true
			,nav: true
			,navText: [,]
			,dots: false
			,navSpeed: 1000
			,rtl: jQuery('body').hasClass('rtl')
			,margin : 0
			,navRewind: false
			,responsiveBaseElement: _this.find('.container')
			,responsiveRefreshRate: 400
			,responsive:{0:{items:1},640:{items:2},1150:{items:3},1400:{items:4}}
			,onInitialized: function(){
				_this.addClass('loaded').removeClass('loading');
			}
		};
		_this.find('.content-wrapper .blogs').owlCarousel(slider_data);
	}
	
}

/*** Single Portfolio Slider ***/
function ts_generate_single_portfolio_slider(){
	if( jQuery('.single-portfolio.slider .thumbnail figure img').length > 1 ){
		var wrapper = jQuery('.single-portfolio.slider');
		var element = jQuery('.single-portfolio.slider .thumbnail figure');
		element.owlCarousel({
					items: 1
					,loop: true
					,nav: true
					,navText: [,]
					,dots: false
					,navSpeed: 1000
					,rtl: jQuery('body').hasClass('rtl')
					,navRewind: false
					,autoplay: true
					,autoplayHoverPause: true
					,autoplaySpeed: 1000
					,onInitialized: function(){
						wrapper.find('.thumbnail').addClass('loaded').removeClass('loading');
					}
				});
	}
	else{
		jQuery('.single-portfolio.slider .thumbnail').removeClass('loading');
	}
}