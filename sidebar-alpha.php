      <aside id="alpha">
<?php if ( is_active_sidebar( 'sidebar-1' ) ) :
        $side_a = get_transient( "sidebar-1" );
        if($side_a===false){
          $side_a=get_dynamic_sidebar( 'sidebar-1' );
          if(get_theme_mod('cache','0') and get_theme_mod('cache_sidbar_a','0')){
            switch(get_theme_mod('cache_time','week')){
              case "day":
                $time=60 * 60 * 24;
                break;
              case "week":
                $time=60 * 60 * 24*7;
                break;
              case "month":
                $time=60 * 60 * 24*31;
                break;
              case "year":
                $time=60 * 60 * 24*365;
                break;
            }
            set_transient( "sidebar-1", $side_a, $time );
          }
        }
        print $side_a;
else: ?>
        <section>
          <h3>ウィジェットがありません</h3>
          <p>ウィジェットが設定されていません。</p>
        </section>
<?php
endif;
?>
      </aside>
