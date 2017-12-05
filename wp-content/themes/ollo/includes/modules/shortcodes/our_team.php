<?php
$query_args = array('post_type' => 'bunch_team', 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['team_category'] = $cat;
$query = new WP_Query($query_args) ; 
?>
<?php if($query->have_posts()):  ?>
<!-- 
=============================================
    Our Team
============================================== 
-->
<?php if ( ! $show_title ) : ?>

<div class="our-team theme-team-style-one team-single-page  ollo-margin-top">
    <div class="container">
        <div class="row">
        	<?php while($query->have_posts()): $query->the_post(); global $post;
            	$team_meta = _WSH()->get_meta(); 
            ?>
                <div class="col-md-3 col-xs-6 wow fadeInUp">
                    <div class="single-team-member text-center">
                        <div class="img"><?php the_post_thumbnail('ollo_270x333', array('class' => 'img-responsive'));?></div>
                        <div class="title">
                            <h6><a href="<?php echo esc_url(ollo_set($team_meta, 'team_link'));?>" class="tran3s"><?php the_title(); ?></a></h6>
                            <span><?php echo wp_kses_post(ollo_set($team_meta, 'designation'));?></span>
                            <?php if($socials = ollo_set($team_meta, 'bunch_team_social')):?>
                                <ul>
                                    <?php foreach($socials as $key => $value):?>
                                        <li><a href="<?php echo esc_url(ollo_set($value, 'social_link'));?>" class="tran3s round-border"><i class="fa <?php echo esc_attr(ollo_set($value, 'social_icon'));?>" aria-hidden="true"></i></a></li>
                                    <?php endforeach;?>
                                </ul>
                            <?php endif;?>
                        </div> <!-- /.title -->
                    </div> <!-- /.single-team-member -->
                </div> <!-- /.col- -->
            <?php endwhile;  ?>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.our-team -->

<?php else : ?>

<div class="our-team theme-team-style-one">
    <div class="container">
        <div class="charity-title text-center">
            <h2><?php echo wp_kses_post( $title ); ?></h2>
            <p><?php echo wp_kses_post( $text ); ?> </p>
        </div> <!-- /.charity-title -->

        <div class="row">
        	<?php while($query->have_posts()): $query->the_post(); global $post;
            	$team_meta = _WSH()->get_meta(); 
            ?>
            	<div class="col-md-3 col-xs-6 wow fadeInUp">
                    <div class="single-team-member text-center">
                        <div class="img"><?php the_post_thumbnail('ollo_270x333', array('class' => 'img-responsive'));?></div>
                        <div class="title">
                            <h6><a href="<?php echo esc_url(ollo_set($team_meta, 'team_link'));?>" class="tran3s"><?php the_title(); ?></a></h6>
                            <span><?php echo wp_kses_post(ollo_set($team_meta, 'designation'));?></span>
                            <?php if($socials = ollo_set($team_meta, 'bunch_team_social')):?>
                                <ul>
                                	<?php foreach($socials as $key => $value):?>
                                    	<li><a href="<?php echo esc_url(ollo_set($value, 'social_link'));?>" class="tran3s round-border"><i class="fa <?php echo esc_attr(ollo_set($value, 'social_icon'));?>" aria-hidden="true"></i></a></li>
                                    <?php endforeach;?>
                                </ul>
                            <?php endif;?>
                        </div> <!-- /.title -->
                    </div> <!-- /.single-team-member -->
                </div> <!-- /.col- -->
            <?php endwhile;  ?>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.our-team -->

<?php endif; ?>

<?php endif; ?>

<?php wp_reset_postdata();