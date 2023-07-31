<?php
// if($_SERVER['REQUEST_METHOD'] === 'POST') {

//     if (!is_wp_error($user_id)) {
//         // ユーザーのロールをセットします。デフォルトは'subscriber'です。
//         $user = new WP_User($user_id);
//         $user->set_role('subscriber');
        
//         // $_POSTから送信されたデータを取得します。
//         $workshop_title = sanitize_text_field($_POST['workshop_title']);
//         $workshop_content = sanitize_text_field($_POST['workshop_content']);
    
//         // ここでworkshopの投稿を作成します。
//         $workshop_post = array(
//             'post_title'    => $workshop_title,
//             'post_content'  => $workshop_content,
//             'post_status'   => 'publish',
//             'post_author'   => $user_id,
//             'post_type'     => 'workshop',
//         );
        
//         // Insert the post into the database
//         wp_insert_post( $workshop_post );

//         // ここでリダイレクトします
//         wp_redirect('https://ishii.check-demo2.site/page-postformcompletion/');
//         exit;
//     }
// }
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!is_wp_error($user_id)) {
        // ユーザーのロールをセットします。デフォルトは'subscriber'です。
        $user = new WP_User($user_id);
        $user->set_role('subscriber');
        
        // $_POSTから送信されたデータを取得します。
        $workshop_title = sanitize_text_field($_POST['workshop_title']);
        $workshop_content = sanitize_text_field($_POST['workshop_content']);
    
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

        // ここでリダイレクトします（クエリパラメータを付け加えます）
        wp_redirect('https://ishii.check-demo2.site/page-postformcompletion/?title=' . urlencode($workshop_title) . '&content=' . urlencode($workshop_content));
        exit;
    }
}












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

    <label for="workshop_place">ワークショップ場所：</label>
    <input type="text" id="workshop_place" name="workshop_place">

    <input type="submit" value="登録する" id="submit">
</form>






<?php get_footer(); ?>

