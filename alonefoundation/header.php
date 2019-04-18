<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AloneFoundation
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- <link rel="profile" href="https://gmpg.org/xfn/11"> -->
	<?php wp_head(); ?>

    <style>
        .banner-one {
            <?php
                if (!empty(rwmb_meta('banner_image'))) {
                    echo 'background: url('.rwmb_meta('banner_image').');';
                }else{
                    echo 'background: url('.theme_option('global_page_banner')['url'].');';
                }
                if (!empty(rwmb_meta('banner_height'))) {
                    echo 'min-height:'.rwmb_meta('banner_height').';';
                }
            ?>
            /* <?php // echo $banner_min_height;?>;*/
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body <?php body_class(); ?>>

<div id="o-wrapper" class="o-wrapper">

    <header class="header  header-style-one">
        <div class="mobole-menu d-block d-md-none">   
            <div class="container"> 
                <div class="row align-items-center">   
                    <div class="col">
                        <?php the_logo(); ?>
                    </div>
                    <div class="col text-right">
                        <button id="c-button--slide-left" class="c-button "> <?php esc_html_e( 'MENU', 'alonefoundation' ); ?> </button>
                    </div>         
                </div>
            </div>
        </div>
        <div class="header-bottom d-none d-md-block main_h">
            <div class="container">
                <div class="header-style ">
                    <div class="row justify-content-center  align-items-center">
                        <div class="col-lg-3 col-md-2 col-sm-4">
                            <?php the_logo(); ?>
                        </div>
                        <div class="col-lg-9 col-md-10 col-sm-8">
                            <div class="d-flex justify-content-sm-end">    
                            <?php 
                            if (has_nav_menu('main-menu')) {
                                wp_nav_menu( array(
                                    'theme_location'    => 'main-menu',
                                    'container'         => 'nav',
                                    'container_class'   => ' no-class',
                                    'menu_class'        =>'main-menu d-flex justify-content-sm-end flex-wrap ',
                                    'menu_id'           => '',
                                 ));
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</header><!-- #masthead -->
    <!-- slider  -->
    <?php 
        // If field is on.
        if (rwmb_meta( 'enable_slider' ) ) { ?>
            <section class="slider-slider" >
                <!-- <img src="<?php // echo get_template_directory_uri();?>/asset/img/slider/Screenshot_5.png" alt=""> -->
                <?php 
                    if (!empty(rwmb_meta('revolation_slider_alias')) && (shortcode_exists("rev_slider"))) {

                            $alisename = rwmb_meta('revolation_slider_alias');
                            // echo     $alisename = str_replace(' ', '-', $alisename);
                            // $cat_in_s = explode( " ", $cat_in );
                            
                            if (substr_count($alisename, ' ') == 0)  {
                               echo do_shortcode('[rev_slider '.$alisename.']');
                            }else{
                                echo '<h3 style="color:red;">Check Your alise name .Give alise name Without Empty space like ( slider_alisename,slider-1,slider1 ) . Invalide alise name like as ( slider 1 ,slider alisename , alise name,)<h3> ';
                            }
                            // echo do_shortcode('[rev_slider alias="'.$alisename.'"]');
                    }else{ 
                        echo '<h1 style="color:red;">Check Your alise name .Give a alise name Without Empty space like ( slider 1 ,slider alisename ) . Your alise name may be (slider_alisename,slider-1,slider1 )<h1> ';
                    }

                ?>
            </section>    
        <?php  }else{ ?>
            <section class="banner-one d-flex align-items-center" >
                <div class="container"> 
                    <div class="row align-items-center mt-70">   
                        <div class="col">
                            <ul class="breadcrumb justify-content-center " >   
                                <?php codecanl_breadcrumbs();?>
                            </ul>      
                            <div class="heading text-center "> 
                                <h2> <?php single_post_title(); ?> </h2>    
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end banner  -->
       <?php }  ?>
    <!-- slider  -->
	<div id="content" class="site-content">
