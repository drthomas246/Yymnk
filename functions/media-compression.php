<?php
add_filter( "wp_generate_attachment_metadata" , "yymnk_img_meta",10 ,2);
function yymnk_img_meta($metadata, $imgID){
  if(get_theme_mod('img_compression','1')){
    $imgPath = get_attached_file( $imgID );
    $mime_type = get_post_mime_type( $imgID );
    $binary_path=yymnk_binary_path($mime_type);
    yymnk_img_compression($imgPath,$mime_type,$binary_path);
    foreach ( $metadata['sizes'] as $akey => $aval) {
      $sub_imgPath = dirname($imgPath).'/'.$aval[ 'file' ];
      if ($mime_type=='image/gif'){
        $sub_imgPath=gif_to_png($sub_imgPath);
      }
      yymnk_img_compression($sub_imgPath,$mime_type,$binary_path);
      if ($mime_type=='image/gif'){
        $sub_imgPath=png_to_gif($sub_imgPath);
      }
    }
  }
  return $metadata ;
}

function yymnk_img_compression($imgPath,$mime_type,$binary_path){

  switch ( $mime_type ) {
    case 'image/jpeg':
      $cmd="$binary_path -copy none -optimize -outfile ".$imgPath." ".$imgPath;
      exec($cmd);
      break;
    case 'image/png':
      $cmd="$binary_path --ext .png --force ".$imgPath;
      exec($cmd);
      break;
  }
}

function yymnk_binary_path($mime_type){
  define( 'BINARY_PATH',get_template_directory().'/binary/');
  if (PHP_OS == 'WINNT') {
    $jpegtran_src = BINARY_PATH . 'jpegtran.exe';
    $pngquant_src = BINARY_PATH . 'pngquant.exe';
  }
  if (PHP_OS == 'Darwin') {
    $jpegtran_src = BINARY_PATH . 'jpegtran-mac';
    $pngquant_src = BINARY_PATH . 'pngquant-mac';
  }
  if (PHP_OS == 'SunOS') {
    $jpegtran_src = BINARY_PATH . 'jpegtran-sol';
    $pngquant_src = BINARY_PATH . 'pngquant-sol';
  }
  if (PHP_OS == 'FreeBSD') {
    $jpegtran_src = BINARY_PATH . 'jpegtran-fbsd';
    $pngquant_src = BINARY_PATH . 'pngquant-fbsd';
  }
  if (PHP_OS == 'Linux') {
    $jpegtran_src = BINARY_PATH . 'jpegtran-linux';
    $pngquant_src = BINARY_PATH . 'pngquant-linux';
  }
    switch ( $mime_type ) {
    case 'image/jpeg':
      return $jpegtran_src;
      break;
    case 'image/png':
      return $pngquant_src;
      break;
  }
}