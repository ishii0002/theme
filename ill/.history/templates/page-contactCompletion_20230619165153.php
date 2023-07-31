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





<div class="">
    

    <div class="inner">
    


        



        <br>
        <?php
        // セッションを開始
        if (!session_id()) {
            session_start();
        }

        echo "ユーザー名: " . $_SESSION['user_login'] . "<br>";
        echo "メール: " . $_SESSION['email'] . "<br>";
        echo "パスワード: " . str_repeat('●', strlen($_SESSION['password'])) . "<br>";
        echo "住所: " . $_SESSION['address'] . "<br>";
        echo "年齢: " . $_SESSION['age'] . "<br>";
        echo "大学名: " . $_SESSION['university'] . "<br>";
        echo "学部: " . $_SESSION['faculty'] . "<br>";
                ?>

    </div>

</div>
<?php get_footer(); ?>

