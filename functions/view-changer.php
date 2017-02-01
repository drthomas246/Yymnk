<?php
function yymnk_view_changer(){
  $dir=get_template_directory().'/css/display/';
  if (is_dir( $dir ) && $handle = opendir($dir)) {
    while (false !== ($file = readdir($handle))) {
      if( filetype( $path = $dir . $file ) == "file" ) {
        if(substr($path, strrpos($path, '.') + 1)=="css"){
        echo '                        <option value="'.$file.'"';
          if(get_theme_mod('view_chacker','-') ==$file){
            echo " selected";
          }
        echo ">$file</option>\n";
      }
      }
    }
  }
  return;
}

function yymnk_view_changer_upload($filename){
  $dir=get_template_directory().'/css/display/';
  $file=basename($filename );
  move_uploaded_file($filename["tmp_name"], $dir.$filename["name"]);
  return;
}