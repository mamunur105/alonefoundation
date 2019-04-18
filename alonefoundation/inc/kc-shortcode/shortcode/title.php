<?php 
function section_title_shortcode($attr, $content = null){
	$title_shortcode = extract(shortcode_atts(array(
		'secondary_heading' => "",
		'primary_heading'=> "",
	),$attr));
	$result = '';
	ob_start();
	$master_class = apply_filters( 'kc-el-class', $attr );
	if (!function_exists('kc_add_map')) { 
		$master_class = array();
	}
	$master_class[] = 'section-title mt-20';
	?>
	<div class="<?php echo esc_attr( implode( ' ', $master_class ) ); ?>"> 
		<!-- <div class="section-title "> -->
        <h4 class="secondary-heading"><?php echo $secondary_heading ?></h4>
        <h2 class="primary-heading"><?php echo $primary_heading ?></h2>
    </div>

	<?php 
	$result .= ob_get_clean();
	return $result;
}

add_shortcode('theme_title','section_title_shortcode');
add_action('init', 'section_title_shortcode');
add_action('init', 'alonefoundation_title_kc');
function alonefoundation_title_kc() {
	if (function_exists('kc_add_map')) { 
	    kc_add_map(
	        array(
	            'theme_title' => array(
	                'name' => 'Section Title',
	                'description' => __('Display Section title', 'alonefoundation'),
	                'icon' => 'sl-paper-plane',
	                'category' => 'Alone Foundation',
	                'params' => array(
	                	'general' 	=> array(
							array(
								'name' => 'primary_heading',
								'label' => 'Primary Title',
								'type' => 'text',
								'description' => 'Primary Title Here',
								'admin_label'	=> true,
							),
		                    array(
								'name' => 'secondary_heading',
								'label' => 'Secondary Title',
								'type' => 'text',
								'description' => 'Secondary Title Here',
							),
        				),
	                	'Style' => array(
	    					array(
		                		'name' 		=> 'alone_css',
		                		'type'   	=> 'css',
		                		'options' 	=> array(
		                			array(
										"screens" 		=> "any,1199,991,767,479",
			                			'title'			=>array(
											array('property' => 'color', 'label' => esc_html__( 'Color', 'alonefoundation'),'selector' => '.primary-heading'),
											array('property' => 'text-align', 'label' => esc_html__( 'text align', 'alonefoundation'),'selector' => '.primary-heading'),
											array('property' => 'font-width', 'label' => esc_html__( 'Font Width', 'alonefoundation'),'selector' => '.primary-heading'),
											array('property' => 'font-size', 'label' => 'Font Size','selector' => '.primary-heading'),
											array('property' => 'font-style', 'label' => 'Font Style','selector' => '.primary-heading'),
											array('property' => 'font-family', 'label' => 'Font Family','selector' => '.primary-heading'),
											array('property' => 'text-transform', 'label' => 'Text Transform','selector' => '.primary-heading'),
											array('property' => 'margin', 'label' => 'margin','selector' => '.primary-heading'),
			                				array('property' => 'padding', 'label' => 'padding','selector' => '.primary-heading'),
										),// end title 
			                			'Subtitle'	=>array(
			                				array('property' => 'color', 'label' => esc_html__( 'Color', 'alonefoundation'), 'selector' => '.secondary-heading'
			                				),
			                				array('property' => 'text-align', 'label' => esc_html__( 'text align', 'alonefoundation'),'selector' => '.secondary-heading'),
											array('property' => 'font-width', 'label' => esc_html__( 'Font Width', 'alonefoundation'),'selector' => '.secondary-heading'),
											array('property' => 'padding', 'label' => 'Padding','selector' => '.secondary-heading'),
			                			),//  end  description  
			                			'box'		=>array(
			                				array('property' => 'margin', 'label' => 'margin'),
			                				array('property' => 'padding', 'label' => 'padding'),
			                			),
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


