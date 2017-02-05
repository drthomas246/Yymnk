<?php get_header(); ?>
  <div id="main">
<?php
if(get_theme_mod('sidebar','none')=="right-right"){
    get_sidebar('beta');
  }elseif(get_theme_mod('sidebar','none')!="none"){
     get_sidebar('alpha');
  }
?>
    <div id='article'>
    <?php breadcrumb(); ?>
      <div class='navigation'>
        <ul>
          <li><?php next_posts_link('&laquo; 前へ'); ?></li>
          <li><?php previous_posts_link('次へ &raquo;'); ?></li>
        </ul>
      </div>
    <?php get_template_part( 'loop', 'index' ); ?>
<?php
  if ( $wp_query -> max_num_pages > 1 ) :
?>
      <div class='navigation'>
        <ul>
          <li><?php next_posts_link('&laquo; 前へ'); ?></li>
          <li><?php previous_posts_link('次へ &raquo;'); ?></li>
        </ul>
      </div>
<?php 
  endif;
?>
    </div>
<?php
  if(get_theme_mod('sidebar','none')=="right-right"){
    get_sidebar('alpha');
  }elseif(get_theme_mod('sidebar','none')!="none" and get_theme_mod('sidebar','none')!="right" and get_theme_mod('sidebar','none')!="left"){
    get_sidebar('beta');
  }
?>
  </div>
<?php get_footer(); ?>