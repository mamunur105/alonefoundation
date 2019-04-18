<?php

function project_shortcode($attr,$content = null){
	$a = extract(shortcode_atts(array(
		// 'title' => 'this is title',
		'posts_per_page' => 9 ,
	),$attr));

	ob_start();
	// $master_class = array();
	$master_class = apply_filters( 'kc-el-class', $attr );
	if (!function_exists('kc_add_map')) { 
		$master_class = array();
	}
	$master_class[] = 'project-section mt-20 pdb-50';
	?>
    <section class="<?php echo esc_attr( implode( ' ', $master_class ) ); ?>">
        <div class="container">
            <div class="row">
			<?php
				$paged = (get_query_var('page')) ? get_query_var('page') : 1;
			    $loop = new WP_Query( array( 
			    	'post_type' => 'alone-project', 
			    	'posts_per_page' =>$posts_per_page,
			    	'paged' => $paged 
			    ) );
			    if ( $loop->have_posts() ) :
			        while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<?php get_template_part( 'template-parts/content', 'project' );?>
			        <?php endwhile;
			         
			    endif;
			    wp_reset_postdata();
			?>
			<?php 
				$total_pages = $loop->max_num_pages;
				if ($total_pages > 1): 
			?>
				<div class="col-sm-12 d-flex justify-content-center pagination-style pdt-30 ">
						<?php 
							echo paginate_links(array(
						        // 'base' => get_pagenum_link(1) . '%_%',
						        'format' => '/page/%#%',
						        'current' => $paged,
						        'mid_size'  => 2,
						        'type'               => 'plain',
						        'total' => $total_pages,
						        'prev_text'    => __('« Previous'),
						        'next_text'    => __('Next »'),
						    ));
						?>
				</div>
			<?php endif;
			?>
            </div>
        </div>
    </section>

<?php
	return ob_get_clean();
}

add_shortcode('project', 'project_shortcode');
add_action('init','project_shortcode');
add_action('init','project_shortcode_kc');
function project_shortcode_kc() {
 
	if (function_exists('kc_add_map')) 
	{ 
	    kc_add_map(
	        array(
 
	            'project' => array(
	                'name' => 'Project ',
	                'description' => __('Display Project', 'alonefoundation'),
	                'icon' => 'sl-paper-plane',
	                'category' => 'Alone Foundation',
	                'params' => array(
	                	'general' 	=> array(
							array(
								'name' => 'posts_per_page',
								'label' => 'Post Per Page',
								'type' => 'number_slider',  // USAGE RADIO TYPE
								'options' => array(    // REQUIRED
									'min' => 0,
									'max' => 20,
									'unit' => ' ',
									'show_input' => true
								),
								'value' => '9',
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

