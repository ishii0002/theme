<?php


/**
 * Template Name: フォーム（完了）
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage I'LL
 * @since I'LL 1.0
 */
get_header(); ?>
<link href="<?php echo get_template_directory_uri() ?>/asset/css/front-page.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri() ?>/asset/css/page-contact.css" rel="stylesheet">
















<?php
// セッションを開始
if (!session_id()) {
    session_start();
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = urldecode($_GET['user']);
    echo "ユーザー名: " . htmlspecialchars($user, ENT_QUOTES, 'UTF-8');

    if (!is_wp_error($user_id)) {
        // ユーザーのロールをセットします。デフォルトは'subscriber'です。
        $user = new WP_User($user_id);
        $user->set_role('subscriber');
        
        // ユーザーデータをセッションに追加
        $_SESSION['user'] = $user_login;

        // ここでリダイレクトします
        wp_redirect('https://ishii.check-demo2.site/workshop/');
        exit;
    }
    // セッションを開始
if (!session_id()) {
    session_start();
}

$user = $_SESSION['user'];
echo "ユーザー名: " . htmlspecialchars($user, ENT_QUOTES, 'UTF-8');
}



<?php get_footer(); ?>

