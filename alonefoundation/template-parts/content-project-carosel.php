<div id="post-<?php the_ID(); ?>" <?php post_class('pd-lf-15px '); ?>> 
    <div class="project-wrape ">
        <div class="project-image">
            <a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url($post->ID,'peoject')); ?>" alt=""></a>
        </div>
        <div class="project-content">
            <div class="extra-meta">
                <i class="fas fa-calendar-alt"></i> <?php echo get_the_date() ; ?>
            </div>
                <?php the_title( '<h4 class="title"><a href="'.esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
            <div class="bar-all"></div>
            <div class="entry-bot">
                <p><?php  echo summary('200'); ?></p>
            </div>
        </div>
    </div>
</div>