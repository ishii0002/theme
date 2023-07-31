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

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    echo "ユーザー名: " . htmlspecialchars($user, ENT_QUOTES, 'UTF-8');
}
?>

<?php get_footer(); ?>

