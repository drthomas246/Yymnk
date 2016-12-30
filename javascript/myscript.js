jQuery(function(){
  jQuery('nav>div>ul>li').hover(function(){
    jQuery("ul:not(:animated)", this).slideDown();
  }, function(){
    jQuery("ul",this).slideUp();
  });
});
