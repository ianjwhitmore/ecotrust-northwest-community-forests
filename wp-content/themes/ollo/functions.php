<?php
add_action('after_setup_theme', 'ollo_bunch_theme_setup');
function ollo_bunch_theme_setup()
{
	global $wp_version;
	if(!defined('OLLO_VERSION')) define('OLLO_VERSION', '1.0');
	if( !defined( 'OLLO_ROOT' ) ) define('OLLO_ROOT', get_template_directory().'/');
	if( !defined( 'OLLO_URL' ) ) define('OLLO_URL', get_template_directory_uri().'/');	
	include_once get_template_directory() . '/includes/loader.php';
	
	
	load_theme_textdomain('ollo', get_template_directory() . '/languages');
	
	//ADD THUMBNAIL SUPPORT
	add_theme_support('post-thumbnails');
	add_theme_support('woocommerce');
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support('menus'); //Add menu support
	add_theme_support('automatic-feed-links'); //Enables post and comment RSS feed links to head.
	add_theme_support('widgets'); //Add widgets and sidebar support
	add_theme_support( "title-tag" );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	/** Register wp_nav_menus */
	if(function_exists('register_nav_menu'))
	{
		register_nav_menus(
			array(
				/** Register Main Menu location header */
				'main_menu' => esc_html__('Main Menu', 'ollo'),
			)
		);
	}
	if ( ! isset( $content_width ) ) $content_width = 960;
	add_image_size( 'ollo_175x100', 175, 100, true ); // 'ollo_175x100 Our Services'
	add_image_size( 'ollo_86x86', 86, 86, true ); // 'ollo_86x86 Our Menu'
	add_image_size( 'ollo_270x333', 270, 333, true ); // 'ollo_86x86 Our Menu'
	add_image_size( 'ollo_370x250', 370, 250, true ); // 'ollo_86x86 Our Menu
	add_image_size( 'ollo_570x310', 570, 310, true ); // 'ollo_86x86 Our Menu'
	add_image_size( 'ollo_370x247', 370, 247, true ); // 'ollo_86x86 Our Menu'
	add_image_size( 'ollo_740x365', 740, 365, true ); // 'ollo_86x86 Our Menu'
	add_image_size( 'ollo_110x100', 110, 100, true ); // 'ollo_86x86 Our Menu'
	add_image_size( 'ollo_485x388', 485, 388, true ); // 'ollo_86x86 Our Menu'
	add_image_size( 'ollo_270x220', 270, 220, true ); // 'ollo_86x86 Our Menu'
	add_image_size( 'ollo_480x340', 480, 340, true ); // 'ollo_86x86 Our Menu'
	add_image_size( 'ollo_1170x400', 1170, 400, true ); // 'ollo_1170x400 Our Menu'
}
function ollo_bunch_widget_init()
{
	global $wp_registered_sidebars;
	$theme_options = _WSH()->option();
	if( class_exists( 'Bunch_About_us' ) )register_widget( 'Bunch_About_us' );
	if( class_exists( 'Bunch_Subscribe_form' ) )register_widget( 'Bunch_Subscribe_form' );
	if( class_exists( 'Bunch_Recent_Post' ) )register_widget( 'Bunch_Recent_Post' );
	if( class_exists( 'Bunch_Recent_News' ) )register_widget( 'Bunch_Recent_News' );
	
	
	register_sidebar(array(
	  'name' => esc_html__( 'Default Sidebar', 'ollo' ),
	  'id' => 'default-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'ollo' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<h4>',
	  'after_title' => '</h4>'
	));
	register_sidebar(array(
	  'name' => esc_html__( 'Footer Sidebar', 'ollo' ),
	  'id' => 'footer-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown in Footer Area.', 'ollo' ),
	  'before_widget'=>'<div id="%1$s"  class="col-md-3 col-sm-6 footer-widget column %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<h6>',
	  'after_title' => '</h6>'
	));
	
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'ollo' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'ollo' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<h4>',
	  'after_title' => '</h4>'
	));
	if( !is_object( _WSH() )  )  return;
	$sidebars = ollo_set(ollo_set( $theme_options, 'dynamic_sidebar' ) , 'dynamic_sidebar' ); 
	foreach( array_filter((array)$sidebars) as $sidebar)
	{
		if(ollo_set($sidebar , 'topcopy')) continue ;
		
		$name = ollo_set( $sidebar, 'sidebar_name' );
		
		if( ! $name ) continue;
		$slug = ollo_bunch_slug( $name ) ;
		
		register_sidebar( array(
			'name' => $name,
			'id' =>  sanitize_title( $slug ) ,
			'before_widget' => '<div id="%1$s" class="side-bar widget sidebar_widget %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<div class="sec-title"><h3 class="skew-lines">',
			'after_title' => '</h3></div>',
		) );		
	}
	
	update_option('wp_registered_sidebars' , $wp_registered_sidebars) ;
}
add_action( 'widgets_init', 'ollo_bunch_widget_init' );
// Update items in cart via AJAX
function ollo_load_head_scripts() {
	$options = _WSH()->option();
    if ( !is_admin() ) {
		$protocol = is_ssl() ? 'https://' : 'http://';
		$map_path = '?key='.ollo_set($options, 'map_api_key');
		wp_enqueue_script( 'map_api', ''.$protocol.'maps.google.com/maps/api/js'.$map_path, array(), false, false );
		wp_enqueue_script( 'ollo-gmap', get_template_directory_uri().'/js/gmaps.min.js', array(), false, true );
	}
}
add_action( 'wp_enqueue_scripts', 'ollo_load_head_scripts' );
//global variables
function ollo_bunch_global_variable() {
    global $wp_query;
}

function ollo_enqueue_scripts() {
    $theme_options = _WSH()->option();
	$maincolor = str_replace( '#', '' , ollo_set( $theme_options, 'main_color_scheme', '#f8c218' ) );
	//styles
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'gui', get_template_directory_uri() . '/css/gui.css' );
	wp_enqueue_style( 'bootstrap-select', get_template_directory_uri() . '/css/bootstrap-select.css' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css' );
	wp_enqueue_style( 'slimmenu', get_template_directory_uri() . '/css/slimmenu.css' );
	wp_enqueue_style( 'fontawesom', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css' );
	wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/css/owl.theme.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/css/flaticon.css' );
	wp_enqueue_style( 'habilidades', get_template_directory_uri() . '/css/habilidades.css' );
	wp_enqueue_style( 'ollo-main-style', get_stylesheet_uri() );
	wp_enqueue_style( 'ollo-custom-style', get_template_directory_uri() . '/css/custom.css' );
	if(class_exists('woocommerce')) wp_enqueue_style( 'ollo-woocommerce', get_template_directory_uri() . '/css/woocommerce.css' );
	wp_enqueue_style( 'ollo-responsive', get_template_directory_uri() . '/css/responsive.css' );
	wp_enqueue_style( 'ollo-main-color', get_template_directory_uri() . '/css/color.php?main_color='.$maincolor );
	wp_enqueue_style( 'ollo-color-panel', get_template_directory_uri() . '/css/color-panel.css' );
	
	
	
	
	
    //scripts
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), false, true );
	wp_enqueue_script( 'jquery-slimmenu', get_template_directory_uri().'/js/jquery.slimmenu.js', array(), false, true );
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri().'/js/jquery.easing.1.3.js', array(), false, true );
	wp_enqueue_script( 'bootstrap-select', get_template_directory_uri().'/js/bootstrap-select.js', array(), false, true );
	wp_enqueue_script( 'fancybox-pack', get_template_directory_uri().'/js/jquery.fancybox.pack.js', array(), false, true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/js/wow.min.js', array(), false, true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/js/owl.carousel.min.js', array(), false, true );
	wp_enqueue_script( 'jquery-appear', get_template_directory_uri().'/js/jquery.appear.js', array(), false, true );
	wp_enqueue_script( 'jquery-countTo', get_template_directory_uri().'/js/jquery.countTo.js', array(), false, true );
	wp_enqueue_script( 'circle-progress', get_template_directory_uri().'/js/circle-progress.js', array(), false, true );
	wp_enqueue_script( 'map-script', get_template_directory_uri().'/js/map-script.js', array(), false, true );
	wp_enqueue_script( 'map-mixitup', get_template_directory_uri().'/js/jquery.mixitup.min.js', array(), false, true );
	wp_enqueue_script( 'ollo-main-script', get_template_directory_uri().'/js/theme.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
	
}
add_action( 'wp_enqueue_scripts', 'ollo_enqueue_scripts' );

/*-------------------------------------------------------------*/
function ollo_theme_slug_fonts_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $source_sans_pro = _x( 'on', 'Source+Sans+Pro: on or off', 'ollo' );
	$roboto = _x( 'on', 'Roboto font: on or off', 'ollo' );
 
    if ( 'off' !== $source_sans_pro || 'off' !== $roboto ) {
        $font_families = array();
 
        if ( 'off' !== $source_sans_pro ) {
            $font_families[] = 'Source+Sans+Pro:300,400,600,700';
        }
		
		if ( 'off' !== $roboto ) {
            $font_families[] = 'Roboto:300,400,500,700,900';
        }
 
        $opt = get_option('ollo'.'_theme_options');
		if ( ollo_set( $opt, 'body_custom_font' ) ) {
			if ( $custom_font = ollo_set( $opt, 'body_font_family' ) )
				$font_families[] = $custom_font . ':300,300i,400,400i,600,700';
		}
		if ( ollo_set( $opt, 'use_custom_font' ) ) {
			$font_families[] = ollo_set( $opt, 'h1_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = ollo_set( $opt, 'h2_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = ollo_set( $opt, 'h3_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = ollo_set( $opt, 'h4_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = ollo_set( $opt, 'h5_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = ollo_set( $opt, 'h6_font_family' ) . ':300,300i,400,400i,600,700';
		}
		$font_families = array_unique( $font_families);
        
		$query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}
function ollo_theme_slug_scripts_styles() {
    wp_enqueue_style( 'ollo-theme-slug-fonts', ollo_theme_slug_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'ollo_theme_slug_scripts_styles' );
/*---------------------------------------------------------------------*/
function ollo_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'ollo_add_editor_styles' );
/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */ 
function ollo_woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'ollo_jk_related_products_args' );
  function ollo_jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 3; // arranged in 2 columns
	return $args;
}