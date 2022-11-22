jQuery(function($){
	"use strict";
	var on_touch = !$('body').hasClass('ts_desktop');
	
	/*** Product Video ***/
	$('a.ts-product-video-button').on('click', function(e){
		e.preventDefault();
		var product_id = $(this).data('product_id');
		var container = $('#ts-product-video-modal');
		if( container.find('.product-video-content').html() ){
			container.addClass('show');
		}
		else{
			container.addClass('loading');
			$.ajax({
				type : 'POST'
				,url : mymedi_params.ajax_url
				,data : {action : 'mymedi_load_product_video', product_id: product_id}
				,success : function(response){
					container.find('.product-video-content').html( response );
					container.removeClass('loading').addClass('show');
				}
			});
		}
	});
	
	/*** Product 360 ***/
	if( typeof $.fn.ThreeSixty == 'function' ){
		$('.ts-product-360-button').on('click', function(){
			$('#ts-product-360-modal').addClass('loading');
			generate_product_360();
			return false;
		});
	}
	
	function generate_product_360(){
		if( !$('.ts-product-360').hasClass('loaded') ){
			$('.ts-product-360').ThreeSixty({
				currentFrame: 1
				,imgList: '.threesixty_images'
				,imgArray: _ts_product_360_image_array
				,totalFrames: _ts_product_360_image_array.length
				,endFrame: _ts_product_360_image_array.length
				,progress: '.spinner'
				,navigation: true
				,responsive: true
				,playSpeed: 150
				,onReady: function(){
					$('#ts-product-360-modal').removeClass('loading').addClass('show');
					$('.ts-product-360').addClass('loaded');
				}
			});
		}
		else{
			$('#ts-product-360-modal').removeClass('loading').addClass('show');
		}
	}
	
	/*** Show more/less product content ***/
	if( $('.single-product .more-less-buttons').length > 0 ){
		var product_content = $('.single-product .more-less-buttons').siblings('.product-content');
		if( product_content.height() < 250 ){
			$('.single-product .more-less-buttons').remove();
			product_content.removeClass('closed show-more-less');
		}
		else{
			var timeout = 200 + ( product_content.find('img').length * 200 );
			setTimeout(function(){
				var scrollheight = product_content.get(0).scrollHeight;
				var speed = scrollheight / 1000;
				var style = '<style>'
							+ '.product-content.show-more-less{transition:'+speed+'s ease;}'
							+ '.product-content.opened{max-height:'+scrollheight+'px;}'
							+ '</style>';
				$('head').append( style );
			}, timeout);
		}
	}
	
	$('.single-product .more-less-buttons a').on('click', function(e){
		e.preventDefault();
		$(this).hide();
		$(this).siblings('a').show();
		var action = $(this).data('action');
		$(this).parent().siblings('.product-content').removeClass('opened closed').addClass(action);
		
		if( action == 'closed' ){
			var top = $(this).parents('.woocommerce-tabs').offset().top - get_fixed_header_height() - 10;
			$('body, html').animate({
				scrollTop: top
			}, 1000);
		}
	});
	
	function get_fixed_header_height(){
		var admin_bar_height = $('#wpadminbar').length > 0?$('#wpadminbar').outerHeight():0;
		var sticky_height = $('.is-sticky .header-sticky').length > 0?$('.is-sticky .header-sticky').outerHeight():0;
		return admin_bar_height + sticky_height;
	}
	
	/*** Accordion - scroll to activated tab ***/
	$('.single-product .vc_tta-accordion .vc_tta-panel-heading').on('click', function(){
		if( $(this).parents('.vc_tta-panel').hasClass('vc_active') ){
			return;
		}
		var acc_header = $(this);
		
		setTimeout(function(){
			$('body,html').animate({
				scrollTop: acc_header.offset().top - get_fixed_header_height()
			}, 500);
		}, 800);
	});
	
	if( $('.woocommerce-tabs.accordion-tabs').length > 0 ){
		$('a.woocommerce-review-link').on('click', function(){
			var acc_header = $('#reviews').parents('.vc_tta-panel-body').siblings('.vc_tta-panel-heading');
			if( !acc_header.parents('.vc_tta-panel').hasClass('vc_active') ){
				setTimeout(function(){
					acc_header.trigger('click');
					acc_header.find('.vc_tta-panel-title a').trigger('click');
				}, 100);
			}
		});
	}
	
	/*** Reviews form ***/
	$('.ts-write-a-review-button').on('click', function(e){
		e.preventDefault();
		$(this).siblings().slideToggle();
	});
	
	/*** Next/Prev ***/
	if( $('.single-navigation').length > 0 ){
		var images = $('.woocommerce-product-gallery.images');
		var image_top = images.offset().top;
		$(window).on('scroll', function(){
			if( $(this).scrollTop() > image_top && $(this).scrollTop() < image_top + images.height() ){
				$('.single-navigation').addClass('visible');
			}
			else{
				$('.single-navigation').removeClass('visible');
			}
		});
	}
	
});