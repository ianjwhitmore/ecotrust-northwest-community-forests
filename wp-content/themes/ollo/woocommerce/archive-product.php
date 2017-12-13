<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$meta = _WSH()->get_meta('_bunch_layout_settings', get_option( 'woocommerce_shop_page_id' ));
$meta1 = _WSH()->get_meta('_bunch_header_settings', get_option( 'woocommerce_shop_page_id' ));
$layout = ollo_set( $meta, 'layout', 'left' );
$layout = ollo_set( $_GET, 'layout' ) ? $_GET['layout'] : $layout; 
if(ollo_set($_GET, 'layout_style')) $layout = ollo_set($_GET, 'layout_style'); else
$layout = ollo_set( $meta, 'layout', 'left' );
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


<div class="shop-page ollo-margin-top">
	<div class="container">
		<div class="main-wrapper">
			
			<!-- sidebar area -->
			<?php if( $layout == 'left' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
            <div class="col col-lg-3 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-sidebar">  
					<?php dynamic_sidebar( $sidebar ); ?>
                    <?php
                        /**
                         * woocommerce_sidebar hook
                         *
                         * @hooked woocommerce_get_sidebar - 10
                         */
                        do_action( 'woocommerce_sidebar' );
                    ?>
                </div>
            </div>
			<?php } ?>
			<?php endif; ?>

			<!-- sidebar area -->
			
			<div class="<?php echo esc_attr($classes);?> content-side">
            	<div class="col all-product-wrapper shop-large-side">
                	<div class="row">
						<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                                            <?php
                                                /**
                                                 * woocommerce_before_shop_loop hook
                                                 *
                                                 * @hooked woocommerce_result_count - 20
                                                 * @hooked woocommerce_catalog_ordering - 30
                                                 */
                                                //do_action( 'woocommerce_before_shop_loop' );
                                            ?>
                        <?php endif;?>
                        <?php
                            /**
                             * woocommerce_before_main_content hook
                             *
                             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                             * @hooked woocommerce_breadcrumb - 20
                             */
                            do_action( 'woocommerce_before_main_content' );
                        ?>
                        
						<?php
                            /**
                             * woocommerce_archive_description hook
                             *
                             * @hooked woocommerce_taxonomy_archive_description - 10
                             * @hooked woocommerce_product_archive_description - 10
                             */
                            do_action( 'woocommerce_archive_description' );
                        ?>

				<?php if ( have_posts() ) : ?>
        
                    <?php woocommerce_product_loop_start(); ?>
        
                        <?php woocommerce_product_subcategories(); ?>
        
                        <?php while ( have_posts() ) : the_post(); ?>
        
                            <?php wc_get_template_part( 'content', 'product' ); ?>
        
                        <?php endwhile; // end of the loop. ?>
        
                    <?php woocommerce_product_loop_end(); ?>
        
                    <?php
                        /**
                         * woocommerce_after_shop_loop hook
                         *
                         * @hooked woocommerce_pagination - 10
                         */
                        do_action( 'woocommerce_after_shop_loop' );
                    ?>
        
                <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
        
                    <?php wc_get_template( 'loop/no-products-found.php' ); ?>
        
                <?php endif; ?>

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
            </div>

            <!-- sidebar area -->
            <?php if( $layout == 'right' ): ?>
            <?php if ( is_active_sidebar( $sidebar ) ) { ?>
            <div class="col col-lg-3 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
                    <?php
                        /**
                         * woocommerce_sidebar hook
                         *
                         * @hooked woocommerce_get_sidebar - 10
                         */
                        do_action( 'woocommerce_sidebar' );
                    ?>
                </div>
            </div>
            <?php } ?>
            <?php endif; ?>
    <!--Sidebar-->
    
		</div>
	</div>
</div>
<?php get_footer( 'shop' ); ?>
