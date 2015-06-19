<?php
class recent_post_widget_by_cc extends WP_Widget {

    function __construct() {
        parent::__construct(
            'recent_post_widget_by_cc', __('Recent Posts Widget by CC', 'cc_recent_posts'),
            array( 'description' => __( 'A plugin to show recent posts.', 'cc_recent_posts' ),));
    }

    // Widget Font-End
    public function widget($args, $instance) {
        require_once('widget-view.php');
    }
            
    // Widget Back-End 
    public function form($instance) {
        $title = $instance['title'];
        $custom_text = $instance['custom_text'];
        $author = $instance['author'];
        $show_post = $instance['show_post'];
        $post_type = $instance['post_type'];
        $category = $instance['category'];
        $tag = $instance['tag'];
        $excerpt = $instance['excerpt'];
        $thumbnail = $instance['thumbnail'];
?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('custom_text'); ?>"><?php _e('Custom Text (appeared before post list):'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('custom_text'); ?>" name="<?php echo $this->get_field_name('custom_text'); ?>" type="text" value="<?php echo esc_attr($custom_text); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('author'); ?>"><?php _e('Author:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('author'); ?>" name="<?php echo $this->get_field_name('author'); ?>" type="text" value="<?php echo esc_attr($author); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('show_post'); ?>"><?php _e('Show Post:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('show_post'); ?>" name="<?php echo $this->get_field_name('show_post'); ?>" type="text" value="<?php echo esc_attr($show_post); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('post_type'); ?>"><?php _e('Post Type:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('post_type'); ?>" name="<?php echo $this->get_field_name('post_type'); ?>" type="text" value="<?php echo esc_attr($post_type); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Category:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" type="text" value="<?php echo esc_attr($category); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('tag'); ?>"><?php _e('Tag:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('tag'); ?>" name="<?php echo $this->get_field_name('tag'); ?>" type="text" value="<?php echo esc_attr($tag); ?>" />
        </p>
        <p>
            <input class="widefat" id="<?php echo $this->get_field_id('excerpt'); ?>" name="<?php echo $this->get_field_name('excerpt'); ?>" type="checkbox" value="true" <?php if($excerpt == 'true') { echo 'checked="checked"'; } ?> />
            <label for="<?php echo $this->get_field_id('excerpt'); ?>"><?php _e('Show Excerpt?'); ?></label> 
        </p>
        <p>
            <input class="widefat" id="<?php echo $this->get_field_id('thumbnail'); ?>" name="<?php echo $this->get_field_name('thumbnail'); ?>" type="checkbox" value="true" <?php if($thumbnail == 'true') { echo 'checked="checked"'; } ?> />
            <label for="<?php echo $this->get_field_id('thumbnail'); ?>"><?php _e('Show Thumbnail?'); ?></label> 
        </p>
<?php 
    }
          
    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['custom_text'] = (!empty($new_instance['custom_text'])) ? strip_tags($new_instance['custom_text']) : '';
        $instance['author'] = (!empty($new_instance['author'])) ? strip_tags($new_instance['author']) : '';
        $instance['show_post'] = (!empty($new_instance['show_post'])) ? strip_tags($new_instance['show_post']) : '';
        $instance['post_type'] = (!empty($new_instance['post_type'])) ? strip_tags($new_instance['post_type']) : '';
        $instance['category'] = (!empty($new_instance['category'])) ? strip_tags($new_instance['category']) : '';
        $instance['tag'] = (!empty($new_instance['tag'])) ? strip_tags($new_instance['tag']) : '';
        $instance['excerpt'] = (!empty($new_instance['excerpt'])) ? strip_tags($new_instance['excerpt']) : '';
        $instance['thumbnail'] = (!empty($new_instance['thumbnail'])) ? strip_tags($new_instance['thumbnail']) : '';
        return $instance;
    }
} 

// Register and load the widget
function cc_load_widget() {
    register_widget( 'recent_post_widget_by_cc' );
}
add_action( 'widgets_init', 'cc_load_widget' );