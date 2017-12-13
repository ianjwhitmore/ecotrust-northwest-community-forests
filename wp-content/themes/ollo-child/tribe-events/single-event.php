<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.2.4
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$time_format = get_option( 'time_format', Tribe__Events__Date_Utils::TIMEFORMAT );

$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );



$start_datetime = tribe_get_start_date();

$start_date = tribe_get_start_date( null, false );

$start_time = tribe_get_start_date( null, false, $time_format );

$start_ts = tribe_get_start_date( null, false, Tribe__Events__Date_Utils::DBDATEFORMAT );



$end_datetime = tribe_get_end_date();

$end_date = tribe_get_end_date( null, false );

$end_time = tribe_get_end_date( null, false, $time_format );

$end_ts = tribe_get_end_date( null, false, Tribe__Events__Date_Utils::DBDATEFORMAT );



$cost = tribe_get_formatted_cost();

$website = tribe_get_event_website_link();

$phone   = tribe_get_phone();

//exit('sdfsdf');

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<?php ollo_bunch_global_variable();
	$options = _WSH()->option();
	get_header(); 
	$meta = _WSH()->get_term_meta( '_bunch_category_settings' );
	_WSH()->page_settings = $meta; 
	if(ollo_set($_GET, 'layout_style')) $layout = ollo_set($_GET, 'layout_style'); else
	$layout = ollo_set( $meta, 'layout', 'right' );
	$sidebar = ollo_set( $meta, 'sidebar', 'dynamic-sidebar' );
	
	$layout = ($layout) ? $layout : 'right';
    $sidebar = ($sidebar) ? $sidebar : 'dynamic-sidebar';
	
	$classes = ( !$layout || $layout == 'full' || ollo_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-8 col-md-8 col-sm-12 col-xs-12 ' ;
	$bg = ollo_set($meta, 'header_img');
	$title = ollo_set($meta, 'header_title');
	
?>

<div id="tribe-events-content" class="tribe-events-single">
	<?php /*?><div class="col-md-12">
	<p class="tribe-events-back">
		<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; ' . esc_html__( 'All %s', 'ollo' ), $events_label_plural ); ?></a>
	</p>
	
	<!-- Notices -->
	<?php tribe_the_notices() ?>
	
	<div class="tribe-events-schedule tribe-clearfix">
		<?php if ( tribe_get_cost() ) : ?>
			<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
		<?php endif; ?>
	</div>

	<!-- Event header -->
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'ollo' ), $events_label_singular ); ?></h3>
		<ul class="tribe-events-sub-nav clearfix">
			<li class="tribe-events-nav-previous pull-left"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
			<li class="tribe-events-nav-next pull-right"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
		</ul>
		<!-- .tribe-events-sub-nav -->
	</div>
	<!-- #tribe-events-header -->
	</div><?php */?>
	<div class="clearfix"></div>
	<!--Events Single-->
    <div class="event-details-page">
        <div class="container">
            <div class="row clearfix">
            
            	<!-- sidebar area -->
				<?php if( $layout == 'left' ): ?>
                <?php if ( is_active_sidebar( $sidebar ) ) { ?>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">        
                    <div class="blog-sidebar theme-blog-sidebarOne">
                        <?php dynamic_sidebar( $sidebar ); ?>
                    </div>
                </div>
                <?php } ?>
                <?php endif; ?>
            
                <!--Content Side-->	
                <div class="<?php echo esc_attr($classes);?>">
                    <?php while ( have_posts() ) :  the_post(); ?>
                    	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="theme-blog-large-sideOne event-large-sidebar">
                                <?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
                                <div class="event-title">
									<?php the_title( '<h4>', '</h4>' ); ?>
                                    <ul>
                                        <li><a href="<?php echo esc_url(get_permalink($event->ID));?>" class="tran3s"><?php echo balanceTags(date('d M Y', strtotime($event->EventStartDate)));?></a></li>
                                        <li>/</li>
                                        <li><a href="<?php echo esc_url(get_permalink($event->ID));?>" class="tran3s"><?php echo tribe_get_venue( $event->ID );?></a></li>
                                    </ul>
                            	</div>
                                <?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
                                	<?php the_content();?>
                                <?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
                                
								<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
									<?php tribe_get_template_part( 'modules/meta' ); ?>
                                <?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
                                
                            </div>
                            <?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
                    	</div>
                    <?php endwhile; ?>
                    
                    <!-- Event footer -->
                    <div id="tribe-events-footer">
                        <!-- Navigation -->
                        <h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'ollo' ), $events_label_singular ); ?></h3>
                        <div class="tribe-events-sub-nav posts-nav clearfix">
                            <!--Prev Control-->
                            <div class="post-control prev-control pull-left">
                            <?php tribe_the_prev_event_link( '<span class="icon fa fa-angle-left"></span>' ) ?>
                            </div>
                            <!--Next Control-->
                            <div class="post-control next-control pull-right">
                            <?php tribe_the_next_event_link( '<span class="icon fa fa-angle-right"></span>' ) ?>
                            </div>
                        </div>
                        <!-- .tribe-events-sub-nav -->
                    </div>
                    
                </div>
                
                
            
			
				<!-- sidebar area -->
				<?php if( $layout == 'right' ): ?>
                <?php if ( is_active_sidebar( $sidebar ) ) { ?>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">        
                    <div class="blog-sidebar theme-blog-sidebarOne">
                        <?php dynamic_sidebar( $sidebar ); ?>
                    </div>
                </div>
                <?php } ?>
                <?php endif; ?>
                <!--Sidebar-->
                
    		</div>
		</div>
	</div>
</div><!-- #tribe-events-content -->
