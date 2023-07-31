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
    }
?>



        <?php
        // if (isset($_GET['user_search']) && !empty($_GET['user_search'])) {
        //     $search_keyword = sanitize_text_field($_GET['user_search']);
        //     $args = array(
				// 			'search' => "*{$search_keyword}*",
				// 			'search_columns' => array(
				// 			'user_login',
				// 			'ID',
				// 			),
        //     );
        //     $users = get_users($args);
            
        // }else{
        //     $users = get_users();
        // }

        // if (!empty($users)) {
        //     echo '<ul>';
        //     foreach ($users as $user) {
        //         echo '<li class="list">ID: ' . $user->ID . ', ユーザー名: ' . $user->user_login . '</li>';
        //     }
        //     echo '</ul>';
        // } else {
        //     echo '登録されているユーザーはいません。';
        // }

        ?>




<?php
    // if (isset($_GET['user_search']) && !empty($_GET['user_search'])) {
    //     $search_keyword = sanitize_text_field($_GET['user_search']);
    //     $args = array(
    //         'search' => "*{$search_keyword}*",
    //         'search_columns' => array(
    //             'user_login',
    //             'ID',
    //         ),
    //     );





		// 		$args = [
		// 			'post_type' => 'salon',
		// 			'taxonomy' => 'salon_category', //タクソノミータイプ
		// 			'paged' => $paged,
		// 			'order' => 'DESC',
		// 			'posts_per_page' => 10,

		// 			'meta_key' => 'store_postal_code_search', //カスタムフィールド名
		// 			'orderby' => 'meta_value_num',
		// 			'order' => 'ASC',
		// 			'meta_query' => [
		// 				'relation' => 'OR',
		// 				[
		// 					'key' => ['address', 'age', 'university', 'faculty'], // 店舗名
		// 					'value' => $get_search, //
		// 					'compare' => 'LIKE', // 部分一致
						
		// 				],
		// 			],
		// 		];








    //     $users = get_users($args);
        
    // }else{
    //     $users = get_users();
    // }

    // if (!empty($users)) {
    //     echo '<ul>';
    //     foreach ($users as $user) {
    //         $address = get_user_meta($user->ID, 'address', true);
    //         $age = get_user_meta($user->ID, 'age', true);
    //         $university = get_user_meta($user->ID, 'university', true);
    //         $faculty = get_user_meta($user->ID, 'faculty', true);

    //         echo '<li class="list">ID: ' . $user->ID . ', ユーザー名: ' . $user->user_login . ', 住所: ' . $address . ', 年齢: ' . $age . ', 大学: ' . $university . ', 学部: ' . $faculty . '</li>';
    //     }
    //     echo '</ul>';
    // } else {
    //     echo '登録されているユーザーはいません。';
    // }
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
