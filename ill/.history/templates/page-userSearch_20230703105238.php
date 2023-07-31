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

        <?php
        if (!empty($_GET['user_search'])) {
            $search_keyword = sanitize_text_field($_GET['user_search']);

            // First query: search in user_login and user_email
            $args1 = array(
                'search' => "*{$search_keyword}*",
                'search_columns' => array(
                    'user_login',
                    'user_email',
                ),
            );

            $users1 = get_users($args1);

            // Second query: search in user meta
            $args2 = array(
                'meta_query' => [
                    'relation' => 'OR',
                    [
                        'key' => 'address',
                        'value' => $search_keyword,
                        'compare' => 'LIKE'
                    ],
                    [
                        'key' => 'age',
                        'value' => $search_keyword,
                        'compare' => 'LIKE'
                    ],
                    [
                        'key' => 'university',
                        'value' => $search_keyword,
                        'compare' => 'LIKE'
                    ],
                    [
                        'key' => 'faculty',
                        'value' => $search_keyword,
                        'compare' => 'LIKE'
                    ]
                ]
            );

            $users2 = get_users($args2);

            // Merge the results of the two queries
            $users = array_merge($users1, $users2);

            if (!empty($users)) {
                echo '<ul>';
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
                echo '該当するユーザーはいません。';
            }
        } else {
            // 検索キーワードが入力されていない場合は、すべてのユーザーを表示します
            $users = get_users();

            // if (!empty($users)) {
            if (!empty($_GET['user_search']) && empty($_GET['user_search'])) {
                foreach ($users as $user) {

                    $address = get_user_meta($user->ID, 'address', true);
                    $age = get_user_meta($user->ID, 'age', true);
                    $university = get_user_meta($user->ID, 'university', true);
                    $faculty = get_user_meta($user->ID, 'faculty', true);

                    ?>
                    <ul class="list__box">
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
                    </ul>
                    <?php
                }
  
            } else {
                echo 'ユーザーが存在しません。';
            }
        }
        ?>

    </div>
</div>




















<?php get_footer(); ?>
