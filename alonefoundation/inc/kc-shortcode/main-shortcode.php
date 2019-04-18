<?php 

/**
 * 
 */
class Fileinclude{
	protected  $shortcode_dir;
	function __construct(){
		$this->shortcode_dir =  get_template_directory().'/inc/kc-shortcode/shortcode';
		$this->file_include();
	}
	public function file_include(){

 		foreach (glob($this->shortcode_dir."/*.php") as $filename)  include $filename;
 		// foreach (glob($this->shortcode_dir."/*.php") as $filename)  echo  '<pre>'.$filename.'</pre>';
 			// echo $filename;
	}
} 
$file = new Fileinclude;


// require get_template_directory() . '/inc/kc-shortcode/shortcode/counter-section.php';
// require get_template_directory() . '/inc/kc-shortcode/shortcode/event.php';
// require get_template_directory() . '/inc/kc-shortcode/shortcode/events-slide.php';
// require get_template_directory() . '/inc/kc-shortcode/shortcode/news-articles.php';
// require get_template_directory() . '/inc/kc-shortcode/shortcode/project-slide.php';
// require get_template_directory() . '/inc/kc-shortcode/shortcode/video_shortcode.php';
// require get_template_directory() . '/inc/kc-shortcode/shortcode/youtube_video.php';
// require get_template_directory() . '/inc/kc-shortcode/shortcode/title.php';
// require get_template_directory() . '/inc/kc-shortcode/shortcode/feature-box.php';
// require get_template_directory() . '/inc/kc-shortcode/shortcode/image_carosel.php';
// require get_template_directory() . '/inc/kc-shortcode/shortcode/project.php';
// require get_template_directory() . '/inc/kc-shortcode/shortcode/social-profile.php';































?>