<?php  
   global $post ;
   $count = 0;
   $query_args = array('post_type' => 'post' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   if( $cat ) $query_args['category_name'] = $cat;
   $query = new WP_Query($query_args) ; 
?>
<?php if($query->have_posts()):  ?>  
<!-- 
=============================================
    Recent News 
============================================== 
-->
<div class="recent-news">
    <div class="container">
        <div class="charity-title text-center">
            <h2><?php echo wp_kses_post( $title ); ?></h2>
        </div> <!-- /.charity-title -->

        <div class="row">
        	<?php while($query->have_posts()): $query->the_post();  ?>
            
            	<div class="col-md-4 col-sm-6">
                <div class="single-news">
                    <?php the_post_thumbnail('ollo_370x250', array('class' => 'ollo'));?>
                    <div class="post">
                    	<?php $term_list = wp_get_post_terms(get_the_id(), 'category', array("fields" => "names")); ?>
                        <div class="tag ch-p-bg-color"><?php echo implode( ', ', (array)$term_list );?></div>
                        <h5><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>" class="tran3s"><?php the_title();?></a></h5>
                        <p><?php echo wp_kses_post(ollo_trim(get_the_content(), $text_limit));?></p>
                        <div class="post-tag">
                            <ul>
                                <li><a href="" class="tran3s"><i class="tran3s fa fa-comment" aria-hidden="true"></i> <?php comments_number( 0 ); ?> </a></li>
                            </ul>
                            <a href="<?php echo esc_url(get_permalink(get_the_id()));  ?>" class="share tran3s"><i class="fa fa-share" aria-hidden="true"></i></a>
                        </div>
                    </div> <!-- /.post -->
                </div> <!-- /.single-news -->
            </div> <!-- /.col- -->
            
			<?php endwhile; ?>
            <div class="col-md-4 col-xs-12">
                <div class="sidebar-post">
                    <ul>
                    	<?php while($query->have_posts()): $query->the_post();  ?>
                        
                        	<li class="tran3s">
                                <h5><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>" class="tran3s"><?php the_title();?></a></h5>
                                <p class="tran3s"><?php echo wp_kses_post(ollo_trim(get_the_content(), $text_limit));?></p>
                            </li>
                            
                        <?php endwhile; ?>
                    </ul>
                </div> <!-- /.sidebar-post -->
            </div> <!-- /.col- -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.recent-news -->

<?php endif; ?>
<?php  wp_reset_postdata();