<?php
/**
 *	Template Name: Blog Template
 */	
get_header();

global $post;
setup_postdata( $post );

$page_options = mymedi_get_page_options();

$extra_class = 'columns-' . mymedi_get_theme_options('ts_blog_columns');

$page_column_class = mymedi_page_layout_columns_class($page_options['ts_page_layout']);

$show_breadcrumb = ( !is_home() && !is_front_page() && $page_options['ts_show_breadcrumb'] );
$show_page_title = ( !is_home() && !is_front_page() && $page_options['ts_show_page_title'] );

if( $show_breadcrumb || $show_page_title ){
	$extra_class .= ' show_breadcrumb_' . mymedi_get_theme_options('ts_breadcrumb_layout');
}

mymedi_breadcrumbs_title($show_breadcrumb, $show_page_title, get_the_title());
	
?>
<div class="page-template blog-template page-container container-post <?php echo esc_attr($extra_class) ?>">
	<!-- Page slider -->
	<?php if( $page_options['ts_page_slider'] && $page_options['ts_page_slider_position'] == 'before_main_content' ): ?>
	<div class="top-slideshow">
		<div class="top-slideshow-wrapper">
			<?php mymedi_show_page_slider(); ?>
		</div>
	</div>
	<?php endif; ?>

	<!-- Left Sidebar -->
	<?php if( $page_column_class['left_sidebar'] ): ?>
		<aside id="left-sidebar" class="ts-sidebar <?php echo esc_attr($page_column_class['left_sidebar_class']); ?>">
		<?php if( is_active_sidebar($page_options['ts_left_sidebar']) ): ?>
			<?php dynamic_sidebar( $page_options['ts_left_sidebar'] ); ?>
		<?php endif; ?>
		</aside>
	<?php endif; ?>			
	
	<div id="main-content" class="<?php echo esc_attr($page_column_class['main_class']); ?>">	
		<div id="primary" class="site-content">
			
			<article <?php post_class(); ?>>
				<?php the_content(); ?>
			</article>
			
			<?php
				$paged = 1;
				if( is_paged() ){
					$paged = get_query_var('page');
					if( !$paged ){
						$paged = get_query_var('paged');
					}
				}
				
				$banner = '';
				$showed_banner = false;
				$count = 0;
				$columns = mymedi_get_theme_options('ts_blog_columns');
				if( $paged == 1 ){
					$banner = mymedi_get_theme_options('ts_blog_banner');
					$banner = isset($banner['url'])?$banner['url']:'';
				}
				
				$args = array(
					'post_type' => 'post'
					,'paged' => $paged
					);
				
				$args = apply_filters('mymedi_blog_template_query_args', $args);
				
				$posts = new WP_Query( $args );
				if( $posts->have_posts() ):
					echo '<div class="list-posts">';
					while( $posts->have_posts() ) : $posts->the_post();
						get_template_part( 'content', get_post_format() ); 
						
						if( !$showed_banner && $banner ){
							if( !is_sticky() ){
								$count++;
								if( $count == $columns ){
									echo '<div class="ts-blog-banner">';
										echo '<a href="'.esc_url(mymedi_get_theme_options('ts_blog_banner_link')).'">';
											echo '<img src="'.esc_url($banner).'" alt="'.esc_attr__('Blog Banner', 'mymedi').'" />';
										echo '</a>';
									echo '</div>';
									$showed_banner = true;
								}
							}
						}
					endwhile;
					echo '</div>';
					
					wp_reset_postdata();
				else:
					echo '<div class="alert alert-error">'.esc_html__('Sorry. There are no posts to display', 'mymedi').'</div>';
				endif;
				
				mymedi_pagination($posts);
			?>

		</div>
	</div>
	
	
	<!-- Right Sidebar -->
	<?php if( $page_column_class['right_sidebar'] ): ?>
		<aside id="right-sidebar" class="ts-sidebar <?php echo esc_attr($page_column_class['right_sidebar_class']); ?>">
		<?php if( is_active_sidebar($page_options['ts_right_sidebar']) ): ?>
			<?php dynamic_sidebar( $page_options['ts_right_sidebar'] ); ?>
		<?php endif; ?>
		</aside>
	<?php endif; ?>	
		
</div><!-- #container -->
<?php get_footer(); ?>