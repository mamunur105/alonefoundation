<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package AloneFoundation
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<!-- <header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'alonefoundation' ); ?></h1>
				</header>.page-header -->
 
				<div class="page-content" style="margin-top: 40px;">
					<div class="container">
						<div class="row">
							<div class="col-sm-8">
								<?php 
									if (!empty(theme_option('image-404')['url'])): ?>
						                <img class="width-100" src="<?php echo esc_url(theme_option('image-404')['url']); ?>" alt="404">
						             	<h4 class="text-center" style="overflow: hidden;margin: 40px 0;">
						             		<a  class="give-btn give-btn-modal"  href="<?php echo esc_url( home_url( '/' ) ); ?>" style="padding: 10px 35px;border-radius: 0;">
						             		<?php esc_html_e( 'Back To Home') ?>
						             		</a> 
						             	</h4>
						            <?php 
						            else:
						                echo '<img src="'.get_template_directory_uri().'/asset/image/404.png" alt="404">';
						                ?>
										<h4 class="text-center" style="overflow: hidden;margin: 40px 0;"><a  class="give-btn give-btn-modal" href="<?php echo esc_url( home_url( '/' ) ); ?>"  style="padding: 10px 35px;border-radius: 0;"> 
											<?php esc_html_e( 'Back To Home') ?></a> 
										</h4>
						                <?php
						            endif;
								?>
							</div>
							<div class="col-md-4">
			                    <div class="sidebar-widget">
			                    	<?php get_sidebar(); ?>
			                    </div>
			                </div>
						</div>
					</div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
