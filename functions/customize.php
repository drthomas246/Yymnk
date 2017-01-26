<?php
function yymnk_customize_register( $wp_customize ) {
//この間に設定していきます。
//フォントカラーの設定
  $wp_customize->add_setting(
    'yymnk_text_color_value',
     array(
      'default'       =>  '#000000',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport'     =>'postMessage',
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control( 
      $wp_customize, 
      'yymnk_text_color_value_c', 
      array(
        'label'    => フォントの色,
        'section'  => 'colors',
        'settings'   => 'yymnk_text_color_value',
        'priority'   => 1,
      )
    ) 
  );
//リンクホバーの色
  $wp_customize->add_setting(
    'yymnk_hover_color_value',
     array(
      'default'       =>  '#000000',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport'     =>'postMessage',
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'yymnk_hover_color_value_c', 
      array(
        'label'    => リンクボバーの色,
        'section'  => 'colors',
        'settings'   => 'yymnk_hover_color_value',
        'priority'   => 2,
      )
    ) 
  );
  $wp_customize->add_section( 'yymnk_font', array(
    'title'          => 'フォント',
    'priority'       => 41,
  ) );
      $wp_customize->add_setting(
        'yymnk_font_value',
        array(
          'default'=>'serif',
          'sanitize_callback' => 'sanitize_key',
          'transport'     =>'postMessage',
        )
      );
      // Add the conrol of font style.
      $wp_customize->add_control(
        new WP_Customize_Control(
          $wp_customize,
          'yymnk_font_value_c',
          array(
            'label'          => 'フォント設定',
            'description'          => 'フォントファミリー',
            'section'        => 'yymnk_font',
            'settings'       => 'yymnk_font_value',
            'type'           => 'select',
            'priority'       => 1,
            'choices'        => array(
              'serif'      => '明朝体',
              'sans-serif' => 'ゴシック体',
              'cursive'    => '手がき体',
            )
          )
        )
      );
}
add_action( 'customize_register', 'yymnk_customize_register' );

function yymnk_customizer_live_preview()
{
  wp_enqueue_script(
      'yymnk-themecustomizer',
      get_template_directory_uri().'/javascript/theme-customize.min.js',
      array('jquery'),
      '1.0',
      true
  );
}
add_action( 'customize_preview_init', 'yymnk_customizer_live_preview' );

function yymnk_css_modes() {
//ここの間に設定していきます。
?>
<style type="text/css">
  body{
    color:<?php echo get_theme_mod( 'yymnk_text_color_value','#000000' );?>;
<?php
  switch(get_theme_mod( 'yymnk_font_value','serif' )){
    case 'serif':
?>
    font-family:"Times New Roman", "游明朝", YuMincho, "ヒラギノ明朝 ProN W3", "Hiragino Mincho ProN", "ＭＳ Ｐ明朝", "MS PMincho",serif;
<?php
    break;
    case 'sans-serif':
?>
    font-family:Verdana, Roboto, "Droid Sans", "游ゴシック", YuGothic, "メイリオ", Meiryo, "ヒラギノ角ゴ ProN W3", "Hiragino Kaku Gothic ProN", "ＭＳ Ｐゴシック", sans-serif;
<?php
    break;
    case 'cursive':
?>
    font-family:"Comic Sans MS","HG丸ｺﾞｼｯｸM-PRO","HGMaruGothicMPRO","ヒラギノ丸ゴ ProN W4", "Hiragino Maru Gothic ProN","メイリオ", Meiryo,cursive;
<?php
    break;
  }
?>
  }
  a{
    color:<?php echo get_theme_mod( 'yymnk_text_color_value','#000000' );?>;
  }
  a:hover{
    color:<?php echo get_theme_mod( 'yymnk_hover_color_value','#000000' );?>;
  }
</style>
<?php
}
add_action( 'wp_head', 'yymnk_css_modes');