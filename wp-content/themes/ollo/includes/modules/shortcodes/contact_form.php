<!-- 
=============================================
    Contact Form
============================================== 
-->
<div class="container contact-us-page theme-contact-page-styleOne ollo-margin-top">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12 wow fadeInLeft">
            <div class="contact-us-form">
                <h4><?php echo wp_kses_post( $title );  ?></h4>
				<?php echo do_shortcode($contact_form);?>
            </div> <!-- /.contact-us-form -->
        </div> <!-- /.col- -->

        <div class="col-md-6 col-sm-12 col-xs-12 wow fadeInRight">
            <div class="contactUs-address">
                <h4><?php echo wp_kses_post( $title1 );  ?></h4>
                <p><?php echo wp_kses_post( $text );  ?></p>
                <?php foreach ( $info as $inf ) :  ?>
                    <div class="single-address clearfix">
                        <div class="icon round-border float-left"><i class="<?php echo wp_kses_post( $inf->icon1 );  ?>"></i></div>
                        <div class="text float-left">
                            <h6><?php echo wp_kses_post( $inf->title2 );  ?></h6>
                            <span><?php echo wp_kses_post( $inf->description );  ?></span>
                        </div>
                    </div> <!-- End of .single-address -->
				<?php endforeach; ?>
            </div> <!-- /.our-address -->
        </div>
    </div> <!-- /.row -->
</div> <!-- /.container -->