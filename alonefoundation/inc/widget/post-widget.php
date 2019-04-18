<?php
class Post_widget extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct( 'post-list', 'mini blog post' ,array(
				'description'=> "mini blog show"
			));
	}

	function widget( $args, $instance ) {
		// Widget output
		echo $args["before_widget"];
		echo  $args["before_title"].$instance["title"]. $args["after_title"] ?>
			
			<div class="recent-post">
				<ul>
					<?php 
						$post_arg = array(
						    'post_type'			=> 'post',
								'posts_per_page'	=> $instance["number-post"],
								'order'				=> 'DESC',
						    );
						$loop = new WP_Query($post_arg);
					?>
					<?php 	
						if ( $loop->have_posts()):
							while ($loop->have_posts()) : $loop->the_post(); ?> 

								<li>
									
									<img src="<?php echo $thumbnail_image = (has_post_thumbnail()) ? the_post_thumbnail_url('blog-widget-image') : '//placehold.it/40X40' ?>" alt="">
									<h5><a href="<?php the_permalink() ?>"><?php the_title();?></a></h5>
									<span><?php the_time('F j, Y');?> /  <?php comments_number( '0 Comment', 'One Comment', '% Comments' ) ?></span>
								</li>


								
					<?php		endwhile; // end while
						endif ; // end if
						wp_reset_postdata();
					?>
				</ul>
			</div><!--end recent-post-->

		<?php  print_r( $args["after_widget"] ) ; 
		
	}

	// function update( $new_instance, $old_instance ) {
	// 	// Save widget options
	// }

	function form( $instance ) {
		// checking 
		$title = (!empty($instance['title'])) ? $instance['title'] : null ;
		$number_post = (!empty($instance['number-post'])) ? $instance['number-post'] : null ;

		// Output admin widget options form
		?>
		<div>
			<label for="<?php echo $this->get_field_id('title')?>">Title</label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title  ; ?>" class="widefat" id="<?php echo $this->get_field_id('title')?>" >
		</div>
		<div>
			<label for="<?php echo $this->get_field_id('number-post')?>">Number of post </label>
			<input type="number" name="<?php echo $this->get_field_name('number-post'); ?>" value="<?php echo $number_post ; ?>" class="widefat" id="<?php echo $this->get_field_id('number-post')?>" >
		</div>
		<?php
	}
}

function Post_widget_register_widgets() {
	register_widget( 'Post_widget' );
}

add_action( 'widgets_init', 'Post_widget_register_widgets' );






