<?php

/**
 * Template Name: ワークショップ検索
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
$keyword_user_email_array = $wpdb->get_results("SELECT `ID`, `user_email`, `display_name` FROM `wp_users` WHERE `user_email` LIKE '%$keyword_GET%' ORDER BY `ID` ASC", ARRAY_A);
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
            <label for="workshop_search" class="search-label">ワークショップ検索:</label>
            <input type="text" id="workshop_search" name="workshop_search" class="search-input">
            <input type="submit" value="検索" class="search-button">
        </form>


<!-- タイトル　コンテンツ以外 -->
<?php
if (isset($_GET['workshop_search']) && !empty($_GET['workshop_search'])) {
    $search_keyword = sanitize_text_field($_GET['workshop_search']);

    $args = array(
        'post_type' => 'workshop',
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'place',
                'value' => $search_keyword,
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'salesperson',
                'value' => $search_keyword,
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'teacher',
                'value' => $search_keyword,
                'compare' => 'LIKE'
            )
        ),
        '_meta_or_title' => $search_keyword, // 追加: タイトルとコンテンツの検索キーワード
    );
    $workshops_query = new WP_Query($args);
} else {
    $args = array(
        'post_type' => 'workshop',
    );
    $workshops_query = new WP_Query($args);
}

if ($workshops_query->have_posts()) {
    echo '<ul>';
    while ($workshops_query->have_posts()) {
        $workshops_query->the_post();
        $post_id = get_the_ID();
        $place = get_post_meta($post_id, 'place', true);
        $salesperson = get_post_meta($post_id, 'salesperson', true);
        $teacher = get_post_meta($post_id, 'teacher', true);
        echo '<li class="list">ID: ' . $post_id . ', ワークショップ名: ' . get_the_title() . ', 場所: ' . $place . ', 営業担当者: ' . $salesperson . ', 教師: ' . $teacher . '</li>';
        echo '<h2>' . 'タイトル：' . get_the_title() . '</h2>';
        echo '<p>' . get_the_content() . '</p>';
    }
    echo '</ul>';
} else {
    echo '登録されているワークショップはありません。';
}
wp_reset_postdata();
?>





<?php
// if (isset($_GET['workshop_search']) && !empty($_GET['workshop_search'])) {
//     $search_keyword = sanitize_text_field($_GET['workshop_search']);
//     $args = array(
//         'post_type' => 'workshop',
//         's' => $search_keyword,  // タイトルとコンテンツを検索
//         'meta_query' => [
//             'relation' => 'OR',
//             [
//                 'key' => 'place',
//                 'value' => $search_keyword,
//                 'compare' => 'LIKE'
//             ],
//             [
//                 'key' => 'salesperson',
//                 'value' => $search_keyword,
//                 'compare' => 'LIKE'
//             ],
//             [
//                 'key' => 'teacher',
//                 'value' => $search_keyword,
//                 'compare' => 'LIKE'
//             ]
//         ]
//     );
//     $workshops_query = new WP_Query($args);
    
// } else {
//     $args = array(
//         'post_type' => 'workshop',
//     );
//     $workshops_query = new WP_Query($args);
// }

// if ($workshops_query->have_posts()) {
//     echo '<ul>';
//     while($workshops_query->have_posts()) {
//         $workshops_query->the_post();
//         $post_id = get_the_ID();
//         $place = get_post_meta($post_id, 'place', true);
//         $salesperson = get_post_meta($post_id, 'salesperson', true);
//         $teacher = get_post_meta($post_id, 'teacher', true);
//         echo '<li class="list">ID: ' . $post_id . ', ワークショップ名: ' . get_the_title() . ', 場所: ' . $place . ', 営業担当者: ' . $salesperson . ', 教師: ' . $teacher . '</li>';
//         echo '<h2>' . 'タイトル：'.get_the_title() . '</h2>';
//         echo '<p>' . get_the_content() . '</p>';
//     }
//     echo '</ul>';
// } else {
//     echo '登録されているワークショップはありません。';
// }
// wp_reset_postdata();
?>


    </div>
</div>
<?php
// echo '検索キーワード: ' . $search_keyword;
// echo '<li>Post ID: ' . $post_id . '</li>';
// echo '<li>Title: ' . get_the_title() . ', Content: ' . get_the_content() . '</li>';

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

















<?php
// $user_data = wp_get_current_user();
//     echo 'ユーザー名: ' . $user_data->display_name;
//     echo '<br>';
//     echo 'メールアドレス: ' . $current_user->user_email;
?>


<?php 
$users = get_users(array(
// 'orderby'=>ID,
// 'order'=>ASC,
)); 
?>

<ul class="users_list">
  <!-- <?php foreach($users as $user) {
  $uid = $user->ID; ?>
  <li>
  <a href="<?php echo get_bloginfo("url") . '/?author=' . $uid ?>"><?php echo $user->display_name ; ?></a>
  </li>
  <?php } ?> -->
</ul>


<?php
    // $users = get_users();

    // foreach ($users as $user) {
    //   // echo 'User: ' . $user->user_login . ', Email: ' . $user->user_email . '<br/>';
    //  echo '<br>' . $user->user_login . '<br>' . $user->user_email . '<br/>';
    // }
?>

<?php get_footer(); ?>
