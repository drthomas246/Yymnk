<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebPage">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width,minimum-scale=1">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="wordpress">
      <header>
<?php
  if(get_header_image()){
?>
<img src="<?php echo get_header_image(); ?>">
<?php
}else{
?>
        <div id="title">
          <h1><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></h1>
          <p><?php bloginfo('description'); ?></p>
        </div>
<?php
}
?>
        <nav>
          <?php wp_nav_menu( array ( 'theme_location' => 'header-navi','container_id'=>'cssmenu','depth'=>3) ); ?>
        </nav>
      </header>