<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elementor
 */

?>
	<footer id="colophon" class="site-footer">
	    <div class="row">
			<div class="col">
				<div class="footer-left-menu">
					<h2><?php echo esc_html( bloginfo( 'name' ) )?></h2>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer_left',
					)
				);
				?>
				</div>
			</div>
			<div class="col-lg-1">
				<div class="footer-center">
					<span class="footer-button"><i class="fas fa-angle-up"></i></span>
				</div>
			</div>
			<div class="col">
				<div class="footer-right-menu">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer_right',
					)
				);?>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
