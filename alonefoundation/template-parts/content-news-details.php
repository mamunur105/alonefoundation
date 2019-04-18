<?php 
$post_thumbnail_url = get_the_post_thumbnail_url();


?>



<style>

.post-sing-image-background {
    <?php echo 'background: url('.$post_thumbnail_url.')';?>
}

</style>
<div class="post-single-entry-header"> 
    <!-- Start .single-entry-header -->
    <div class="post-sing-image-background d-flex align-items-center " >
        <div class="heading-entry-wrap text-center" >
            <!-- Cat & tag -->
            <div class="cat-meta">
                <div class="post-category">
                    <?php the_category(', ');?>
                </div>               
            </div>
            <!-- title -->
            <?php the_title( '<h2 class="post-title text-center text-white" title=" ">', '</h2>' ); ?>

            <div class="extra-meta d-flex justify-content-center flex-wrap ">
                <!-- post date -->
                <div class="post-date text-white" title="Date"> <?php echo get_the_date(); ?></div>
                <!-- post author -->
                <div class="post-author text-white" title="Author">
                    <span>By </span>
                     <!-- <a href=""><?php // the_author() ?></a> -->
                     <?php the_author_posts_link();?>
                </div>
                <!-- post comment -->
                <div class="post-total-comment" title="Comment"><?php post_comment() ?> </div>
                <!-- post view -->
                <?php if (shortcode_exists('post-views')) { ?>
                    <div class="post-total-view" title="View"><?php echo do_shortcode('[post-views]');?> </div>

                <?php }   ?>

            </div>
        </div>
    </div>               
    <div class="row">
        <div class="col-md-2">
            <div class="share-post-wrap d-flex flex-row flex-md-column justify-content-center">  
                <!-- <a class="share-post-item s-facebook" href="http://www.facebook.com/sharer.php?u=<?php // the_permalink();?>&amp;t=<?php// the_title(); ?>" title="Share on Facebook."  target="_blank">  -->
                <!-- <a  href="http://www.facebook.com/sharer.php?u=<?php// the_permalink();?>" title="Share on Facebook.">  -->
                <a class="share-post-item s-facebook"  target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                    <div class="font-awosome-svg">
                        <img class="facebook-svg" src="<?php echo get_template_directory_uri();?>/asset/fontawesome/svgs/brands/facebook-f.svg" alt="">
                    </div>
                </a> 
                <!-- <div class="fb-share-button" data-href="http://theme.bearsthemes.com" data-layout="button_count" data-size="small" data-mobile-iframe="false"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://dev.portfolio-mr.com%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                -->
                <a class="share-post-item s-twitter" href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Tweet this!" target="_blank">
                    <div class="font-awosome-svg">
                        <img src="<?php echo get_template_directory_uri();?>//asset/fontawesome/svgs/brands/twitter.svg" alt="">
                    </div>
                </a>
                <a class="share-post-item s-google-plus"  href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"  target="_blank"> 
                    <!-- <i class="fab fa-google-plus-g"></i> -->
                    <div class="font-awosome-svg">
                        <img src="<?php echo get_template_directory_uri();?>/asset/fontawesome/svgs/brands/google-plus-g.svg" alt="">
                    </div>
                </a> 
                <a class="share-post-item s-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" title="Share on LinkedIn"  target="_blank" >
                    <!-- <i class="fab fa-linkedin"></i> -->
                    <div class="font-awosome-svg">
                        <img src="<?php echo get_template_directory_uri();?>/asset/fontawesome/svgs/brands/linkedin-in.svg" alt="">
                    </div>
                </a>
            </div>               
        </div>
        <div class="col-md-10">
            <div class="post-single-content-text">
                <?php the_content(); ?>
                <div class="single-entry-tag">
                    <!-- TAGS:  -->
                    <?php the_tags( 'TAGS:', '', '' ); ?>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="single-blog-post-navigation d-flex justify-content-between">
            <?php
                $prev = get_adjacent_post(false, '', true);
                $next = get_adjacent_post(false, '', false);
                //use an if to check if anything was returned and if it has, display a link
                if($prev){
                    $url = get_permalink($prev->ID);  ?>
                    <a href="<?php echo $url ; ?>" rel="prev">
                        <div class="bt-itable">
                            <div class="bt-icell pv-left">
                                <div class="btn d-flex">
                                    <div class="font-awosome-svg prev-svg">
                                        <img src="<?php echo get_template_directory_uri();?>/asset/fontawesome/svgs/solid/angle-left.svg" alt="">
                                    </div>
                                    <span>Previous Story</span>
                                </div>
                                <div>
                                    <strong><?php echo $prev->post_title ?></strong>
                                </div>
                            </div>
                        </div>
                    </a>
            <?php  }
                if($next) {
                    $url = get_permalink($next->ID); 
            ?>
                    <a href="<?php echo $url; ?>" rel="next">
                        <div class="bt-itable">
                            <div class="bt-icell pv-right">
                                <div class="btn d-flex ">
                                    <span>Next Story</span>
                                    <!-- <i class="fa fa-angle-right"></i> -->
                                    <div class="font-awosome-svg next-svg">
                                        <img src="<?php echo get_template_directory_uri();?>/asset/fontawesome/svgs/solid/angle-right.svg" alt=""> 
                                    </div>
                                </div>
                                <div>
                                    <strong><?php echo $next->post_title ?></strong>
                                </div>
                            </div>
                        </div>
                    </a>
            <?php  }  ?>
            </div>
        </div>
    </div>
</div>
<div class="bt-wrap-related-article">
    <div class="row">
        <div class="col-md-12">
            <h3 class="bt-title-related"><strong>Related Articles</strong></h3>
        </div>
<?php

$catArgs = array(
    'category__in'  => wp_get_post_categories($post->ID),
    'showposts' => 4,//display number of posts
    // 'orderby'   =>'rand',//display random posts
    'orderby'   =>'DESC',//display random posts
    'post__not_in'  => array($post->ID)
 ); 

$cat_post_query = new WP_Query($catArgs); 

if( $cat_post_query->have_posts() ) { 
    while ($cat_post_query->have_posts()) : $cat_post_query->the_post(); ?> 
        <!-- <li> <a href="<?php the_permalink() ?>"> <?php the_title(); ?></a></li>  -->
        <div class="col-md-6">
            <div class="related-article-item">
                <a href="<?php the_permalink(); ?>" title="Children Cancer Network">
                    <img width="478" height="346" src="<?php echo get_the_post_thumbnail_url();?>" class="post-single-image" alt="">
                </a>                          
                <a href="<?php the_permalink(); ?>" class="post-title-link">
                    <?php the_title( '<h2 class="post-title">', '</h2>' ); ?>
                </a>                           
                <p><?php echo summary(); // text_limit();?>
                </p>                        
            </div>
        </div>


<?php endwhile; 

wp_reset_query(); } ?>

    </div>
</div>