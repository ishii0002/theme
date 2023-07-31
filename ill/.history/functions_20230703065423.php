<?php
/**
* I'LL function
* @package WordPress
* @subpackage I'LL
* @since I'LL 1.0
*/


/*------------------------------------------------------------------------------------
/* カスタム投稿タイプの追加
/*----------------------------------------------------------------------------------*/

//カスタム投稿タイプ追加用のwpのアクションフック"init"*/
add_action( 'init', 'custum_post_type' );
/*ファンクション名custum_post_type""*/
function custum_post_type() {

//カスタム投稿（お知らせ）
  register_post_type( 'news',// カスタム投稿名(半角英字)
    array('labels' =>
    array(
      'name' => __( 'お知らせ' ), //管理画面に表示される文字（日本語OK)
      'singular_name' => __( 'お知らせ' ) //投稿時に表示される文字（日本語OK)
    ),
    //投稿タイプの設定
    'public' => true, //公開するかしないか(デフォルト"true")
    'has_archive' => true, //trueにすると投稿した記事のアーカイブページを生成
    'menu_position' => 5,  // 管理画面上でどこに配置するか
    //投稿編集ページの設定
    'supports' => array('title','editor','thumbnail'), //タイトル，編集，アイキャッチ対応)
  )
 );



 //  追加した箇所　カテゴリー項目を追加
 register_taxonomy('news_cat',array('news'), array(  //左タクソノミー名、右カスタム投稿名
  'hierarchical' => true,
  'label' => 'カテゴリー',   //管理画面 カテゴリー項目名
  'show_ui' => true,
  'public' => true
));

//  追加した箇所　タグ項目を追加
register_taxonomy('news_tag',array('news'), array(  //左タクソノミー名、右カスタム投稿名
  'hierarchical' => true,
  'label' => 'タグ',   //管理画面 タグ項目名
  'show_ui' => true,
  'public' => true
));











//カスタム投稿（workshop）
register_post_type( 'workshop',// カスタム投稿名(半角英字)
array('labels' =>
array(
  'name' => __( 'ワークショップ' ), //管理画面に表示される文字（日本語OK)
  'singular_name' => __( 'ワークショップ' ) //投稿時に表示される文字（日本語OK)
),
//投稿タイプの設定
'public' => true, //公開するかしないか(デフォルト"true")
'has_archive' => true, //trueにすると投稿した記事のアーカイブページを生成
'menu_position' => 5,  // 管理画面上でどこに配置するか
//投稿編集ページの設定
'supports' => array('title','editor','thumbnail'), //タイトル，編集，アイキャッチ対応)
)
);




//カスタム投稿（workshop）
register_post_type( 'user',// カスタム投稿名(半角英字)
array('labels' =>
array(
  'name' => __( 'ユーザー一覧' ), //管理画面に表示される文字（日本語OK)
  'singular_name' => __( 'ユーザー一覧' ) //投稿時に表示される文字（日本語OK)
),
//投稿タイプの設定
'public' => true, //公開するかしないか(デフォルト"true")
'has_archive' => true, //trueにすると投稿した記事のアーカイブページを生成
'menu_position' => 5,  // 管理画面上でどこに配置するか
//投稿編集ページの設定
'supports' => array('title','editor','thumbnail'), //タイトル，編集，アイキャッチ対応)
)
);



//  追加した箇所　カテゴリー項目を追加
register_taxonomy('workshop_cat',array('workshop'), array(  //左タクソノミー名、右カスタム投稿名
'hierarchical' => true,
'label' => 'カテゴリー',   //管理画面 カテゴリー項目名
'show_ui' => true,
'public' => true
));

//  追加した箇所　タグ項目を追加
register_taxonomy('workshop_tag',array('workshop'), array(  //左タクソノミー名、右カスタム投稿名
'hierarchical' => true,
'label' => 'タグ',   //管理画面 タグ項目名
'show_ui' => true,
'public' => true
));



}


/*------------------------------------------------------------------------------------
/* WordPress標準の機能
/*----------------------------------------------------------------------------------*/
if ( !isset( $content_width ) ) {
  $content_width = 1118;
}

// 外観 > メニューの位置設定
if ( !function_exists( 'ill_setup' ) ):
  function ill_setup() {
    load_theme_textdomain( 'ill', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'customize-selective-refresh-widgets' );
    //メニューの位置
    register_nav_menu( 'global-nav', __( 'グローバルナビ' ) );
    register_nav_menu( 'hamburger-menu', __( 'ハンバーガーメニュー' ) );
  }
  add_action( 'after_setup_theme', 'ill_setup' );
endif;

// 404エラー時に自動でトップページへリダイレクトする
// add_action( 'template_redirect', 'is404_redirect_home' );
// function is404_redirect_home() {
//   if( is_404() ){
//     wp_safe_redirect( home_url( '/' ) );
//     exit();
//   }
// }


/*------------------------------------------------------------------------------------
/* WordPressへの追加設定
/*----------------------------------------------------------------------------------*/

// 外観 > カスタマイズ の機能追加
require_once ( get_template_directory() . '/lib/theme-customizer.php' );
require_once ( get_template_directory() . '/lib/theme-tags.php' );

// テキストウィジェットでショートコード使用
add_filter('widget_text', 'do_shortcode');

// カテゴリーの投稿数表示スタイル
function ill_list_categories( $output ) {
  $output = preg_replace( '/<\/a>\s*\((\d+)\)/',' <span class="small">($1)</span></a>', $output );
  return $output;
}
add_filter( 'wp_list_categories', 'ill_list_categories', 10, 2 );

// アーカイブの投稿数表示スタイル
function  ill_list_archives( $output, $args ) {
  $output = preg_replace( '/<\/a>\s*(&nbsp;)\((\d+)\)/',' <span class="small">($2)</span></a>', $output );
  return $output;
}
add_filter( 'get_archives_link', 'ill_list_archives', 10, 2 );

// is_mobile追加
function is_mobile() {
  $useragents = array(
  'iPhone', // iPhone
  'iPod', // iPod touch
  'Android.*Mobile', // 1.5+ Android *** Only mobile
  'Windows.*Phone', // *** Windows Phone
  'dream', // Pre 1.5 Android
  'CUPCAKE', // 1.5+ Android
  'blackberry9500', // Storm
  'blackberry9530', // Storm
  'blackberry9520', // Storm v2
  'blackberry9550', // Storm v2
  'blackberry9800', // Torch
  'webOS', // Palm Pre Experimental
  'incognito', // Other iPhone browser
  'webmate' // Other iPhone browser
  );
  $pattern = '/'.implode('|', $useragents).'/i';
return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

// 記事のリダイレクト
add_action('admin_menu', 'add_redirect_custom_box');
if ( !function_exists( 'add_redirect_custom_box' ) ):
  function add_redirect_custom_box(){
    add_meta_box( 'singular_redirect_settings', 'リダイレクト', 'redirect_custom_box_view', 'post', 'side' );
    add_meta_box( 'singular_redirect_settings', 'リダイレクト', 'redirect_custom_box_view', 'page', 'side' );
  }
endif;

if ( !function_exists( 'redirect_custom_box_view' ) ):
function redirect_custom_box_view(){
  $redirect_url = get_post_meta(get_the_ID(),'redirect_url', true);
  echo '<label for="redirect_url">リダイレクトURL</label>';
  echo '<input type="text" name="redirect_url" size="20" value="'.esc_attr(stripslashes_deep(strip_tags($redirect_url))).'" placeholder="https://" style="width: 100%;">';
  echo '<p class="howto">このページに訪れるユーザーを設定したURLに301リダイレクトします。</p>';
}
endif;

add_action('save_post', 'redirect_custom_box_save_data');
if ( !function_exists( 'redirect_custom_box_save_data' ) ):
  function redirect_custom_box_save_data(){
    $id = get_the_ID();
    if ( isset( $_POST['redirect_url'] ) ){
      $redirect_url = $_POST['redirect_url'];
      $redirect_url_key = 'redirect_url';
      add_post_meta($id, $redirect_url_key, $redirect_url, true);
      update_post_meta($id, $redirect_url_key, $redirect_url);
    }
  }
endif;

if ( !function_exists( 'get_singular_redirect_url' ) ):
  function get_singular_redirect_url(){
    return trim(get_post_meta(get_the_ID(), 'redirect_url', true));
  }
endif;

if ( !function_exists( 'redirect_to_url' ) ):
  function redirect_to_url($url){
    header( "HTTP/1.1 301 Moved Permanently" );
    header( "location: " . $url  );
    exit;
  }
endif;

define('URL_REG_STR', '(https?|ftp)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)');
define('URL_REG', '/'.URL_REG_STR.'/');

add_action( 'wp','wp_singular_page_redirect', 0 );
if ( !function_exists( 'wp_singular_page_redirect' ) ):
  function wp_singular_page_redirect() {
    if (is_singular() && $redirect_url = get_singular_redirect_url()) {
      if (preg_match(URL_REG, $redirect_url)) {
        redirect_to_url($redirect_url);
      }
    }
  }
endif;


/*------------------------------------------------------------------------------------
/* デフォルトのWordPressの不要機能を削除
/*----------------------------------------------------------------------------------*/

// アップロードされたメディアの各サイズごとの自動生成を停止
add_filter( 'intermediate_image_sizes_advanced', 'disable_image_sizes' );
function disable_image_sizes( $new_sizes ) {
  unset( $new_sizes['thumbnail'] );
  unset( $new_sizes['medium'] );
  unset( $new_sizes['large'] );
  unset( $new_sizes['medium_large'] );
  unset( $new_sizes['1536x1536'] );
  unset( $new_sizes['2048x2048'] );
  return $new_sizes;
}
add_filter( 'big_image_size_threshold', '__return_false' );

//ダッシュボード デフォルトのサイドメニューの非表示
function remove_menus () {
  global $menu;
  unset($menu[25]); // コメント
}
add_action('admin_menu', 'remove_menus');

// headに出力されるタグを消去
remove_action( 'wp_head', 'wp_generator' ); //WordPressのバージョン情報
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); //絵文字対応のスクリプト
remove_action( 'wp_print_styles', 'print_emoji_styles'); //絵文字対応のスタイル

// 絵文字の DNS プリフェッチだけを削除
add_filter( 'emoji_svg_url', '__return_false' );

// recent commentsのstyleを消去
function remove_recent_comments_style() {
  global $wp_widget_factory;
  remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ));
}
add_action( 'widgets_init', 'remove_recent_comments_style' );

// カテゴリーやタグの概要<p>タグを消去
remove_filter( 'term_description','wpautop' );

// メディア画像のみタグ自動挿入の停止
function remove_p_on_images($content){
  return preg_replace('/<p>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $content);
}
add_filter( 'the_content', 'remove_p_on_images' );

// 投稿ページ以外ではhentryクラスを削除
function remove_hentry( $classes ) {
  if ( !is_single() ) {
   $classes = array_diff( $classes, array( 'hentry' ) );
  }
  return $classes;
}
add_filter( 'post_class','remove_hentry' );

// セルフピンバックの禁止
function no_self_ping( &$links ) {
  $home = home_url();
  foreach ( $links as $l => $link )
  if ( 0 === strpos( $link, $home ) )
  unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );

// the_archive_title 余計な文字を削除
function ill_archive_title( $title ) {
  if ( is_category() ) {
    $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
    $title = single_tag_title( '', false );
  }
  return $title;
}
add_filter( 'get_the_archive_title', 'ill_archive_title' );

// テーマフォルダ直下のeditor-style.cssを読み込み
add_editor_style("editor-style.css");
add_theme_support("editor-style");

// WPのテキストエディタにもfontAwesomeを表示させる
function vf_add_editor_styles()
{
  add_editor_style('asset/fonts/fontawesome.min.css');
}
add_action('admin_init', 'vf_add_editor_styles');

// 投稿にサムネイルを許可
add_theme_support('post-thumbnails');









// お問い合わせフォーム 確認画面に移動
add_action( 'wp_footer', 'add_thanks_page' );

function add_thanks_page() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = '/completion/'; /*送信完了ページのURL*/
}, false );
</script>
<?php
}






























// function custom_user_registration() {
//   if ( isset($_POST['submitted']) ) {
//       if( wp_verify_nonce($_POST['user_nonce_field'],'user_nonce_action') ) {
//           $username = sanitize_text_field($_POST['name']);
//           $email = sanitize_email($_POST['email']);
//           $password = wp_generate_password();

//           $userdata = array(
//               'user_login'  => $username,
//               'user_email'  => $email,
//               'user_pass'   => $password
//           );

//           $user_id = wp_insert_user( $userdata ) ;

//           if( is_wp_error($user_id) ) {
//               echo $user_id->get_error_message();
//           } else {
//               echo 'ユーザーが正常に作成されました';
//           }
//       } else {
//           echo 'セキュリティチェックに失敗しました';
//       }
//   }
// }

// add_action('init', 'custom_user_registration');








// 検索
add_action( 'pre_get_posts', function( $q ) {
  if( $title = $q->get( '_meta_or_title' ) ) {
      add_filter( 'get_meta_sql', function( $sql ) use ( $title ) {
          global $wpdb;

          // Only run once:
          static $nr = 0;
          if( 0 != $nr++ ) return $sql;

          // Modify WHERE part:
          $sql['where'] = sprintf(
              " AND ( %s OR %s OR %s ) ",
              $wpdb->prepare( "{$wpdb->posts}.post_title = '%s'", $title ), // ポストタイトルを検索
              $wpdb->prepare( "{$wpdb->posts}.post_content LIKE '%%%s%%'", $title ), // コンテンツを検索
              mb_substr( $sql['where'], 5, mb_strlen( $sql['where'] ) ) // 元のWHERE句を取得し、先頭の "AND" を除去
          );
          return $sql;
      });
  }
});


