<?php
/*************************************************
* WooCommerce Custom Hook                        *
**************************************************/

/*** Shop - Category ***/

/* Remove hook */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

remove_action('woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10);
remove_action('woocommerce_after_subcategory', 'woocommerce_template_loop_category_link_close', 10);

/* Add new hook */
add_action('woocommerce_after_main_content', 'mymedi_shop_bottom_content', 10);

add_action('woocommerce_before_shop_loop_item_title', 'mymedi_template_loop_product_thumbnail', 10);
add_action('woocommerce_after_shop_loop_item_title', 'mymedi_template_loop_product_label', 1);

add_action('woocommerce_after_shop_loop_item', 'mymedi_template_loop_brands', 5);
add_action('woocommerce_after_shop_loop_item', 'mymedi_template_loop_categories', 10);
add_action('woocommerce_after_shop_loop_item', 'mymedi_template_loop_product_sku', 20);
add_action('woocommerce_after_shop_loop_item', 'mymedi_template_loop_product_title', 30);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 40);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_rating', 45);
add_action('woocommerce_after_shop_loop_item', 'mymedi_template_loop_short_description', 60);
add_action('woocommerce_after_shop_loop_item_2', 'mymedi_template_loop_add_to_cart', 40);

add_action('init', 'mymedi_add_loop_quantity', 20);

add_action('woocommerce_archive_description', 'mymedi_best_selling_products', 20);

add_action('woocommerce_before_shop_loop', 'mymedi_product_per_page_form', 60);
add_action('woocommerce_before_shop_loop', 'mymedi_product_on_sale_form', 30);
add_action('woocommerce_before_shop_loop', 'mymedi_product_columns_selector', 20);
add_action('woocommerce_before_shop_loop', 'mymedi_add_filter_button', 15);
add_filter('loop_shop_per_page', 'mymedi_change_products_per_page_shop'); 
add_filter('loop_shop_post_in', 'mymedi_show_only_products_on_sales'); 

add_filter('woocommerce_catalog_orderby', 'mymedi_woocommerce_catalog_orderby');

add_action('woocommerce_after_shop_loop', 'mymedi_shop_load_more_html', 20);

add_filter('woocommerce_product_get_rating_html', 'mymedi_get_empty_rating_html', 10, 3);
add_filter('woocommerce_get_stock_html', 'mymedi_empty_woocommerce_stock_html', 10, 2);

add_filter('woocommerce_before_output_product_categories', 'mymedi_before_output_product_categories');
add_filter('woocommerce_after_output_product_categories', 'mymedi_after_output_product_categories');

function mymedi_add_loop_quantity(){
	$theme_options = mymedi_get_theme_options();
	if( $theme_options['ts_prod_cat_quantity_input'] && $theme_options['ts_product_hover_style'] == 'style-5' ){
		add_action('woocommerce_after_shop_loop_item_2', 'mymedi_template_loop_quantity', 20);
	}
}

function mymedi_shop_bottom_content(){
	$bottom_content = mymedi_get_theme_options('ts_prod_cat_bottom_content');
	if( $bottom_content && ( is_tax( get_object_taxonomies( 'product' ) ) || is_post_type_archive('product') ) ){
		echo '<div class="shop-bottom-content">';
		echo do_shortcode( wp_kses_post( $bottom_content ) ); /* Allowed html as post content */
		echo '</div>';
	}
}

function mymedi_template_loop_product_label(){
	global $product;
	$theme_options = mymedi_get_theme_options();
	?>
	<div class="product-label">
	<?php 
	if( $product->is_in_stock() ){
		/* New label */
		if( $theme_options['ts_product_show_new_label'] ){
			$now = current_time( 'timestamp', true );
			$post_date = get_post_time('U', true);
			$num_day = (int)( ( $now - $post_date ) / ( 3600*24 ) );
			$num_day_setting = absint( $theme_options['ts_product_show_new_label_time'] );
			if( $num_day <= $num_day_setting ){
				echo '<div><span class="new">'.esc_html($theme_options['ts_product_new_label_text']).'</span></div>';
			}
		}
		
		/* Sale label */
		if( $product->is_on_sale() ){
			$show_sale_label_as = $theme_options['ts_show_sale_label_as'];
			$show_sale_label_as = apply_filters('mymedi_product_show_sale_label_as', $show_sale_label_as);
			if( $show_sale_label_as != 'text' ){
				if( $product->get_type() == 'variable' ){
					$regular_price = $product->get_variation_regular_price('max');
					$sale_price = $product->get_variation_sale_price('min');
				}
				else{
					$regular_price = $product->get_regular_price();
					$sale_price = $product->get_price();
				}
				if( $regular_price ){
					if( $show_sale_label_as == 'number' ){
						$_off_price = round($regular_price - $sale_price, wc_get_price_decimals());
						$price_display = '-' . sprintf(get_woocommerce_price_format(), get_woocommerce_currency_symbol(), $_off_price);
						echo '<div><span class="onsale amount" data-original="'.$price_display.'">'.$price_display.'</span></div>';
					}
					if( $show_sale_label_as == 'percent' ){
						$_off_percent = ( 1 - round($sale_price / $regular_price, 2) ) * 100;
						echo '<div><span class="onsale percent">-'.$_off_percent.'%</span></div>';
					}
				}
			}
			else{
				echo '<div><span class="onsale">'.esc_html($theme_options['ts_product_sale_label_text']).'</span></div>';
			}
		}
		
		/* Hot label */
		if( $product->is_featured() ){
			echo '<div><span class="featured">'.esc_html($theme_options['ts_product_feature_label_text']).'</span></div>';
		}
	}
	else{ /* Out of stock */
		echo '<div><span class="out-of-stock">'.esc_html($theme_options['ts_product_out_of_stock_label_text']).'</span></div>';
	}
	?>
	</div>
	<?php
}

function mymedi_template_loop_product_thumbnail(){
	global $product;
	$lazy_load = mymedi_get_theme_options('ts_prod_lazy_load') && !( defined( 'DOING_AJAX' ) && DOING_AJAX );
	$placeholder_img_src = mymedi_get_theme_options('ts_prod_placeholder_img')['url'];
	
	$prod_galleries = $product->get_gallery_image_ids();
	
	$image_size = apply_filters('mymedi_loop_product_thumbnail', 'woocommerce_thumbnail');
	
	$dimensions = wc_get_image_size( $image_size );
	
	$has_back_image = mymedi_get_theme_options('ts_effect_product');
	
	if( !is_array($prod_galleries) || ( is_array($prod_galleries) && count($prod_galleries) == 0 ) ){
		$has_back_image = false;
	}
	 
	if( wp_is_mobile() ){
		$has_back_image = false;
	}
	
	echo '<figure class="' . ($has_back_image?'has-back-image':'no-back-image') . '">';
		if( !$lazy_load ){
			echo woocommerce_get_product_thumbnail( $image_size );
			
			if( $has_back_image ){
				echo wp_get_attachment_image( $prod_galleries[0], $image_size, 0, array('class' => 'product-image-back') );
			}
		}
		else{
			$front_img_src = '';
			$alt = '';
			if( has_post_thumbnail( $product->get_id() ) ){
				$post_thumbnail_id = get_post_thumbnail_id($product->get_id());
				$image_obj = wp_get_attachment_image_src($post_thumbnail_id, $image_size, 0);
				if( isset($image_obj[0]) ){
					$front_img_src = $image_obj[0];
				}
				$alt = trim(strip_tags( get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true) ));
			}
			else{
				$front_img_src = wc_placeholder_img_src();
			}
			
			echo '<img src="'.esc_url($placeholder_img_src).'" data-src="'.esc_url($front_img_src).'" class="attachment-shop_catalog wp-post-image ts-lazy-load" alt="'.esc_attr($alt).'" width="'.$dimensions['width'].'" height="'.$dimensions['height'].'" />';
		
			if( $has_back_image ){
				$back_img_src = '';
				$alt = '';
				$image_obj = wp_get_attachment_image_src($prod_galleries[0], $image_size, 0);
				if( isset($image_obj[0]) ){
					$back_img_src = $image_obj[0];
					$alt = trim(strip_tags( get_post_meta($prod_galleries[0], '_wp_attachment_image_alt', true) ));
				}
				else{
					$back_img_src = wc_placeholder_img_src();
				}
				
				echo '<img src="'.esc_url($placeholder_img_src).'" data-src="'.esc_url($back_img_src).'" class="product-image-back ts-lazy-load" alt="'.esc_attr($alt).'" width="'.$dimensions['width'].'" height="'.$dimensions['height'].'" />';
			}
		}
	echo '</figure>';
}

function mymedi_template_loop_product_variable_color(){
	global $product;
	if( $product->get_type() == 'variable' ){
		$attribute_color = wc_attribute_taxonomy_name( 'color' ); // pa_color
		$attribute_color_name = wc_variation_attribute_name( $attribute_color ); // attribute_pa_color
		
		$color_terms = wc_get_product_terms( $product->get_id(), $attribute_color, array( 'fields' => 'all' ) );
		if( empty($color_terms) || is_wp_error($color_terms) ){
			return;
		}
		$color_term_ids = wp_list_pluck( $color_terms, 'term_id' );
		$color_term_slugs = wp_list_pluck( $color_terms, 'slug' );
		
		$color_html = array();
		$price_html = array();
		
		$added_colors = array();
		$count = 0;
		$number = apply_filters('mymedi_loop_product_variable_color_number', 3);
		
		$children = $product->get_children();
		if( is_array($children) && count($children) > 0 ){
			foreach( $children as $children_id ){
				$variation_attributes = wc_get_product_variation_attributes( $children_id );
				foreach( $variation_attributes as $attribute_name => $attribute_value ){
					if( $attribute_name == $attribute_color_name ){
						if( in_array($attribute_value, $added_colors) ){
							break;
						}
						
						$term_id = 0;
						$found_slug = array_search($attribute_value, $color_term_slugs);
						if( $found_slug !== false ){
							$term_id = $color_term_ids[ $found_slug ];
						}
						
						if( $term_id !== false && absint( $term_id ) > 0 ){
							$thumbnail_id = get_post_meta( $children_id, '_thumbnail_id', true );
							if( $thumbnail_id ){
								$image_src = wp_get_attachment_image_src($thumbnail_id, 'woocommerce_thumbnail');
								if( $image_src ){
									$thumbnail = $image_src[0];
								}
								else{
									$thumbnail = wc_placeholder_img_src();
								}
							}
							else{
								$thumbnail = wc_placeholder_img_src();
							}
							
							$color_datas = get_term_meta( $term_id, 'ts_product_color_config', true );
							if( $color_datas ){
								$color_datas = unserialize( $color_datas );	
							}else{
								$color_datas = array('ts_color_color' => '#ffffff', 'ts_color_image' => 0);
							}
							$color_datas['ts_color_image'] = absint($color_datas['ts_color_image']);
							if( $color_datas['ts_color_image'] ){
								$color_html[] = '<div class="color-image" data-thumb="'.$thumbnail.'" data-term_id="'.$term_id.'"><span>'.wp_get_attachment_image( $color_datas['ts_color_image'], 'ts_prod_color_thumb', true, array('alt' => $attribute_value) ).'</span></div>';
							}
							else{
								$color_html[] = '<div class="color" data-thumb="'.$thumbnail.'" data-term_id="'.$term_id.'"><span style="background-color: '.$color_datas['ts_color_color'].'"></span></div>';
							}
							$variation = wc_get_product( $children_id );
							$price_html[] = '<span class="price" data-term_id="'.$term_id.'">' . $variation->get_price_html() . '</span>';
							$count++;
						}
						
						$added_colors[] = $attribute_value;
						break;
					}
				}
				
				if( $count == $number ){
					break;
				}
			}
		}
		
		if( $color_html ){
			echo '<div class="color-swatch">'. implode('', $color_html) . '</div>';
			echo '<span class="variable-prices hidden">' . implode('', $price_html) . '</span>';
		}
	}
}

function mymedi_template_loop_product_title(){
	global $product;
	echo '<h3 class="heading-title product-name">';
	echo '<a href="' . esc_url($product->get_permalink()) . '">' . esc_html($product->get_title()) . '</a>';
	echo '</h3>';
}

function mymedi_template_loop_add_to_cart(){
	if( mymedi_get_theme_options('ts_enable_catalog_mode') ){
		return;
	}
	
	echo '<div class="loop-add-to-cart">';
	woocommerce_template_loop_add_to_cart();
	echo '</div>';
}

function mymedi_template_loop_product_sku(){
	global $product;
	echo '<div class="product-sku">' . esc_html($product->get_sku()) . '</div>';
}

function mymedi_template_loop_short_description(){
	global $product;
	if( !$product->get_short_description() ){
		return;
	}
	
	$show_desc = true;
	if( is_tax( get_object_taxonomies( 'product' ) ) || is_post_type_archive('product') ){
		$show_desc = mymedi_get_theme_options('ts_prod_cat_desc');
	}
	
	if( $show_desc ){
		$allowed_html = array(
			'ul' => array(
				'class' => array()
			)
			,'ol' => array(
				'class' => array()
			)
			,'li'=> array(
				'class' => array()
			)
		);
	?>
		<div class="short-description">
			<?php mymedi_the_excerpt_max_words(mymedi_get_theme_options('ts_prod_cat_desc_words'), '', $allowed_html, '', true); ?>
		</div>
	<?php
	}
}

function mymedi_template_loop_brands(){
	global $product;
	if( taxonomy_exists('ts_product_brand') ){
		echo get_the_term_list($product->get_id(), 'ts_product_brand', '<div class="product-brands">', ', ', '</div>');
	}
}

function mymedi_best_selling_products(){
	global $post;
	
	if( !shortcode_exists('ts_products') ){
		return;
	}
	
	$theme_options = mymedi_get_theme_options();
	
	$is_single_product = is_singular('product');
	
	$product_cats = '';
	
	if( !$is_single_product ){
		if( $theme_options['ts_prod_cat_bestsellers'] && is_tax('product_cat') ){
			if( is_paged() && $theme_options['ts_prod_cat_loading_type'] != 'default' ){
				return;
			}
			
			$term = get_queried_object();
			if( !isset($term->term_id) ){
				return;
			}
			
			$total_products = wc_get_loop_prop( 'total', 0 );
			$per_page = apply_filters('mymedi_best_selling_products_per_page', 7);
			if( $total_products < $per_page * 2 ){
				return;
			}
			
			$product_cats = $term->term_id;
			$term_children = get_term_children($term->term_id, 'product_cat');
			if( is_array( $term_children ) && count( $term_children ) > 0 ){
				$product_cats .= ',' . implode(',', $term_children);
			}
		}
	}
	else{
		if( $theme_options['ts_prod_bestsellers'] ){
			$per_page = apply_filters('mymedi_best_selling_products_per_page', 7);
			$product_cats = wp_get_post_terms($post->ID, 'product_cat', array('fields' => 'ids'));
			$product_cats = is_array( $product_cats )? implode(',', $product_cats): '';
		}
	}
	
	if( $product_cats ){
		wc_set_loop_prop( 'is_shortcode', true );
		
		$columns = $theme_options['ts_prod_cat_columns'];
		$columns = !in_array( $columns, array(1, 2) ) ? $columns : 5;
		
		$atts = array(
			'title'			=> !$is_single_product? esc_attr__('Bestsellers in', 'mymedi') . ' ' . $term->name: esc_attr__('Bestsellers', 'mymedi')
			,'product_type' => 'best_selling'
			,'product_cats' => $product_cats
			,'is_slider'	=> 1
			,'columns'		=> $columns
			,'per_page'		=> $per_page
			,'show_image'	=> $theme_options['ts_prod_cat_thumbnail']
			,'show_title'	=> $theme_options['ts_prod_cat_title']
			,'show_sku'		=> $theme_options['ts_prod_cat_sku']
			,'show_price'	=> $theme_options['ts_prod_cat_price']
			,'show_short_desc'	=> $theme_options['ts_prod_cat_desc']
			,'show_rating'		=> $theme_options['ts_prod_cat_rating']
			,'show_label'		=> $theme_options['ts_prod_cat_label']
			,'show_categories'	=> $theme_options['ts_prod_cat_cat']
			,'show_add_to_cart'	=> $theme_options['ts_prod_cat_add_to_cart']
		);
		
		$atts = apply_filters('mymedi_best_selling_products_atts', $atts);
		
		$atts_str = '';
		foreach( $atts as $k => $v ){
			$atts_str .= $k . '="'.$v.'" ';
		}
		
		echo do_shortcode('[ts_products '.$atts_str.']');
		
		mymedi_remove_hooks_from_shop_loop();
		
		wc_set_loop_prop( 'is_shortcode', false );
	}
}

function mymedi_template_loop_categories(){
	global $product;
	$categories_label = esc_html__('Categories: ', 'mymedi');
	echo wc_get_product_category_list($product->get_id(), ', ', '<div class="product-categories"><span>'.$categories_label.'</span>', '</div>');
}

function mymedi_change_products_per_page_shop(){
    if( is_tax( get_object_taxonomies( 'product' ) ) || is_post_type_archive('product') ){
		if( isset($_GET['per_page']) && absint($_GET['per_page']) > 0 ){
			return absint($_GET['per_page']);
		}
		$per_page = absint( mymedi_get_theme_options('ts_prod_cat_per_page') );
        if( $per_page ){
            return $per_page;
        }
    }
}

function mymedi_product_per_page_form(){
	if( !mymedi_get_theme_options('ts_prod_cat_per_page_dropdown') ){
		return;
	}
	if( function_exists('woocommerce_products_will_display') && !woocommerce_products_will_display() ){
		return;
	}
	
	$per_page = absint( mymedi_get_theme_options('ts_prod_cat_per_page') );
	if( !$per_page ){
		return;
	}
	
	$options = array();
	for( $i = 1; $i <= 4; $i++ ){
		$options[] = $per_page * $i;
	}
	$selected = isset($_GET['per_page'])?absint($_GET['per_page']):$per_page;
	
	$action = '';
	$cat 	= get_queried_object();
	if( isset( $cat->term_id ) && isset( $cat->taxonomy ) ){
		$action = get_term_link( $cat->term_id, $cat->taxonomy );
	}
	else{
		$action = wc_get_page_permalink('shop');
	}
?>
	<form method="get" action="<?php echo esc_url($action) ?>" class="product-per-page-form">		
		<select name="per_page" class="perpage">
			<?php foreach( $options as $option ): ?>
			<option value="<?php echo esc_attr($option) ?>" <?php selected($selected, $option) ?>><?php echo esc_html($option) ?></option>
			<?php endforeach; ?>
		</select>
		<ul class="perpage">
			<li>
				<span class="perpage-current"><span><?php esc_html_e('Show', 'mymedi'); ?></span><strong><?php echo esc_html($selected) ?></strong></span>
				<ul class="dropdown">
					<?php foreach( $options as $option ): ?>
					<li><a href="#" data-perpage="<?php echo esc_attr($option) ?>" class="<?php echo esc_attr($option == $selected?'current':''); ?>"><span><?php esc_html_e('Show', 'mymedi'); ?></span><strong><?php echo esc_html($option) ?></strong></a></li>
					<?php endforeach; ?>
				</ul>
			</li>
		</ul>
		
		<?php wc_query_string_form_fields( null, array( 'per_page', 'submit', 'paged', 'product-page' ) ); ?>
	</form>
<?php
}

function mymedi_product_columns_selector(){
	if( !mymedi_get_theme_options('ts_prod_cat_columns_selector') ){
		return;
	}
	if( function_exists('woocommerce_products_will_display') && !woocommerce_products_will_display() ){
		return;
	}
	
	$default_columns = (int) mymedi_get_theme_options('ts_prod_cat_columns');
	
	$columns = array(1, 2, 3, 4);
	?>
	<div class="ts-product-columns-selector">
		<?php foreach( $columns as $column ){ ?>
		<span class="column-<?php echo esc_attr($column); ?> <?php echo esc_attr($default_columns == $column?'selected':''); ?>" data-col="<?php echo esc_attr($column); ?>"></span>
		<?php } ?>
	</div>
	<?php
}

function mymedi_show_only_products_on_sales( $array ){
	if( is_tax( get_object_taxonomies( 'product' ) ) || is_post_type_archive('product') ){
		if( isset($_GET['onsale']) && 'yes' == $_GET['onsale'] ){
			return array_merge($array, wc_get_product_ids_on_sale());
		}
	}
	return $array;
}

function mymedi_product_on_sale_form(){
	if( !mymedi_get_theme_options('ts_prod_cat_onsale_checkbox') ){
		return;
	}
	if( function_exists('woocommerce_products_will_display') && !woocommerce_products_will_display() ){
		return;
	}
	
	$checked = isset($_GET['onsale']) && 'yes' == $_GET['onsale'] ? true : false;
	
	$action = '';
	$cat 	= get_queried_object();
	if( isset( $cat->term_id ) && isset( $cat->taxonomy ) ){
		$action = get_term_link( $cat->term_id, $cat->taxonomy );
	}
	else{
		$action = wc_get_page_permalink('shop');
	}
	?>
	<form method="get" action="<?php echo esc_url($action); ?>" class="product-on-sale-form">
		<label>
			<input type="checkbox" name="onsale" value="yes" <?php echo esc_attr( $checked?'checked':'' ); ?> />
			<?php esc_html_e('Show only products on sale', 'mymedi'); ?>
		</label>
		<?php wc_query_string_form_fields( null, array( 'onsale', 'submit', 'paged', 'product-page' ) ); ?>
	</form>
	<?php
}

function mymedi_woocommerce_catalog_orderby( $orderby ){
	if( isset($orderby['menu_order']) ){
		$orderby['menu_order'] = __('Default', 'mymedi');
	}
	if( isset($orderby['popularity']) ){
		$orderby['popularity'] = __('Popularity', 'mymedi');
	}
	if( isset($orderby['rating']) ){
		$orderby['rating'] = __('Average rating', 'mymedi');
	}
	if( isset($orderby['date']) ){
		$orderby['date'] = __('Latest', 'mymedi');
	}
	if( isset($orderby['price']) ){
		$orderby['price'] = __('Price: low to high', 'mymedi');
	}
	if( isset($orderby['price-desc']) ){
		$orderby['price-desc'] = __('Price: high to low', 'mymedi');
	}
	return $orderby;
}

function mymedi_is_active_filter_area(){
	return is_active_sidebar('filter-widget-area') && mymedi_get_theme_options('ts_filter_widget_area') && woocommerce_products_will_display();
}

function mymedi_add_filter_button(){
	if( mymedi_is_active_filter_area() ){
	?>
		<div class="filter-widget-area-button style-sidebar">
			<a href="#"><?php esc_html_e('Filter', 'mymedi') ?></a>
		</div>
		
		<div id="ts-filter-widget-area" class="ts-floating-sidebar style-sidebar">
			<div class="ts-sidebar-content">
				<span class="close"><?php esc_html_e('Close ', 'mymedi'); ?></span>
				<aside class="ts-sidebar filter-widget-area">
					<?php dynamic_sidebar( 'filter-widget-area' ); ?>
				</aside>
			</div>
		</div>
		<?php
	}
}

function mymedi_shop_load_more_html(){
	if( wc_get_loop_prop( 'total_pages' ) == 1 || !woocommerce_products_will_display() ){
		return;
	}
	$loading_type = mymedi_get_theme_options('ts_prod_cat_loading_type');
	if( in_array($loading_type, array('infinity-scroll', 'load-more-button')) ){
		$total = wc_get_loop_prop( 'total' );
		$per_page = wc_get_loop_prop( 'per_page' );
		$current = wc_get_loop_prop( 'current_page' );
		$showing = min($current * $per_page, $total);
	?>
	<div class="ts-shop-load-more">
		<span class="load-more"><?php esc_html_e('LOAD MORE', 'mymedi'); ?></span>
	</div>
	<div class="ts-shop-result-count">
		<span>
			<?php 
			if( $showing < $total ){
				printf( esc_html__('You\'re viewed %s of %s products', 'mymedi'), $showing, $total );
			}
			else{
				printf( esc_html__('You\'re viewed all %s products', 'mymedi'), $total );
			}
			?>
		</span>
	</div>
	<?php
	}
}

function mymedi_get_empty_rating_html( $html, $rating, $count ){
	if( $rating == 0 ){
		$html  = '<div class="star-rating no-rating">';
		$html .= '<span style="width:0%"></span>';
		$html .= '</div>';
	}
	return $html;
}

function mymedi_empty_woocommerce_stock_html( $html, $product ){
	if( $product->get_type() == 'simple' ){
		return '';
	}
	return $html;
}

function mymedi_before_output_product_categories(){
	return '<div class="list-categories">';
}

function mymedi_after_output_product_categories(){
	return '</div>';
}
/*** End Shop - Category ***/



/*** Single Product ***/

/* Remove hook */
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

/* Add hook */
add_action('woocommerce_before_single_product_summary', 'mymedi_before_single_product_summary_images', 1);
add_action('woocommerce_after_single_product_summary', 'mymedi_after_single_product_summary_images', 1);

add_action('woocommerce_product_thumbnails', 'mymedi_template_loop_product_label', 99);
add_action('woocommerce_product_thumbnails', 'mymedi_template_single_product_video_360_buttons', 99);

add_action('woocommerce_single_product_summary', 'mymedi_template_single_navigation', 1);
add_action('woocommerce_single_product_summary', 'mymedi_template_single_availability', 1);
add_action('woocommerce_single_product_summary', 'mymedi_template_loop_brands', 5);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15);
add_action('woocommerce_single_product_summary', 'mymedi_template_single_product_feature', 25);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 28);
add_action('woocommerce_single_product_summary', 'mymedi_template_single_variation_price', 29);
add_action('woocommerce_single_product_summary', 'mymedi_template_single_meta', 60);

add_action('woocommerce_single_product_summary', 'mymedi_before_single_product_summary_column_2', 26);
add_action('woocommerce_single_product_summary', 'mymedi_after_single_product_summary_column_2', 39);

add_action('woocommerce_after_single_product_summary', 'mymedi_best_selling_products', 14);

if( function_exists('ts_template_social_sharing') ){
	add_action('woocommerce_share', 'ts_template_social_sharing', 10);
}

if( function_exists('ts_template_loop_time_deals') ){
	add_action('woocommerce_single_product_summary', 'ts_template_loop_time_deals', 22);
}

add_filter('woocommerce_grouped_product_columns', 'mymedi_woocommerce_grouped_product_columns');

add_filter('woocommerce_product_description_heading', '__return_empty_string');
add_filter('woocommerce_product_additional_information_heading', '__return_empty_string');
add_filter('woocommerce_reviews_title', 'mymedi_product_reviews_title');
add_filter('woocommerce_product_review_comment_form_args', 'mymedi_product_review_form_reply_title');

add_filter('woocommerce_output_related_products_args', 'mymedi_output_related_products_args_filter');

add_filter('woocommerce_single_product_image_gallery_classes', 'mymedi_add_classes_to_single_product_thumbnail');
add_filter('woocommerce_gallery_thumbnail_size', 'mymedi_product_gallery_thumbnail_size');
add_filter('woocommerce_product_thumbnails_columns', 'mymedi_product_thumbnails_columns');

if( !is_admin() ){ /* Fix for WooCommerce Tab Manager plugin */
	add_filter( 'woocommerce_product_tabs', 'mymedi_product_remove_tabs', 999 );
	add_filter( 'woocommerce_product_tabs', 'mymedi_add_product_custom_tab', 90 );
}

add_action('wp_ajax_mymedi_load_product_video', 'mymedi_load_product_video_callback' );
add_action('wp_ajax_nopriv_mymedi_load_product_video', 'mymedi_load_product_video_callback' );
/*** End Product ***/

function mymedi_before_single_product_summary_images(){
	echo '<div class="product-images-summary">';
}

function mymedi_after_single_product_summary_images(){
	echo '</div>';
}

function mymedi_template_single_product_video_360_buttons(){
	global $product;
	$video_url = get_post_meta($product->get_id(), 'ts_prod_video_url', true);
	if( $video_url ){
		echo '<a class="ts-product-video-button" href="#" data-product_id="'.$product->get_id().'"></a>';
		add_action('wp_footer', 'mymedi_add_product_video_popup_modal', 999);
	}
	
	$gallery_360 = get_post_meta($product->get_id(), 'ts_prod_360_gallery', true);
	if( $gallery_360 ){
		$galleries = array_map('trim', explode(',', $gallery_360));
		$image_array = array();
		foreach($galleries as $gallery ){
			$image_src = wp_get_attachment_image_url($gallery, 'woocommerce_single');
			if( $image_src ){
				$image_array[] = "'" . $image_src . "'";
			}
		}
		wp_enqueue_script('threesixty');
		wp_add_inline_script('threesixty', 'var _ts_product_360_image_array = ['.implode(',', $image_array).'];');
		
		echo '<a class="ts-product-360-button" href="#"></a>';
		add_action('wp_footer', 'mymedi_add_product_360_popup_modal', 999);
	}
}

function mymedi_add_product_video_popup_modal(){
	?>
	<div id="ts-product-video-modal" class="ts-popup-modal">
		<div class="overlay"></div>
		<div class="product-video-container popup-container">
			<span class="close"><?php esc_html_e('Close ', 'mymedi'); ?></span>
			<div class="product-video-content"></div>
		</div>
	</div>
	<?php
}

function mymedi_add_product_360_popup_modal(){
	?>
	<div id="ts-product-360-modal" class="ts-popup-modal">
		<div class="overlay"></div>
		<span class="close"><?php esc_html_e('Close ', 'mymedi'); ?></span>
		<div class="product-360-container popup-container">
			<div class="product-360-content"><?php mymedi_load_product_360(); ?></div>
		</div>
	</div>
	<?php
}

function mymedi_add_classes_to_single_product_thumbnail( $classes ){
	global $product;
	$video_url = get_post_meta($product->get_id(), 'ts_prod_video_url', true);
	if( $video_url ){
		$classes[] = 'has-video';
	}
	$gallery_360 = get_post_meta($product->get_id(), 'ts_prod_360_gallery', true);
	if( $gallery_360 ){
		$classes[] = 'has-360-gallery';
	}
	return $classes;
}

function mymedi_product_gallery_thumbnail_size(){
	return 'woocommerce_thumbnail';
}

function mymedi_product_thumbnails_columns(){
	return 5;
}

/* Single Product Video - Register ajax */
function mymedi_load_product_video_callback(){
	if( empty($_POST['product_id']) ){
		die( esc_html__('Invalid Product', 'mymedi') );
	}
	
	$prod_id = absint($_POST['product_id']);

	if( $prod_id <= 0 ){
		die( esc_html__('Invalid Product', 'mymedi') );
	}
	
	$video_url = get_post_meta($prod_id, 'ts_prod_video_url', true);
	ob_start();
	if( !empty($video_url) ){
		echo do_shortcode('[ts_video src='.esc_url($video_url).']');
	}
	die( ob_get_clean() );
}

function mymedi_load_product_360(){
	?>
	<div class="threesixty ts-product-360">
		<div class="spinner">
			<span>0%</span>
		</div>
		<ol class="threesixty_images"></ol>
	</div>
	<?php
}

function mymedi_template_single_navigation(){
	if( !mymedi_get_theme_options('ts_prod_next_prev_navigation') ){
		return;
	}
	$prev_post = get_adjacent_post(false, '', true, 'product_cat');
	$next_post = get_adjacent_post(false, '', false, 'product_cat');
	?>
	<div class="single-navigation">
	<?php 
		if( $prev_post ){
			$post_id = $prev_post->ID;
			$product = wc_get_product($post_id);
			?>
			<a href="<?php echo esc_url(get_permalink($post_id)); ?>" rel="prev">
				<div class="product-info prev-product-info">
					<?php echo wp_kses($product->get_image(), 'mymedi_product_image'); ?>
				</div>
				<span class="prev-title"><?php esc_html_e('Prev product', 'mymedi'); ?></span>
			</a>
			<?php
		}
		
		if( $next_post ){
			$post_id = $next_post->ID;
			$product = wc_get_product($post_id);
			?>
			<a href="<?php echo esc_url(get_permalink($post_id)); ?>" rel="next">
				<div class="product-info next-product-info">
					<?php echo wp_kses($product->get_image(), 'mymedi_product_image'); ?>
				</div>
				<span class="next-title"><?php esc_html_e('Next product', 'mymedi'); ?></span>
			</a>
			<?php
		}
	?>
	</div>
	<?php
}

function mymedi_before_single_product_summary_column_2(){
	if( mymedi_get_theme_options('ts_prod_summary_layout') == '2-columns' ){
		echo '<div class="summary-column-2">';
	}
}

function mymedi_after_single_product_summary_column_2(){
	if( mymedi_get_theme_options('ts_prod_summary_layout') == '2-columns' ){
		echo '</div>';
	}
}

function mymedi_template_single_variation_price(){
	if( mymedi_get_theme_options('ts_prod_price') ){
		echo '<div class="ts-variation-price hidden"></div>';
	}
}

function mymedi_template_single_product_feature(){
	global $product;
	$feature = get_post_meta($product->get_id(), 'ts_prod_feature', true);
	if( $feature ){
		echo '<div class="ts-product-feature">';
		echo do_shortcode( wp_kses_post($feature) ); /* Allowed html as post content */
		echo '</div>';
	}
}

function mymedi_template_single_meta(){
	global $product;
	$theme_options = mymedi_get_theme_options();
	
	echo '<div class="meta-content">';
		do_action( 'woocommerce_product_meta_start' );
		
		if( $theme_options['ts_prod_cat'] ){
			echo wc_get_product_category_list( $product->get_id(), ', ', '<div class="cats-link"><span>' . esc_html__( 'Categories:', 'mymedi' ) . '</span><span class="cat-links">', '</span></div>' );
		}
		
		if( $theme_options['ts_prod_tag'] ){
			echo wc_get_product_tag_list( $product->get_id(), ', ', '<div class="tags-link"><span>' . esc_html__( 'Tags:', 'mymedi' ) . '</span><span class="tag-links">', '</span></div>' );	
		}
		
		if( $theme_options['ts_prod_sku'] ){
			mymedi_template_single_sku();
		}
		
		if( $theme_options['ts_prod_sharing'] ){
			woocommerce_template_single_sharing();
		}
		
		do_action( 'woocommerce_product_meta_end' );
	echo '</div>';
}

function mymedi_template_single_sku(){
	global $product;
	if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ){
		echo '<div class="sku-wrapper product_meta"><span>' . esc_html__( 'SKU:', 'mymedi' ) . '</span><span class="sku">' . (( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'mymedi' )) . '</span></div>';
	}
}
function mymedi_template_single_availability(){
	global $product;

	$product_stock = $product->get_availability();
	$availability_text = empty($product_stock['availability'])?esc_html__('In Stock', 'mymedi'):esc_attr($product_stock['availability']);
	?>	
		<p class="availability stock <?php echo esc_attr($product_stock['class']); ?>" data-original="<?php echo esc_attr($availability_text) ?>" data-class="<?php echo esc_attr($product_stock['class']) ?>">
			<label><?php esc_html_e('Availability:', 'mymedi') ?></label>
			<span><?php echo esc_html($availability_text); ?></span>
		</p>	
	<?php
}


/*** Product tab ***/
function mymedi_product_remove_tabs( $tabs = array() ){
	if( !mymedi_get_theme_options('ts_prod_tabs') ){
		return array();
	}
	return $tabs;
}

function mymedi_add_product_custom_tab( $tabs = array() ){
	global $post;
	if( mymedi_get_theme_options('ts_prod_custom_tab') ){
		if( get_post_meta( $post->ID, 'ts_prod_custom_tab', true ) ){
			$custom_tab_title = get_post_meta( $post->ID, 'ts_prod_custom_tab_title', true );
		}
		else{
			$custom_tab_title = mymedi_get_theme_options('ts_prod_custom_tab_title');
		}
		
		if( $custom_tab_title ){
			$tabs['ts_custom'] = array(
				'title'    	=> esc_html( $custom_tab_title )
				,'priority' => 25
				,'callback' => 'mymedi_product_custom_tab_content'
			);
		}
	} 
	return $tabs;
}

function mymedi_product_custom_tab_content(){
	global $post;
	
	if( get_post_meta( $post->ID, 'ts_prod_custom_tab', true ) ){
		$custom_tab_content = get_post_meta( $post->ID, 'ts_prod_custom_tab_content', true );
	}
	else{
		$custom_tab_content = mymedi_get_theme_options('ts_prod_custom_tab_content');
	}
	
	echo do_shortcode( wp_kses_post( $custom_tab_content ) ); /* Allowed html as post content */
}

/* Bottom Content */
function mymedi_product_bottom_content(){
	$bottom_content = mymedi_get_theme_options('ts_prod_bottom_content');
	if( $bottom_content ){
		echo '<div class="product-bottom-content">';
			echo '<div class="container">';
				echo do_shortcode( wp_kses_post( $bottom_content ) ); /* Allowed html as post content */
			echo '</div>';
		echo '</div>';
	}
}

function mymedi_product_reviews_title(){
	return esc_html__('Latest reviews', 'mymedi');
}

function mymedi_product_review_form_reply_title( $comment_form ){
	$comment_form['title_reply'] = esc_html__('Write a review', 'mymedi');
	return $comment_form;
}

/* Related Products */
function mymedi_output_related_products_args_filter( $args ){
	$args['posts_per_page'] = 6;
	$args['columns'] = 5;
	return $args;
}

/* Change grouped product columns */
function mymedi_woocommerce_grouped_product_columns( $columns ){
	$columns = array('label', 'price', 'quantity');
	return $columns;
}

/*** General hook ***/

/*************************************************************
* Custom group button on product (quickshop, wishlist, compare) 
* Begin tag: 	10000
* Wishlist:  	10001
* Compare:   	10002
* Quickshop: 	10003
* Add To Cart: 	10004
* End tag:   	10005
**************************************************************/
add_action('woocommerce_after_shop_loop_item_title', 'mymedi_template_loop_add_to_cart', 10004 );
function mymedi_product_group_button_start(){
	$num_icon = 0;
	$extra_classes = '';
	if( has_action('woocommerce_after_shop_loop_item_title', 'mymedi_template_loop_add_to_cart') && !mymedi_get_theme_options('ts_enable_catalog_mode') ){
		$num_icon++;
	}
	else{
		$extra_classes = ' no-addtocart';
	}
	if( mymedi_get_theme_options('ts_enable_quickshop') ){
		$num_icon++;
	}
	if( class_exists('YITH_WCWL') ){
		$num_icon++;
	}
	if( class_exists('YITH_Woocompare') && get_option('yith_woocompare_compare_button_in_products_list') == 'yes' ){
		$num_icon++;
	}
	
	$classes = array(0 => '', 1 => 'one-button', 2 => 'two-button', 3 => 'three-button', 4 => 'four-button');
	
	echo "<div class=\"product-group-button {$classes[$num_icon]}{$extra_classes}\" >";
}

function mymedi_product_group_button_end(){
	echo '</div>';
}

add_action('woocommerce_after_shop_loop_item_title', 'mymedi_product_group_button_start', 10000 );
add_action('woocommerce_after_shop_loop_item_title', 'mymedi_product_group_button_end', 10005 );

/* Wishlist */
if( class_exists('YITH_WCWL') ){
	function mymedi_add_wishlist_button_to_product_list(){
		echo '<div class="button-in wishlist">';
		echo do_shortcode('[yith_wcwl_add_to_wishlist]');
		echo '</div>';
	}
	add_action( 'woocommerce_after_shop_loop_item_title', 'mymedi_add_wishlist_button_to_product_list', 10001 );
	add_action( 'woocommerce_after_shop_loop_item_2', 'mymedi_add_wishlist_button_to_product_list', 50 );
	
	add_filter('yith_wcwl_add_to_wishlist_params', 'mymedi_yith_wcwl_add_to_wishlist_params');
	function mymedi_yith_wcwl_add_to_wishlist_params( $additional_params ){
		if( isset($additional_params['container_classes']) && $additional_params['exists'] ){
			$additional_params['container_classes'] .= ' added';
		}
		$additional_params['label'] = '<span class="ts-tooltip button-tooltip" data-title="'.esc_attr__('Add to wishlist', 'mymedi').'">' . esc_html__('Wishlist', 'mymedi') . '</span>';
		return $additional_params;
	}
	
	add_filter('yith_wcwl_browse_wishlist_label', 'mymedi_yith_wcwl_browse_wishlist_label', 10, 2);
	function mymedi_yith_wcwl_browse_wishlist_label( $text = '', $product_id = 0 ){
		if( $product_id ){
			return '<span class="ts-tooltip button-tooltip" data-title="'.esc_attr__('Add to wishlist', 'mymedi').'">' . esc_html__('Wishlist', 'mymedi') . '</span>';
		}
		return $text;
	}
}

/* Compare */
if( class_exists('YITH_Woocompare') ){
	global $yith_woocompare;
	$is_ajax = ( defined( 'DOING_AJAX' ) && DOING_AJAX );
	if( $yith_woocompare->is_frontend() || $is_ajax ){
		if( get_option('yith_woocompare_compare_button_in_products_list') == 'yes' ){
			if( $is_ajax ){
				if( defined('YITH_WOOCOMPARE_DIR') && !class_exists('YITH_Woocompare_Frontend') ){
					$compare_frontend_class = YITH_WOOCOMPARE_DIR . 'includes/class.yith-woocompare-frontend.php';
					if( file_exists($compare_frontend_class) ){
						require_once $compare_frontend_class;
					}
					$yith_woocompare->obj = new YITH_Woocompare_Frontend();
				}
			}
			remove_action( 'woocommerce_after_shop_loop_item', array( $yith_woocompare->obj, 'add_compare_link' ), 20 );
			function mymedi_add_compare_button_to_product_list(){
				global $yith_woocompare, $product;
				echo '<div class="button-in compare">';
					echo '<a class="compare" href="'.$yith_woocompare->obj->add_product_url( $product->get_id() ).'" data-product_id="'.$product->get_id().'">';
						echo '<span class="ts-tooltip button-tooltip" data-title="'.esc_attr__('Add to compare', 'mymedi').'">' . esc_html__('Compare', 'mymedi') . '</span>';
					echo '</a>';
				echo '</div>';
			}
			add_action( 'woocommerce_after_shop_loop_item_title', 'mymedi_add_compare_button_to_product_list', 10002 );
			add_action( 'woocommerce_after_shop_loop_item_2', 'mymedi_add_compare_button_to_product_list', 60 );
		}
		
		add_filter( 'option_yith_woocompare_button_text', 'mymedi_compare_button_text_filter', 99 ); /* Used for single product */
		function mymedi_compare_button_text_filter(){
			return '<span class="ts-tooltip button-tooltip" data-title="'.esc_attr__('Add to compare', 'mymedi').'">' . esc_html__('Compare', 'mymedi') . '</span>';
		}
	}
}

/*************************************************************
* Group button on product meta (add to cart, wishlist, compare) 
* Begin tag: 69
* Add to cart: 70
* Compare: 70
* quicklist: 80
* End tag: 81
*************************************************************/
add_action('woocommerce_after_shop_loop_item_2', 'mymedi_product_group_button_meta_start', 30);
add_action('woocommerce_after_shop_loop_item_2', 'mymedi_product_group_button_meta_end', 70);
function mymedi_product_group_button_meta_start(){
	echo '<div class="product-group-button-meta">';
}
function mymedi_product_group_button_meta_end(){
	echo '</div>';
}
/*** End General hook ***/

/*** Quantity Input hooks ***/
add_action('woocommerce_before_quantity_input_field', 'mymedi_before_quantity_input_field', 1);
function mymedi_before_quantity_input_field(){
	?>
	<label class="ts-screen-reader-text"><?php esc_html_e('Quantity', 'mymedi'); ?></label>
	<div class="number-button">
		<input type="button" value="-" class="minus" />
	<?php
}

add_action('woocommerce_after_quantity_input_field', 'mymedi_after_quantity_input_field', 99);
function mymedi_after_quantity_input_field(){
	?>
		<input type="button" value="+" class="plus" />
	</div>
	<?php
}

/*** Cart - Checkout hooks ***/
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display', 10 );

/*** Continue To Shopping Button ***/
add_action('woocommerce_proceed_to_checkout', 'mymedi_cart_continue_shopping_button', 20);
function mymedi_cart_continue_shopping_button(){
	echo '<a href="'.esc_url(wc_get_page_permalink('shop')).'" class="button continue-shopping">'.esc_html__('Continue To Shopping', 'mymedi').'</a>';
}

add_action('woocommerce_cart_actions', 'mymedi_empty_cart_button');
function mymedi_empty_cart_button(){
?>
	<button type="submit" class="button empty-cart-button" name="ts_empty_cart" value="<?php esc_attr_e('Clear All', 'mymedi'); ?>"><?php esc_html_e('Clear All', 'mymedi'); ?></button>
<?php
}

add_action('init', 'mymedi_empty_woocommerce_cart');
function mymedi_empty_woocommerce_cart(){
	if( isset($_POST['ts_empty_cart']) ){
		WC()->cart->empty_cart();
	}
}

add_action('woocommerce_before_checkout_form', 'mymedi_before_checkout_form_start', 1);
add_action('woocommerce_before_checkout_form', 'mymedi_before_checkout_form_end', 999);
function mymedi_before_checkout_form_start(){
	echo '<div class="checkout-login-coupon-wrapper">';
}
function mymedi_before_checkout_form_end(){
	echo '</div>';
}

remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);
add_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 20);

remove_action('woocommerce_before_checkout_form', 'woocommerce_output_all_notices', 10);
add_action('woocommerce_before_checkout_form', 'woocommerce_output_all_notices', 1000);

if( !( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) ){
	add_action('woocommerce_before_checkout_form', function(){
		echo '<div class="checkout-login-wrapper">';
	}, 9);
	add_action('woocommerce_before_checkout_form', function(){
		echo '</div>';
	}, 11);
}

if( function_exists('wc_coupons_enabled') && wc_coupons_enabled() ){
	add_action('woocommerce_before_checkout_form', function(){
		echo '<div class="checkout-coupon-wrapper">';
	}, 19);
	add_action('woocommerce_before_checkout_form', function(){
		echo '</div>';
	}, 21);
} 

/*** Shopping Cart ***/

/* Change submit button text in review form */
add_filter( 'woocommerce_product_review_comment_form_args', 'mymedi_product_review_comment_form_args' );
function mymedi_product_review_comment_form_args( $comment_form ){
	$comment_form['label_submit'] = __('Add Review', 'mymedi');
	return $comment_form;
}
?>