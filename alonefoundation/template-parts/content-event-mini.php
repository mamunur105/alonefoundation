<?php  global $i; ?>

<div class="row  align-items-center <?php echo ($i > 1) ? ' pdt-50 ':'';  ?> ">
	<div class="col-md-6">
        <div class="single event-wrape  text-center text-sm-left">
            <div class="cat-meta btn btn-primary">
                <?php 
                    $term_list = get_the_terms(get_the_ID(), 'tax_alone_event');
                    if (!empty($term_list) && !is_wp_error($term_list)) {
                        ob_start();
                        foreach ($term_list as $term) {
                            $link = get_term_link($term) ;
                            echo '<a href="'.esc_url($link).'">'.$term->name.'</a>,';
                        }
                        $output = ob_get_clean();
                        echo rtrim($output, ',');
                    }
                ?>
            </div> 
            <?php the_title('<h2 class="event-heading">','</h2>'); ?>
            <div class="event-start-time">
            	<span class="ion-ios-location"></span>
                <?php echo $loation = (!empty(rwmb_meta('location_details')) ? '<i class="fas fa-map-marker-alt"></i>'.rwmb_meta('location_details').'' : '');
		            ?>  
        		<span class="ion-ios-timer"></span> 
                <?php
                 if (!empty(rwmb_meta('start_time'))) {
                    echo '<i class="far fa-clock"></i>';
                     rwmb_the_value('start_time', array( 'format' => 'M j, Y H:i' ) );
                 } 
                 ?>
     		</div>
        </div>
    </div>

    <?php // the_post_thumbnail('event-speatial');?>
    <div class="col-md-6 <?php echo ($i%2 == 0) ? ' order-last order-md-first ':'';  ?> ">
        <div class="event-featured-image-wrap mx-auto" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'event-speatial')?>)">
            <a class="readmore-link" href="<?php  the_permalink(); ?>" title="View detail">Read more</a>
        </div>
    </div>

</div>
