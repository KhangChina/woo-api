<?php 
add_action( 'vc_before_init', 'mymedi_integrate_with_vc' );
function mymedi_integrate_with_vc() {
	
	if( !function_exists('vc_map') ){
		return;
	}

	/********************** Content Shortcodes ***************************/
	/*** TS Heading ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Heading', 'mymedi' ),
		'base' 		=> 'ts_heading',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Heading Size', 'mymedi' )
				,'param_name' 	=> 'size'
				,'admin_label' 	=> true
				,'value' 		=> array(
						'1'				=> '1'
						,'2'			=> '2'
						,'3'			=> '3'
						,'4'			=> '4'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Alignment', 'mymedi' )
				,'param_name' 	=> 'alignment'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Center', 'mymedi')						=>  'heading-center'
							,esc_html__('Left', 'mymedi')						=>  'heading-left'
							,esc_html__('Right', 'mymedi')						=>  'heading-right'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Heading', 'mymedi' )
				,'param_name' 	=> 'text'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Text Style', 'mymedi' )
				,'param_name' 	=> 'text_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'mymedi')			=> 'text-default'
							,esc_html__('Light', 'mymedi')			=> 'text-light'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra Class', 'mymedi' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Button ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Button', 'mymedi' ),
		'base' 		=> 'ts_button',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Text', 'mymedi' )
				,'param_name' 	=> 'content'
				,'admin_label' 	=> true
				,'value' 		=> 'Button text'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link', 'mymedi' )
				,'param_name' 	=> 'link'
				,'admin_label' 	=> true
				,'value' 		=> '#'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Target', 'mymedi' )
				,'param_name' 	=> 'target'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Self', 'mymedi')					=> '_self'
						,esc_html__('New Window Tab', 'mymedi')		=> '_blank'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Add icon', 'mymedi' )
				,'param_name' 	=> 'add_icon'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'iconpicker'
				,'heading' 		=> esc_html__( 'Font icon', 'mymedi' )
				,'param_name' 	=> 'font_icon'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'settings' 	=> array(
					'emptyIcon' 	=> true /* default true, display an "EMPTY" icon? */
					,'iconsPerPage' => 4000 /* default 100, how many icons per/page to display */
				)
				,'description' 	=> esc_html__('Add an icon before the text. Icon library: Font Awesome 5 Free. Ex: fas fa-lock', 'mymedi')
				,'dependency' => array('element' => 'add_icon', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Icon Alignment', 'mymedi' )
				,'param_name' 	=> 'icon_alignment'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Left', 'mymedi')			=> 'icon-left'
						,esc_html__('Right', 'mymedi')		=> 'icon-right'
						)
				,'description' 	=> ''
				,'dependency' => array('element' => 'add_icon', 'value' => '1')
			)			
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Text color', 'mymedi' )
				,'param_name' 	=> 'text_color'
				,'admin_label' 	=> false
				,'value' 		=> '#ff9923'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Text color hover', 'mymedi' )
				,'param_name' 	=> 'text_color_hover'
				,'admin_label' 	=> false
				,'value' 		=> '#ffffff'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Background color', 'mymedi' )
				,'param_name' 	=> 'bg_color'
				,'admin_label' 	=> false
				,'value' 		=> '#ffffff'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Background color hover', 'mymedi' )
				,'param_name' 	=> 'bg_color_hover'
				,'admin_label' 	=> false
				,'value' 		=> '#ff9923'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Border color', 'mymedi' )
				,'param_name' 	=> 'border_color'
				,'admin_label' 	=> false
				,'value' 		=> '#ff9923'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Border color hover', 'mymedi' )
				,'param_name' 	=> 'border_color_hover'
				,'admin_label' 	=> false
				,'value' 		=> '#ff9923'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Border width', 'mymedi' )
				,'param_name' 	=> 'border_width'
				,'admin_label' 	=> false
				,'value' 		=> '1'
				,'description' 	=> esc_html__('In pixels. Ex: 1', 'mymedi')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Border Radius', 'mymedi' )
				,'param_name' 	=> 'border_radius'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> esc_html__('In pixels. Ex: 5', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Button Size', 'mymedi' )
				,'param_name' 	=> 'size'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Small', 'mymedi')		=> 'small'
						,esc_html__('Medium', 'mymedi')		=> 'medium'
						,esc_html__('Large', 'mymedi')		=> 'large'
						,esc_html__('X-Large', 'mymedi')		=> 'x-large'
						)
				,'std' 			=> 'medium'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Button Alignment', 'mymedi' )
				,'param_name' 	=> 'alignment'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Default', 'mymedi')		=> 'btn-inline'
						,esc_html__('Left', 'mymedi')		=> 'ts-alignleft'
						,esc_html__('Center', 'mymedi')		=> 'ts-aligncenter'
						,esc_html__('Right', 'mymedi')		=> 'ts-alignright'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra Class', 'mymedi' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Features ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Feature', 'mymedi' ),
		'base' 		=> 'ts_feature',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'mymedi' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Vertical Icon', 'mymedi')				=>  'vertical-icon'
						,esc_html__('Vertical Image', 'mymedi')				=>  'vertical-image'
						,esc_html__('Horizontal Icon', 'mymedi')			=>  'horizontal-icon'
						,esc_html__('Horizontal Image', 'mymedi')			=>  'horizontal-image'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Icon library', 'mymedi' )
				,'param_name' 	=> 'icon_type'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Font Awesome 5 Free', 'mymedi')		=>  'fontawesome'
						,esc_html__('Open Iconic', 'mymedi')			=>  'openiconic'
						,esc_html__('Typicons', 'mymedi')				=>  'typicons'
						,esc_html__('Entypo', 'mymedi')					=>  'entypo'
						,esc_html__('Linecons', 'mymedi')				=>  'linecons'
						,esc_html__('Material', 'mymedi')				=>  'material'
						)
				,'description' 	=> ''
				,'dependency' => array('element' => 'style', 'value' => array('vertical-icon', 'horizontal-icon'))
			)
			,array(
				'type' 			=> 'iconpicker'
				,'heading' 		=> esc_html__( 'Icon', 'mymedi' )
				,'param_name' 	=> 'icon_fontawesome'
				,'admin_label' 	=> false
				,'value' 		=> 'fa fa-laptop'
				,'settings' 	=> array(
					'emptyIcon' 	=> true
					,'iconsPerPage' => 4000
				)
				,'dependency' => array('element' => 'icon_type', 'value' => 'fontawesome')
			)
			,array(
				'type' 			=> 'iconpicker'
				,'heading' 		=> esc_html__( 'Icon', 'mymedi' )
				,'param_name' 	=> 'icon_openiconic'
				,'admin_label' 	=> false
				,'value' 		=> 'vc-oi vc-oi-dial'
				,'settings' 	=> array(
					'emptyIcon' 	=> true
					,'type' 		=> 'openiconic'
					,'iconsPerPage' => 4000
				)
				,'dependency' => array('element' => 'icon_type', 'value' => 'openiconic')
			)
			,array(
				'type' 			=> 'iconpicker'
				,'heading' 		=> esc_html__( 'Icon', 'mymedi' )
				,'param_name' 	=> 'icon_typicons'
				,'admin_label' 	=> false
				,'value' 		=> 'typcn typcn-adjust-brightness'
				,'settings' 	=> array(
					'emptyIcon' 	=> true
					,'type' 		=> 'typicons'
					,'iconsPerPage' => 4000
				)
				,'dependency' => array('element' => 'icon_type', 'value' => 'typicons')
			)
			,array(
				'type' 			=> 'iconpicker'
				,'heading' 		=> esc_html__( 'Icon', 'mymedi' )
				,'param_name' 	=> 'icon_entypo'
				,'admin_label' 	=> false
				,'value' 		=> 'entypo-icon entypo-icon-note'
				,'settings' 	=> array(
					'emptyIcon' 	=> true
					,'type' 		=> 'entypo'
					,'iconsPerPage' => 4000
				)
				,'dependency' => array('element' => 'icon_type', 'value' => 'entypo')
			)
			,array(
				'type' 			=> 'iconpicker'
				,'heading' 		=> esc_html__( 'Icon', 'mymedi' )
				,'param_name' 	=> 'icon_linecons'
				,'admin_label' 	=> false
				,'value' 		=> 'vc_li vc_li-heart'
				,'settings' 	=> array(
					'emptyIcon' 	=> true
					,'type' 		=> 'linecons'
					,'iconsPerPage' => 4000
				)
				,'dependency' => array('element' => 'icon_type', 'value' => 'linecons')
			)
			,array(
				'type' 			=> 'iconpicker'
				,'heading' 		=> esc_html__( 'Icon', 'mymedi' )
				,'param_name' 	=> 'icon_material'
				,'admin_label' 	=> false
				,'value' 		=> 'vc-material vc-material-cake'
				,'settings' 	=> array(
					'emptyIcon' 	=> true
					,'type' 		=> 'material'
					,'iconsPerPage' => 4000
				)
				,'dependency' => array('element' => 'icon_type', 'value' => 'material')
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Icon Color', 'mymedi' )
				,'param_name' 	=> 'icon_color'
				,'admin_label' 	=> false
				,'value' 		=> '#5B6C8F'
				,'description' 	=> ''
				,'dependency' => array('element' => 'style', 'value' => array('horizontal-icon', 'vertical-icon'))
			)
			,array(
				'type' 			=> 'attach_image'
				,'heading' 		=> esc_html__( 'Image', 'mymedi' )
				,'param_name' 	=> 'img_id'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
				,'dependency' => array('element' => 'style', 'value' => array('vertical-image', 'horizontal-image'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Image URL', 'mymedi' )
				,'param_name' 	=> 'img_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> esc_html__('Input external URL instead of image from library', 'mymedi')
				,'dependency' => array('element' => 'style', 'value' => array('vertical-image', 'horizontal-image'))
			)
			,array(
				'type' 			=> 'textarea'
				,'heading' 		=> esc_html__( 'Feature Title', 'mymedi' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textarea'
				,'heading' 		=> esc_html__( 'Feature Sub Title', 'mymedi' )
				,'param_name' 	=> 'sub_title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
				,'dependency' => array('element' => 'style', 'value' => array('vertical-icon', 'vertical-image'))
			)
			,array(
				'type' 			=> 'textarea'
				,'heading' 		=> esc_html__( 'Short Description', 'mymedi' )
				,'param_name' 	=> 'excerpt'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Image Radius', 'mymedi' )
				,'param_name' 	=> 'image_radius'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
						)
				,'description' 	=> ''
				,'dependency' => array('element' => 'style', 'value' => array('vertical-image'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link', 'mymedi' )
				,'param_name' 	=> 'link'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Target', 'mymedi' )
				,'param_name' 	=> 'target'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('New Window Tab', 'mymedi')		=>  '_blank'
						,esc_html__('Self', 'mymedi')				=>  '_self'	
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Text Style', 'mymedi' )
				,'param_name' 	=> 'text_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'mymedi')			=> 'text-default'
							,esc_html__('Light', 'mymedi')			=> 'text-light'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra class', 'mymedi' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Image Box ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Image Box', 'mymedi' ),
		'base' 		=> 'ts_image_box',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'attach_image'
				,'heading' 		=> esc_html__( 'Image', 'mymedi' )
				,'param_name' 	=> 'img_id'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Image URL', 'mymedi' )
				,'param_name' 	=> 'img_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> esc_html__('Input external URL instead of image from library', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Image Position', 'mymedi' )
				,'param_name' 	=> 'image_position'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Left', 'mymedi')			=> 'image-left'
							,esc_html__('Right', 'mymedi')			=> 'image-right'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Title', 'mymedi' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textarea'
				,'heading' 		=> esc_html__( 'Short description', 'mymedi' )
				,'param_name' 	=> 'description'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Button text', 'mymedi' )
				,'param_name' 	=> 'button_text'
				,'admin_label' 	=> true
				,'value' 		=> 'shop now'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link', 'mymedi' )
				,'param_name' 	=> 'link'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Target', 'mymedi' )
				,'param_name' 	=> 'target'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('New Window Tab', 'mymedi')	=>  '_blank'
						,esc_html__('Self', 'mymedi')				=>  '_self'	
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra class', 'mymedi' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Social Icons ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Social Icons', 'mymedi' ),
		'base' 		=> 'ts_social',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Facebook URL', 'mymedi' )
				,'param_name' 	=> 'facebook_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Instagram URL', 'mymedi' )
				,'param_name' 	=> 'instagram_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Youtube URL', 'mymedi' )
				,'param_name' 	=> 'youtube_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Pinterest URL', 'mymedi' )
				,'param_name' 	=> 'pinterest_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'LinkedIn URL', 'mymedi' )
				,'param_name' 	=> 'linkedin_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Twitter URL', 'mymedi' )
				,'param_name' 	=> 'twitter_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)			
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Flickr URL', 'mymedi' )
				,'param_name' 	=> 'flickr_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Vimeo URL', 'mymedi' )
				,'param_name' 	=> 'vimeo_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Viber Number', 'mymedi' )
				,'param_name' 	=> 'viber_number'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Skype Username', 'mymedi' )
				,'param_name' 	=> 'skype_username'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Custom Link', 'mymedi' )
				,'param_name' 	=> 'custom_link'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Custom Text', 'mymedi' )
				,'param_name' 	=> 'custom_text'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'iconpicker'
				,'heading' 		=> esc_html__( 'Custom Icon', 'mymedi' )
				,'param_name' 	=> 'custom_font'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'settings' 	=> array(
					'emptyIcon' 	=> true
					,'iconsPerPage' => 4000
				)
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show Tooltip', 'mymedi' )
				,'param_name' 	=> 'show_tooltip'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')		=> 1
							,esc_html__('No', 'mymedi')		=> 0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra class', 'mymedi' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Mailchimp Subscription ***/
	$mc_forms = mymedi_get_mailchimp_forms();
	$mc_form_option = array('' => '');
	foreach( $mc_forms as $mc_form ){
		$mc_form_option[$mc_form['title']] = $mc_form['id'];
	}
	vc_map( array(
		'name' 		=> esc_html__( 'TS Mailchimp Subscription', 'mymedi' ),
		'base' 		=> 'ts_mailchimp_subscription',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Form', 'mymedi' )
				,'param_name' 	=> 'form'
				,'admin_label' 	=> true
				,'value' 		=> $mc_form_option
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'mymedi' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Default', 'mymedi')					=> ''
							,esc_html__('Vertical Form', 'mymedi')			=> 'form-vertical'
							,esc_html__('Horizontal Center', 'mymedi')		=> 'form-center'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Title', 'mymedi' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Intro Text', 'mymedi' )
				,'param_name' 	=> 'intro_text'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Text Style', 'mymedi' )
				,'param_name' 	=> 'text_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'mymedi')		=> 'text-default'
							,esc_html__('Light', 'mymedi')		=> 'text-light'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra Class', 'mymedi' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Instagram ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Instagram', 'mymedi' ),
		'base' 		=> 'ts_instagram',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Title', 'mymedi' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Username', 'mymedi' )
				,'param_name' 	=> 'username'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Access Token', 'mymedi' )
				,'param_name' 	=> 'access_token'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Number of photos', 'mymedi' )
				,'param_name' 	=> 'number'
				,'admin_label' 	=> true
				,'value' 		=> '6'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Columns', 'mymedi' )
				,'param_name' 	=> 'column'
				,'admin_label' 	=> true
				,'value' 		=> array(
							2	=> 2
							,3	=> 3
							,4	=> 4
							,5	=> 5
							,6	=> 6
							)
				,'description' 	=> ''
				,'std'			=> 6
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Size', 'mymedi' )
				,'param_name' 	=> 'size'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Thumbnail', 'mymedi')		=> 'thumbnail'
							,esc_html__('Small', 'mymedi')		=> 'small'
							,esc_html__('Large', 'mymedi')		=> 'large'
							,esc_html__('Original', 'mymedi')		=> 'original'
							)
				,'description' 	=> ''
				,'std'			=> 'large'
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Target', 'mymedi' )
				,'param_name' 	=> 'target'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Self', 'mymedi')				=> '_self'
							,esc_html__('New window tab', 'mymedi')	=> '_blank'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Cache time (hours)', 'mymedi' )
				,'param_name' 	=> 'cache_time'
				,'admin_label' 	=> false
				,'value' 		=> '12'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'mymedi' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'mymedi' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'mymedi' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
		)
	) );
	
	/*** TS Twitter Slider ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Twitter Slider', 'mymedi' ),
		'base' 		=> 'ts_twitter_slider',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Title', 'mymedi' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Username', 'mymedi' )
				,'param_name' 	=> 'username'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit tweets', 'mymedi' )
				,'param_name' 	=> 'limit'
				,'admin_label' 	=> true
				,'value' 		=> 4
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Exclude Replies', 'mymedi' )
				,'param_name' 	=> 'exclude_replies'
				,'admin_label' 	=> true
				,'value' 		=> array(
								esc_html__('No', 'mymedi')		=> 'false'
								,esc_html__('Yes', 'mymedi')	=> 'true'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Text Color Style', 'mymedi' )
				,'param_name' 	=> 'text_color_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'mymedi')	=> 'text-default'
							,esc_html__('Light', 'mymedi')		=> 'text-light'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'mymedi' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show dot navigation', 'mymedi' )
				,'param_name' 	=> 'show_dots'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
							)
				,'description' 	=> esc_html__('Show dot navigation at the bottom. If it is enabled, the navigation buttons will be removed', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'mymedi' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Cache time (hours)', 'mymedi' )
				,'param_name' 	=> 'cache_time'
				,'admin_label' 	=> true
				,'value' 		=> 12
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Consumer key', 'mymedi' )
				,'param_name' 	=> 'consumer_key'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
				,'group' 		=> esc_html__('API Keys', 'mymedi')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Consumer secret', 'mymedi' )
				,'param_name' 	=> 'consumer_secret'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
				,'group' 		=> esc_html__('API Keys', 'mymedi')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Access token', 'mymedi' )
				,'param_name' 	=> 'access_token'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
				,'group' 		=> esc_html__('API Keys', 'mymedi')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Access token secret', 'mymedi' )
				,'param_name' 	=> 'access_token_secret'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
				,'group' 		=> esc_html__('API Keys', 'mymedi')
			)
		)
	) );
	
	/*** TS Testimonial ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Testimonial', 'mymedi' ),
		'base' 		=> 'ts_testimonial',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'mymedi' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Default', 'mymedi')			=> ''
							,esc_html__('Partial View', 'mymedi')	=> 'partial-view'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Title', 'mymedi' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'attach_image'
				,'heading' 		=> esc_html__( 'Quote Icon', 'mymedi' )
				,'param_name' 	=> 'quote_icon'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'ts_category'
				,'heading' 		=> esc_html__( 'Categories', 'mymedi' )
				,'param_name' 	=> 'categories'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
				,'class'		=> 'ts_testimonial'
			)
			,array(
				'type' 			=> 'textarea'
				,'heading' 		=> esc_html__( 'Testimonial IDs', 'mymedi' )
				,'param_name' 	=> 'ids'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__('A comma separated list of testimonial ids', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Columns', 'mymedi' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> true
				,'value' 		=> array(
							1	=> 1
							,2	=> 2
							,3	=> 3
							,4	=> 4
							,5	=> 5
							)
				,'description' 	=> ''
				,'std'			=> 1
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'mymedi' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> '4'
				,'description' 	=> esc_html__('Number of Posts', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show avatar', 'mymedi' )
				,'param_name' 	=> 'show_avatar'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'mymedi')	=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show name', 'mymedi' )
				,'param_name' 	=> 'show_name'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show Byline', 'mymedi' )
				,'param_name' 	=> 'show_byline'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'mymedi')	=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show rating', 'mymedi' )
				,'param_name' 	=> 'show_rating'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show date', 'mymedi' )
				,'param_name' 	=> 'show_date'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Number of words in excerpt', 'mymedi' )
				,'param_name' 	=> 'excerpt_words'
				,'admin_label' 	=> true
				,'value' 		=> '40'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Quote Background Style', 'mymedi' )
				,'param_name' 	=> 'text_color_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'mymedi')		=> 'quote-default'
							,esc_html__('Light', 'mymedi')		=> 'quote-light'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra Class', 'mymedi' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'mymedi' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show nav', 'mymedi' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')		=> 1
							,esc_html__('No', 'mymedi')		=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show dots', 'mymedi' )
				,'param_name' 	=> 'show_dots'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')		=> 1
							,esc_html__('No', 'mymedi')		=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)				
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'mymedi' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
		)
	) );
	
	/*** TS Single Image ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Single Image', 'mymedi' ),
		'base' 		=> 'ts_single_image',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'attach_image'
				,'heading' 		=> esc_html__( 'Image', 'mymedi' )
				,'param_name' 	=> 'img_id'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Image Size', 'mymedi' )
				,'param_name' 	=> 'img_size'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__( 'Ex: thumbnail, medium, large or full', 'mymedi' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Image URL', 'mymedi' )
				,'param_name' 	=> 'img_url'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__('Input external URL instead of image from library', 'mymedi')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link', 'mymedi' )
				,'param_name' 	=> 'link'
				,'admin_label' 	=> true
				,'value' 		=> '#'
				,'description' 	=> ''
			)			
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link Title', 'mymedi' )
				,'param_name' 	=> 'link_title'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Target', 'mymedi' )
				,'param_name' 	=> 'target'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('New Window Tab', 'mymedi')	=> '_blank'
						,esc_html__('Self', 'mymedi')				=> '_self'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Alignment', 'mymedi' )
				,'param_name' 	=> 'alignment'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Default', 'mymedi')				=> ''
						,esc_html__('Left', 'mymedi')				=> 'ts-alignleft'
						,esc_html__('Center', 'mymedi')				=> 'ts-aligncenter'
						,esc_html__('Right', 'mymedi')				=> 'ts-alignright'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Hover Effect', 'mymedi' )
				,'param_name' 	=> 'style_effect'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Opacity', 'mymedi')					=> 'eff-image-opacity'
						,esc_html__('Zoom In', 'mymedi')					=> 'eff-image-scale'
						,esc_html__('Zoom Out', 'mymedi')				=> 'eff-image-zoom-out'
						,esc_html__('None', 'mymedi')					=> 'no-eff'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Effect Color', 'mymedi' )
				,'param_name' 	=> 'effect_color'
				,'admin_label' 	=> false
				,'value' 		=> '#ffffff'
				,'description' 	=> ''
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'style_effect', 'value' => array('eff-image-opacity'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra Class', 'mymedi' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Image Gallery ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Image Gallery', 'mymedi' ),
		'base' 		=> 'ts_image_gallery',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'attach_images'
				,'heading' 		=> esc_html__( 'Images', 'mymedi' )
				,'param_name' 	=> 'images'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Image size', 'mymedi' )
				,'param_name' 	=> 'image_size'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Thumbnail', 'mymedi')		=> 'thumbnail'
							,esc_html__('Medium', 'mymedi')		=> 'medium'
							,esc_html__('Large', 'mymedi')		=> 'large'
							,esc_html__('Full', 'mymedi')			=> 'full'
						)
				,'description' 	=> esc_html__('You go to Settings > Media to change image size', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Columns', 'mymedi' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> false
				,'value' 		=> array(
							1 	=> 1
							,2 	=> 2
							,3 	=> 3
							,4 	=> 4
							,5 	=> 5
							,6 	=> 6
							)
				,'description' 	=> esc_html__( 'Number of Columns', 'mymedi' )
				,'std'			=> 4
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'On click', 'mymedi' )
				,'param_name' 	=> 'on_click'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('None', 'mymedi')						=> 'none'
							,esc_html__('Open prettyPhoto', 'mymedi')		=> 'prettyphoto'
							,esc_html__('Open custom links', 'mymedi')		=> 'custom_link'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textarea'
				,'heading' 		=> esc_html__( 'Custom links', 'mymedi' )
				,'param_name' 	=> 'custom_links'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> esc_html__('A comma separated list of links. Ex: if you have 3 images, the value of this field should be "link1, link2, link3"', 'mymedi')
				,'dependency'	=> array( 'element' => 'on_click', 'value' => array('custom_link') )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Custom link target', 'mymedi' )
				,'param_name' 	=> 'custom_link_target'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Self', 'mymedi')				=> '_self'
							,esc_html__('New Window Tab', 'mymedi')		=> '_blank'
						)
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'on_click', 'value' => array('custom_link') )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Margin', 'mymedi' )
				,'param_name' 	=> 'margin_class'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('0px', 'mymedi')			=> ''
							,esc_html__('30px', 'mymedi')		=> 'has-margin'
							,esc_html__('10px', 'mymedi')		=> 'has-margin margin-10'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra Class', 'mymedi' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'mymedi' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'mymedi' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=>  1
							,esc_html__('No', 'mymedi')	=>  0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'mymedi' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=>  1
							,esc_html__('No', 'mymedi')	=>  0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Responsive Items', 'mymedi' )
				,'param_name' 	=> 'responsive_items'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=>  1
							,esc_html__('No', 'mymedi')	=>  0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
		)
	) );
	
	/*** TS Logos Slider ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Logos Slider', 'mymedi' ),
		'base' 		=> 'ts_logos_slider',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'mymedi' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> '7'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Rows', 'mymedi' )
				,'param_name' 	=> 'rows'
				,'admin_label' 	=> true
				,'value' 		=> 1
				,'description' 	=> esc_html__( 'Number of Rows', 'mymedi' )
			)
			,array(
				'type' 			=> 'ts_category'
				,'heading' 		=> esc_html__( 'Categories', 'mymedi' )
				,'param_name' 	=> 'categories'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
				,'class'		=> 'ts_logo'
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Activate link', 'mymedi' )
				,'param_name' 	=> 'active_link'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'mymedi' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style navigation', 'mymedi' )
				,'param_name' 	=> 'style_nav'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Default', 'mymedi')		=> 'text-default'
							,esc_html__('Light', 'mymedi')		=> 'text-light'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'mymedi' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Banner ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Banner', 'mymedi' ),
		'base' 		=> 'ts_banner',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'attach_image'
				,'heading' 		=> esc_html__( 'Background Image', 'mymedi' )
				,'param_name' 	=> 'bg_id'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Background Image Url', 'mymedi' )
				,'param_name' 	=> 'bg_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> esc_html__('Input external URL instead of image from library', 'mymedi')
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Background Color', 'mymedi' )
				,'param_name' 	=> 'bg_color'
				,'admin_label' 	=> false
				,'value' 		=> '#ffffff'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textarea'
				,'heading' 		=> esc_html__( 'Heading Text', 'mymedi' )
				,'param_name' 	=> 'heading_title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Heading Text Color', 'mymedi' )
				,'param_name' 	=> 'heading_text_color'
				,'admin_label' 	=> false
				,'value' 		=> '#103178'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Discount Percentage', 'mymedi' )
				,'param_name' 	=> 'discount'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'banner_style', 'value' => array('style-text-center') )
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Discount Percentage Color', 'mymedi' )
				,'param_name' 	=> 'discount_color'
				,'admin_label' 	=> false
				,'value' 		=> '#ff9923'
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'banner_style', 'value' => array('style-text-center') )
			)			
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show Button', 'mymedi' )
				,'param_name' 	=> 'show_button'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')			=>  0
							,esc_html__('Yes', 'mymedi')		=>  1
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Button Text', 'mymedi' )
				,'param_name' 	=> 'button_text'
				,'admin_label' 	=> false
				,'value' 		=> 'Shop now'
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'show_button', 'value' => array('1') )
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Button Background Color', 'mymedi' )
				,'param_name' 	=> 'button_background_color'
				,'admin_label' 	=> false
				,'value' 		=> '#103178'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Button Text Color', 'mymedi' )
				,'param_name' 	=> 'button_text_color'
				,'admin_label' 	=> false
				,'value' 		=> '#ffffff'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Banner Text Position', 'mymedi' )
				,'param_name' 	=> 'content_position'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Left Top', 'mymedi')			=>  'left-top'
						,esc_html__('Left Bottom', 'mymedi')		=>  'left-bottom'
						,esc_html__('Left Center', 'mymedi')		=>  'left-center'
						,esc_html__('Right Top', 'mymedi')		=>  'right-top'
						,esc_html__('Right Bottom', 'mymedi')	=>  'right-bottom'
						,esc_html__('Right Center', 'mymedi')	=>  'right-center'
						,esc_html__('Center Top', 'mymedi')		=>  'center-top'
						,esc_html__('Center Bottom', 'mymedi')	=>  'center-bottom'
						,esc_html__('Center Center', 'mymedi')	=>  'center-center'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link', 'mymedi' )
				,'param_name' 	=> 'link'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link Title', 'mymedi' )
				,'param_name' 	=> 'link_title'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Target', 'mymedi' )
				,'param_name' 	=> 'target'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('New Window Tab', 'mymedi')		=>  '_blank'
							,esc_html__('Self', 'mymedi')				=>  '_self'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Banner Radius', 'mymedi' )
				,'param_name' 	=> 'image_radius'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Hover Effect', 'mymedi' )
				,'param_name' 	=> 'style_effect'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Opacity', 'mymedi')					=> 'eff-image-opacity'
						,esc_html__('Zoom In', 'mymedi')				=> 'eff-image-scale'
						,esc_html__('Zoom Out', 'mymedi')				=> 'eff-image-zoom-out'
						,esc_html__('None', 'mymedi')					=> 'no-eff'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Effect Color', 'mymedi' )
				,'param_name' 	=> 'effect_color'
				,'admin_label' 	=> false
				,'value' 		=> '#ffffff'
				,'description' 	=> ''
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'style_effect', 'value' => array('eff-image-opacity'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra Class', 'mymedi' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Banner 2 ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Banner 2', 'mymedi' ),
		'base' 		=> 'ts_banner_image',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'attach_image'
				,'heading' 		=> esc_html__( 'Background Image', 'mymedi' )
				,'param_name' 	=> 'img_bg_id'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Background Image URL', 'mymedi' )
				,'param_name' 	=> 'img_bg_url'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__('Input external URL instead of image from library', 'mymedi')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Background Image Size', 'mymedi' )
				,'param_name' 	=> 'img_size'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__( 'Ex: thumbnail, medium, large or full', 'mymedi' )
			)
			,array(
				'type' 			=> 'attach_image'
				,'heading' 		=> esc_html__( 'Image Text', 'mymedi' )
				,'param_name' 	=> 'img_text_id'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__('Display this image before, after or over the main image', 'mymedi')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Image Text URL', 'mymedi' )
				,'param_name' 	=> 'img_text_url'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__('Input external URL instead of image from library', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Image Text Position', 'mymedi' )
				,'param_name' 	=> 'img_text_position'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Left Top', 'mymedi')			=>  'left-top'
						,esc_html__('Left Bottom', 'mymedi')		=>  'left-bottom'
						,esc_html__('Left Center', 'mymedi')		=>  'left-center'
						,esc_html__('Right Top', 'mymedi')		=>  'right-top'
						,esc_html__('Right Bottom', 'mymedi')		=>  'right-bottom'
						,esc_html__('Right Center', 'mymedi')		=>  'right-center'
						,esc_html__('Center Top', 'mymedi')		=>  'center-top'
						,esc_html__('Center Bottom', 'mymedi')	=>  'center-bottom'
						,esc_html__('Center Center', 'mymedi')	=>  'center-center'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Banner Radius', 'mymedi' )
				,'param_name' 	=> 'image_radius'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link', 'mymedi' )
				,'param_name' 	=> 'link'
				,'admin_label' 	=> true
				,'value' 		=> '#'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link Title', 'mymedi' )
				,'param_name' 	=> 'link_title'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Target', 'mymedi' )
				,'param_name' 	=> 'target'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('New Window Tab', 'mymedi')	=> '_blank'
						,esc_html__('Self', 'mymedi')			=> '_self'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Hover Effect', 'mymedi' )
				,'param_name' 	=> 'style_effect'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Opacity', 'mymedi')					=> 'eff-image-opacity'
						,esc_html__('Zoom In', 'mymedi')				=> 'eff-image-scale'
						,esc_html__('Zoom Out', 'mymedi')				=> 'eff-image-zoom-out'
						,esc_html__('None', 'mymedi')					=> 'no-eff'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Effect Color', 'mymedi' )
				,'param_name' 	=> 'effect_color'
				,'admin_label' 	=> false
				,'value' 		=> '#ffffff'
				,'description' 	=> ''
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'style_effect', 'value' => array('eff-image-opacity'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra Class', 'mymedi' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Blogs ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Blogs', 'mymedi' ),
		'base' 		=> 'ts_blogs',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Title', 'mymedi' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'mymedi' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Default', 'mymedi')			=> 'default'
							,esc_html__('Absolute', 'mymedi')		=> 'absolute'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Layout', 'mymedi' )
				,'param_name' 	=> 'layout'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Grid', 'mymedi')			=> 'grid'
							,esc_html__('Slider', 'mymedi')		=> 'slider'
							,esc_html__('Masonry', 'mymedi')		=> 'masonry'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Columns', 'mymedi' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> true
				,'value' 		=> array(
							'1'				=> '1'
							,'2'			=> '2'
							,'3'			=> '3'
							,'4'			=> '4'
							)
				,'description' 	=> esc_html__( 'Number of Columns', 'mymedi' )
				,'std'			=> '3'
				,'dependency'	=> array( 'element' => 'layout', 'value' => array('grid', 'slider', 'masonry') )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'mymedi' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 12
				,'description' 	=> esc_html__( 'Number of Posts', 'mymedi' )
				,'dependency'	=> array( 'element' => 'layout', 'value' => array('grid', 'slider', 'masonry') )
			)
			,array(
				'type' 			=> 'ts_category'
				,'heading' 		=> esc_html__( 'Categories', 'mymedi' )
				,'param_name' 	=> 'categories'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
				,'class'		=> 'post_cat'
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Order by', 'mymedi' )
				,'param_name' 	=> 'orderby'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('None', 'mymedi')		=> 'none'
						,esc_html__('ID', 'mymedi')		=> 'ID'
						,esc_html__('Date', 'mymedi')		=> 'date'
						,esc_html__('Name', 'mymedi')		=> 'name'
						,esc_html__('Title', 'mymedi')	=> 'title'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Order', 'mymedi' )
				,'param_name' 	=> 'order'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Descending', 'mymedi')	=> 'DESC'
						,esc_html__('Ascending', 'mymedi')	=> 'ASC'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show post title', 'mymedi' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show thumbnail', 'mymedi' )
				,'param_name' 	=> 'show_thumbnail'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show author', 'mymedi' )
				,'param_name' 	=> 'show_author'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show Categories', 'mymedi' )
				,'param_name' 	=> 'show_categories'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')	=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show Tags', 'mymedi' )
				,'param_name' 	=> 'show_tags'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show comment', 'mymedi' )
				,'param_name' 	=> 'show_comment'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')	=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show date', 'mymedi' )
				,'param_name' 	=> 'show_date'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show post excerpt', 'mymedi' )
				,'param_name' 	=> 'show_excerpt'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')	=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show read more button', 'mymedi' )
				,'param_name' 	=> 'show_readmore'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')	=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Number of words in excerpt', 'mymedi' )
				,'param_name' 	=> 'excerpt_words'
				,'admin_label' 	=> false
				,'value' 		=> 20
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show load more button', 'mymedi' )
				,'param_name' 	=> 'show_load_more'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')	=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
							)
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'layout', 'value' => array('grid', 'masonry') )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Load more button text', 'mymedi' )
				,'param_name' 	=> 'load_more_text'
				,'admin_label' 	=> false
				,'value' 		=> 'LOAD MORE'
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'layout', 'value' => array('grid', 'masonry') )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra class', 'mymedi' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'mymedi' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')	=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'mymedi' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')	=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
		)
	) );
	
	/*** TS Video ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Video', 'mymedi' ),
		'base' 		=> 'ts_video_2',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Video Url', 'mymedi' )
				,'param_name' 	=> 'video_url'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__('Enter a Youtube, Vimeo or hosted video url', 'mymedi')
			)
			,array(
				'type' 			=> 'attach_image'
				,'heading' 		=> esc_html__( 'Placeholder Image', 'mymedi' )
				,'param_name' 	=> 'placeholder_image_id'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Placeholder Image Url', 'mymedi' )
				,'param_name' 	=> 'placeholder_image_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> esc_html__('Input external URL instead of image from library', 'mymedi')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra_class', 'mymedi' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Portfolio ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Portfolio', 'mymedi' ),
		'base' 		=> 'ts_portfolio',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Columns', 'mymedi' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> true
				,'value' 		=> array(
							'2'		=> '2'
							,'3'	=> '3'
							,'4'	=> '4'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'mymedi' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 8
				,'description' 	=> esc_html__('Number of Posts', 'mymedi')
			)
			,array(
				'type' 			=> 'ts_category'
				,'heading' 		=> esc_html__( 'Categories', 'mymedi' )
				,'param_name' 	=> 'categories'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
				,'class'		=> 'ts_portfolio'
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Order by', 'mymedi' )
				,'param_name' 	=> 'orderby'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('None', 'mymedi')		=> 'none'
							,esc_html__('ID', 'mymedi')		=> 'ID'
							,esc_html__('Date', 'mymedi')		=> 'date'
							,esc_html__('Name', 'mymedi')		=> 'name'
							,esc_html__('Title', 'mymedi')	=> 'title'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Order', 'mymedi' )
				,'param_name' 	=> 'order'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Descending', 'mymedi')	=> 'DESC'
							,esc_html__('Ascending', 'mymedi')	=> 'ASC'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show portfolio title', 'mymedi' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=>  1
							,esc_html__('No', 'mymedi')	=>  0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show categories', 'mymedi' )
				,'param_name' 	=> 'show_categories'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=>  1
							,esc_html__('No', 'mymedi')	=>  0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show like icon', 'mymedi' )
				,'param_name' 	=> 'show_like_icon'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=>  1
							,esc_html__('No', 'mymedi')	=>  0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show link icon', 'mymedi' )
				,'param_name' 	=> 'show_link_icon'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=>  1
							,esc_html__('No', 'mymedi')	=>  0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show filter bar', 'mymedi' )
				,'param_name' 	=> 'show_filter_bar'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=>  1
							,esc_html__('No', 'mymedi')	=>  0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show load more button', 'mymedi' )
				,'param_name' 	=> 'show_load_more'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=>  1
							,esc_html__('No', 'mymedi')	=>  0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Load more button text', 'mymedi' )
				,'param_name' 	=> 'load_more_text'
				,'admin_label' 	=> false
				,'value' 		=> 'LOAD MORE'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'mymedi' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'mymedi')	=>  0
							,esc_html__('Yes', 'mymedi')	=>  1
						)
				,'description' 	=> esc_html__('If slider is enabled, the filter bar and load more button will be removed', 'mymedi')
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Title', 'mymedi' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'mymedi' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=>  1
							,esc_html__('No', 'mymedi')	=>  0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'mymedi' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=>  1
							,esc_html__('No', 'mymedi')	=>  0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
		)
	) );
	
	/*** TS Price Table ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Price Table', 'mymedi' ),
		'base' 		=> 'ts_price_table',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'mymedi' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Style 1', 'mymedi')		=> 'style-1'
							,esc_html__('Style 2', 'mymedi')		=> 'style-2'
							,esc_html__('Style 3', 'mymedi')		=> 'style-3'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Title Table', 'mymedi' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Color Scheme', 'mymedi' )
				,'param_name' 	=> 'color_scheme'
				,'admin_label' 	=> false
				,'value' 		=> '#ff9923'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Price', 'mymedi' )
				,'param_name' 	=> 'price'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Currency', 'mymedi' )
				,'param_name' 	=> 'currency'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'During Price', 'mymedi' )
				,'param_name' 	=> 'during_price'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__('Ex: /day, /mon, /year', 'mymedi')
			)
			,array(
				'type' 			=> 'textarea'
				,'heading' 		=> esc_html__( 'Description', 'mymedi' )
				,'param_name' 	=> 'description'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Button text', 'mymedi' )
				,'param_name' 	=> 'button_text'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link', 'mymedi' )
				,'param_name' 	=> 'link'
				,'admin_label' 	=> false
				,'value' 		=> '#'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Active Table', 'mymedi' )
				,'param_name' 	=> 'active_table'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
						)
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Team Members ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Team Members', 'mymedi' ),
		'base' 		=> 'ts_team_members',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Number of members', 'mymedi' )
				,'param_name' 	=> 'limit'
				,'admin_label' 	=> true
				,'value' 		=> 6
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Include these members', 'mymedi' )
				,'param_name' 	=> 'ids'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> false
					,'unique_values' 	=> true
				)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Columns', 'mymedi' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> true
				,'value' 		=> array(
							'1'				=> '1'
							,'2'			=> '2'
							,'3'			=> '3'
							,'4'			=> '4'
							,'5'			=> '5'
							,'6'			=> '6'
							)
				,'description' 	=> esc_html__( 'Number of Columns. 5 columns is not available on the Grid layout', 'mymedi' )
				,'std'			=> '3'
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Target', 'mymedi' )
				,'param_name' 	=> 'target'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('New Window Tab', 'mymedi')	=> '_blank'
						,esc_html__('Self', 'mymedi')			=> '_self'	
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'mymedi' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=>  0
							,esc_html__('Yes', 'mymedi')		=>  1
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'mymedi' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'mymedi' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
		)
	) );
	
	/*** TS Milestone ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Milestone', 'mymedi' ),
		'base' 		=> 'ts_milestone',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Number', 'mymedi' )
				,'param_name' 	=> 'number'
				,'admin_label' 	=> true
				,'value' 		=> '0'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Plus Icon', 'mymedi' )
				,'param_name' 	=> 'plus_icon'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Subject', 'mymedi' )
				,'param_name' 	=> 'subject'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Text Color Style', 'mymedi' )
				,'param_name' 	=> 'text_color_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'mymedi')		=> 'text-default'
							,esc_html__('Light', 'mymedi')		=> 'text-light'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra Class', 'mymedi' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Countdown ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Countdown', 'mymedi' ),
		'base' 		=> 'ts_countdown',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Day', 'mymedi' )
				,'param_name' 	=> 'day'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Month', 'mymedi' )
				,'param_name' 	=> 'month'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Year', 'mymedi' )
				,'param_name' 	=> 'year'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Text Color Style', 'mymedi' )
				,'param_name' 	=> 'text_color_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'mymedi')		=> 'text-default'
							,esc_html__('Light', 'mymedi')		=> 'text-light'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra Class', 'mymedi' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Google Map ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Google Map', 'mymedi' ),
		'base' 		=> 'ts_google_map',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Address', 'mymedi' )
				,'param_name' 	=> 'address'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__('You have to input your API Key in Appearance > Theme Options > General tab', 'mymedi')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Height', 'mymedi' )
				,'param_name' 	=> 'height'
				,'admin_label' 	=> true
				,'value' 		=> 360
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Zoom', 'mymedi' )
				,'param_name' 	=> 'zoom'
				,'admin_label' 	=> true
				,'value' 		=> 12
				,'description' 	=> esc_html__('Input a number between 0 and 22', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Map Type', 'mymedi' )
				,'param_name' 	=> 'map_type'
				,'admin_label' 	=> true
				,'value' 		=> array(
								esc_html__('ROADMAP', 'mymedi')		=> 'ROADMAP'
								,esc_html__('SATELLITE', 'mymedi')	=> 'SATELLITE'
								,esc_html__('HYBRID', 'mymedi')		=> 'HYBRID'
								,esc_html__('TERRAIN', 'mymedi')		=> 'TERRAIN'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Grayscale', 'mymedi' )
				,'param_name' 	=> 'grayscale'
				,'admin_label' 	=> true
				,'value' 		=> array(
								esc_html__('Yes', 'mymedi')		=> 1
								,esc_html__('No', 'mymedi')		=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textarea_html'
				,'heading' 		=> esc_html__( 'Information', 'mymedi' )
				,'param_name' 	=> 'content'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> esc_html__('Display some information over map', 'mymedi')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra Class', 'mymedi' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
		)
	) );
	
	/********************** TS Product Shortcodes ************************/

	/*** TS Products ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Products', 'mymedi' ),
		'base' 		=> 'ts_products',
		'icon' 		=> 'ts_icon_vc_shop',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Title', 'mymedi' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Product type', 'mymedi' )
				,'param_name' 	=> 'product_type'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Recent', 'mymedi')			=> 'recent'
						,esc_html__('Sale', 'mymedi')				=> 'sale'
						,esc_html__('Featured', 'mymedi')			=> 'featured'
						,esc_html__('Best Selling', 'mymedi')		=> 'best_selling'
						,esc_html__('Top Rated', 'mymedi')		=> 'top_rated'
						,esc_html__('Mixed Order', 'mymedi')		=> 'mixed_order'
						)
				,'description' 	=> esc_html__( 'Select type of product', 'mymedi' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Columns', 'mymedi' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> true
				,'value' 		=> 4
				,'description' 	=> esc_html__( 'Number of Columns', 'mymedi' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'mymedi' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 4
				,'description' 	=> esc_html__( 'Number of Products', 'mymedi' )
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product Categories', 'mymedi' )
				,'param_name' 	=> 'product_cats'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product IDs', 'mymedi' )
				,'param_name' 	=> 'ids'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'description' 	=> esc_html__('Enter product name or slug to search', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product image', 'mymedi' )
				,'param_name' 	=> 'show_image'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product name', 'mymedi' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product SKU', 'mymedi' )
				,'param_name' 	=> 'show_sku'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product price', 'mymedi' )
				,'param_name' 	=> 'show_price'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product short description', 'mymedi' )
				,'param_name' 	=> 'show_short_desc'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product rating', 'mymedi' )
				,'param_name' 	=> 'show_rating'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')		=> 1
							,esc_html__('No', 'mymedi')		=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product label', 'mymedi' )
				,'param_name' 	=> 'show_label'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product brands', 'mymedi' )
				,'param_name' 	=> 'show_brand'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product categories', 'mymedi' )
				,'param_name' 	=> 'show_categories'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show add to cart button', 'mymedi' )
				,'param_name' 	=> 'show_add_to_cart'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show color swatches', 'mymedi' )
				,'param_name' 	=> 'show_color_swatch'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> esc_html__( 'Show the color attribute of variations. The slug of the color attribute has to be "color"', 'mymedi' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Number of color swatches', 'mymedi' )
				,'param_name' 	=> 'number_color_swatch'
				,'admin_label' 	=> false
				,'value' 		=> array(
							2		=> 2
							,3		=> 3
							,4		=> 4
							,5		=> 5
							,6		=> 6
							)
				,'description' 	=> ''
				,'std'			=> 3
				,'dependency' 	=> array('element' => 'show_color_swatch', 'value' => array('1'))
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Text Light', 'mymedi' )
				,'param_name' 	=> 'text_light'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Hide Border', 'mymedi' )
				,'param_name' 	=> 'hide_border'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Meta Center', 'mymedi' )
				,'param_name' 	=> 'meta_center'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Shop more button text', 'mymedi' )
				,'param_name' 	=> 'shop_more_text'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Shop more link', 'mymedi' )
				,'param_name' 	=> 'shop_more_link'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra Class', 'mymedi' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'mymedi' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Only show slider on mobile', 'mymedi' )
				,'param_name' 	=> 'only_slider_mobile'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> esc_html__( 'Show Grid on desktop and only enable Slider on mobile', 'mymedi' )
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Row', 'mymedi' )
				,'param_name' 	=> 'rows'
				,'admin_label' 	=> false
				,'value' 		=> array(
								1 	=> 1
								,2 	=> 2
								,3 	=> 3
							)
				,'description' 	=> esc_html__( 'Number of Rows for slider', 'mymedi' )
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show Navigation', 'mymedi' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show Dots', 'mymedi' )
				,'param_name' 	=> 'show_dots'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')	=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'mymedi' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Disable slider responsive', 'mymedi' )
				,'param_name' 	=> 'disable_slider_responsive'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> esc_html__('You should only enable this option when Columns is 1 or 2', 'mymedi')
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
		)
	) );
	
	/*** TS Product Deals ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Product Deals', 'mymedi' ),
		'base' 		=> 'ts_product_deals',
		'icon' 		=> 'ts_icon_vc_shop',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Title', 'mymedi' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Layout', 'mymedi' )
				,'param_name' 	=> 'layout'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Slider', 'mymedi')	=>  'slider'
							,esc_html__('Grid', 'mymedi')		=>  'grid'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Product type', 'mymedi' )
				,'param_name' 	=> 'product_type'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Recent', 'mymedi')			=> 'recent'
						,esc_html__('Featured', 'mymedi')			=> 'featured'
						,esc_html__('Best Selling', 'mymedi')		=> 'best_selling'
						,esc_html__('Top Rated', 'mymedi')		=> 'top_rated'
						,esc_html__('Mixed Order', 'mymedi')		=> 'mixed_order'
						)
				,'description' 	=> esc_html__( 'Select type of product', 'mymedi' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Columns', 'mymedi' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> false
				,'value' 		=> 4
				,'description' 	=> esc_html__( 'Number of Columns', 'mymedi' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'mymedi' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 5
				,'description' 	=> esc_html__( 'Number of Products', 'mymedi' )
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product Categories', 'mymedi' )
				,'param_name' 	=> 'product_cats'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product IDs', 'mymedi' )
				,'param_name' 	=> 'ids'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> false
					,'unique_values' 	=> true
				)
				,'description' 	=> esc_html__('Enter product name or slug to search', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show counter', 'mymedi' )
				,'param_name' 	=> 'show_counter'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> esc_html__( 'Show counter on each product', 'mymedi' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show counter today', 'mymedi' )
				,'param_name' 	=> 'show_counter_today'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
							)
				,'description' 	=> esc_html__( 'Show counter at the top of block. Counter on each product will be hidden', 'mymedi' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product image', 'mymedi' )
				,'param_name' 	=> 'show_image'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product name', 'mymedi' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product SKU', 'mymedi' )
				,'param_name' 	=> 'show_sku'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product price', 'mymedi' )
				,'param_name' 	=> 'show_price'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product short description', 'mymedi' )
				,'param_name' 	=> 'show_short_desc'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product rating', 'mymedi' )
				,'param_name' 	=> 'show_rating'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')		=> 1
							,esc_html__('No', 'mymedi')		=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product label', 'mymedi' )
				,'param_name' 	=> 'show_label'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product sale label as', 'mymedi' )
				,'param_name' 	=> 'show_sale_label_as'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'mymedi')	 => ''
							,esc_html__('Text', 'mymedi')	 => 'text'
							,esc_html__('Number', 'mymedi')	 => 'number'
							,esc_html__('Percent', 'mymedi') => 'percent'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product brands', 'mymedi' )
				,'param_name' 	=> 'show_brand'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product categories', 'mymedi' )
				,'param_name' 	=> 'show_categories'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show add to cart button', 'mymedi' )
				,'param_name' 	=> 'show_add_to_cart'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show stock quantity', 'mymedi' )
				,'param_name' 	=> 'show_stock_quantity'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Shop more button text', 'mymedi' )
				,'param_name' 	=> 'shop_more_text'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Shop more link', 'mymedi' )
				,'param_name' 	=> 'shop_more_link'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'mymedi' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'mymedi' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
		)
	) );
	
	/*** TS Products In Category Tabs ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Products In Category Tabs', 'mymedi' ),
		'base' 		=> 'ts_products_in_category_tabs',
		'icon' 		=> 'ts_icon_vc_shop',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Title', 'mymedi' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product count', 'mymedi' )
				,'param_name' 	=> 'show_product_count'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Product type', 'mymedi' )
				,'param_name' 	=> 'product_type'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Recent', 'mymedi')			=> 'recent'
						,esc_html__('Sale', 'mymedi')			=> 'sale'
						,esc_html__('Featured', 'mymedi')		=> 'featured'
						,esc_html__('Best Selling', 'mymedi')	=> 'best_selling'
						,esc_html__('Top Rated', 'mymedi')		=> 'top_rated'
						,esc_html__('Mixed Order', 'mymedi')		=> 'mixed_order'
						)
				,'description' 	=> esc_html__( 'Select type of product', 'mymedi' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Columns', 'mymedi' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> true
				,'value' 		=> 4
				,'description' 	=> esc_html__( 'Number of Columns', 'mymedi' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'mymedi' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 8
				,'description' 	=> esc_html__( 'Number of Products', 'mymedi' )
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product Categories', 'mymedi' )
				,'param_name' 	=> 'product_cats'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Parent Category', 'mymedi' )
				,'param_name' 	=> 'parent_cat'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> false
					,'sortable' 		=> false
					,'unique_values' 	=> true
				)
				,'description' 	=> esc_html__('Each tab will be a sub category of this category. This option is available when the Product Categories option is empty', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Include children', 'mymedi' )
				,'param_name' 	=> 'include_children'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('No', 'mymedi')		=> 0
						,esc_html__('Yes', 'mymedi')		=> 1
						)
				,'description' 	=> esc_html__( 'Load the products of sub categories in each tab', 'mymedi' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show general tab', 'mymedi' )
				,'param_name' 	=> 'show_general_tab'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> esc_html__('Get products from all categories or sub categories', 'mymedi')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'General tab heading', 'mymedi' )
				,'param_name' 	=> 'general_tab_heading'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'dependency'	=> array( 'element' => 'show_general_tab', 'value' => array('1') )
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Product type of general tab', 'mymedi' )
				,'param_name' 	=> 'product_type_general_tab'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Recent', 'mymedi')			=> 'recent'
						,esc_html__('Sale', 'mymedi')				=> 'sale'
						,esc_html__('Featured', 'mymedi')			=> 'featured'
						,esc_html__('Best Selling', 'mymedi')		=> 'best_selling'
						,esc_html__('Top Rated', 'mymedi')		=> 'top_rated'
						)
				,'dependency'	=> array( 'element' => 'show_general_tab', 'value' => array('1') )
				,'description' 	=> esc_html__( 'Select type of product', 'mymedi' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product image', 'mymedi' )
				,'param_name' 	=> 'show_image'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product name', 'mymedi' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product SKU', 'mymedi' )
				,'param_name' 	=> 'show_sku'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product price', 'mymedi' )
				,'param_name' 	=> 'show_price'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product short description', 'mymedi' )
				,'param_name' 	=> 'show_short_desc'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product rating', 'mymedi' )
				,'param_name' 	=> 'show_rating'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product label', 'mymedi' )
				,'param_name' 	=> 'show_label'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product brands', 'mymedi' )
				,'param_name' 	=> 'show_brand'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product categories', 'mymedi' )
				,'param_name' 	=> 'show_categories'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show add to cart button', 'mymedi' )
				,'param_name' 	=> 'show_add_to_cart'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show color swatches', 'mymedi' )
				,'param_name' 	=> 'show_color_swatch'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> esc_html__( 'Show the color attribute of variations. The slug of the color attribute has to be "color"', 'mymedi' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Number of color swatches', 'mymedi' )
				,'param_name' 	=> 'number_color_swatch'
				,'admin_label' 	=> false
				,'value' 		=> array(
							2		=> 2
							,3		=> 3
							,4		=> 4
							,5		=> 5
							,6		=> 6
							)
				,'description' 	=> ''
				,'std'			=> 3
				,'dependency' 	=> array('element' => 'show_color_swatch', 'value' => array('1'))
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show shop more button', 'mymedi' )
				,'param_name' 	=> 'show_shop_more_button'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show shop more button in general tab', 'mymedi' )
				,'param_name' 	=> 'show_shop_more_general_tab'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Shop more button label', 'mymedi' )
				,'param_name' 	=> 'shop_more_button_text'
				,'admin_label' 	=> true
				,'value' 		=> 'Shop more'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra Class', 'mymedi' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'mymedi' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Only show slider on mobile', 'mymedi' )
				,'param_name' 	=> 'only_slider_mobile'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> esc_html__( 'Show Grid on desktop and only enable Slider on mobile', 'mymedi' )
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Rows', 'mymedi' )
				,'param_name' 	=> 'rows'
				,'admin_label' 	=> true
				,'value' 		=> array(
						'1'			=> '1'
						,'2'		=> '2'
						)
				,'description' 	=> esc_html__( 'Number of Rows in slider', 'mymedi' )
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'mymedi' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show dot navigation', 'mymedi' )
				,'param_name' 	=> 'show_dots'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> esc_html__('Show dot navigation at the bottom. If it is enabled, the navigation buttons will be removed', 'mymedi')
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'mymedi' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
		)
	) );
	
	/*** TS Products In Product Type Tabs ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Products In Product Type Tabs', 'mymedi' ),
		'base' 		=> 'ts_products_in_product_type_tabs',
		'icon' 		=> 'ts_icon_vc_shop',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Title', 'mymedi' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 1', 'mymedi' )
				,'param_name' 	=> 'tab_1'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Tab 1 heading', 'mymedi' )
				,'param_name' 	=> 'tab_1_heading'
				,'admin_label' 	=> false
				,'value' 		=> 'Featured'
				,'description' 	=> ''
				,'dependency' => array('element' => 'tab_1', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 1 product type', 'mymedi' )
				,'param_name' 	=> 'tab_1_product_type'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Recent', 'mymedi')			=> 'recent'
						,esc_html__('Sale', 'mymedi')				=> 'sale'
						,esc_html__('Featured', 'mymedi')			=> 'featured'
						,esc_html__('Best Selling', 'mymedi')		=> 'best_selling'
						,esc_html__('Top Rated', 'mymedi')		=> 'top_rated'
						,esc_html__('Mixed Order', 'mymedi')		=> 'mixed_order'
						)
				,'std'			=> 'featured'
				,'dependency' 	=> array('element' => 'tab_1', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 2', 'mymedi' )
				,'param_name' 	=> 'tab_2'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Tab 2 heading', 'mymedi' )
				,'param_name' 	=> 'tab_2_heading'
				,'admin_label' 	=> false
				,'value' 		=> 'Best Selling'
				,'description' 	=> ''
				,'dependency' => array('element' => 'tab_2', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 2 product type', 'mymedi' )
				,'param_name' 	=> 'tab_2_product_type'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Recent', 'mymedi')			=> 'recent'
						,esc_html__('Sale', 'mymedi')				=> 'sale'
						,esc_html__('Featured', 'mymedi')			=> 'featured'
						,esc_html__('Best Selling', 'mymedi')		=> 'best_selling'
						,esc_html__('Top Rated', 'mymedi')		=> 'top_rated'
						,esc_html__('Mixed Order', 'mymedi')		=> 'mixed_order'
						)
				,'std'			=> 'best_selling'
				,'dependency' 	=> array('element' => 'tab_2', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 3', 'mymedi' )
				,'param_name' 	=> 'tab_3'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Tab 3 heading', 'mymedi' )
				,'param_name' 	=> 'tab_3_heading'
				,'admin_label' 	=> false
				,'value' 		=> 'On Sale'
				,'description' 	=> ''
				,'dependency' => array('element' => 'tab_3', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 3 product type', 'mymedi' )
				,'param_name' 	=> 'tab_3_product_type'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Recent', 'mymedi')			=> 'recent'
						,esc_html__('Sale', 'mymedi')				=> 'sale'
						,esc_html__('Featured', 'mymedi')			=> 'featured'
						,esc_html__('Best Selling', 'mymedi')		=> 'best_selling'
						,esc_html__('Top Rated', 'mymedi')		=> 'top_rated'
						,esc_html__('Mixed Order', 'mymedi')		=> 'mixed_order'
						)
				,'std'			=> 'sale'
				,'dependency' 	=> array('element' => 'tab_3', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 4', 'mymedi' )
				,'param_name' 	=> 'tab_4'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Tab 4 heading', 'mymedi' )
				,'param_name' 	=> 'tab_4_heading'
				,'admin_label' 	=> false
				,'value' 		=> 'Top Rated'
				,'description' 	=> ''
				,'dependency' => array('element' => 'tab_4', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 4 product type', 'mymedi' )
				,'param_name' 	=> 'tab_4_product_type'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Recent', 'mymedi')			=> 'recent'
						,esc_html__('Sale', 'mymedi')				=> 'sale'
						,esc_html__('Featured', 'mymedi')			=> 'featured'
						,esc_html__('Best Selling', 'mymedi')		=> 'best_selling'
						,esc_html__('Top Rated', 'mymedi')		=> 'top_rated'
						,esc_html__('Mixed Order', 'mymedi')		=> 'mixed_order'
						)
				,'std'			=> 'top_rated'
				,'dependency' 	=> array('element' => 'tab_4', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 5', 'mymedi' )
				,'param_name' 	=> 'tab_5'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Tab 5 heading', 'mymedi' )
				,'param_name' 	=> 'tab_5_heading'
				,'admin_label' 	=> false
				,'value' 		=> 'Recent'
				,'description' 	=> ''
				,'dependency' => array('element' => 'tab_5', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 5 product type', 'mymedi' )
				,'param_name' 	=> 'tab_5_product_type'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Recent', 'mymedi')			=> 'recent'
						,esc_html__('Sale', 'mymedi')				=> 'sale'
						,esc_html__('Featured', 'mymedi')			=> 'featured'
						,esc_html__('Best Selling', 'mymedi')		=> 'best_selling'
						,esc_html__('Top Rated', 'mymedi')		=> 'top_rated'
						,esc_html__('Mixed Order', 'mymedi')		=> 'mixed_order'
						)
				,'std'			=> 'recent'
				,'dependency' 	=> array('element' => 'tab_5', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Active tab', 'mymedi' )
				,'param_name' 	=> 'active_tab'
				,'admin_label' 	=> false
				,'value' 		=> array(
						1		=> 1
						,2		=> 2
						,3		=> 3
						,4		=> 4
						,5		=> 5
						)
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Item layout', 'mymedi' )
				,'param_name' 	=> 'item_layout'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Grid', 'mymedi')	=> 'grid'
							,esc_html__('List', 'mymedi')	=> 'list'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Columns', 'mymedi' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> true
				,'value' 		=> 4
				,'description' 	=> esc_html__( 'Number of Columns', 'mymedi' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'mymedi' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 6
				,'description' 	=> esc_html__( 'Number of Products', 'mymedi' )
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product Categories', 'mymedi' )
				,'param_name' 	=> 'product_cats'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product image', 'mymedi' )
				,'param_name' 	=> 'show_image'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product name', 'mymedi' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product SKU', 'mymedi' )
				,'param_name' 	=> 'show_sku'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product price', 'mymedi' )
				,'param_name' 	=> 'show_price'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product short description', 'mymedi' )
				,'param_name' 	=> 'show_short_desc'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product rating', 'mymedi' )
				,'param_name' 	=> 'show_rating'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product label', 'mymedi' )
				,'param_name' 	=> 'show_label'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product brands', 'mymedi' )
				,'param_name' 	=> 'show_brand'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product categories', 'mymedi' )
				,'param_name' 	=> 'show_categories'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show add to cart button', 'mymedi' )
				,'param_name' 	=> 'show_add_to_cart'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show color swatches', 'mymedi' )
				,'param_name' 	=> 'show_color_swatch'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> esc_html__( 'Show the color attribute of variations. The slug of the color attribute has to be "color"', 'mymedi' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Number of color swatches', 'mymedi' )
				,'param_name' 	=> 'number_color_swatch'
				,'admin_label' 	=> false
				,'value' 		=> array(
							2		=> 2
							,3		=> 3
							,4		=> 4
							,5		=> 5
							,6		=> 6
							)
				,'description' 	=> ''
				,'std'			=> 3
				,'dependency' 	=> array('element' => 'show_color_swatch', 'value' => array('1'))
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'mymedi' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__( 'Slider Options', 'mymedi' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Only show slider on mobile', 'mymedi' )
				,'param_name' 	=> 'only_slider_mobile'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> esc_html__( 'Show Grid on desktop and only enable Slider on mobile', 'mymedi' )
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Rows', 'mymedi' )
				,'param_name' 	=> 'rows'
				,'admin_label' 	=> true
				,'value' 		=> array(
						'1'			=> '1'
						,'2'		=> '2'
						)
				,'description' 	=> esc_html__( 'Number of Rows in slider', 'mymedi' )
				,'group'		=> esc_html__( 'Slider Options', 'mymedi' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'mymedi' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__( 'Slider Options', 'mymedi' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show dots', 'mymedi' )
				,'param_name' 	=> 'show_dots'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
							)
				,'description' 	=> esc_html__('Show dot navigation at the bottom. If it is enabled, the navigation buttons will be removed', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'mymedi' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__( 'Slider Options', 'mymedi' )
			)
		)
	) );
	
	/*** TS Products Widget ***/
	vc_map( array(
		'name' 			=> esc_html__( 'TS Products Widget', 'mymedi' ),
		'base' 			=> 'ts_products_widget',
		'icon' 			=> 'ts_icon_vc_shop',
		'class' 		=> '',
		'description' 	=> '',
		'category' 		=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 		=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Title', 'mymedi' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Product type', 'mymedi' )
				,'param_name' 	=> 'product_type'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Recent', 'mymedi')				=> 'recent'
						,esc_html__('Sale', 'mymedi')				=> 'sale'
						,esc_html__('Featured', 'mymedi')			=> 'featured'
						,esc_html__('Best Selling', 'mymedi')		=> 'best_selling'
						,esc_html__('Top Rated', 'mymedi')			=> 'top_rated'
						,esc_html__('Mixed Order', 'mymedi')			=> 'mixed_order'
						)
				,'description' 	=> esc_html__( 'Select type of product', 'mymedi' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'mymedi' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 6
				,'description' 	=> esc_html__( 'Number of Products', 'mymedi' )
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product Categories', 'mymedi' )
				,'param_name' 	=> 'product_cats'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product image', 'mymedi' )
				,'param_name' 	=> 'show_image'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product name', 'mymedi' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product price', 'mymedi' )
				,'param_name' 	=> 'show_price'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product rating', 'mymedi' )
				,'param_name' 	=> 'show_rating'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product categories', 'mymedi' )
				,'param_name' 	=> 'show_categories'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'mymedi' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Row', 'mymedi' )
				,'param_name' 	=> 'rows'
				,'admin_label' 	=> false
				,'value' 		=> 3
				,'description' 	=> esc_html__( 'Number of Rows for slider', 'mymedi' )
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'mymedi' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'mymedi' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
		)
	) );
	
	/*** TS Product Brands ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Product Brands', 'mymedi' ),
		'base' 		=> 'ts_product_brands',
		'icon' 		=> 'ts_icon_vc_shop',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Columns', 'mymedi' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> false
				,'value' 		=> array(
							1	=> 1
							,2	=> 2
							,3	=> 3
							,4	=> 4
							,5	=> 5
							,6	=> 6
							)
				,'description' 	=> esc_html__( 'Number of Columns', 'mymedi' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'mymedi' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 6
				,'description' 	=> esc_html__( 'Number of Product Brands', 'mymedi' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Only display the first level', 'mymedi' )
				,'param_name' 	=> 'first_level'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Hide empty product brands', 'mymedi' )
				,'param_name' 	=> 'hide_empty'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product brand title', 'mymedi' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product count', 'mymedi' )
				,'param_name' 	=> 'show_product_count'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'mymedi' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')		=> 1
							,esc_html__('No', 'mymedi')		=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Use logo\'s settings', 'mymedi' )
				,'param_name' 	=> 'use_logo_setting'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> esc_html__( 'If enabled, you go to Logos > Settings to configure image size and slider responsive', 'mymedi' )
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'mymedi' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'mymedi' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
		)
	) );
	
	/*** TS Product Categories ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Product Categories', 'mymedi' ),
		'base' 		=> 'ts_product_categories',
		'icon' 		=> 'ts_icon_vc_shop',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Title', 'mymedi' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'mymedi' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'mymedi')				=> 'default'
							,esc_html__('Icon', 'mymedi')				=> 'icon'
							,esc_html__('Icon Horizontal', 'mymedi')	=> 'icon-horizontal'
							,esc_html__('Icon Background', 'mymedi') 	=> 'icon-background'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Columns', 'mymedi' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> true
				,'value' 		=> 4
				,'description' 	=> esc_html__( 'Number of Columns', 'mymedi' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'mymedi' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 5
				,'description' 	=> esc_html__( 'Number of Product Categories', 'mymedi' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Only display the first level', 'mymedi' )
				,'param_name' 	=> 'first_level'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Parent', 'mymedi' )
				,'param_name' 	=> 'parent'
				,'admin_label' 	=> true
				,'settings' => array(
					'multiple' 			=> false
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'value' 		=> ''
				,'description' 	=> esc_html__( 'Select a category. Get direct children of this category', 'mymedi' )
				,'dependency' 	=> array('element' => 'first_level', 'value' => array('0'))
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Child Of', 'mymedi' )
				,'param_name' 	=> 'child_of'
				,'admin_label' 	=> true
				,'settings' => array(
					'multiple' 			=> false
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'value' 		=> ''
				,'description' 	=> esc_html__( 'Select a category. Get all descendents of this category', 'mymedi' )
				,'dependency' 	=> array('element' => 'first_level', 'value' => array('0'))
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product Categories', 'mymedi' )
				,'param_name' 	=> 'ids'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'description' 	=> esc_html__('Include these categories', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Hide empty product categories', 'mymedi' )
				,'param_name' 	=> 'hide_empty'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Item auto width', 'mymedi' )
				,'param_name' 	=> 'item_auto_width'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> esc_html__( 'Used only for the Grid layout. If enabled, the width of item depends on the category thumbnail', 'mymedi' )
				,'dependency' 	=> array('element' => 'style', 'value' => array('default'))
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Item background color', 'mymedi' )
				,'param_name' 	=> 'item_background_color'
				,'admin_label' 	=> false
				,'value' 		=> '#f0f2f5'
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'style', 'value' => array('default'))
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product category title', 'mymedi' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product count', 'mymedi' )
				,'param_name' 	=> 'show_product_count'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Shop more button text', 'mymedi' )
				,'param_name' 	=> 'view_shop_button_text'
				,'admin_label' 	=> false
				,'description' 	=> ''
				,'value' 		=> ''
				,'dependency' 	=> array('element' => 'style', 'value' => array('default'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Show all button text', 'mymedi' )
				,'param_name' 	=> 'show_all_button_text'
				,'admin_label' 	=> false
				,'description' 	=> ''
				,'value' 		=> ''
				,'dependency' 	=> array('element' => 'style', 'value' => array('icon', 'icon-background'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Show all button link', 'mymedi' )
				,'param_name' 	=> 'show_all_button_link'
				,'admin_label' 	=> false
				,'description' 	=> ''
				,'value' 		=> ''
				,'dependency' 	=> array('element' => 'style', 'value' => array('icon', 'icon-background'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra Class', 'mymedi' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'mymedi' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'mymedi')		=> 0
							,esc_html__('Yes', 'mymedi')		=> 1
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'mymedi' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'mymedi' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'mymedi')
			)
		)
	) );
	
	/*** TS List Of Product Categories ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS List Of Product Categories', 'mymedi' ),
		'base' 		=> 'ts_list_of_product_categories',
		'icon' 		=> 'ts_icon_vc_shop',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'mymedi'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Block title', 'mymedi' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Parent Category', 'mymedi' )
				,'param_name' 	=> 'parent'
				,'admin_label' 	=> true
				,'settings' => array(
					'multiple' 			=> false
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'value' 		=> ''
				,'description' 	=> esc_html__( 'Display children of this category', 'mymedi' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Direct child categories', 'mymedi' )
				,'param_name' 	=> 'direct_child'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> esc_html__('Only display direct children of Parent Category', 'mymedi')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Include Parent Category', 'mymedi' )
				,'param_name' 	=> 'include_parent'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> esc_html__('Show Parent Category at the top of list', 'mymedi')
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__('Product categories', 'mymedi')
				,'param_name' 	=> 'ids'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'description' 	=> esc_html__('Include these categories. If you select a Parent Category, you will only be able to include the child categories of Parent Category', 'mymedi')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'mymedi' )
				,'param_name' 	=> 'limit'
				,'admin_label' 	=> true
				,'value' 		=> 8
				,'description' 	=> esc_html__( 'Number of product categories', 'mymedi' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Hide empty product categories', 'mymedi' )
				,'param_name' 	=> 'hide_empty'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'mymedi')	=> 1
							,esc_html__('No', 'mymedi')	=> 0
							)
				,'description' 	=> ''
			)
		)
	) );
}

/*** Add Shortcode Param ***/
WpbakeryShortcodeParams::addField('ts_category', 'mymedi_product_catgories_shortcode_param');
if( !function_exists('mymedi_product_catgories_shortcode_param') ){
	function mymedi_product_catgories_shortcode_param($settings, $value){
		$categories = mymedi_get_list_categories_shortcode_param(0, $settings);
		$arr_value = explode(',', $value);
		ob_start();
		?>
		<input type="hidden" class="wpb_vc_param_value wpb-textinput product_cats textfield ts-hidden-selected-categories" name="<?php echo esc_attr($settings['param_name']); ?>" value="<?php echo esc_attr($value); ?>" />
		<div class="categorydiv">
			<div class="tabs-panel">
				<ul class="categorychecklist">
					<?php foreach($categories as $cat){ ?>
					<li>
						<label>
							<input type="checkbox" class="checkbox ts-select-category" value="<?php echo esc_attr($cat->term_id); ?>" <?php echo (in_array($cat->term_id, $arr_value))?'checked':''; ?> />
							<?php echo esc_html($cat->name); ?>
						</label>
						<?php mymedi_get_list_sub_categories_shortcode_param($cat->term_id, $arr_value, $settings); ?>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<script type="text/javascript">
			jQuery('.ts-select-category').bind('change', function(){
				"use strict";
				
				var selected = jQuery('.ts-select-category:checked');
				jQuery('.ts-hidden-selected-categories').val('');
				var selected_id = new Array();
				selected.each(function(index, ele){
					selected_id.push(jQuery(ele).val());
				});
				selected_id = selected_id.join(',');
				jQuery('.ts-hidden-selected-categories').val(selected_id);
			});
		</script>
		<?php
		return ob_get_clean();
	}
}

if( !function_exists('mymedi_get_list_categories_shortcode_param') ){
	function mymedi_get_list_categories_shortcode_param( $cat_parent_id, $settings ){
		$taxonomy = 'product_cat';
		if( isset($settings['class']) ){
			if( $settings['class'] == 'post_cat' ){
				$taxonomy = 'category';
			}
			if( $settings['class'] == 'ts_testimonial' ){
				$taxonomy = 'ts_testimonial_cat';
			}
			if( $settings['class'] == 'ts_portfolio' ){
				$taxonomy = 'ts_portfolio_cat';
			}
			if( $settings['class'] == 'ts_logo' ){
				$taxonomy = 'ts_logo_cat';
			}
			if( $settings['class'] == 'tribe_events_cat' ){
				$taxonomy = 'tribe_events_cat';
			}
		}
		
		$args = array(
				'taxonomy' 			=> $taxonomy
				,'hierarchical'		=> 1
				,'hide_empty'		=> 0
				,'parent'			=> $cat_parent_id
				,'title_li'			=> ''
				,'child_of'			=> 0
			);
		$cats = get_categories($args);
		return $cats;
	}
}

if( !function_exists('mymedi_get_list_sub_categories_shortcode_param') ){
	function mymedi_get_list_sub_categories_shortcode_param( $cat_parent_id, $arr_value, $settings ){
		$sub_categories = mymedi_get_list_categories_shortcode_param($cat_parent_id, $settings); 
		if( count($sub_categories) > 0){
		?>
			<ul class="children">
				<?php foreach( $sub_categories as $sub_cat ){ ?>
					<li>
						<label>
							<input type="checkbox" class="checkbox ts-select-category" value="<?php echo esc_attr($sub_cat->term_id); ?>" <?php echo (in_array($sub_cat->term_id, $arr_value))?'checked':''; ?> />
							<?php echo esc_html($sub_cat->name); ?>
						</label>
						<?php mymedi_get_list_sub_categories_shortcode_param($sub_cat->term_id, $arr_value, $settings); ?>
					</li>
				<?php } ?>
			</ul>
		<?php }
	}
}

function mymedi_team_member_autocomplete_suggester( $query ){
	$args = array(
			'post_type'				=> 'ts_team'
			,'post_status'			=> 'publish'
			,'posts_per_page'		=> -1
			,'s'					=> $query
			);
	$results = array();
	$teams = new WP_Query($args);
	if( !empty( $teams->posts ) && is_array( $teams->posts ) ){
		foreach( $teams->posts as $p ){
			$data = array();
			$data['value'] = $p->ID;
			$data['label'] = esc_html__( 'ID', 'mymedi' ) . ': ' . $p->ID . ( ( strlen( $p->post_title ) > 0 ) ? ' - ' . esc_html__( 'Name', 'mymedi' ) . ': ' . $p->post_title : '' );
			$results[] = $data;
		}
	}
	return $results;
}

function mymedi_team_member_autocomplete_render( $query ){
	$query = trim( $query['value'] );
	if ( ! empty( $query ) ) {
		
		$args = array(
			'post_type'				=> 'ts_team'
			,'post_status'			=> 'publish'
			,'posts_per_page'		=> 1
			,'p'					=> (int) $query
			);
		$teams = new WP_Query($args);
		if( isset($teams->post) ){
			$team = $teams->post;
			
			$team_id_display = esc_html__( 'ID', 'mymedi' ) . ': ' . $team->ID;
			$team_title_display = '';
			if ( ! empty( $team->post_title ) ) {
				$team_title_display = ' - ' . esc_html__( 'Name', 'mymedi' ) . ': ' . $team->post_title;
			}
			
			$data = array();
			$data['value'] = $team->ID;
			$data['label'] = $team_id_display . $team_title_display;

			wp_reset_postdata();
			
			return $data;
		}
		return false;
	}
	return false;
}

if( class_exists('Vc_Vendor_Woocommerce') ){
	$vc_woo_vendor = new Vc_Vendor_Woocommerce();

	/* autocomplete callback */
	add_filter( 'vc_autocomplete_ts_products_ids_callback', array($vc_woo_vendor, 'productIdAutocompleteSuggester') );
	add_filter( 'vc_autocomplete_ts_products_ids_render', array($vc_woo_vendor, 'productIdAutocompleteRender') );
	
	add_filter( 'vc_autocomplete_ts_product_deals_ids_callback', array($vc_woo_vendor, 'productIdAutocompleteSuggester') );
	add_filter( 'vc_autocomplete_ts_product_deals_ids_render', array($vc_woo_vendor, 'productIdAutocompleteRender') );
	
	add_filter( 'vc_autocomplete_ts_team_members_ids_callback', 'mymedi_team_member_autocomplete_suggester' );
	add_filter( 'vc_autocomplete_ts_team_members_ids_render', 'mymedi_team_member_autocomplete_render' );
	
	$shortcode_field_cats = array();
	$shortcode_field_cats[] = array('ts_products', 'product_cats');
	$shortcode_field_cats[] = array('ts_products_widget', 'product_cats');
	$shortcode_field_cats[] = array('ts_product_deals', 'product_cats');
	$shortcode_field_cats[] = array('ts_products_in_category_tabs', 'product_cats');
	$shortcode_field_cats[] = array('ts_products_in_category_tabs', 'parent_cat');
	$shortcode_field_cats[] = array('ts_products_in_product_type_tabs', 'product_cats');
	$shortcode_field_cats[] = array('ts_product_categories', 'parent');
	$shortcode_field_cats[] = array('ts_product_categories', 'child_of');
	$shortcode_field_cats[] = array('ts_product_categories', 'ids');
	$shortcode_field_cats[] = array('ts_list_of_product_categories', 'parent');
	$shortcode_field_cats[] = array('ts_list_of_product_categories', 'ids');
		
	foreach( $shortcode_field_cats as $shortcode_field ){
		add_filter( 'vc_autocomplete_'.$shortcode_field[0].'_'.$shortcode_field[1].'_callback', array($vc_woo_vendor, 'productCategoryCategoryAutocompleteSuggester') );
		add_filter( 'vc_autocomplete_'.$shortcode_field[0].'_'.$shortcode_field[1].'_render', array($vc_woo_vendor, 'productCategoryCategoryRenderByIdExact') );
	}
}
?>