<?php
function feature_box_shortcode($attr, $content = null){
	$title_shortcode = extract(shortcode_atts(array(
		'title' => "",
		'icon'=> "",
		'custom_class'=> "",
		'button_link' => '',
		'layout' => '',
	),$attr));
	$result = '';
	ob_start();
	
	$master_class = apply_filters( 'kc-el-class', $attr );
	if (!function_exists('kc_add_map')) { 
		$master_class = array();
	}
	$master_class[] = 'featured-box ';
	$master_class[] = $custom_class;
	if (!empty($layout) || ($layout == 1)) {

		?>
		<div class="<?php echo esc_attr( implode( ' ', $master_class ) ); ?>"> 
	        <div class="icon-wrap">
	            <div class="type-image " >
	                <!-- <img src="asset/img/icon/icon1.png" alt="#"> -->
	                <i class="<?php echo $icon ; ?>"></i>
	            </div>
	        </div>
	        <div class="entry-box-wrap">
	            <h4 class="featured-box-title"> <?php echo $title; ?>  	</h4>
	            <div class="featured-box-text"> <?php echo $content; ?> </div>
	            <a href="<?php echo $button_link; ?>" class="featured-button btn-type-rounded" target="_blank">→</a>
	        </div>
	    </div>
		<?php 	
	}

	$result .= ob_get_clean();
	return $result;
}
add_shortcode('al_feature_box','feature_box_shortcode');
add_action('init', 'feature_box_shortcode');
add_action('init', 'alonefoundation_al_feature_box_kc');
function alonefoundation_al_feature_box_kc() {
 
	if (function_exists('kc_add_map')) 
	{ 
	    kc_add_map(
	        array(
 
	            'al_feature_box' => array(
	                'name' => 'Featured Box',
	                'description' => __('Display Section title', 'alonefoundation'),
	                'icon' => 'sl-paper-plane',
	                'category' => 'Alone Foundation',
	                'is_container' => true, 
	                'params' => array(
	                	'general' 	=> array(
							array(
								'name' => 'layout',
								'label' => 'Select Style',
								'type' => 'radio_image',  // USAGE TEXT TYPE
								'options' => array(
									'1'	=> get_template_directory_uri().'/asset/img/icon/layout-1.png',
								),
								'value' => '1', // remove this if you do not need a default content
								'description' => 'SElect Image And Change Layout',
							),
	                		array(
								'name' => 'icon',
								'label' => 'Featured Icon',
								'type' => 'icon_picker',  // USAGE ICON_PICKER TYPE
								'description' => 'Featured Box Icon',
							),
							array(
								'name' => 'title',
								'label' => 'Primary Title',
								'type' => 'text',
								'description' => 'Primary Title Here',
								'admin_label'	=> true,
							),
							
		                    array(
								'name' => 'content',
								'label' => 'Featured Content',
								'type'  => 'textarea_html',
								'value' => '',
								'description' => 'Featured Content',
							),
							array(
								'name' => 'custom_class',
								'label' => 'Custom Class',
								'type' => 'text',
								'description' => 'Custom Class',
							),

							array(
								'name' => 'button_link',
								'label' => 'Field Label',
								'type' => 'link',
								'value' => 'link', // remove this if you do not need a default content
								'description' => 'Button LInk here ',
							)
							
        				),
	                	'Style' => array(
	    					array(
		                		'name' 		=> 'alone_css',
		                		'type'   	=> 'css',
		                		'options' 	=> array(
		                			array(
										"screens" 		=> "any,1199,991,767,479",
										'Icon' => array(
											array('property' => 'color', 'label' => 'Icon Color', 'selector' => 'i'),
											array('property' => 'background-color', 'label' => 'Icon BG Color', 'selector' => '.type-image'),
											array('property' => 'font-size', 'label' => 'Icon Size', 'selector' => 'i'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => 'i'),
		                                    array('property' => 'text-align', 'label' => 'Icon Alignment','selector' => '.icon-wrap'),
											array('property' => 'display', 'label' => 'Display', 'selector' => '.icon-wrap'),
											array('property' => 'float', 'label' => 'Float', 'selector' => '.icon-wrap'),
											array('property' => 'position', 'label' => 'Position', 'selector' => '.icon-wrap'),
											array('property' => 'width', 'label' => 'Width', 'selector' => '.type-image'),
											array('property' => 'height', 'label' => 'Height', 'selector' => '.type-image'),
											array('property' => 'border', 'label' => 'Icon Border', 'selector' => '.type-image'),
											array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.type-image'),
											array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '.type-image'),
											array('property' => 'padding', 'label' => 'Icon Padding', 'selector' => '.type-image')
										),
										'Icon Hover' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+:hover i'),
											array('property' => 'background-color', 'label' => 'BG Color', 'selector' => '+:hover .type-image'),
											array('property' => 'border-color', 'label' => 'Border Color', 'selector' => '+:hover .type-image'),
											array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+:hover .type-image'),
										),// end Icon 
			                			'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '.featured-box-title'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.featured-box-title'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.featured-box-title'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.featured-box-title'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.featured-box-title'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.featured-box-title'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '.featured-box-title'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '.featured-box-title'),
										),
			                			'box'		=>array(
			                				array('property' => 'position', 'label' => 'Position'),
			                				array('property' => 'margin', 'label' => 'margin'),
			                				array('property' => 'padding', 'label' => 'padding'),
			                				array('property' => 'position', 'label' => 'Hover Position','selector' => ':hover'),
			                				array('property' => 'margin', 'label' => 'Hover margin','selector' => ':hover'),
			                				array('property' => 'padding', 'label' => 'Hover padding','selector' => ':hover'),
			                			),	// end box 
		                			)
		                		)// end of options 
							)
	                	) // style end 
	            	),  // End of params 
 
	        	)// End alonefoundation title
	    	)
	    ); // End add map
	
	} // End if
 
}


