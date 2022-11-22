<?php 
if( !class_exists('TS_Importer') ){
	class TS_Importer{

		function __construct(){
			add_filter( 'ocdi/plugin_page_title', array($this, 'import_notice') );
			
			add_filter( 'pt-ocdi/time_for_one_ajax_call', array($this, 'change_time_of_single_ajax_call') );
			add_filter( 'pt-ocdi/plugin_page_setup', array($this, 'import_page_setup') );
			add_action( 'pt-ocdi/before_widgets_import', array($this, 'before_widgets_import') );
			add_filter( 'pt-ocdi/import_files', array($this, 'import_files') );
			add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );
			add_action( 'pt-ocdi/after_import', array($this, 'after_import_setup') );
			
			add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
		}
		
		function import_notice( $plugin_title ){
			$allowed_html = array(
				'a' => array( 'href' => array(), 'target' => array() )
			);
			ob_start();
			?>
			<div class="ts-ocdi-notice-info">
				<p>
					<i class="fas fa-exclamation-circle"></i>
					<span><?php echo wp_kses( __('If you have any problem with importer, please read this article <a href="https://ocdi.com/import-issues/" target="_blank">https://ocdi.com/import-issues/</a> and check your hosting configuration, or contact our support team here <a href="https://skygroup.ticksy.com/" target="_blank">https://skygroup.ticksy.com/</a>.', 'themesky'), $allowed_html ); ?></span>
				</p>
			</div>
			<?php
			$plugin_title .= ob_get_clean();
			return $plugin_title;
		}
		
		function change_time_of_single_ajax_call(){
			return 28; /* 28s */
		}
		
		function import_page_setup( $default_settings ){
			$default_settings['parent_slug'] = 'themes.php';
			$default_settings['page_title']  = esc_html__( 'MyMedi - Import Demo Content' , 'themesky' );
			$default_settings['menu_title']  = esc_html__( 'MyMedi Importer' , 'themesky' );
			$default_settings['capability']  = 'import';
			$default_settings['menu_slug']   = 'mymedi-importer';
			return $default_settings;
		}
		
		function before_widgets_import(){
			global $wp_registered_sidebars;
			$file_path = dirname(__FILE__) . '/data/custom_sidebars.txt';
			if( file_exists($file_path) ){
				$file_url = plugin_dir_url(__FILE__) . 'data/custom_sidebars.txt';
				$custom_sidebars = wp_remote_get( $file_url );
				$custom_sidebars = maybe_unserialize( trim( $custom_sidebars['body'] ) );
				update_option('ts_custom_sidebars', $custom_sidebars);
				
				if( is_array($custom_sidebars) && !empty($custom_sidebars) ){
					foreach( $custom_sidebars as $name ){
						$custom_sidebar = array(
											'name' 			=> ''.$name.''
											,'id' 			=> sanitize_title($name)
											,'description' 	=> ''
											,'class'		=> 'ts-custom-sidebar'
										);
						if( !isset($wp_registered_sidebars[$custom_sidebar['id']]) ){
							$wp_registered_sidebars[$custom_sidebar['id']] = $custom_sidebar;
						}
					}
				}
			}
		}
		
		function import_files(){
			return array(
				array(
					'import_file_name'           => 'Demo Import',
					'import_file_url'            => plugin_dir_url( __FILE__ ) . 'data/content.xml',
					'import_widget_file_url'     => plugin_dir_url( __FILE__ ) . 'data/widget_data.wie',
					'import_redux'               => array(
						array(
							'file_url'    => plugin_dir_url( __FILE__ ) . 'data/redux.json',
							'option_name' => 'mymedi_theme_options',
						),
					)
				)
			);
		}
		
		function after_import_setup(){
			set_time_limit(0);
			$this->woocommerce_settings();
			$this->menu_locations();
			$this->set_homepage();
			$this->import_revslider();
			$this->change_url();
			$this->update_product_category_id_in_homepage_content();
			$this->update_menu_homepage();
			$this->delete_transients();
			$this->update_woocommerce_lookup_table();
			$this->update_menu_term_count();
		}
		
		/* WooCommerce Settings */
		function woocommerce_settings(){
			$woopages = array(
				'woocommerce_shop_page_id' 			=> 'Shop'
				,'woocommerce_cart_page_id' 		=> 'Shopping cart'
				,'woocommerce_checkout_page_id' 	=> 'Checkout'
				,'woocommerce_myaccount_page_id' 	=> 'My Account'
				,'yith_wcwl_wishlist_page_id' 		=> 'Wishlist'
			);
			foreach( $woopages as $woo_page_name => $woo_page_title ) {
				$woopage = get_page_by_title( $woo_page_title );
				if( isset( $woopage->ID ) && $woopage->ID ) {
					update_option($woo_page_name, $woopage->ID);
				}
			}
			
			if( class_exists('YITH_Woocompare') ){
				update_option('yith_woocompare_compare_button_in_products_list', 'yes');
			}

			if( class_exists('WC_Admin_Notices') ){
				WC_Admin_Notices::remove_notice('install');
			}
			delete_transient( '_wc_activation_redirect' );
			
			flush_rewrite_rules();
		}
		
		/* Menu Locations */
		function menu_locations(){
			$locations = get_theme_mod( 'nav_menu_locations' );
			$menus = wp_get_nav_menus();

			if( $menus ){
				foreach( $menus as $menu ){
					if( $menu->name == 'Main Menu' ){
						$locations['primary'] = $menu->term_id;
					}
					if( $menu->name == 'Menu mobile' ){
						$locations['mobile'] = $menu->term_id;
					}
					if( $menu->name == 'Top Header Navigation' ){
						$locations['top_header'] = $menu->term_id;
					}
				}
			}
			set_theme_mod( 'nav_menu_locations', $locations );
		}
		
		/* Set Homepage */
		function set_homepage(){
			$homepage = get_page_by_title( 'Home' );
			if( isset( $homepage->ID ) ){
				update_option('show_on_front', 'page');
				update_option('page_on_front', $homepage->ID);
			}
		}
		
		/* Import Revolution Slider */
		function import_revslider(){
			if ( class_exists( 'RevSliderSliderImport' ) ) {
				$rev_directory = dirname(__FILE__) . '/data/revslider/';
			
				foreach( glob( $rev_directory . '*.zip' ) as $file ){
					$import = new RevSliderSliderImport();
					$import->import_slider(true, $file);  
				}
			}
		}
		
		/* Change url */
		function change_url(){
			global $wpdb;
			$wp_prefix = $wpdb->prefix;
			$import_url = 'https://demo.theme-sky.com/mymedi-import';
			$site_url = get_option( 'siteurl', '' );
			$wpdb->query("update `{$wp_prefix}posts` set `guid` = replace(`guid`, '{$import_url}', '{$site_url}');");
			$wpdb->query("update `{$wp_prefix}posts` set `post_content` = replace(`post_content`, '{$import_url}', '{$site_url}');");
			$wpdb->query("update `{$wp_prefix}posts` set `post_title` = replace(`post_title`, '{$import_url}', '{$site_url}') where post_type='nav_menu_item';");
			$wpdb->query("update `{$wp_prefix}postmeta` set `meta_value` = replace(`meta_value`, '{$import_url}', '{$site_url}');");
			
			$option_name = 'mymedi_theme_options';
			$option_ids = array(
						'ts_logo'
						,'ts_logo_mobile'
						,'ts_logo_sticky'
						,'ts_favicon'
						,'ts_image_not_found'
						,'ts_banner_image_footer'
						,'ts_custom_loading_image'
						,'ts_blog_banner'
						,'ts_blog_banner_link'
						,'ts_blog_details_related_posts_bg'
						,'ts_portfolio_related_bg'
						,'ts_bg_breadcrumbs'
						,'ts_prod_placeholder_img'
						,'ts_prod_cat_bottom_content'
						,'ts_prod_related_upsells_bg'
						,'ts_prod_bottom_content'
						);
			$theme_options = get_option($option_name);
			if( is_array($theme_options) ){
				foreach( $option_ids as $option_id ){
					if( isset($theme_options[$option_id]) ){
						$theme_options[$option_id] = str_replace($import_url, $site_url, $theme_options[$option_id]);
					}
				}
				update_option($option_name, $theme_options);
			}
			
			$widgets = array(
				'media_image' 		=> array('url', 'link_url')
				,'ts_single_image' 	=> array('img_url')
			);
			foreach( $widgets as $base => $fields ){
				$widget_instances = get_option( 'widget_' . $base, array() );
				if( is_array($widget_instances) ){
					foreach( $widget_instances as $number => $instance ){
						if( $number == '_multiwidget' ){
							continue;
						}
						foreach( $fields as $field ){
							if( isset($widget_instances[$number][$field]) ){
								$widget_instances[$number][$field] = str_replace($import_url, $site_url, $widget_instances[$number][$field]);
							}
						}
					}
					update_option( 'widget_' . $base, $widget_instances );
				}
			}
		}
		
		/* Update Product Category Id In Homepage Content */
		function update_product_category_id_in_homepage_content(){
			$product_cats = get_terms( array(
							'taxonomy'		=> 'product_cat'
							,'hide_empty'	=> true
							,'orderby'		=> 'count'
							,'order'		=> 'desc'
						)
					);
			if( is_array($product_cats) && count($product_cats) > 0 ){
				$product_cats = wp_list_pluck( $product_cats, 'term_id' );
				$product_cats = array_values($product_cats);
				
				$pages = array(
					'Home'	=> array(
							'271, 293, 393'
					)
					,'Home 3'	=> array(
							'271, 293, 393'
					)
					,'Home 4'	=> array(
							'271, 293, 393'
					)
					,'Home 5'	=> array(
							'293'
							,'271'
							,'272'
					)
				);
				foreach( $pages as $page_title => $need_replaced_cats ){
					$page = get_page_by_title( $page_title );
					if( is_object( $page ) ){
						$index = 0;
						foreach( $need_replaced_cats as $need_replaced_cat ){
							$num_cat = count( explode(',', $need_replaced_cat) );
							$replaced_cats = array();
							for( $i = 0; $i < $num_cat; $i++ ){
								if( !isset($product_cats[$index]) ){
									$index = 0;
								}
								$replaced_cats[] = $product_cats[$index];
								$index++;
							}
							$replaced_cats = array_unique($replaced_cats);
							$page->post_content = str_replace('product_cats="'.$need_replaced_cat.'"', 'product_cats="'.implode(',', $replaced_cats).'"', $page->post_content);
						}
						wp_update_post( $page );
					}
				}
			}
			
			$loaded_categories = array();
			
			/* Update ids of product categories shortcode */
			$pages = array(
					'Home'	=> array(
							array(
								'293, 403, 414, 272, 271'
								, array( 'Face masks', 'Uniforms', 'Protective covers', 'Dental', 'Blood pressure' )
							)
					)
					,'Home 2'	=> array(
							array(
								'273, 265, 272, 279, 427, 428, 411'
								, array( 'Bandages', 'Capsules', 'Dental', 'Thermometer', 'Heart Health', 'Micrscope', 'Tubes' )
							)
					)
					,'Home 3'	=> array(
							array(
								'273, 265, 272, 279, 427, 428, 411'
								, array( 'Bandages', 'Capsules', 'Dental', 'Thermometer', 'Heart Health', 'Micrscope', 'Tubes' )
							)
					)
					,'Home 5'	=> array(
							array(
								'293, 403, 414, 272, 271, 429'
								, array( 'Face masks', 'Uniforms', 'Protective covers', 'Dental', 'Blood pressure', 'Sugar level' )
							)
					)
					,'Home 8'	=> array(
							array(
								'293, 414, 403, 272'
								, array( 'Face masks', 'Protective covers', 'Uniforms', 'Dental' )
							)
					)
				);
			foreach( $pages as $page_title => $cat_ids_names ){
				$page = get_page_by_title( $page_title );
				if( is_object( $page ) ){
					foreach( $cat_ids_names as $cat_id_name ){
						$cat_ids = array();
						foreach( $cat_id_name[1] as $cat_name ){
							$loaded_id = array_search($cat_name, $loaded_categories);
							if( $loaded_id ){
								$cat_ids[] = $loaded_id;
							}
							else{
								$cat = get_term_by('name', $cat_name, 'product_cat');
								if( isset($cat->term_id) ){
									$cat_ids[] = $cat->term_id;
									$loaded_categories[$cat->term_id] = $cat_name;
								}
							}
						}
						$cat_ids = implode(',', $cat_ids);
						$page->post_content = str_replace('ids="'.$cat_id_name[0].'"', 'ids="'.$cat_ids.'"', $page->post_content);
					}
					wp_update_post( $page );
				}
			}
			
			/* Update parent of list of product categories shortcode */
			$pages = array(
				'Home' => array(
					'page'
					,array( '392', '399', '406', '412', '303', '426' )
					,array( 'Wound Care', 'Higiene', 'Laboratory', 'Tools', 'Diagnosis', 'Equipment' )
				)
				,'Footer 2' => array(
					'ts_footer_block'
					,array( '392', '399', '406', '412', '303', '426' )
					,array( 'Wound Care', 'Higiene', 'Laboratory', 'Tools', 'Diagnosis', 'Equipment' )
				)
				,'Footer 3' => array(
					'ts_footer_block'
					,array( '392', '399', '406', '412', '303', '426' )
					,array( 'Wound Care', 'Higiene', 'Laboratory', 'Tools', 'Diagnosis', 'Equipment' )
				)
				,'Footer 4' => array(
					'ts_footer_block'
					,array( '392', '399', '406', '412', '303', '426' )
					,array( 'Wound Care', 'Higiene', 'Laboratory', 'Tools', 'Diagnosis', 'Equipment' )
				)
				,'Footer 5' => array(
					'ts_footer_block'
					,array( '392', '399', '406', '412', '303', '426' )
					,array( 'Wound Care', 'Higiene', 'Laboratory', 'Tools', 'Diagnosis', 'Equipment' )
				)
			);
			
			foreach( $pages as $page_title => $page_data ){
				$page = get_page_by_title( $page_title, 'OBJECT', $page_data[0] );
				if( is_object( $page ) ){
					$old_parents = array();
					$new_pagents = array();
					foreach( $page_data[1] as $cat_id ){
						$old_parents[] = 'parent="'.$cat_id.'"';
					}
					
					foreach( $page_data[2] as $cat_name ){
						$loaded_id = array_search($cat_name, $loaded_categories);
						if( $loaded_id ){
							$new_pagents[] = 'parent="'.$loaded_id.'"';
						}
						else{
							$cat = get_term_by('name', $cat_name, 'product_cat');
							if( isset($cat->term_id) ){
								$new_pagents[] = 'parent="'.$cat->term_id.'"';
								$loaded_categories[$cat->term_id] = $cat_name;
							}
						}
					}
					
					$page->post_content = str_replace($old_parents, $new_pagents, $page->post_content);
					wp_update_post( $page );
				}
			}
			
			/* Update parent of list of product categories shortcode in menu */
			if( !empty($old_parents) ){ /* Use the last data above */
				global $wpdb;
				$sql = "SELECT * FROM {$wpdb->prefix}postmeta WHERE meta_key = '_menu_item_ts_static_html' and meta_value like '% parent=%';";
				$rows = $wpdb->get_results( $sql );
				if( is_array($rows) && !empty($rows) ){
					foreach( $rows as $row ){
						$post_id = $row->post_id;
						$meta_value = $row->meta_value;
						$meta_value = str_replace($old_parents, $new_pagents, $meta_value);
						update_post_meta($post_id, '_menu_item_ts_static_html', $meta_value);
					}
				}
			}
			
			/* Header categories */
			$option_name = 'mymedi_theme_options';
			$theme_options = get_option($option_name);
			if( is_array($theme_options) ){
				if( isset($theme_options['ts_header_product_categories']) ){
					$header_categories = array();
					$cat_names = array( 'Bandages', 'Capsules', 'Dental', 'Heart Health', 'Micrscope', 'Thermometer', 'Tubes' );
					foreach( $cat_names as $cat_name ){
						$loaded_id = array_search($cat_name, $loaded_categories);
						if( $loaded_id ){
							$header_categories[] = $loaded_id;
						}
						else{
							$cat = get_term_by('name', $cat_name, 'product_cat');
							if( isset($cat->term_id) ){
								$header_categories[] = $cat->term_id;
								$loaded_categories[$cat->term_id] = $cat_name;
							}
						}
					}
					
					$theme_options['ts_header_product_categories'] = $header_categories;
					update_option($option_name, $theme_options);
				}
			}
		}
		
		/* Set menu for home pages */
		function update_menu_homepage(){
			$pages = array(
				'Home 3' => 'Main Menu 3'
				,'Home 4' => 'Main Menu 3'
				,'Home 6' => 'Main Menu 3'
				,'Home 7' => 'Main Menu 5'
				,'Home 8' => 'Main Menu 7'
				,'Home 9' => 'Main Menu 6'
				,'Home 10' => 'Main Menu 6'
				,'Home 11' => 'Main Menu 8'
				,'Home 12' => 'Main Menu 8'
				,'Home 15' => 'Main Menu 8'
			);
			
			foreach( $pages as $page_title => $page_menu ){
				$page = get_page_by_title( $page_title );
				if( is_object( $page ) ){
					$menu = get_term_by( 'name', $page_menu, 'nav_menu' );
					if( isset($menu->term_id) ){
						update_post_meta( $page->ID, 'ts_menu_id', $menu->term_id );
					}
				}
			}
		}
		
		/* Delete transient */
		function delete_transients(){
			delete_transient('ts_mega_menu_custom_css');
			delete_transient('ts_product_deals_ids');
			delete_transient('wc_products_onsale');
		}
		
		/* Update WooCommerce Loolup Table */
		function update_woocommerce_lookup_table(){
			if( function_exists('wc_update_product_lookup_tables_is_running') && function_exists('wc_update_product_lookup_tables') ){
				if( !wc_update_product_lookup_tables_is_running() ){
					if( !defined('WP_CLI') ){
						define('WP_CLI', true);
					}
					wc_update_product_lookup_tables();
				}
			}
		}
		
		/* Update Menu Term Count - Keep this function until One Click Demo Import fixed */
		function update_menu_term_count(){
			$args = array(
						'taxonomy'		=> 'nav_menu'
						,'hide_empty'	=> 0
						,'fields'		=> 'ids'
					);
			$menus = get_terms( $args );
			if( is_array($menus) ){
				wp_update_term_count_now( $menus, 'nav_menu' );
			}
		}
	}
	new TS_Importer();
}
?>