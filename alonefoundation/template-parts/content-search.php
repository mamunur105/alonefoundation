<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AloneFoundation
 */

?>
<?php if ( 'post' === get_post_type() ) :  ?>
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
	                    <i class="fa fa-commenting-o" aria-hidden="true"></i><?php post_comment();?>
	                </div>
	                <div class="post-more">
	                    <a href="<?php the_permalink(); ?>" class="post-view-detail">Read More <span class="ion-ios-arrow-thin-right"></span>
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
<?php  else:?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			alonefoundation_posted_on();
			alonefoundation_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php alonefoundation_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php alonefoundation_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php endif; ?>