<?php ollo_bunch_global_variable();
	$options = _WSH()->option();
	get_header(); 
	$meta = _WSH()->get_term_meta( '_bunch_category_settings' );
	if(ollo_set($_GET, 'layout_style')) $layout = ollo_set($_GET, 'layout_style'); else
	$layout = ollo_set( $meta, 'layout', 'right' );
	$sidebar = ollo_set( $meta, 'sidebar', 'blog-sidebar' );
	$view = ollo_set( $meta, 'view', 'list' ) ? ollo_set( $meta, 'view', 'list' ) : 'list';
	_WSH()->page_settings = array('layout'=>$layout, 'sidebar'=>$sidebar);
	$classes = ( !$layout || $layout == 'full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12' : ' col-lg-9 col-md-8 col-sm-7 col-xs-12 ';
	if($layout == 'both') $classes = ' col-lg-6 col-md-6 col-sm-6 col-xs-12 ';  
	$bg = ollo_set($meta, 'header_img');
	$title = ollo_set($meta, 'header_title');
?>
<!-- Page Banner -->
<div class="theme-inner-banner" <?php if($bg):?>style="background-image:url(<?php echo esc_url($bg)?>);"<?php endif;?>>
    <div class="opacity">
        <div class="container">
            <h2><?php if($title) echo wp_kses_post($title); else wp_title('');?></h2>
           <?php echo wp_kses_post(ollo_get_the_breadcrumb()); ?>
        </div> <!-- /.container -->
    </div> <!-- /.opacity -->
</div> <!-- /.theme-inner-banner -->
<!-- Sidebar Page -->
<div class="blog-inner-page ollo-margin-top">
    <div class="container">
    	<div class="row clearfix"> 
			<!-- sidebar area -->
			<?php if( $layout == 'left' ): ?>
				<?php if ( is_active_sidebar( $sidebar ) ) { ?>
					<aside class="side-bar col-lg-3 col-md-4 col-sm-5 col-xs-12 theme-blog-sidebarOne">        
						<div class="sidebar">
							<?php dynamic_sidebar( $sidebar ); ?>
						</div>
				</aside>
				<?php } ?>
			<?php endif; ?>
			<!-- Side Bar -->
			<!-- Left Content -->
			<section class="left-content <?php echo esc_attr($classes);?>">
            	<div class="blog-grid-post recent-news">
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
				<!-- Pagination -->
				<?php ollo_the_pagination(); ?>
              </div>
			</section>
			<!-- sidebar area -->
			<!-- sidebar area -->
			<?php if( $layout == 'right' ): ?>
				<?php if ( is_active_sidebar( $sidebar ) ) { ?>
					<aside class="side-bar col-lg-3 col-md-4 col-sm-5 col-xs-12 theme-blog-sidebarOne">       
						<div class="sidebar">
							<?php dynamic_sidebar( $sidebar ); ?>
						</div>
					</aside>
				<?php }?>
			<?php endif; ?>
			<!-- sidebar area -->
		</div>
	</div>
</div>
<?php get_footer(); ?>