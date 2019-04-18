<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AloneFoundation
 */

get_header();
?>

	<div id="primary" class="content-area archive-page-style">
		<main id="main" class="site-main">

		    <section class="project-section mt-20 pdb-50">
		        <div class="container">
		            <div class="row">
					<?php
					     global $i;
					    $i = 0 ;
					    if ( have_posts() ) :
					        while ( have_posts() ) : the_post(); 
					        	$i = $i + 1;
 					?>
								<?php get_template_part( 'template-parts/content', 'event' );?>
					        <?php endwhile;
					         
					    endif;
					    wp_reset_postdata();
					?>
					<?php 
						global $wp_query;
						$total_pages = $wp_query->max_num_pages;
						if ($total_pages > 1): 
					?>
						<div class="col-sm-12 d-flex justify-content-center pagination-style pdt-50">
							 <?php 
								the_posts_pagination(array(
									'format'             => '?paged=%#%',
									'mid_size'           => 2,
									'prev_next'          => true,
									'prev_text'          => __('« Previous'),
									'next_text'          => __('Next »'),
									'type'               => 'plain',
									'screen_reader_text' 	=> __( ' ' ),
								));
							?>
						</div>
					<?php endif; ?>
		            </div>
		        </div>
		    </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
