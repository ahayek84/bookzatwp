    <div class="site-slider dapza-owl-basic">

        <div id="dapza-owl-basic" class="owl-carousel owl-theme">
    
    		<?php 
			
				if(get_theme_mod('dapza_slider_num')){
					$dapza_slider_num = get_theme_mod('dapza_slider_num');
				}else{
					$dapza_slider_num = '5';
				}
			
				if(get_theme_mod('dapza_slider_cat')){
					$dapza_slider_cat = get_theme_mod('dapza_slider_cat');
				}else{
					$dapza_slider_cat = 0;
				}			
			
				$dapza_slider_args = array(
                    // Change these category SLUGS to suit your use.
                    'ignore_sticky_posts' => 1,
                    'post_type' => array('post'),
                    'posts_per_page'=> $dapza_slider_num,
					'cat' => $dapza_slider_cat
               );
        
			   $dapza_slider = new WP_Query($dapza_slider_args);
			
            if ( $dapza_slider->have_posts() ) : ?>            
			<?php /* Start the Loop */ ?>
			<?php while ( $dapza_slider->have_posts() ) : $dapza_slider->the_post(); ?>
            <div class="owl-carousel-slide">
                
                <?php if ( has_post_thumbnail()) : ?>	
                <?php the_post_thumbnail(); ?>
                <?php else : ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/2000.png">
                <?php endif; ?>
                
                <div class="owl-carousel-caption-container">
                    <h3>
						<a href="<?php the_permalink() ?>">
						<?php the_title(); ?>
                        </a>
                    </h3>
                    <div class="owl-carousel-caption">
						<p><?php echo esc_attr(dapza_limitedstring(get_the_excerpt())); ?></p>
						<p><a href="<?php the_permalink() ?>"><?php _e( 'Read More', 'dapza' ); ?></a></p>
					</div>
                </div>
                 	
            </div>
    		<?php endwhile; wp_reset_postdata(); endif; ?>
            
         </div>
    
    </div><!-- .site-slider --> 