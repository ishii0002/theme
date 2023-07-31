<?php






if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!is_wp_error($user_id)) {
        // ユーザーのロールをセットします。デフォルトは'subscriber'です。
        $user = new WP_User($user_id);
        $user->set_role('subscriber');
        
    
        // ここでworkshopの投稿を作成します。
        $workshop_post = array(
   
          'post_type'     => 'workshop',
        );
        
        // Insert the post into the database
        wp_insert_post( $workshop_post );

        // ここでリダイレクトします
        wp_redirect('https://ishii.check-demo2.site/page-postformcompletion/');
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

    <label for="post_title">ワークショップタイトル：</label>
    <input type="text" id="post_title" name="post_title">

    <label for="workshop_content">ワークショップコンテンツ：</label>
    <textarea id="workshop_content" name="workshop_content"></textarea>

    <input type="submit" value="登録する" id="submit">
</form>





<style>
    
</style>


<?php get_footer(); ?>

