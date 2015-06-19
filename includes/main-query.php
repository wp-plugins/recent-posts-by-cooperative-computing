<?php
    global $post;

    // default attributes for shortcode
    $shortcode_default_attrs = array(
         'author' => '',
         'show' => 5,
         'excerpt' => 'false',
         'thumbnail' => 'false',
         'post_type' => 'post',
         'category' => '',
         'tag' => ''
    );
    
    // overrides default attributes set above and separates into individual varaibles.
    if(!empty($inserted_attrs)) {
        extract(shortcode_atts( $shortcode_default_attrs, $inserted_attrs ));
    }

    if(!empty($author)) {
        
        // checks if there are multiple authors set.
        $author_has_comma = strpos($author, ',');
        if($author_has_comma === false) {

            // gets the author data for a single author.
            $author_data = get_user_by( 'login', $author );

            if(!empty( $author_data)) {
                $post_args = array(
                    'author' => $author_data->ID,
                    'posts_per_page' => $show,
                    'post_type' => $post_type,
                    'category_name' => $category,
                    'tag' => $tag,
                );
            }

        } else {
            
            // gets the author data for multiple authors.
            $authors = explode(',', $author);
            $author_data = '';
            foreach($authors as $author_login) {
                $author_user = get_user_by('login', $author_login);
                $author_data .= $author_user->ID . ',';
            }

            $post_args = array(
                'author' => $author_data,
                'posts_per_page' => $show,
                'post_type' => $post_type,
                'category_name' => $category,
                'tag' => $tag,
            );
        }
    } elseif (empty($author)) {

        $post_args = array(
            'author' => $author,
            'posts_per_page' => $show,
            'post_type' => $post_type,
            'category_name' => $category,
            'tag' => $tag,
        );
    }
        
    // gets posts form database
    $post_query = new WP_Query( $post_args );

    // displays posts 
    if($post_query) {
        $data = '';
        $data .= '<div class="recent_post_by_cc"><ul>';
        while ($post_query->have_posts()) : $post_query->the_post();
            $data .= '<li>';

            // display a linked featured image if post has
            if($thumbnail == 'true') { 
                $data .= '<div class="cc_left">';
                if(has_post_thumbnail()) { 
                    $data .= '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
                    $data .= get_the_post_thumbnail(get_the_id(), 'thumbnail');
                    $data .= '</a>';
                }
                $data .= '</div>';
            }
            
            // displays a link to the post, using the post title
            $data .= '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
            $data .= get_the_title();
            $data .= '</a>';
            
            // displays the post excerpt if "excerpt" has been set to true
            if($excerpt == 'true') {
                $data .= '<p>' . get_the_excerpt() . '</p>';
            }

            $data .= '<div style="clear: both;"></div></li>';
        endwhile;
        $data .= '</ul></div>';
    }

    wp_reset_postdata();

    echo $data;