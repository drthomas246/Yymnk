      <aside id="alpha">
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : 
        dynamic_sidebar( 'sidebar-1' );
else: ?>
        <section>
          <h3>ウィジェットがありません</h3>
          <p>ウィジェットが設定されていません。</p>
        </section>
<?php
endif;
?>
      </aside>
