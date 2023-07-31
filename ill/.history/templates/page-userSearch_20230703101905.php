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


        <?php
// if (isset($_GET['user_search']) && !empty($_GET['user_search'])) {
// 	$search_keyword = sanitize_text_field($_GET['user_search']);
// 	$args = array(
// 			'search' => "*{$search_keyword}*",
// 			'search_columns' => array(
// 					'user_login',
// 					'ID',
// 			),
// 	);
// 	$users = get_users($args);
	
// }else{
// 	$users = get_users();
// }

// if (!empty($users)) {
//     echo '<ul>';
//     foreach ($users as $user) {
//         echo '<li style="border-bottom:1px solid;">ID: ' . $user->ID . ', ユーザー名: ' . $user->user_login . '</li>';
//     }
//     echo '</ul>';
// } else {
//     echo '登録されているユーザーはいません。';
// }

?>
















				<?php
                if (isset($_GET['user_search']) && !empty($_GET['user_search'])) {
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



    
        <ul class="list__box" style="color:red;">
            <?php foreach ($users as $user) : ?>
                <?php
                $address = get_user_meta($user->ID, 'address', true);
                $age = get_user_meta($user->ID, 'age', true);
                $university = get_user_meta($user->ID, 'university', true);
                $faculty = get_user_meta($user->ID, 'faculty', true);
                ?>
                <!-- <li class="list">ID: <?php echo $user->ID; ?>, ユーザー名: <?php echo $user->user_login; ?>, メールアドレス: <?php echo $user->user_email; ?>, 住所: <?php echo $address; ?>, 年齢: <?php echo $age; ?>, 大学: <?php echo $university; ?>, 学部: <?php echo $faculty; ?></li> -->

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
            <?php endforeach; ?>
        </ul>


    </div>
</div>









<?php
if (isset($_GET['user_search']) && !empty($_GET['user_search'])) {
    $search_query = $_GET['user_search'];

    $args = array(
        'search'         => '*' . sanitize_text_field($search_query) . '*',
        'search_columns' => array('ID', 'user_email', 'display_name'),
        'meta_query'     => array(
            'relation' => 'OR',
            array(
                'key'     => 'aaa',
                'value'   => sanitize_text_field($search_query),
                'compare' => 'LIKE',
            ),
            array(
                'key'     => 'bbb',
                'value'   => sanitize_text_field($search_query),
                'compare' => 'LIKE',
            ),
        ),
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
