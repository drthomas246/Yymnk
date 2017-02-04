<?php
function yymnk_footer_mokuji(){
  if(get_theme_mod('table_of_contents','0')){
?>
<script type="text/javascript">jQuery(function(){var e=1,t="",o=0;jQuery("#content_text :header",this).each(function(){this.id="toc_"+e,e++;var r=0;for("h2"==this.nodeName.toLowerCase()?r=1:"h3"==this.nodeName.toLowerCase()?r=2:"h4"==this.nodeName.toLowerCase()?r=3:"h5"==this.nodeName.toLowerCase()?r=4:"h6"==this.nodeName.toLowerCase()&&(r=5);r>o;)t+="<ul>",o++;for(;o>r;)t+="</ul>",o--;t+='<li><a href="#'+this.id+'">'+jQuery(this).html()+"</a></li>\n"}),t&&(t='<div class="mokuji_wrap"><div class="mokuji">【目次】</div>'+t+"</div>"),jQuery("#toc").html(t),jQuery("a[href^=#]").click(function(){var e=1e3,t=jQuery(this).attr("href"),o=jQuery("#"==t||""==t?"html":t),r=o.offset().top;return jQuery("html, body").animate({scrollTop:r},e,"swing"),!1})});</script>
<?php
  }
}
add_action('wp_footer','yymnk_footer_mokuji',10);