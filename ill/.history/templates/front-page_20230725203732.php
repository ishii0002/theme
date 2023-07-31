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




<div class="itemThumb">
    <ul>
        <li>
            <img src="https://image1.shopserve.jp/shop.shiffon-randoseru.jp/pic-labo/llimg/pjr-22003_main.jpg?t=20230630154550" alt="スカイブルー" onMouseover="changeImg(this);" id="thumb1" />
        </li>
    </ul>
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

.itemThumb {
  position: relative;
}
.itemThumb img {
  content: attr(alt);
}
.itemThumb .alt-text {
  position: absolute;
  bottom: 5px;
  left: 10px;
  font-size: 10%;
  font-weight: bold;
  @media only screen and (max-width: 768px) {
    font-size: 10%;
  }
}
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
var images = document.querySelectorAll('.itemThumb img');
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






























２チーム
K1
user_name2
氏名(2人チームの2人目)

L1
user_firigana2
氏名（フリガナ）(2人チームの2人目)

M1
user_school2
所属(2人チームの2人目)

N1
user_emial2
メールアドレス(2人チームの2人目)

O1
user_tel2
電話番号(2人チームの2人目)










３チーム
Q1
user_name2_3
氏名(3人チームの2人目)

R1
user_firigana2_3
氏名（フリガナ）(3人チームの2人目)

S1
user_school2_3
所属(3人チームの2人目)

T1
user_emial2_3
メールアドレス(3人チームの2人目)

U1
user_tel2_3
電話番号(3人チームの2人目)























４チーム
AB1
user_name2_4
氏名(4人チームの2人目)

AC1
user_firigana2_4
氏名（フリガナ）(4人チームの2人目)

AD1
user_school2_4
所属(4人チームの2人目)

AE1
user_emial2_4
メールアドレス(4人チームの2人目)

AF1
user_tel2_4
電話番号(4人チームの2人目)





























５チーム
AR1
user_name2_5
氏名(5人チームの2人目)

AS1
user_firigana2_5
氏名（フリガナ）(5人チームの2人目)

AT1
user_school2_5
所属(5人チームの2人目)

AU1
user_emial2_5
メールアドレス(5人チームの2人目)

AV1
user_tel2_5
電話番号(5人チームの2人目)





















BG1
user_name5
氏名(5人チームの5人目)

BH1
user_firigana5
氏名（フリガナ）(5人チームの5人目)

BI1
user_school5
所属(5人チームの5人目)

BJ1
user_emial5
メールアドレス(5人チームの5人目)

BK1
user_tel5
電話番号(5人チームの5人目)












６チーム
BM1
user_name2_6
氏名(6人チームの2人目)

BN1
user_firigana2_6
氏名（フリガナ）(6人チームの2人目)

BO1
user_school2_6
所属(6人チームの2人目)

BP1
user_emial2_6
メールアドレス(6人チームの2人目)

BQ1
user_tel2_6
電話番号(6人チームの2人目)





















CB1
user_name5_6
氏名(6人チームの5人目)

CC1
user_firigana5_6
氏名（フリガナ）(6人チームの5人目)

CD1
user_school5_6
所属(6人チームの5人目)

CE1
user_emial5_6
メールアドレス(6人チームの5人目)

CF1
user_tel5_6
電話番号(6人チームの5人目)

CG1
user_name6
氏名(6人チームの6人目)

CH1
user_firigana6
氏名（フリガナ）(6人チームの6人目)

CI1
user_school6
所属(6人チームの6人目)

CJ1
user_emial6
メールアドレス(6人チームの6人目)

CK1
user_tel6
電話番号(6人チームの6人目)
