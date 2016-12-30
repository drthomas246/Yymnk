<?php
//メタタグを挿入
function insert_custom_meta() {
  if (is_page() || is_single()) {
    if (have_posts()) : while (have_posts()) : the_post();
    if(!get_theme_mod('description','1')){
      $description=get_post_meta(get_the_ID(), '_custom_description', true);
    }else{
      global $more;
      $more = 0;
      $description=str_replace(array("\r\n","\n","\r"), '',strip_tags(get_the_excerpt('')));
    }
      if(get_theme_mod('facebook','1')){
        echo "<meta property=\"og:title\" content=\"".get_the_title()."\">\n";
        echo "<meta property=\"og:url\" content=\"".get_the_permalink()."\">\n";
        if(wp_get_attachment_url( get_post_thumbnail_id() )){
          echo "<meta property=\"og:image\" content=\"".wp_get_attachment_url( get_post_thumbnail_id() )."\">\n";
          echo "<meta property=\"og:image:width\" content=\"".get_option('thumbnail_size_w')."\">\n";
          echo "<meta property=\"og:image:height\" content=\"".get_option('thumbnail_size_h')."\">\n";
        }
        echo "<meta property=\"og:site_name\" content=\"". get_bloginfo('name')."\">\n";
        if($description){
          echo "<meta property=\"og:description\" content=\"".$description."\">\n";
        }
        echo "<meta property=\"article:published_time\" content=\"".get_post_time("c")."\">\n";
        echo "<meta property=\"article:modified_time\" content=\"".get_the_modified_date("c")."\">\n";
      }
      if(get_theme_mod('google','1')){
        echo "<meta itemprop=\"name\" content=\"".get_the_title()."\">\n";
        if($description){
          echo "<meta itemprop=\"description\" content=\"".$description."\">\n";
        }
        if(wp_get_attachment_url( get_post_thumbnail_id() )){
          echo "<meta itemprop=\"image\" content=\"".wp_get_attachment_url( get_post_thumbnail_id() )."\">\n";
        }
        echo "<meta itemprop=\"dateCreated\" content=\"".get_post_time("c")."\">\n";
        echo "<meta itemprop=\"dateModified\" content=\"".get_the_modified_date("c")."\">\n";
        echo "<meta itemprop=\"keywords\" content=\"".strip_tags(get_the_category_list(', '))."\">\n";
      }
      if(get_theme_mod('twitter','1')){
        echo "<meta name=\"twitter:card\" content=\"".get_theme_mod('twitter_cards','summary')."\">\n";
        if($description){
          echo "<meta name=\"twitter:description\" content=\"".$description."\">\n";
        }
        echo "<meta name=\"twitter:domain\" content=\"". str_replace(array("http://","https://"),"",site_url( ''))."\">\n";
        if(wp_get_attachment_url( get_post_thumbnail_id() )){
          echo "<meta name=\"twitter:image\" content=\"".wp_get_attachment_url( get_post_thumbnail_id() )."\">\n";
        }
        if(get_theme_mod('twitter_site','')){
          echo "<meta name=\"twitter:site\" content=\"".get_theme_mod('twitter_site','')."\">\n";
        }
        echo "<meta name=\"twitter:title\" content=\"".get_the_title()."\">\n";
      }
    endwhile; endif;
    rewind_posts();
  }
}
add_action('wp_head','insert_custom_meta');
?>