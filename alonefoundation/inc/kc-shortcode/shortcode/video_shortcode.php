<?php
function responsive_youtube_video_shortcode($attr, $content = null){
	$result = '';
	ob_start();
	$master_class = array();
	$master_class = apply_filters( 'kc-el-class', $attr );
	if (!function_exists('kc_add_map')) { 
		$master_class = array();
	}
	$master_class[] = '';
	?>
		<div style="text-align: center;" class="<?php echo esc_attr( implode( ' ', $master_class ) ); ?>">
			<div class="embed-responsive embed-responsive-16by9">
	       		<?php
		       		if (!empty($content)):
		       			echo $content;
		       		endif;
	       		?>	
		    </div>
		</div>
	<?php 
	$result .= ob_get_clean();
	return $result;
}

add_shortcode('youtube_video_responsive','responsive_youtube_video_shortcode');
add_action('init', 'responsive_youtube_video_shortcode');

add_action('init', 'alonefoundation_resdponsive_video_kc');

function alonefoundation_resdponsive_video_kc() {

	if (function_exists('kc_add_map')) 
	{ 
	    kc_add_map(
	        array(
 
	            'youtube_video_responsive' => array(
	                'name' => 'Youtube Video',
	                'description' => __('Display Youtube Video', 'alonefoundation'),
	                'icon' => 'sl-paper-plane',
	                'category' => 'Alone Foundation',
	                'is_container' => true,
	                'params' => array(
	                	'general' 	=> array(
	
							array(
								'name' => 'content',
								'label' => 'Youtube Video Embed code Or link ',
								'type'  => 'textarea_html',
								'value' => '',
								'description' => 'embed code html Or link ',
								'admin_label'	=> true,
							),


        				),
	                	'Style' => array(
	    					array(
		                		'name' 		=> 'alone_css',
		                		'type'   	=> 'css',
		                		'options' 	=> array(
		                			array(
										"screens" 		=> "any,1199,991,767,479",
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