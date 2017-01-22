<?php get_header(); ?>
      <div id="main">
<?php
if(get_theme_mod('sidebar','none')=="right-right"){
    get_sidebar('beta');
  }elseif(get_theme_mod('sidebar','none')!="none"){
     get_sidebar('alpha');
  }
  $url=$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
  $body="";
  $body = get_transient( $url );
  if($body===false){
    $body='        <div id="article">
          '.breadcrumb();
    if(is_single()){
      $body.='      <div class="navigation">
          <ul>
          <li>';
      $previous_post = get_previous_post();
      $pre_post_title = $previous_post->post_title;
      if ( mb_strlen( $pre_post_title ) > 18 ) { $pre_post_title = mb_substr( $pre_post_title, 0, 18).'...'; }
      if ( !empty( $previous_post ) ){
        if(!empty($pre_post_title)){
          $body.='          <a href="'.esc_url( get_permalink( $previous_post->ID ) ).'" title="'.esc_html( $previous_post->post_title).'">&laquo; '.$pre_post_title.'</a>';
        }else{
          $body.='          <a href="'.esc_url( get_permalink( $previous_post->ID ).'" title="'.esc_html( $previous_post->post_title)).'">&laquo; 前の投稿</a>';
        }
      }
      $body.='        </li>
          <li>';
      $next_post = get_next_post();
      $next_post_title = $next_post->post_title;
      if ( mb_strlen( $next_post_title ) > 18 ) { $next_post_title = mb_substr( $next_post_title, 0, 18).'...'; }
      if ( !empty( $next_post ) ){
        if(!empty($next_post_title)){
          $body.='          <a href="'.esc_url( get_permalink( $next_post->ID )).'" title="'.esc_html( $next_post->post_title).'">'.$next_post_title.'&raquo;</a>';
        }else{
          $body.='          <a href="'.esc_url( get_permalink( $next_post->ID ) ).'" title="'.esc_html( $next_post->post_title).'">次の投稿 &raquo;</a>';
        }
      }
      $body.='        </li>
          </ul>
        </div>';
    }
    if (have_posts()) :
      while (have_posts()) : the_post();
        $classes = get_post_class();
        $separator = ' ';
        $class_output = '';
        if ( $classes ) {
        foreach( $classes as $class ) {
          $class_output .= $class . $separator;
          }
          $class_output=trim( $class_output, $separator );
        }
        $body.='          <section id="post-'.get_the_ID().'" class="'.$class_output.'">
              <h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>
              <div class="Impression">
                <a href="'.get_the_permalink().'"><time>'.get_the_date().'</time></a>';
        if(is_single()){
          $categories = get_the_category();
          $separator = ',';
          $output = '';
          if ( $categories ) {
          foreach( $categories as $category ) {
            $output .= '<a href="' . get_category_link( $category->term_id ) . '" title="' 
              . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) 
              . '">' . $category->cat_name . '</a>' . $separator;
            }
            $output=trim( $output, $separator );
          }
          $body.='              <div class="categry">カテゴリ：'.$output.'</div>';
        }
        $body.='            </div>
              <article>';
        if(get_theme_mod('table_of_contents','0')){
          $body.='                <div id="toc"></div>';
        }
        $body.='                <div id="content_text">
                    ';
        $content = get_the_content();
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        $body.=$content;
        $body.='                  </div>';
        $args = array(
          'before' => '<div id="page-link"><ul>',
          'after' => '</ul></div>',
          'link_before' => '<li>',
          'link_after' => '</li>',
          'next_or_number' =>'next',
          'nextpagelink' =>'次ページへ &raquo',
          'previouspagelink'=>'&laquo 前のページへ',
          'echo'             => 0
        );
        $body.='      '.wp_link_pages($args);
        $body.=get_social_buttom();
        $body.=get_related_entry($post);
        $body.=get_comments_template();
        $body.='            </article>
            </section>';
      endwhile;
    endif;
    $body.='        </div>';
    if(get_theme_mod('cache','0')){
      switch(get_theme_mod('cache_time','week')){
        case "day":
          $time=60 * 60 * 24;
          break;
        case "week":
          $time=60 * 60 * 24*7;
          break;
        case "month":
          $time=60 * 60 * 24*31;
          break;
        case "year":
          $time=60 * 60 * 24*365;
          break;
      }
      set_transient( $url, $body, $time );
    }
  }
  $urls = array();
  $urls=get_transient("urls");
  if($urls===false){
    $urls = array("",$url);
  }else{
    if (!array_search($url,$urls)){
      array_push($urls,$url);
    }
  }
  set_transient( "urls", $urls);
  print $body;
  if(get_theme_mod('sidebar','none')=="right-right"){
    get_sidebar('alpha');
  }elseif(get_theme_mod('sidebar','none')!="none" and get_theme_mod('sidebar','none')!="right" and get_theme_mod('sidebar','none')!="left"){
    get_sidebar('beta');
  }
?>
      </div>
<?php get_footer(); ?>