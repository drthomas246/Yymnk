<?php
function yymnk_copyright(){
  if(get_theme_mod('copyright','1')){
    $lastpost = get_lastpostdate( 'blog' );
    if(get_theme_mod( 'copyright_new_end','1' )){
      $lastyear = explode("-", $lastpost);
      $last_year=$lastyear[0];
    }else{
      $last_year=get_theme_mod( 'copyright_end',date('Y') );
    }
    if(get_theme_mod( 'copyright_old_start','1')){
       $found_posts = get_posts(  array("order" =>"ASC", "numberposts"=>1) ); 
      foreach ( $found_posts as $child ) {
        $start_year=get_the_date( "Y",$child  );
      }
    }else{
      $start_year=get_theme_mod( 'copyright_start',date('Y') );
    }
    if($start_year==$last_year){
      $year=$last_year;
    }elseif($start_year>$last_year){
      $year=$last_year;
    }else{
      $year=$start_year."-".$last_year;
    }
?>
        CopyRight <?php echo get_theme_mod('copyright_auther',get_bloginfo('name'))." ".$year; ?>
<?php
  }
}