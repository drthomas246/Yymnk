<?php
function yoshi_footer_mokuji(){
  if(get_theme_mod('table_of_contents','0')){
?>
<script type="text/javascript">
jQuery(function() {
  var idcount = 1;
  var toc = '';
  var currentlevel = 0;
  jQuery("#content_text :header",this).each(function(){

    this.id = "toc_" + idcount;
    idcount++;
    var level = 0;
    if(this.nodeName.toLowerCase() == "h2") {
      level = 1;
    } else if(this.nodeName.toLowerCase() == "h3") {
      level = 2;
    } else if(this.nodeName.toLowerCase() == "h4") {
      level = 3;
    } else if(this.nodeName.toLowerCase() == "h5") {
      level = 4;
    } else if(this.nodeName.toLowerCase() == "h6") {
      level = 5;
    }
    while(currentlevel < level) {
      toc += "<ul>";
      currentlevel++;
    }
    while(currentlevel > level) {
      toc += "<\/ul>";
      currentlevel--;
    }
    toc += '<li><a href="#' + this.id + '">' + jQuery(this).html() + "<\/a><\/li>\n";
  });
  if(toc){ toc = '<div class="mokuji_wrap"><div class="mokuji">【目次】<\/div>' + toc + '<\/div>'; }
  jQuery("#toc").html(toc);

  //ページ内リンク#非表示。加速スクロール
  jQuery('a[href^=#]').click(function(){
    var   speed = 1000,
        href= jQuery(this).attr("href"),
        target = jQuery(href == "#" || href == "" ? 'html' : href),
        position = target.offset().top;
    jQuery("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
});
</script>
<?php
  }
}
add_action('wp_footer','yoshi_footer_mokuji');