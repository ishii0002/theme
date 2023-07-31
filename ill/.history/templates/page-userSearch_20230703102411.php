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
<!-- <link href="<?php echo get_template_directory_uri() ?>/asset/css/page-allsearch.css" rel="stylesheet"> -->

<link href="<?php echo get_template_directory_uri() ?>/asset/css/page-workshopSearch.css" rel="stylesheet">



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
