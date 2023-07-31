<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!is_wp_error($user_id)) {
        // ユーザーのロールをセットします。デフォルトは'subscriber'です。
        $user = new WP_User($user_id);
        $user->set_role('subscriber');
        
        // $_POSTから送信されたデータを取得します。
        $workshop_title = sanitize_text_field($_POST['workshop_title']);
        $workshop_content = sanitize_text_field($_POST['workshop_content']);

        $workshop_place = sanitize_text_field($_POST['place']);

        // ここでworkshopの投稿を作成します。
        $workshop_post = array(
            'post_title'    => $workshop_title,
            'post_content'  => $workshop_content,
            'post_status'   => 'publish',
            'post_author'   => $user_id,
            'post_type'     => 'workshop',
        );
        
        // Insert the post into the database
        $post_id = wp_insert_post( $workshop_post );

        // カスタムフィールドの追加
        add_post_meta($post_id, 'place', $workshop_place, true); // 追加

        // ここでリダイレクトします（クエリパラメータを付け加えます）
        // wp_redirect('https://ishii.check-demo2.site/page-postformcompletion/?title=' . urlencode($workshop_title) . '&content=' . urlencode($workshop_content));
        wp_redirect('https://ishii.check-demo2.site/page-postformcompletion/?title=' . urlencode($workshop_title) . '&content=' . urlencode($workshop_content) . '&place=' . urlencode($workshop_place));

        exit;
    }
}




// if($_SERVER['REQUEST_METHOD'] === 'POST') {

//     if (!is_wp_error($user_id)) {
//         // ユーザーのロールをセットします。デフォルトは'subscriber'です。
//         $user = new WP_User($user_id);
//         $user->set_role('subscriber');
        
//         // $_POSTから送信されたデータを取得します。
//         $workshop_title = sanitize_text_field($_POST['workshop_title']);
//         $workshop_content = sanitize_text_field($_POST['workshop_content']);

//         $workshop_place = sanitize_text_field($_POST['place']);

//         // ここでworkshopの投稿を作成します。
//         $workshop_post = array(
//             'post_title'    => $workshop_title,
//             'post_content'  => $workshop_content,
//             'post_status'   => 'publish',
//             'post_author'   => $user_id,
//             'post_type'     => 'workshop',
//         );
        
//         // Insert the post into the database
//         $post_id = wp_insert_post( $workshop_post );

//         // カスタムフィールドの追加
//         // add_post_meta($post_id, 'place', $workshop_place, true); // 追加
//         $field_key = "workshop"; // これは例で、正確なフィールドキーを入力してください。
//         $success = update_field($field_key, $workshop_place, $post_id);
//         if (!$success) {
//                     // フィールドの更新が失敗した場合のエラーハンドリング
//         error_log("Failed to update custom field with key: {$field_key}");
//         }


//         // ここでリダイレクトします（クエリパラメータを付け加えます）
//         // wp_redirect('https://ishii.check-demo2.site/page-postformcompletion/?title=' . urlencode($workshop_title) . '&content=' . urlencode($workshop_content));
//         wp_redirect('https://ishii.check-demo2.site/page-postformcompletion/?title=' . urlencode($workshop_title) . '&content=' . urlencode($workshop_content) . '&workshop-place=' . urlencode($workshop_place));

//         exit;
//     }
// }







/**
 * Template Name: 投稿フォーム
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage I'LL
 * @since I'LL 1.0
 */
get_header(); ?>
<link href="<?php echo get_template_directory_uri() ?>/asset/css/front-page.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri() ?>/asset/css/page-contact.css" rel="stylesheet">















<form method="POST" action="">

    <label for="workshop_title">ワークショップタイトル：</label>
    <input type="text" id="workshop_title" name="workshop_title">

    <label for="workshop_content">ワークショップコンテンツ：</label>
    <textarea id="workshop_content" name="workshop_content"></textarea>

    <label for="place">ワークショップ場所：</label>
    <input type="text" id="place" name="place">

    <label for="salesperson">ワークショップ場所：</label>
    <input type="text" id="salesperson" name="salesperson">

    <label for="place">ワークショップ場所：</label>
    <input type="text" id="place" name="place">

    <input type="submit" value="登録する" id="submit">
</form>






<?php get_footer(); ?>

