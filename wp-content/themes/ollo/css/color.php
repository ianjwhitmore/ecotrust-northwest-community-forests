<?php


/** Set ABSPATH for execution */
define( 'ABSPATH', dirname(dirname(__FILE__)) . '/' );
define( 'WPINC', 'wp-includes' );


/**
 * @ignore
 */
function add_filter() {}

/**
 * @ignore
 */
function esc_attr($str) {return $str;}

/**
 * @ignore
 */
function apply_filters() {}

/**
 * @ignore
 */
function get_option() {}

/**
 * @ignore
 */
function is_lighttpd_before_150() {}

/**
 * @ignore
 */
function add_action() {}

/**
 * @ignore
 */
function did_action() {}

/**
 * @ignore
 */
function do_action_ref_array() {}

/**
 * @ignore
 */
function get_bloginfo() {}

/**
 * @ignore
 */
function is_admin() {return true;}

/**
 * @ignore
 */
function site_url() {}

/**
 * @ignore
 */
function admin_url() {}

/**
 * @ignore
 */
function home_url() {}

/**
 * @ignore
 */
function includes_url() {}

/**
 * @ignore
 */
function wp_guess_url() {}

if ( ! function_exists( 'json_encode' ) ) :
/**
 * @ignore
 */
function json_encode() {}
endif;



/* Convert hexdec color string to rgb(a) string */
 
function hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}
$yellow = $_GET['main_color'];

ob_start(); ?>






.scroll-top,
.ch-p-bg-color,
.charity-header .bootstrap-select.btn-group .dropdown-menu li a:hover,
#charity-main-banner .tp-caption a.donate-button:hover,
#charity-main-banner .tp-caption a.volunteer-button:hover,
.charity-title h2:before,
.button-six,
.charity-title a:hover,
.charity-theme .help-banner .right-side .opacity .main-content ul li:hover i,
.charity-theme .help-banner .right-side .opacity .main-content .button-two:hover,
.default-footer.charity-footer .bottom-footer ul li a:hover,
.charity-theme .theme-team-style-one .single-team-member .title ul li a:hover,
.charity-theme .charity-pagination li a:hover,
.charity-theme .charity-pagination li:last-child a:hover,
.charity-theme .donation-page form .donate-amount li span:hover,
.charity-theme .recent-cause-style-two .single-cause .title .clearfix a.more:hover,
.charity-theme .recent-cause-details .button-two:hover,
.charity-theme .theme-blog-sidebarOne .widget_tag_cloud .tagcloud a:hover,
.charity-theme .donation-page form .bootstrap-select.btn-group .dropdown-menu li a:hover,
.shop-page .main-wrapper .shop-sidebar .product-tag ul li a:hover,
.shop-page .main-wrapper .shop-sidebar .tagcloud a:hover,
.shop-page .page-pagination li:last-child a:hover,
.shop-page .all-product-wrapper .single-item:hover a.cart,
.shop-page .shop-page-pagination li a:hover,
.shop-page .woocommerce-pagination ul.page-numbers li a:hover,
.menuzord-menu ul.dropdown li:hover > a,
#mega-menu-holder ul.dropdown li a:hover,
.shop-page .main-wrapper .shop-sidebar .widget_price_filter .price_slider_amount .button,
.shop-page .main-wrapper .shop-sidebar .price-ranger .ui-widget-header,
.charity-theme .up-coming-event.event-inner-page .single-events .image .date,
.paginate-links a:hover,
.paginate-links > span,
.post-password-form input[type="submit"],
.tribe-events-sub-nav .post-control a,
p.demo_store,
.woocommerce a.remove:hover,
.woocommerce #respond input#submit.alt.disabled,
.woocommerce #respond input#submit.alt.disabled:hover,
.woocommerce #respond input#submit.alt:disabled,
.woocommerce #respond input#submit.alt:disabled:hover,
.woocommerce #respond input#submit.alt[disabled]:disabled,
.woocommerce #respond input#submit.alt[disabled]:disabled:hover,
.woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover,
.woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover,
.woocommerce a.button.alt[disabled]:disabled,
.woocommerce a.button.alt[disabled]:disabled:hover,
.woocommerce button.button.alt.disabled,
.woocommerce button.button.alt.disabled:hover,
.woocommerce button.button.alt:disabled,
.woocommerce button.button.alt:disabled:hover,
.woocommerce button.button.alt[disabled]:disabled,
.woocommerce button.button.alt[disabled]:disabled:hover,
.woocommerce input.button.alt.disabled,
.woocommerce input.button.alt.disabled:hover,
.woocommerce input.button.alt:disabled,
.woocommerce input.button.alt:disabled:hover,
.woocommerce input.button.alt[disabled]:disabled,
.woocommerce input.button.alt[disabled]:disabled:hover,
.woocommerce #review_form #respond .form-submit input,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content,
form.cart button.add-to-cart,
.woocommerce #respond input#submit,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button,
.woocommerce #place_order,
.charitable-form-field.charitable-submit-field button,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
.collapse-button .icon-bar
{
	background-color: #<?php echo esc_attr($yellow); ?>;
}





.ch-p-color,#mega-menu-holder>ul> li:hover> a,
#mega-menu-holder>ul> li.active> a,
#charity-main-banner .tp-caption a.volunteer-button,
.charity-theme .what-we-do .single-do:hover h5 a,
.charity-theme .recent-cause .single-cause:hover .title h5 a,
.charity-theme .recent-cause .all-cause,
.charity-theme .up-coming-event .single-events .title ul li:last-child a,
.charity-theme .up-coming-event .single-events:hover .title h5 a,
.charity-theme .help-banner .right-side .opacity .main-content ul li i,
.charity-theme .help-banner .right-side .opacity .main-content ul li:hover a,
.charity-theme .recent-news .single-news:hover .post h5 a,
.charity-theme .recent-news .single-news .post .post-tag .share:hover,
.charity-theme .bottom-footer-banner .button-five:hover,
.default-footer.charity-footer .top-footer .footer-list ul li a:hover,
.default-footer.charity-footer .top-footer .widget_pages ul li a:hover,
.default-footer.charity-footer .top-footer .footer-latest-news .single-news span,
.charity-theme .volunteer-banner .opacity .button-four:hover,
.charity-theme .theme-inner-banner .opacity ul li a:hover,
.charity-theme .theme-team-style-one .single-team-member .title span,
.charity-theme .theme-team-style-one .single-team-member:hover .title h6 a,
.charity-theme .recent-cause-style-two .single-cause .title .clearfix a.donate:hover,
.charity-theme .recent-cause-details .text-wrapper .right-side ul li i,
.charity-theme .similer-cause .owl-theme .owl-nav [class*=owl-]:hover,
.charity-theme .theme-blog-sidebarOne .widget_categories ul li a:hover,
.charity-theme .theme-blog-sidebarOne .sidebar-recent-news ul li:hover .post h6 a,
.charity-theme .theme-blog-sidebarOne .sidebar-recent-news ul li .post ul li a:hover,
.charity-theme .theme-contact-page-styleOne .contactUs-address .single-address .icon,
.shop-page .main-wrapper .shop-sidebar .shop-sidebar-list ul li a:hover,
.shop-page .main-wrapper .shop-sidebar ul.product-categories li a:hover,
.charity-theme .blog-details-content .commnet-wrapper .single-comment button:hover,
.charity-theme .blog-details-content .commnet-wrapper .single-comment .reply-option .comment-reply-link:hover,
.shop-page .main-wrapper .shop-sidebar .single-popular-product:hover .product h5 a,
.shop-page .all-product-wrapper .single-item:hover h5 a,
.shop-page .page-pagination li a:hover,
#mega-menu-holder li:hover .sub-toggle,
#mega-menu-holder li.active .sub-toggle,
.product_list_widget .product-title:hover,
.event-details-page .event-large-sidebar .event-title ul li:last-child a,
.event-details-page .event-large-sidebar>ul li i,
.single-cause .text-center span .amount,
.single-cause .text-center span .goal-amount,
.paginate-links a,
.paginate-links > span ,
.widget ul li a:hover,
.no-comments,
.woocommerce .woocommerce-message::before,
.woocommerce .woocommerce-info a,
.woocommerce .woocommerce-info::before,
.woocommerce #respond input#submit.disabled:hover,
.woocommerce #respond input#submit:disabled:hover,
.woocommerce #respond input#submit[disabled]:disabled:hover,
.woocommerce a.button.disabled:hover,
.woocommerce a.button:disabled:hover,
.woocommerce a.button[disabled]:disabled:hover,
.woocommerce button.button.disabled:hover,
.woocommerce button.button:disabled:hover,
.woocommerce button.button[disabled]:disabled:hover,
.woocommerce input.button.disabled:hover,
.woocommerce input.button:disabled:hover,
.woocommerce input.button[disabled]:disabled:hover,
.woocommerce #review_form #respond .form-submit input:hover,
.woocommerce p.stars a,
.woocommerce .woocommerce-message::before,
.woocommerce #place_order:hover,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
.woocommerce .star-rating::before,
.woocommerce .star-rating span
{
	color: #<?php echo esc_attr($yellow); ?>;
}





#charity-main-banner .tp-caption a.volunteer-button,
#charity-main-banner .tp-caption a.donate-button:hover:hover,
.charity-theme .recent-cause .all-cause,
.charity-title a:hover,
.charity-theme .theme-team-style-one .single-team-member .title ul li a:hover,
.charity-theme .help-banner .right-side .opacity .main-content ul li:hover i,
.charity-theme .help-banner .right-side .opacity .main-content .button-two:hover,
.default-footer.charity-footer .bottom-footer ul li a:hover,
.charity-theme .charity-pagination li a:hover,
.charity-theme .recent-cause-style-two .single-cause .codeconSkillbar .skillBar span,
.charity-theme .recent-cause-style-two .single-cause .title .clearfix a.donate,
.charity-theme .recent-cause-style-two .single-cause .title .clearfix a.more:hover,
.charity-theme .recent-cause-details .button-two,
.charity-theme .similer-cause .owl-theme .owl-nav [class*=owl-]:hover,
.charity-theme .blog-details-content .reply-option input:focus,
.charity-theme .blog-details-content .reply-option textarea:focus,
.shop-page .main-wrapper .shop-sidebar .product-tag ul li a:hover,
.shop-page .main-wrapper .shop-sidebar .tagcloud a:hover,
.shop-page .page-pagination li a:hover,
.shop-page .all-product-wrapper .single-item:hover a.cart,
.shop-page .shop-page-pagination li a:hover,
.shop-page .woocommerce-pagination ul.page-numbers li a:hover,
.theme-contact-page-styleOne .contact-us-form form input:focus,
.theme-contact-page-styleOne .contact-us-form form textarea:focus,
.rev_slider_wrapper .rev_slider .donate-button.tran3s:hover,
.paginate-links a,
.paginate-links > span,
.paginate-links a:hover,
.paginate-links > span,
.post-password-form input[type="password"],
.no-comments,
.woocommerce #review_form #respond .form-submit input,
.woocommerce #review_form #respond .form-submit input:hover,
form.cart button.add-to-cart,
.woocommerce .woocommerce-message,
.woocommerce #place_order:hover,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
.pagination > li > a:focus,
.pagination > li > a:hover,
.pagination > li > span:focus,
.pagination > li > span:hover,
.pagination > li > .current,
.pagination > li:hover > .current,
.woocommerce nav.woocommerce-pagination ul li a:focus,
.woocommerce nav.woocommerce-pagination ul li a:hover,
.button-six i
{
	border-color: #<?php echo esc_attr($yellow); ?>;
}


.campaign-raised .amount,
.campaign-figures .amount,
.donors-count, .time-left,
.charitable-form-field a:not(.button),
.charitable-form-fields .charitable-fieldset a:not(.button),
.charitable-notice,
.charitable-notice .errors a
{
	color: #<?php echo esc_attr($yellow); ?> !important;
}




.woocommerce .woocommerce-error,
.woocommerce .woocommerce-info,
.woocommerce .woocommerce-message
{
	border-color: #<?php echo esc_attr($yellow); ?> !important;
}



.rev_slider_wrapper .rev_slider .donate-button.tran3s:hover,
.campaign-progress-bar .bar,
.donate-button,
#charitable-donation-form .donation-amount.selected,
#charitable-donation-amount-form .donation-amount.selected,
#tribe-events .tribe-events-button,
.tribe-events-button,
.pagination > li > a:focus,
.pagination > li > a:hover,
.pagination > li > span:focus,
.pagination > li > span:hover,
.pagination > li > .current,
.pagination > li:hover > .current
{
	background-color: #<?php echo esc_attr($yellow); ?> !important;
	
}



.charity-theme .our-project .single-project .image .opacity
{
    background-color: <?php echo hex2rgba($yellow, 0.9);?> !important;
}




<?php 

$out = ob_get_clean();
$expires_offset = 31536000; // 1 year
header('Content-Type: text/css; charset=UTF-8');
header('Expires: ' . gmdate( "D, d M Y H:i:s", time() + $expires_offset ) . ' GMT');
header("Cache-Control: public, max-age=$expires_offset");
header('Vary: Accept-Encoding'); // Handle proxies
header('Content-Encoding: gzip');

echo gzencode($out);
exit;