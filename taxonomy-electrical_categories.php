<?php

get_header(); ?>

<?php
$term = get_queried_object();
//echo get_term_link( $term );

if( get_field('show_banner_section',  $term) ) { 
      ?>
   
<!--banner section start here-->
<div class="inner-banner" style="background-image: url('<?php the_field('banner_background_image', $term); ?>');">
   <div class="container">
      <div class="row">
         <div class="col-7">
            <div class="banner-content"> 
               <h1><?php echo $term->name; ?></h1>
               <div class="btn-area">
                  <a href="tel:<?php the_field('global_phone_number', option); ?>" title="Call us" class="btn-primary orange-btn"><i class="fa fa-phone"></i> <?php the_field('global_phone_number', option); ?></a>
                  <a href="<?php the_field('global_book_now_url', option); ?>" title="Book now" class="btn-primary blue-btn"><i class="fa fa-envelope"></i> <?php the_field('global_book_now_text', option); ?></a>
               </div>
            </div>
         </div>
         <div class="col-5">
            <div class="book-now-form">
               <h2><?php the_field('global_book_now_text', option); ?></h2>
               <p><?php the_field('global_book_now_form_description', option); ?></p>
               <?php echo do_shortcode( '[contact-form-7 id="10" title="Book Now"]' ); ?>
            </div>
         </div>
      </div>
   </div>
</div>

<!--orage bar start here-->
<?php
get_template_part( 'flexible-section/icon-section' );
?>
<!--orange bar end here-->
<?php
} ?>
<!--banner section end here-->

	<div class="container">
		<section id="primary" class="site-content">
			<div id="content" role="main">
				
					<?php
                    // the query
                    $terms = get_the_terms( $post->ID, 'electrical_categories' );
                    if ( !empty( $terms ) ){
                        // get the first term
                        $term = array_shift( $terms );
                        $oterm = $term->slug;
                    }
                    $wpb_all_query = new WP_Query(
                        array('post_type'=>'electrical',
                            'tax_query' => array(
                            array(
                                'taxonomy' => 'electrical_categories',
                                'field' => 'slug',
                                'terms' => $oterm   
                            )),
                            'post_status'=>'publish', 
                            'posts_per_page'=>-1));
                    if ( $wpb_all_query->have_posts() ) : ?>

                    <!--product listing page start here-->
                        <div class="inner-page">
                            <div class="product-lisitng-page">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <?php
                                        /* Start the Loop */
                                        while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post();

                                            /* Include the post format-specific template for the content. If you want to
                                            * this in a child theme then include a file called called content-___.php
                                            * (where ___ is the post format) and that will be used instead.
                                            */
                                            // get_template_part( 'page-templates/page/content/content', get_post_format() ); ?>

                                            <div class="col-3">
                                                <div class="product-list-item">
                                                    <a href="<?php the_permalink(); ?>" title="Bosch 10P">
                                                    <span class="image-container" style="background-image: url( '<?php echo get_the_post_thumbnail_url(); ?> ' ) ; ">
                                                    </span>
                                                    <span class="product-title"><?php the_title(); ?></span>
                                                    </a>
                                                </div>
                                            </div>
                                            <!--product listing page end here-->
                                        <?php
                                        endwhile;

                                        //revolution_content_nav( 'nav-below' );
                                        ?>
                                        <?php wp_reset_postdata(); ?>
                                        <?php else : ?>
                                        <div>
                                            <h1><?php echo 'No Posts Found'; ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>

				
			</div><!-- #content -->
		</section><!-- #primary -->

		<?php // get_sidebar(); ?>

	</div><!-- .container -->

    <?php if( get_field('show_google_reviews_section',  $term) ) {
        get_template_part( 'flexible-section/google-reviews-section' );
    }
    
    ?>

<?php get_footer(); ?>