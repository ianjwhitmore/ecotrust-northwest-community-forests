<?php $options = _WSH()->option();
	get_header(); 
	$settings  = ollo_set(ollo_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);
	$meta = _WSH()->get_meta('_bunch_layout_settings');
	$meta1 = _WSH()->get_meta('_bunch_header_settings');
	$bg = (ollo_set($meta1, 'header_img')) ? ollo_set($meta1, 'header_img') : get_template_directory_uri().'/images/inner-page/banner-4.jpg';
	$title = ollo_set($meta1, 'header_title');
	$description = (ollo_set($meta1, 'header_description')) ? ollo_set($meta1, 'header_description') : '';
	$meta2 = _WSH()->get_meta();
	_WSH()->page_settings = $meta;
	if(ollo_set($_GET, 'layout_style')) $layout = ollo_set($_GET, 'layout_style'); else
	$layout = ollo_set( $meta, 'layout', 'full' );
	if( !$layout || $layout == 'full' || ollo_set($_GET, 'layout_style')=='full' ) $sidebar = ''; else
	$sidebar = ollo_set( $meta, 'sidebar', 'blog-sidebar' );
	$classes = ( !$layout || $layout == 'full' || ollo_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-8 col-md-8 col-sm-12 col-xs-12 ' ;
	_WSH()->post_views( true );
	
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
                <div class="theme-blog-large-sideOne">
                    <!--Default Section-->
                    <div class="blog-details-content recent-news">
                        <div class="thm-unit-test">
						<?php while( have_posts() ): the_post(); 
                            $post_meta = _WSH()->get_meta();
							$term_list = wp_get_post_terms(get_the_id(), 'category', array("fields" => "names"));
                        ?>
                        <!--Blog Post-->
                        <div class="single-news">
                        	<?php //if(has_post_thumbnail()):?>
								<?php //the_post_thumbnail('ollo_1170x400', array('class' => 'img-responsive'));?>
                            <?php //endif;?>
                                <div class="post">
                                	<div class="tag ch-p-bg-color"><?php echo implode( ', ', (array)$term_list );?></div>
                                    <?php the_content(); ?>
                                    <span class="tags"><?php the_tags('Tags: ', ' ');?></span>
                                    <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'ollo'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                                    <br>
                                    <div class="post-tag">
										<ul>
											<li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments');?>" class="tran3s"><i class="tran3s fa fa-comment" aria-hidden="true"></i> <?php comments_number( 0 ); ?></a></li>
										</ul>
										<a href="<?php echo esc_url(get_permalink(get_the_id())); ?>" class="share tran3s"><i class="fa fa-share" aria-hidden="true"></i></a>
									</div>
									
									<br clear="all" />
									
                                </div>
                            
                            <!--Comments Area-->
                            <?php //comments_template(); ?><!-- end comments -->    
                        </div>
                        <?php endwhile;?>
                    	</div>
                    </div>
           		</div>
            </div>
            <!--Content Side-->
            
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
        </div>
    </div>
</div>

<?php get_footer(); ?>