( function( $ ) {
  $('.copyright').change(function(){
    if($(this).prop( 'checked' )){
      $('.copyright_sub').prop('disabled',false);
      if($('.copyright_old_start').prop( 'checked' )){
        $('.copyright_start').prop('disabled',true);
      }else{
        $('.copyright_start').prop('disabled',false);
      }
      if($('.copyright_new_end').prop( 'checked' )){
        $('.copyright_end').prop('disabled',true);
      }else{
        $('.copyright_end').prop('disabled',false);
      }
    }else{
      $('.copyright_sub').prop('disabled',true);
    }
  });
  $('.related_entry').change(function(){
    if($(this).prop( 'checked' )){
      $('.related_entry_title').prop('disabled',false);
    }else{
      $('.related_entry_title').prop('disabled',true);
    }
  });
  $('.copyright_old_start').change(function(){
    if($(this).prop( 'checked' )){
      $('.copyright_start').prop('disabled',true);
    }else{
      $('.copyright_start').prop('disabled',false);
    }
  });
  $('.copyright_new_end').change(function(){
    if($(this).prop( 'checked' )){
      $('.copyright_end').prop('disabled',true);
    }else{
      $('.copyright_end').prop('disabled',false);
    }
  });
  $('.buttom').change(function(){
    if($('.facebook').prop( 'checked' ) || $('.twitter').prop( 'checked' ) || $('.google').prop( 'checked' ) || $('.pocket').prop( 'checked' ) || $('.line').prop( 'checked' ) || $('.hatena').prop( 'checked' )){
      $('.social_title').prop('disabled',false);
    }else{
      $('.social_title').prop('disabled',true);
    }
  });
  $('.analytics').change(function(){
    if($(this).prop( 'checked' )){
      $('.tracking_id').prop('disabled',false);
    }else{
      $('.tracking_id').prop('disabled',true);
    }
  });
  $('.sitemap').change(function(){
    if($(this).prop( 'checked' )){
      $('.changefreq').prop('disabled',false);
      $('.priority').prop('disabled',false);
    }else{
      $('.changefreq').prop('disabled',true);
      $('.priority').prop('disabled',true);
    }
  });
  $('.cache').change(function(){
    if($(this).prop( 'checked' )){
      $('.cache_time').prop('disabled',false);
      $('.cache_sidbar_a').prop('disabled',false);
      $('.cache_sidbar_b').prop('disabled',false);
    }else{
      $('.cache_time').prop('disabled',true);
      $('.cache_sidbar_a').prop('disabled',true);
      $('.cache_sidbar_b').prop('disabled',true);
    }
  });
  $('.adsense').change(function(){
    if($(this).prop( 'checked' )){
      $('.adsense_tag').prop('disabled',false);
      $('.adsense_buttom').prop('disabled',false);
      $('.adsense_nbsp').prop('disabled',false);
      $('.adsense_more').prop('disabled',false);
      $('.adsense_shortcode').prop('disabled',false);
      $('.adsense_label').prop('disabled',false);
    }else{
      $('.adsense_tag').prop('disabled',true);
      $('.adsense_buttom').prop('disabled',true);
      $('.adsense_nbsp').prop('disabled',true);
      $('.adsense_more').prop('disabled',true);
      $('.adsense_shortcode').prop('disabled',true);
      $('.adsense_label').prop('disabled',true);
    }
  });
} )( jQuery );