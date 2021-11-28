<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Revolution
 * @since Revolution 1.0
 */
get_header(); ?>
<div id="main" class="wrapper">
     
	<!---  .page-content-section Start -->
		
			<?php	
				 /*======================================================
				 *       PAGE LAYOUT OR PAGE MAIN BODY SECTION 
				 *====================================================== */		
				
				  if(get_field('sidebar', 'options') == 'left'): ?>
				
					<div class="left-sidebar-layout">
						<div class="row">
							<div class="col-sm-3">
								<?php get_sidebar(); ?>
							</div><!-- .col-sm-3 -->	
							
							<div class="col-sm-9">
								<div class="site-content">	
									<?php while ( have_posts() ) : the_post(); ?>
                                    
										<?php get_template_part( 'page-templates/page/content/content', 'page' ); ?>
										<nav class="nav-single">
											<h3 class="assistive-text"><?php _e( 'Post navigation', 'text-domain' ); ?></h3>
											<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'text-domain') . '</span> %title' ); ?></span>
											<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'text-domain' ) . '</span>' ); ?></span>
										</nav><!-- .nav-single -->
										<?php comments_template( '', true ); ?>	
									<?php endwhile; // end of the loop. ?>
					
								</div><!-- .site-content -->
							</div><!-- .col-sm-9 -->
												
						</div><!-- .row -->
					</div>	
					
			<?php elseif(get_field('sidebar', 'options') == 'right'): ?>
				
					<div class="right-sidebar-layout">		
						<div class="row">
							<div class="col-sm-9">
								<div class="site-content">								
									<?php while ( have_posts() ) : the_post(); ?>
										<?php get_template_part( 'page-templates/page/content/content', 'page' ); ?>
										<nav class="nav-single">
											<h3 class="assistive-text"><?php _e( 'Post navigation', 'text-domain' ); ?></h3>
											<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'text-domain') . '</span> %title' ); ?></span>
											<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'text-domain' ) . '</span>' ); ?></span>
										</nav><!-- .nav-single -->
										<?php comments_template( '', true ); ?>			
									<?php endwhile; // end of the loop. ?>
								
								</div><!-- .site-content -->
							</div><!-- .col-sm-9 -->
							<div class="col-sm-3">
								<?php get_sidebar(); ?>
							</div><!-- .col-sm-3 -->						
						</div>	<!-- .row -->
					</div>	
			<?php else:?>
            <!-- main product dynamic contnet -->										
                <?php while ( have_posts() ) : the_post(); ?>
                 

                    <?php
                    if( have_rows('electrical_flexible_sections') ):
                        $count = 1;
                        while ( have_rows('electrical_flexible_sections') ) : the_row();

                            if( get_row_layout() == 'banner_section' ):
                                get_template_part( 'flexible-section/banner-section' );
                                get_template_part( 'flexible-section/icon-section' );
                            endif; 
                        
                            ?>
                            <?php if( get_row_layout() != 'banner_section' and $count == 1): ?>
                            <div class="inner-page">
                                <div class="container">
                            <?php $count++; endif; ?>        
                                    <?php

									
                                    if( get_row_layout() == 'full_width_section' ):
                                        get_template_part( 'flexible-section/electrical/full-width-section-elecrical' );
                                    endif;
                                    
                                    if( get_row_layout() == 'text_with_double_image' ):
                                        get_template_part( 'flexible-section/electrical/text-with-double-image' );
                                    endif;

                                    if( get_row_layout() == 'text_with_one_image' ):
                                        get_template_part( 'flexible-section/electrical/text-with-one-image' );
                                    endif;

                                    if( get_row_layout() == 'full_width_text_with_colored_title' ):
                                        get_template_part( 'flexible-section/electrical/fullwidth-text-with-colored-title' );
                                    endif;

                                    if( get_row_layout() == 'horizontal_divider' ):
                                        get_template_part( 'flexible-section/horizontal-divider' );
                                    endif;

                                    if( get_row_layout() == 'google_reviews_section' ):
                                        get_template_part( 'flexible-section/google-reviews-section' );
                                    endif; 
                                    if( get_row_layout() == 'text_with_verical_double_image' ):
                                        get_template_part( 'flexible-section/electrical/text-with-verical-double-image' );
                                    endif; 
                                    ?>
                    
                        <?php
                        endwhile;
                    
                    endif; ?>
                    
                    

                    </div>
                <?php endwhile; // end of the loop.
                ?> </div>
                </div>
			<?php endif;?>
		
	<!---  .page-content-section END -->
</div><!-- #main .wrapper -->
<?php get_footer(); ?>
