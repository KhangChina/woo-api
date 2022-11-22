<?php 
$options = array();
$default_sidebars = function_exists('mymedi_get_list_sidebars')? mymedi_get_list_sidebars(): array();
$sidebar_options = array(
				'0'	=> esc_html__('Default', 'themesky')
				);
foreach( $default_sidebars as $key => $_sidebar ){
	$sidebar_options[$_sidebar['id']] = $_sidebar['name'];
}

if( class_exists('WooCommerce') ){
	$product_categories = get_terms(
							array(
								'taxonomy'		=> 'product_cat'
								,'hide_empty'	=> false
								,'fields'		=> 'id=>name'
							)
						);
	if( !is_array($product_categories) ){
		$product_categories = array();
	}
}

$options[] = array(
				'id'		=> 'post_layout_heading'
				,'label'	=> esc_html__('Post Layout', 'themesky')
				,'desc'		=> ''
				,'type'		=> 'heading'
			);
			
$options[] = array(
				'id'		=> 'post_layout'
				,'label'	=> esc_html__('Post Layout', 'themesky')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> array(
									'0'			=> esc_html__('Default', 'themesky')
									,'0-1-0'  	=> esc_html__('Fullwidth', 'themesky')
									,'1-1-0' 	=> esc_html__('Left Sidebar', 'themesky')
									,'0-1-1' 	=> esc_html__('Right Sidebar', 'themesky')
									,'1-1-1' 	=> esc_html__('Left & Right Sidebar', 'themesky')
								)
			);
			
$options[] = array(
				'id'		=> 'post_left_sidebar'
				,'label'	=> esc_html__('Left Sidebar', 'themesky')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> $sidebar_options
			);
			
$options[] = array(
				'id'		=> 'post_right_sidebar'
				,'label'	=> esc_html__('Right Sidebar', 'themesky')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> $sidebar_options
			);
			
$options[] = array(
				'id'		=> 'bg_breadcrumbs'
				,'label'	=> esc_html__('Breadcrumb Background Image', 'themesky')
				,'desc'		=> ''
				,'type'		=> 'upload'
			);
			
$options[] = array(
				'id'		=> 'post_audio_heading'
				,'label'	=> esc_html__('Post Audio', 'themesky')
				,'desc'		=> ''
				,'type'		=> 'heading'
			);	
			
$options[] = array(
				'id'		=> 'audio_url'
				,'label'	=> esc_html__('Audio URL', 'themesky')
				,'desc'		=> esc_html__('Enter MP3, OGG, WAV file URL or SoundCloud URL', 'themesky')
				,'type'		=> 'text'
			);

$options[] = array(
				'id'		=> 'post_video_heading'
				,'label'	=> esc_html__('Post Video', 'themesky')
				,'desc'		=> ''
				,'type'		=> 'heading'
			);			
			
$options[] = array(
				'id'		=> 'video_url'
				,'label'	=> esc_html__('Video URL', 'themesky')
				,'desc'		=> esc_html__('Enter Youtube or Vimeo video URL', 'themesky')
				,'type'		=> 'text'
			);	

if( class_exists('WooCommerce') ){
	$options[] = array(
				'id'		=> 'related_product_categories_heading'
				,'label'	=> esc_html__('Related Product Categories', 'themesky')
				,'desc'		=> ''
				,'type'		=> 'heading'
			);
			
	$options[] = array(
				'id'		=> 'related_product_categories'
				,'label'	=> esc_html__('Related Product Categories', 'themesky')
				,'desc'		=> esc_html__('Used to display the related products on the blog page', 'themesky')
				,'type'		=> 'multi_select'
				,'options'	=> $product_categories
			);
}			
?>