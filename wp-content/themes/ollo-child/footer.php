<?php $options = get_option('ollo'.'_theme_options'); ?>


<!-- 
=============================================
    Partner Logo
============================================== 
-->
<div class="clearfix"></div>
<?php if(ollo_set($options, 'hide_partners')):
$our_partners = ollo_set( ollo_set( $options, 'our_partners' ), 'our_partners' );
if ( $our_partners ) :
?>
<div class="partners-section">
    <div class="container">
        <div class="row">
            <div id="partner-logo">
            	<?php foreach ( $our_partners as $key => $value ) : 
						if(ollo_set($value, 'tocopy')) continue;
				?>
                	<div class="item"><img src="<?php echo esc_url(ollo_set( $value, 'partner_img' ) );  ?>" alt="<?php esc_html_e('logo', 'ollo'); ?>"></div>
                <?php endforeach; ?>
            </div> <!-- End .partner_logo -->
        </div>
    </div>
</div>
<?php endif; endif; ?>

<!-- 
=============================================
    Bottom Footer Banner
============================================== 
-->
<div class="clearfix"></div>
<?php if(ollo_set($options, 'hide_contact_form')):
$title = ollo_set( $options, 'contact_title' );
$url = ollo_set( $options, 'button_url' );
$btn_title = ollo_set( $options, 'button_title' );
if ( $title || $url || $btn_title ) :
?>
    <div class="bottom-footer-banner ch-p-bg-color">
        <div class="container">
            <h3 class="float-left"><?php echo wp_kses_post( $title );?></h3>
            <a href="<?php echo esc_url( $url );?>" class="float-right button-five"><?php echo wp_kses_post( $btn_title );?></a>
        </div>
    </div>
<?php endif; endif; ?>

<footer class="default-footer charity-footer">
    <div class="container">
        <div class="top-footer row">
            
             <?php if(!(ollo_set($options, 'hide_upper_footer'))):?>
                <!--Footer Upper-->    
                <?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
                        
                    <div class="container">
                        <div class="top-footer widget-section row">
                            <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                        </div> <!-- /.top-footer -->
                    </div> <!-- /.container -->
                    
                <?php endif; ?>
                
             <?php endif;?>
            
        </div> <!-- /.top-footer -->
    </div> <!-- /.container -->

	<?php if ( ! ( ollo_set( $options, 'hide_bottom_footer' ) ) ) : ?>

        <div class="bottom-footer">
            <div class="container">
                <div class="wrapper clearfix">
                <?php if ( ollo_set( $options, 'copyright' ) ) : ?>
                    <p class="float-left"><?php echo wp_kses_post( ollo_set( $options, 'copyright' ) );?></p>
                <?php endif; ?>
                
				<?php echo wp_kses_post(ollo_get_social_icons()); ?>
                </div> <!-- /.wrapper -->
            </div> <!-- /.container -->
        </div> <!-- /.bottom-footer -->
        
    <?php endif; ?>
</footer>


<!-- Scroll Top Button -->
<button class="scroll-top tran3s hvr-shutter-out-horizontal">
    <i class="fa fa-angle-up" aria-hidden="true"></i>
</button>




<?php wp_footer(); ?>
</div>
</div>
</body>
</html>