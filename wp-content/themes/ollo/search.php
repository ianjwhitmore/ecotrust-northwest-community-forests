<?php ollo_bunch_global_variable();
	$options = _WSH()->option();
	get_header(); 
	$settings  = _WSH()->option(); 
	if(ollo_set($_GET, 'layout_style')) $layout = ollo_set($_GET, 'layout_style'); else
	$layout = ollo_set( $settings, 'search_page_layout', 'right' );
	$sidebar = ollo_set( $settings, 'search_page_sidebar', 'blog-sidebar' );
	_WSH()->page_settings = array('layout'=>$layout, 'sidebar'=>$sidebar);
	$classes = ( !$layout || $layout == 'full' || ollo_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
?>
<!--Page Title-->
    <div class="theme-inner-banner">
        <div class="opacity">
            <div class="container">
                <h2><?php if($title) echo wp_kses_post($title); else wp_title('');?></h2>
               <?php echo wp_kses_post(ollo_get_the_breadcrumb()); ?>
            </div> <!-- /.container -->
        </div> <!-- /.opacity -->
    </div> <!-- /.theme-inner-banner -->

<!--Sidebar Page-->
<div class="blog-inner-page ollo-margin-top">
    <div class="container">
    	<div class="row clearfix"> 
            
            <!-- sidebar area -->
			<?php if( $layout == 'left' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
			<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 theme-blog-sidebarOne">        
				<aside class="sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
				</aside>
            </div>
			<?php } ?>
			<?php endif; ?>
            
            <?php if(have_posts()):?>
            <!--Content Side-->	
            <div class="<?php echo esc_attr($classes);?>">
                
                <!--Default Section-->
                <div class="blog-grid-post recent-news">
                    <!--Blog Post-->
                    <div class="thm-unit-test">
					<?php while( have_posts() ): the_post();?>
						<!-- blog post item -->
						<!-- Post -->
						<div id="post-<?php the_ID(); ?>" <?php post_class();?>>
							<?php get_template_part( 'blog' ); ?>
						<!-- blog post item -->
						</div><!-- End Post -->
					<?php endwhile;?>
                    </div>
                    <?php ollo_the_pagination(); ?>
                </div>
            </div>
			<?php else : ?>
                <div class="<?php echo esc_attr($classes);?> blog_post_area eco-search">
                    <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ollo' ); ?></p>
                    <aside>
                    <?php get_search_form(); ?>
                    </aside>
                </div>
			<?php endif; ?>
            <!--Content Side-->
            
            <!--Sidebar-->	
            <!-- sidebar area -->
			<?php if( $layout == 'right' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
			<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 theme-blog-sidebarOne">        
				<aside class="sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
				</aside>
            </div>
			<?php } ?>
			<?php endif; ?>
            <!--Sidebar-->
        </div>
    </div>
</div>

<?php get_footer(); ?>