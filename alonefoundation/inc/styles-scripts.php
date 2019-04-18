<?php
/**
 * Register custom fonts.
 */
function theme_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'alonefoundation' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();
		$font_families[] = 'Poppins:400,600,700';
		$font_families[] = 'Open+Sans:300,400,600,700';
		$font_families[] = 'Handlee';
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function alonefoundation_scripts() {
	
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'alonefoundation-fonts', theme_fonts_url(), array(), null );
	wp_enqueue_style( 'bootstrap-41', get_theme_file_uri( '/asset/css/bootstrap.min.css' ));
	wp_enqueue_style( 'fontawesome-51', get_theme_file_uri( '/asset/fontawesome/css/all.css' ));
	wp_enqueue_style( 'flaticon-collection', get_theme_file_uri( '/asset/flaticon/font/flaticon.css' ));
	wp_enqueue_style( 'slick', get_theme_file_uri( '/asset/slick/slick.css' ));
	wp_enqueue_style( 'slick-theme', get_theme_file_uri( '/asset/slick/slick-theme.css' ));
	wp_enqueue_style( 'fancybox', get_theme_file_uri( '/asset/css/jquery.fancybox.min.css' ));
	wp_enqueue_style( 'animate', get_theme_file_uri( '/asset/css/animate.min.css' ));
	wp_enqueue_style( 'mobile-menu', get_theme_file_uri( '/asset/css/style.min.css' ));
	wp_enqueue_style( 'main-css', get_theme_file_uri( '/asset/css/main.css' ));
	// wp_enqueue_style( 'default-css', get_theme_file_uri( '/asset/css/default.css' ));

	wp_enqueue_style( 'responsive', get_theme_file_uri( '/asset/css/responsive.css' ));
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );


	// inclide js 
	wp_enqueue_script('popper',get_theme_file_uri('/asset/js/popper.min.js'),array('jquery'),'1.0',true);
	wp_enqueue_script('bootstrap-min',get_theme_file_uri('/asset/js/bootstrap.min.js'),array('jquery'),'1.0',true);
	wp_enqueue_script('slick-min',get_theme_file_uri('/asset/slick/slick.js'),array('jquery') ,'1.0',true);
	wp_enqueue_script('mobile-menu-min',get_theme_file_uri('/asset/js/menu.min.js'),array('jquery') ,'1.0',true);
	wp_enqueue_script('imagesloaded-min',get_theme_file_uri('/asset/js/imagesloaded.pkgd.min.js'), array('jquery'),'1.0',true);
	wp_enqueue_script('isotope-pkgd',get_theme_file_uri('/asset/js/isotope.pkgd.min.js'),array('jquery'),'1.0',true);
	wp_enqueue_script('fancybox-min',get_theme_file_uri('/asset/js/jquery.fancybox.min.js'),array('jquery'),'1.0',true);
	wp_enqueue_script('waypoints-min',get_theme_file_uri('/asset/js/waypoints.min.js'),array('jquery'),'1.0',true);
	wp_enqueue_script('counterup-min',get_theme_file_uri('/asset/js/jquery.counterup.min.js'),array('jquery'),'1.0',true);
	wp_enqueue_script('menu-js',get_theme_file_uri('/asset/js/main.js'),array('jquery'),'1.0',true);


	wp_enqueue_script('alonefoundation-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script('alonefoundation-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'alonefoundation_scripts' );


// add_action('types_after_init', 'my_func', 999);
// function my_func(){
//     wp_deregister_style( 'font-awesome' );
//     wp_deregister_style( 'font-awesome-css' );
// }

 
// admin enqueue scripts 
function admin_scripts(){
	
	wp_enqueue_media() ;
	wp_enqueue_script( 'image_upload', get_template_directory_uri() . '/asset/js/admin_scripts.js', array ( 'jquery' ), 1.1, true);
}
add_action( 'admin_enqueue_scripts', 'admin_scripts' );

/********************************************************/
// Adding Dashicons in WordPress Front-end
/********************************************************/
// add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
// function load_dashicons_front_end() {
//   wp_enqueue_style( 'dashicons' );
// } ?>