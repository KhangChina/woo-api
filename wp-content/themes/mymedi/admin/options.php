<?php
$redux_url = '';
if( class_exists('ReduxFramework') ){
	$redux_url = ReduxFramework::$_url;
}

$logo_url 					= get_template_directory_uri() . '/images/logo.png'; 
$favicon_url 				= get_template_directory_uri() . '/images/favicon.ico';

$color_image_folder = get_template_directory_uri() . '/admin/assets/images/colors/';
$list_colors = array('default','black','gray','gray2');
$preset_colors_options = array();
foreach( $list_colors as $color ){
	$preset_colors_options[$color] = array(
					'alt'      => $color
					,'img'     => $color_image_folder . $color . '.jpg'
					,'presets' => mymedi_get_preset_color_options( $color )
	);
}

$family_fonts = array(
	"Arial, Helvetica, sans-serif"                          => "Arial, Helvetica, sans-serif"
	,"'Arial Black', Gadget, sans-serif"                    => "'Arial Black', Gadget, sans-serif"
	,"'Bookman Old Style', serif"                           => "'Bookman Old Style', serif"
	,"'Comic Sans MS', cursive"                             => "'Comic Sans MS', cursive"
	,"Courier, monospace"                                   => "Courier, monospace"
	,"Garamond, serif"                                      => "Garamond, serif"
	,"Georgia, serif"                                       => "Georgia, serif"
	,"Impact, Charcoal, sans-serif"                         => "Impact, Charcoal, sans-serif"
	,"'Lucida Console', Monaco, monospace"                  => "'Lucida Console', Monaco, monospace"
	,"'Lucida Sans Unicode', 'Lucida Grande', sans-serif"   => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif"
	,"'MS Sans Serif', Geneva, sans-serif"                  => "'MS Sans Serif', Geneva, sans-serif"
	,"'MS Serif', 'New York', sans-serif"                   => "'MS Serif', 'New York', sans-serif"
	,"'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif"
	,"Tahoma,Geneva, sans-serif"                            => "Tahoma, Geneva, sans-serif"
	,"'Times New Roman', Times,serif"                       => "'Times New Roman', Times, serif"
	,"'Trebuchet MS', Helvetica, sans-serif"                => "'Trebuchet MS', Helvetica, sans-serif"
	,"Verdana, Geneva, sans-serif"                          => "Verdana, Geneva, sans-serif"
	,"CustomFont"                          					=> "CustomFont"
);

$header_layout_options = array();
$header_image_folder = get_template_directory_uri() . '/admin/assets/images/headers/';
for( $i = 1; $i <= 9; $i++ ){
	$header_layout_options['v' . $i] = array(
		'alt'  => sprintf(esc_html__('Header Layout %s', 'mymedi'), $i)
		,'img' => $header_image_folder . 'header_v'.$i.'.jpg'
	);
}

$loading_screen_options = array();
$loading_image_folder = get_template_directory_uri() . '/images/loading/';
for( $i = 1; $i <= 10; $i++ ){
	$loading_screen_options[$i] = array(
		'alt'  => sprintf(esc_html__('Loading Image %s', 'mymedi'), $i)
		,'img' => $loading_image_folder . 'loading_'.$i.'.svg'
	);
}

$footer_block_options = mymedi_get_footer_block_options();

$breadcrumb_layout_options = array();
$breadcrumb_image_folder = get_template_directory_uri() . '/admin/assets/images/breadcrumbs/';
for( $i = 1; $i <= 3; $i++ ){
	$breadcrumb_layout_options['v' . $i] = array(
		'alt'  => sprintf(esc_html__('Breadcrumb Layout %s', 'mymedi'), $i)
		,'img' => $breadcrumb_image_folder . 'breadcrumb_v'.$i.'.jpg'
	);
}

$sidebar_options = array();
$default_sidebars = mymedi_get_list_sidebars();
if( is_array($default_sidebars) ){
	foreach( $default_sidebars as $key => $_sidebar ){
		$sidebar_options[$_sidebar['id']] = $_sidebar['name'];
	}
}

$product_loading_image = get_template_directory_uri() . '/images/prod_loading.gif';

$option_fields = array();

/*** General Tab ***/
$option_fields['general'] = array(
	array(
		'id'        => 'section-logo-favicon'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Logo - Favicon', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_logo'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Logo', 'mymedi' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Select an image file for the main logo', 'mymedi' )
		,'readonly' => false
		,'default'  => array( 'url' => $logo_url )
	)
	,array(
		'id'        => 'ts_logo_mobile'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Logo On Mobile', 'mymedi' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Leave blank to display the main logo on mobile', 'mymedi' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_logo_sticky'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Sticky Logo', 'mymedi' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Display this logo on sticky header', 'mymedi' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_logo_width'
		,'type'     => 'text'
		,'url'      => true
		,'title'    => esc_html__( 'Logo Width', 'mymedi' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Set width for logo (in pixels)', 'mymedi' )
		,'default'  => '216'
	)
	,array(
		'id'        => 'ts_device_logo_width'
		,'type'     => 'text'
		,'url'      => true
		,'title'    => esc_html__( 'Device/Sticky Header Logo Width', 'mymedi' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Set width for logo (in pixels)', 'mymedi' )
		,'default'  => '144'
	)
	,array(
		'id'        => 'ts_favicon'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Favicon', 'mymedi' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Select a PNG, GIF or ICO image', 'mymedi' )
		,'readonly' => false
		,'default'  => array( 'url' => $favicon_url )
	)
	,array(
		'id'        => 'ts_text_logo'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Text Logo', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'MyMedi'
	)
	
	,array(
		'id'        => 'section-layout-style'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Layout Style', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Layout Fullwidth', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
	)
	,array(
		'id'        => 'ts_header_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Header Layout Fullwidth', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'required'	=> array( 'ts_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_main_content_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Main Content Layout Fullwidth', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'required'	=> array( 'ts_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_footer_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Footer Layout Fullwidth', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'required'	=> array( 'ts_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'       	=> 'ts_layout_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Layout Style', 'mymedi' )
		,'subtitle' => esc_html__( 'You can override this option for the individual page', 'mymedi' )
		,'desc'     => ''
		,'options'  => array(
			'wide' 		=> 'Wide'
			,'boxed' 	=> 'Boxed'
		)
		,'default'  => 'wide'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
		,'required'	=> array( 'ts_layout_fullwidth', 'equals', '0' )
	)
	
	,array(
		'id'        => 'section-rtl'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Right To Left', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_enable_rtl'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Right To Left', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
	)
	
	,array(
		'id'        => 'section-responsive'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Responsive', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_responsive'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Responsive', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
	)
	
	,array(
		'id'        => 'section-smooth-scroll'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Smooth Scroll', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_smooth_scroll'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Smooth Scroll', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
	)
	
	,array(
		'id'        => 'section-back-to-top-button'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Back To Top Button', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_back_to_top_button'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Back To Top Button', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_back_to_top_button_on_mobile'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Back To Top Button On Mobile', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
	)
	
	,array(
		'id'        => 'section-image-not-found'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Image in 404 page', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_image_not_found'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( '404 Image', 'mymedi' )
		,'desc'     => ''
		,'subtitle' => ''
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	
	,array(
		'id'        => 'section-banner-under-footer'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Banner Under Footer', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_show_banner_footer'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Show Banner Under Footer', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
	)
	,array(
		'id'        => 'ts_banner_image_footer'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Banner Image', 'mymedi' )
		,'desc'     => ''
		,'subtitle' => ''
		,'readonly' => false
		,'default'  => array( 'url' => '' )
		,'required'	=> array( 'ts_show_banner_footer', 'equals', '1' )
	)
	
	,array(
		'id'        => 'section-loading-screen'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Loading Screen', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_loading_screen'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Loading Screen', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
	)
	,array(
		'id'        => 'ts_loading_image'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Loading Image', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $loading_screen_options
		,'default'  => '1'
	)
	,array(
		'id'        => 'ts_custom_loading_image'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Custom Loading Image', 'mymedi' )
		,'desc'     => ''
		,'subtitle' => ''
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'       	=> 'ts_display_loading_screen_in'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Display Loading Screen In', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'all-pages' 		=> esc_html__( 'All Pages', 'mymedi' )
			,'homepage-only' 	=> esc_html__( 'Homepage Only', 'mymedi' )
			,'specific-pages' 	=> esc_html__( 'Specific Pages', 'mymedi' )
		)
		,'default'  => 'all-pages'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_loading_screen_exclude_pages'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Exclude Pages', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'data'     => 'pages'
		,'multi'    => true
		,'default'	=> ''
		,'required'	=> array( 'ts_display_loading_screen_in', 'equals', 'all-pages' )
	)
	,array(
		'id'       	=> 'ts_loading_screen_specific_pages'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Specific Pages', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'data'     => 'pages'
		,'multi'    => true
		,'default'	=> ''
		,'required'	=> array( 'ts_display_loading_screen_in', 'equals', 'specific-pages' )
	)
	
	,array(
		'id'        => 'section-google-map-api'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Google Map API Key', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_gmap_api_key'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Enter Your API Key', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
	)
);

/*** Color Scheme Tab ***/
$option_fields['color-scheme'] = array(
	array(
		'id'          => 'ts_color_scheme'
		,'type'       => 'image_select'
		,'presets'    => true
		,'full_width' => false
		,'title'      => esc_html__( 'Select Color Scheme of Theme', 'mymedi' )
		,'subtitle'   => ''
		,'desc'       => ''
		,'options'    => $preset_colors_options
		,'default'    => 'default'
	)
	,array(
		'id'        => 'section-general-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'General Colors', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'      => 'info-primary-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Primary Colors', 'mymedi' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_primary_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Primary Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#103178'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_text_color_in_bg_primary'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text In Background Primary Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_secondary_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Secondary Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ff9923'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_text_color_in_bg_secondary'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text In Background Secondary Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-main-content-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Main Content Colors', 'mymedi' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_main_content_bg_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Main Content Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#5B6C8F'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_heading_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Heading Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#103178'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_link_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Link Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#103178'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_link_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Link Color Hover', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ff9923'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Border Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#f0f2f5'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_input_bg_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Input Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#f0f2f5'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'        => 'section-button-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Button Colors', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_custom_button_style'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Custom Main Button Style', 'mymedi' )
		,'subtitle' => esc_html__('If this options is off, button will be used Secondary Color', 'mymedi' )
		,'default'  => false
	)
	,array(
		'id'       => 'ts_button_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ff9923'
			,'alpha'	=> 1
		)
		,'required'	=> array( 'ts_custom_button_style', 'equals', '1' )
	)
	,array(
		'id'       => 'ts_button_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Text Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
		,'required'	=> array( 'ts_custom_button_style', 'equals', '1' )
	)
	,array(
		'id'       => 'ts_button_background_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Hover Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> 'transparent'
			,'alpha'	=> 0
			,'rgba'		=> 'rgba(255,255,255,0)'
		)
		,'required'	=> array( 'ts_custom_button_style', 'equals', '1' )
	)
	,array(
		'id'       => 'ts_button_text_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Hover Text Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ff9923'
			,'alpha'	=> 1
		)
		,'required'	=> array( 'ts_custom_button_style', 'equals', '1' )
	)
	,array(
		'id'        => 'section-header-icon-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Header Icon Colors', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_custom_header_icons_color'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Custom Header Icon Colors', 'mymedi' )
		,'subtitle' => esc_html__('If this options is off, icons will be used Secondary Color', 'mymedi' )
		,'default'  => false
	)
	,array(
		'id'       => 'ts_header_icon_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Icons Color', 'mymedi' )
		,'subtitle' => esc_html__( 'Not available on header text light', 'mymedi' )
		,'default'  => array(
			'color' 	=> '#ff9923'
			,'alpha'	=> 1
		)
		,'required'	=> array( 'ts_custom_header_icons_color', 'equals', '1' )
	)
	,array(
		'id'       => 'ts_header_icon_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Icons Color Hover', 'mymedi' )
		,'subtitle' => esc_html__( 'Not available on header text light', 'mymedi' )
		,'default'  => array(
			'color' 	=> '#103178'
			,'alpha'	=> 1
		)
		,'required'	=> array( 'ts_custom_header_icons_color', 'equals', '1' )
	)
	,array(
		'id'       => 'ts_header_count_number_bg_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header cart/wishlist count background color', 'mymedi' )
		,'subtitle' => esc_html__( 'Not available on header layout 5 and header text light', 'mymedi' )
		,'default'  => array(
			'color' 	=> '#103178'
			,'alpha'	=> 1
		)
		,'required'	=> array( 'ts_custom_header_icons_color', 'equals', '1' )
	)
	,array(
		'id'       => 'ts_header_count_number_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header cart/wishlist count text color', 'mymedi' )
		,'subtitle' => esc_html__( 'Not available on header layout 5 and header text light', 'mymedi' )
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
		,'required'	=> array( 'ts_custom_header_icons_color', 'equals', '1' )
	)
	,array(
		'id'        => 'section-store-notice'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Store Notice', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_notice_bg_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Notice Light Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_notice_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Notice Light Text Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#103178'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_notice_dark_bg_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Notice Dark Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#103178'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_notice_dark_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Notice Dark Text Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ff9923'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'        => 'section-header-light'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Header Light', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_top_header_bg_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Top Header Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_top_header_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Top Header Text Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#5B6C8F'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_top_header_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Top Header Border Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#d9dee8'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_middle_header_bg_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Middle Header Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_middle_header_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Middle Header Text Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#5B6C8F'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_middle_header_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Middle Header Border Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#d9dee8'
			,'alpha'	=> 1
		)
	)	
	,array(
		'id'       => 'ts_bottom_header_bg_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Bottom Header Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_bottom_header_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Bottom Header Text Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#5B6C8F'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_bottom_header_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Bottom Header Border Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#d9dee8'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_menu_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Light Menu Text Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#284686'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'        => 'section-header-dark'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Header Dark', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_top_header_dark_bg_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Top Dark Header Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#103178'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_top_header_dark_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Top Dark Header Text Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_top_header_dark_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Top Dark Header Border Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#284686'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_middle_header_dark_bg_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Middle Dark Header Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#103178'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_middle_header_dark_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Middle Dark Header Text Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_middle_header_dark_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Middle Dark Header Border Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#284686'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_bottom_header_dark_bg_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Bottom Dark Header Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#103178'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_bottom_header_dark_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Bottom Dark Header Text Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#9BABCD'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_bottom_header_dark_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Bottom Dark Header Border Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#284686'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_dark_menu_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Dark Menu Text Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#284686'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'        => 'section-product-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Colors', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_product_del_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Sale Price Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#9BABCD'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_rating_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Rating Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#cfd6e4'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_rating_fill_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Rating Fill Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ff9923'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_group_product_icon_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Group Icon On Thumbnail Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#f0f2f5'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_group_product_icon_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Group Icon On Thumbnail Text Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#103178'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_group_product_icon_text_hover_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Group Icon On Thumbnail Text Hover Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ff9923'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_shop_separate_background'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Shop Grid Separate Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#F7F8FA'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_images_summary_background'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Images Summary Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#f0f2f5'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-product-label-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Product Label Colors', 'mymedi' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_product_sale_label_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Sale Label Text Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_sale_label_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Sale Label Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ff9923'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_new_label_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'New Label Text Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_new_label_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'New Label Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#12A05C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_feature_label_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Feature Label Text Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_feature_label_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Feature Label Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#F00000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_outstock_label_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'OutStock Label Text Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_outstock_label_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'OutStock Label Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#d6d8db'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-group-icons-mobile'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Bottom Icons On Mobile', 'mymedi' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_bottom_bar_background'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Bottom Bar Background Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_bottom_bar_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Bottom Bar Border Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#f0f2f5'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_bottom_bar_icon_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Bottom Bar Icon Color', 'mymedi' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ff9923'
			,'alpha'	=> 1
		)
	)
);

/*** Typography Tab ***/
$option_fields['typography'] = array(
	array(
		'id'        => 'section-fonts'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Fonts', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       			=> 'ts_body_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Body Font', 'mymedi' )
		,'subtitle' 		=> ''
		,'google'   		=> true
		,'font-style'   	=> true
		,'text-align'   	=> false
		,'color'   			=> false
		,'letter-spacing' 	=> false
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Jost'
			,'font-weight' 		=> '400'
			,'font-size'   		=> '16px'
			,'line-height' 		=> '26px'
			,'font-style'   	=> ''
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_body_font_medium'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Body Font Medium', 'mymedi' )
		,'subtitle' 		=> ''
		,'google'   		=> true
		,'font-style'   	=> true
		,'text-align'   	=> false
		,'line-height'  	=> false
		,'font-size'  		=> false
		,'letter-spacing' 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Jost'
			,'font-weight' 		=> '500'
			,'font-style'   	=> ''
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_body_font_semi_bold'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Body Font Semi Bold', 'mymedi' )
		,'subtitle' 		=> ''
		,'google'   		=> true
		,'font-style'   	=> true
		,'text-align'   	=> false
		,'line-height'  	=> false
		,'font-size'  		=> false
		,'letter-spacing' 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Jost'
			,'font-weight' 		=> '600'
			,'font-style'   	=> ''
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_body_font_bold'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Body Font Bold', 'mymedi' )
		,'subtitle' 		=> ''
		,'google'   		=> true
		,'font-style'   	=> true
		,'text-align'   	=> false
		,'line-height'  	=> false
		,'font-size'  		=> false
		,'letter-spacing' 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Jost'
			,'font-weight' 		=> '700'
			,'font-style'   	=> ''
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_heading_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Heading Font', 'mymedi' )
		,'subtitle' 		=> ''
		,'google'   		=> true
		,'font-size'    	=> false
		,'font-style'   	=> true
		,'text-align'   	=> false
		,'line-height'  	=> false
		,'color'   			=> false
		,'letter-spacing' 	=> false
		,'preview'			=> array('always_display' => true)
		,'default'  			=> array(
			'font-family'  		=> 'Jost'
			,'font-weight' 		=> '600'
			,'font-style'   	=> ''
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_menu_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Menu Font', 'mymedi' )
		,'subtitle' 		=> ''
		,'google'   		=> true
		,'font-style'   	=> true
		,'text-align'   	=> false
		,'color'   			=> false
		,'letter-spacing' 	=> false
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Jost'
			,'font-weight' 		=> '500'
			,'font-size'   		=> '17px'
			,'line-height' 		=> '24px'
			,'font-style'   	=> ''
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_sub_menu_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Sub Menu Font', 'mymedi' )
		,'subtitle' 		=> ''
		,'google'   		=> true
		,'font-style'   	=> true
		,'text-align'   	=> false
		,'color'   			=> false
		,'letter-spacing' 	=> false
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Jost'
			,'font-weight' 		=> '400'
			,'font-size'   		=> '16px'
			,'line-height' 		=> '24px'
			,'font-style'   	=> ''
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'        => 'section-custom-font'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Custom Font', 'mymedi' )
		,'subtitle' => esc_html__( 'If you get the error message \'Sorry, this file type is not permitted for security reasons\', you can add this line define(\'ALLOW_UNFILTERED_UPLOADS\', true); to the wp-config.php file', 'mymedi' )
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_custom_font_ttf'
		,'type'     => 'media'
		,'url'      => true
		,'preview'  => false
		,'title'    => esc_html__( 'Custom Font ttf', 'mymedi' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Upload the .ttf font file. To use it, you select CustomFont in the Standard Fonts group', 'mymedi' )
		,'default'  => array( 'url' => '' )
		,'mode'		=> 'application'
	)
	
	,array(
		'id'        => 'section-font-sizes'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Font Sizes', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'      => 'info-font-size-pc'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Font size', 'mymedi' )
		,'desc'   => ''
	)
	,array(
		'id'       			=> 'ts_h1_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H1 Font Size', 'mymedi' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'letter-spacing'  	=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  => ''
			,'font-weight' => ''
			,'font-size'   => '40px'
			,'line-height' => '50px'
			,'google'	   => false
		)
	)
	,array(
		'id'       			=> 'ts_h2_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H2 Font Size', 'mymedi' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'letter-spacing'  	=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  => ''
			,'font-weight' => ''
			,'font-size'   => '30px'
			,'line-height' => '40px'
			,'google'	   => false
		)
	)
	,array(
		'id'       			=> 'ts_h3_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H3 Font Size', 'mymedi' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'letter-spacing'  	=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  => ''
			,'font-weight' => ''
			,'font-size'   => '24px'
			,'line-height' => '30px'
			,'google'	   => false
		)
	)
	,array(
		'id'       			=> 'ts_h4_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H4 Font Size', 'mymedi' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'letter-spacing'  	=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  => ''
			,'font-weight' => ''
			,'font-size'   => '21px'
			,'line-height' => '24px'
			,'google'	   => false
		)
	)
	,array(
		'id'       			=> 'ts_h5_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H5 Font Size', 'mymedi' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'letter-spacing'  	=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight'		=> ''
			,'font-size'   		=> '18px'
			,'line-height' 		=> '26px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_h6_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H6 Font Size', 'mymedi' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'letter-spacing'  	=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  => ''
			,'font-weight' => ''
			,'font-size'   => '16px'
			,'line-height' => '26px'
			,'google'	   => false
		)
	)
	,array(
		'id'       			=> 'ts_button_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Button/Input Font Size', 'mymedi' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'line-height'   	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '18px'
			,'line-height' 		=> ''
			,'google'	   		=> false
		)
	)
	,array(
		'id'      => 'info-font-size-ipad'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Tablet/Phone Font Size', 'mymedi' )
		,'desc'   => ''
	)
	,array(
		'id'       		=> 'ts_h1_ipad_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H1 Font Size', 'mymedi' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'text-align'   => false
		,'color'   		=> false
		,'preview'		=> array('always_display' => false)
		,'default'  	=> array(
			'font-family'  => ''
			,'font-weight' => ''
			,'font-size'   => '30px'
			,'line-height' => '36px'
			,'google'	   => false
		)
	)
	,array(
		'id'       		=> 'ts_h2_ipad_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H2 Font Size', 'mymedi' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'text-align'   => false
		,'color'   		=> false
		,'preview'		=> array('always_display' => false)
		,'default'  	=> array(
			'font-family'  => ''
			,'font-weight' => ''
			,'font-size'   => '26px'
			,'line-height' => '30px'
			,'google'	   => false
		)
	)
	,array(
		'id'       		=> 'ts_h3_ipad_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H3 Font Size', 'mymedi' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'text-align'   => false
		,'color'   		=> false
		,'preview'		=> array('always_display' => false)
		,'default'  	=> array(
			'font-family'  => ''
			,'font-weight' => ''
			,'font-size'   => '22px'
			,'line-height' => '26px'
			,'google'	   => false
		)
	)
	,array(
		'id'       		=> 'ts_h4_ipad_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H4 Font Size', 'mymedi' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'text-align'   => false
		,'color'   		=> false
		,'preview'		=> array('always_display' => false)
		,'default'  	=> array(
			'font-family'  => ''
			,'font-weight' => ''
			,'font-size'   => '19px'
			,'line-height' => '26px'
			,'google'	   => false
		)
	)
	,array(
		'id'       			=> 'ts_button_ipad_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Button/Input Font Size', 'mymedi' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'line-height'   	=> false
		,'color'   			=> false
		,'letter-spacing'  	=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '16px'
			,'google'	   		=> false
		)
	)
);

/*** Header Tab ***/
$option_fields['header'] = array(
	array(
		'id'        => 'section-header-options'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Header Options', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_header_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Header Layout', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $header_layout_options
		,'default'  => 'v1'
	)
	,array(
		'id'        => 'ts_enable_sticky_header'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Sticky Header', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'mymedi' )
		,'off'		=> esc_html__( 'Disable', 'mymedi' )
	)
	,array(
		'id'        => 'ts_header_store_notice'
		,'type'     => 'textarea'
		,'title'    => esc_html__( 'Header Store Notice', 'mymedi' )
		,'subtitle' => esc_html__( 'You can add a notice at the top of page', 'mymedi' )
		,'desc'     => ''
		,'validate' => 'html'
		,'default'  => ''
	)
	,array(
		'id'        => 'ts_header_contact_information'
		,'type'     => 'textarea'
		,'title'    => esc_html__( 'Header Contact Information', 'mymedi' )
		,'subtitle' => esc_html__( 'You can add welcome text, email, phone number...', 'mymedi' )
		,'desc'     => ''
		,'validate' => 'html'
		,'default'  => ''
	)
	,array(
		'id'        => 'ts_header_delivery_message'
		,'type'     => 'textarea'
		,'title'    => esc_html__( 'Header Delivery Message', 'mymedi' )
		,'subtitle' => esc_html__( 'You can add a message about delivery', 'mymedi' )
		,'desc'     => ''
		,'validate' => 'html'
		,'default'  => ''
	)
	,array(
		'id'        => 'ts_enable_tiny_wishlist'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Wishlist', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'mymedi' )
		,'off'		=> esc_html__( 'Disable', 'mymedi' )
	)
	,array(
		'id'        => 'ts_header_currency'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Header Currency', 'mymedi' )
		,'subtitle' => esc_html__( 'If you don\'t install WooCommerce Multilingual plugin, it will display demo html', 'mymedi' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'mymedi' )
		,'off'		=> esc_html__( 'Disable', 'mymedi' )
	)
	,array(
		'id'        => 'ts_header_language'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Header Language', 'mymedi' )
		,'subtitle' => esc_html__( 'If you don\'t install WPML plugin, it will display demo html', 'mymedi' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'mymedi' )
		,'off'		=> esc_html__( 'Disable', 'mymedi' )
	)
	,array(
		'id'        => 'ts_enable_tiny_account'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'My Account', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'mymedi' )
		,'off'		=> esc_html__( 'Disable', 'mymedi' )
	)
	,array(
		'id'        => 'ts_enable_search'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Search Bar', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'mymedi' )
		,'off'		=> esc_html__( 'Disable', 'mymedi' )
	)
	,array(
		'id'        => 'ts_enable_tiny_shopping_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Shopping Cart', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'mymedi' )
		,'off'		=> esc_html__( 'Disable', 'mymedi' )
	)
	,array(
		'id'        => 'ts_shopping_cart_sidebar'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Shopping Cart Sidebar', 'mymedi' )
		,'subtitle' => esc_html__( 'Show shopping cart in sidebar instead of dropdown. You need to update cart after changing', 'mymedi' )
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'mymedi' )
		,'off'		=> esc_html__( 'Disable', 'mymedi' )
		,'required'	=> array( 'ts_enable_tiny_shopping_cart', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_show_shopping_cart_after_adding'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Show Shopping Cart After Adding Product To Cart', 'mymedi' )
		,'subtitle' => esc_html__( 'You need to enable Ajax add to cart in WooCommerce > Settings > Products', 'mymedi' )
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'mymedi' )
		,'off'		=> esc_html__( 'Disable', 'mymedi' )
		,'required'	=> array( 'ts_shopping_cart_sidebar', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_add_to_cart_effect'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Add To Cart Effect', 'mymedi' )
		,'subtitle' => esc_html__( 'You need to enable Ajax add to cart in WooCommerce > Settings > Products. If "Show Shopping Cart After Adding Product To Cart" is enabled, this option will be disabled', 'mymedi' )
		,'options'  => array(
			''				=> esc_html__( 'None', 'mymedi' )
			,'fly_to_cart'	=> esc_html__( 'Fly To Cart', 'mymedi' )
			,'show_popup'	=> esc_html__( 'Show Popup', 'mymedi' )
		)
		,'default'  => ''
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_enable_header_product_categories'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Categories', 'mymedi' )
		,'subtitle' => esc_html__( 'Show list of product categories with icon below header. Only available on header layout 4', 'mymedi' )
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'mymedi' )
		,'off'		=> esc_html__( 'Disable', 'mymedi' )
	)
	,array(
		'id'        => 'ts_header_product_categories'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Specific Product Categories', 'mymedi' )
		,'subtitle' => esc_html__( 'If empty, it will query by default', 'mymedi' )
		,'options'  => array()
		,'multi'  	=> true
		,'data'		=> 'terms'
		,'args'		=> array(
			'taxonomy'	=> 'product_cat'
		)
		,'default'  => ''
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
		,'required'	=> array( 'ts_enable_header_product_categories', 'equals', '1' )
	)
	
	,array(
		'id'      => ''
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Social Icons', 'mymedi' )
		,'desc'   => ''
	)
	,array(
		'id'        => 'ts_enable_header_social_icons'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Header Social Icons', 'mymedi' )
		,'subtitle' => esc_html__( 'Some header layouts don\'t include the social icons', 'mymedi' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'mymedi' )
		,'off'		=> esc_html__( 'Disable', 'mymedi' )
	)
	,array(
		'id'        => 'ts_facebook_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Facebook URL', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_instagram_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Instagram URL', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_youtube_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Youtube URL', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_pinterest_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Pinterest URL', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_linkedin_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'LinkedIn URL', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_twitter_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Twitter URL', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_custom_social_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Custom Icon URL', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_custom_social_class'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Custom Icon Class', 'mymedi' )
		,'subtitle' => esc_html__( 'Use Font Awesome 5 Free. Ex: fab fa-facebook-f', 'mymedi' )
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	
	,array(
		'id'        => 'section-breadcrumb-options'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Breadcrumb Options', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_breadcrumb_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Breadcrumb Layout', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $breadcrumb_layout_options
		,'default'  => 'v1'
	)
	,array(
		'id'        => 'ts_enable_breadcrumb_background_image'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Breadcrumbs Background Image', 'mymedi' )
		,'subtitle' => esc_html__( 'You can set background color by going to Color Scheme tab > Breadcrumb Colors section', 'mymedi' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_bg_breadcrumbs'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Breadcrumbs Background Image', 'mymedi' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Select a new image to override the default background image', 'mymedi' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_breadcrumb_bg_parallax'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Breadcrumbs Background Parallax', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
	)
);

/*** Footer Tab ***/
$option_fields['footer'] = array(
	array(
		'id'       	=> 'ts_first_footer_area'
		,'type'     => 'select'
		,'title'    => esc_html__( 'First Footer Area', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $footer_block_options
		,'default'  => '0'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_second_footer_area'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Second Footer Area', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $footer_block_options
		,'default'  => '0'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
);

/*** Menu Tab ***/
$option_fields['menu'] = array(
	array(
		'id'             => 'ts_menu_num_widget'
		,'type'          => 'slider'
		,'title'         => esc_html__( 'Mega Menu Widget Area', 'mymedi' )
		,'subtitle'      => esc_html__( 'Number Of Widget Areas Available', 'mymedi' )
		,'desc'          => esc_html__( 'Min: 1, max: 30, step: 1, default value: 6', 'mymedi' )
		,'default'       => 12
		,'min'           => 1
		,'step'          => 1
		,'max'           => 30
		,'display_value' => 'text'
	)
	,array(
		'id'             => 'ts_menu_thumb_width'
		,'type'          => 'slider'
		,'title'         => esc_html__( 'Menu Thumbnail Width', 'mymedi' )
		,'subtitle'      => ''
		,'desc'          => esc_html__( 'Min: 5, max: 50, step: 1, default value: 46', 'mymedi' )
		,'default'       => 46
		,'min'           => 5
		,'step'          => 1
		,'max'           => 50
		,'display_value' => 'text'
	)
	,array(
		'id'             => 'ts_menu_thumb_height'
		,'type'          => 'slider'
		,'title'         => esc_html__( 'Menu Thumbnail Height', 'mymedi' )
		,'subtitle'      => ''
		,'desc'          => esc_html__( 'Min: 5, max: 50, step: 1, default value: 46', 'mymedi' )
		,'default'       => 46
		,'min'           => 5
		,'step'          => 1
		,'max'           => 50
		,'display_value' => 'text'
	)
);

/*** Blog Tab ***/
$option_fields['blog'] = array(
	array(
		'id'        => 'section-blog'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Blog', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_blog_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Blog Layout', 'mymedi' )
		,'subtitle' => esc_html__( 'This option is available when Front page displays the latest posts', 'mymedi' )
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'mymedi')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'mymedi')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'mymedi')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'mymedi')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '0-1-1'
	)
	,array(
		'id'       	=> 'ts_blog_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_blog_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_blog_columns'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Blog Columns', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			1	=> 1
			,2	=> 2
			,3	=> 3
		)
		,'default'  => '1'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_blog_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Thumbnail', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_date'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Date', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Title', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_author'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Author', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_comment'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Comment', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_read_more'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Read More Button', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_categories'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Categories', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_excerpt'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Excerpt', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_excerpt_strip_tags'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Excerpt Strip All Tags', 'mymedi' )
		,'subtitle' => esc_html__( 'Strip all html tags in Excerpt', 'mymedi' )
		,'default'  => false
	)
	,array(
		'id'        => 'ts_blog_excerpt_max_words'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Blog Excerpt Max Words', 'mymedi' )
		,'subtitle' => esc_html__( 'Input -1 to show full excerpt', 'mymedi' )
		,'desc'     => ''
		,'default'  => '-1'
	)
	,array(
		'id'        => 'ts_blog_banner'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Blog Banner', 'mymedi' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Add a banner between blogs', 'mymedi' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_blog_banner_link'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Blog Banner Link', 'mymedi' )
		,'subtitle' => esc_html__( 'Add link to blog banner', 'mymedi' )
		,'desc'     => ''
		,'default'  => '#'
	)
	
	,array(
		'id'        => 'section-blog-details'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Blog Details', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_blog_details_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Blog Details Layout', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'mymedi')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'mymedi')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'mymedi')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'mymedi')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '0-1-1'
	)
	,array(
		'id'       	=> 'ts_blog_details_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_blog_details_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_blog_details_breadcrumb'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Breadcrumb', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_details_next_prev_navigation'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Next/Prev Navigation', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_details_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Thumbnail', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_details_date'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Date', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_details_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Title', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_details_author'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Author', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_details_comment'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Comment', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_details_content'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Content', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_details_tags'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Tags', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_details_categories'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Categories', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_details_sharing'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Sharing', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_details_sharing_sharethis'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Sharing - Use ShareThis', 'mymedi' )
		,'subtitle' => esc_html__( 'Use share buttons from sharethis.com. You need to add key below', 'mymedi')
		,'default'  => true
		,'required'	=> array( 'ts_blog_details_sharing', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_blog_details_sharing_sharethis_key'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Blog Sharing - ShareThis Key', 'mymedi' )
		,'subtitle' => esc_html__( 'You get it from script code. It is the value of "property" attribute', 'mymedi' )
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_blog_details_sharing', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_blog_details_author_box'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Author Box', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_blog_details_related_posts'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Related Posts', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'       	=> 'ts_blog_details_related_posts_position'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Blog Related Posts Position', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'above_comment'	=> esc_html__( 'Above Comment', 'mymedi' )
			,'below_comment'=> esc_html__( 'Below Comment', 'mymedi' )
		)
		,'default'  => 'below_comment'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_blog_details_related_posts_bg'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Blog Related Posts Background Image', 'mymedi' )
		,'desc'     => ''
		,'subtitle' => ''
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_blog_details_comment_form'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Comment Form', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
);

/*** Portfolio Details Tab ***/
$option_fields['portfolio-details'] = array(
	array(
		'id'       	=> 'ts_portfolio_page'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Portfolio Page', 'mymedi' )
		,'subtitle' => esc_html__( 'Select the page which displays the list of portfolios. You also need to add our portfolio shortcode to that page', 'mymedi' )
		,'desc'     => ''
		,'data'     => 'pages'
		,'default'	=> ''
	)	
	,array(
		'id'       	=> 'ts_portfolio_thumbnail_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Thumbnail Style', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'slider'	=> esc_html__( 'Slider', 'mymedi' )
			,'gallery'	=> esc_html__( 'Gallery', 'mymedi' )
		)
		,'default'	=> 'slider'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_portfolio_details_next_prev_navigation'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Next/Prev Navigation', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_portfolio_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Thumbnail', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_portfolio_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Title', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_portfolio_likes'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Likes', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_portfolio_content'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Content', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_portfolio_client'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Client', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_portfolio_year'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Year', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_portfolio_url'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio URL', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_portfolio_categories'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Categories', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_portfolio_sharing'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Sharing', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_portfolio_related_posts'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Related Posts', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_portfolio_related_bg'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Related Portfolios Background Image', 'mymedi' )
		,'desc'     => ''
		,'subtitle' => ''
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_portfolio_custom_field'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Custom Field', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_portfolio_custom_field_title'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Portfolio Custom Field Title', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Custom Field'
		,'required'	=> array( 'ts_portfolio_custom_field', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_portfolio_custom_field_content'
		,'type'     => 'editor'
		,'title'    => esc_html__( 'Portfolio Custom Field Content', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Custom content goes here'
		,'args'     => array(
			'wpautop'        => false
			,'media_buttons' => false
			,'textarea_rows' => 10
			,'teeny'         => false
			,'quicktags'     => false
		)
		,'required'	=> array( 'ts_portfolio_custom_field', 'equals', '1' )
	)
);

/*** WooCommerce Tab ***/
$option_fields['woocommerce'] = array(
	array(
		'id'        => 'section-product-label'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Label', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       	=> 'ts_product_label_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Label Style', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'circle' 		=> esc_html__( 'Circle', 'mymedi' )
			,'square' 		=> esc_html__( 'Square', 'mymedi' )
			,'rectangle' 	=> esc_html__( 'Rectangle', 'mymedi' )
		)
		,'default'  => 'rectangle'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_product_show_new_label'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product New Label', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_product_new_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product New Label Text', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'New'
		,'required'	=> array( 'ts_product_show_new_label', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_product_show_new_label_time'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product New Label Time', 'mymedi' )
		,'subtitle' => esc_html__( 'Number of days which you want to show New label since product is published', 'mymedi' )
		,'desc'     => ''
		,'default'  => '30'
		,'required'	=> array( 'ts_product_show_new_label', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_product_sale_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Sale Label Text', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Sale'
	)
	,array(
		'id'        => 'ts_product_feature_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Feature Label Text', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Hot'
	)
	,array(
		'id'        => 'ts_product_out_of_stock_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Out Of Stock Label Text', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Sold out'
	)
	,array(
		'id'       	=> 'ts_show_sale_label_as'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Show Sale Label As', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'text' 		=> esc_html__( 'Text', 'mymedi' )
			,'number' 	=> esc_html__( 'Number', 'mymedi' )
			,'percent' 	=> esc_html__( 'Percent', 'mymedi' )
		)
		,'default'  => 'text'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	
	,array(
		'id'        => 'section-product-hover'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Hover', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       	=> 'ts_product_hover_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Hover Style', 'mymedi' )
		,'subtitle' => esc_html__( 'Select the style of buttons/icons when hovering on product', 'mymedi' )
		,'desc'     => ''
		,'options'  => array(
			'style-1' 		=> esc_html__( 'Style 1', 'mymedi' )
			,'style-2' 		=> esc_html__( 'Style 2', 'mymedi' )
			,'style-3' 		=> esc_html__( 'Style 3', 'mymedi' )
			,'style-4' 		=> esc_html__( 'Style 4', 'mymedi' )
			,'style-5' 		=> esc_html__( 'Style 5', 'mymedi' )
			,'style-6' 		=> esc_html__( 'Style 6', 'mymedi' )
		)
		,'default'  => 'style-1'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_effect_product'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Back Product Image', 'mymedi' )
		,'subtitle' => esc_html__( 'Show another product image on hover. It will show an image from Product Gallery', 'mymedi' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_product_tooltip'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Tooltip', 'mymedi' )
		,'subtitle' => esc_html__( 'Show tooltip when hovering on buttons/icons on product', 'mymedi' )
		,'default'  => true
	)
	
	,array(
		'id'        => 'section-lazy-load'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Lazy Load', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_lazy_load'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Activate Lazy Load', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_placeholder_img'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Placeholder Image', 'mymedi' )
		,'desc'     => ''
		,'subtitle' => ''
		,'readonly' => false
		,'default'  => array( 'url' => $product_loading_image )
	)
	
	,array(
		'id'        => 'section-quickshop'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Quickshop', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_enable_quickshop'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Activate Quickshop', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
	)
	
	,array(
		'id'        => 'section-catalog-mode'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Catalog Mode', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_enable_catalog_mode'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Catalog Mode', 'mymedi' )
		,'subtitle' => esc_html__( 'Hide all Add To Cart buttons on your site. You can also hide Shopping cart by going to Header tab > turn Shopping Cart option off', 'mymedi' )
		,'default'  => false
	)
	
	,array(
		'id'        => 'section-ajax-search'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Ajax Search', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_ajax_search'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Ajax Search', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_ajax_search_number_result'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Number Of Results', 'mymedi' )
		,'subtitle' => esc_html__( 'Input -1 to show all results', 'mymedi' )
		,'desc'     => ''
		,'default'  => '4'
	)
);

/*** Shop/Product Category Tab ***/
$option_fields['shop-product-category'] = array(
	array(
		'id'        => 'ts_prod_cat_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Shop/Product Category Layout', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'mymedi')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'mymedi')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'mymedi')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'mymedi')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '0-1-0'
	)
	,array(
		'id'       	=> 'ts_prod_cat_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-category-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_prod_cat_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-category-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_prod_cat_columns'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Columns', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			1	=> 1
			,2	=> 2
			,3	=> 3
			,4	=> 4
		)
		,'default'  => '4'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_cat_columns_selector'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Columns Selector', 'mymedi' )
		,'subtitle' => esc_html__( 'Allow users to select columns on frontend', 'mymedi' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_cat_quantity_input'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Quantity Input', 'mymedi' )
		,'subtitle' => esc_html__( 'Show the quantity input on the list view (one column)', 'mymedi' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_cat_per_page'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Products Per Page', 'mymedi' )
		,'subtitle' => esc_html__( 'Number of products per page', 'mymedi' )
		,'desc'     => ''
		,'default'  => '16'
	)
	,array(
		'id'       	=> 'ts_prod_cat_loading_type'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Loading Type', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'default'	=> esc_html__( 'Default', 'mymedi' )
			,'infinity-scroll'	=> esc_html__( 'Infinity Scroll', 'mymedi' )
			,'load-more-button'	=> esc_html__( 'Load More Button', 'mymedi' )
			,'ajax-pagination'	=> esc_html__( 'Ajax Pagination', 'mymedi' )
		)
		,'default'  => 'load-more-button'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_cat_per_page_dropdown'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Products Per Page Dropdown', 'mymedi' )
		,'subtitle' => esc_html__( 'Allow users to select number of products per page', 'mymedi' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_cat_onsale_checkbox'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Products On Sale Checkbox', 'mymedi' )
		,'subtitle' => esc_html__( 'Allow users to view only the discounted products', 'mymedi' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_filter_widget_area'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Filter Widget Area', 'mymedi' )
		,'subtitle' => esc_html__( 'Shows widgets in Filter Widget Area. If enabled, it will not show the sidebar of the shop/product category page', 'mymedi' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_cat_bestsellers'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Best Selling Products', 'mymedi' )
		,'subtitle' => esc_html__( 'Show best selling products at the top of product category page. It only shows if total products is more than double the maximum best selling products (default is 7)', 'mymedi' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_cat_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Thumbnail', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_cat_label'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Label', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_cat_brand'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Brands', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_cat_cat'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Categories', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_cat_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Title', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_cat_sku'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product SKU', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_cat_rating'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Rating', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_cat_price'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Price', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_cat_add_to_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Add To Cart Button', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_cat_desc'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Short Description', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_cat_desc_words'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Short Description - Limit Words', 'mymedi' )
		,'subtitle' => esc_html__( 'It is also used for product shortcode', 'mymedi' )
		,'desc'     => ''
		,'default'  => '8'
	)
	,array(
		'id'        => 'ts_prod_cat_color_swatch'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Color Swatches', 'mymedi' )
		,'subtitle' => esc_html__( 'Show the color attribute of variations. The slug of the color attribute has to be "color"', 'mymedi' )
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'       	=> 'ts_prod_cat_number_color_swatch'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Number Of Color Swatches', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			2	=> 2
			,3	=> 3
			,4	=> 4
			,5	=> 5
			,6	=> 6
		)
		,'default'  => '3'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
		,'required'	=> array( 'ts_prod_cat_color_swatch', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_cat_bottom_content'
		,'type'     => 'editor'
		,'title'    => esc_html__( 'Bottom Content', 'mymedi' )
		,'subtitle' => esc_html__( 'You can add banner or custom content at the bottom of products', 'mymedi' )
		,'desc'     => ''
		,'default'  => ''
		,'args'     => array(
			'wpautop'        => false
			,'media_buttons' => true
			,'textarea_rows' => 10
			,'teeny'         => false
			,'quicktags'     => false
		)
	)
);

/*** Product Details Tab ***/
$option_fields['product-details'] = array(
	array(
		'id'        => 'ts_prod_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Product Layout', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'mymedi')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'mymedi')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'mymedi')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'mymedi')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '0-1-0'
	)
	,array(
		'id'       	=> 'ts_prod_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_prod_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_prod_layout_fullwidth'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Layout Fullwidth', 'mymedi' )
		,'subtitle' => esc_html__( 'Override the Layout Fullwidth option in the General tab', 'mymedi' )
		,'desc'     => ''
		,'options'  => array(
			'default'	=> esc_html__( 'Default', 'mymedi' )
			,'0'		=> esc_html__( 'No', 'mymedi' )
			,'1'		=> esc_html__( 'Yes', 'mymedi' )
		)
		,'default'  => '1'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_header_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Header Layout Fullwidth', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'required'	=> array( 'ts_prod_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_main_content_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Main Content Layout Fullwidth', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'required'	=> array( 'ts_prod_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_footer_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Footer Layout Fullwidth', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'required'	=> array( 'ts_prod_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_breadcrumb'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Breadcrumb', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_images_summary_background'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Images Summary Background', 'mymedi' )
		,'subtitle' => esc_html__( 'You can change background color in the Color Scheme tab. Not available if product has sidebar', 'mymedi' )
		,'default'  => false
	)
	,array(
		'id'       	=> 'ts_prod_summary_layout'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Summary Layout', 'mymedi' )
		,'subtitle' => esc_html__( 'The 2 Columns layout is not available if product has sidebar', 'mymedi' )
		,'desc'     => ''
		,'options'  => array(
			'default'		=> esc_html__( 'Default', 'mymedi' )
			,'2-columns'	=> esc_html__( '2 Columns', 'mymedi' )
		)
		,'default'  => 'default'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_cloudzoom'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Cloud Zoom', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_lightbox'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Lightbox', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_attr_dropdown'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Attribute Dropdown', 'mymedi' )
		,'subtitle' => esc_html__( 'If you turn it off, the dropdown will be replaced by image or text label', 'mymedi' )
		,'default'  => false
	)
	,array(
		'id'        => 'ts_prod_attr_color_text'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Attribute Color Text', 'mymedi' )
		,'subtitle' => esc_html__( 'Show text for the Color attribute instead of color/color image', 'mymedi' )
		,'default'  => false
		,'required'	=> array( 'ts_prod_attr_dropdown', 'equals', '0' )
	)
	,array(
		'id'        => 'ts_prod_next_prev_navigation'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Next/Prev Product Navigation', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Thumbnail', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_thumbnail_border'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Thumbnail Border', 'mymedi' )
		,'subtitle' => esc_html__( 'Add border to main thumbnail and gallery', 'mymedi' )
		,'default'  => false
		,'required'	=> array( 'ts_prod_thumbnail', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_label'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Label', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Title', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_title_in_content'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Title In Content', 'mymedi' )
		,'subtitle' => esc_html__( 'Display the product title in the page content instead of above the breadcrumbs', 'mymedi' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_rating'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Rating', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_sku'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product SKU', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_availability'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Availability', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_excerpt'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Excerpt', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_count_down'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Count Down', 'mymedi' )
		,'subtitle' => esc_html__( 'You have to activate ThemeSky plugin', 'mymedi' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_price'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Price', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_add_to_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Add To Cart Button', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_ajax_add_to_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Ajax Add To Cart', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'required'	=> array( 'ts_prod_add_to_cart', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_brand'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Brands', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_cat'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Categories', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_tag'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Tags', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_more_less_content'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product More/Less Content', 'mymedi' )
		,'subtitle' => esc_html__( 'Show more/less content in the Description tab', 'mymedi' )
		,'default'  => false
	)
	,array(
		'id'        => 'ts_prod_sharing'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Sharing', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_sharing_sharethis'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Sharing - Use ShareThis', 'mymedi' )
		,'subtitle' => esc_html__( 'Use share buttons from sharethis.com. You need to add key below', 'mymedi' )
		,'default'  => false
		,'required'	=> array( 'ts_prod_sharing', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_sharing_sharethis_key'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Sharing - ShareThis Key', 'mymedi' )
		,'subtitle' => esc_html__( 'You get it from script code. It is the value of "property" attribute', 'mymedi' )
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_prod_sharing', 'equals', '1' )
	)
		
	,array(
		'id'        => 'section-product-tabs'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Tabs', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_tabs'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Tabs', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_tabs_show_content_default'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Show Product Tabs Content By Default', 'mymedi' )
		,'subtitle' => esc_html__( 'Show the content of all tabs by default and hide the tab headings', 'mymedi' )
		,'default'  => false
	)
	,array(
		'id'        => 'ts_prod_accordion_tabs'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Tabs As Accordion', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'required'	=> array( 'ts_prod_tabs_show_content_default', 'equals', '0' )
	)
	,array(
		'id'       	=> 'ts_prod_tabs_position'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Tabs Position', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'after_summary'		=> esc_html__( 'After Summary', 'mymedi' )
			,'inside_summary'	=> esc_html__( 'Inside Summary', 'mymedi' )
		)
		,'default'  => 'after_summary'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
		,'required'	=> array( 'ts_prod_tabs_show_content_default', 'equals', '0' )
	)
	,array(
		'id'        => 'ts_prod_custom_tab'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Custom Tab', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_custom_tab_title'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Custom Tab Title', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
	)
	,array(
		'id'        => 'ts_prod_custom_tab_content'
		,'type'     => 'editor'
		,'title'    => esc_html__( 'Product Custom Tab Content', 'mymedi' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'args'     => array(
			'wpautop'        => false
			,'media_buttons' => true
			,'textarea_rows' => 10
			,'teeny'         => false
			,'quicktags'     => false
		)
	)
	
	,array(
		'id'        => 'section-bestsellers-products'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Best Selling Products', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_bestsellers'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Best Selling Products', 'mymedi' )
		,'subtitle' => esc_html__( 'Show the best selling products based on the categories of the main product', 'mymedi' )
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	
	,array(
		'id'        => 'section-related-up-sell-products'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Related - Up-Sell Products', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_upsells'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Up-Sell Products', 'mymedi' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_related'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Related Products', 'mymedi' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'mymedi' )
		,'off'		=> esc_html__( 'Hide', 'mymedi' )
	)
	,array(
		'id'        => 'ts_prod_related_upsells_bg'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Related Up-Sell Products Background Image', 'mymedi' )
		,'desc'     => ''
		,'subtitle' => ''
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	
	,array(
		'id'        => 'section-product-bottom-content'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Bottom Content', 'mymedi' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_bottom_content'
		,'type'     => 'editor'
		,'title'    => esc_html__( 'Bottom Content', 'mymedi' )
		,'subtitle' => esc_html__( 'You can add banner or custom content at the bottom of the product page', 'mymedi' )
		,'desc'     => ''
		,'default'  => ''
		,'args'     => array(
			'wpautop'        => false
			,'media_buttons' => true
			,'textarea_rows' => 10
			,'teeny'         => false
			,'quicktags'     => false
		)
	)
);

/*** Custom Code Tab ***/
$option_fields['custom-code'] = array(	
	array(
		'id'        => 'ts_custom_css_code'
		,'type'     => 'ace_editor'
		,'title'    => esc_html__( 'Custom CSS Code', 'mymedi' )
		,'subtitle' => ''
		,'mode'     => 'css'
		,'theme'    => 'monokai'
		,'desc'     => ''
		,'default'  => ''
	)
	,array(
		'id'        => 'ts_custom_javascript_code'
		,'type'     => 'ace_editor'
		,'title'    => esc_html__( 'Custom Javascript Code', 'mymedi' )
		,'subtitle' => ''
		,'mode'     => 'javascript'
		,'theme'    => 'monokai'
		,'desc'     => ''
		,'default'  => ''
	)
);