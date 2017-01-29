<?php
if ( ! isset( $content_width ) ) $content_width = 1000;

//メニューなどの挿入
function yymnk_setup(){
  add_theme_support( 'menus' );
  register_nav_menu('header-navi', 'メインメニュー');
  add_theme_support( 'title-tag' );
  add_theme_support('post-thumbnails');
  $custom_header_defaults = array(
    'width'                  => 1000,
    'height'                 => 200,
    'header-text'            => false,  //ヘッダー画像上にテキストをかぶせる
  );
  add_theme_support( 'custom-header', $custom_header_defaults );
  add_theme_support( 'custom-background' );
  add_image_size('thumb-elated-entriy',100,60,true);
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );    
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );    
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'emoji_svg_url', '__return_false' );
  remove_action('wp_head', 'wp_generator' );
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
  remove_action('wp_head', 'rel_canonical');
  remove_action('wp_head', 'index_rel_link');
  remove_action('wp_head', 'parent_post_rel_link', 10, 0);
  remove_action('wp_head', 'start_post_rel_link', 10, 0);
  remove_action('wp_head', 'wp_shortlink_wp_head');
  remove_action('wp_head','rest_output_link_wp_head');
  remove_action('wp_head','wp_oembed_add_discovery_links');
  remove_action('wp_head','wp_oembed_add_host_js');
}
add_action('after_setup_theme', 'yymnk_setup');

function remove_recent_comments_style() {
 global $wp_widget_factory;
 remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );

//サイドバーの挿入
function yymnk_slug_widgets_init() {
  register_sidebar( array(
    'name' => 'サイドバーα',
    'id' => 'sidebar-1',
    'description' => 'ここにウィジェットを追加してサイドバーに表示します。',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ) );
  register_sidebar( array(
    'name' => 'サイドバーβ',
    'id' => 'sidebar-2',
    'description' => 'ここにウィジェットを追加してサイドバーに表示します。',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ) );
}
add_action( 'widgets_init', 'yymnk_slug_widgets_init' );

//javascriptやpreハイライトの挿入
function yymnk_script_output() {
  switch (get_theme_mod('sidebar','none')){
  case "none";
    wp_enqueue_style('yymnk-style', get_stylesheet_directory_uri() . '/css/none.css');
    break;
  case "right";
    wp_enqueue_style('yymnk-style', get_stylesheet_directory_uri() . '/css/right.css');
    break;
  case "left";
    wp_enqueue_style('yymnk-style', get_stylesheet_directory_uri() . '/css/left.css');
    break;
  case "left-right";
    wp_enqueue_style('yymnk-style', get_stylesheet_directory_uri() . '/css/left-right.css');
    break;
  case "left-left";
    wp_enqueue_style('yymnk-style', get_stylesheet_directory_uri() . '/css/left-left.css');
    break;
  case "right-right";
    wp_enqueue_style('yymnk-style', get_stylesheet_directory_uri() . '/css/right-right.css');
    break;
  }
  wp_enqueue_style('yymnk-style', get_stylesheet_uri());
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script('myscript', get_stylesheet_directory_uri() . '/javascript/myscript.min.js',array(),1.0,true);
  if(get_theme_mod('prism','1')){
    wp_enqueue_style('prismcss', get_stylesheet_directory_uri() . '/css/prism.min.css');
    wp_enqueue_script('prismjs', get_stylesheet_directory_uri() . '/javascript/prism.js', array(), '2.8.1',true);
  }
  if(get_theme_mod('fancybox','1')){
    wp_enqueue_style('fancyboxcss', get_stylesheet_directory_uri() . '/fancyBox/source/jquery.fancybox.pack.css');
    wp_enqueue_script('fancyboxjs', get_stylesheet_directory_uri(). '/fancyBox/source/jquery.fancybox.pack.js', array('jquery'), '2.1.5',true);
  }
  if(get_theme_mod('lazy_load','0')){
    wp_enqueue_script('lazyloadjs', get_stylesheet_directory_uri(). '/javascript/jquery.lazyload.min.js', array('jquery'), '2.1.5',true);
  }
  if(get_theme_mod('to-top','0')){
    wp_enqueue_style('to-topcss', get_stylesheet_directory_uri() . '/css/to-top.min.css');
    wp_enqueue_script('to-topjs', get_stylesheet_directory_uri() . '/javascript/to-top.min.js', array('jquery'), '1.0',true);
  }
}
add_action( 'wp_enqueue_scripts', 'yymnk_script_output');

function yymnk_admin_script_output(){
    wp_enqueue_style('yymnk_admin_css', get_stylesheet_directory_uri() . '/css/admin.min.css');
    wp_enqueue_script('yymnk_admin_tab_js', get_stylesheet_directory_uri() . '/javascript/admin-tab.min.js', array(), '1.0',true);
    wp_enqueue_script('yymnk_admin_js', get_stylesheet_directory_uri() . '/javascript/admin.min.js', array('jquery'), '1.0',true);
}
add_action( 'admin_head', 'yymnk_admin_script_output');

//moreタグを削除
function new_excerpt_more($more) {
  return ''; 
}
add_filter('excerpt_more', 'new_excerpt_more');


require_once get_template_directory() . '/functions/setting.php';
require_once get_template_directory() . '/functions/breadcrumb.php';
require_once get_template_directory() . '/functions/meta-tag.php';
require_once get_template_directory() . '/functions/socal-buttom.php';
require_once get_template_directory() . '/functions/related-entries.php';
require_once get_template_directory() . '/functions/mokuji.php';
require_once get_template_directory() . '/functions/description.php';
require_once get_template_directory() . '/functions/customize.php';
require_once get_template_directory() . '/functions/copyright.php';
require_once get_template_directory() . '/functions/sitemapedit.php';
require_once get_template_directory() . '/functions/cache.php';
require_once get_template_directory() . '/functions/adsense.php';
require_once get_template_directory() . '/functions/publisher.php';
require_once get_template_directory() . '/functions/pubsubhubbub.php';
require_once get_template_directory() . '/functions/lazyload.php';
require_once get_template_directory() . '/functions/popular-post.php';
require_once get_template_directory() . '/functions/media-compression.php';