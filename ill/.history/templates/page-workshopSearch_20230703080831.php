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
<link href="<?php echo get_template_directory_uri() ?>/asset/css/page-workshopSearch.css" rel="stylesheet">


<div class="allsearch">
    <div class="inner">
        
        <form method="GET" action="" class="search-form">
            <label for="workshop_search" class="search-label">ワークショップ検索:</label>
            <input type="text" id="workshop_search" name="workshop_search" class="search-input">
            <input type="submit" value="検索" class="search-button">
        </form>

        
        <!--　石井 カスタム投稿のタイトル・コンテンツ、カスタムフィールド含む -->
        <?php
        if (isset($_GET['workshop_search'])) {
            $search_query = $_GET['workshop_search'];
            $args = array(
                'post_type' => 'workshop',
                'posts_per_page' => -1,
                's' => $search_keyword,
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

                    $post_id = get_the_ID();
                    $place = get_field('place');
                    $salesperson = get_field('salesperson');
                    $teacher = get_field('teacher');
                    ?>

                    <ul>
                        <li class="list">
                            <p>ID:　 <?php echo $post_id; ?></p>
                            <p>タイトル：<?php echo get_the_title(); ?></p>
                            <p>コンテンツ：<?php echo get_the_content(); ?></p>
                            <p>場所：<?php echo $place; ?></p>
                            <p>営業担当者：<?php echo $salesperson; ?></p>
                            <p>教師：<?php echo $teacher; ?></p>
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






















<!-- 石井　カスタム投稿のタイトル・コンテンツ以外の検索 -->
<?php
        // if (isset($_GET['workshop_search']) && !empty($_GET['workshop_search'])) {
        //     $search_keyword = sanitize_text_field($_GET['workshop_search']);

        //     $args = array(
        //         'post_type' => 'workshop',

        //         // 's' => $search_keyword, // タイトルとコンテンツの検索キーワード

        //         'meta_query' => array(
        //             'relation' => 'OR',
        //             array(
        //                 'key' => 'place',
        //                 'value' => $search_keyword,
        //                 'compare' => 'LIKE'
        //             ),
        //             array(
        //                 'key' => 'salesperson',
        //                 'value' => $search_keyword,
        //                 'compare' => 'LIKE'
        //             ),
        //             array(
        //                 'key' => 'teacher',
        //                 'value' => $search_keyword,
        //                 'compare' => 'LIKE'
        //             )
        //         ),
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
        //     while ($workshops_query->have_posts()) {
        //         $workshops_query->the_post();
        //         $post_id = get_the_ID();
        //         $place = get_post_meta($post_id, 'place', true);
        //         $salesperson = get_post_meta($post_id, 'salesperson', true);
        //         $teacher = get_post_meta($post_id, 'teacher', true);
        //         // echo '<li class="list">ID: ' . $post_id . ', タイトル: ' . get_the_title() . ', コンテンツ: ' . get_the_content() . ', 場所: ' . $place . ', 営業担当者: ' . $salesperson . ', 教師: ' . $teacher . '</li>';
                // echo '<li class="list"><p>ID: ' . $post_id . '</p><p>タイトル: ' . get_the_title() . '</p><p>コンテンツ: ' . get_the_content() . '</p><p>場所: ' . $place . '</p><p>営業担当者: ' . $salesperson . '</p><p>教師: ' . $teacher . '</p></li>';

        //     }
        //     echo '</ul>';
        // } else {
        //     echo '登録されているワークショップはありません。';
        // }
        // wp_reset_postdata();
        ?>

















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

 <!-- 丹波さんコード -->
 <?php
        // if (isset($_GET['workshop_search']) && !empty($_GET['workshop_search'])) {
        //     $search_keyword = sanitize_text_field($_GET['workshop_search']);
        //     $args = array(
        //         'post_type' => 'workshop',
        //         's' => $search_keyword,
        //     );
        //     $workshops_query = new WP_Query($args);
            
        // }else{
        //     $args = array(
        //         'post_type' => 'workshop',
        //     );
        //     $workshops_query = new WP_Query($args);
        // }

        // if ($workshops_query->have_posts()) {
        //     echo '<ul>';
        //     while($workshops_query->have_posts()) {
        //         $workshops_query->the_post();
        //         // echo '<li class="list">ID: ' . get_the_ID() . ', ワークショップ名: ' . get_the_title() . '</li>';
        //         echo '<li class="list">ID: ' . $post_id . ', タイトル: ' . get_the_title() . ', コンテンツ: ' . get_the_content() . ', 場所: ' . $place . ', 営業担当者: ' . $salesperson . ', 教師: ' . $teacher . '</li>';
        //     }
        //     echo '</ul>';
        // } else {
        //     echo '登録されているワークショップはありません。';
        // }
        // wp_reset_postdata();
?>





























<?php
// $user_data = wp_get_current_user();
//     echo 'ユーザー名: ' . $user_data->display_name;
//     echo '<br>';
//     echo 'メールアドレス: ' . $current_user->user_email;
?>
<?php 
// $users = get_users(array(
// 'orderby'=>ID,
// 'order'=>ASC,
// )); 
?>
<ul class="users_list">
  <!-- <//?php
  foreach($users as $user) {
  $uid = $user->ID; ?>
  <li>
  <a href="<//?php echo get_bloginfo("url") . '/?author=' . $uid ?>"><?php echo $user->display_name ; ?></a>
  </li>
  <//?php } ?> -->
</ul>
<?php
    // $users = get_users();
    // foreach ($users as $user) {
    //   // echo 'User: ' . $user->user_login . ', Email: ' . $user->user_email . '<br/>';
    //  echo '<br>' . $user->user_login . '<br>' . $user->user_email . '<br/>';
    // }
?>


<?php get_footer(); ?>
