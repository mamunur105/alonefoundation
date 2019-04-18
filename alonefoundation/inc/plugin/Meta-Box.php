<?php 

if ( ! function_exists( 'rwmb_meta' ) ) {
    function rwmb_meta( $key, $args = '', $post_id = null ) {
        return false;
    }
}


add_filter( 'rwmb_meta_boxes', 'prefix_register_meta_boxes' );
function prefix_register_meta_boxes( $meta_boxes ) {
    if (!empty(theme_option('google_map_api'))):
        $api_keys =  theme_option('google_map_api') ;
    else:
        $api_keys =  'xxxxxxxxxxxx' ;
    endif;
    // $prefix = 'field_prefix_';
    $meta_boxes[] = array(
        'id'         => 'alone-event',
        'title'      => 'Alone Event Information',
        'post_types' => 'alone-event',
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
				'id'        => 'start_time',
				'name'      => 'Start Time',
				'type'      => 'datetime',
                'timestamp' =>true,
            ),
            array(
                'id'        => 'end_time',
                'name'      => 'End Time',
                'type'      => 'datetime',
            ),
            array(
                'id'        => 'speakers_name',
                'name'      => 'Speakers',
                'type'      => 'text',
            ),
            array(
                'id'        => 'apply_lastdate',
                'name'      => 'Apply last date ',
                // 'type'      => 'text',
                'type'      => 'datetime',
            ),
            // map address field 
            array(
                'id'        => 'location_details',
                'name'      => 'Location',
                'type'      => 'textarea',
            ),
            // Map field.
            array(
                'id'            => 'google_map',
                'name'          => 'Location',
                'type'          => 'map',
                // Default location: 'latitude,longitude[,zoom]' (zoom is optional)
                'std'           => '-6.233406,-35.049906,15',
                // Address field ID
                'address_field' => 'location_details',
                // Google API key
                'api_key'       => $api_keys,
            ),
        )
    );

    return $meta_boxes;
}

// revolation slider list 
function rev_slider_list(){
    if ( class_exists( 'RevSlider' ) ) {
        $slider = new RevSlider();
        $revolution_sliders = $slider->getArrSliders();
         
        $option = array();

        foreach ( $revolution_sliders as $revolution_slider ) {
            $alias = $revolution_slider->getAlias();
            $title = $revolution_slider->getTitle(); 
            $option[$alias] = $title ;
        }
    } else {
        $option = array();
    }
    return $option ;
}


add_filter( 'rwmb_meta_boxes', 'register_meta_boxes_for_page' );
function register_meta_boxes_for_page( $meta_boxes ) {



    $meta_boxes[] = array(
        'id'         => 'alone-event',
        'title'      => 'Page information ',
        'post_types' => 'page',
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'id'                => 'banner_image',
                'name'              => 'Page Bannaer Image',
                'type'              => 'image_advanced',
                // Delete image from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same image for multiple posts
                'force_delete'      => false,
                // Maximum image uploads.
                'max_file_uploads'  => 1,
                // Do not show how many images uploaded/remaining.
                'max_status'        => 'false',
                // Image size that displays in the edit page.
                'image_size'        => 'full',
            ),
            array(
                'id'                => 'page_divider_0',
                'type'              => 'divider',
            ),
            array(
                'id'                => 'banner_height',
                'name'              => 'Page Bannaer Minimum Height',
                'desc'              => '300px',
                'type'              => 'text',
                'placeholder'       => '300px',
            ),
            array(
                'id'                => 'page_divider_1',
                'type'              => 'divider',
            ),
            array(
                'id'                => 'enable_slider',
                'name'              => 'Enable Slider',
                'type'              => 'switch',
                // Style: rounded (default) or square
                'style'             => 'square',
                // On label: can be any HTML
                'on_label'          => 'Enable ',
                // Off label
                'off_label'         => 'Diable',
                'desc'              => 'Slider Enable Or Diable ',
            ),
            //  array(
            //     'id'                => 'slider_shortcode',
            //     'name'              => 'Slider Shortcode ',
            //     'type'              => 'text',
            // ),
             array(
                'name'            => 'Select',
                'id'              => 'revolation_slider_alias',
                'type'            => 'select',
                // Array of 'value' => 'Label' pairs
                'options'         =>  rev_slider_list(),
                // Allow to select multiple value?
                'multiple'        => false,
                // Placeholder text
                'placeholder'     => 'Select an Item',
                // Display "Select All / None" button?
                'select_all_none' => true,
            ),

        )
    );

    return $meta_boxes;

}




