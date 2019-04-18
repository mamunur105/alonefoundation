<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AloneFoundation
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col '); ?>>
    <div class="row">
        <div class="col-md-6">
            <div class="project-single-img">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>  
        <div class="col-md-6">
            <div class="project-single-content-wrape">
                <?php the_title( '<h2 class="primary-heading text-left">', '</h2>' ); ?>
                <div class="extra-meta">
                    <div class="post-category">
                        <i class="fas fa-folder-open"></i>
                        <?php  echo get_the_term_list(get_the_ID(), 'tax_alone_project', '', ', ', '');?>
                    </div>
                    <div class="post-author">
                        <i class="fas fa-user"></i> <?php the_author_posts_link();?>
                    </div>
                    <div class="post-date">
                        <i class="far fa-clock"></i> <?php the_date();?>
                    </div>
                </div>
                <div class="entry-the-content">
                    <?php the_content();?>

                </div>
                <div class="social-share-entry">
                    <div class="share-post-wrap alone-project">
                        <a class="share-post-item color-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>&amp;src=sdkpreparse"  data-toggle="tooltip" data-placement="top" title="Facebook">
                            <div class="font-awosome-svg">
                                <img class="facebook-svg" src="<?php echo get_template_directory_uri();?>/asset/fontawesome/svgs/brands/facebook-f.svg" alt="">
                            </div>
                        </a>

                        <a class="share-post-item color-twitter" href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Tweet this!" target="_blank" data-toggle="tooltip" data-placement="top">
                            <!-- <i class="fab fa-twitter"></i> -->
                            <div class="font-awosome-svg">
                                <img src="<?php echo get_template_directory_uri();?>//asset/fontawesome/svgs/brands/twitter.svg" alt="">
                            </div>
                        </a>

                        <a class="share-post-item color-google-plus"  href="https://plus.google.com/share?url=<?php the_permalink(); ?>" data-toggle="tooltip" data-placement="top" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"  target="_blank"> 
                            <!-- <i class="fab fa-google-plus-g"></i> -->
                            <div class="font-awosome-svg">
                                <img src="<?php echo get_template_directory_uri();?>/asset/fontawesome/svgs/brands/google-plus-g.svg" alt="">
                            </div>
                        </a>

                        <a class="share-post-item color-linkedin"  href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" title="Share on LinkedIn"  target="_blank" data-toggle="tooltip" data-placement="top" >
                            <!-- <i class="fab fa-linkedin-in"></i> -->
                            <div class="font-awosome-svg">
                                <img src="<?php echo get_template_directory_uri();?>/asset/fontawesome/svgs/brands/linkedin-in.svg" alt="">
                            </div>
                        </a>
 
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="navigation-prev-next">
                    <ul class="d-flex justify-content-between">
                        <?php 
                            $prev = get_adjacent_post(false, '', true);
                            $next = get_adjacent_post(false, '', false);
                            //use an if to check if anything was returned and if it has, display a link
                            if($prev){
                                $prev_url = get_permalink($prev->ID);  
                            ?>
                                <li> <a href="<?php echo $prev_url; ?>"><i class="fas fa-arrow-left"></i>Prev</a> </li>
                            <?php } 
                            if($next){
                                $next_url = get_permalink($next->ID);
                             ?>
                                <li><a href="<?php echo $next_url; ?>">Next <i class="fas fa-arrow-right"></i> </a></li>
                            <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
