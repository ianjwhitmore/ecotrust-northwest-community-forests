<?php
   $query_args = array( 'orderby' => 'post_date' , 'number' => $num, 'paged'=>get_query_var('paged')  );
   if( $cat ) $query_args['category'] = $cat;
   $query = Charitable_Campaigns_Shortcode::get_campaigns( $query_args ); 
   ?>
<?php if($query->have_posts()):  ?>


<div class="recent-cause ollo-margin-top">
    <div class="container">
        <div class="row">
        	<?php while($query->have_posts()): $query->the_post();
				global $post;
				$campaign = charitable_get_current_campaign();
			?>
            	<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp">
                <div class="single-cause">
                    <?php if ( has_post_thumbnail( $post->ID ) ) : ?>
                    	<div class="img">
                        	<?php the_post_thumbnail('ollo_370x247');?>
                        </div>
                    <?php endif; ?>
                    <div class="title text-center">
                        <div class="donate-piechart tran3s">
                            <div class="piechart"  data-border-color="rgba(248,194,24,1)" data-value=".<?php echo esc_attr($campaign->get_percent_donated_raw());?>">
                              <span>.<?php echo wp_kses_post($campaign->get_percent_donated_raw());?></span>
                            </div>
                        </div>

                        <h5><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>" class="tran3s"><?php the_title();?></a></h5>
                        <p><?php echo wp_kses_post(ollo_trim(get_the_content(), $text_limit));?></p>
                        <span><?php echo wp_kses_post($campaign->get_donation_summary());?></span>
                        <div class="clearfix">
                            <a href="<?php echo esc_url(charitable_get_permalink( 'campaign_donation_page', array( 'campaign' => $campaign ) ));?>" class="tran3s float-left ch-p-bg-color donate"><?php esc_html_e('Donate Now', 'ollo');?></a>
                            <a href="<?php echo esc_url(get_permalink(get_the_id())); ?>" class="tran3s float-left more"><?php esc_html_e('More Details', 'ollo');?></a>
                        </div>
                    </div> <!-- /.title -->
                </div> <!-- /.single-cause -->
            </div> <!-- /.col- -->
            <?php endwhile;?>
        </div> <!-- /.row -->
		<div class="text-center">
        	<?php ollo_the_pagination(array('total'=>$query->max_num_pages)); ?>
        </div>
    </div> <!-- /.container -->
</div> <!-- /.recent-cause -->















<?php endif; wp_reset_postdata(); ?>