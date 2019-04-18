<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alonefoundation_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'alonefoundation' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'alonefoundation' ),
		'before_widget' => '<div id="%1$s"  class="widget widget-wrap %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title ">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'alonefoundation_widgets_init' );

// footer widget 
function alonefoundation_footer_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget', 'alonefoundation' ),
		'id'            => 'footer-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'alonefoundation' ),
		'before_widget' => '<div id="%1$s" class="col-lg-3 col-sm-6  %2$s "><div class="widget-wrap text-white">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="widget-title pdb-30">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'alonefoundation_footer_widgets_init' );
