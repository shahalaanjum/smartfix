<div class="inner-content-area product-list-sec">
        <div class="text-area">
            <h2><?php the_sub_field('archive_section_title'); ?></h2>

            <?php
            if( get_sub_field('show_call_number') ) { ?>
                <h3>Call to find out more: <a href="tel:<?php the_sub_field('phone_number'); ?>" title="Call us"><?php the_sub_field('phone_number'); ?></a></h3>
            <?php } ?>
            <?php
            if( get_sub_field('subtitle_text') ) { ?>
            <p><?php the_sub_field('subtitle_text'); ?></p>
            <?php } ?>
            <?php
            $taxonomyname = get_sub_field('archive_taxonomy_slug');
            $terms = get_terms( $taxonomyname, array(
                'hide_empty' => false,
                
            ) ); ?>
            <!-- the category archive section -->
            <div class="text-center product-clik">
            <?php
            foreach ( $terms as $term ) { 
                $term_url = get_term_link( $term ); ?>
                <a class="product-img" href="<?php echo $term_url;  ?>" title="<?php echo $term->name ; ?>">

                    <img src="<?php the_field('featured_image', $term->taxonomy . '_' . $term->term_id); ?>">
                </a>
                <?php
                // echo $term->name . '<br>'  ; 
                // echo $term->slug .'<br>';
                // echo get_term_link( $term ). '<br>';
                } 
            ?>
            
            </div>
            <!-- end category archive section-->

        </div>
</div>