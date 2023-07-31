<?php

/**
 * Template Name: workshop
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage I'LL
 * @since I'LL 1.0
 */
get_header(); ?>
<link href="<?php echo get_template_directory_uri() ?>/asset/css/front-page.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri() ?>/asset/css/page-about.css" rel="stylesheet">

<?php get_template_part('include/header'); ?>



<!-- 会社概要ページ -->


<!-- 下層ページ main visual -->
<!-- <section class="pageMainVisual">
  <figure class="pageMainVisual__image" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/page/front/ddd.jpg)"></figure>
</section> -->




<br><br><br><br><br><br><br><br><br><br><br><br><br>
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
















<!-- SQL文の例： -->
<?php
$keyword_user_email_array = $wpdb->get_results("SELECT `ID`, `user_email`, `display_name` FROM `wp_users` WHERE `user_email` LIKE '%$keyword_GET%' ORDER BY `ID` ASC", ARRAY_A);
?>





<form method="GET" action="">
    <label for="user_search">ユーザー検索:</label>
    <input type="text" id="user_search" name="user_search" style="border: 1px solid;">
    <input type="submit" value="検索">
</form>

<?php
if (isset($_GET['user_search']) && !empty($_GET['user_search'])) {
	$search_keyword = sanitize_text_field($_GET['user_search']);
	$args = array(
			'search' => "*{$search_keyword}*",
			'search_columns' => array(
					'user_login',
					'ID',
			),
	);
	$users = get_users($args);
	
}else{
	$users = get_users();
}

if (!empty($users)) {
    echo '<ul>';
    foreach ($users as $user) {
        echo '<li style="border-bottom:1px solid;">ID: ' . $user->ID . ', ユーザー名: ' . $user->user_login . '</li>';
    }
    echo '</ul>';
} else {
    echo '登録されているユーザーはいません。';
}

?>






<?php get_footer(); ?>
