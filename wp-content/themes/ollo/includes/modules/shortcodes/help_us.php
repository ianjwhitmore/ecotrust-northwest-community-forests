<!-- 
=============================================
    Help Banner 
============================================== 
-->
<div class="help-banner clearfix">
    <div class="float-left left-side" <?php if ( $upload_img ) : ?> style="background-image:url(<?php echo esc_url( $upload_img );  ?>)"    <?php  endif;  ?>></div>
    <div class="float-left right-side" <?php if ( $bg_img ) : ?> style="background-image:url(<?php echo esc_url( $bg_img );  ?>)"    <?php  endif;  ?>>
        <div class="opacity clearfix">
            <div class="main-content float-left">
                <div class="charity-title">
                    <h2><?php echo wp_kses_post( $title ); ?></h2>
                </div> <!-- /.charity-title -->
                <p><?php echo wp_kses_post( $text ); ?></p>
                <ul class="clearfix">
                	<?php foreach ( $help as $us ) :  ?>
                        <li>
                            <i class="icon <?php echo esc_attr( $us->icon1 );  ?>"></i>
                            <a href="<?php echo esc_url( $us->url );  ?>" class="tran3s"><?php echo wp_kses_post( $us->title );  ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <a href="<?php echo esc_url( $btn_link ); ?>" class="button-two"><?php echo wp_kses_post( $btn_title ); ?></a>
            </div> <!-- /.main-content -->
        </div> <!-- /.opacity -->
    </div> <!-- /.right-side -->
</div> <!-- /.help-banner -->