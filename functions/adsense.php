<?php
function yymnk_adsense($contentData){
  if (get_theme_mod('adsense','0')){
    switch (get_theme_mod('adsense_label','none')){
      case 'none':
        $str='<div class="adsense">';
        break;
      case 'sponsor':
        $str='<div class="adsense">スポンサーリンク<br/>';
        break;
      case 'ad':
        $str='<div class="adsense">広告<br/>';
        break;
    }
    $adsense_tag = stripslashes(get_theme_mod('adsense_tag',''));
    $str.=$adsense_tag."</div>";
    if(get_theme_mod('adsense_more','0')){
      $contentData = preg_replace('/<span id="more-[0-9]+"><\/span>/', $str, $contentData);
    }
    if(get_theme_mod('adsense_nbsp','0')){
      $contentData = preg_replace('/&nbsp;/', $str, $contentData);
    }
    if(get_theme_mod('adsense_buttom','0')){
      $contentData .="<p>".$str."</p>";
    }
  }
  return $contentData;
}
add_filter('the_content', 'yymnk_adsense');

function yymnk_adsense_shortcode(){
  $short_code="";
  if (get_theme_mod('adsense','0')){
    if(get_theme_mod('adsense_shortcode','0')){
      $short_code=get_theme_mod('adsense_tag','');
    }
  }
  return $short_code;
}
add_shortcode('adsense', 'yymnk_adsense_shortcode');
?>