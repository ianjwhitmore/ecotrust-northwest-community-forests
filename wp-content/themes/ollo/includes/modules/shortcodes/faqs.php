<?php
$query_args = array('post_type' => 'bunch_faqs' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['faqs_category'] = $cat;
$query = new WP_Query($query_args) ; 
?>

<?php if($query->have_posts()):  ?> 

<!-- 
=============================================
    Faq Section
============================================== 
-->
<div class="faq-section">
    <div class="container">
        <h3><?php echo wp_kses_post( $title ); ?></h3>

        <div class="row">
        	<div class="col-md-4 col-sm-6 col-xs-12">
				<?php while($query->have_posts()): $query->the_post();
						echo ( ( $query->current_post % 3 ) === 0  && ( $query->current_post != 0 ) ) ? '</div><div class="col-md-4 col-sm-6 col-xs-12">' : '';
				?>
                      <div class="faq-content">
                        <h6><?php the_title();  ?></h6>
                        <?php the_content(); ?>
                      </div> <!-- /.faq-content -->
                <?php endwhile; ?>
           </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.faq-section -->

<?php endif; ?>

<?php wp_reset_postdata();