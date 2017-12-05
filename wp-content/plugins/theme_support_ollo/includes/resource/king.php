<?php
/**
 * Kingcomposer array
 *
 * @package Student WP
 * @author Shahbaz Ahmed <shahbazahmed9@hotmail.com>
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$orderby = array(
				"type"			=>	"select",
				"label"			=>	esc_html__("Order By", BUNCH_NAME),
				"name"			=>	"sort",
				'options'		=>	array('date'=>esc_html__('Date', BUNCH_NAME),'title'=>esc_html__('Title', BUNCH_NAME) ,'name'=>esc_html__('Name', BUNCH_NAME) ,'author'=>esc_html__('Author', BUNCH_NAME),'comment_count' =>esc_html__('Comment Count', BUNCH_NAME),'random' =>esc_html__('Random', BUNCH_NAME) ),
				"description"	=>	esc_html__("Enter the sorting order.", BUNCH_NAME)
			);
$order = array(
				"type"			=>	"select",
				"label"			=>	esc_html__("Order", BUNCH_NAME),
				"name"			=>	"order",
				'options'		=>	(array('ASC'=>esc_html__('Ascending', BUNCH_NAME),'DESC'=>esc_html__('Descending', BUNCH_NAME) ) ),			
				"description"	=>	esc_html__("Enter the sorting order.", BUNCH_NAME)
			);
$number = array(
				"type"			=>	"text",
				"label"			=>	esc_html__('Number', BUNCH_NAME ),
				"name"			=>	"num",
				"description"	=>	esc_html__('Enter Number of posts to Show.', BUNCH_NAME )
			);
$text_limit = array(
				"type"			=>	"text",
				"label"			=>	esc_html__('Text Limit', BUNCH_NAME ),
				"name"			=>	"text_limit",
				"description"	=>	esc_html__('Enter text limit of posts to Show.', BUNCH_NAME )
			);
$title = array(
				"type"			=>	"text",
				"label"			=>	esc_html__('Title', BUNCH_NAME ),
				"name"			=>	"title",
				"description"	=>	esc_html__('Enter section title.', BUNCH_NAME )
			);
$subtitle = array(
				"type"			=>	"text",
				"label"			=>	esc_html__('Sub-Title', BUNCH_NAME ),
				"name"			=>	"subtitle",
				"description"	=>	esc_html__('Enter section subtitle.', BUNCH_NAME )
			);
$text  = array(
				"type"			=>	"textarea",
				"label"			=>	esc_html__('Text', BUNCH_NAME ),
				"name"			=>	"text",
				"description"	=>	esc_html__('Enter text to show.', BUNCH_NAME )
			);
$btn_title = array(
				"type"			=>	"text",
				"label"			=>	esc_html__('Button Title', BUNCH_NAME ),
				"name"			=>	"btn_title",
				"description"	=>	esc_html__('Enter section Button title.', BUNCH_NAME )
			);
$btn_link = array(
				"type"			=>	"text",
				"label"			=>	esc_html__('Button Link', BUNCH_NAME ),
				"name"			=>	"btn_link",
				"description"	=>	esc_html__('Enter section Button Link.', BUNCH_NAME )
			);
$bg_img = array(
				"type"			=>	"attach_image_url",
				"label"			=>	esc_html__('Background Image', BUNCH_NAME ),
				"name"			=>	"bg_img",
				'admin_label' 	=> 	false,
				"description"	=>	esc_html__('Choose Background image.', BUNCH_NAME )
			);

$options = array();


// Revslider Start.
$options['bunch_revslider']	=	array(
					'name' => esc_html__('Revslider', BUNCH_NAME),
					'base' => 'bunch_revslider',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show  Revolution slider.', BUNCH_NAME),
					'params' => array(
						array(
							'type' => 'dropdown',
							'label' => esc_html__('Choose Slider', BUNCH_NAME ),
							'name' => 'slider_slug',
							'options' => bunch_get_rev_slider( 0 ),
							'description' => esc_html__('Choose Slider', BUNCH_NAME )
						),

					),
			);
			
//google Map
$options['bunch_map']	=	array(
					'name' => esc_html__('Google Map', BUNCH_NAME),
					'base' => 'bunch_map',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show google Map.', BUNCH_NAME),
					'params' => array(
						$title,
						array(
							"type"			=>	"text",
							"label"			=>	esc_html__('Enter Latitude', BUNCH_NAME ),
							"name"			=>	"latitude",
							"description"	=>	esc_html__('Enter Latitude', BUNCH_NAME )
						),
						array(
							"type"			=>	"text",
							"label"			=>	esc_html__('Enter Longitude', BUNCH_NAME ),
							"name"			=>	"longitude",
							"description"	=>	esc_html__('Enter Longitude', BUNCH_NAME )
						),
						array(
							"type"			=>	"attach_image_url",
							"label"			=>	esc_html__('Map Image', BUNCH_NAME ),
							"name"			=>	"map_img",
							'admin_label' 	=> 	false,
							"description"	=>	esc_html__('Upload Map Image.', BUNCH_NAME )
						),
					),
			);
			
//Contact Form
$options['bunch_contact_form']	=	array(
					'name' => esc_html__('Contact Form', BUNCH_NAME),
					'base' => 'bunch_contact_form',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Contact Form & Contact Info.', BUNCH_NAME),
					'params' => array(
						esc_html__( 'Contact Form', BUNCH_NAME ) => array(
							$title,
							array(
								"type"			=>	"textarea",
								"label"			=>	esc_html__('Contact Form', BUNCH_NAME ),
								"name"			=>	"contact_form",
								"description"	=>	esc_html__('Enter Contact Form', BUNCH_NAME )
							),
						),
						esc_html__( 'Contact Info', BUNCH_NAME ) => array(
							array(
								"type"			=>	"text",
								"label"			=>	esc_html__('Title', BUNCH_NAME ),
								"name"			=>	"title1",
								"description"	=>	esc_html__('Enter section title.', BUNCH_NAME )
							),
							$text,
							array(
								 'type' => 'group',
								 'label' => esc_html__( 'Add Info', BUNCH_NAME ),
								 'name' => 'info',
								 'description' => esc_html__( 'Enter the Info.', BUNCH_NAME ),
								 'params' => array(
								 		array(
											'type' 			=> 'icon_picker',
											'label' 		=> esc_html__( 'Icon Picker', 'dailysports' ),
											'name' 			=> 'icon1',
											'description' 	=> esc_html__( 'Choose the Icon', 'dailysports' ),
										),
										array(
											 'type' => 'text',
											 'label' => esc_html__( 'Title', BUNCH_NAME ),
											 'name' => 'title2',
											 'description' => esc_html__( 'Enter toggle title.', BUNCH_NAME ),
										),
										array(
											 'type' => 'textarea',
											 'label' => esc_html__( 'Description', BUNCH_NAME ),
											 'name' => 'description',
											 'description' => esc_html__( 'Enter Description.', BUNCH_NAME ),
										),
								 ),
							),//Group End
						),
					),
			);
			
//About History
$options['bunch_about_history']	=	array(
					'name' => esc_html__('Our history', BUNCH_NAME),
					'base' => 'bunch_about_history',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'is_container' => true,
					'description' => esc_html__('Show About Us History', BUNCH_NAME),
					'params' => array(
						array(
							'type' => 'attach_images',
							'label' => esc_html__( 'Attach Images', BUNCH_NAME ),
							'name' => 'history_img',
							'description' => esc_html__( 'Choose images.', BUNCH_NAME ),
						),
						array(
							'name' => 'content',
							'label' => esc_html__( 'Title', BUNCH_NAME ),
							'type' => 'textarea_html',
							'value' => '',
							'description' => esc_html__( 'Enter Title', BUNCH_NAME ),
						),
						array(
							'name' => 'description',
							'label' => esc_html__( 'Description', BUNCH_NAME ),
							'type' => 'textarea',
							'value' => '',
							'description' => esc_html__( 'Enter description', BUNCH_NAME ),
						),
						array(
							'type' => 'attach_image_url',
							'label' => esc_html__( 'Author Image', BUNCH_NAME ),
							'name' => 'author_img',
							'description' => esc_html__( 'Choose Author Image.', BUNCH_NAME ),
						),
						array(
							"type"			=>	"text",
							"label"			=>	esc_html__('Enter Name', BUNCH_NAME ),
							"name"			=>	"name",
							"description"	=>	esc_html__('Enter Name', BUNCH_NAME )
						),
						array(
							"type"			=>	"text",
							"label"			=>	esc_html__('Enter Designation', BUNCH_NAME ),
							"name"			=>	"designation",
							"description"	=>	esc_html__('Enter Designation', BUNCH_NAME )
						),
						array(
							"type"			=>	"attach_image_url",
							"label"			=>	esc_html__('Signature Image', BUNCH_NAME ),
							"name"			=>	"sign_img",
							'admin_label' 	=> 	false,
							"description"	=>	esc_html__('Upload Signature Image.', BUNCH_NAME )
						),
					),
			);

//Services Three Column Style 2
$options['bunch_services1']	=	array(
					'name' => esc_html__('services 3 columns Style 2', BUNCH_NAME),
					'base' => 'bunch_services1',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Services 3 columns Style 2', BUNCH_NAME),
					'params' => array(
						$text_limit,
						$number,
						array(
							"type" => "dropdown",
							"label" => __( 'Category', BUNCH_NAME),
							"name" => "cat",
							"options" =>  bunch_get_categories(array( 'taxonomy' => 'services_category'), true),
							"description" => __( 'Choose Category.', BUNCH_NAME)
						),
						$orderby,
						$order,

					),
			);
			
//fun Facts Home 1
$options['bunch_fun_facts']	=	array(
					'name' => esc_html__('Fun Facts', BUNCH_NAME),
					'base' => 'bunch_fun_facts',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Fun Facts Home 1.', BUNCH_NAME),
					'params' => array(
						//Group Start
							array(
								 'type' => 'group',
								 'label' => esc_html__( 'Fun Facts', BUNCH_NAME ),
								 'name' => 'facts',
								 'description' => esc_html__( 'Enter the Fun Facts.', BUNCH_NAME ),
								 'params' => array(
										array(
											 'type' => 'text',
											 'label' => esc_html__( 'Title', BUNCH_NAME ),
											 'name' => 'title',
											 'description' => esc_html__( 'Enter Facts title.', BUNCH_NAME ),
										),
										array(
											 'type' => 'text',
											 'label' => esc_html__( 'Start Number', BUNCH_NAME ),
											 'name' => 'start_num',
											 'description' => esc_html__( 'Enter Start Number.', BUNCH_NAME ),
										),
										array(
											 'type' => 'text',
											 'label' => esc_html__( 'End Number', BUNCH_NAME ),
											 'name' => 'end_num',
											 'description' => esc_html__( 'Enter End Number.', BUNCH_NAME ),
										),
										array(
											'name'        => 'show_percentage',
											'label'       => esc_html__( 'Show Plus sign', BUNCH_NAME ),
											'type'        => 'checkbox',
											'description' => esc_html__( 'Whether to show plus sign or not', BUNCH_NAME ),
											'options'     => array( 'yes' => 'Yes, Please!' )
										),
								 ),
							),//Group End

					),
			);
			
//Our Team Home 1
$options['bunch_our_team']	=	array(
					'name' => esc_html__('Our Volunteer', BUNCH_NAME),
					'base' => 'bunch_our_team',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Our Team', BUNCH_NAME),
					'params' => array(
						array(
							'name'        => 'show_title',
							'label'       => esc_html__( 'Show Title & Description', BUNCH_NAME ),
							'type'        => 'checkbox',
							'description' => esc_html__( 'Whether to show or not title & Description', BUNCH_NAME ),
							'options'     => array( 'yes' => 'Yes, Please!' )
						),
						array(
							"type"			=>	"text",
							"label"			=>	esc_html__('Title', BUNCH_NAME ),
							"name"			=>	"title",
							"description"	=>	esc_html__('Enter section title.', BUNCH_NAME ),
							'relation' => array(
								'parent'    => 'show_title',
								'show_when' => 'yes'
							)
						),
						array(
							"type"			=>	"textarea",
							"label"			=>	esc_html__('Text', BUNCH_NAME ),
							"name"			=>	"text",
							"description"	=>	esc_html__('Enter text to show.', BUNCH_NAME ),
							'relation' => array(
								'parent'    => 'show_title',
								'show_when' => 'yes'
							)
						),
						$number,
						array(
							"type" => "dropdown",
							"label" => __( 'Category', BUNCH_NAME),
							"name" => "cat",
							"options" =>  bunch_get_categories(array( 'taxonomy' => 'team_category'), true),
							"description" => __( 'Choose Category.', BUNCH_NAME)
						),
						$orderby,
						$order,
					),
			);
			
//Testimonials
$options['bunch_testimonials']	=	array(
					'name' => esc_html__('Our Testimonials', BUNCH_NAME),
					'base' => 'bunch_testimonials',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Testimonials', BUNCH_NAME),
					'params' => array(
						$title,
						$text_limit,
						$number,
						array(
							"type" => "dropdown",
							"label" => __( 'Category', BUNCH_NAME),
							"name" => "cat",
							"options" =>  bunch_get_categories(array( 'taxonomy' => 'testimonials_category'), true),
							"description" => __( 'Choose Category.', BUNCH_NAME)
						),
						$orderby,
						$order,

					),
			);
			
//Call to action
$options['bunch_call_to_action']	=	array(
					'name' => esc_html__('Call to Action', BUNCH_NAME),
					'base' => 'bunch_call_to_action',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Call to Action Home 1.', BUNCH_NAME),
					'params' => array(
						$bg_img,
						$title,
						$text,
						$btn_title,
						$btn_link,
					),
			);
			
//Services Three Column Style 1
$options['bunch_services']	=	array(
					'name' => esc_html__('services 3 columns', BUNCH_NAME),
					'base' => 'bunch_services',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Services 3 columns Style 1', BUNCH_NAME),
					'params' => array(
						$title,
						$text_limit,
						$number,
						array(
							"type" => "dropdown",
							"label" => __( 'Category', BUNCH_NAME),
							"name" => "cat",
							"options" =>  bunch_get_categories(array( 'taxonomy' => 'services_category'), true),
							"description" => __( 'Choose Category.', BUNCH_NAME)
						),
						$orderby,
						$order,

					),
			);
			
//About Us
$options['bunch_about_us']	=	array(
					'name' => esc_html__('About Us', BUNCH_NAME),
					'base' => 'bunch_about_us',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'is_container' => true,
					'description' => esc_html__('Show About Us', BUNCH_NAME),
					'params' => array(
						array(
							'type' => 'attach_image_url',
							'label' => esc_html__( 'Attach Image', BUNCH_NAME ),
							'name' => 'about_img',
							'description' => esc_html__( 'Choose image.', BUNCH_NAME ),
						),
						array(
							'name' => 'content',
							'label' => esc_html__( 'Title', BUNCH_NAME ),
							'type' => 'textarea_html',
							'value' => '',
							'description' => esc_html__( 'Enter Title', BUNCH_NAME ),
						),
						array(
							'name' => 'description',
							'label' => esc_html__( 'Description', BUNCH_NAME ),
							'type' => 'textarea',
							'value' => '',
							'description' => esc_html__( 'Enter description', BUNCH_NAME ),
						),
						$btn_title,
						$btn_link,
					),
			);

//Our Blog
$options['bunch_our_blog']	=	array(
					'name' => esc_html__('Recent News', BUNCH_NAME),
					'base' => 'bunch_our_blog',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Recent News.', BUNCH_NAME),
					'params' => array(
						$title,
						$text_limit,
						$number,
						array(
							"type" => "dropdown",
							"label" => __('Category', BUNCH_NAME),
							"name" => "cat",
							"options" =>  bunch_get_categories(array('taxonomy' => 'category'), true),
							"description" => __('Choose Category.', BUNCH_NAME)
						),
						$orderby,
						$order,

					),
			);
			
//Upcomming Events
$options['bunch_upcomming_events']	=	array(
					'name' => esc_html__('Upcomming Events', BUNCH_NAME),
					'base' => 'bunch_upcomming_events',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Upcomming Events', BUNCH_NAME),
					'params' => array(
						$title,
						$btn_title,
						$btn_link,
						$text,
						$number,
						array(
						 "type" => "dropdown",
						 "label" => __( 'Category', BUNCH_NAME),
						 "name" => "cat",
						 "options" =>  ollo_bunch_get_categories(array( 'taxonomy' => 'tribe_events_cat'), true),
						 "description" => __( 'Choose Category.', BUNCH_NAME)
						),
					),
			);
			
//Recent Causes
$options['bunch_recent_causes']	=	array(
					'name' => esc_html__('Recent Causes', BUNCH_NAME),
					'base' => 'bunch_recent_causes',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Recent Causes', BUNCH_NAME),
					'params' => array(
						$title,
						$text_limit,
						$btn_title,
						$btn_link,
						$number,
						array(
						 "type" => "dropdown",
						 "label" => __( 'Category', BUNCH_NAME),
						 "name" => "cat",
						 "options" =>  ollo_bunch_get_categories(array( 'taxonomy' => 'tribe_events_cat'), true),
						 "description" => __( 'Choose Category.', BUNCH_NAME)
						),
					),
			);
			
//Our Events
$options['bunch_our_events']	=	array(
					'name' => esc_html__('Our Events', BUNCH_NAME),
					'base' => 'bunch_our_events',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Our Events', BUNCH_NAME),
					'params' => array(
						$number,
						array(
						 "type" => "dropdown",
						 "label" => __( 'Category', BUNCH_NAME),
						 "name" => "cat",
						 "options" =>  ollo_bunch_get_categories(array( 'taxonomy' => 'tribe_events_cat'), true),
						 "description" => __( 'Choose Category.', BUNCH_NAME)
						),
					),
			);			
			
//Help Us
$options['bunch_help_us']	=	array(
					'name' => esc_html__('Help Us', BUNCH_NAME),
					'base' => 'bunch_help_us',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Help Us', BUNCH_NAME),
					'params' => array(
						array(
							"type"			=>	"attach_image_url",
							"label"			=>	esc_html__('Background Image', BUNCH_NAME ),
							"name"			=>	"bg_img",
							'admin_label' 	=> 	false,
							"description"	=>	esc_html__('Choose Background image.', BUNCH_NAME )
						),
						array(
							"type"			=>	"attach_image_url",
							"label"			=>	esc_html__('Upload Image', BUNCH_NAME ),
							"name"			=>	"upload_img",
							'admin_label' 	=> 	false,
							"description"	=>	esc_html__('Choose image.', BUNCH_NAME )
						),
						$title,
						$text,
						//Group Start
							array(
								 'type' => 'group',
								 'label' => esc_html__( 'Help Us', BUNCH_NAME ),
								 'name' => 'help',
								 'description' => esc_html__( 'Enter the options.', BUNCH_NAME ),
								 'params' => array(
								 		array(
											'type' 			=> 'icon_picker',
											'label' 		=> esc_html__( 'Icon Picker', 'dailysports' ),
											'name' 			=> 'icon1',
											'description' 	=> esc_html__( 'Choose the Icon', 'dailysports' ),
										),
										array(
											 'type' => 'text',
											 'label' => esc_html__( 'Title', BUNCH_NAME ),
											 'name' => 'title',
											 'description' => esc_html__( 'Enter Facts title.', BUNCH_NAME ),
										),
										array(
											 'type' => 'text',
											 'label' => esc_html__( 'Enter URL', BUNCH_NAME ),
											 'name' => 'url',
											 'description' => esc_html__( 'Enter URL.', BUNCH_NAME ),
										),
								 ),
							),//Group End
							$btn_title,
							$btn_link,

					),
			);

//Our Blog Grid
$options['bunch_blog_grid']	=	array(
					'name' => esc_html__('Blog Grid', BUNCH_NAME),
					'base' => 'bunch_blog_grid',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Blog Grid', BUNCH_NAME),
					'params' => array(
						$text_limit,
						$number,
						array(
							"type" => "dropdown",
							"label" => __('Category', BUNCH_NAME),
							"name" => "cat",
							"options" =>  bunch_get_categories(array('taxonomy' => 'category'), true),
							"description" => __('Choose Category.', BUNCH_NAME)
						),
						$orderby,
						$order,

					),
			);

//Faqs Shortcode
$options['bunch_faqs']	=	array(
					'name' => esc_html__('Faqs', BUNCH_NAME),
					'base' => 'bunch_faqs',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Faqs on Faqs Page.', BUNCH_NAME),
					'params' => array(
						$title,
						$number,
						array(
							"type" => "dropdown",
							"label" => __( 'Category', BUNCH_NAME),
							"name" => "cat",
							"options" =>  bunch_get_categories(array( 'taxonomy' => 'faqs_category'), true),
							"description" => __( 'Choose Category.', BUNCH_NAME)
						),
						$orderby,
						$order,
					),
			);
			
//Recent Causes List
$options['bunch_recent_causes_list']	=	array(
					'name' => esc_html__('Recent Causes List', BUNCH_NAME),
					'base' => 'bunch_recent_causes_list',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Recent Causes List view', BUNCH_NAME),
					'params' => array(
						$text_limit,
						$number,
						array(
						 "type" => "dropdown",
						 "label" => __( 'Category', BUNCH_NAME),
						 "name" => "cat",
						 "options" =>  ollo_bunch_get_categories(array( 'taxonomy' => 'tribe_events_cat'), true),
						 "description" => __( 'Choose Category.', BUNCH_NAME)
						),
					),
			);
			
			
//Recent Causes Grid
$options['bunch_recent_causes_grid']	=	array(
					'name' => esc_html__('Recent Causes grid', BUNCH_NAME),
					'base' => 'bunch_recent_causes_grid',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Recent Causes Grid View', BUNCH_NAME),
					'params' => array(
						$text_limit,
						$number,
						array(
						 "type" => "dropdown",
						 "label" => __( 'Category', BUNCH_NAME),
						 "name" => "cat",
						 "options" =>  ollo_bunch_get_categories(array( 'taxonomy' => 'tribe_events_cat'), true),
						 "description" => __( 'Choose Category.', BUNCH_NAME)
						),
					),
			);
			
//Our Gallery
$options['bunch_our_gallery']	=	array(
					'name' => esc_html__('Our Gallery', BUNCH_NAME),
					'base' => 'bunch_our_gallery',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Our Gallery', BUNCH_NAME),
					'params' => array(
						$number,
						array(
						   "type" => "textfield",
						   "label" => __('Excluded Categories ID', BUNCH_NAME ),
						   "name" => "exclude_cats",
						   "description" => __('Enter Excluded Categories ID seperated by commas(13,14).', BUNCH_NAME )
						),
						$orderby,
						$order,

					),
			);
	
//Our Gallery Full Width
$options['bunch_gallery_fullwidth']	=	array(
					'name' => esc_html__('Gallery Full Width', BUNCH_NAME),
					'base' => 'bunch_gallery_fullwidth',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Our Gallery', BUNCH_NAME),
					'params' => array(
						$number,
						array(
						   "type" => "textfield",
						   "label" => __('Excluded Categories ID', BUNCH_NAME ),
						   "name" => "exclude_cats",
						   "description" => __('Enter Excluded Categories ID seperated by commas(13,14).', BUNCH_NAME )
						),
						$orderby,
						$order,

					),
			);
			
//fun Call to action 2
$options['bunch_call_to_action_2']	=	array(
					'name' => esc_html__('Call to Action Style 2', BUNCH_NAME),
					'base' => 'bunch_call_to_action_2',
					'class' => '',
					'category' => esc_html__('Ollo', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Call to Action Home 2.', BUNCH_NAME),
					'params' => array(
						$title,
						array(
							"type"			=>	"color_picker",
							"label"			=>	esc_html__('Background color', BUNCH_NAME ),
							"name"			=>	"bg_color",
							"description"	=>	esc_html__('choose Background Color', BUNCH_NAME )
						),
					),
			);
			
return $options;