<?php

    // Variables for widget view
    $title = apply_filters('widget_title', $instance['title']);
    $custom_text = $instance['custom_text'];
    $author = $instance['author'];
    $show = $instance['show_post'];
    $post_type = $instance['post_type'];
    $category = $instance['category'];
    $tag = $instance['tag'];
    $excerpt = $instance['excerpt'];
    $thumbnail = $instance['thumbnail'];

    echo $args['before_widget'];

    if (! empty($title)) {
        echo $args['before_title'] . $title . $args['after_title'];
    } else {
        echo $args['before_title'] . 'Recent Posts by CC' . $args['after_title'];
    }

    echo '<h6 style="font-weight: normal; margin: 0;">' . $custom_text . '</h6>';

    require('main-query.php');

    echo $args['after_widget'];