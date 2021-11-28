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
                    <!--banner section starts here-->
                    <div class="inner-banner detail-page-banner" style="background-image: url('<?php the_field('global_banner_background_image', option); ?>');">
                        <div class="container">
                            <div class="banner-content">
                                <h1><?php 
                                $post = get_queried_object();
                                $postType = get_post_type_object(get_post_type($post));
                                the_title(); echo ' ' .$postType->labels->singular_name ; ?></h1>
                            </div>
                        </div>
                    </div>
                    <!--banner section end here-->
                    
                    <!--inner page content start here-->
                    <div class="inner-page">
                    <!--product detail sec start here-->
                    <div class="product-detail-sec">
                    <div class="container">
                        <div class="breadcrumbs-innerpage">
                            <div class="back-link">
                                <?php 
                                //display cat name and link them
                                $terms = get_the_terms( get_the_ID(), 'air_conditioning_installation' );
                            
                                if ( $terms && ! is_wp_error( $terms ) ) {
                                
                                    $taxonomy_links = array();
                                
                                    foreach ( $terms as $term ) {
                                        $taxonomy_name_array[] = $term->name; // cat name array
                                        $taxonomy_link[] = get_term_link( $term ); //cat url array
                                    }
                                                        
                                    
                                    $taxonomy_name = array_shift( $taxonomy_name_array );
                                    $cat_url = array_shift( $taxonomy_link );
                                
                                    ?>
                                <a href="<?php  printf( esc_html__( ' %s ', 'textdomain' ), esc_html( $cat_url ) ); ?>">
                                    « <?php  printf( esc_html__( ' %s ', 'textdomain' ), esc_html( $taxonomy_name ) ); ?></a>
                                    <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="product-image-container">
                                    <div class="inner-product-img" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="product-detail-content">
                                <h2><span class="cat-name"><?php printf( esc_html__( ' %s ', 'textdomain' ), esc_html( $taxonomy_name ) ); ?></span> <?php the_title(); ?> <span class="watt-capacity"><?php the_field('watt_capacity'); ?></span></h2>
                                <div class="enquiry-btn">
                                    <a href="<?php the_field('global_enquiry_button_url', option); ?>" title="Send Enquiry" class="btn-primary red-btn"><?php the_field('global_enquire_now_button_text', option); ?></a>
                                </div>
                                <div class="tabbing-section">
                                    <ul id="tabs">
                                        <li><a id="tab1">Product Info</a></li>
                                        <li><a id="tab2">Specifications</a></li>
                                        <li><a id="tab3">Installation Inclusions</a></li>
                                    </ul>
                                    <div class="content-area" id="tab1C">
                                        <div class="tab-content">
                                            <p><?php the_field('product_info_text'); ?></p>
                                        </div>
                                    </div>
                                    <div class="content-area" id="tab2C">
                                        <div class="tab-content">
                                            <p><?php the_field('specifications_text'); ?></p>
                                        </div>
                                    </div>
                                    <div class="content-area" id="tab3C">
                                        <div class="tab-content">
                                            <p><?php the_field('installation_inclusions_text'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!--product detail sec end here-->

                    <!-- related product page start here-->
                    <div class="related-product-sec">
                        <h2>RELATED PRODUCTS</h2>
                        <div class="container">
                            <div class="row justify-content-center">
                                <?php
                                    //get the taxonomy terms of custom post type
                                    $customTaxonomyTerms = wp_get_object_terms( $post->ID, 'air_conditioning_installation', array('fields' => 'ids') );
                                    //query arguments
                                    $args = array(
                                        'post_type' => 'air_con',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 4,
                                        'orderby' => 'rand',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'air_conditioning_installation',
                                                'field' => 'id',
                                                'terms' => $customTaxonomyTerms
                                            )
                                        ),
                                        'post__not_in' => array ($post->ID),
                                    );
                                    //the query
                                    $relatedPosts = new WP_Query( $args );
                                    //loop through query
                                    if($relatedPosts->have_posts()){
                                    
                                        while($relatedPosts->have_posts()){ 
                                            $relatedPosts->the_post();
                                    ?>
                                            <div class="col-3">
                                                <div class="product-list-item">
                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                    <span class="image-container" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
                                                    </span>
                                                    </a>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                        
                                    }else{
                                        //no posts found
                                    }
                                    //restore original post data
                                    wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- related product page end here-->
                    
                <?php endwhile; // end of the loop. ?>
			<?php endif;?>
		
	<!---  .page-content-section END -->
</div><!-- #main .wrapper -->
<?php get_footer(); ?>
