( function( $ ) {
  $( function(){
  var syncerTimeout = null ;
  if( syncerTimeout == null ){
    syncerTimeout = setTimeout( function(){
      var result = $( '#page-top' ).is(':hidden') ;
      if( result == true ){
        $( window ).scroll(function(){
          if($(this).scrollTop() >= 200) {
            $( '#page-top' ).fadeIn( 'slow' ) ;
          }else{
            $( '#page-top' ).fadeOut( 'slow' ) ;
          }
        }) ;
      }
    syncerTimeout = null ;
    } , 1000 ) ;
  }
  $( '#move-page-top' ).click(
    function()
    {
      // [id:move-page-top]���N���b�N������N���鏈��
      $( 'html,body' ).animate( {scrollTop:0} , 'slow' ) ;
    }
  ) ;
  } ) ;
} )( jQuery );