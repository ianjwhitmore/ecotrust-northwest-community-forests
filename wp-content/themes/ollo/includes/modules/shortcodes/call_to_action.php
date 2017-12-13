<!-- 
=============================================
    Volunteer banner
============================================== 
-->
<div class="volunteer-banner" <?php if($bg_img):?>style="background-image:url(<?php echo esc_url($bg_img)?>);"<?php endif;?>>
    <div class="opacity">
        <div class="container">
            <h2><?php echo wp_kses_post( $title ); ?></h2>
            <p><?php echo wp_kses_post( $text ); ?> </p>
            <a href="<?php echo esc_url($btn_link); ?>" class="button-four ch-p-bg-color"><?php echo wp_kses_post( $btn_title ); ?></a>
        </div>
    </div> <!-- /.opacity -->
</div> <!-- /.volunteer-banner -->