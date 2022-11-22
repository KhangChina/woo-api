<?php 
global $post;
$theme_options = mymedi_get_theme_options();
$cat_list = get_the_terms($post, 'ts_portfolio_cat');
$cat_ids = array();
if( is_array($cat_list) ){
	foreach( $cat_list as $cat ){
		$cat_ids[] = $cat->term_id;
	}
}

$args = array(
		'post_type' 		=> $post->post_type
		,'post__not_in' 	=> array($post->ID)
		,'posts_per_page' 	=> 6
		,'fields'			=> 'ids'
	);

if( !empty($cat_ids) ){
	$args['tax_query'] = array(
		array(
			'taxonomy'	=> 'ts_portfolio_cat'
			,'field'	=> 'term_id'
			,'terms'	=> $cat_ids
		)
	);
}

$related_posts = new WP_Query($args);

if( $related_posts->have_posts() ){
	$post_ids = $related_posts->posts;
	$post_ids = implode(',', $post_ids);
	$shortcode_str = '[ts_portfolio include="'.$post_ids.'" title="'.esc_attr__('Related Projects', 'mymedi').'" columns="3" is_slider="1" show_categories="1" show_like_icon="0" show_link_icon="0"]';
	echo '<div class="ts-related-portfolios related-posts related" style="background:url(' . esc_url($theme_options['ts_portfolio_related_bg']['url']) . ')">';
		echo '<div class="container">';
			echo do_shortcode( $shortcode_str );
		echo '</div>';
	echo '</div>';
}
wp_reset_postdata();
?>