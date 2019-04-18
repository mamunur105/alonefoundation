<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AloneFoundation
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		    <section class="global-education pad ">
		        <div class="container">
		            <div class="row ">
		            	<div class="col-md-8">
                		<?php
                		if ( have_posts() ) :
	                		while ( have_posts() ) :
	                			the_post();

	                			get_template_part( 'template-parts/content', 'page');

	                			// the_post_navigation();

	                			// If comments are open or we have at least one comment, load up the comment template.
	                			// if ( comments_open() || get_comments_number() ) :
	                			// 	comments_template();
	                			// endif;

	                		endwhile; // End of the loop.

	                	else:
							get_template_part( 'template-parts/content', 'none' );
	                	endif;
                		?>
					</div>
				<div class="col-md-4">
                    <div class="sidebar-widget">
                    	<?php get_sidebar(); ?>
                    </div>
                </div>

			        </div>
			    </div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
