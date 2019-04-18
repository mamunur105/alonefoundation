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
		<section class="project-section pad global-education">
            <div class="container">
                <div class="row ">
                    <?php 
                        if (have_posts()) :
                            while ( have_posts() ) :
                                the_post();

                                get_template_part( 'template-parts/content','event-details');

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
<!--     <script>
            // Initialize and add the map
            function initMap() {
              // The location of Uluru
              var uluru = {lat: -25.344, lng: 131.036};
              // The map, centered at Uluru
              var map = new google.maps.Map(
                  document.getElementById('map'), {zoom: 4, center: uluru});
              // The marker, positioned at Uluru
              var marker = new google.maps.Marker({position: uluru, map: map});
            }
    </script> -->
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
<!--     <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAGyrUN-Yt2z2QKDe27eGlaSKyuSdo-h0&callback=initMap">
    </script> -->
<?php

get_footer();
