<?php
function breadcrumb($divOption = array("id" => "breadcrumb", "class" => "clearfix")){
  global $post;
  $str ='';
  if(!is_home()&&!is_front_page()&&!is_admin()){ /* !is_admin は管理ページ以外という条件分岐 */
    $tagAttribute = '';
    foreach($divOption as $attrName => $attrValue){
      $tagAttribute .= sprintf(' %s="%s"', $attrName, $attrValue);
    }
    $str.= '<div'. $tagAttribute .'>';
    $str.= '<ul>';
    $str.= '<li><a href="'. home_url() .'/">HOME</a></li>';
    $str.= '<li>&nbsp;&gt;&nbsp;</li>';

    if(is_category()) { //カテゴリーのアーカイブページ
      $cat = get_queried_object();
      if($cat -> parent != 0){
        $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
        foreach($ancestors as $ancestor){
          $str.='<li><a href="'. get_category_link($ancestor) .'">'. get_cat_name($ancestor) .'a</a></li>';
          $str.='<li>&nbsp;&gt;&nbsp;</li>';
        }
      }
      $str.='<li>'. $cat -> name . '</li>';
    }  elseif(is_page() or is_singular( 'math' )){    //固定ページ
      if($post -> post_parent != 0 ){
        $ancestors = array_reverse(get_post_ancestors( $post->ID ));
        foreach($ancestors as $ancestor){
          $str.='<li><a href="'. get_permalink($ancestor).'">'. get_the_title($ancestor) .'</a></li>';
          $str.='<li>&nbsp;&gt;&nbsp;</li>';
        }
      }
      $str.= '<li>'. $post -> post_title .'</li>';
    }elseif(is_single()){  //ブログの個別記事ページ
      $categories = get_the_category($post->ID);
      $cat = $categories[0];
      if($cat -> parent != 0){
        $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
        foreach($ancestors as $ancestor){
          $str.='<li><a href="'. get_category_link($ancestor).'">'. get_cat_name($ancestor). '</a></li>';
          $str.='<li>&nbsp;&gt;&nbsp;</li>';
        }
      }
      $str.='<li><a href="'. get_category_link($cat -> term_id). '">'. $cat-> cat_name . '</a></li>';
      $str.='<li>&nbsp;&gt;&nbsp;</li>';
      $str.= '<li>'. $post -> post_title .'</li>';
    } elseif(is_date()){    //日付ベースのアーカイブページ
      if(get_query_var('day') != 0){  //年別アーカイブ
        $str.='<li><a href="'. get_year_link(get_query_var('year')). '">' . get_query_var('year'). '年</a></li>';
        $str.='<li>&nbsp;&gt;&nbsp;</li>';
        $str.='<li><a href="'. get_month_link(get_query_var('year'), get_query_var('monthnum')). '">'. get_query_var('monthnum') .'月</a></li>';
        $str.='<li>&nbsp;&gt;&nbsp;</li>';
        $str.='<li>'. get_query_var('day'). '日</li>';
      } elseif(get_query_var('monthnum') != 0){   //月別アーカイブ
        $str.='<li><a href="'. get_year_link(get_query_var('year')) .'">'. get_query_var('year') .'年</a></li>';
        $str.='<li>&nbsp;&gt;&nbsp;</li>';
        $str.='<li>'. get_query_var('monthnum'). '月</li>';
      } else {    //年別アーカイブ
        $str.='<li>'. get_query_var('year') .'年</li>';
    }
  } elseif(is_search()) { //検索結果表示ページ
    $str.='<li>「'. get_search_query() .'」で検索した結果</li>';
  } elseif(is_author()){  //投稿者のアーカイブページ
    $str .='<li>投稿者 : '. get_the_author_meta('display_name', get_query_var('author')).'</li>';
  } elseif(is_tag()){ //タグのアーカイブページ
    $str.='<li>タグ : '. single_tag_title( '' , false ). '</li>';
  } elseif(is_attachment()){  //添付ファイルページ
    $str.= '<li>'. $post -> post_title .'</li>';
  } elseif(is_404()){ //404 Not Found ページ
    $str.='<li>404 Not found</li>';
  } else{ //その他
    $str.='<li>'. wp_title('', true) .'</li>';
  }
  $str.='</ul>';
  $str.='</div>';
}
return $str;
}
?>