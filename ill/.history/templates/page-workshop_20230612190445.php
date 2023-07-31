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
    $users = get_users();

    foreach ($users as $user) {
      // echo 'User: ' . $user->user_login . ', Email: ' . $user->user_email . '<br/>';
     echo '<br>' . $user->user_login . '<br>' . $user->user_email . '<br/>';
    }
?>

<?php get_footer(); ?>
