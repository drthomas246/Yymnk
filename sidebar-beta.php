      <aside id="beta">
<?php if ( is_active_sidebar( 'sidebar-2' ) ) : 
        dynamic_sidebar( 'sidebar-2' );
else: ?>
        <section>
          <h3>ウィジェットがありません</h3>
          <p>ウィジェットが設定されていません。</p>
        </section>
<?php
endif;
?>
      </aside>
