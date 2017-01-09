<?php
add_action('admin_menu', 'custom_description_hooks');
add_action('save_post', 'save_custom_description');
function custom_description_hooks() {
  if(!get_theme_mod('description','1')){
      add_meta_box('custom_description', '記事の概要', 'custom_description_input', 'post', 'normal', 'high');
      add_meta_box('custom_description', '記事の概要', 'custom_description_input', 'page', 'normal', 'high');
  }
}
function custom_description_input() {
    global $post;
    echo '<input type="hidden" name="custom_description_noncename" id="custom_description_noncename" value="'.wp_create_nonce('custom-description').'" />';
    echo '<textarea name="custom_description" id="custom_description" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_description',true).'</textarea>';
}
function save_custom_description($post_id) {
    if (!wp_verify_nonce($_POST['custom_description_noncename'], 'custom-description')) return $post_id;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
    if(!get_theme_mod('description','1')){
      $custom_description = $_POST['custom_description'];
      update_post_meta($post_id, '_custom_description', $custom_description);
    }
}