<?php
// $theme_directory = get_template_directory_uri();
// define('THEME_DIRECTORY_URI', $theme_directory);
// coustom function 
require get_template_directory() . '/inc/helper/helper-function.php';

/**
 * AloneFoundation functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AloneFoundation
 */

if ( ! function_exists( 'alonefoundation_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function alonefoundation_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on AloneFoundation, use a find and replace
		 * to change 'alonefoundation' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'alonefoundation', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.

		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'alonefoundation' ),
			// 'footer-menu' => esc_html__( 'Footer Menu', 'toppic' ),
		) );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'alonefoundation_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		add_image_size('peoject',614,346 , true);
		add_image_size('event-speatial',504,346, true);

	}
endif;
add_action( 'after_setup_theme', 'alonefoundation_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alonefoundation_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'alonefoundation_content_width', 640 );
}
add_action( 'after_setup_theme', 'alonefoundation_content_width', 0 );



// substr($string, 0, 100)
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

/**
 * Enqueue scripts and styles.
 */

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
require get_template_directory() . '/inc/styles-scripts.php';

require get_template_directory() . '/inc/registerwidget.php';

// // plugin option 
require get_template_directory() . '/inc/plugin/tgm/tgm-custom.php';

require get_template_directory() . '/inc/plugin/redux/redux-config.php';

require get_template_directory() . '/inc/plugin/Meta-Box.php';
// // // theme file 
require get_template_directory() . '/inc/coustom-post-type.php';

require get_template_directory() . '/inc/kc-shortcode/main-shortcode.php';

require get_template_directory() . '/inc/widget/Widget_Recent_Posts.php';

require get_template_directory() . '/inc/widget/coustom-contact-us-widget.php';




