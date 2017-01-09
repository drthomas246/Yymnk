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
} )( jQuery );