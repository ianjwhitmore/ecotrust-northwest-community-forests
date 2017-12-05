<?php
$query_args = array('post_type' => 'bunch_testimonials' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['testimonials_category'] = $cat;
$query = new WP_Query($query_args) ; 
?>
<?php if($query->have_posts()):  ?>
<!-- 
=============================================
    What People Say
============================================== 
-->
<div class="what-people-say ch-p-bg-color">
    <div class="container">
        <h2><?php echo wp_kses_post( $title ); ?></h2>

        <div id="client-carousel" class="carousel slide" data-ride="carousel" data-interval="5000">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
            	<?php   $count = 0; while($query->have_posts()): $query->the_post();
						global $post;
						$testimonial_meta = _WSH()->get_meta();
						$designation = ollo_set( $testimonial_meta, 'designation' );
						$active = ( 0 === $count ) ? 'active' : '';
				?>
                
                	<div class="item <?php echo esc_attr( $active ); ?>">
                    <p><?php echo wp_kses_post(ollo_trim(get_the_content(), $text_limit));?></p>
                    <div class="name">
                        <h5><?php the_title(); ?></h5>
                        <span><?php echo wp_kses_post( $designation ); ?></span>
                    </div>
                </div>	
               	
				<?php $count++; endwhile;?>
                
            </div> <!-- /.carousel-inner -->

              <!-- Indicators -->
            <ol class="carousel-indicators">
            	<?php $count1 = 0; while($query->have_posts()): $query->the_post();
						global $post;
						$active = ( 0 === $count1 ) ? 'active' : '';
				?>
                
                	<li data-target="#client-carousel" data-slide-to="<?php echo esc_attr( $count1 ); ?>" class="<?php echo esc_attr( $active ); ?> tran3s">
                    	<?php the_post_thumbnail('ollo_104x104', array('class' => 'img-responsive round-border'));?>
                    </li>
                <?php $count1++; endwhile;?>
                
            </ol>		
        </div> <!-- /#client-carousel -->					
    </div> <!-- /.container -->
</div> <!-- /.what-people-say -->

<?php endif; ?>

<?php wp_reset_postdata();