<?php $options = _WSH()->option();
	get_header();
	$settings  = ollo_set(ollo_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);
	$meta = _WSH()->get_meta('_bunch_layout_settings');
	$meta1 = _WSH()->get_meta('_bunch_header_settings');
	if(ollo_set($_GET, 'layout_style')) $layout = ollo_set($_GET, 'layout_style'); else
	$layout = ollo_set( $meta, 'layout', 'full' );
	$sidebar = ollo_set( $meta, 'sidebar', 'blog-sidebar' );
	$classes = ( !$layout || $layout == 'full' || ollo_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
	$bg = ollo_set($meta, 'header_img');
	$title = ollo_set($meta, 'header_title');
	$tagline = ollo_set($meta, 'header_tagline');
	$style_two = ollo_set($meta, 'header_banner_styles');
?>
    <div class="theme-inner-banner" <?php if($bg):?>style="background-image:url(<?php echo esc_url($bg)?>);"<?php endif;?>>
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
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 theme-blog-sidebarOne">        
				<aside class="sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
				</aside>
            </div>
			<?php } ?>
			<?php endif; ?>
            
            <!--Content Side-->	
            <div class="content-side <?php echo esc_attr($classes);?>">
                
                <!--Default Section-->
                    
                    <div class="blog-grid-post blog-details-content recent-news">
                        <div class="thm-unit-test">
						<?php while( have_posts() ): the_post();?>
                            <!-- blog post item -->
                            <?php the_content(); ?>
                            <?php comments_template(); ?><!-- end comments -->
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
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 theme-blog-sidebarOne">        
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