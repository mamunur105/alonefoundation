<?php

function news_article_shortcode($attr,$content = null){
	$a = extract(shortcode_atts(array(
		// 'title' => 'this is title',
		'posts_per_page'	=> -1,
		'layout'			=> 1,
		'cat_in'			=>''
		// 'show_pagination'=> 0,
	),$attr));
	ob_start();
	$master_class = apply_filters( 'kc-el-class', $attr );
	if (!function_exists('kc_add_map')) { 
		$master_class = array();
	}
	
	$cat_in = str_replace(',', ' ', $cat_in);
	$cat_in_s = explode( " ", $cat_in );

	?>
	<?php   if ( empty($layout) || ($layout == 1)) { 
    		$master_class[] = 'news-article pdb-30'; ?>
		    <!-- news article section  -->
		    <section class="<?php echo esc_attr( implode( ' ', $master_class ) ); ?>">    
		        <div class="container"> 
		            <div class="row ">   
		                <div id="#" class="col ">   
		                    <div id="container"  class="mesonary-container pd-lg-n15px">     
								<?php
									// $paged = (get_query_var('page')) ? get_query_var('page') : 1;
								    $loop = new WP_Query( array( 
								    	'post_type' => 'post', 
								    	'posts_per_page' =>$posts_per_page,
								    	// 'paged' => $paged 
								    	'orderby'   => 'date',
								    	'order' => 'DESC',
								    ) );
								    global $i;
								    $i = 0 ;
								    if ( $loop->have_posts() ) :
								        while ( $loop->have_posts() ) : $loop->the_post(); 
								        	$i = $i + 1;
								        	// $max
								        ?>
											<?php get_template_part( 'template-parts/content', 'mini_news' );?>
								        <?php 
								        endwhile;
								    endif;
								    wp_reset_postdata();
								?>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </section>
				    
    <?php } ?>


<?php
	return ob_get_clean();
}

add_shortcode('news_articles', 'news_article_shortcode');
add_action('init','news_article_shortcode');
add_action('init','news_article_shortcode_kc');
// add_action('init','get__catagory_list');


function get__catagory_list() {

	$terms = get_terms('tax_alone_event', array(
      'hide_empty' => false,
  	) );

	$post_cat = array();
		if (!empty($terms) && !is_wp_error($terms)) {		
			foreach ( $terms as $value ) {
				$post_cat[$value->term_id] = ucwords(strtolower( $value->name ) ) . ' (Posts Count: '. $value->count .')';
			}
		} else {
			$post_cat[0] = esc_html__( 'No Categories found', 'alonefoundation' );
		}

  	return $post_cat ;
	// echo "<pre>";
	// 	print_r($terms);
	// echo "</pre>";
	
} //End get_terms_list()..

add_action('init','get__catagory_list');
// print_r(get__terms_list());



function news_article_shortcode_kc() {
	$get_term_list = get__catagory_list();
	if (function_exists('kc_add_map')) 
	{ 
	    kc_add_map(
	        array(
	            'news_articles' => array(
	                'name' => 'News Post',
	                'description' => __('Display all News Post', 'alonefoundation'),
	                'icon' => 'sl-paper-plane',
	                'category' => 'Alone Foundation',
	                'params' => array(
	                	'general' 	=> array(
	                		array(
								'name' => 'layout',
								'label' => 'Select Style',
								'type' => 'radio_image',  // USAGE TEXT TYPE
								'options' => array(
									'1'	=> get_template_directory_uri().'/asset/img/icon/news-style-1.png',
								),
								'value' => '1', // remove this if you do not need a default content
								'description' => 'SElect Image And Change Layout',
							),
							array(
								'name' => 'posts_per_page',
								'label' => 'Post Per Page',
								'type' => 'number_slider',  // USAGE RADIO TYPE
								'options' => array(    // REQUIRED
									'min' => 0,
									'max' => 15,
									'unit' => ' ',
									'show_input' => true
								),
								'value' =>-1,
								'admin_label'	=> true,
							),

							array(
	 							'name' 			=> 'cat_in',
	 							'label' 		=> esc_html__( 'Exclude Categories', 'alonefoundation' ),
	 							'type' 			=> 'multiple',
	 							'options'		=> $get_term_list,
	 							'description'	=> esc_html__('Choose if You Want to Exclude Any Post Category, Control + Click to Select Multiple Categories to Exclude (No Categories are Excluded by Default)', 'codexin','alonefoundation'),
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