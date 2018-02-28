<?php

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
    while ($i < 5) {
        echo '<span>' . $tags_data_array[$i][0] . $tags_data_array[$i][1] . '</span>';
        $i++;
    }*/
    function $say_hello() {
     return 'hello world';
    }

    echo $say_hello();
?>