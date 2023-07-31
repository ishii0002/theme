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

		



     








    </div>
</div>





<?php
    if (isset($_GET['user_search']) && !empty($_GET['user_search'])) {
        $search_query = $_GET['user_search'];

        $args = array(
          'search'         => '*' . sanitize_text_field($search_query) . '*',
          'search_columns' => array('ID', 'user_email', 'display_name'),
      );

        $user_query = new WP_User_Query($args);

        if (!empty($user_query->get_results())) {
          
            foreach ($user_query->get_results() as $user) {
                // ユーザー情報を表示する例
                echo '<ul class="user_lists">';
                echo '<li class="user_id">' .'ユーザーID：'. esc_html($user->id) . '</li>';
                echo '<li class="user_name">' .'ユーザー名：'. esc_html($user->display_name) . '</li>';
                echo '<li class="user_email">' .'メールアドレス'. esc_html($user->user_email) . '</li>';
                echo '</ul>';
                // 他のカスタムフィールドやユーザーメタデータを表示する例
            }
        } else {
            echo '<ul class="user_lists">';
            echo '<li class="user_id">' .' 該当するユーザー情報はありません。' . '</li>';
            echo '</ul>';
        }
    }
    ?>





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
