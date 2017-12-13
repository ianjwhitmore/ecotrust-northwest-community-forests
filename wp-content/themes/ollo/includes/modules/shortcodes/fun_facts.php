<!-- 
=============================================
    Charity Counter
============================================== 
-->
<div class="charity-counter">
    <div class="container">
        <div class="row">
        	<?php foreach( $facts as $fact ) :   ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <div class="single-box text-center">
                        <p><?php echo wp_kses_post( $fact->title );  ?></p>
                        <h2 class="number"><span class="timer" data-from="<?php echo wp_kses_post( $fact->start_num );  ?>" data-to="<?php echo wp_kses_post( $fact->end_num );  ?>" data-speed="1000" data-refresh-interval="5">0</span><?php if ( $fact->show_percentage ) : ?>+<?php endif; ?></h2>
                    </div> <!-- /.single-box -->
                </div>
            
            <?php endforeach; ?>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.charity-counter -->