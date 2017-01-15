      <aside id="beta">
<?php if ( is_active_sidebar( 'sidebar-2' ) ) : 
        $side_b = get_transient( "sidebar-2" );
        if($side_b===false){
          $side_b=get_dynamic_sidebar( 'sidebar-2' );
          if(get_theme_mod('cache','0') and get_theme_mod('cache_sidbar_b','0')){
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
            set_transient( "sidebar-2", $side_b, $time );
          }
        }
        print $side_b;
else: ?>
        <section>
          <h3>ウィジェットがありません</h3>
          <p>ウィジェットが設定されていません。</p>
        </section>
<?php
endif;
?>
      </aside>
