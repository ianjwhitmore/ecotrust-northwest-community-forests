<?php  
   $events = tribe_get_events(array(
  'posts_per_page' => $num,
  'tax_query'=> array(
     array(
      'taxonomy' => 'tribe_events_cat',
      'field' => 'slug',
      'terms' => $cat
     )
    )
  ));
   $date_format = get_option('date_format');
?>

<div class="theme-blog-large-sideOne float-left">
    <div class="row">
        <?php
				if ( empty( $events ) ) :
				echo 'Sorry, nothing found.';
				else: 
				foreach( $events as $event ) :
			?>
        <div class="col-sm-6 col-xs-12" >
            <div class="single-events">
                <div class="image">
                    <?php echo balanceTags(get_the_post_thumbnail($event->ID, 'ollo_570x310'));?>
                    <div class="date"><span><?php echo balanceTags(date('d', strtotime($event->EventStartDate)));?></span> <?php echo balanceTags(date('M', strtotime($event->EventStartDate)));?></div>
                </div>
                <div class="title">
                    <ul>
                        <li><a href="<?php echo esc_url(get_permalink($event->ID));?>" class="tran3s"><?php echo balanceTags(date('d M Y', strtotime($event->EventStartDate)));?></a></li>
                        <li>/</li>
                        <li><a href="<?php echo esc_url(get_permalink($event->ID));?>" class="tran3s"><?php echo tribe_get_venue( $event->ID );?></a></li>
                    </ul>
                    <h5><a href="<?php echo esc_url(get_permalink($event->ID));?>" class="tran3s"><?php echo balanceTags(get_the_title( $event->ID ));?></a></h5>
                </div> <!-- /.title -->
            </div> <!-- /.single-events -->
        </div>
        <?php endforeach; endif;  ?>
	</div>
</div>
   