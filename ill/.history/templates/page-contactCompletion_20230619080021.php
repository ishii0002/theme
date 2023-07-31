<?php




$user = urldecode($_GET['user']);
echo "ユーザー名: " . htmlspecialchars($user, ENT_QUOTES, 'UTF-8');












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














aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa








<?php
// セッションを開始
if (!session_id()) {
    session_start();
}

$user = $_SESSION['user'];
echo "ユーザー名: " . htmlspecialchars($user, ENT_QUOTES, 'UTF-8');
?>
<!-- <form method="POST" action="">

    <label for="user_login">名前：</label><br>
    <input type="text" id="user_login" name="user_login"><br>


    <label for="email">メール：</label><br>
    <input type="email" id="email" name="email"><br>


    <label for="password">パスワード</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="登録する" id="submit">
</form> -->




<?php get_footer(); ?>

