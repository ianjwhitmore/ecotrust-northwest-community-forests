<?php ollo_bunch_global_variable(); 
	$options = _WSH()->option();
	get_header(); 
	if( $wp_query->is_posts_page ) {
		$meta = _WSH()->get_meta('_bunch_layout_settings', get_queried_object()->ID);
		$meta1 = _WSH()->get_meta('_bunch_header_settings', get_queried_object()->ID);
		if(ollo_set($_GET, 'layout_style')) $layout = ollo_set($_GET, 'layout_style'); else
		$layout = ollo_set( $meta, 'layout', 'right' );
		$sidebar = ollo_set( $meta, 'sidebar', 'default-sidebar' );
		$bg = ollo_set($meta1, 'header_img');
		$bg = ($bg) ? $bg : get_template_directory_uri().'/images/inner-page/banner-4.jpg';
		$title = ollo_set($meta1, 'header_title');
	} else {
		$settings  = _WSH()->option(); 
		if(ollo_set($_GET, 'layout_style')) $layout = ollo_set($_GET, 'layout_style'); else
		$layout = ollo_set( $settings, 'archive_page_layout', 'right' );
		$sidebar = ollo_set( $settings, 'archive_page_sidebar', 'default-sidebar' );
		$bg = ollo_set($settings, 'archive_page_header_img');
		$bg = ($bg) ? $bg : get_template_directory_uri().'/images/inner-page/banner-4.jpg';
		$title = ollo_set($settings, 'archive_page_header_title');
	}
	$layout = ollo_set( $_GET, 'layout' ) ? ollo_set( $_GET, 'layout' ) : $layout;
	$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
	_WSH()->page_settings = array('layout'=>'right', 'sidebar'=>$sidebar);
	$classes = ( !$layout || $layout == 'full' || ollo_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-8 col-md-8 col-sm-12 col-xs-12 ' ;
	?>
	<!--Page Title-->
    <div class="theme-inner-banner" <?php if($bg):?>style="background-image:url(<?php echo esc_url($bg)?>);"<?php endif;?>>
        <div class="opacity">
            <div class="container">
                <h2><?php if($title) echo wp_kses_post($title); else esc_html_e('Blog', 'ollo');?></h2>
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
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 blog-sidebar theme-blog-sidebarOne">        
                    <aside class="sidebar">
                        <?php dynamic_sidebar( $sidebar ); ?>
                    </aside>
                </div>
                <?php } ?>
                <?php endif; ?>
                
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
                <!--Content Side-->
                
                <!--Sidebar-->	
                <!-- sidebar area -->
                <?php if( $layout == 'right' ): ?>
                <?php if ( is_active_sidebar( $sidebar ) ) { ?>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 blog-sidebar theme-blog-sidebarOne">        
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