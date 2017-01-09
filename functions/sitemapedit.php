<?php
function yymnk_sitemap($post_ID){
  if(get_theme_mod('sitemap','0')){
    // ライブラリの読み込み
    require_once get_template_directory() . "./functions/Sitemap.php" ;
    // インスタンスの作成
    $stmp = new Sitemap( home_url() ) ;
    $stmp->setPath( get_home_path() ) ;
    $args = array(
    'numberposts'=>-1,
    'post_type' => 'post',
    );
    $posts = get_posts($args);
    global $post;
    $days=array(0,0);
    if($posts){
      foreach($posts as $post){
        setup_postdata($post);
        $stmp->addItem( str_replace(home_url(),"",get_the_permalink()) , get_theme_mod('priority_post','0.6') , get_theme_mod('changefreq_post','monthly') , get_the_date('Y-m-d') ) ;
        if($days[0]<>get_the_date('Y')){
          $days[0]=get_the_date('Y');
          $days[1]=get_the_date('m');
          $stmp->addItem( str_replace(home_url(),"",get_month_link($days[0], $days[1] )) , get_theme_mod('priority_archive','0.3') , get_theme_mod('changefreq_archive','weekly') , get_the_date($days[0].'-'.$days[1].'-1') ) ;
        }else{
          if($days[1]<>get_the_date('m')){
            $days[1]=get_the_date('m');
            $stmp->addItem( str_replace(home_url(),"",get_month_link($days[0], $days[1] )) , get_theme_mod('priority_archive','0.3') , get_theme_mod('changefreq_archive','weekly') , get_the_date($days[0].'-'.$days[1].'-1') ) ;
          }
        }
      }
    }
    $args = array(
    'numberposts'=>-1,
    'post_type' => 'page',
    );
    $posts = get_posts($args);
    global $post;
    if($posts){
      $toppage_chk=0;
      foreach($posts as $post){
        setup_postdata($post);
        if(str_replace(home_url(),"",get_the_permalink())=="/"){
          $toppage_chk=1;
          $stmp->addItem( str_replace(home_url(),"",get_the_permalink()) , get_theme_mod('priority_hp','1.0') , get_theme_mod('changefreq_hp','daily') , get_the_date('Y-m-d') ) ;
        }else{
          $stmp->addItem( str_replace(home_url(),"",get_the_permalink()) , get_theme_mod('priority_page','0.6') , get_theme_mod('changefreq_page','weekly') , get_the_date('Y-m-d') ) ;
        }
      }
      if($toppage_chk!=1){
        $stmp->addItem( '/' , get_theme_mod('priority_hp','1.0') , get_theme_mod('changefreq_hp','daily') , get_the_date('Y-m-d') ) ;
      }
    }
    $args = array(
    'numberposts'=>-1,
    );
    $cat_all = get_categories($args);
    foreach($cat_all as $value){
      $stmp->addItem( str_replace(home_url(),"",get_category_link($value)) , get_theme_mod('priority_category','0.3') , get_theme_mod('changefreq_category','weekly') , get_the_date('Y-m-d') ) ;
    }
  }
  return $post_ID;
}
add_action( 'publish_post', 'yymnk_sitemap');