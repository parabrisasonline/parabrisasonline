<?php
/**
 * Theme Functions
 *
 * @package Betheme
 * @author Muffin group
 * @link http://muffingroup.com
 */


define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );

define( 'THEME_NAME', 'betheme' );
define( 'THEME_VERSION', '20.9.7.5' );

define( 'LIBS_DIR', THEME_DIR. '/functions' );
define( 'LIBS_URI', THEME_URI. '/functions' );
define( 'LANG_DIR', THEME_DIR. '/languages' );

add_filter( 'widget_text', 'do_shortcode' );

add_filter( 'the_excerpt', 'shortcode_unautop' );
add_filter( 'the_excerpt', 'do_shortcode' );


/* ----------------------------------------------------------------------------
 * White Label
 * IMPORTANT: We recommend the use of Child Theme to change this
 * ---------------------------------------------------------------------------- */
defined( 'WHITE_LABEL' ) or define( 'WHITE_LABEL', false );


/* ----------------------------------------------------------------------------
 * Loads Theme Textdomain
 * ---------------------------------------------------------------------------- */
load_theme_textdomain( 'betheme',  LANG_DIR );	// frontend
load_theme_textdomain( 'mfn-opts', LANG_DIR );	// backend


/* ----------------------------------------------------------------------------
 * Loads the Options Panel
 * ---------------------------------------------------------------------------- */
if( ! function_exists( 'mfn_admin_scripts' ) )
{
	function mfn_admin_scripts() {
		wp_enqueue_script( 'jquery-ui-sortable' );
	}
}
add_action( 'wp_enqueue_scripts', 'mfn_admin_scripts' );
add_action( 'admin_enqueue_scripts', 'mfn_admin_scripts' );

require( THEME_DIR .'/muffin-options/theme-options.php' );


/* ----------------------------------------------------------------------------
 * Loads Theme Functions
 * ---------------------------------------------------------------------------- */

$theme_disable = mfn_opts_get( 'theme-disable' );

// Functions ------------------------------------------------------------------
require_once( LIBS_DIR .'/theme-functions.php' );

// Header ---------------------------------------------------------------------
require_once( LIBS_DIR .'/theme-head.php' );

// Menu -----------------------------------------------------------------------
require_once( LIBS_DIR .'/theme-menu.php' );
if( ! isset( $theme_disable['mega-menu'] ) ){
	require_once( LIBS_DIR .'/theme-mega-menu.php' );
}

// Muffin Builder -------------------------------------------------------------
require_once( LIBS_DIR .'/builder/fields.php' );
require_once( LIBS_DIR .'/builder/back.php' );
require_once( LIBS_DIR .'/builder/front.php' );

// Custom post types ----------------------------------------------------------
$post_types_disable = mfn_opts_get( 'post-type-disable' );

if( ! isset( $post_types_disable['client'] ) ){
	require_once( LIBS_DIR .'/meta-client.php' );
}
if( ! isset( $post_types_disable['offer'] ) ){
	require_once( LIBS_DIR .'/meta-offer.php' );
}
if( ! isset( $post_types_disable['portfolio'] ) ){
	require_once( LIBS_DIR .'/meta-portfolio.php' );
}
if( ! isset( $post_types_disable['slide'] ) ){
	require_once( LIBS_DIR .'/meta-slide.php' );
}
if( ! isset( $post_types_disable['testimonial'] ) ){
	require_once( LIBS_DIR .'/meta-testimonial.php' );
}

if( ! isset( $post_types_disable['layout'] ) ){
	require_once( LIBS_DIR .'/meta-layout.php' );
}
if( ! isset( $post_types_disable['template'] ) ){
	require_once( LIBS_DIR .'/meta-template.php' );
}

require_once( LIBS_DIR .'/meta-page.php' );
require_once( LIBS_DIR .'/meta-post.php' );

// Content --------------------------------------------------------------------
require_once( THEME_DIR .'/includes/content-post.php' );
require_once( THEME_DIR .'/includes/content-portfolio.php' );

// Shortcodes -----------------------------------------------------------------
require_once( LIBS_DIR .'/theme-shortcodes.php' );

// Hooks ----------------------------------------------------------------------
require_once( LIBS_DIR .'/theme-hooks.php' );

// Widgets --------------------------------------------------------------------
require_once( LIBS_DIR .'/widget-functions.php' );

require_once( LIBS_DIR .'/widget-flickr.php' );
require_once( LIBS_DIR .'/widget-login.php' );
require_once( LIBS_DIR .'/widget-menu.php' );
require_once( LIBS_DIR .'/widget-recent-comments.php' );
require_once( LIBS_DIR .'/widget-recent-posts.php' );
require_once( LIBS_DIR .'/widget-tag-cloud.php' );

// TinyMCE --------------------------------------------------------------------
require_once( LIBS_DIR .'/tinymce/tinymce.php' );

// Plugins --------------------------------------------------------------------
require_once( LIBS_DIR .'/class-love.php' );
require_once( LIBS_DIR .'/plugins/visual-composer.php' );

// WooCommerce specified functions
if( function_exists( 'is_woocommerce' ) ){
	require_once( LIBS_DIR .'/theme-woocommerce.php' );
}

// Disable responsive images in WP 4.4+ if Retina.js enabled
if( mfn_opts_get( 'retina-js' ) ){
	add_filter( 'wp_calculate_image_srcset', '__return_false' );
}

// Hide activation and update specific parts ----------------------------------

// Slider Revolution
if( ! mfn_opts_get( 'plugin-rev' ) ){
	if( function_exists( 'set_revslider_as_theme' ) ){
		set_revslider_as_theme();
	}
}

// LayerSlider
if( ! mfn_opts_get( 'plugin-layer' ) ){
	add_action( 'layerslider_ready', 'mfn_layerslider_overrides' );
	function mfn_layerslider_overrides() {
		// Disable auto-updates
		$GLOBALS['lsAutoUpdateBox'] = false;
	}
}

// Visual Composer
if( ! mfn_opts_get( 'plugin-visual' ) ){
	add_action( 'vc_before_init', 'mfn_vcSetAsTheme' );
	function mfn_vcSetAsTheme() {
		vc_set_as_theme();
	}
}

// Dashboard ------------------------------------------------------------------
if( is_admin() ){

	require_once LIBS_DIR .'/admin/class-mfn-api.php';
	require_once LIBS_DIR .'/admin/class-mfn-helper.php';
	require_once LIBS_DIR .'/admin/class-mfn-update.php';

	require_once LIBS_DIR .'/admin/class-mfn-dashboard.php';
	$mfn_dashboard = new Mfn_Dashboard();

	if( ! isset( $theme_disable['demo-data'] ) ){
		require_once LIBS_DIR .'/importer/class-mfn-importer.php';
	}

	require_once LIBS_DIR .'/admin/tgm/class-mfn-tgmpa.php';

	if( ! mfn_is_hosted() ){
		require_once LIBS_DIR .'/admin/class-mfn-status.php';
	}

	require_once LIBS_DIR .'/admin/class-mfn-support.php';
	require_once LIBS_DIR .'/admin/class-mfn-changelog.php';
}

function style_person() {
	wp_register_style( 'fonts', get_stylesheet_directory_uri() . '/css/fonts.css' );
	//wp_register_style( 'styles', get_stylesheet_directory_uri() . '/css/styles.css' );
	wp_enqueue_style ('fontawesome', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css');
	wp_enqueue_style ('assistant', 'https://fonts.googleapis.com/css?family=Assistant');
    wp_enqueue_style ('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
	wp_enqueue_script ('bootstrap1', 'https://code.jquery.com/jquery-3.3.1.slim.min.js');
	wp_enqueue_script ('bootstrap2', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js');
	wp_enqueue_script ('bootstrap3', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js');
	wp_enqueue_script ('menu_scroll', get_stylesheet_directory_uri() . '/js/menu_scroll.js');
    
    // Indicamos a WordPress que añada la hoja de estilos que hemos registrado a la página
    
    wp_enqueue_style('bootstrap');
	wp_enqueue_style('fontawesome');
	wp_enqueue_style('assistant');
	wp_enqueue_style('fonts');
	//wp_enqueue_style('styles');
	wp_enqueue_script ('bootstrap1');
	wp_enqueue_script ('bootstrap2');
	wp_enqueue_script ('bootstrap3');
	wp_enqueue_script ('menu_scroll');
}

add_action('wp_enqueue_scripts', 'style_person');

