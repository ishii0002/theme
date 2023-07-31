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
if (isset($_GET['workshop_search'])) {
    $search_query = $_GET['workshop_search'];
    $args = array(
        'post_type' => 'workshop',
        'posts_per_page' => -1,
        's' => $search_query,
        '_meta_or_title' => $search_query,
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'place',
                'value' => $search_query,
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'salesperson',
                'value' => $search_query,
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'teacher',
                'value' => $search_query,
                'compare' => 'LIKE'
            )
        ),
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            // $post_id = get_the_ID();
            $place = get_field('place');
            $salesperson = get_field('salesperson');
            $teacher = get_field('teacher');
            
            // ユーザー情報の取得
            $user = wp_get_current_user();
            $username = $user->user_login;
            $useremail = $user->user_email;
            ?>

            <ul class="list__box">
                <li class="list">
                    <!-- <div class="list__flex">
                        <p class="list__flexLeft">ID：</p>
                        <p class="list__flexRight"><?php echo $post_id; ?></p>
                    </div> -->
                    <div class="list__flex">
                        <p class="list__flexLeft">タイトル：</p>
                        <p class="list__flexRight"><?php echo get_the_title(); ?></p>
                    </div>
                    <div class="list__flex">
                        <p class="list__flexLeft">コンテンツ：</p>
                        <p class="list__flexRight"><?php echo get_the_content(); ?></p>
                    </div>
                    <div class="list__flex">
                        <p class="list__flexLeft">場所：</p>
                        <p class="list__flexRight"><?php echo $place; ?></p>
                    </div>
                    <div class="list__flex">
                        <p class="list__flexLeft">定員：</p>
                        <p class="list__flexRight"><?php echo $salesperson; ?></p>
                    </div>
                    <div class="list__flex">
                        <p class="list__flexLeft">教師：</p>
                        <p class="list__flexRight"><?php echo $teacher; ?></p>
                    </div>
                    <div class="list__flex">
                        <p class="list__flexLeft">ユーザー名：</p>
                        <p class="list__flexRight"><?php echo $username; ?></p>
                    </div>
                    <div class="list__flex">
                        <p class="list__flexLeft">ユーザーメールアドレス：</p>
                        <p class="list__flexRight"><?php echo $useremail; ?></p>
                    </div>
                </li>
            </ul>

            <?php
        }
    } else {
        echo '該当する投稿はありません。';
    }

    wp_reset_postdata();
}
?>



    
        


    </div>
</div>



































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
