<?php 

function image_carosel_shortcode($attr, $content = null){
	$title_shortcode = extract(shortcode_atts(array(
		'attach_image' => "",
		// 'primary_heading'=> "",
	),$attr));
	$result = '';
	ob_start();
	
	$master_class = apply_filters( 'kc-el-class', $attr );
	if (!function_exists('kc_add_map')) { 
		$master_class = array();
	}
	$master_class[] = 'image-carosel-one ';
	$images_ids = explode(',', $attach_image);
	?>
		<div class="<?php echo esc_attr( implode( ' ', $master_class ) ); ?>"> 
			<?php   foreach ($images_ids as $id) { ?>	
				<div class="item">
			        <img src="<?php  echo wp_get_attachment_image_src($id, 'full')[0]?>" alt="">
			    </div>
			<?php } ?>
		</div>
	<?php 
	$result .= ob_get_clean();
	return $result;
}
add_shortcode('image_carosel','image_carosel_shortcode');
add_action('init', 'image_carosel_shortcode');
add_action('init', 'alonefoundation_image_carosel_kc');
function alonefoundation_image_carosel_kc() {

	if (function_exists('kc_add_map')) 
	{ 
	    kc_add_map(
	        array(
 
	            'image_carosel' => array(
	                'name' => 'Image Carosel',
	                'description' => __('Display Section title', 'alonefoundation'),
	                'icon' => 'sl-paper-plane',
	                'category' => 'Alone Foundation',
	                'params' => array(
	                	'general' 	=> array(
							array(
								'name' => 'attach_image',
								'label' => 'Upload Image',
								'type' => 'attach_images',
								'description' => 'Upload image For Carosel',
								'admin_label'	=> true,
							)
        				),
	                	'Style' => array(
	    					array(
		                		'name' 		=> 'alone_css',
		                		'type'   	=> 'css',
		                		'options' 	=> array(
		                			array(
										"screens" 		=> "any,1199,991,767,479",
			                			'image'			=>array(
											array('property' => 'border', 'label' => 'border','selector' => '.item img'),
											array('property' => 'border-radius', 'label' => 'Border Radius','selector' => '.item img'),
											array('property' => 'margin', 'label' => 'margin','selector' => '.item img'),
			                				array('property' => 'padding', 'label' => 'padding','selector' =>'.item img'),
										),// end title 
			                			'box'		=>array(
			                				array('property' => 'box-shadow', 'label' => 'Box Shadow'),
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
 
}// end function 


