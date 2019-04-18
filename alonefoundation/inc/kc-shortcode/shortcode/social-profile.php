<?php 

function social_profile_shortcode($attr, $content = null){
	$title_shortcode = extract(shortcode_atts(array(
		'facebook' => "",
		'twitter'=> "",
		'gplus'=> "",
		'instagram'=> "",
		'pinterest'=> "",
		'linkedin'=> "",
		'skype'=> "",
		'behance'=> "",
		'youtube'=> "",		
	),$attr));
	$result = '';
	ob_start();
	
	$master_class = apply_filters( 'kc-el-class', $attr );
	if (!function_exists('kc_add_map')) { 
		$master_class = array();
	}
	$master_class[] = 'social-share-button-shortcode';
	?>
	<div class="<?php echo esc_attr( implode( ' ', $master_class ) ); ?>"> 
		<div class="share">
			<p>

				<?php if( !empty( $facebook ) ) : ?>
				<a class="facebook" href="<?php echo esc_url($facebook); ?>" target="_blank"><i class="flaticon-facebook"></i></a>
				<?php endif; ?>

				<?php if( !empty( $twitter ) ) : ?>
				<a class="twitter" href="<?php echo esc_url($twitter); ?>" target="_blank"><i class="flaticon-twitter-logo-silhouette"></i></a>
				<?php endif; ?>

				<?php if( !empty( $instagram )) : ?>
				<a class="instagram" href="<?php echo esc_url($instagram); ?>" target="_blank"><i class="flaticon-instagram"></i></a>
				<?php endif; ?>

				<?php if( !empty( $pinterest )) : ?>
				<a class="pinterest" href="<?php echo esc_url($pinterest); ?>" target="_blank"><i class="flaticon-pinterest-logo"></i></a>
				<?php endif; ?>

				<?php if( !empty( $gplus )) : ?>
				<a class="google" href="<?php echo esc_url($gplus); ?>" target="_blank"><i class="flaticon-google-plus"></i></a>
				<?php endif; ?>

				<?php if( !empty( $behance )) : ?>
				<a class="behance" href="<?php echo esc_url($behance); ?>" target="_blank"><i class="flaticon-behance-logo"></i></a>
				<?php endif; ?>

				<?php if( !empty( $youtube )) : ?>
				<a class="youtube" href="<?php echo esc_url($youtube); ?>" target="_blank"><i class="flaticon-youtube-logo"></i></a>
				<?php endif; ?>

				<?php if( !empty( $skype )) : ?>
				<a class="skype" href="<?php echo esc_url($skype); ?>" target="_blank"><i class="flaticon-skype-logo"></i></a>
				<?php endif; ?>

				<?php if( !empty( $linkedin )) : ?>
				<a class="linkedin" href="<?php echo esc_url($linkedin); ?>" target="_blank"><i class="flaticon-linkedin-logo"></i></a>
				<?php endif; ?>

			</p>
		</div>
    </div>

	<?php 

	$result .= ob_get_clean();
	return $result;
}
add_shortcode('social_profiles','social_profile_shortcode');
add_action('init', 'social_profile_shortcode');
add_action('init', 'alonefoundation_social_profile_kc');
function alonefoundation_social_profile_kc() {
 
	if (function_exists('kc_add_map')) 
	{ 
	    kc_add_map(
	        array(
 
	            'social_profiles' => array(
	                'name' => 'Social Profile',
	                'description' => __('Display Social Profile', 'alonefoundation'),
	                'icon' => 'sl-paper-plane',
	                'category' => 'Socials',

	    		// 	'assets' => array(
						
					// 	'styles' => array(
					// 		'title-stylesheet' =>  get_template_directory_uri().'/asset/css/default.css',
					// 		)
					// ), //End assets
	                'params' => array(
	                	'general' 	=> array(
							array(
								'name' => 'facebook',
								'label' => 'facebook link',
								'type' => 'text',
								'description' => 'facebook Profile Link',
								'admin_label'	=> true,
							),
							array(
								'name' => 'twitter',
								'label' => 'twitter link',
								'type' => 'text',
								'description' => 'twitter Profile Link',
								'admin_label'	=> true,
							),
							array(
								'name' => 'gplus',
								'label' => 'Google plus link',
								'type' => 'text',
								'description' => 'Google plus Profile Link',
								'admin_label'	=> false,
							),
							array(
								'name' => 'instagram',
								'label' => 'instagram link',
								'type' => 'text',
								'description' => 'instagram Profile Link',
								'admin_label'	=> false,
							),
							array(
								'name' => 'pinterest',
								'label' => 'pinterest link',
								'type' => 'text',
								'description' => 'pinterest Profile Link',
								'admin_label'	=> false,
							),
							array(
								'name' => 'linkedin',
								'label' => 'linkedin link',
								'type' => 'text',
								'description' => 'linkedin Profile Link',
								'admin_label'	=> false,
							),
							array(
								'name' => 'skype',
								'label' => 'skype link',
								'type' => 'text',
								'description' => 'skype Profile Link',
								'admin_label'	=> false,
							),
							array(
								'name' => 'behance',
								'label' => 'behance link',
								'type' => 'text',
								'description' => 'behance Profile Link',
								'admin_label'	=> false,
							),
							array(
								'name' => 'youtube',
								'label' => 'youtube link',
								'type' => 'text',
								'description' => 'youtube Profile Link',
								'admin_label'	=> false,
							)

        				),
	                	'Style' => array(
	    					array(
		                		'name' 		=> 'alone_css',
		                		'type'   	=> 'css',
		                		'options' 	=> array(
		                			array(
										"screens" 		=> "any,1199,991,767,479",
			                			'Icon'			=>array(
											array('property' => 'color', 'label' => esc_html__( 'Color', 'alonefoundation'),'selector' => '.share a'),
											array('property' => 'background', 'label' => esc_html__( 'Background', 'alonefoundation'),'selector' => '.share a'),
											array('property' => 'text-align', 'label' => esc_html__( 'text align', 'alonefoundation'),'selector' => '.share'),
											array('property' => 'font-size', 'label' => 'Font Size','selector' => '.share a'),
											array('property' => 'margin', 'label' => 'margin','selector' => '.share a'),
			                				array('property' => 'padding', 'label' => 'padding','selector' => '.share a'),
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



