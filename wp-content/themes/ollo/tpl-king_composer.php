<?php /* Template Name: King Composer Page */
	get_header() ;
	$meta = _WSH()->get_meta('_bunch_header_settings');
	$bg = (ollo_set($meta, 'header_img')) ? ollo_set($meta, 'header_img') : get_template_directory_uri().'/images/inner-page/banner-4.jpg';
	$title = ollo_set($meta, 'header_title');
	
?>
<?php if(ollo_set($meta, 'breadcrumb')):?>

	<div class="theme-inner-banner" <?php if($bg):?>style="background-image:url(<?php echo esc_url($bg)?>);"<?php endif;?>>
        <div class="opacity">
            <div class="container">
                <h2><?php if($title) echo wp_kses_post($title); else wp_title('');?></h2>
               <?php echo wp_kses_post(ollo_get_the_breadcrumb()); ?>
            </div> <!-- /.container -->
        </div> <!-- /.opacity -->
    </div> <!-- /.theme-inner-banner -->

<?php endif;?>
<?php while( have_posts() ): the_post(); ?>
    <?php the_content(); ?>
<?php endwhile;  ?>
<?php get_footer() ; ?>