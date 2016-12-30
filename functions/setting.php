<?php
add_action('admin_menu', 'yymk_add_theme_page');
function yymk_add_theme_page(){
  add_theme_page('テーマの設定', 'テーマの設定',8,'setting_by_theme','yymnk_setting');
}
function yymnk_setting(){
  if ( isset($_POST['twitter_cards']) or isset($_POST['twitter_site']) or isset($_POST['sidebar']) or isset($_POST['seo']) or isset($_POST['fancybox']) or isset($_POST['analytics']) or isset($_POST['tracking_id']) or isset($_POST['buttom']) or isset($_POST['related_entry']) or isset($_POST['social_title']) or isset($_POST['related_entry_title']) or isset($_POST['table_of_contents']) or isset($_POST['description']) or isset($_POST['prism']) or isset($_POST['copyright_auther']) or isset($_POST['copyright']) or isset($_POST['copyright_old_start']) or isset($_POST['copyright_new_end']) or isset($_POST['copyright_start']) or isset($_POST['copyright_end']) or isset($_POST['to-top'])) {
    set_theme_mod('twitter_cards', $_POST['twitter_cards']);
    set_theme_mod('copyright_auther', $_POST['copyright_auther']);
    set_theme_mod('copyright_end', $_POST['copyright_end']);
    set_theme_mod('copyright_start', $_POST['copyright_start']);
    set_theme_mod('twitter_site', '@'.$_POST['twitter_site']);
    set_theme_mod('sidebar', $_POST['sidebar']);
    set_theme_mod('tracking_id', $_POST['tracking_id']);
    set_theme_mod('social_title', $_POST['social_title']);
    set_theme_mod('related_entry_title', $_POST['related_entry_title']);
    if($_POST['to-top']){
      set_theme_mod('to-top', $_POST['to-top']);
    }else{
      set_theme_mod('to-top', '0');
    }
    if($_POST['copyright_old_start']){
      set_theme_mod('copyright_old_start', $_POST['copyright_old_start']);
    }else{
      set_theme_mod('copyright_old_start', '0');
    }
    if($_POST['copyright_new_end']){
      set_theme_mod('copyright_new_end', $_POST['copyright_new_end']);
    }else{
      set_theme_mod('copyright_new_end', '0');
    }
    if($_POST['copyright']){
      set_theme_mod('copyright', $_POST['copyright']);
    }else{
      set_theme_mod('copyright', '0');
    }
    if($_POST['prism']){
      set_theme_mod('prism', $_POST['prism']);
    }else{
      set_theme_mod('prism', '0');
    }
    if($_POST['description']){
      set_theme_mod('description', $_POST['description']);
    }else{
      set_theme_mod('description', '0');
    }
    if($_POST['table_of_contents']){
      set_theme_mod('table_of_contents', $_POST['table_of_contents']);
    }else{
      set_theme_mod('table_of_contents', '0');
    }
    if($_POST['related_entry']){
      set_theme_mod('related_entry', $_POST['related_entry']);
    }else{
      set_theme_mod('related_entry', '0');
    }
    if($_POST['analytics']){
      set_theme_mod('analytics', $_POST['analytics']);
    }else{
      set_theme_mod('analytics', '0');
    }
    if($_POST['fancybox']){
      set_theme_mod('fancybox', $_POST['fancybox']);
    }else{
      set_theme_mod('fancybox', '0');
    }
    $seo=$_POST['seo'];
    if($seo[google]){
      set_theme_mod('google', $seo[google]);
    }else{
      set_theme_mod('google', '0');
    }
    if($seo[facebook]){
      set_theme_mod('facebook', $seo[facebook]);
    }else{
      set_theme_mod('facebook', '0');
    }
    if($seo[twitter]){
      set_theme_mod('twitter', $seo[twitter]);
    }else{
      set_theme_mod('twitter', '0');
    }
    $buttom=$_POST['buttom'];
    if($buttom[google]){
      set_theme_mod('buttom_google', $buttom[google]);
    }else{
      set_theme_mod('buttom_google', '0');
    }
    if($buttom[facebook]){
      set_theme_mod('buttom_facebook', $buttom[facebook]);
    }else{
      set_theme_mod('buttom_facebook', '0');
    }
    if($buttom[twitter]){
      set_theme_mod('buttom_twitter', $buttom[twitter]);
    }else{
      set_theme_mod('buttom_twitter', '0');
    }
    if($buttom[pocket]){
      set_theme_mod('buttom_pocket', $buttom[pocket]);
    }else{
      set_theme_mod('buttom_pocket', '0');
    }
    if($buttom[line]){
      set_theme_mod('buttom_line', $buttom[line]);
    }else{
      set_theme_mod('buttom_line', '0');
    }
    if($buttom[hatena]){
      set_theme_mod('buttom_hatena', $buttom[hatena]);
    }else{
      set_theme_mod('buttom_hatena', '0');
    }
    ?><div class="updated fade"><p><strong>設定を更新しました。</strong></p></div><?php
  }
?>
<div class="wrap">
  <h1>テーマの設定</h1>
  <div id="javascript_tab_sample">
    <ul id="tab">
      <li class="selected"><a href="#theme">サイト関係</a></li>
      <li><a href="#layout">レイアウト関係</a></li>
      <li><a href="#seo">SEO設定</a></li>
      <li><a href="#version">バージョン情報</a></li>
    </ul>
    <form action="" method="post">
      <dl id="theme">
        <dd>
          <div class="metabox-holder">
            <div class="postbox">
              <h2 class="hndle">装飾関係</h2>
              <div class="inside">
                <table class="form-table">
                  <tbody>
                  <tr>
                    <th><label>目次</label></th>
                    <td>
                    <label><input type="checkbox" name="table_of_contents" value="1"<?php if(get_theme_mod('table_of_contents','0')){echo " checked=\"checked\"";} ?>>投稿とページに表示する</label>
                    </td>
                  </tr>
                  <tr>
                    <th><label>fancyBox</label></th>
                    <td>
                    <label><input type="checkbox" name="fancybox" value="1"<?php if(get_theme_mod('fancybox','1')){echo " checked=\"checked\"";} ?>>ギャラリーにfancyBoxを付ける</label>
                    </td>
                  </tr>
                  <tr>
                    <th><label>PRISM</label></th>
                    <td>
                    <label><input type="checkbox" name="prism" value="1"<?php if(get_theme_mod('prism','1')){echo " checked=\"checked\"";} ?>>PRISMで&lt;pre&gt;&lt;code&gt;～&lt;/code&gt;&lt;/pre&gt;間をシンタックスハイライトをする</label>
                    </td>
                  </tr>
                  <tr>
                    <th><label>トップに戻るボタン</label></th>
                    <td>
                    <label><input type="checkbox" name="to-top" value="1"<?php if(get_theme_mod('to-top','0')){echo " checked=\"checked\"";} ?>>表示する</label>
                    </td>
                  </tr>
                  </tbody>
                </table>
                <p class="submit"><input type="submit" name="Submit" class="button-primary" value="変更を保存" /></p>
              </div>
            </div>
          </div>
          <div class="metabox-holder">
            <div class="postbox">
              <h2 class="hndle">関連表示</h2>
              <div class="inside">
                <table class="form-table">
                  <tbody>
                  <tr>
                    <th><label>関連項目を表示</label></th>
                    <td>
                    <label><input type="checkbox" name="related_entry" class="related_entry" value="1"<?php if(get_theme_mod('related_entry','1')){echo " checked=\"checked\"";} ?>>表示する</label>
                    </td>
                  </tr>
                  <tr>
                    <th><label for="sidebar">関連項目のタイトル</label></th>
                    <td>
                      <input name="related_entry_title" type="text" class="related_entry_title" id="inputtext" value="<?php echo str_replace("@","",get_theme_mod('related_entry_title','関連項目')); ?>" class="regular-text"<?php if(!get_theme_mod('related_entry','1')){echo " disabled";} ?> />
                    </td>
                  </tr>
                  </tbody>
                  </table>
                <p class="submit"><input type="submit" name="Submit" class="button-primary" value="変更を保存" /></p>
              </div>
            </div>
          </div>
        </dd>
      </dl>
      <dl id="layout">
          <div class="metabox-holder">
            <div class="postbox">
              <h2 class="hndle">サイドバー</h2>
              <div class="inside">
                <table class="form-table">
                  <tbody>
                  <tr>
                    <th><label>サイドバー表示</label></th>
                    <td>
                      <label><input type="radio" name="sidebar" value="none"<?php if(get_theme_mod('sidebar','none')=="none"){echo " checked=\"checked\"";} ?>>
                        <img src="<?php echo get_template_directory_uri(); ?>/image/none.png"> サイドバーなし</label>　
                      <label><input type="radio" name="sidebar" value="left"<?php if(get_theme_mod('sidebar','none')=="left"){echo " checked=\"checked\"";} ?>>
                        <img src="<?php echo get_template_directory_uri(); ?>/image/left.png"> 左サイドバー</label>　　
                      <label><input type="radio" name="sidebar" value="right"<?php if(get_theme_mod('sidebar','none')=="right"){echo " checked=\"checked\"";} ?>>
                        <img src="<?php echo get_template_directory_uri(); ?>/image/right.png"> 右サイドバー</label><br/>
                      <label><input type="radio" name="sidebar" value="left-right"<?php if(get_theme_mod('sidebar','none')=="left-right"){echo " checked=\"checked\"";} ?>>
                        <img src="<?php echo get_template_directory_uri(); ?>/image/left-right.png"> 左右サイドバー</label>　
                      <label><input type="radio" name="sidebar" value="left-left"<?php if(get_theme_mod('sidebar','none')=="left-left"){echo " checked=\"checked\"";} ?>>
                        <img src="<?php echo get_template_directory_uri(); ?>/image/left-left.png"> 左左サイドバー</label>　
                      <label><input type="radio" name="sidebar" value="right-right"<?php if(get_theme_mod('sidebar','none')=="right-right"){echo " checked=\"checked\"";} ?>>
                        <img src="<?php echo get_template_directory_uri(); ?>/image/right-right.png"> 右右サイドバー</label>
                    </td>
                  </tr>
                </tbody>
                </table>
                <p class="submit"><input type="submit" name="Submit" class="button-primary" value="変更を保存" /></p>
              </div>
            </div>
          </div>
          <div class="metabox-holder">
            <div class="postbox">
              <h2 class="hndle">フッター</h2>
              <div class="inside">
                <table class="form-table">
                  <tbody>
                  <tr>
                    <th><label>著作権</label></th>
                    <td>
                    <label><input type="checkbox" class="copyright" name="copyright" value="1"<?php if(get_theme_mod('copyright','1')){echo " checked=\"checked\"";} ?>>表示する</label>
                    </td>
                  </tr>
                  <tr>
                    <th><label>著作者</label></th>
                    <td>
                    <input name="copyright_auther" type="text" class="copyright_sub" id="inputtext" value="<?php echo get_theme_mod('copyright_auther',get_bloginfo('name')); ?>" class="regular-text"<?php if(!get_theme_mod('copyright','1')){echo " disabled";} ?> />
                    </td>
                  </tr>
                  <tr>
                    <th><label>開始年</label></th>
                    <td>
                    <label><input type="checkbox" name="copyright_old_start" class="copyright_old_start copyright_sub" value="1"<?php if(get_theme_mod('copyright_old_start','1')){echo " checked=\"checked\"";} ?><?php if(!get_theme_mod('copyright','1')){echo " disabled";} ?>>一番古い投稿の年を開始年にする。</label><br/>しない場合は下に記入<br/>
                    <input name="copyright_start" type="number" id="inputtext" class="copyright_start copyright_sub" value="<?php echo get_theme_mod('copyright_start',date('Y')); ?>" size="5"<?php if(get_theme_mod('copyright_old_start','1')){echo " disabled";} ?><?php if(!get_theme_mod('copyright','1')){echo " disabled";} ?> />年
                    </td>
                  </tr>
                  <tr>
                    <th><label>終了年</label></th>
                    <td>
                    <label><input type="checkbox" name="copyright_new_end" class="copyright_new_end copyright_sub" value="1"<?php if(get_theme_mod('copyright_new_end','1')){echo " checked=\"checked\"";} ?><?php if(!get_theme_mod('copyright','1')){echo " disabled";} ?>>一番新しい投稿の年を終了年にする。</label><br/>しない場合は下に記入<br/>
                    <input name="copyright_end" type="number" id="inputtext" class="copyright_end copyright_sub" value="<?php echo get_theme_mod('copyright_end',date('Y')); ?>" size="5"<?php if(get_theme_mod('copyright_new_end','1')){echo " disabled";} ?><?php if(!get_theme_mod('copyright','1')){echo " disabled";} ?> />年
                    </td>
                  </tr>
                  </tbody>
                </table>
                <p class="submit"><input type="submit" name="Submit" class="button-primary" value="変更を保存" /></p>
              </div>
            </div>
          </div>
        <dd>
        </dd>
      </dl>
      <dl id="seo">
        <dd>
          <div class="metabox-holder">
            <div class="postbox">
              <h2 class="hndle">SEO対策</h2>
              <div class="inside">
                <table class="form-table">
                  <tbody>
                  <tr>
                    <th><label for="sidebar">metaタグの挿入</label></th>
                    <td>
                      <label><input type="checkbox" name="seo[google]" value="1"<?php if(get_theme_mod('google','1')){echo " checked=\"checked\"";} ?>>Google+</label><br/>
                      <label><input type="checkbox" name="seo[facebook]" value="1"<?php if(get_theme_mod('facebook','1')){echo " checked=\"checked\"";} ?>>Facebook</label><br/>
                      <label><input type="checkbox" name="seo[twitter]" value="1"<?php if(get_theme_mod('twitter','1')){echo " checked=\"checked\"";} ?>>Twitter</label>
                    </td>
                  </tr>
                  <tr>
                    <th><label>記事の概要</label></th>
                    <td>
                    <label><input type="checkbox" name="description" value="1"<?php if(get_theme_mod('description','1')){echo " checked=\"checked\"";} ?>>投稿の抜粋記事を概要にする。</label><br/>
                    投稿の抜粋を概要にしない場合は投稿時に設定することになります。
                    </td>
                  </tr>
                  <tr>
                    <th><label for="sidebar">ソーシャルボタンの挿入</label></th>
                    <td>
                      <label><input type="checkbox" name="buttom[facebook]" class="buttom facebook" value="1"<?php if(get_theme_mod('buttom_facebook','1')){echo " checked=\"checked\"";} ?>>Facebook</label><br/>
                      <label><input type="checkbox" name="buttom[twitter]" class="buttom twitter" value="1"<?php if(get_theme_mod('buttom_twitter','1')){echo " checked=\"checked\"";} ?>>Twitter</label><br/>
                      <label><input type="checkbox" name="buttom[google]" class="buttom google" value="1"<?php if(get_theme_mod('buttom_google','1')){echo " checked=\"checked\"";} ?>>Google+</label><br/>
                      <label><input type="checkbox" name="buttom[pocket]" class="buttom pocket" value="1"<?php if(get_theme_mod('buttom_pocket','1')){echo " checked=\"checked\"";} ?>>Pocket</label><br/>
                      <label><input type="checkbox" name="buttom[line]" class="buttom line" value="1"<?php if(get_theme_mod('buttom_line','1')){echo " checked=\"checked\"";} ?>>Line</label><br/>
                      <label><input type="checkbox" name="buttom[hatena]" class="buttom hatena" value="1"<?php if(get_theme_mod('buttom_hatena','1')){echo " checked=\"checked\"";} ?>>Hatena</label>
                    </td>
                  </tr>
                  <tr>
                    <th><label for="sidebar">ソーシャルボタンのタイトル</label></th>
                    <td>
                      <input name="social_title" type="text" class="social_title" id="inputtext" value="<?php echo str_replace("@","",get_theme_mod('social_title','ソーシャルボタン')); ?>" class="regular-text"
<?php if(!get_theme_mod('buttom_facebook','1') and !get_theme_mod('buttom_twitter','1') and !get_theme_mod('buttom_google','1') and !get_theme_mod('buttom_pocket','1') and !get_theme_mod('buttom_line','1') and !get_theme_mod('buttom_hatena','1')){
echo " disabled";
}
?>
 />
                    </td>
                  </tr>
                </tbody>
                </table>
                <p class="submit"><input type="submit" name="Submit" class="button-primary" value="変更を保存" /></p>
              </div>
            </div>
          </div>
          <div class="metabox-holder">
            <div class="postbox">
              <h2 class="hndle">Google関係</h2>
              <div class="inside">
                <table class="form-table">
                  <tbody>
                  <tr>
                    <th><label>アナリティクス</label></th>
                    <td>
                      <label><input type="checkbox" class="analytics" name="analytics" value="1"<?php if(get_theme_mod('analytics','0')){echo " checked=\"checked\"";} ?>>設定する</label>
                    </td>
                  </tr>
                  <tr>
                    <th><label>アナリティクス<br/>　トラッキング ID</label></th>
                    <td>
                      <label><input name="tracking_id" class="tracking_id" type="text" id="inputtext" value="<?php echo get_theme_mod('tracking_id',''); ?>" class="regular-text"<?php if(!get_theme_mod('analytics','0')){echo " disabled";} ?> /></label>
                    </td>
                  </tr>
                </tbody>
                </table>
                <p class="submit"><input type="submit" name="Submit" class="button-primary" value="変更を保存" /></p>
              </div>
            </div>
          </div>
          <div class="metabox-holder">
            <div class="postbox">
              <h2 class="hndle">Twitter関係</h2>
              <div class="inside">
                <table class="form-table">
                  <tbody>
                  <tr>
                    <th><label>Twitter Cardsの種類</label></th>
                    <td><select name="twitter_cards">
                        <option value="summary"<?php if(get_theme_mod('twitter_cards','summary')=="summary"){echo " selected";} ?>>Summary Card</option>
                        <option value="summarysummary_large_image"<?php if(get_theme_mod('twitter_cards','summary')=="summarysummary_large_image"){echo " selected";} ?>>Summary Card witd Large Image</option>
                        <option value="photo"<?php if(get_theme_mod('twitter_cards','summary')=="photo"){echo " selected";} ?>>Photo Card</option>
                        <option value="gallery"<?php if(get_theme_mod('twitter_cards','summary')=="gallery"){echo " selected";} ?>>Gallery Card</option>
                        <option value="app"<?php if(get_theme_mod('twitter_cards','summary')=="app"){echo " selected";} ?>>App Card</option>
                        <option value="player"<?php if(get_theme_mod('twitter_cards','summary')=="player"){echo " selected";} ?>>Player Card</option>
                        <option value="product"<?php if(get_theme_mod('twitter_cards','summary')=="product"){echo " selected";} ?>>Product Card</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <th><label>Twitter アカウント名</label></th>
                    <td>@<input name="twitter_site" type="text" id="inputtext" value="<?php echo str_replace("@","",get_theme_mod('twitter_site','')); ?>" class="regular-text" /></td>
                  </tr>
                </tbody>
                </table>
                <p class="submit"><input type="submit" name="Submit" class="button-primary" value="変更を保存" /></p>
              </div>
            </div>
          </div>
        </dd>
      </dl>
    </form>
      <dl id="version">
        <dd>
          <div class="metabox-holder">
            <div class="postbox">
              <h2 class="hndle">Yymnk</h2>
              <div class="inside">
                <table class="form-table">
                  <tbody>
                  <tr>
                    <th><label for="sidebar">説明</label></th>
                    <td>
                      SEO対策をしたテーマです。プラグインなしにSEO対策ができます。その他にも目次の自動作成やソーシャルボタンの設置。Googleアナリティクスコードの挿入、フォント色の設定などができます。
                    </td>
                  </tr>
                  <tr>
                    <th><label for="sidebar">作者</label></th>
                    <td>
                      Yoshihiro Yamahara
                    </td>
                  </tr>
                  <tr>
                    <th><label for="sidebar">作者URI</label></th>
                    <td>
                      <a href="https://www.hobofoto.net/Yymnk/">https://www.hobofoto.net/Yymnk/</a>
                    </td>
                  </tr>
                  <tr>
                    <th><label for="sidebar">バージョン</label></th>
                    <td>
                      1.0
                    </td>
                  </tr>
                  <tr>
                    <th><label for="sidebar">ライセンス</label></th>
                    <td>
                      GNU General Public License
                    </td>
                  </tr>
                  <tr>
                    <th><label for="sidebar">ライセンスURI</label></th>
                    <td>
                      <a href="http://www.gnu.org/licenses/gpl-2.0.html">http://www.gnu.org/licenses/gpl-2.0.html</a>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </dd>
      </dl>
    </div>
  </div>
<?php
}

function yymnk_footer(){
  if(get_theme_mod('fancybox','1')){
?>
<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery('.fancybox').fancybox();
});
jQuery(function(){
  jQuery('.gallery-icon a').addClass('fancybox');
  for (var i = 0; i < jQuery('div.gallery').get().length; i++) {
    var idname=jQuery('div.gallery').eq(i).attr("id");
    jQuery('#'+idname+' .gallery-icon a').attr("data-fancybox-group",idname);
  }
});
</script>
<?php
  }
  if(get_theme_mod('analytics','0') and get_theme_mod('tracking_id','')){
?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo get_theme_mod('tracking_id',''); ?>', 'auto');
  ga('send', 'pageview');

</script>
<?php
  }
  if(get_theme_mod('to-top','0')){
?>
  <div id="page-top" class="page-top">
    <p><a id="move-page-top" class="move-page-top">▲</a></p>
  </div>
<?php
  }
}
add_action('wp_footer','yymnk_footer',9999);
?>