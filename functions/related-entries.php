<?php
function related_entry($post){
  $categories = get_the_category($post->ID);
  $category_ID = array();
  foreach($categories as $category):
    array_push( $category_ID, $category -> cat_ID);
  endforeach ;
  $args = array(
    'post__not_in' => array($post -> ID),
    'posts_per_page'=> 3,
    'category__in' => $category_ID,
    'orderby' => 'rand',
  );
  $query = new WP_Query($args);
  if(get_theme_mod('related_entry','1')){
    if(!is_home()&&!is_front_page()&&!is_admin()){
      if( $query -> have_posts() ):
        if (get_theme_mod('social_title','ソーシャルボタン')){
?>
<h5><?php echo get_theme_mod('related_entry_title','関連項目'); ?></h5>
<?php
        }
?>
  <ul id="related-entries">
<?php
        while ($query -> have_posts()) : $query -> the_post();
?>
      <li class="related-entry">
        <div class="related-entry-thumb">
          <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
            <?php if ( has_post_thumbnail() ): ?>
              <?php echo get_the_post_thumbnail($post->ID, 'thumb-elated-entriy');?>
            <?php else: ?>
              <img src="<?php echo get_template_directory_uri(); ?>/image/no-image.png" alt="NO IMAGE" title="NO IMAGE" width="60px" />
            <?php endif; ?>
          </a>
        </div><!-- /.related-entry-thumb -->
        <div class="related-entry-content">
            <h6 class="related-entry-title"> <a href="<?php the_permalink(); ?>">
              <?php the_title();?>
            </a></h6>
          <p class="related-entry-read"><a href="<?php the_permalink(); ?>">記事を読む</a></p>
        </div>
      </li><!-- /.new-entry -->
<?php
        endwhile;
?>
  </ul>
<?php
      else:
?>
  <p>記事はありませんでした</p>
<?php
      endif;
    }
  }  
  wp_reset_postdata();
      
?>
<br style="clear:both;">
<?php
}
?>