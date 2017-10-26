<?php
/*
Plugin Name: QuickDaassh
Plugin URI:
Description: ダッシュボードにショートカットボタンを表示する。
Version: 1.0
Author: Hiroki Nakashima
Author URI:
License: GPL2
*/

remove_action( 'welcome_panel', 'wp_welcome_panel' );
add_action( 'welcome_panel', 'add_links_welcome_panel' );
function add_links_welcome_panel() {
  wp_register_style(
			'quickdaassh_style',
			plugins_url( '/quickdaassh/css/quickdaassh-style.css' ),
			array(),
			FALSE,
			'screen'
		);
		wp_enqueue_style( 'quickdaassh_style' );
?>
  <!-- <h2>各種投稿</h2>
  <ul>
    <li><a class="button button-primary post-foo" href="edit.php?post_type=foo">投稿A 記事一覧</a></li>
    <li><a class="button button-primary post-foo" href="post-new.php?post_type=foo">投稿A 新規追加</a></li>
    <li><a class="button button-primary post-bar" href="edit.php?post_type=bar">投稿B 記事一覧</a></li>
    <li><a class="button button-primary post-bar" href="post-new.php?post_type=bar">投稿B 新規追加</a></li>
  </ul> -->
  <h2>Quick Daassh</h2>
  <h3>固定ページ</h3>
  <ul>
<?php
  $pages = get_pages( array(
    'sort_column' => 'menu_order',
    'sort_order' => 'ASC'
  ) );
  foreach( $pages as $page ) {
    echo '<li><a class="button button-primary page" href="post.php?post=' . $page->ID . '&action=edit">' . $page->post_title . ' 編集</a></li>';
  }
?>
  </ul>
<?php
}
