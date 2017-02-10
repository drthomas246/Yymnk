<?php 
  $url=$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
  $body="";
  $body = get_transient( $url );
  if($body===false){
    if (have_posts()) :
      while (have_posts()) : the_post();
        if ( mb_strlen( get_the_title() ) > 16 ) {
          $title=mb_substr(get_the_title(),0,16).'...';
        }else{
          $title=get_the_title() ;
        }
        
        $classes = get_post_class();
        $separator = ' ';
        $class_output = '';
        if ( $classes ) {
        foreach( $classes as $class ) {
          $class_output .= $class . $separator;
          }
          $class_output=trim( $class_output, $separator );
        }
        $categories = get_the_category();
        $separator = ',';
        $output = '';
        if ( $categories ) {
        foreach( $categories as $category ) {
          $output .= '<a href="' . get_category_link( $category->term_id ) . '" title="' 
            . esc_attr( sprintf( "「%s」の記事をすべて表示", $category->name ) ) 
            . '">' . $category->cat_name . '</a>' . $separator;
          }
          $output=trim( $output, $separator );
        }
        $body.=
  '        <section id="post-'.get_the_ID().'" class="'.$class_output.'" >
              <h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>
              <div class="Impression">
                <a href="'.get_the_permalink().'"><time>'.get_the_date().'</time></a>
                <div class="categry">カテゴリ：'.$output.'</div>
              </div>
              <article>
                <div class="thumbnail">
                  '.get_the_post_thumbnail(get_the_ID(),"thumbnail",array( "alt" => get_the_title(), "title" => get_the_title() ,"class"=> "firstimg")).'
                </div>
              '.get_the_excerpt().'
              </article>
              <div class="more">
                <a href="'.get_the_permalink().'" class="more-link">「'.$title.'」の続きを読む&raquo;</a>
              </div>
           </section>';
      endwhile;
    endif;
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
?>