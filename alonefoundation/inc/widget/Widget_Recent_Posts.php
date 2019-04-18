<?php

/**
 * Extend Recent Posts Widget 
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */

Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {
	
	function widget($args, $instance) {
	
		extract( $args );
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);

		$show_date = (!empty($instance['show_date'])) ? $instance['show_date'] : false ;



				
		if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			$number = 10;
					
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if( $r->have_posts() ) :
			
			echo $before_widget;
			if( $title ) echo $before_title . $title . $after_title; ?>
			<ul class="news-widget">
				<?php while( $r->have_posts() ) : $r->the_post(); ?>				
				    <li class="d-flex ">
				        <div class="icon"><img src="<?php echo get_the_post_thumbnail_url();?>" alt=""></div>
				        <div class="c-content">
				            <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
				            <?php if($show_date){?> 
					            <p><?php the_time( 'DF d'); ?></p>
					        <?php } ?>
				        </div>
				    </li>
				<?php endwhile; ?>
			</ul>

			<?php
			echo $after_widget;
		
		wp_reset_postdata();
		
		endif;
	}
}
function my_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');