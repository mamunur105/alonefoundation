<?php
/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
Alone_setup_post_type_project();
// add_action( 'init', 'Alone_setup_post_type_project');
function Alone_setup_post_type_project() {
        // event custom post and tax 
    $alone_event_args = array(
        'labels'             => array(
                                'name'               => _x( 'Event', 'post type general name', 'alonefoundation' ),
                                'add_new'            => _x( 'Add New', 'Event', 'alonefoundation' ),
                                'add_new_item'       => __( 'Add New Event', 'alonefoundation' ),
                                'new_item'           => __( 'New Event', 'alonefoundation' ),
                                'edit_item'          => __( 'Edit Event', 'alonefoundation' ),
                                'view_item'          => __( 'View Event', 'alonefoundation' ),
                                'all_items'          => __( 'All Event', 'alonefoundation' ),
                            ),
        'description'        => __( 'Description.', 'alonefoundation' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'alone-event' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'taxonomies'            => array(''),
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor','thumbnail')
    );
    register_post_type( 'alone-event', $alone_event_args );
    $alone_event_tax = array(
        'label' => __( 'Category' ),
        'rewrite' => array( 'slug' => 'event_tax' ),
        'hierarchical' => true,
    ) ;
    register_taxonomy( 'tax_alone_event',array('alone-event'),$alone_event_tax );



    // alone project 
    
    $alone_project_args = array(
        'labels'             => array(
                                'name'               => _x( 'Alone Project', 'post type general name', 'alonefoundation' ),
                                'add_new'            => _x( 'Add New', 'Project', 'alonefoundation' ),
                                'add_new_item'       => __( 'Add New Project', 'alonefoundation' ),
                                'new_item'           => __( 'New Project', 'alonefoundation' ),
                                'edit_item'          => __( 'Edit Project', 'alonefoundation' ),
                                'view_item'          => __( 'View Project', 'alonefoundation' ),
                                'all_items'          => __( 'All Project', 'alonefoundation' ),
                            ),
        'description'        => __( 'Description.', 'alonefoundation' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'rewrite'            => array( 'slug' => 'alone-project' ),
        'query_var'          => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor','thumbnail', 'excerpt')
    );
    register_post_type( 'alone-project', $alone_project_args );

    $alone_projectc_tax = array(
        'label' => __( 'Category' ),
        'rewrite' => array( 'slug' => 'tax_alone_project' ),
        'hierarchical' => true,
    ) ;
    register_taxonomy( 'tax_alone_project', array('alone-project'),$alone_projectc_tax );


} 


