<?php
$query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['services_category'] = $cat;
$query = new WP_Query($query_args) ;
?>
<?php if($query->have_posts()):  ?>
<!-- 
=============================================
    What We Do 
============================================== 
-->
<div class="what-we-do style-two">
    <div class="container">
        <div class="row">
        	<?php while($query->have_posts()): $query->the_post();
				 $services_meta = _WSH()->get_meta();
				 $subtitle = ollo_set($services_meta, 'subtitle');
				 $ext_url = ollo_set($services_meta, 'ext_url');
				 $icon = ollo_set($services_meta, 'icon_img');
                    global $post; ?>
                    
            	<div class="col-sm-4 col-xs-12 wow fadeInUp">
                    <div class="single-do tran3s">
                        <img src="<?php echo esc_url( $icon ); ?>" alt="<?php esc_html_e('icon', 'ollo'); ?>" class="tran3s">
                        <h5><a href="<?php echo esc_url( $ext_url ); ?>" class="tran3s"><?php the_title();?></a></h5>
                        <span><?php echo wp_kses_post($subtitle);  ?></span>
                        <p><?php echo wp_kses_post(ollo_trim(get_the_content(), $text_limit));?> </p>
                    </div> <!-- /.single-do -->
                </div> <!-- /.col- -->
            
            <?php endwhile; ?>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.what-we-do -->


<?php endif; ?>

<?php wp_reset_postdata();