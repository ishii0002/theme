<?php

/**
 * Template Name: 投稿フォーム（完了）
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




<div class="inner">
    <?php
    $title = sanitize_text_field($_GET['title']);
    $content = sanitize_text_field($_GET['content']);

    $place = sanitize_text_field($_GET['place']);
    ?>

    <?php 
    echo 'タイトル ' . $title;
    ?>
    <br>
    <?php 
    echo 'コンテンツ: ' . $content;
    ?>
</div>


<?php get_footer(); ?>

