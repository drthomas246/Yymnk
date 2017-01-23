<?php
function yymnk_add_atom_link_tag() {
  if(get_theme_mod('pubsubhubbub','0')){
    echo '    <link rel="hub" href="https://pubsubhubbub.appspot.com" />'."\n";
    echo '    <link rel="hub" href="https://pubsubhubbub.superfeedr.com" />'."\n";
  }
}
add_action( 'atom_head', 'yymnk_add_atom_link_tag' );
add_action( 'comments_atom_head', 'yymnk_add_atom_link_tag' );

function yymnk_add_rss_link_tag() {
  if(get_theme_mod('pubsubhubbub','0')){
    echo '    <atom:link rel="hub" href="https://pubsubhubbub.appspot.com"/>'."\n";
    echo '    <atom:link rel="hub" href="https://pubsubhubbub.superfeedr.com"/>'."\n";
  }
}
add_action( 'rss_head', 'yymnk_add_rss_link_tag' );
add_action( 'rdf_header', 'yymnk_add_rss_link_tag' );
add_action( 'rss2_head', 'yymnk_add_rss_link_tag' );
add_action( 'commentsrss2_head', 'yymnk_add_rss_link_tag' );

function yymnk_PuSH( $feed_urls ) {
  $feed_urls = array_unique( $feed_urls );
  $hub_urls = array('https://pubsubhubbub.appspot.com','https://pubsubhubbub.superfeedr.com');
  foreach ( $hub_urls as $hub_url ) {
    $p = new PshbPublisher( $hub_url );
    if ( ! $p->publish_update( $feed_urls ) ) {
    }
  }
}
function yymnk_PuSH_publish_post( $post_id ) {
  if(get_theme_mod('pubsubhubbub','0')){
    $feed_urls = array();
    $feed_urls[] = get_bloginfo( 'atom_url' );
    $feed_urls[] = get_bloginfo( 'rss_url' );
    $feed_urls[] = get_bloginfo( 'rdf_url' );
    $feed_urls[] = get_bloginfo( 'rss2_url' );
    yymnk_PuSH( $feed_urls );
  }
  return $post_id;
}
add_action( 'publish_post', 'yymnk_PuSH_publish_post' );
?>