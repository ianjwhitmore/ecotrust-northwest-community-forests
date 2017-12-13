<div class="single-news">
    <?php if(has_post_thumbnail()):?>
		<?php the_post_thumbnail('ollo_1170x400', array('class' => 'img-responsive'));?>
    <?php endif;?>
    <div class="post">
    	<?php $term_list = wp_get_post_terms(get_the_id(), 'category', array("fields" => "names")); ?>
        <div class="tag ch-p-bg-color"><?php echo implode( ', ', (array)$term_list );?></div>
        <h5><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>" class="tran3s"><?php the_title();?></a></h5>
        <?php the_excerpt();?>
        <div class="post-tag">
            <ul>
                <li><a href="" class="tran3s"><i class="tran3s fa fa-comment" aria-hidden="true"></i> <?php comments_number( 0 ); ?></a></li>
            </ul>
            <a href="<?php echo esc_url(get_permalink(get_the_id()));  ?>" class="share tran3s"><i class="fa fa-share" aria-hidden="true"></i></a>
        </div>
    </div> <!-- /.post -->
</div> <!-- /.single-news -->