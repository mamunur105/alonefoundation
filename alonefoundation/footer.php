<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AloneFoundation
 */

?>

	</div><!-- #content -->

    <!-- footer  -->
    <footer class="footer-area ">
        <div class="footer-top pad">    
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                </div>
            </div>
        </div>
        <div class="footer-bottom"> 
            <div class="container"> 
                <div class="row">   
                    <div class="col text-center text-white">   
                        <p>
                        <?php if (!empty(theme_option('copyright-text'))): echo theme_option('copyright-text');endif;?></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div><!-- id="o-wrapper" class="o-wrapper" -->


<nav id="c-menu--slide-left" class="c-menu c-menu--slide-left">
  <button class="c-menu__close">&larr; Close Menu</button>
<!--   <ul class="c-menu__items">
    <li><a href="#">Home</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Services</a></li>
    <li><a href="#">Work</a></li>
    <li><a href="#">Contact</a></li>
  </ul> -->

<?php 
 	wp_nav_menu( array(
        'theme_location' 	=> 'main-menu',
        'container' 		=> 'ul',
        'container_class' 	=> ' ',
        'menu_class'    	=>'c-menu__items',
        'menu_id'        	=> '',
     ));
?>
</nav><!-- /c-menu slide-left -->
<div id="c-mask" class="c-mask"></div><!-- /c-mask -->

<?php wp_footer(); ?>
</body>
</html>
