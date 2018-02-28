<?php get_header(); ?>
<?php

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


          <?php get_template_part('nav'); ?>
        <section>

            <?php get_template_part('loop'); ?>
			<?php //get_template_part('pagination'); ?>

		</section>
		<!-- /section -->

        <!-- footer -->
        <footer class="footer" role="contentinfo">

          <div>AD
              <a href="#" style="float: left;">Why ADs?</a>
              <a href="#" style="float: left;">What is gtl9?</a>
          </div>
          <div id="footer_social">Social box</div>

        </footer>
        <!-- /footer -->

<?php get_footer(); ?>
