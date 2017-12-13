<?php ollo_bunch_global_variable(); 
	$options = _WSH()->option();
	get_header(); 
	$settings  = _WSH()->option();
	if(ollo_set($_GET, 'layout_style')) $layout = ollo_set($_GET, 'layout_style'); else
	$layout = ollo_set( $settings, 'archive_page_layout', 'right' );
	if( !$layout || $layout == 'full' || ollo_set($_GET, 'layout_style')=='full' ) $sidebar = ''; else
	$sidebar = ollo_set( $settings, 'archive_page_sidebar', 'blog-sidebar' );
	_WSH()->page_settings = array('layout'=>$layout, 'sidebar'=>$sidebar);
	$classes = ( !$layout || $layout == 'full' || ollo_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
?>
<!--Page Title-->
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
<div class="sidebar-page no-padd-top">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!-- sidebar area -->
			<?php if( $layout == 'left' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
			<div class="col-lg-3 col-md-4 col-sm-12 col-xs-1 theme-blog-sidebarOne2">        
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
                    <!--Pagination-->
                    <?php ollo_the_pagination(); ?>
                    </div>
            </div>
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