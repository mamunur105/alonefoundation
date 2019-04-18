<?php

function events_mini_shortcode($attr,$content = null){
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
    		$master_class[] = 'event-page pad'; ?>

		    <section class="<?php echo esc_attr( implode( ' ', $master_class ) ); ?>">
		        <div class="max-62  container ">
					<?php
						// $paged = (get_query_var('page')) ? get_query_var('page') : 1;
					    $loop = new WP_Query( array( 
					    	'post_type' => 'alone-event', 
					    	'posts_per_page' =>$posts_per_page,
					    	// 'paged' => $paged 
					    	'orderby'   => 'date',
					    	'order' => 'DESC',
					    	'tax_query' => array(
						        array(
						            'taxonomy' => 'tax_alone_event',   // taxonomy name
						            'field' => 'term_id',           // term_id, slug or name
						            'terms' => $cat_in_s,
						            'operator' => 'NOT IN',                  // term id, term slug or term name
						        )
						    )
					    ) );
					    global $i;
					    $i = 0 ;
					    if ( $loop->have_posts() ) :
					        while ( $loop->have_posts() ) : $loop->the_post(); 
					        	$i = $i + 1;
					        	// $max
					        ?>
								<?php get_template_part( 'template-parts/content', 'event' );?>
					        <?php 
					        endwhile;
					    endif;
					    wp_reset_postdata();
					?>
		        </div>
		    </section>
		    
    <?php } ?>
    <?php  if ($layout == 2) { 
    	$master_class[] = ' project-section mt-20 pdb-50 ';  ?>
	    <!-- event section  -->
	    <section class="<?php echo esc_attr( implode( ' ', $master_class ) ); ?>">
	        <div class="container mx-780">
	            <?php
					// $paged = (get_query_var('page')) ? get_query_var('page') : 1;
				    $loop = new WP_Query( array( 
				    	'post_type' 		=> 'alone-event', 
				    	'posts_per_page' 	=>	$posts_per_page,
				    	// 'category__not_in' 		=> $cat_in_s,
				    	'orderby'   		=> 'date',
				    	'order' 			=> 'DESC',
				    	'tax_query' => array(
						        array(
						            'taxonomy' => 'tax_alone_event',   // taxonomy name
						            'field' => 'term_id',           // term_id, slug or name
						            'terms' => $cat_in_s,
						            'operator' => 'NOT IN',                  // term id, term slug or term name
						        )
						    )
				    ) );
				    global $i;
				    $i = 0 ;
				    if ( $loop->have_posts() ) :
				        while ( $loop->have_posts() ) : $loop->the_post(); 
				        	$i = $i + 1;
				        ?>
							<?php get_template_part( 'template-parts/content', 'event-mini' );?>
				        <?php 
				        endwhile;
				    endif;
				    wp_reset_postdata();
				?>

	        </div>
	    </section>

    <?php } ?>
    <?php   if ($layout == 3 ) {  
    	$master_class[] = ' project-section mt-20  ';?>

	    <section class="<?php echo esc_attr( implode( ' ', $master_class ) ); ?>">
	        <div class="container">
	            <div class="row event-carosel">
	            <?php
					// $paged = (get_query_var('page')) ? get_query_var('page') : 1;
				    $loop = new WP_Query( array( 
				    	'post_type' 		=> 'alone-event', 
				    	'posts_per_page' 	=>	$posts_per_page,
				    	// 'category__not_in' 		=> $cat_in_s,
				    	'orderby'   		=> 'date',
				    	'order' 			=> 'DESC',
				    	'tax_query' => array(
						        array(
						            'taxonomy' => 'tax_alone_event',   // taxonomy name
						            'field' => 'term_id',           // term_id, slug or name
						            'terms' => $cat_in_s,
						            'operator' => 'NOT IN',                  // term id, term slug or term name
						        )
						    )
				    ) );
				    global $i;
				    $i = 0 ;
				    if ( $loop->have_posts() ) :
				        while ( $loop->have_posts() ) : $loop->the_post(); 
				        	$i = $i + 1;
				        ?>
							<?php get_template_part( 'template-parts/content', 'event-slide' );?>
				        <?php 
				        endwhile;
				    endif;
				    wp_reset_postdata();
				?>
	        </div>
	                                                 
	            </div>
	    </section>

    <?php } ?>

<?php
	return ob_get_clean();
}

add_shortcode('events_mini', 'events_mini_shortcode');
add_action('init','events_mini_shortcode');
add_action('init','events_mini_shortcode_kc');
// add_action('init','get_even_tax_list');


function get__terms_list() {

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

add_action('init','get__terms_list');
// print_r(get__terms_list());



function events_mini_shortcode_kc() {
	$get_term_list = get__terms_list();
	if (function_exists('kc_add_map')) 
	{ 
	    kc_add_map(
	        array(
	            'events_mini' => array(
	                'name' => 'Event ',
	                'description' => __('Display all Event ', 'alonefoundation'),
	                'icon' => 'sl-paper-plane',
	                'category' => 'Alone Foundation',
	                'params' => array(
	                	'general' 	=> array(
	                		array(
								'name' => 'layout',
								'label' => 'Select Style',
								'type' => 'radio_image',  // USAGE TEXT TYPE
								'options' => array(
									'1'	=> get_template_directory_uri().'/asset/img/icon/event-style-1.png',
									'2'	=> get_template_directory_uri().'/asset/img/icon/event-style-2.png',
									'3'	=> get_template_directory_uri().'/asset/img/icon/event-style-3.png',
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

										'Category'			=>array(
											array('property' => 'color', 'label' => esc_html__( 'Color', 'alonefoundation'),'selector' => '.cat-meta.btn.btn-primary,.cat-meta a'),
											array('property' => 'background', 'label' => esc_html__( 'Background', 'alonefoundation'),'selector' => '.cat-meta.btn.btn-primary'),			                				
										),// end title 
										'Category Hover'			=>array(
											array('property' => 'color', 'label' => esc_html__( 'Color', 'alonefoundation'),'selector' => '.cat-meta a:hover'),
											// array('property' => 'background', 'label' => esc_html__( 'Background', 'alonefoundation'),'selector' => '.cat-meta.btn.btn-primary'),			                				
										),// end title
			                			


			                			
			                			'box'		=>array(
			                				array('property' => 'background', 'label' => 'Background'),
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
