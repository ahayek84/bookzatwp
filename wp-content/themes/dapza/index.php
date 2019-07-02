<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dapza
 */

get_header();
?>

	<div id="primary" class="content-area-full">
		
		<main id="main" class="site-main">

			<div class="homeRecentPosts">
				
				<?php
				
				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
				
				?>
				
				<div class="recentPost">
					
					<div class="recentPostImage">
						
						<?php 
								
							if( has_post_thumbnail() ){
								the_post_thumbnail( 'dapza-home-recent-posts' ); 
							}else{
								echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/home-recent.png" />';
							}
							
						?>						
						
					</div><!-- .recentPostImage -->
					
					<div class="recentPostDesc">
						
						<?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
						<div>
							<?php esc_html(the_excerpt()); ?>
						</div>
					</div><!-- .recentPostDesc -->					
					
				</div><!-- .recentPost -->
				<?php
				
				endwhile; ?>
				
				<div class="recentPostNav">
					<p><?php the_posts_navigation(); ?></p>
				</div>			
				
				<?php
				endif;
				?>
				
			</div><!-- .homeRecentPosts -->		

		</main><!-- #main -->
		
	</div><!-- #primary -->

<?php
get_footer();
