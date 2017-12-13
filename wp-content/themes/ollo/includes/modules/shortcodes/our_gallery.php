<?php 
$args = array('post_type' => 'bunch_gallery', 'showposts'=>$num, 'orderby'=>$sort, 'order'=>$order);
$terms_array = explode(",",$exclude_cats);
if($exclude_cats) $args['tax_query'] = array(array('taxonomy' => 'gallery_category','field' => 'id','terms' => $terms_array,'operator' => 'NOT IN',));
$query = new WP_Query($args);

$t = $GLOBALS['_bunch_base'];

?>

<?php 
if( $query->have_posts() ):
ob_start();
$fliteration = array();
?>
	<?php while( $query->have_posts() ): $query->the_post();
		$projects_meta = _WSH()->get_meta();
		global  $post;
		$post_terms = get_the_terms( get_the_id(), 'gallery_category');// printr($post_terms); exit();
		foreach( (array)$post_terms as $pos_term ) $fliteration[$pos_term->term_id] = $pos_term;
		$temp_category = get_the_term_list(get_the_id(), 'gallery_category', '', ', ');
	?>
		<?php $post_terms = wp_get_post_terms( get_the_id(), 'gallery_category'); 
		$term_slug = '';
		if( $post_terms ) foreach( $post_terms as $p_term ) $term_slug .= $p_term->slug.' ';?>		
		<?php 
			$post_thumbnail_id = get_post_thumbnail_id($post->ID);
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 single-project mix <?php echo esc_attr($term_slug); ?>">
            <div class="image">
				<?php the_post_thumbnail('ollo_270x220');?>
                <div class="opacity tran4s text-center">
                    <div class="text">
                        <h5><?php the_title(); ?></h5>
                        <a href="<?php echo esc_url( $post_thumbnail_url  );  ?>" class="tran3s round-border fancybox">+</a>
                    </div> <!-- /.text -->
                </div>
            </div>
        </div> <!-- /.col- -->
            
<?php endwhile;?>

<?php wp_reset_postdata();
$data_posts = ob_get_contents();
ob_end_clean();

endif ;
ob_start();?>

<?php $terms = get_terms(array('projects_category')); ?>

<div class="our-project project-grid ollo-margin-top">
    <div class="container">

            <ul class="mixitUp-menu text-center">
            	<li class="filter tran3s active" data-filter="all"><?php esc_attr_e('ALL', 'ollo');?></li>
                <?php foreach( $fliteration as $t ): ?>
                <li class="filter tran3s" data-filter=".<?php echo esc_attr(ollo_set( $t, 'slug' )); ?>"><?php echo wp_kses_post(ollo_set( $t, 'name')); ?></li>
                <?php endforeach;?>
                
            </ul>

        <div class="row">
        	<div class="project-wrapper clearfix" id="mixitUp-item">
            	<?php echo wp_kses_post($data_posts); ?>
            </div>

        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.our-project -->