<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elementor
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'elementor-shop' ); ?></a>
    <div class="container">
		<div class="row">
			<div class="col">
			<header id="masthead" class="site-header">
				<div class="top-header-area">
					<div class="row">
						<div class="col">
						<i class="fas fa-home"></i>	Welcome to 1992 Online Shop!Let's start to shopping NOW!!!
						</div>
						<div class="col col-auto">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'top_menu',
								)
							);
							?>
						</div>
					</div>
				</div>
				<div class="main-header-area">
					<div class="row">
						<div class="col-lg-2">
							<div class="Custom-logo">
								<?php
								$custom_logo_id = get_theme_mod( 'custom_logo' );
								if(!empty($custom_logo_id)): the_custom_logo();else:?>
								     <h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
								<?php endif; ?>
							</div><!-- .site-branding -->
						</div>
						<div class="col-lg-8">
							<div class="mainmenu">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
									)
								);
								?>
							</div>
						</div>
						<div class="col-lg-2 text-end">
							<div class="header-right-area">
								<span class="search-taggle"><i class="fas fa-search"></i></span>
								<a href=""><i class="fas fa-shopping-cart"></i></i></a>
							</div>
						</div>
					</div>
			   </div>
			</header><!-- #masthead -->
