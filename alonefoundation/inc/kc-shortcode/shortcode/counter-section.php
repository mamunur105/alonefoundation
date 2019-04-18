<?php 
function counter_up_shortcode($attr, $content = null){
	$title_shortcode = extract(shortcode_atts(array(
		'count_number' => "",
		'counter_title'=> "",
		'icon_image'=> "",
	),$attr));
	$result = '';
	ob_start();
	
	$master_class = apply_filters( 'kc-el-class', $attr );
	if (!function_exists('kc_add_map')) { 
		$master_class = array();
	}
	$master_class[] = 'counter-wrape d-flex';
	?>
	<div class="<?php echo esc_attr( implode( ' ', $master_class ) ); ?>"> 
	    <div class="counter-icon">
	        <img src="<?php  echo wp_get_attachment_image_src($icon_image, 'full')[0]?>" alt="">
	    </div>
	    <div class="text-content">
	        <h3><span class="counterUp" ><?php echo $count_number; ?></span></h3>
	        <h5><?php echo $counter_title;?></h5>
	    </div>
	</div>
	<?php 

	$result .= ob_get_clean();
	return $result;
}
add_shortcode('counter_up','counter_up_shortcode');
add_action('init', 'counter_up_shortcode');
add_action('init', 'alonefoundation_counter_up_kc');
function alonefoundation_counter_up_kc() {
 
	if (function_exists('kc_add_map')) 
	{ 
	    kc_add_map(
	        array(
 
	            'counter_up' => array(
	                'name' => 'Counter Up',
	                'description' => __('Display Counter Up', 'alonefoundation'),
	                'icon' => 'sl-paper-plane',
	                'category' => 'Alone Foundation',
	                'params' => array(
	                	'general' 	=> array(
	                		array(
								'name' => 'icon_image',
								'label' => 'Upload Icon',
								'type' => 'attach_image',
								'description' => 'Upload icon ',
								// 'admin_label'	=> true,
							),
							array(
								'name' => 'counter_title',
								'label' => 'Counter Title',
								'type' => 'text',
								'description' => 'Counter Title',
								'admin_label'	=> true,
							),
		                    array(
								'name' => 'count_number',
								'label' => 'Counter Number',
								'type' => 'text',
								'description' => 'Counter Up Number',
							),
        				),
	                	'Style' => array(
	    					array(
		                		'name' 		=> 'alone_css',
		                		'type'   	=> 'css',
		                		'options' 	=> array(
		                			array(
										"screens" 		=> "any,1199,991,767,479",
			                			'Title'			=>array(
											array('property' => 'color', 'label' => esc_html__( 'Color', 'alonefoundation'),'selector' => '.counter-wrape h5'),
											array('property' => 'text-align', 'label' => esc_html__( 'text align', 'alonefoundation'),'selector' => '.counter-wrape h5'),
											array('property' => 'font-width', 'label' => esc_html__( 'Font Width', 'alonefoundation'),'selector' => '.counter-wrape h5'),
											array('property' => 'font-size', 'label' => 'Font Size','selector' => '.counter-wrape h5'),
											array('property' => 'font-style', 'label' => 'Font Style','selector' => '.counter-wrape h5'),
											array('property' => 'font-family', 'label' => 'Font Family','selector' => '.counter-wrape h5'),
											array('property' => 'text-transform', 'label' => 'Text Transform','selector' => '.counter-wrape h5'),
											array('property' => 'line-height', 'label' => 'Line Height','selector' => '.counter-wrape h5'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing','selector' => '.counter-wrape h5'),
											array('property' => 'margin', 'label' => 'margin','selector' => '.counter-wrape h5'),
			                				array('property' => 'padding', 'label' => 'padding','selector' => '.counter-wrape h5'),
										),// end title 
			                			'Number'	=>array(
			                				array('property' => 'color', 'label' => esc_html__( 'Color', 'alonefoundation'), 'selector' => '.counter-wrape h3'
			                				),
			                				array('property' => 'text-align', 'label' => esc_html__( 'text align', 'alonefoundation'),'selector' => '.counter-wrape h3'),
											array('property' => 'font-width', 'label' => esc_html__( 'Font Width', 'alonefoundation'),'selector' => '.counter-wrape h3'),
											array('property' => 'padding', 'label' => 'Padding','selector' => '.counter-wrape h3'),
			                			),//  end  description  
			                			'Image'			=>array(
											array('property' => 'border', 'label' => 'border','selector' => '.item img'),
											array('property' => 'border-radius', 'label' => 'Border Radius','selector' => '.item img'),
											array('property' => 'margin', 'label' => 'margin','selector' => '.item img'),
			                				array('property' => 'padding', 'label' => 'padding','selector' =>'.item img'),
										),// end title 
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
