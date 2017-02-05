<?php
function yymnk_set_post_views($postID) {
    $count_key = 'yymnk_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function yymnk_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;
    }
    yymnk_set_post_views($post_id);
}
add_action( 'wp_head', 'yymnk_track_post_views');

add_action('yymnk_hourly_event', 'yymnk_hourly_action');

function yymnk_hourly_action() {
    $args = array(
                    'posts_per_page' => -1,
                    'post_type' => array(
                        'post'
                    )
                );
    $the_query = new WP_Query($args);
    $count_key = 'yymnk_post_views_count';
    delete_post_meta_by_key($count_key);
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
        $post_id   = $the_query->post->ID;
        $count = get_post_meta($post_id, $count_key, true);
           if(empty($count)){
               $count = 0;
               delete_post_meta($post_id, $count_key);
               add_post_meta($post_id, $count_key, '0');               
            }else{
                $count++;
                update_post_meta($post_id, $count_key, 0);
            }
        endwhile;
    endif;
}

add_filter('cron_schedules', 'yymnk_interval' );
function yymnk_interval($schedules) {
    date_default_timezone_set( 'Asia/Tokyo' );
    $dt = new DateTime('now');
    $dt_2 = new DateTime('midnight first day of next month');
    $d = $dt_2->diff($dt, true);
    $dt_array = get_object_vars($d);
    $day = $dt_array["d"] * 24 * 60 * 60;
    $hour = $dt_array["h"] * 60 * 60;
    $minutes = $dt_array["i"] * 60;
    $second = $dt_array["s"];
    $difftime = $day + $hour + $minutes + $second + 60;
    $schedules['Nextmonth'] = array(
        'interval' => $difftime,
        'display' => 'Nextmonth'
    );
    return $schedules;
}

function yymnk_activation() {
    if(!wp_next_scheduled('yymnk_hourly_event')){
        wp_schedule_event(time(), 'Nextmonth', 'yymnk_hourly_event');
    }
}
add_action('wp', 'yymnk_activation');

register_deactivation_hook(__FILE__, 'yymnk_deactivation');
function yymnk_deactivation() {
    wp_clear_scheduled_hook('yymnk_hourly_event');
}


class MyWidgetItem extends WP_Widget {
	function MyWidgetItem() {
    	parent::WP_Widget(false, $name = '人気記事');
    }
    function widget($args, $instance) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        $prevew_num = apply_filters( 'widget_prevew_num', $instance['prevew_num'] );
        echo '<section class="widget widget_latest_wrap">';
        if ( $title ){
          echo $before_title . $title . $after_title;
        }else{
          echo $before_title . '人気記事' . $after_title;
        }
        $popularpost = new WP_Query( array( 'posts_per_page' => $prevew_num, 'meta_key' => 'yymnk_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
        echo '<ul>';
        while ( $popularpost->have_posts() ) : $popularpost->the_post();
          if(post_custom('yymnk_post_views_count')){
            echo '<li><div class="body">';
            if ( has_post_thumbnail() ) {
              the_post_thumbnail('thumbnail', array('class' => 'thumbnail'));
            } else {
              ?><img src="<?php echo get_stylesheet_directory_uri(); ?>/image/no-image.png" alt="NO IMAGE"/><?php
            }?>
              <div class="caption"><div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
              <span class="view_count">preview:<?php echo post_custom('yymnk_post_views_count'); ?></span></div></div><?php
            echo '</li>';
          }
        endwhile;
        echo '</ul></section>';
    }
    
    function update($new_instance, $old_instance) {
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['prevew_num'] = trim($new_instance['prevew_num']);
        return $instance;
    }
    function form($instance) {
        $title = esc_attr($instance['title']);
        $prevew_num = esc_attr($instance['prevew_num']);
        if($prevew_num<1){
          $prevew_num=1;
        }
        ?>
        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>">
          タイトル
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p>
           <label for="<?php echo $this->get_field_id('body'); ?>">
           表示数
           </label>
           <input type="number" min="1" class="widefat" name="<?php echo $this->get_field_name('prevew_num'); ?>" type="text" value="<?php echo $prevew_num; ?>" />
        </p>
        <?php
    }
}
add_action('widgets_init', create_function('', 'return register_widget("MyWidgetItem");'));