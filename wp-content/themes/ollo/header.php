<?php $options = _WSH()->option();
	ollo_bunch_global_variable();
	$icon_href = (ollo_set( $options, 'site_favicon' )) ? ollo_set( $options, 'site_favicon' ) : get_template_directory_uri().'/images/fav-icon/favicon-56x56.png';
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ):?>
	<link rel="shortcut icon" href="<?php echo esc_url($icon_href);?>" type="image/x-icon">
	<link rel="icon" href="<?php echo esc_url($icon_href);?>" type="image/x-icon">
<?php endif;?>
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<link rel="icon" type="image/png" sizes="56x56" href="<?php echo esc_url( $icon_href );  ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="charity-theme">
	<div class="main-page-wrapper">
 	
    <?php if ( ollo_set( $options, 'preloader' ) ) :?>
		<!-- Preloader -->
        <div id="loader-wrapper">
            <div id="loader"></div>
        </div>
	<?php endif;?>
 	
    <!-- Main Header-->

    
    <header class="charity-header">
		<div class="theme-main-menu">
            <div class="container">
               <div class="main-container clearfix">
                    <div class="logo float-left">
                        <?php if(ollo_set($options, 'logo_image')):?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(ollo_set($options, 'logo_image'));?>" alt="<?php esc_html_e('Ollo', 'ollo');?>" title="<?php esc_html_e('Ollo', 'ollo');?>"></a>
                        <?php else:?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo/logo5.png');?>" alt="<?php esc_html_e('Ollo', 'ollo');?>"></a>
                        <?php endif;?>
                    </div>
                    
                    <div class="right-content float-right">
                        <?php if(ollo_set($options, 'lang_switcher')): ?>
                        <div class="language-select">
                            <?php do_action('wpml_add_language_selector'); ?>
                        </div> <!-- /.language-select -->
                        <?php endif;?>
                        <?php if(ollo_set($options, 'search_box')): ?>
                        <button class="search ch-p-bg-color round-border tran3s" id="search-button"><i class="fa fa-search" aria-hidden="true"></i></button>
                        <div class="search-box tran5s" id="searchWrapper">
                            <button id="close-button" class="ch-p-color"><i class="flaticon-cross"></i></button>
                            <div class="container">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/logo/logo6.png" alt="<?php esc_html_e('Logo', 'ollo'); ?>">
                            <?php get_template_part('searchform3'); ?>
                            </div>
                         </div> <!-- /.search-box -->
                         <?php endif;?>
                    </div> <!-- /.right-content -->
                    <!-- ============== Menu Warpper ================ -->
                    <div class="menu-wrapper float-right">
                        <nav id="mega-menu-holder" class="clearfix">
                           <ul class="clearfix">
                              <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
                                            'container_class'=>'navbar-collapse collapse navbar-right',
                                            'menu_class'=>'nav navbar-nav',
                                            'fallback_cb'=>false, 
                                            'items_wrap' => '%3$s', 
                                            'container'=>false,
                                            'walker'=> new Bunch_Bootstrap_walker()  
                                ) ); ?>
                           </ul>
                        </nav> <!-- /#mega-menu-holder -->
                  </div>
               </div> <!-- /.theme-main-menu -->
            </div> <!-- /.container -->
        </div>
    
        <!-- Main Box -->
    
    </header>
