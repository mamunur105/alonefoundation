<?php
class Contact_info extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct( 'contact_info', 'Contact Info Box ' ,array(
				'description'=> "address for contact "
			));
	}

	function widget( $args, $instance ) {
		// checking 
		$title = (!empty($instance['title'])) ? $instance['title'] : false ;
		// $image = (!empty($instance['image'])) ? $instance['image'] : false ;
		// $description_font = (!empty($instance['description-font-class'])) ? $instance['description-font-class'] : false ;
		$description = (!empty($instance['description'])) ? $instance['description'] : false ;

		$email_font = (!empty($instance['email-font-class'])) ? $instance['email-font-class'] : false ;

		$email = (!empty($instance['email'])) ? $instance['email'] : false ;
		$number_font = (!empty($instance['number-font-class'])) ? $instance['number-font-class'] : false ;
		$number = (!empty($instance['number'])) ? $instance['number'] : false ;

		// Widget output
		echo $args["before_widget"];
		echo  $args["before_title"].$instance["title"]. $args["after_title"] ?>
			
			<div class="contact-details text-white">
			<?php // if($image):?>
				<!--  <img src="<?php // echo $image; ?>" alt=""> -->
			<?php // endif;?>

				<ul class="mrg-0">
					<?php if( $description ):?>
						<li class="d-flex  align-items-center">
							<!-- <div class="icon"><i class="<?php echo $description_font ; ?>"></i></div> -->
                            <div class="c-content">
                                <span><?php echo $description ; ?></span>
                            </div>
						</li>
					<?php endif;?>
					<?php if($email_font || $email ):?>
						<li class="d-flex  align-items-center">
							<div class="icon"><i class="<?php echo $email_font ; ?>"></i></div>
                            <div class="c-content">
                                <p><?php echo $email ; ?></p>
                            </div>
						</li>
					<?php endif;?>
					<?php if($number_font || $number):?>
						<li class="d-flex  align-items-center">
							<div class="icon"><i class="<?php echo $number_font ; ?>"></i></div>
                            <div class="c-content">
                                <p><?php echo $number ; ?></p>
                            </div>
						</li>
					<?php endif;?>

				</ul>
			</div>
		<?php echo $args["after_widget"] ;
	}

	// function update( $new_instance, $old_instance ) {
	// 	// Save widget options
	// }

	function form( $instance ) {
		
		// checking 

		
		$title = (!empty($instance['title'])) ? $instance['title'] : null ;
		// $image = (!empty($instance['image'])) ? $instance['image'] : null ;
		// $description_font = (!empty($instance['description-font-class'])) ? $instance['description-font-class'] : null ;
		$description = (!empty($instance['description'])) ? $instance['description'] : null ;

		$email_font = (!empty($instance['email-font-class'])) ? $instance['email-font-class'] : null ;

		$email = (!empty($instance['email'])) ? $instance['email'] : null ;
		$number_font = (!empty($instance['number-font-class'])) ? $instance['number-font-class'] : null ;
		$number = (!empty($instance['number'])) ? $instance['number'] : null ;

		// Output admin widget options form


		?>
		<div>
			<label for="<?php echo $this->get_field_id('title')?>">Title</label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title ; ?>" class="widefat" id="<?php echo $this->get_field_id('title')?>" >
		</div>

		<!-- <div class="image-show-area">
			<button class="button author_info_image" >Upload Image</button>
			
			<input type="hidden" name="<?php echo $this->get_field_name('image'); ?>" value="<?php echo $image ; ?>" class="widefat image_link"  >

			<div class="image-show"><img class="img-link" src="<?php echo $image  ; ?>" width="100%"></div>
		</div>
		 -->
		<div>
			<label for="<?php echo $this->get_field_id('description')?>">Address Bio</label>
			<textarea name="<?php echo $this->get_field_name("description")?>" id="<?php echo $this->get_field_id('description')?>" class="widefat"><?php echo $description ; ?></textarea>
		</div>
		<div>
			<label for="<?php echo $this->get_field_id('email-font-class')?>">Email icon Font </label>
			<input type="text" name="<?php echo $this->get_field_name("email-font-class")?>" id="<?php echo $this->get_field_id('email-font-class')?>" class="widefat"  value="<?php echo $email_font ; ?>">
			<label for="<?php echo $this->get_field_id('email')?>">Email and Domain </label>
			<textarea name="<?php echo $this->get_field_name("email")?>" id="<?php echo $this->get_field_id('email')?>" class="widefat"><?php echo $email ; ?></textarea>
		</div>
		<div>
			<label for="<?php echo $this->get_field_id('number-font-class')?>">Phone icon Font </label>
			<input type="text" name="<?php echo $this->get_field_name("number-font-class")?>" id="<?php echo $this->get_field_id('number-font-class')?>" class="widefat"  value="<?php echo $number_font; ?>">
			<label for="<?php echo $this->get_field_id('number')?>"> Contact Number </label>
			<input type="text" name="<?php echo $this->get_field_name("number")?>" id="<?php echo $this->get_field_id('number')?>" class="widefat" value="<?php echo $number ; ?>">
		</div>

		<?php
	}
}

function Contact_info_register_widgets() {
	register_widget( 'Contact_info' );
}

add_action( 'widgets_init', 'Contact_info_register_widgets' );






