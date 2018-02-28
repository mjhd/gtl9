<?php

$feat_loop = new WP_Query( array( 'post_type' => 'gidget', 'posts_per_page' => -1 ) );
$feat_id_arr = array();

if ( $feat_loop->have_posts() ) :
    while ( $feat_loop->have_posts() ) : $feat_loop->the_post();

    $isFeat = get_post_meta(get_the_id(), 'featured', true);
    if($isFeat) :
        $feat_id = get_the_id();
        array_push($feat_id_arr,$feat_id);
    endif;

    endwhile; endif; wp_reset_postdata();


$loop = new WP_Query( array( 'post_type' => 'gidget', 'posts_per_page' => -1 ) );

$syncCount = 0;

if ( $loop->have_posts() ) :
    while ( $loop->have_posts() ) : $loop->the_post();

?>


<?php

if (!function_exists('homeScaffold')) {
    function homeScaffold($id_arr) {
    global $syncCount;
    global $feat_count;

    if (($syncCount % 6) != 0 || $syncCount == 0) {
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
    }

    else {
        if(!isset($feat_count))
            $feat_count = 0;

        echo '<div unselectable="on"><aside id = "feat_left_' . ($feat_count / 5) . '" class="feat_left"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M13.523,24 22.5,24 10.476,12 22.5,0 13.523,0 1.5,12z"/></svg></aside><h3 >Featured: ' . ($feat_count + 1) . ' - ' . ($feat_count + 5) . ': (Most Viewed, AD and more) </h3><div id = "swiper-container_' . ($feat_count / 5) . '" class="swiper-container"><div class="swiper-wrapper">';

        $local_count = 0;
        while($local_count++ < 5) {

            if(sizeof($id_arr) > $feat_count){
            $feat_title = get_post_field( 'gidget_name', $id_arr[$feat_count] );


            $feat_image = get_post_field( 'gidget_image', $id_arr[$feat_count] );
            $feat_image = $feat_image["guid"];

            echo '<a href="';
            echo the_permalink();
            echo '" class="swiper-slide">' . "<div><img src='$feat_image'/></div>" . "<h4>$feat_title</h4>" . '</a>';
            }
            $feat_count++;
        }
        echo '</div></div><aside id = "feat_right_' . (($feat_count - 5) / 5) . '" class="feat_right"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10.477 0h-8.977l12.024 12-12.024 12h8.977l12.023-12z"/></svg></aside></div>';

        $gidget_name = get_post_meta(get_the_id(), 'gidget_name', true);
        $gidget_final_score = get_post_meta(get_the_id(), 'gidget_final_score', true);

        $gidget_image = get_post_meta(get_the_id(), 'gidget_image', true);
        $gidget_image = $gidget_image["guid"];

        echo '<a href="';
        echo the_permalink();
        echo '"><h2>' . "$gidget_name" . '</h2><div><img src="' . "$gidget_image" . '"/></div>';


        while($gidget_final_score > 0.5) {
            echo '<aside class="star"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg></aside>';
            $gidget_final_score--;
        }
        if($gidget_final_score > 0) {
            echo '<aside class="star"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 5.173l2.335 4.817 5.305.732-3.861 3.71.942 5.27-4.721-2.524v-12.005zm0-4.586l-3.668 7.568-8.332 1.151 6.064 5.828-1.48 8.279 7.416-3.967 7.416 3.966-1.48-8.279 6.064-5.827-8.332-1.15-3.668-7.569z"/></svg></aside>';
        }
        echo '<aside class="star"> / 5</aside></a>';
        $syncCount = 0;
        }
        $syncCount++;
    }
}
homeScaffold($feat_id_arr);

?>


<?php endwhile; endif; wp_reset_postdata(); ?>

</section>
