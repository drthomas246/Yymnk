<?php get_header(); ?>
      <div id="main">
<?php
if(get_theme_mod('sidebar','none')=="right-right"){
    get_sidebar('beta');
  }elseif(get_theme_mod('sidebar','none')!="none"){
     get_sidebar('alpha');
  }
?>
        <div id="article">
        <?php breadcrumb(); ?>
<?php
  if(is_single()):
?>
      <div class="navigation">
        <ul>
        <li>
<?php
  $previous_post = get_previous_post();
  $pre_post_title = $previous_post->post_title;
  if ( mb_strlen( $pre_post_title ) > 18 ) { $pre_post_title = mb_substr( $pre_post_title, 0, 18).'...'; }
  if ( !empty( $previous_post ) ):
    if(!empty($pre_post_title)):
?>
          <a href="<?php echo esc_url( get_permalink( $previous_post->ID ) ); ?>" title="<?php echo esc_html( $previous_post->post_title); ?>">&laquo; <?php echo $pre_post_title; ?></a>
<?php else:?>
          <a href="<?php echo esc_url( get_permalink( $previous_post->ID ) ); ?>" title="<?php echo esc_html( $previous_post->post_title); ?>">&laquo; 前の投稿</a>
<?php
  endif;
  endif;
?>
        </li>
        <li>
<?php
  $next_post = get_next_post();
  $next_post_title = $next_post->post_title;
  if ( mb_strlen( $next_post_title ) > 18 ) { $next_post_title = mb_substr( $next_post_title, 0, 18).'...'; }
  if ( !empty( $next_post ) ):
    if(!empty($next_post_title)):
?>
          <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" title="<?php echo esc_html( $next_post->post_title); ?>"><?php echo $next_post_title; ?> &raquo;</a>
<?php else:?>
          <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" title="<?php echo esc_html( $next_post->post_title); ?>">次の投稿 &raquo;</a>
<?php
  endif;
  endif; ?>
        </li>
        </ul>
      </div>
<?php
  endif;
  if (have_posts()) :
    while (have_posts()) : the_post();
?>
          <section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="Impression">
              <a href="<?php the_permalink(); ?>"><time><?php echo get_the_date(); ?></time></a>
<?php
  if(is_single()):
?>
              <div class="categry">カテゴリ：<?php the_category(', ') ?></div>
<?php
  endif;
?>
            </div>
            <article>
<?php
  if(get_theme_mod('table_of_contents','0')){
?>
                <div id="toc"></div>
<?php
  }
?>
                <div id="content_text">
                  <?php the_content(); ?>
                </div>
<?php
  $args = array(
  'before' => '<div id="page-link"><ul>',
  'after' => '</ul></div>',
  'link_before' => '<li>',
  'link_after' => '</li>',
  'next_or_number' =>'next',
  'nextpagelink' =>'次ページへ &raquo',
  'previouspagelink'=>'&laquo 前のページへ',
  );
          wp_link_pages($args);
?>
                <?php social_buttom(); ?>
                <?php related_entry(); ?>
                <?php comments_template();?>
            </article>
          </section>
<?php 
    endwhile;
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