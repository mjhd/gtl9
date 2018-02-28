<nav id="nav">
    <?php
        the_custom_logo();
        get_search_form();
    ?>
    <section id="tag-drawer">
    <?php
    function tag_fetch(){
        $tags_array = get_tags(array( 'orderby' => 'count' ));
        $tags_data_array = array();

        foreach ($tags_array as $tag):
            array_push($tags_data_array, array($tag->slug, $tag->count));
        endforeach;

        $i = (sizeof($tags_data_array) - 1);
        while ($i > 0) {
            if($tags_data_array[$i][1] > $tags_data_array[($i -1)][1]) {
                $temp_array = $tags_data_array[$i];
                $tags_data_array[$i] = $tags_data_array[($i -1)];
                $tags_data_array[($i -1)] = $temp_array;
                $i = (sizeof($tags_data_array));
            }
            $i--;
        }

        $i = 0;
        echo '<h3>Common tags:</h3>';
        while ($i < 6) {
            echo '<span>' . $tags_data_array[$i][0] . $tags_data_array[$i][1] . '</span>';
            $i++;
        }
        //die();
    }

    tag_fetch();

    //add_action( 'wp_ajax_tag_fetch', 'tag_fetch' );
    //add_action( 'wp_ajax_nopriv_tag_fetch', 'tag_fetch' );

    ?>
    </section>
    <button id="tag-search">Search by tags</button></nav>