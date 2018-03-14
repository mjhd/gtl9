<?php get_header();
$fav_loop = new WP_Query( array( 'post_type' => 'gidget', 'posts_per_page' => -1 ) );
if ( $fav_loop->have_posts() ) :
    while ( $fav_loop->have_posts() ) : $fav_loop->the_post();
    $isFav = get_post_meta(get_the_id(), 'favorite', true);
    if($isFav) :

        $gidget_name = get_post_meta(get_the_id(), 'gidget_name', true);
        $gidget_final_score = get_post_meta(get_the_id(), 'gidget_final_score', true);
        $short_description = get_post_meta(get_the_id(), 'short_description', true);

        $gidget_image = get_post_meta(get_the_id(), 'gidget_image', true);
        $gidget_image = implode(' ', $gidget_image);
        $http_pos_a = strpos($gidget_image, 'http://');
        $http_pos_b = strpos($gidget_image, '.jpg');
        $http_pos_b = ($http_pos_b - $http_pos_a + 4);
        $gidget_image = substr($gidget_image, $http_pos_a, $http_pos_b);

        echo '<a href="';
        echo the_permalink();
        echo '"><div><img src="' . "$gidget_image" . '"></div><div><h2>' . "$gidget_name" . '</h2>' . "$short_description" . '</div></a>';

    endif;

    endwhile; endif; wp_reset_postdata(); ?>
		<!-- section -->

		<?php get_template_part('nav'); ?>

		<section>

			<h2><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h2>


            <?php



            $loop = $wp_query;

            $syncCount = 0;

            if ( $loop->have_posts() ) :
                while ( $loop->have_posts() ) : $loop->the_post();

            ?>


            <?php


                    $gidget_name = get_post_meta(get_the_id(), 'gidget_name', true);
                    $gidget_final_score = get_post_meta(get_the_id(), 'gidget_final_score', true);

                    $gidget_image = get_post_meta(get_the_id(), 'gidget_image', true);
                    $gidget_image = $gidget_image["guid"];

                    echo '<a href="';
                    the_permalink();
                    echo '"><h2>' . "$gidget_name" . '</h2><div><img src="' . "$gidget_image" . '"/></div>';

                    while($gidget_final_score > 0.5) {
                        echo '<aside class="star"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg></aside>';
                        $gidget_final_score--;
                    }

                    if($gidget_final_score > 0) {
                        echo '<aside class="star"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 5.173l2.335 4.817 5.305.732-3.861 3.71.942 5.27-4.721-2.524v-12.005zm0-4.586l-3.668 7.568-8.332 1.151 6.064 5.828-1.48 8.279 7.416-3.967 7.416 3.966-1.48-8.279 6.064-5.827-8.332-1.15-3.668-7.569z"/></svg></aside>';
                    }
                    echo '<aside class="star"> / 5</aside></a>';


            ?>


            <?php endwhile; endif; wp_reset_postdata(); ?>


		</section>
		<!-- /section -->


<?php /* get_sidebar(); */ ?>

<?php get_footer(); ?>
