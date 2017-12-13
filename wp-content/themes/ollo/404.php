<?php
$options = _WSH()->option();
$show_breadcrumbs = ollo_set($options, 'show_404_breadcrumb');
$bg = ollo_set($options, '404_page_breadcrumb_bg');
$bg = ( $bg ) ? $bg : get_template_directory_uri().'/images/inner-page/banner-4.jpg';
$title = ollo_set($options, 'breadcrumb_title');
$title1 = ollo_set($options, '404_title');
$subtitle = ollo_set($options, '404_subtitle');
$description = ollo_set($options, 'description');
$show_button = ollo_set($options, 'show_404_button');
$show_404_search = ollo_set($options, 'show_404_search');
$button_title = ollo_set($options, '404_button_title');
$button_title = ( $button_title ) ? $button_title : 'Go Home';
    get_header(); 
?>
<?php if(!( $show_breadcrumbs )):?>
<div class="theme-inner-banner" <?php if($bg):?>style="background-image:url(<?php echo esc_url($bg)?>);"<?php endif;?>>
    <div class="opacity">
        <div class="container">
            <h2><?php if($title) echo wp_kses_post($title); else wp_title('');?></h2>
           <?php echo wp_kses_post(ollo_get_the_breadcrumb()); ?>
        </div> <!-- /.container -->
    </div> <!-- /.opacity -->
</div> <!-- /.theme-inner-banner -->
<?php endif; ?>

<!-- 
=============================================
    Error Page
============================================== 
-->
<div class="container error-page ollo-margin-top">
    <h2 class="ch-p-color"><?php echo wp_kses_post( $title1 ); ?></h2>
    <h3><?php echo wp_kses_post( $subtitle ); ?></h3>
    <p><?php echo wp_kses_post( $description ); ?></p>
    <div>
    	<?php  if ( ! ( $show_button ) ) :  ?>
        	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="tran3s ch-p-bg-color"><?php echo wp_kses_post( $button_title ); ?></a>
        <?php endif; ?>
        <?php  if ( ! ( $show_404_search ) ) :  ?>
            <span class="or">Or</span>
          <?php get_template_part('searchform2')?>  
        <?php endif; ?>
    </div>
</div> <!-- /.error-page -->



	
<?php get_footer(); ?>