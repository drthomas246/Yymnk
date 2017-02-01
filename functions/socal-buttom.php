<?php
function social_buttom(){
  if(get_theme_mod('buttom_facebook','1') or get_theme_mod('buttom_twitter','1') or get_theme_mod('buttom_google','1') or get_theme_mod('buttom_pocket','1') or get_theme_mod('buttom_line','1') or get_theme_mod('buttom_hatena','1')){
    if(!is_home()&&!is_front_page()&&!is_admin()){
      if (get_theme_mod('social_title','ソーシャルボタン')){
?>
<h5><?php echo get_theme_mod('social_title','ソーシャルボタン'); ?></h5>
<?php
      }
$url_encode=urlencode(get_permalink());
$title_encode=urlencode(get_the_title()).'｜'.get_bloginfo('name');
?>
<ul id="social_buttom">
<?php
      if(get_theme_mod('buttom_facebook','1')):
?>
  <li>
    <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
  </li>
<?php
      endif;
      if(get_theme_mod('buttom_twitter','1')):
?>
  <li>
    <a href="https://twitter.com/share" class="twitter-share-button" data-via="<?php echo str_replace("@","",get_theme_mod('twitter_site','')); ?>" data-lang="ja">ツイート</a>
  </li>
<?php
      endif;
      if(get_theme_mod('buttom_google','1')):
?>
  <li>
    <div class="g-plus" data-action="share" data-annotation="none"></div>
  </li>
<?php
      endif;
      if(get_theme_mod('buttom_pocket','1')):
?>
  <li id="pocket">
    <a data-pocket-label="pocket" data-pocket-count="none" class="pocket-btn" data-lang="ja"></a>
  </li>
<?php
      endif;
      if(get_theme_mod('buttom_line','1')):
?>
  <li>
    <div class="line-it-button" style="display: none;" data-type="share-a" data-lang="ja" ></div>
  </li>
<?php
      endif;
      if(get_theme_mod('buttom_hatena','1')):
?>
  <li>
    <a href="http://b.hatena.ne.jp/entry/" class="hatena-bookmark-button" data-hatena-bookmark-layout="standard-noballoon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
  </li>
<?php
      endif;
?>
</ul>
<?php
    }
  }
}

function yymnk_facebook_footer(){
  if(get_theme_mod('buttom_facebook','1') or get_theme_mod('buttom_twitter','1') or get_theme_mod('buttom_google','1') or get_theme_mod('buttom_pocket','1') or get_theme_mod('buttom_line','1') or get_theme_mod('buttom_hatena','1')){
    if(!is_home()&&!is_front_page()&&!is_admin()){
      if(get_theme_mod('buttom_facebook','1')):
?>
<div id="fb-root"></div>
<script>(function(d, s, id){var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.8";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
<?php
      endif;
      if(get_theme_mod('buttom_twitter','1')):
?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<?php
      endif;
      if(get_theme_mod('buttom_google','1')):
?>
<script src="https://apis.google.com/js/platform.js" async defer>{lang: 'ja'}</script>
<?php
      endif;
      if(get_theme_mod('buttom_hatena','1')):
?>
<script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
<?php
      endif;
      if(get_theme_mod('buttom_pocket','1')):
?>
<script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js");</script>
<?php
      endif;
      if(get_theme_mod('buttom_line','1')):
?>
<script src="//scdn.line-apps.com/n/line_it/thirdparty/loader.min.js" async="async" defer="defer" ></script>
<?php
    endif;
    }
  }
}
add_action('wp_footer','yymnk_facebook_footer');
