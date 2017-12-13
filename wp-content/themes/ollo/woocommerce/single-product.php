<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$meta = _WSH()->get_meta('_bunch_layout_settings');
$meta1 = _WSH()->get_meta('_bunch_header_settings');
$layout = ollo_set( $meta, 'layout', 'right' );
$sidebar = ollo_set( $meta, 'sidebar', 'default-sidebar' );
$layout = ($layout) ? $layout : 'left';
$sidebar = ($sidebar) ? $sidebar : 'default-sidebar';
$classes = ( !$layout || $layout == 'full' || ollo_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
$bg = ollo_set($meta1, 'header_img');
$bg = ( $bg ) ? $bg : get_template_directory_uri().'/images/inner-page/banner-4.jpg';
$title = ollo_set($meta1, 'header_title');
$description = ollo_set($meta1, 'header_description');

get_header( 'shop' ); ?>


<div class="theme-inner-banner" <?php if($bg):?>style="background-image:url(<?php echo esc_url($bg)?>);"<?php endif;?>>
    <div class="opacity">
        <div class="container">
            <h2><?php if($title) echo wp_kses_post($title); else wp_title('');?></h2>
           <?php echo wp_kses_post(ollo_get_the_breadcrumb()); ?>
        </div> <!-- /.container -->
    </div> <!-- /.opacity -->
</div> <!-- /.theme-inner-banner -->


<div class="shop-page ollo-testimonial-top">
    <div class="container">
    	<div class="main-wrapper">
			
            <!-- sidebar area -->
			<?php if( $layout == 'left' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
            <div class="theme-main-container">
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 theme-sidebar">        
                    <aside class="shop-sidebar">
                        <?php dynamic_sidebar( $sidebar ); ?>
                        <?php
                                /**
                                 * woocommerce_sidebar hook
                                 *
                                 * @hooked woocommerce_get_sidebar - 10
                                 */
                                do_action( 'woocommerce_sidebar' );
                            ?>
                    </aside>
                </div>
            </div>
			<?php } ?>
			<?php endif; ?>
			
            <section class="<?php echo esc_attr($classes);?>">
            	<div class="col shop-details shop-large-side">
                	<div class="single-product-details clearfix">
						<?php
                            /**
                             * woocommerce_before_main_content hook
                             *
                             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                             * @hooked woocommerce_breadcrumb - 20
                             */
                            do_action( 'woocommerce_before_main_content' );
                        ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php wc_get_template_part( 'content', 'single-product' ); ?>
                            <?php endwhile; // end of the loop. ?>
                        <?php
                            /**
                             * woocommerce_after_main_content hook
                             *
                             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                             */
                            do_action( 'woocommerce_after_main_content' );
                        ?>
                   </div>
            	</div>
            </section>
		
        	<!-- sidebar area -->
			<?php if( $layout == 'right' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
            <div class="theme-main-container">
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 theme-sidebar">        
                    <aside class="shop-sidebar">
                        <?php dynamic_sidebar( $sidebar ); ?>
                        <?php
                            /**
                             * woocommerce_sidebar hook
                             *
                             * @hooked woocommerce_get_sidebar - 10
                             */
                            do_action( 'woocommerce_sidebar' );
                        ?>
                    </aside>
                </div>
            </div>
			<?php } ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer( 'shop' ); ?>
