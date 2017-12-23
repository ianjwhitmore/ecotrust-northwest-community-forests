<?php
/*
Plugin Name: Theme Support
Plugin URI: http://themeforest.net/
Description: This plugin is compatible with this wordpress themes. 
Author: Foqrul Islam
Author URI: http://themeforest.net/user/unifytheme
Version: 1.0
Text Domain: BUNCH_NAME
*/
if( !defined( 'BUNCH_TH_ROOT' ) ) define('BUNCH_TH_ROOT', plugin_dir_path( __FILE__ ));
if( !defined( 'BUNCH_TH_URL' ) ) define( 'BUNCH_TH_URL', plugins_url( '', __FILE__ ) );
if( !defined( 'BUNCH_NAME' ) ) define( 'BUNCH_NAME', 'ollo' );
include_once( 'includes/loader.php' );