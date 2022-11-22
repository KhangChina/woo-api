<?php 
get_header();

$theme_options = mymedi_get_theme_options();

$image_404 = $theme_options['ts_image_not_found'];
$image_404 = !empty($image_404['url'])?$image_404['url']:'';

mymedi_breadcrumbs_title(true, false, '');
?>
	<div class="page-container show_breadcrumb_<?php echo esc_attr($theme_options['ts_breadcrumb_layout']); ?>">
		<div id="main-content">	
			<div id="primary" class="site-content">
				<article>
					<div class="not-found ts-col-24">
						<div class="content-404 <?php echo ('' != $image_404)?'ts-col-14':'ts-col-24'; ?>">
							<h1><?php esc_html_e('404', 'mymedi'); ?></h1>
							<h5 class="h1-big"><?php esc_html_e('This page has been probably moved somewhere...', 'mymedi'); ?></h5>
							<p class="h3 font-normal body-color"><?php esc_html_e('Please back to homepage or check our offer', 'mymedi'); ?></p>
							<a href="<?php echo esc_url( home_url('/') ) ?>" class="button"><?php esc_html_e('Back to homepage', 'mymedi'); ?></a>
						</div>
						
						<?php if( $image_404 ): ?>
							<div class="image-404 ts-col-10">
								<img src="<?php echo esc_url($image_404); ?>" alt="<?php esc_attr_e('404 image', 'mymedi'); ?>" />
							</div>
						<?php endif; ?>
					</div>
					
					<?php
					if( class_exists('WooCommerce') && shortcode_exists('ts_products') && apply_filters('mymedi_show_product_on_404_page', true) ){
						$atts = array();
						$atts[] = 'show_title="'.$theme_options['ts_prod_cat_title'].'"';
						$atts[] = 'show_sku="'.$theme_options['ts_prod_cat_sku'].'"';
						$atts[] = 'show_price="'.$theme_options['ts_prod_cat_price'].'"';
						$atts[] = 'show_rating="'.$theme_options['ts_prod_cat_rating'].'"';
						$atts[] = 'show_label="'.$theme_options['ts_prod_cat_label'].'"';
						$atts[] = 'show_categories="'.$theme_options['ts_prod_cat_cat'].'"';
						$atts[] = 'show_add_to_cart="'.$theme_options['ts_prod_cat_add_to_cart'].'"';
					?>
					<div class="latest-products ts-col-24">
						<?php echo do_shortcode('[ts_products title="'.esc_attr__('Latest products', 'mymedi').'" columns="5" per_page="7" is_slider="1" show_dots="1" '.implode(' ', $atts).']'); ?>
					</div>
					<?php
					}
					?>
					
				</article>
			</div>
		</div>
	</div>
<?php
get_footer();