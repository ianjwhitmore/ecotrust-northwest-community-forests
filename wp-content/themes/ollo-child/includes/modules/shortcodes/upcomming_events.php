<?php  
   $events = tribe_get_events(array(
  'posts_per_page' => $num,
   'order' => 'DESC',
    'start_date' => date( 'Y-m-d H:i:s' ),
  'tax_query'=> array(
     array(
      'taxonomy' => 'tribe_events_cat',
      'field' => 'slug',
      'terms' => $cat,
     )
    )
  ));
   $date_format = get_option('date_format');
?>


<!-- 
=============================================
    Up Coming event
============================================== 
-->
<div class="up-coming-event ollo-testimonial-top">
    <div class="container">
        <div class="charity-title">
            <h2><?php echo wp_kses_post( $title ); ?></h2>
            <p><?php echo wp_kses_post( $text ); ?></p>
            <a href="<?php echo esc_url( $btn_link ); ?>" class="tran3s"><?php echo wp_kses_post( $btn_title ); ?></a>
        </div> <!-- /.charity-title -->

        <div class="row">
        	<?php
				if ( empty( $events ) ) :
				echo '<br><br><h3 class="text-center">There are currently no upcoming events.</h3>';
				else: 
				foreach( $events as $event ) :
			?>
                <div class="col-sm-6 col-xs-12" >
                    <div class="single-events">
                        <div class="image"><?php echo wp_kses_post(get_the_post_thumbnail($event->ID, 'ollo_570x310'));?></div>
                        <div class="title">
                            <ul>
                                <li><a href="<?php echo esc_url(get_permalink($event->ID));?>" class="tran3s"><?php echo wp_kses_post(date('d M Y', strtotime($event->EventStartDate)));?></a></li>
                                <li>/</li>
                                <li><a href="<?php echo esc_url(get_permalink($event->ID));?>" class="tran3s"><?php echo tribe_get_venue( $event->ID );?></a></li>
                            </ul>
                            <h5><a href="<?php echo esc_url(get_permalink($event->ID));?>" class="tran3s"><?php echo wp_kses_post(get_the_title( $event->ID ));?></a></h5>
                        </div> <!-- /.title -->
                    </div> <!-- /.single-events -->
                </div> <!-- /.col- -->
             <?php endforeach; endif;  ?>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.up-coming-event -->
