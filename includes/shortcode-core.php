<?php
function recent_posts_by_cc( $inserted_attrs ) {
    require('main-query.php');
}
add_shortcode('recent', 'recent_posts_by_cc');