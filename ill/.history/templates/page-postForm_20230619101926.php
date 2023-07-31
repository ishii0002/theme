<?php


// セッションを開始
if (!session_id()) {
    session_start();
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user_login = $_POST['user_login'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $user_id = wp_create_user($user_login, $password, $email);

    if (!is_wp_error($user_id)) {
        // ユーザーのロールをセットします。デフォルトは'subscriber'です。
        $user = new WP_User($user_id);
        $user->set_role('subscriber');
        
        // ユーザーデータをセッションに追加
        // $_SESSION['user'] = $user_login;
        $_SESSION['user_login'] = $user_login;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        // ここでリダイレクトします
        wp_redirect('https://ishii.check-demo2.site/contact-completion/');
        exit;
    }
}













/**
 * Template Name: 投稿フォーム
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage I'LL
 * @since I'LL 1.0
 */
get_header(); ?>
<link href="<?php echo get_template_directory_uri() ?>/asset/css/front-page.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri() ?>/asset/css/page-contact.css" rel="stylesheet">





<!-- <form method="POST" action="">

    <label for="user_login">ユーザー名：</label>
    <input type="text" id="user_login" name="user_login">


    <label for="email">メール：</label>
    <input type="email" id="email" name="email">


    <label for="password">パスワード</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="登録する" id="submit">
</form> -->







<style>
    
</style>


<?php get_footer(); ?>

