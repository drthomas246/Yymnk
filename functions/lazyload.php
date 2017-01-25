<?php
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'yymnk_gallery_shortcode');
function yymnk_gallery_shortcode( $attr ) {
  $post = get_post();

  static $instance = 0;
  $instance++;

  if ( ! empty( $attr['ids'] ) ) {
    if ( empty( $attr['orderby'] ) ) {
      $attr['orderby'] = 'post__in';
    }
    $attr['include'] = $attr['ids'];
  }
  $output = apply_filters( 'post_gallery', '', $attr, $instance );
  if ( $output != '' ) {
    return $output;
  }

  $html5 = current_theme_supports( 'html5', 'gallery' );
  $atts = shortcode_atts( array(
    'order'      => 'ASC',
    'orderby'    => 'menu_order ID',
    'id'         => $post ? $post->ID : 0,
    'itemtag'    => $html5 ? 'figure'     : 'dl',
    'icontag'    => $html5 ? 'div'        : 'dt',
    'captiontag' => $html5 ? 'figcaption' : 'dd',
    'columns'    => 3,
    'size'       => 'thumbnail',
    'include'    => '',
    'exclude'    => '',
    'link'       => 'file'
  ), $attr, 'gallery' );

  $id = intval( $atts['id'] );

  if ( ! empty( $atts['include'] ) ) {
    $_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

    $attachments = array();
    foreach ( $_attachments as $key => $val ) {
      $attachments[$val->ID] = $_attachments[$key];
    }
  } elseif ( ! empty( $atts['exclude'] ) ) {
    $attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
  } else {
    $attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
  }

  if ( empty( $attachments ) ) {
    return '';
  }

  if ( is_feed() ) {
    $output = "\n";
    foreach ( $attachments as $att_id => $attachment ) {
      $output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
    }
    return $output;
  }

  $itemtag = tag_escape( $atts['itemtag'] );
  $captiontag = tag_escape( $atts['captiontag'] );
  $icontag = tag_escape( $atts['icontag'] );
  $valid_tags = wp_kses_allowed_html( 'post' );
  if ( ! isset( $valid_tags[ $itemtag ] ) ) {
    $itemtag = 'dl';
  }
  if ( ! isset( $valid_tags[ $captiontag ] ) ) {
    $captiontag = 'dd';
  }
  if ( ! isset( $valid_tags[ $icontag ] ) ) {
    $icontag = 'dt';
  }

  $columns = intval( $atts['columns'] );
  $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
  $float = is_rtl() ? 'right' : 'left';

  $selector = "gallery-{$instance}";

  $gallery_style = '';
  if ( apply_filters( 'use_default_gallery_style', ! $html5 ) ) {
    $gallery_style = "
    <style type='text/css'>
      #{$selector} {
        margin: auto;
      }
      #{$selector} .gallery-item {
        float: {$float};
        margin-top: 10px;
        text-align: center;
        width: {$itemwidth}%;
      }
      #{$selector} img {
        border: 2px solid #cfcfcf;
      }
      #{$selector} .gallery-caption {
        margin-left: 0;
      }
    </style>\n\t\t";
  }

  $size_class = sanitize_html_class( $atts['size'] );
  $gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
  $output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );

  $i = 0;
  foreach ( $attachments as $id => $attachment ) {

    $attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id" ) : '';
    if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
      if(get_theme_mod('lazy_load','0')){
        $image_output = yymnk_get_attachment_link( $id, $atts['size'], false, false, false, $attr );
      }else{
        $image_output = wp_get_attachment_link( $id, $atts['size'], false, false, false, $attr );
      }
    } elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
      $image_output = wp_get_attachment_image( $id, $atts['size'], false, $attr );
    } else {
      if(get_theme_mod('lazy_load','0')){
        $image_output = yymnk_get_attachment_link( $id, $atts['size'], false, false, false, $attr );
      }else{
        $image_output = wp_get_attachment_link( $id, $atts['size'], false, false, false, $attr );
      }
    }
    $image_meta  = wp_get_attachment_metadata( $id );

    $orientation = '';
    if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
      $orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
    }
    $output .= "<{$itemtag} class='gallery-item'>";
    $output .= "
      <{$icontag} class='gallery-icon {$orientation}'>
        $image_output
      </{$icontag}>";
    if ( $captiontag && trim($attachment->post_excerpt) ) {
      $output .= "
        <{$captiontag} class='wp-caption-text gallery-caption' id='$selector-$id'>
        " . wptexturize($attachment->post_excerpt) . "
        </{$captiontag}>";
    }
    $output .= "</{$itemtag}>";
    if ( ! $html5 && $columns > 0 && ++$i % $columns == 0 ) {
      $output .= '<br style="clear: both" />';
    }
  }

  if ( ! $html5 && $columns > 0 && $i % $columns !== 0 ) {
    $output .= "
      <br style='clear: both' />";
  }

  $output .= "
    </div>\n";

  return $output;
}

function yymnk_get_attachment_link( $id = 0, $size = 'thumbnail', $permalink = false, $icon = false, $text = false, $attr = '' ) {
  $_post = get_post( $id );

  if ( empty( $_post ) || ( 'attachment' !== $_post->post_type ) || ! $url = wp_get_attachment_url( $_post->ID ) ) {
    return __( 'Missing Attachment' );
  }

  if ( $permalink ) {
    $url = get_attachment_link( $_post->ID );
  }

  if ( $text ) {
    $link_text = $text;
  } elseif ( $size && 'none' != $size ) {
    $link_text = yymnk_get_attachment_image( $_post->ID, $size, $icon, $attr );
  } else {
    $link_text = '';
  }

  if ( '' === trim( $link_text ) ) {
    $link_text = $_post->post_title;
  }

  if ( '' === trim( $link_text ) ) {
    $link_text = esc_html( pathinfo( get_attached_file( $_post->ID ), PATHINFO_FILENAME ) );
  }
  return apply_filters( 'wp_get_attachment_link', "<a href='" . esc_url( $url ) . "'>$link_text</a>", $id, $size, $permalink, $icon, $text );
}


function yymnk_get_attachment_image($attachment_id, $size = 'thumbnail', $icon = false, $attr = '') {
  $html = '';
  $image = wp_get_attachment_image_src($attachment_id, $size, $icon);
  if ( $image ) {
    list($src, $width, $height) = $image;
    $hwstring = image_hwstring($width, $height);
    $size_class = $size;
    if ( is_array( $size_class ) ) {
      $size_class = join( 'x', $size_class );
    }
    $attachment = get_post($attachment_id);
    $default_attr = array(
      'src'=>'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC',
      'data-original'  => $src,
      'class'  => "attachment-$size_class size-$size_class lazy",
      'alt'  => trim( strip_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) ),
    );

    $attr = wp_parse_args( $attr, $default_attr );

    if ( empty( $attr['srcset'] ) ) {
      $image_meta = wp_get_attachment_metadata( $attachment_id );

      if ( is_array( $image_meta ) ) {
        $size_array = array( absint( $width ), absint( $height ) );
        $srcset = wp_calculate_image_srcset( $size_array, $src, $image_meta, $attachment_id );
        $sizes = wp_calculate_image_sizes( $size_array, $src, $image_meta, $attachment_id );

        if ( $srcset && ( $sizes || ! empty( $attr['sizes'] ) ) ) {
          $attr['srcset'] = $srcset;

          if ( empty( $attr['sizes'] ) ) {
            $attr['sizes'] = $sizes;
          }
        }
      }
    }
    $attr = apply_filters( 'wp_get_attachment_image_attributes', $attr, $attachment, $size );
    $attr = array_map( 'esc_attr', $attr );
    $html = rtrim("<img $hwstring");
    foreach ( $attr as $name => $value ) {
      $html .= " $name=" . '"' . $value . '"';
    }
    $html .= ' />';
  }

  return $html;
}
