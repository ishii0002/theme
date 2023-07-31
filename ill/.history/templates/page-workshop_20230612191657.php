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








<form action="" method="post">
   <!-- 任意の<input>要素＝入力欄などを用意する -->
   <input type="text" name="input1">
   <!-- 送信ボタンを用意する -->
   <input type="submit" name="submit" value="送信">
</form>




<?php
    $users = get_users();

    foreach ($users as $user) {
      // echo 'User: ' . $user->user_login . ', Email: ' . $user->user_email . '<br/>';
     echo '<br>' . $user->user_login . '<br>' . $user->user_email . '<br/>';
    }
?>





<!-- <form action="http://www.google.co.jp/search" method="get">
 <input type="search" name="search" placeholder="キーワードを入力”>
 <input type="submit" name="submit" value="検索”>
</form> -->






<?php get_footer(); ?>
