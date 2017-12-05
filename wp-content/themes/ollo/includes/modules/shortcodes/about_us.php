<!-- 
=============================================
    Welcome Section
============================================== 
-->
<div class="welcome-charity">
    <div class="container">
        <div class="text float-right wow fadeInRight">
            <div class="charity-title">
                <h2><?php echo wp_kses_post( $content ); ?></h2>
            </div> <!-- /.charity-title -->
            <br><?php echo wp_kses_post( $description ); ?>
            <a href="<?php echo esc_url( $btn_link ); ?>" class="button-six hvr-icon-wobble-horizontal"><?php echo wp_kses_post( $btn_title );  ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
        </div> <!-- /.text -->
        <img src="<?php echo esc_url( $about_img ); ?>" alt="<?php esc_html_e('image', 'ollo'); ?>" class="float-left wow fadeInLeft">
    </div> <!-- /.container -->
</div> <!-- /.welcome-charity -->