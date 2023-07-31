<?php

/**
 * Template Name: トップページ
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage I'LL
 * @since I'LL 1.0
 */
get_header(); ?>
<link href="<?php echo get_template_directory_uri() ?>/asset/css/front-page.css" rel="stylesheet">





<?php get_template_part('include/header'); ?>


<?php get_template_part('include/swiper'); ?>


<?php
// // セッションを開始
// if (!session_id()) {
//     session_start();
// }

// if($_SERVER['REQUEST_METHOD'] === 'POST') {

//     $user_login = $_POST['user_login'];
//     $password = $_POST['password'];
//     $email = $_POST['email'];
//     $address = $_POST['address'];
//     $age = $_POST['age'];
//     $university = $_POST['university'];
//     $faculty = $_POST['faculty'];

//     // ユーザーIDの取得（ここでは現在ログインしているユーザーのIDを取得します。状況により異なる場合があります。）
//     $current_user = wp_get_current_user();
//     $user_id = $current_user->ID;

//     $userdata = array(
//         'ID' => $user_id,
//         'user_pass' => $password, // ユーザーに新しいパスワードを設定する
//         'user_email' => $email // ユーザーに新しいメールを設定する
//         // 必要に応じて他のパラメータを追加
//     );
//     $user_id = wp_update_user($userdata);

//     if (!is_wp_error($user_id)) {
//         // カスタムフィールドを保存
//         update_user_meta($user_id, 'address', $address);
//         update_user_meta($user_id, 'age', $age);
//         update_user_meta($user_id, 'university', $university);
//         update_user_meta($user_id, 'faculty', $faculty);
        
//         // ユーザーデータをセッションに追加
//         $_SESSION['user_login'] = $user_login;
//         $_SESSION['email'] = $email;
//         $_SESSION['password'] = $password;
//         $_SESSION['address'] = $address;
//         $_SESSION['age'] = $age;
//         $_SESSION['university'] = $university;
//         $_SESSION['faculty'] = $faculty;

//         // ここでリダイレクトします
//         wp_redirect('https://ishii.check-demo2.site/contact-completion/');
//         exit;
//     }
// }
?>







<!-- ユーザー登録を更新（編集） -->
<?php
// セッションを開始
if (!session_id()) {
  session_start();
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {

  // 既存のユーザー情報の取得
  $current_user = wp_get_current_user();

  // 各フィールドが空白であれば既存の情報を、空白でなければ新たに入力された情報を使用します
  $user_login = $_POST['user_login'] ? $_POST['user_login'] : $current_user->user_login;
  $password = $_POST['password'] ? $_POST['password'] : $current_user->user_pass;
  $email = $_POST['email'] ? $_POST['email'] : $current_user->user_email;
  $address = $_POST['address'] ? $_POST['address'] : get_user_meta($current_user->ID, 'address', true);
  $age = $_POST['age'] ? $_POST['age'] : get_user_meta($current_user->ID, 'age', true);
  $university = $_POST['university'] ? $_POST['university'] : get_user_meta($current_user->ID, 'university', true);
  $faculty = $_POST['faculty'] ? $_POST['faculty'] : get_user_meta($current_user->ID, 'faculty', true);

  $user_id = $current_user->ID;

  $userdata = array(
      'ID' => $user_id,
      'user_login' => $user_login,
      'user_pass' => $password,
      'user_email' => $email
  );
  
  $user_id = wp_update_user($userdata);

  if (!is_wp_error($user_id)) {
      // カスタムフィールドを保存
      update_user_meta($user_id, 'address', $address);
      update_user_meta($user_id, 'age', $age);
      update_user_meta($user_id, 'university', $university);
      update_user_meta($user_id, 'faculty', $faculty);
      
      // ユーザーデータをセッションに追加
      $_SESSION['user_login'] = $user_login;
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $password;
      $_SESSION['address'] = $address;
      $_SESSION['age'] = $age;
      $_SESSION['university'] = $university;
      $_SESSION['faculty'] = $faculty;

      // ここでリダイレクトします
      wp_redirect('https://ishii.check-demo2.site/contact-completion/');
      exit;
  }
}
?>



<div class="inner">

<h1 style="font-size:20px; margin:50px 0 20px;">⬛️ユーザー登録を更新（編集）</h1>

<form method="POST" action="">

    <label for="user_login">ユーザー名：</label>
    <input type="text" id="user_login" name="user_login">
    <br>

    <label for="email">メール：</label>
    <input type="email" id="email" name="email">
    <br>

    <label for="password">パスワード</label>
    <input type="password" id="password" name="password" required>
    <br>

    <label for="address">住所</label>
    <input type="text" id="address" name="address">
    <br>
   
    <label for="age">年齢</label>
    <input type="text" id="age" name="age">
    <br>

    <label for="university">大学名</label>
    <input type="text" id="university" name="university">
    <br>
    <label for="faculty">学部</label>
    <input type="text" id="faculty" name="faculty">
    <br>

    <input type="submit" value="登録する" id="submit" style="background:red; color:#fff; font-size:20px;">
</form>


















<div class="ddd">
<a href="#"><img src="/wp-content/themes/ill/img/front/logo.png" alt="ああああああああああああ"></a>
</div>



<a href="#"><img src="/wp-content/themes/ill/img/front/logo.png" alt="ああああああああああああ"></a>



<style>
  .ddd {
    position: relative;
  }
  .ddd img {
  content: attr(alt);
  
}
.ddd .alt-text {
  position: absolute;
  bottom: 0;
  background-color: red;
}
</style>
<script>
var images = document.querySelectorAll('.ddd img');
  for (var i = 0; i < images.length; i++) {
    var altText = images[i].getAttribute('alt');
    if (altText) {
      var altElement = document.createElement('span');
      altElement.className = 'alt-text';
      altElement.appendChild(document.createTextNode(altText));
      images[i].parentNode.insertBefore(altElement, images[i]);
    }
  }
</script>










<div class="itemThumb-wrap">
<input type="hidden" name="mainImageURL" src="https://image1.shopserve.jp/shop.shiffon-randoseru.jp/pic-labo/llimg/pjr-22003_main.jpg">
<input type="hidden" name="mainPositionId" value="1">
<div class="itemThumb-main">
    <a href="javascript:void(0);" class="zoomItemPic">
        <!-- <img class="mainImg" src="https://image1.shopserve.jp/shop.shiffon-randoseru.jp/pic-labo/llimg/pjr-22003_main.jpg?t=20230630154550"
          id="1"
          alt="PAUL &amp; JOE(ポール &amp; ジョー)クリザンテームフレンチリボンランドセル【即納】" /> -->
          <img class="mainImg" src="/wp-content/themes/ill/img/front/logo.png" alt="スカイブルー">
        <input type="hidden" name="SETDATE" value="20230630154550"/>
    </a>
</div>



<style>
.itemThumb-main {
  position: relative;
}
.itemThumb-main .mainImg {
  content: attr(alt);
}
.itemThumb-main .alt-text {
  position: absolute;
  bottom: 5px;
  left: 10px;
  font-size: 16px;
  font-weight: bold;
  @media only screen and (max-width: 768px) {
    font-size: 13px;
  }
}


/* .itemThumb img {
  content: attr(alt);
} */
</style>

<script>
var images = document.querySelectorAll('.itemThumb-main img');
  for (var i = 0; i < images.length; i++) {
    var altText = images[i].getAttribute('alt');
    if (altText) {
      var altElement = document.createElement('span');
      altElement.className = 'alt-text';
      altElement.appendChild(document.createTextNode(altText));
      images[i].parentNode.insertBefore(altElement, images[i]);
    }
  }
</script>












<?php
  // $user_data = wp_get_current_user();
  // $user_idnm = $user_data->ID;
  // $user_meta = get_user_meta($user_idnm);
  // // 中身を確認する
  // var_dump($user_meta);
  // echo $user_meta;
?>
<?php
// $user_data = wp_get_current_user();
// if ($user_data->exists()) {
//     echo 'ユーザー名: ' . $user_data->display_name;
// } else {
//     echo 'ゲストユーザー';
// }
// var_dump($user_meta);
?>
<?php
// $user_data = wp_get_current_user();
//     echo 'ユーザー名: ' . $user_data->display_name;
//     echo '<br>';
//     echo 'メールアドレス: ' . $current_user->user_email;
?>



<?php
//ユーザー情報を呼び出す
//、wp_get_current_user()関数を使用して現在のユーザーオブジェクトを取得し、その後、display_nameプロパティを使用してユーザー名を表示しています。
// $user_info = get_userdata($user_id);
//   echo 'ユーザー名: ' . $user_data->display_name;
//   echo '<br>';
//   echo 'メールアドレス: ' . $current_user->user_email;
//   echo '<br>';

//   $user_info = get_userdata($user_id);
// echo 'ユーザー名: ' . $user_info->display_name;
// echo '<br>';
// echo 'メールアドレス: ' . $user_info->user_email;
// echo '<br>';





?>



<?php
// 投稿IDを指定
// $post_id = 1110; // 書き換えたい投稿のID

// // 投稿情報を取得
// $post = get_post($post_id);

// // 投稿情報を書き換え
// $post->post_title = '新しいタイトル';
// $post->post_content = '新しい本文';
// $post->post_category = array(1, 2); // カテゴリーのIDを指定
// // $post->tags_input = '新しいタグ1, 新しいタグ2';
// // $post->post_date = '2023-05-15 10:00:00'; // 公開日を指定

// // 投稿を更新
// wp_update_post($post);
?>






<!-- 記事 -->
<section>
  <!-- <?php
    $args = array(
        'post_type' => 'news',
        'paged' => $paged,
        'order' => 'DESC',
        'posts_per_page' => -1
    );
    
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
          while ( $query->have_posts() ) : $query->the_post();
      ?>
    <a class="workshop__wrap" href="<?php the_permalink(); ?>">

        <?php the_time('Y/m/d (D)'); ?>
        <br>
        <?php the_title(); ?>
        <?php the_content(); ?>

    </a>
    <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
  <?php endif; ?> -->
</section>























<?php get_template_part('include/sec1'); ?>

<?php get_template_part('include/sec2'); ?>

  <?php get_template_part('include/sec3'); ?>

  <?php get_template_part('include/sec4'); ?>

  <?php get_template_part('include/sec5'); ?>

</div>


<?php get_template_part('include/footer'); ?>



<?php get_footer(); ?>
