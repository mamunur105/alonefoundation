<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AloneFoundation
 */

get_header();
?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<section class="project-section pad ">
            <div class="container">
                <div class="row ">
                    <?php 
                    if (have_posts()) :
                        while ( have_posts() ) :
                            the_post();

                            get_template_part( 'template-parts/content', 'project-details');

                            // the_post_navigation();

                            // If comments are open or we have at least one comment, load up the comment template.
                            // if ( comments_open() || get_comments_number() ) :
                            //  comments_template();
                            // endif;

                        endwhile; // End of the loop.
                    endif;
                    ?>
                </div>
            </div>
        </section>
   
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
