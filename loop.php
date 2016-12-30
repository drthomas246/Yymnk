<?php 
  if (have_posts()) :
    while (have_posts()) : the_post();
?>
        <section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="Impression">
              <a href="<?php the_permalink(); ?>"><time><?php echo get_the_date(); ?></time></a>
              <div class="categry">カテゴリ：<?php the_category(', ') ?></div>
            </div>
            <article>
              <div class="thumbnail">
                <?php echo the_post_thumbnail(thumbnail,array( 'alt' => get_the_title(), 'title' => get_the_title() ,'class'=> 'firstimg')); ?>
              </div>
              <?php the_excerpt(); ?>
            </article>
<?php
if ( mb_strlen( get_the_title() ) > 16 ) {
  $title=mb_substr(get_the_title(),0,16).'...';
}else{
  $title=get_the_title() ;
}
?>
            <div class="more">
              <a href="<?php the_permalink() ?>" class="more-link"><?php printf('「%s」の続きを読む',$title)?> &raquo;</a>
            </div>
          </section>

<?php 
    endwhile;
  endif;
?>