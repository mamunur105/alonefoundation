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

	<div class="item post_recent pdb-50">
	    <div class="post-thumbnail">
	    	<?php

	    	if (get_the_post_thumbnail_url()==true) { ?>
	    	  	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1"><img  src="<?php echo get_the_post_thumbnail_url();?>" class="attachment-alone-image-medium size-alone-image-medium" alt=""></a>
	    	<?php  } ?>
	    </div>
	    <div class="post-caption">
	        <div class="bt-church-meta">
	            <?php 
					the_title( '<h2 class="post-title" title=" "> <a class="post-title-link" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	            ?>
	            <div class="d-flex justify-content-around">
	                <div class="post-comment">
	                    <i class="flaticon-chat-comment-oval-speech-bubble-with-text-lines" aria-hidden="true"></i><?php post_comment();?>
	                </div>
	                <div class="post-more">
	                    <a href="<?php the_permalink(); ?>" class="post-view-detail">Read More <span class="flaticon-right-arrow"></span>
	                    </a>
	                </div>
	            </div>
	        </div>
	        <div class="post-term-date">
	            <div class="date">
	            	<span><?php echo get_the_date( 'd' )?></span> <?php echo get_the_date( 'M' )?>
				</div>

	        </div>
	    </div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
