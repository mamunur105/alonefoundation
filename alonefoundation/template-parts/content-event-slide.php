<div class="col ">
    <div class="portfolio-inner ">
        <!-- Featured image -->
        <div class="portfolio-featured-image-wrap Events-image">
            <?php the_post_thumbnail('event-speatial'); ?>      
            <a href="<?php the_permalink();?>" class="icon-style"><i class="fas fa-angle-right"></i></a>
        </div>
        <div class="portfolio-entry-wrap Events-Slide">
            <!-- title -->
            
            <?php the_title('<h2 class="portfolio-title"><a href="'.get_the_permalink().'">','</a></h2>');?>
            <!-- excerpt -->
            <div class="event-start-time"><i class="fas fa-map-marker-alt"></i>
            <?php if ((rwmb_meta('location_details'))):  echo rwmb_meta( 'location_details');  endif; ?>
            <?php if ((rwmb_meta('start_time'))):  ?><i class="far fa-clock"></i> <?php rwmb_the_value('start_time', array( 'format' => 'F j, Y @H:i' ) );?> 
                <?php  endif;?></div>
        </div>
    </div>
</div>