<?php

/**
 * Template Name: ユーザー検索
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage I'LL
 * @since I'LL 1.0
 */
get_header(); ?>
<link href="<?php echo get_template_directory_uri() ?>/asset/css/front-page.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri() ?>/asset/css/page-allsearch.css" rel="stylesheet">


<link href="<?php echo get_template_directory_uri() ?>/asset/css/page-workshopSearch.css" rel="stylesheet">





<div class="allsearch">
    <div class="inner">
        
        <form method="GET" action="" class="search-form">
            <label for="user_search" class="search-label">ユーザー検索:</label>
            <input type="text" id="user_search" name="user_search" class="search-input">
            <input type="submit" value="検索" class="search-button">
        </form>

        else {
    // 検索キーワードが入力されていない場合は、すべてのユーザーを表示します
    $users = get_users();

    if (!empty($users)) {
        echo '<ul class="list__box">';
        foreach ($users as $user) {
            $address = get_user_meta($user->ID, 'address', true);
            $age = get_user_meta($user->ID, 'age', true);
            $university = get_user_meta($user->ID, 'university', true);
            $faculty = get_user_meta($user->ID, 'faculty', true);

            ?>
            <li class="list">
                <div class="list__flex">
                    <p class="list__flexLeft">ID：</p>
                    <p class="list__flexRight"><?php echo $user->ID; ?></p>
                </div>
                <div class="list__flex">
                    <p class="list__flexLeft">ユーザー名：</p>
                    <p class="list__flexRight"><?php echo $user->user_login; ?></p>
                </div>
                <div class="list__flex">
                    <p class="list__flexLeft">メールアドレス：</p>
                    <p class="list__flexRight"><?php echo $user->user_email; ?></p>
                </div>
                <div class="list__flex">
                    <p class="list__flexLeft">住所：</p>
                    <p class="list__flexRight"><?php echo $address; ?></p>
                </div>
                <div class="list__flex">
                    <p class="list__flexLeft">年齢：</p>
                    <p class="list__flexRight"><?php echo $age; ?></p>
                </div>
                <div class="list__flex">
                    <p class="list__flexLeft">大学：</p>
                    <p class="list__flexRight"><?php echo $university; ?></p>
                </div>
                <div class="list__flex">
                    <p class="list__flexLeft">学部：</p>
                    <p class="list__flexRight"><?php echo $faculty; ?></p>
                </div>
            </li>
            <?php
        }
        echo '</ul>';
    } else {
        echo 'ユーザーが存在しません。';
    }
}


    </div>
</div>




















<?php get_footer(); ?>
