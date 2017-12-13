<!-- 
=============================================
    About Charity
============================================== 
-->
<div class="about-finance about-top-text-one ollo-margin-top">
    <div class="container">
        <div class="text float-right wow fadeInRight">
            <h3><?php echo wp_kses_post( $content ); ?></h3>
            <?php echo wp_kses_post( $description ); ?>
            <div class="clearfix author">
                <img src="<?php echo esc_url( $author_img );  ?>" alt="<?php esc_html_e('Image', 'ollo'); ?>" class="float-left round-border">
                <div class="name float-left">
                    <h6><?php echo wp_kses_post( $name ); ?></h6>
                    <p><?php echo wp_kses_post( $designation ); ?></p>
                </div> <!-- /.name -->
                <img src="<?php echo esc_url( $sign_img );  ?>" alt="" class="float-right">
            </div> <!-- /.clearfix -->
        </div> <!-- /.text -->
        <div class="float-left img-box wow fadeInLeft">
            <div class="row">
            <?php $images_id = explode(",",$history_img); $count = 0;
			foreach ( $images_id as $id ) :
			if ( 3 === $count ) {
				$count = 0;
			}
			?>
                <div class="single-img <?php if ( 0 != $count ) : ?>small<?php endif; ?> float-left"><img src="<?php echo esc_url(wp_get_attachment_url( $id )); ?>" alt="<?php esc_html_e('image', 'ollo'); ?>"></div>
            <?php $count++; endforeach; ?>
            </div>
        </div> <!-- /.img-box -->
    </div> <!-- /.container -->
</div> <!-- /.about-finance -->