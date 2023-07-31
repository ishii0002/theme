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

// if (isset($_SESSION['user'])) {
//     $user = $_SESSION['user'];
//     echo "ユーザー名: " . htmlspecialchars($user, ENT_QUOTES, 'UTF-8');
// }


if (isset($_SESSION['user_login'])) {
    $user_login = $_SESSION['user_login'];
    echo "ユーザーログイン名: " . htmlspecialchars($user_login, ENT_QUOTES, 'UTF-8');
}

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    echo "メールアドレス: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
}

if (isset($_SESSION['password'])) {
    $password = $_SESSION['password'];
    echo "パスワード: " . htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
}
?>

<?php get_footer(); ?>

