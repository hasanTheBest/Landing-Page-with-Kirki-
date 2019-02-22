<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package landed
 */

?>  

<!DOCTYPE HTML>

<html <?php language_attributes(); ?>> 
	<head>
		<meta charset="<?php bloginfo( 'charset' ) ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	</head>
	<body <?php body_class('is-preload landing '); ?>  >
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo" class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<nav id="nav">
						<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
					</nav>
				</header>


<div id="content" class="site-content">
