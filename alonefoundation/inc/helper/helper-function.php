<?php 
define('THEME_URI', get_template_directory_uri());
define('THEME_PATH', get_template_directory());
define( 'THEME_OPTIONS', 'theme_option' );

if (!function_exists('theme_option')){
    /**
     * Function to get options in front-end
     * @param int $option The option we need from the DB
     * @param string $default If $option doesn't exist in DB return $default value
     * @return string
     */

    function theme_option( $option = false, $default = false ){
        if($option === false){
            return false;
        }
        $theme_options = wp_cache_get( THEME_OPTIONS );
        if( ! $theme_options ){
            $theme_options = get_option( THEME_OPTIONS );
            wp_cache_delete( THEME_OPTIONS );
            wp_cache_add( THEME_OPTIONS, $theme_options );
        }

        if(isset($theme_options[$option]) && $theme_options[$option] !== ''){
            return $theme_options[$option];
        }else{
            return $default;
        }
    }
}


function social_media($ul_class="social-media "){?>
    <ul class="<?php echo $ul_class ?>">
    	<?php if (theme_option('facebook-link')): ?>
        	<li><li><a target="_blank" data-toggle="tooltip" data-placement="top" href="<?php echo theme_option('facebook-link')?>" data-original-title="Facebook"><i class="fab fa-facebook-f"></i></a></li></li>
    	<?php endif ?>

    	<?php if (theme_option('twitter-link')): ?>
        	<li><li><a target="_blank" data-toggle="tooltip" data-placement="top" href="<?php echo theme_option('twitter-link')?>" data-original-title="Twitter"><i class="fab fa-twitter-square"></i></a></li></li>
    	<?php endif ?>

    	<?php if (theme_option('google-plus-link')): ?>
        	<li><li><a target="_blank" data-toggle="tooltip" data-placement="top" href="<?php echo theme_option('google-plus-link')?>" data-original-title="Google plus"><i class="fab fa-google-plus-square" ></i></a></li></li>
    	<?php endif ?>

    	<?php if (theme_option('pinterest-link')): ?>
        	<li><li><a target="_blank" data-toggle="tooltip" data-placement="top" href="<?php echo theme_option('pinterest-link')?>" data-original-title="Pinterest"><i class="fab fa-pinterest-p"></i></a></li></li>
    	<?php endif ?>

    	<?php if (theme_option('instagram-link')): ?>
    		<li><li><a target="_blank" data-toggle="tooltip" data-placement="top" href="<?php echo theme_option('instagram-link')?>" data-original-title="Instagram"> <i class="fab fa-instagram"></i></a></li></li>
    	<?php endif ?>
    	<?php if (theme_option('vimeo-link')): ?>
    		<li><li><a target="_blank" data-toggle="tooltip" data-placement="top" href="<?php echo theme_option('vimeo-link')?>" data-original-title="Vimeo"><i class="fab fa-vimeo-v"></i></a></li></li>
    	<?php endif ?>
    	<?php if (theme_option('linkedin-link')): ?>

    		<li><li><a target="_blank" data-toggle="tooltip" data-placement="top" href="<?php echo theme_option('linkedin-link')?>" data-original-title="Linkedin">  <i class="fab fa-linkedin-in"></i> </a></li></li>
    	<?php endif ?>

    	<?php if (theme_option('soundcloud-link')): ?>
    		<li><li><a target="_blank" data-toggle="tooltip" data-placement="top" href="<?php echo theme_option('soundcloud-link')?>" data-original-title="Soundcloud"> <i class="fab fa-soundcloud"></i></a></li></li>
    	<?php endif ?><?php if (theme_option('youtube-link')): ?>
    		<li><li><a target="_blank" data-toggle="tooltip" data-placement="top" href="<?php echo theme_option('instagram-link')?>" data-original-title="Youtube"> <i class="fab fa-youtube"></i></a></li></li>
    	<?php endif ?>
    </ul>
<?php }

function the_logo(){
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        if ( has_custom_logo() ) {
                echo '<a href="'.esc_url( home_url( '/' ) ).'"><img src="'. esc_url( $logo[0] ) .'"></a>';
        } else {
             if (!empty(theme_option('theme_logo')['url'])): ?>
                 <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(theme_option('theme_logo')['url']); ?>" alt="Upload logo "></a> 
            <?php 
            else:
                echo '<h4>'. get_bloginfo( 'name' ) .'</h4>';
            endif;
        }                         
}


function post_comment(){
    $comment_count = get_comments_number(); 
    if ($comment_count < 1) {
        echo "No comment";
    }elseif (($comment_count == 1)) {
        echo $comment_count ." comment";
    }else{
        echo $comment_count ." comments";
    }
}

function codecanl_breadcrumbs() {
    // Settings
    $breadcrums_id = 'breadcrumbs';
    $breadcrums_class = 'breadcrumbs';
    $home_title = 'Home';
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy = 'product_cat';
    // Get the query & post information
    global $post, $wp_query;
    // Do not display on the homepage
    if (!is_front_page()) {
        $post_type = get_post_type();
        // Home page

        echo '<li><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        if (is_home()) {
            echo '/<li><a class="bread-link bread-home" href="' .get_permalink( get_option( 'page_for_posts' ) ). '" title="Blog">';single_post_title();echo '</a></li>';
        }
        if (is_archive() && !is_tax() && !is_category() && !is_tag()) {
            echo '/<li><a>' . post_type_archive_title() . '</a></li>';
        } else if (is_archive() && is_tax() && !is_category() && !is_tag()) {
            // If post is a custom post type
            $post_type = get_post_type();
            // If it is a custom post type display name and link
            if ($post_type != 'post') {
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
                echo '/<li><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
            }
            $custom_tax_name = get_queried_object()->name;
            echo '/<li><a class="bread-current bread-archive">' . $custom_tax_name . '</a></li> ';
        } else if (is_single()) {
            // If it is a custom post type display name and link
            $post_type_object = get_post_type_object($post_type);
            $post_type_archive = get_post_type_archive_link($post_type);
            echo '/<li><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
   
        } else if (is_category()) {
            // Category page
            $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
                echo '/<li><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
            echo '/<li><a class="bread-current bread-cat">' . single_cat_title('', false) . '</a></li>';
        } else if (is_page()) {
            // Standard page
            if ($post->post_parent) {
                // If child page, get parents 
                $anc = get_post_ancestors($post->ID);
                // Get parents in the right order
                $anc = array_reverse($anc);
                // Parent page loop
                if (!isset($parents))
                    $parents = null;
                foreach ($anc as $ancestor) {
                    $parents .= '/<li><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li> ';
                }
                // Display parent pages
                echo $parents;
                // Current page
                echo '/<li><a title="' . get_the_title() . '"> ' . get_the_title() . '</a></li>';
            } else {
                // Just display current page if not parents
                echo '/<li><a class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</a></li>';
            }
        } else if (is_tag()) {
            // Tag page
            // Get tag information
            $term_id = get_query_var('tag_id');
            $taxonomy = 'post_tag';
            $args = 'include=' . $term_id;
            $terms = get_terms($taxonomy, $args);
            $get_term_id = $terms[0]->term_id;
            $get_term_slug = $terms[0]->slug;
            $get_term_name = $terms[0]->name;
            // Display the tag name
            echo '/<li><a class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</a></li>';
        } elseif (is_day()) {
            // Day archive
            // Year link
            echo '/<li><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            // Month link
            echo '/<li><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            // Day display
            echo '/<li><a class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</a></li>';
        } else if (is_month()) {
            // Month Archive
            // Year link
            echo '/<li><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            // Month display
            echo '/<li><a class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
        } else if (is_year()) {
            // Display year archive
            echo '/<li><a class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
        } else if (is_author()) {
            // Auhor archive
            // Get the author information
            global $author;
            $userdata = get_userdata($author);
            // Display author name
            echo '/<li><a class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</a></li>';
        } else if (get_query_var('paged')) {
            // Paginated archives
            echo '/<li><a class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">' . __('Page') . ' ' . get_query_var('paged') . '</a></li>';
        } else if (is_search()) {
            // Search results page
            echo '/<li><a class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</a></li>';
        } elseif (is_404()) {
            // 404 page
            echo '/<li><a>' . 'Error 404' . '</a></li>';
        }
    }elseif (is_home() && is_front_page()) {
        echo '<li><a class="bread-link bread-home" href="' . get_home_url() . '" title="Blog">Blog</a></li>';
        # code...
    }

}

function text_limit($num_words = 20){
    $text = get_the_excerpt();
    $words_ = explode(' ', $text);
    if(count($words_) > $num_words){
       $words = array_slice(str_word_count($text,1), 0, $num_words) ;
    }
    echo $shown_string = implode(" ",$words);
}

function summary($limit=80) {
    $str = get_the_excerpt();
    if (strlen ($str) > $limit) {
        $str = substr ($str, 0, $limit);
        return (substr ($str, 0, strrpos ($str,' ')).'...');
    }
    return trim($str);
}
