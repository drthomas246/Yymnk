<?php
function yymnk_del(){
  if(file_exists(get_home_path()."/robot.txt")){
    unlink(get_home_path()."/robot.txt");
  }
  $fileName = get_home_path()."/sitemap*.xml";
  foreach (glob($fileName) as $val) {
    unlink($val);
  }
  return;
}
add_action('admin_menu', 'yymk_add_theme_page');
function yymk_add_theme_page(){
  add_theme_page('テーマの設定', 'テーマの設定',8,'setting_by_theme','yymnk_setting');
}
function yymnk_setting(){
  if ( isset($_POST['twitter_cards']) or isset($_POST['twitter_site']) or isset($_POST['sidebar']) or isset($_POST['seo']) or isset($_POST['fancybox']) or isset($_POST['analytics']) or isset($_POST['tracking_id']) or isset($_POST['buttom']) or isset($_POST['related_entry']) or isset($_POST['social_title']) or isset($_POST['related_entry_title']) or isset($_POST['table_of_contents']) or isset($_POST['description']) or isset($_POST['prism']) or isset($_POST['copyright_auther']) or isset($_POST['copyright']) or isset($_POST['copyright_old_start']) or isset($_POST['copyright_new_end']) or isset($_POST['copyright_start']) or isset($_POST['copyright_end']) or isset($_POST['to-top']) or isset($_POST['sitemap']) or isset($_POST['changefreq']) or isset($_POST['priority']) or isset($_POST['cache_time']) or isset($_POST['cache_sidbar_a']) or isset($_POST['cache_sidbar_b']) or isset($_POST['cache']) or isset($_POST['adsense']) or isset($_POST['adsense_tag']) or isset($_POST['adsense_more']) or isset($_POST['adsense_buttom']) or isset($_POST['adsense_nbsp']) or isset($_POST['adsense_shortcode']) or isset($_POST['adsense_label']) or isset($_POST['pubsubhubbub']) or isset($_POST['lazy_load']) or isset($_POST['img_compression'])) {
    yymnk_cache_clear();
    set_theme_mod('twitter_cards', $_POST['twitter_cards']);
    set_theme_mod('adsense_label', $_POST['adsense_label']);
    set_theme_mod('adsense_tag', $_POST['adsense_tag']);
    set_theme_mod('copyright_auther', $_POST['copyright_auther']);
    set_theme_mod('copyright_end', $_POST['copyright_end']);
    set_theme_mod('copyright_start', $_POST['copyright_start']);
    set_theme_mod('twitter_site', '@'.$_POST['twitter_site']);
    set_theme_mod('sidebar', $_POST['sidebar']);
    set_theme_mod('tracking_id', $_POST['tracking_id']);
    set_theme_mod('social_title', $_POST['social_title']);
    set_theme_mod('related_entry_title', $_POST['related_entry_title']);
    $changefreq=$_POST['changefreq'];
    set_theme_mod('changefreq_hp', $changefreq[hp]);
    set_theme_mod('changefreq_post', $changefreq[post]);
    set_theme_mod('changefreq_page', $changefreq[page]);
    set_theme_mod('changefreq_archive', $changefreq[archive]);
    set_theme_mod('changefreq_category', $changefreq[category]);
    $priority=$_POST['priority'];
    set_theme_mod('priority_hp',$priority[hp] );
    set_theme_mod('priority_post',$priority[post] );
    set_theme_mod('priority_page',$priority[page] );
    set_theme_mod('priority_archive', $priority[archive]);
    set_theme_mod('priority_category',$priority[category] );
    set_theme_mod('cache_time', $_POST['cache_time']);
    if($_POST['img_compression']){
      set_theme_mod('img_compression', $_POST['lazy_load']);
    }else{
      set_theme_mod('img_compression', '0');
    }
    if($_POST['lazy_load']){
      set_theme_mod('lazy_load', $_POST['lazy_load']);
    }else{
      set_theme_mod('lazy_load', '0');
    }
    if($_POST['pubsubhubbub']){
      set_theme_mod('pubsubhubbub', $_POST['pubsubhubbub']);
    }else{
      set_theme_mod('pubsubhubbub', '0');
    }
    if($_POST['adsense']){
      set_theme_mod('adsense', $_POST['adsense']);
    }else{
      set_theme_mod('adsense', '0');
    }
    if($_POST['adsense_more']){
      set_theme_mod('adsense_more', $_POST['adsense_more']);
    }else{
      set_theme_mod('adsense_more', '0');
    }
    if($_POST['adsense_shortcode']){
      set_theme_mod('adsense_shortcode', $_POST['adsense_shortcode']);
    }else{
      set_theme_mod('adsense_shortcode', '0');
    }
    if($_POST['adsense_buttom']){
      set_theme_mod('adsense_buttom', $_POST['adsense_buttom']);
    }else{
      set_theme_mod('adsense_buttom', '0');
    }
    if($_POST['adsense_nbsp']){
      set_theme_mod('adsense_nbsp', $_POST['adsense_nbsp']);
    }else{
      set_theme_mod('adsense_nbsp', '0');
    }
    if($_POST['cache_sidbar_a']){
      set_theme_mod('cache_sidbar_a', $_POST['cache_sidbar_a']);
    }else{
      set_theme_mod('cache_sidbar_a', '0');
    }
    if($_POST['cache_sidbar_b']){
      set_theme_mod('cache_sidbar_b', $_POST['cache_sidbar_b']);
    }else{
      set_theme_mod('cache_sidbar_b', '0');
    }
    if($_POST['analytics']){
      set_theme_mod('analytics', $_POST['analytics']);
    }else{
      set_theme_mod('analytics', '0');
    }
    if($_POST['cache']){
      set_theme_mod('cache', $_POST['cache']);
    }else{
      set_theme_mod('cache', '0');
    }
    if($_POST['sitemap']){
      set_theme_mod('sitemap', $_POST['sitemap']);
      yymnk_sitemap($post_ID);
    }else{
      set_theme_mod('sitemap', '0');
      yymnk_del();
    }
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
      <li><a href="#crawler">クローラー対策</a></li>
      <li><a href="#cache">キャッシュ</a></li>
      <li><a href="#adsense">アドセンス</a></li>
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
                    <label><input type="checkbox" name="fancybox" value="1"<?php if(get_theme_mod('fancybox','1')){echo " checked=\"checked\"";} ?>>ギャラリーにfancyBox(画像が拡大する)を付ける</label><br/>
                    （[ギャラリーの編集]の[ギャラリーの設定]にある[リンク先]を[メディアファイル]にしてください）
                    </td>
                  </tr>
                  <tr>
                    <th><label>Lazy Load</label></th>
                    <td>
                    <label><input type="checkbox" name="lazy_load" value="1"<?php if(get_theme_mod('lazy_load','0')){echo " checked=\"checked\"";} ?>>ギャラリーをLazy Load(遅延読み込み)する</label>
                    </td>
                  </tr>
                  <tr>
                    <th><label>Prism</label></th>
                    <td>
                    <label><input type="checkbox" name="prism" value="1"<?php if(get_theme_mod('prism','1')){echo " checked=\"checked\"";} ?>>Prismで&lt;pre&gt;&lt;code&gt;～&lt;/code&gt;&lt;/pre&gt;間をシンタックスハイライトをする</label>
                    </td>
                  </tr>
                  <tr>
                    <th><label>トップに戻るボタン</label></th>
                    <td>
                    <label><input type="checkbox" name="to-top" value="1"<?php if(get_theme_mod('to-top','0')){echo " checked=\"checked\"";} ?>>表示する</label>
                    </td>
                  </tr>
                  <tr>
                    <th><label>関連項目を表示</label></th>
                    <td>
                    <label><input type="checkbox" name="related_entry" class="related_entry" value="1"<?php if(get_theme_mod('related_entry','1')){echo " checked=\"checked\"";} ?>>表示する</label>
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
        <dd>
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
      <dl id="crawler">
        <dd>
          <div class="metabox-holder">
            <div class="postbox">
              <h2 class="hndle">クローラー対策</h2>
              <div class="inside">
                <table class="form-table">
                  <tbody>
                  <tr>
                    <th><label>sitemap.xmlの設置</label></th>
                    <td>
                      <label><input type="checkbox" class="sitemap" name="sitemap" value="1"<?php if(get_theme_mod('sitemap','0')){echo " checked=\"checked\"";} ?>>設置する</label>
                    </td>
                  </tr>
                  <tr>
                    <th><label>PubSubHubbubの実行</label></th>
                    <td>
                      <label><input type="checkbox" class="PubSubHubbub" name="pubsubhubbub" value="1"<?php if(get_theme_mod('pubsubhubbub','0')){echo " checked=\"checked\"";} ?>>実行する</label>
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
              <h2 class="hndle">sitemap,xml設定</h2>
              <div class="inside">
                <table class="form-table">
                  <tbody>
                  <tr>
                    <th><label>更新頻度の設定</label></th>
                    <td>
                      <select name="changefreq[hp]" class="changefreq"<?php if(!get_theme_mod('sitemap','0')){echo " disabled";} ?>>
                        <option value="always"<?php if(get_theme_mod('changefreq_hp','daily')=="always"){echo " selected";} ?>>常時 </option>
                        <option value="hourly"<?php if(get_theme_mod('changefreq_hp','daily')=="hourly"){echo " selected";} ?>>毎時</option>
                        <option value="daily"<?php if(get_theme_mod('changefreq_hp','daily')=="daily"){echo " selected";} ?>>毎日</option>
                        <option value="weekly"<?php if(get_theme_mod('changefreq_hp','daily')=="weekly"){echo " selected";} ?>>毎週</option>
                        <option value="monthly"<?php if(get_theme_mod('changefreq_hp','daily')=="monthly"){echo " selected";} ?>>毎月</option>
                        <option value="yearly"<?php if(get_theme_mod('changefreq_hp','daily')=="yearly"){echo " selected";} ?>>毎年</option>
                        <option value="never"<?php if(get_theme_mod('changefreq_hp','daily')=="never"){echo " selected";} ?>>更新なし</option>
                      </select>
                      <label>ホームページ</label><br/>
                      <select name="changefreq[post]" class="changefreq"<?php if(!get_theme_mod('sitemap','0')){echo " disabled";} ?>>
                        <option value="always"<?php if(get_theme_mod('changefreq_post','monthly')=="always"){echo " selected";} ?>>常時 </option>
                        <option value="hourly"<?php if(get_theme_mod('changefreq_post','monthly')=="hourly"){echo " selected";} ?>>毎時</option>
                        <option value="daily"<?php if(get_theme_mod('changefreq_post','monthly')=="daily"){echo " selected";} ?>>毎日</option>
                        <option value="weekly"<?php if(get_theme_mod('changefreq_post','monthly')=="weekly"){echo " selected";} ?>>毎週</option>
                        <option value="monthly"<?php if(get_theme_mod('changefreq_post','monthly')=="monthly"){echo " selected";} ?>>毎月</option>
                        <option value="yearly"<?php if(get_theme_mod('changefreq_post','monthly')=="yearly"){echo " selected";} ?>>毎年</option>
                        <option value="never"<?php if(get_theme_mod('changefreq_post','monthly')=="never"){echo " selected";} ?>>更新なし</option>
                      </select>
                      <label>投稿</label><br/>
                      <select name="changefreq[page]" class="changefreq"<?php if(!get_theme_mod('sitemap','0')){echo " disabled";} ?>>
                        <option value="always"<?php if(get_theme_mod('changefreq_page','weekly')=="always"){echo " selected";} ?>>常時 </option>
                        <option value="hourly"<?php if(get_theme_mod('changefreq_page','weekly')=="hourly"){echo " selected";} ?>>毎時</option>
                        <option value="daily"<?php if(get_theme_mod('changefreq_page','weekly')=="daily"){echo " selected";} ?>>毎日</option>
                        <option value="weekly"<?php if(get_theme_mod('changefreq_page','weekly')=="weekly"){echo " selected";} ?>>毎週</option>
                        <option value="monthly"<?php if(get_theme_mod('changefreq_page','weekly')=="monthly"){echo " selected";} ?>>毎月</option>
                        <option value="yearly"<?php if(get_theme_mod('changefreq_page','weekly')=="yearly"){echo " selected";} ?>>毎年</option>
                        <option value="never"<?php if(get_theme_mod('changefreq_page','weekly')=="never"){echo " selected";} ?>>更新なし</option>
                      </select>
                      <label>固定ページ</label><br/>
                      <select name="changefreq[archive]" class="changefreq"<?php if(!get_theme_mod('sitemap','0')){echo " disabled";} ?>>
                        <option value="always"<?php if(get_theme_mod('changefreq_archive','weekly')=="always"){echo " selected";} ?>>常時 </option>
                        <option value="hourly"<?php if(get_theme_mod('changefreq_archive','weekly')=="hourly"){echo " selected";} ?>>毎時</option>
                        <option value="daily"<?php if(get_theme_mod('changefreq_archive','weekly')=="daily"){echo " selected";} ?>>毎日</option>
                        <option value="weekly"<?php if(get_theme_mod('changefreq_archive','weekly')=="weekly"){echo " selected";} ?>>毎週</option>
                        <option value="monthly"<?php if(get_theme_mod('changefreq_archive','weekly')=="monthly"){echo " selected";} ?>>毎月</option>
                        <option value="yearly"<?php if(get_theme_mod('changefreq_archive','weekly')=="yearly"){echo " selected";} ?>>毎年</option>
                        <option value="never"<?php if(get_theme_mod('changefreq_archive','weekly')=="never"){echo " selected";} ?>>更新なし</option>
                      </select>
                      <label>月別アーカイブページ</label><br/>
                      <select name="changefreq[category]" class="changefreq"<?php if(!get_theme_mod('sitemap','0')){echo " disabled";} ?>>
                        <option value="always"<?php if(get_theme_mod('changefreq_category','weekly')=="always"){echo " selected";} ?>>常時 </option>
                        <option value="hourly"<?php if(get_theme_mod('changefreq_category','weekly')=="hourly"){echo " selected";} ?>>毎時</option>
                        <option value="daily"<?php if(get_theme_mod('changefreq_category','weekly')=="daily"){echo " selected";} ?>>毎日</option>
                        <option value="weekly"<?php if(get_theme_mod('changefreq_category','weekly')=="weekly"){echo " selected";} ?>>毎週</option>
                        <option value="monthly"<?php if(get_theme_mod('changefreq_category','weekly')=="monthly"){echo " selected";} ?>>毎月</option>
                        <option value="yearly"<?php if(get_theme_mod('changefreq_category','weekly')=="yearly"){echo " selected";} ?>>毎年</option>
                        <option value="never"<?php if(get_theme_mod('changefreq_category','weekly')=="never"){echo " selected";} ?>>更新なし</option>
                      </select>
                      <label>カテゴリーページ</label>
                    </td>
                  </tr>
                  <tr>
                    <th><label>優先順位の設定</label></th>
                    <td>
                      <select name="priority[hp]" class="priority"<?php if(!get_theme_mod('sitemap','0')){echo " disabled";} ?>>
                        <option value="0.0"<?php if(get_theme_mod('priority_hp','1.0')=="0.0"){echo " selected";} ?>>0.0 </option>
                        <option value="0.1"<?php if(get_theme_mod('priority_hp','1.0')=="0.1"){echo " selected";} ?>>0.1</option>
                        <option value="0.2"<?php if(get_theme_mod('priority_hp','1.0')=="0.2"){echo " selected";} ?>>0.2</option>
                        <option value="0.3"<?php if(get_theme_mod('priority_hp','1.0')=="0.3"){echo " selected";} ?>>0.3</option>
                        <option value="0.4"<?php if(get_theme_mod('priority_hp','1.0')=="0.4"){echo " selected";} ?>>0.4</option>
                        <option value="0.5"<?php if(get_theme_mod('priority_hp','1.0')=="0.5"){echo " selected";} ?>>0.5</option>
                        <option value="0.6"<?php if(get_theme_mod('priority_hp','1.0')=="0.6"){echo " selected";} ?>>0.6</option>
                        <option value="0.7"<?php if(get_theme_mod('priority_hp','1.0')=="0.7"){echo " selected";} ?>>0.7</option>
                        <option value="0.8"<?php if(get_theme_mod('priority_hp','1.0')=="0.8"){echo " selected";} ?>>0.8</option>
                        <option value="0.9"<?php if(get_theme_mod('priority_hp','1.0')=="0.9"){echo " selected";} ?>>0.9</option>
                        <option value="1.0"<?php if(get_theme_mod('priority_hp','1.0')=="1.0"){echo " selected";} ?>>1.0</option>
                      </select>
                      <label>ホームページ</label><br/>
                      <select name="priority[post]" class="priority"<?php if(!get_theme_mod('sitemap','0')){echo " disabled";} ?>>
                        <option value="0.0"<?php if(get_theme_mod('priority_post','0.6')=="0.0"){echo " selected";} ?>>0.0 </option>
                        <option value="0.1"<?php if(get_theme_mod('priority_post','0.6')=="0.1"){echo " selected";} ?>>0.1</option>
                        <option value="0.2"<?php if(get_theme_mod('priority_post','0.6')=="0.2"){echo " selected";} ?>>0.2</option>
                        <option value="0.3"<?php if(get_theme_mod('priority_post','0.6')=="0.3"){echo " selected";} ?>>0.3</option>
                        <option value="0.4"<?php if(get_theme_mod('priority_post','0.6')=="0.4"){echo " selected";} ?>>0.4</option>
                        <option value="0.5"<?php if(get_theme_mod('priority_post','0.6')=="0.5"){echo " selected";} ?>>0.5</option>
                        <option value="0.6"<?php if(get_theme_mod('priority_post','0.6')=="0.6"){echo " selected";} ?>>0.6</option>
                        <option value="0.7"<?php if(get_theme_mod('priority_post','0.6')=="0.7"){echo " selected";} ?>>0.7</option>
                        <option value="0.8"<?php if(get_theme_mod('priority_postp','0.6')=="0.8"){echo " selected";} ?>>0.8</option>
                        <option value="0.9"<?php if(get_theme_mod('priority_post','0.6')=="0.9"){echo " selected";} ?>>0.9</option>
                        <option value="1.0"<?php if(get_theme_mod('priority_post','0.6')=="1.0"){echo " selected";} ?>>1.0</option>
                      </select>
                      <label>投稿</label><br/>
                      <select name="priority[page]" class="priority"<?php if(!get_theme_mod('sitemap','0')){echo " disabled";} ?>>
                        <option value="0.0"<?php if(get_theme_mod('priority_page','0.6')=="0.0"){echo " selected";} ?>>0.0 </option>
                        <option value="0.1"<?php if(get_theme_mod('priority_page','0.6')=="0.1"){echo " selected";} ?>>0.1</option>
                        <option value="0.2"<?php if(get_theme_mod('priority_page','0.6')=="0.2"){echo " selected";} ?>>0.2</option>
                        <option value="0.3"<?php if(get_theme_mod('priority_page','0.6')=="0.3"){echo " selected";} ?>>0.3</option>
                        <option value="0.4"<?php if(get_theme_mod('priority_page','0.6')=="0.4"){echo " selected";} ?>>0.4</option>
                        <option value="0.5"<?php if(get_theme_mod('priority_page','0.6')=="0.5"){echo " selected";} ?>>0.5</option>
                        <option value="0.6"<?php if(get_theme_mod('priority_page','0.6')=="0.6"){echo " selected";} ?>>0.6</option>
                        <option value="0.7"<?php if(get_theme_mod('priority_page','0.6')=="0.7"){echo " selected";} ?>>0.7</option>
                        <option value="0.8"<?php if(get_theme_mod('priority_page','0.6')=="0.8"){echo " selected";} ?>>0.8</option>
                        <option value="0.9"<?php if(get_theme_mod('priority_page','0.6')=="0.9"){echo " selected";} ?>>0.9</option>
                        <option value="1.0"<?php if(get_theme_mod('priority_page','0.6')=="1.0"){echo " selected";} ?>>1.0</option>
                      </select>
                      <label>固定ページ</label><br/>
                      <select name="priority[archive]" class="priority"<?php if(!get_theme_mod('sitemap','0')){echo " disabled";} ?>>
                        <option value="0.0"<?php if(get_theme_mod('priority_archive','0.3')=="0.0"){echo " selected";} ?>>0.0 </option>
                        <option value="0.1"<?php if(get_theme_mod('priority_archive','0.3')=="0.1"){echo " selected";} ?>>0.1</option>
                        <option value="0.2"<?php if(get_theme_mod('priority_archive','0.3')=="0.2"){echo " selected";} ?>>0.2</option>
                        <option value="0.3"<?php if(get_theme_mod('priority_archive','0.3')=="0.3"){echo " selected";} ?>>0.3</option>
                        <option value="0.4"<?php if(get_theme_mod('priority_archive','0.3')=="0.4"){echo " selected";} ?>>0.4</option>
                        <option value="0.5"<?php if(get_theme_mod('priority_archive','0.3')=="0.5"){echo " selected";} ?>>0.5</option>
                        <option value="0.6"<?php if(get_theme_mod('priority_archive','0.3')=="0.6"){echo " selected";} ?>>0.6</option>
                        <option value="0.7"<?php if(get_theme_mod('priority_archive','0.3')=="0.7"){echo " selected";} ?>>0.7</option>
                        <option value="0.8"<?php if(get_theme_mod('priority_archive','0.3')=="0.8"){echo " selected";} ?>>0.8</option>
                        <option value="0.9"<?php if(get_theme_mod('priority_archive','0.3')=="0.9"){echo " selected";} ?>>0.9</option>
                        <option value="1.0"<?php if(get_theme_mod('priority_archive','0.3')=="1.0"){echo " selected";} ?>>1.0</option>
                      </select>
                      <label>月別アーカイブページ</label><br/>
                      <select name="priority[category]" class="priority"<?php if(!get_theme_mod('sitemap','0')){echo " disabled";} ?>>
                        <option value="0.0"<?php if(get_theme_mod('priority_category','0.3')=="0.0"){echo " selected";} ?>>0.0 </option>
                        <option value="0.1"<?php if(get_theme_mod('priority_category','0.3')=="0.1"){echo " selected";} ?>>0.1</option>
                        <option value="0.2"<?php if(get_theme_mod('priority_category','0.3')=="0.2"){echo " selected";} ?>>0.2</option>
                        <option value="0.3"<?php if(get_theme_mod('priority_category','0.3')=="0.3"){echo " selected";} ?>>0.3</option>
                        <option value="0.4"<?php if(get_theme_mod('priority_category','0.3')=="0.4"){echo " selected";} ?>>0.4</option>
                        <option value="0.5"<?php if(get_theme_mod('priority_category','0.3')=="0.5"){echo " selected";} ?>>0.5</option>
                        <option value="0.6"<?php if(get_theme_mod('priority_category','0.3')=="0.6"){echo " selected";} ?>>0.6</option>
                        <option value="0.7"<?php if(get_theme_mod('priority_category','0.3')=="0.7"){echo " selected";} ?>>0.7</option>
                        <option value="0.8"<?php if(get_theme_mod('priority_category','0.3')=="0.8"){echo " selected";} ?>>0.8</option>
                        <option value="0.9"<?php if(get_theme_mod('priority_category','0.3')=="0.9"){echo " selected";} ?>>0.9</option>
                        <option value="1.0"<?php if(get_theme_mod('priority_category','0.3')=="1.0"){echo " selected";} ?>>1.0</option>
                      </select>
                      <label>カテゴリーページ</label>
                    </td>
                </tbody>
                </table>
                <p class="submit"><input type="submit" name="Submit" class="button-primary" value="変更を保存" /></p>
              </div>
            </div>
          </div>
        </dd>
      </dl>
      <dl id="cache">
        <dd>
          <div class="metabox-holder">
            <div class="postbox">
              <h2 class="hndle">キャッシュ</h2>
              <div class="inside">
                <table class="form-table">
                  <tbody>
                  <tr>
                    <th><label>サイトをキャッシュ</label></th>
                    <td>
                    <label><input type="checkbox" class="cache" name="cache" value="1"<?php if(get_theme_mod('cache','0')){echo " checked=\"checked\"";} ?>>設定する</label>
                    </td>
                  </tr>
                  <tr>
                    <th><label>キャッシュ時間</label></th>
                    <td>
                      <select name="cache_time" class="cache_time"<?php if(!get_theme_mod('cache','0')){echo " disabled";} ?>>
                        <option value="day"<?php if(get_theme_mod('cache_time','week')=="day"){echo " selected";} ?>>１日 </option>
                        <option value="week"<?php if(get_theme_mod('cache_time','week')=="week"){echo " selected";} ?>>１週間</option>
                        <option value="month"<?php if(get_theme_mod('cache_time','week')=="month"){echo " selected";} ?>>1ヶ月</option>
                        <option value="year"<?php if(get_theme_mod('cache_time','week')=="year"){echo " selected";} ?>>１年</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                  <th><label>サイドバーα</label></th>
                    <td>
                    <label><input type="checkbox" class="cache_sidbar_a" name="cache_sidbar_a" value="1"<?php if(get_theme_mod('cache_sidbar_a','0')){echo " checked=\"checked\"";} ?><?php if(!get_theme_mod('cache','0')){echo " disabled";} ?>>キャッシュする</label>
                  </tr>
                  <tr>
                  <th><label>サイドバーβ</label></th>
                    <td>
                    <label><input type="checkbox" class="cache_sidbar_b" name="cache_sidbar_b" value="1"<?php if(get_theme_mod('cache_sidbar_b','0')){echo " checked=\"checked\"";} ?><?php if(!get_theme_mod('cache','0')){echo " disabled";} ?>>キャッシュする</label>
                  </tr>
                  <tr>
                  <th><label>メディアの圧縮</label></th>
                    <td>
                    <label><input type="checkbox" class="img_compression" name="img_compression" value="1"<?php if(get_theme_mod('img_compression','1')){echo " checked=\"checked\"";} ?>>jpg画像とpng画像をアップロードするときにファイルを圧縮する</label>
                  </tr>
                </tbody>
                </table>
                <p class="submit"><input type="submit" name="Submit" class="button-primary" value="変更を保存" /></p>
              </div>
            </div>
          </div>
        </dd>
      </dl>
      <dl id="adsense">
        <dd>
          <div class="metabox-holder">
            <div class="postbox">
              <h2 class="hndle">アドセンス</h2>
              <div class="inside">
                <table class="form-table">
                  <tbody>
                  <tr>
                    <th><label>アドセンスを設定</label></th>
                    <td>
                    <label><input type="checkbox" class="adsense" name="adsense" value="1"<?php if(get_theme_mod('adsense','0')){echo " checked=\"checked\"";} ?>>設定する</label>
                    </td>
                  </tr>
                  <tr>
                    <th><label>ラベルの設定</label></th>
                    <td>
                    <label><input type="radio" name="adsense_label" class="adsense_label" value="none"<?php if(get_theme_mod('adsense_label','none')=="none"){echo " checked=\"checked\"";} ?><?php if(!get_theme_mod('adsense','0')){echo " disabled";} ?>>なし</label><br/>
                    <label><input type="radio" name="adsense_label" class="adsense_label" value="sponsor"<?php if(get_theme_mod('adsense_label','none')=="sponsor"){echo " checked=\"checked\"";} ?><?php if(!get_theme_mod('adsense','0')){echo " disabled";} ?>>「スポンサーリンク」と表示</label><br/>
                    <label><input type="radio" name="adsense_label" class="adsense_label" value="ad"<?php if(get_theme_mod('adsense_label','none')=="ad"){echo " checked=\"checked\"";} ?><?php if(!get_theme_mod('adsense','0')){echo " disabled";} ?>>「広告」と表示</label><br/>
                    </td>
                  </tr>
                  <tr>
                    <th><label>アドセンスの広告コード</label></th>
                    <td>
                    <label><textarea class="adsense_tag" name="adsense_tag" cols="40" rows="4" placeholder="アドセンスの広告コードを挿入してください
できるだけレスポンシブルのものがいいです"<?php if(!get_theme_mod('adsense','0')){echo " disabled";} ?>><?php echo stripslashes(get_theme_mod('adsense_tag','')); ?></textarea></label>
                    </td>
                  </tr>
                  <tr>
                    <th><label>挿入場所</label></th>
                    <td>
                    <label><input type="checkbox" class="adsense_buttom" name="adsense_buttom" value="1"<?php if(get_theme_mod('adsense_buttom','0')){echo " checked=\"checked\"";} ?><?php if(!get_theme_mod('adsense','0')){echo " disabled";} ?>>本文の一番下</label><br/>
                    <label><input type="checkbox" class="adsense_more" name="adsense_more" value="1"<?php if(get_theme_mod('adsense_more','0')){echo " checked=\"checked\"";} ?><?php if(!get_theme_mod('adsense','0')){echo " disabled";} ?>>moreタグの部分</label><br/>
                    <label><input type="checkbox" class="adsense_nbsp" name="adsense_nbsp" value="1"<?php if(get_theme_mod('adsense_nbsp','0')){echo " checked=\"checked\"";} ?><?php if(!get_theme_mod('adsense','0')){echo " disabled";} ?>>&lt;p&gt;&amp;nbsp;&lt;/p&gt;の部分(ビジュアルエディタでの改行)</label><br/>
                    <label><input type="checkbox" class="adsense_shortcode" name="adsense_shortcode" value="1"<?php if(get_theme_mod('adsense_shortcode','0')){echo " checked=\"checked\"";} ?><?php if(!get_theme_mod('adsense','0')){echo " disabled";} ?>>ショートコード[adsense]を使う</label>
                    </td>
                  </tr>
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
                      1.8
                    </td>
                  </tr>
                  <tr>
                    <th><label for="sidebar">ライセンス</label></th>
                    <td>
                      GNU General Public License Version 3
                    </td>
                  </tr>
                  <tr>
                    <th><label for="sidebar">ライセンスURI</label></th>
                    <td>
                      <a href="https://www.gnu.org/licenses/gpl.html">https://www.gnu.org/licenses/gpl.html</a>
                    </td>
                  </tr>
                  <tr>
                    <th><label for="sidebar">Following third-party resources</label></th>
                    <td><p>php-publisher : Josh Fraser<br/>
                    This software includes the work that is distributed in the Apache License 2.0.</p>
                    <p>fancyBox : Janis Skarnelis<br/>
                    Creative Commons Attribution-NonCommercial 3.0 license.</p>
                    <p>Prism : Lea Verou, Golmote<br/>
                    MIT license</p>
                    <p>Lazy Load Plugin for jQuery : Mika Tuupola<br/>
                    MIT license</p>
                    <p>jpegtran : Thomas G. Lane, Guido Vollbeding<br/>
                    This software is based in part on the work of the Independent JPEG Group.</p>
                    <p>pngquant : Jef Poskanzer and Greg Roelofs<br/>
                    GNU General Public License Version 3</p>
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
  if(get_theme_mod('lazy_load','0')){
?>
<script type="text/javascript">
  jQuery('.lazy').lazyload({
        effect : 'fadeIn',
        effect_speed: 2000
    });
</script>
<?php
}
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