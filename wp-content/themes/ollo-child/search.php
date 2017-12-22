<?php ollo_bunch_global_variable();
	$options = _WSH()->option();
	get_header(); 
	$meta = _WSH()->get_term_meta( '_bunch_category_settings' );
	_WSH()->page_settings = $meta; 
	if(ollo_set($_GET, 'layout_style')) $layout = ollo_set($_GET, 'layout_style'); else
	$layout = ollo_set( $meta, 'layout', 'right' );
	$sidebar = ollo_set( $meta, 'sidebar', 'blog-sidebar' );
	$classes = ( !$layout || $layout == 'full' || ollo_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
	$bg = ollo_set($meta, 'header_img');
	$title = ollo_set($meta, 'header_title');
?>
<!--Page Title-->
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
            
            
            
            <!--Content Side-->	
            <div class="<?php echo esc_attr($classes);?>">
                

					<?php 
						
						if ( have_posts() ): ?>

					<div class="kc_clfw"></div>
    
    
					<section class="kc-elm kc-css-234645 kc_row">
					    
					    <div class="kc-row-container  kc-container">
						    <div class="kc-wrap-columns">
							    <div class="kc-elm kc-css-563359 kc_col-sm-12 kc_column kc_col-sm-12">
								    <div class="kc-col-container">
										<div class="kc-elm kc-css-372736 kc-blog-posts kc-blog-posts-3 kc-blog-grid kc_blog_masonry kc-image-align-both">
											

						
					<?php while( have_posts() ): the_post();?>
							
							<?php get_template_part( 'blog' ); ?>

					<?php endwhile; ?>

										</div>
								    </div>
							    </div>
						    </div>
					    </div>
					    
					</section>

						
					<?php else:
						
						echo '<h2 class="aligncenter">Sorry, there are no posts to display.</h2>';
						
						
						endif;?>
                    <!--Pagination-->
                    <?php ollo_the_pagination(); ?>
            </div>
            <!--Content Side-->
            
           
        </div>
    </div>
</div>

<?php get_footer(); ?>