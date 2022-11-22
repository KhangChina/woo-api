<?php
add_action('widgets_init', 'ts_related_products_load_widgets');

function ts_related_products_load_widgets()
{
	register_widget('TS_Related_Products_Widget');
}

if( !class_exists('TS_Related_Products_Widget') ){
	class TS_Related_Products_Widget extends WP_Widget {

		function __construct() {
			$widgetOps = array('classname' => 'ts-related-products-widget', 'description' => esc_html__('Display the related products on the single product and blog pages. For blog, you need to set the Related Product Categories for your blog','themesky'));
			parent::__construct('ts_related_products', esc_html__('TS - Related Products','themesky'), $widgetOps);
		}

		function widget( $args, $instance ) {
			
			if( !class_exists('WooCommerce') ){
				return;
			}
			
			global $post, $product, $wpdb, $mymedi_displaying_post_ids;
			
			$related_products = array();
			
			$is_single_product = is_singular('product');
			
			if( !$is_single_product ){
				$product_cats = '';
			
				if( is_singular('post') ){
					$product_cats = get_post_meta($post->ID, 'ts_related_product_categories', true);
				}
				
				if( is_page_template('page-templates/blog-template.php') || is_home() || is_category() || is_tag() || is_author() ){
					$sql = 'select meta_value from ' . $wpdb->postmeta . ' where meta_key="ts_related_product_categories" and meta_value <> ""';
					if( is_array($mymedi_displaying_post_ids) ){
						$sql .= ' and post_id in ('.implode(',', $mymedi_displaying_post_ids).')';
					}
					
					$result = $wpdb->get_col( $sql );
					if( is_array($result) && !empty($result) ){
						$product_cats = implode(',', $result);
					}
				}
				
				if( !$product_cats ){
					return;
				}
				
				$product_cats = array_map('trim', explode(',', $product_cats));
			}
			
			extract($args);
			$title 				= apply_filters('widget_title', $instance['title']);
			$limit 				= ($instance['limit'] != 0)?absint($instance['limit']):4;
			$product_type 		= $instance['product_type'];
			$row 				= ($instance['row'] != 0)?absint($instance['row']):4;
			$show_thumbnail 	= empty($instance['show_thumbnail'])?0:$instance['show_thumbnail'];
			$show_categories 	= empty($instance['show_categories'])?0:$instance['show_categories'];
			$show_product_title = empty($instance['show_product_title'])?0:$instance['show_product_title'];
			$show_price 		= empty($instance['show_price'])?0:$instance['show_price'];
			$show_rating 		= empty($instance['show_rating'])?0:$instance['show_rating'];
			$is_slider 			= empty($instance['is_slider'])?0:$instance['is_slider'];
			$show_nav 			= empty($instance['show_nav'])?0:$instance['show_nav'];
			$auto_play 			= empty($instance['auto_play'])?0:$instance['auto_play'];
			
			if( !$is_single_product ){
				$args = array(
					'post_type'				=> 'product'
					,'post_status' 			=> 'publish'
					,'ignore_sticky_posts'	=> 1
					,'posts_per_page' 		=> $limit
					,'orderby' 				=> 'date'
					,'order' 				=> 'desc'
					,'meta_query' 			=> WC()->query->get_meta_query()
					,'tax_query'           	=> WC()->query->get_tax_query()
				);
				
				$args['tax_query'][] = array(
												'taxonomy' 	=> 'product_cat'
												,'terms' 	=> $product_cats
												,'field' 	=> 'term_id'
											);
				
				switch( $product_type ){
					case 'sale':
						$args['post__in'] = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
					break;
					case 'featured':
						$args['tax_query'][] = array(
							'taxonomy' => 'product_visibility',
							'field'    => 'name',
							'terms'    => 'featured',
							'operator' => 'IN',
						);
					break;
					case 'best_selling':
						$args['meta_key'] 	= 'total_sales';
						$args['orderby'] 	= 'meta_value_num';
						$args['order'] 		= 'desc';
					break;
					case 'top_rated':		
						$args['meta_key'] 	= '_wc_average_rating';
						$args['orderby'] 	= 'meta_value_num';
						$args['order'] 		= 'desc';
					break;
					case 'mixed_order':
						$args['orderby'] 	= 'rand';
					break;
					default: /* Recent */
						$args['orderby'] 	= 'date';
						$args['order'] 		= 'desc';
					break;
				}
				
				$products = new WP_Query($args);
				
				if( $products->have_posts() ){
					$related_products = array_map('wc_get_product', $products->posts);
				}
			}
			else{
				$args = array(
					'orderby'        => 'none'
					,'order'          => 'desc'
				);
				$args = apply_filters('ts_related_products_widget_args', $args);
				$related_products = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), $limit, $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' );
				$related_products = wc_products_array_orderby( $related_products, $args['orderby'], $args['order'] );
			}
			
			$lazy_load = function_exists('mymedi_get_theme_options')?mymedi_get_theme_options('ts_prod_lazy_load'):false;
			$placeholder_img_src = $lazy_load?mymedi_get_theme_options('ts_prod_placeholder_img')['url']:'';
			
			if( $related_products ){
				$count = 0;
				$num_posts = count($related_products);
				if( $num_posts <= $row ){
					$is_slider = false;
				}
				if( !$is_slider ){
					$row = $num_posts;
				}
				
				if( $is_slider && $show_nav ){
					$before_widget = str_replace('ts-related-products-widget', 'ts-related-products-widget has-nav', $before_widget);
				}
				echo $before_widget;
				if( $title ){
					echo $before_title . $title . $after_title;
				}
				
				$classes = array();
				$classes[] = 'ts-products-widget-wrapper related-products woocommerce';
				$classes[] = $is_slider?'ts-slider loading':'';
				$classes = array_filter($classes);
				?>
				
				<div class="<?php echo esc_attr(implode(' ', $classes)); ?>" data-show_nav="<?php echo esc_attr($show_nav) ?>" data-auto_play="<?php echo esc_attr($auto_play) ?>">
					<?php
					foreach( $related_products as $related_product ):
						$post = get_post( $related_product->get_id() );
						setup_postdata( $post );
						$product = $related_product;
					?>
						<?php if( $count % $row == 0 ): ?>
						<div class="per-slide">
							<ul class="product_list_widget">
						<?php endif; ?>
							<li>
								<a class="ts-wg-thumbnail" href="<?php echo esc_url( get_permalink($product->get_id()) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
									<?php  
										if ( $show_thumbnail ) {
											if( !$lazy_load ){
												echo $product->get_image();
											}
											else{
												$image_size = 'woocommerce_thumbnail';
												$img_src = '';
												$alt = '';
												$dimensions = wc_get_image_size( $image_size );
												if( has_post_thumbnail($product->get_id()) ){
													$post_thumbnail_id = get_post_thumbnail_id($product->get_id());
													$image_obj = wp_get_attachment_image_src($post_thumbnail_id, $image_size, 0);
													if( isset($image_obj[0]) ){
														$img_src = $image_obj[0];
													}
													$alt = trim(strip_tags( get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true) ));
												}
												else if( wc_placeholder_img_src() ){
													$img_src = wc_placeholder_img_src();
												}
												
												echo '<img src="'.esc_url($placeholder_img_src).'" data-src="'.esc_url($img_src).'" alt="'.esc_attr($alt).'" class="attachment-shop_thumbnail wp-post-image ts-lazy-load" width="'.$dimensions['width'].'" height="'.$dimensions['height'].'" />';
											}
										}
									?>
								</a>
								
								<div class="ts-wg-meta">
									<?php
									if( $show_categories && function_exists('mymedi_template_loop_categories') ){ 
										mymedi_template_loop_categories(); 
									}
									?>
									<?php if( $show_product_title ){ ?>
									<a href="<?php echo esc_url( $product->get_permalink() ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
										<?php echo esc_html( $product->get_title() ); ?>
									</a>
									<?php } ?>
									<?php
									if( $show_price ){ woocommerce_template_loop_price(); }
									if( $show_rating ){ woocommerce_template_loop_rating(); }
									?>
								</div>
							</li>
						<?php if( $count % $row == $row - 1 || $count == $num_posts - 1 ): ?>	
							</ul>
						</div>
						<?php endif; ?>
					<?php $count++; endforeach; ?>
				</div>
				<?php
				echo $after_widget;
			}
			
			wp_reset_postdata();
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;		
			$instance['title'] 				= strip_tags($new_instance['title']);
			$instance['product_type'] 		= $new_instance['product_type'];
			$instance['row'] 				= absint($new_instance['row']);
			$instance['limit'] 				= absint($new_instance['limit']);
			$instance['show_thumbnail'] 	= $new_instance['show_thumbnail'];
			$instance['show_categories'] 	= $new_instance['show_categories'];
			$instance['show_product_title'] = $new_instance['show_product_title'];
			$instance['show_price'] 		= $new_instance['show_price'];
			$instance['show_rating'] 		= $new_instance['show_rating'];
			$instance['is_slider'] 			= $new_instance['is_slider'];
			$instance['show_nav'] 			= $new_instance['show_nav'];
			$instance['auto_play'] 			= $new_instance['auto_play'];
			
			if( $instance['row'] > $instance['limit'] ){
				$instance['row'] = $instance['limit'];
			}
			return $instance;
		}

		function form( $instance ) {
			
			$defaults = array(
				'title'					=> 'Related Products'
				,'product_type'			=> 'recent'
				,'row'					=> '4'
				,'limit'				=> '4'
				,'show_thumbnail' 		=> 1
				,'show_categories' 		=> 0
				,'show_product_title' 	=> 1
				,'show_price' 			=> 1
				,'show_rating' 			=> 1
				,'is_slider'			=> 0
				,'show_nav' 			=> 1
				,'auto_play' 			=> 1
			);
		
			$instance = wp_parse_args( (array) $instance, $defaults );
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Enter your title', 'themesky'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('product_type'); ?>"><?php esc_html_e('Product type', 'themesky'); ?> </label>
				<select class="widefat" id="<?php echo $this->get_field_id('product_type'); ?>" name="<?php echo $this->get_field_name('product_type'); ?>">
					<option value="recent" <?php selected($instance['product_type'], 'recent'); ?>><?php esc_html_e('Recent', 'themesky'); ?></option>
					<option value="sale" <?php selected($instance['product_type'], 'sale'); ?>><?php esc_html_e('Sale', 'themesky'); ?></option>
					<option value="featured" <?php selected($instance['product_type'], 'featured'); ?>><?php esc_html_e('Featured', 'themesky'); ?></option>
					<option value="best_selling" <?php selected($instance['product_type'], 'best_selling'); ?>><?php esc_html_e('Best selling', 'themesky'); ?></option>
					<option value="top_rated" <?php selected($instance['product_type'], 'top_rated'); ?>><?php esc_html_e('Top rated', 'themesky'); ?></option>
					<option value="mixed_order" <?php selected($instance['product_type'], 'mixed_order'); ?>><?php esc_html_e('Mixed order', 'themesky'); ?></option>
				</select>
				<span class="description"><?php esc_html_e('This option is only used for the blog page', 'themesky'); ?></span>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('row'); ?>"><?php esc_html_e('Number of rows - in carousel slider', 'themesky'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('row'); ?>" name="<?php echo $this->get_field_name('row'); ?>" type="number" min="0" value="<?php echo esc_attr($instance['row']); ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('limit'); ?>"><?php esc_html_e('Number of posts to show', 'themesky'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="number" min="0" value="<?php echo esc_attr($instance['limit']); ?>" />
			</p>
			
			<p>
				<input type="checkbox" id="<?php echo $this->get_field_id('show_thumbnail'); ?>" name="<?php echo $this->get_field_name('show_thumbnail'); ?>" value="1" <?php echo ($instance['show_thumbnail'])?'checked':''; ?> />
				<label for="<?php echo $this->get_field_id('show_thumbnail'); ?>"><?php esc_html_e('Show thumbnail', 'themesky'); ?></label>
			</p>
			
			<p>
				<input type="checkbox" id="<?php echo $this->get_field_id('show_categories'); ?>" name="<?php echo $this->get_field_name('show_categories'); ?>" value="1" <?php echo ($instance['show_categories'])?'checked':''; ?> />
				<label for="<?php echo $this->get_field_id('show_categories'); ?>"><?php esc_html_e('Show categories', 'themesky'); ?></label>
			</p>
			
			<p>
				<input type="checkbox" id="<?php echo $this->get_field_id('show_product_title'); ?>" name="<?php echo $this->get_field_name('show_product_title'); ?>" value="1" <?php echo ($instance['show_product_title'])?'checked':''; ?> />
				<label for="<?php echo $this->get_field_id('show_product_title'); ?>"><?php esc_html_e('Show product title', 'themesky'); ?></label>
			</p>
			
			<p>
				<input type="checkbox" id="<?php echo $this->get_field_id('show_price'); ?>" name="<?php echo $this->get_field_name('show_price'); ?>" value="1" <?php echo ($instance['show_price'])?'checked':''; ?> />
				<label for="<?php echo $this->get_field_id('show_price'); ?>"><?php esc_html_e('Show price', 'themesky'); ?></label>
			</p>
			
			<p>
				<input type="checkbox" id="<?php echo $this->get_field_id('show_rating'); ?>" name="<?php echo $this->get_field_name('show_rating'); ?>" value="1" <?php echo ($instance['show_rating'])?'checked':''; ?> />
				<label for="<?php echo $this->get_field_id('show_rating'); ?>"><?php esc_html_e('Show rating', 'themesky'); ?></label>
			</p>
			
			<hr/>
			
			<p>
				<input type="checkbox" id="<?php echo $this->get_field_id('is_slider'); ?>" name="<?php echo $this->get_field_name('is_slider'); ?>" value="1" <?php echo ($instance['is_slider'])?'checked':''; ?> />
				<label for="<?php echo $this->get_field_id('is_slider'); ?>"><?php esc_html_e('Show in a carousel slider', 'themesky'); ?></label>
			</p>
			
			<p>
				<input type="checkbox" id="<?php echo $this->get_field_id('show_nav'); ?>" name="<?php echo $this->get_field_name('show_nav'); ?>" value="1" <?php echo ($instance['show_nav'])?'checked':''; ?> />
				<label for="<?php echo $this->get_field_id('show_nav'); ?>"><?php esc_html_e('Show navigation button', 'themesky'); ?></label>
			</p>
			
			<p>
				<input type="checkbox" id="<?php echo $this->get_field_id('auto_play'); ?>" name="<?php echo $this->get_field_name('auto_play'); ?>" value="1" <?php echo ($instance['auto_play'])?'checked':''; ?> />
				<label for="<?php echo $this->get_field_id('auto_play'); ?>"><?php esc_html_e('Auto play', 'themesky'); ?></label>
			</p>
			
			<?php 
		}
	}
}

