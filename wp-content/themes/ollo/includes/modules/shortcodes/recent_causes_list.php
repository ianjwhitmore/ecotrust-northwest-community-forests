<?php
   $query_args = array( 'orderby' => 'post_date' , 'number' => $num, 'paged'=>get_query_var('paged')  );
   if( $cat ) $query_args['category'] = $cat;
   $query = Charitable_Campaigns_Shortcode::get_campaigns( $query_args ); 
   ?>
<?php if($query->have_posts()):  ?>


<!-- 
=============================================
    Recent Cause
============================================== 
-->
<div class="recent-cause-style-two ollo-margin-top">
    <div class="container">
    
    	<?php while($query->have_posts()): $query->the_post();
			global $post;
			$campaign = charitable_get_current_campaign();
		?>
    
        	<div class="single-cause clearfix">
            <?php if ( has_post_thumbnail( $post->ID ) ) : ?>
                <div class="image float-left">
                    <?php the_post_thumbnail('ollo_485x388');?>
                </div>
            <?php endif; ?>
            <div class="title float-left">
                <h5><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>" class="tran3s"><?php the_title();?></a></h5>
                <p><?php the_excerpt();?> </p>
                <div class="skills-progress skills">
                    <div class="codeconSkillbar">
                        <div class="skillBar ch-p-bg-color" data-percent="<?php echo esc_attr($campaign->get_percent_donated_raw());?>%" style="width:<?php echo esc_attr($campaign->get_percent_donated_raw());?>%;">
                            <span class="PercentText ch-p-color"><?php echo wp_kses_post($campaign->get_percent_donated_raw());?>%</span>
                        </div>
                    </div> <!-- /.codeconSkills -->
                </div> <!-- /.skills-progress -->
                <span><?php echo wp_kses_post($campaign->get_donation_summary());?></span>
                <div class="clearfix">
                    <a href="<?php echo esc_url(charitable_get_permalink( 'campaign_donation_page', array( 'campaign' => $campaign ) ));?>" class="tran3s ch-p-bg-color donate"><?php esc_html_e('Donate Now', 'ollo');?></a>
                    <a href="<?php echo esc_url(get_permalink(get_the_id())); ?>" class="tran3s more"><?php esc_html_e('More Details', 'ollo');?></a>
                </div>
            </div> <!-- /.title -->
        </div> <!-- /.single-cause -->

		<?php endwhile;?>
        <div class="text-center">
        	<?php ollo_the_pagination(array('total'=>$query->max_num_pages)); ?>
        </div>
    </div> <!-- /.container -->
</div> <!-- /.recent-cause-style-two -->


<?php endif; wp_reset_postdata(); ?>