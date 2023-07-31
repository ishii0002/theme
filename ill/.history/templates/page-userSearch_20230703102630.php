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





<!-- SQL文の例： 丹波さんコード -->
<?php
// $keyword_user_email_array = $wpdb->get_results("SELECT `ID`, `user_email`, `display_name` FROM `wp_users` WHERE `user_email` LIKE '%$keyword_GET%' ORDER BY `ID` ASC", ARRAY_A);
?>


<!-- ユーザー検索の例： 丹波さんコード -->
<!-- <form method="GET" action="">
    <label for="user_search">ユーザー検索:</label>
    <input type="text" id="user_search" name="user_search" style="border: 1px solid;">
    <input type="submit" value="検索">
</form> -->



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

                echo '<li class="list">ID: ' . $user->ID . ', ユーザー名: ' . $user->user_login . ', メールアドレス: ' . $user->user_email . ', 住所: ' . $address . ', 年齢: ' . $age . ', 大学: ' . $university . ', 学部: ' . $faculty . '</li>';
            }
            echo '</ul>';
        } else {
            echo '該当するユーザーはいません。';
        }
    } else {
        // If no search keyword is entered, display all users
        $users = get_users();

        if (!empty($users)) {
            echo '<ul>';
            foreach ($users as $user) {
                $address = get_user_meta($user->ID, 'address', true);
                $age = get_user_meta($user->ID, 'age', true);
                $university = get_user_meta($user->ID, 'university', true);
                $faculty = get_user_meta($user->ID, 'faculty', true);

                echo '<li class="list">ID: ' . $user->ID . ', ユーザー名: ' . $user->user_login . ', メールアドレス: ' . $user->user_email . ', 住所: ' . $address . ', 年齢: ' . $age . ', 大学: ' . $university . ', 学部: ' . $faculty . '</li>';
            }
            echo '</ul>';
        } else {
            echo 'ユーザーが存在しません。';
        }
    }
?>



     








    </div>
</div>










<style>
.allsearch {
    margin-top: 50px;
}
.search-form {
    margin-bottom: 20px;
}
.list {
    border-bottom:1px solid;
    margin-bottom: 50px;
    font-size: 20px;
    
}


.search-label {
    font-size: 16px;
    font-weight: bold;
    margin-right: 10px;
}

.search-input {
    border: 1px solid #ccc;
    padding: 5px 10px;
    font-size: 14px;
}

.search-button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin-left: 10px;
    cursor: pointer;
}

.user-list {
    list-style: none;
    padding: 0;
}

.user-list-item {
    border-bottom: 1px solid #ccc;
    padding: 10px 0;
}

.no-user-message {
    color: red;
}

</style>

















<?php get_footer(); ?>
