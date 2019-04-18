<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AloneFoundation
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-4 col-sm-6'); ?>>
	<!-- <div class="col-md-4 col-sm-6 "> -->
    <div class="portfolio-inner">
        <!-- Featured image -->
        <div class="portfolio-featured-image-wrap"> 
            <?php the_post_thumbnail('peoject'); ?>    
            <a data-fancybox="gallery" href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="zoom-image"><i class="fa fa-search" aria-hidden="true"></i></a>
        </div>
        <div class="portfolio-entry-wrap">
            <!-- title -->
            <?php the_title( '<h2 class="portfolio-title"><a href="'.esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
            <!-- excerpt -->
            <div class="portfolio-content">
                <p><?php  echo summary('200'); ?><a href="<?php echo esc_url( get_permalink() ) ?>">... Read more</a>

                </p>
            </div>
            <!-- View detail -->
            <a href="<?php echo esc_url( get_permalink() ) ?>" class="portfolio-view-detail d-flex">
                <div>
                    <span class="bt-icon-custom"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                </div>
                <span>View Details</span>
            </a>
        </div>
    </div>
	<!-- </div> -->
</article><!-- #post-<?php the_ID(); ?> -->
