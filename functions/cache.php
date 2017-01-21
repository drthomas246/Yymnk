<?php
function yymnk_cache_clear($post_ID=null){
  $urls = array();
  $urls=get_transient("urls");
  foreach( (array)$urls as $url ) {
    delete_transient($url);
  }
  delete_transient("urls");
  delete_transient("sidebar-1");
  delete_transient("sidebar-2");
  return $post_ID;
}
add_action( 'publish_post', 'yymnk_cache_clear');
add_action( 'publish_page', 'yymnk_cache_clear');

function get_dynamic_sidebar( $name ) {
	$contents = "";
	ob_start();
	dynamic_sidebar( $name );
	$contents = ob_get_clean();
	return $contents;
}
function get_social_buttom() {
	$contents = "";
	ob_start();
	social_buttom();
	$contents = ob_get_clean();
	return $contents;
}
function get_related_entry() {
	$contents = "";
	ob_start();
	related_entry();
	$contents = ob_get_clean();
	return $contents;
}
function get_comments_template() {
	$contents = "";
	ob_start();
	comments_template();
	$contents = ob_get_clean();
	return $contents;
}
?>