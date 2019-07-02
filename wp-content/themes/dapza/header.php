<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dapza
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

<div class="fullSearchContainer">

	<span class="fullSearchContainerClose"></span>
	
	<div class="fullSearchFieldContainer">
	
		<h3><?php esc_html_e( 'Search', 'dapza' ); ?></h3>
		<div class="fullSearchFieldInnerContainer">
		
			<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
		
				<input type="text" name="s" id="search" value="<?php echo esc_attr( the_search_query() ); ?>" />
				<input type="submit" value="<?php esc_html_e( 'Submit', 'dapza' ); ?>">

			</form>	
		
		</div><!-- .fullSearchFieldInnerContainer -->
	
	</div><!-- .fullSearchFieldContainer -->

</div><!-- .fullSearchContainer -->

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'dapza' ); ?></a>
	
<div class="outerContainer">

	<header id="masthead" class="site-header">
		
		<div class="site-branding">
			
			<?php
			
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				if ( has_custom_logo() ) {
						echo '<a href="' . esc_url( home_url( '/' ) ) . '"><img src="'. esc_url( $logo[0] ) .'"></a>';
				} else {
						echo '<h1>'. esc_attr(get_bloginfo( 'name' )) .'</h1>';
						$dapza_description = get_bloginfo( 'description', 'display' );
						if ( $dapza_description || is_customize_preview() ){
							echo '<p class="site-description">' . esc_attr($dapza_description) . '</p>';
						}
				}			
			
			?>
			
			<span class="search-button"></span>
			<span class="menu-button"></span>

		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
		
			<div class="site-search">
				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
					<input type="text" name="s" value="<?php echo esc_attr( the_search_query() ); ?>" />
					<input type="submit" value="<?php esc_html_e( 'go', 'dapza' ); ?>">
				</form>	
			</div><!-- .site-search -->
			
			<div class="site-buttons">
			
				<span class="search-button"></span>		
			
			</div><!-- .site-buttons -->
			
			<div class="menu-container">
			
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'depth' => 1,
				) );
				?>
			
			</div><!-- .menu-container -->

		</nav><!-- #site-navigation -->
		
	</header><!-- #masthead -->
	
	<?php get_template_part("template-parts/slider"); ?>

	<div id="content" class="site-content">
