<!-- sidebar -->

    <section id="complementary">
    <h2>Pair this gidget with:</h2>

    <?php
    $gidget_complimentary = get_post_meta(get_the_id(), 'complementary_gidgets', false);

    if ( $gidget_complimentary ) :
    ?>

    <div unselectable="on">

        <aside id="complimentary_left">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M13.523,24 22.5,24 10.476,12 22.5,0 13.523,0 1.5,12z"/>
            </svg>
        </aside>

        <div id="swiper-container_complimentary" class="swiper-container">
            <div class="swiper-wrapper">

    <?php
    foreach ( $gidget_complimentary as $gidget ) :

        $gidget_link = $gidget["guid"];
        $gidget_name = get_post_meta($gidget["ID"], 'gidget_name', true);
        $gidget_image = get_post_meta($gidget["ID"], 'gidget_image', true);
        $gidget_image = $gidget_image["guid"];

        echo '<div class="swiper-slide"><a href="' . $gidget_link . '"><div><img src="' . $gidget_image . '"/></div><h4>' . $gidget_name . '</h4></a></div>';


    endforeach;
    ?>

    </div></div>
        <aside id="complimentary_right">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M10.477 0h-8.977l12.024 12-12.024 12h8.977l12.023-12z"/>
            </svg>
        </aside>
    </div>

    <?php endif; ?>

    </section>


    <section id="related">
        <h2>Related Gidgettes</h2>
        <div unselectable="on">


            <aside id="related_left">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M13.523,24 22.5,24 10.476,12 22.5,0 13.523,0 1.5,12z"/>
                </svg>
            </aside>

                <?php
                $current_id = get_the_ID();
                $post_tags = wp_get_post_tags($current_id);
                $post_tags_array = array();

                foreach ( $post_tags as $tag ) :
                    array_push($post_tags_array, $tag->name);
                    //echo $tag->name;
                endforeach;


            $related_loop = new WP_Query( array( 'post_type' => 'gidget', 'posts_per_page' => -1 ) );
            $related_count = array();

            if ( $related_loop->have_posts() ) :

                while ( $related_loop->have_posts()) : $related_loop->the_post();

                    // get tag list for current post
                    $current_tags = wp_get_post_tags(get_the_ID());
                    $tag_match = 0;
                    foreach ( $current_tags as $current_tag ) :
                        foreach ( $post_tags_array as $post_tag ) :
                            //echo $post_tag;
                            if ($current_tag->name == $post_tag)
                                $tag_match++;
                        endforeach;
                    endforeach;
                    if(get_the_ID() != $current_id) {
                        array_push($related_count,[get_the_ID(), $tag_match]);
                    }

                endwhile; endif; wp_reset_postdata();


            //var_dump($related_count);
            $i = (sizeof($related_count) - 1);
            while ($i > 0) {
                if($related_count[$i][1] > $related_count[($i -1)][1]) {
                    $temp_array = $related_count[$i];
                    $related_count[$i] = $related_count[($i -1)];
                    $related_count[($i -1)] = $temp_array;
                    $i = (sizeof($related_count));
                }
                $i--;
            }
            //var_dump($related_count);

            ?>
            <div id="swiper-container_related" class="swiper-container">
                <div class="swiper-wrapper">

                <?php
                    for($i = 0; $i < 5 && $related_count[$i][1] > 0; $i++){
                        $related_gidget_id = $related_count[$i][0];

                        $gidget_name = get_post_meta($related_gidget_id, 'gidget_name', true);
                        $gidget_final_score = get_post_meta($related_gidget_id, 'gidget_final_score', true);
                        $gidget_link = get_post($related_gidget_id)->guid;

                        $gidget_image = get_post_meta($related_gidget_id, 'gidget_image', true);
                        $gidget_image = $gidget_image['guid'];
                        echo '<div class="swiper-slide"><a href="' . $gidget_link . '"><div><img src="' . $gidget_image . '"/></div><h4>' . $gidget_name . '</h4></a></div>';
                    }
                ?>

            </div></div>

            <aside id="related_right">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M10.477 0h-8.977l12.024 12-12.024 12h8.977l12.023-12z"/>
                </svg>
            </aside>


        </div>
    </section>




    <section id="favorite">
    <h2>Top Gidget</h2>
        <?php

            $fav_loop = new WP_Query( array( 'post_type' => 'gidget', 'posts_per_page' => -1 ) );

            if ( $fav_loop->have_posts() ) :
                while ( $fav_loop->have_posts() ) : $fav_loop->the_post();
                $isFav = get_post_meta(get_the_id(), 'favorite', true);
                if($isFav) :

                    $gidget_name = get_post_meta(get_the_id(), 'gidget_name', true);
                    $gidget_final_score = get_post_meta(get_the_id(), 'gidget_final_score', true);

                    $gidget_image = get_post_meta(get_the_id(), 'gidget_image', true);
                    $gidget_image = $gidget_image["guid"];

                    echo '<a href="';
                    echo the_permalink();
                    echo '"><div><img src="' . $gidget_image . '"></div><div><h3>' . $gidget_name . '</h3></div></a>';

            endif;

            endwhile; endif; wp_reset_postdata();
        ?>
    </section>





    <section id="featured">
        <h2>Favorites</h2>
        <?php
            $feat_loop = new WP_Query( array( 'post_type' => 'gidget', 'posts_per_page' => -1 ) );
            $feat_count = 0;

            if ( $feat_loop->have_posts() ) :
            ?>
             <div unselectable="on">

                <aside id="feat_left">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M13.523,24 22.5,24 10.476,12 22.5,0 13.523,0 1.5,12z"/>
                    </svg>
                </aside>

                <div id="swiper-container_feat" class="swiper-container">
                    <div class="swiper-wrapper">

                <?php

                while ( $feat_loop->have_posts() && $feat_count < 5) : $feat_loop->the_post();

                $isFeat = get_post_meta(get_the_id(), 'featured', true);
                if($isFeat) :

                    $gidget_name = get_post_meta(get_the_id(), 'gidget_name', true);

                    $gidget_image = get_post_meta(get_the_id(), 'gidget_image', true);
                    $gidget_image = $gidget_image["guid"];

                    $feat_count++;

                    echo '<div class="swiper-slide"><a href="#"><div><img src="' . $gidget_image . '"/></div><h4>' . $gidget_name . '</h4></a></div>';
                    endif; /* if is feat */
                ?>

             <?php endwhile; ?>
                </div></div>
                    <aside id="feat_right">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M10.477 0h-8.977l12.024 12-12.024 12h8.977l12.023-12z"/>
                        </svg>
                    </aside>
                </div>
        <?php endif; wp_reset_postdata(); ?>
    </section>




    <section id="social-connect">
        <h4>Follow ★ Share ★ Like:</h4>
        <nav>
            <ul>
                <li style="width: 64%"><a href="http://www.facebook.com" target="_blank" class="active"><img src="app/themes/html5blank-stable/img/facebook.svg" /></a><span></span></li>
                <li>
                    <a href="http://www.tumblr.com" target="_blank"><img src="app/themes/html5blank-stable/img/tumblr.svg" /></a>
                    <span>
                        <a class="tumblr-share-button" data-color="white" data-notes="none" href="https://embed.tumblr.com/share"></a>
                        <iframe class="btn" frameborder="0" border="0" scrolling="no" allowtransparency="true" height="20" width="65" src="https://platform.tumblr.com/v2/follow_button.html?type=follow&amp;tumblelog=staff&amp;color=white"></iframe>
                    </span>
                </li>
                <li><a href="http://www.pinterest.com" target="_blank"><img src="app/themes/html5blank-stable/img/pinterest.svg" /></a><span></span></li>
            </ul>
        </nav>
        <h4>GTL9 on Facebook Messenger:</h4>
        <div class="fb-page" data-href="https://www.facebook.com/gtlNine/" data-tabs="messages" data-height="350px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/gtlNine/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/gtlNine/">GidgetTechlist9</a></blockquote></div>
    </section>


<!-- <section id="social-box"> ->-> inside social-cube.php
<!-- /sidebar -->
