<?php

// セッションを開始
if (!session_id()) {
    session_start();
}

// if($_SERVER['REQUEST_METHOD'] === 'POST') {

//     $user_login = $_POST['user_login'];
//     $password = $_POST['password'];
//     $email = $_POST['email'];

//     $user_id = wp_create_user($user_login, $password, $email);

//     if (!is_wp_error($user_id)) {
//         // ユーザーのロールをセットします。デフォルトは'subscriber'です。
//         $user = new WP_User($user_id);
//         $user->set_role('subscriber');
        
//         // ユーザーデータをセッションに追加
//         // $_SESSION['user'] = $user_login;
//         $_SESSION['user_login'] = $user_login;
//         $_SESSION['email'] = $email;
//         $_SESSION['password'] = $password;

//         // ここでリダイレクトします
//         wp_redirect('https://ishii.check-demo2.site/contact-completion/');
//         exit;
//     }
// }
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user_login = $_POST['user_login'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $university = $_POST['university'];
    $faculty = $_POST['faculty'];

    $user_id = wp_create_user($user_login, $password, $email);

    if (!is_wp_error($user_id)) {
        // ユーザーのロールをセットします。デフォルトは'subscriber'です。
        $user = new WP_User($user_id);
        $user->set_role('subscriber');
        
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


/**
 * Template Name: フォーム
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage I'LL
 * @since I'LL 1.0
 */
get_header(); ?>
<link href="<?php echo get_template_directory_uri() ?>/asset/css/front-page.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri() ?>/asset/css/page-contact.css" rel="stylesheet">





<form method="POST" action="">

    <label for="user_login">ユーザー名：</label>
    <input type="text" id="user_login" name="user_login">


    <label for="email">メール：</label>
    <input type="email" id="email" name="email">


    <label for="password">パスワード</label>
    <input type="password" id="password" name="password" required>


    <label for="address">住所</label>
    <input type="text" id="address" name="address">

   
    <label for="age">年齢</label>
    <input type="text" id="age" name="age">

    <label for="university">大学名</label>
    <input type="text" id="university" name="university">

    <label for="faculty">学部</label>
    <input type="text" id="faculty" name="faculty">


    <input type="submit" value="登録する" id="submit">
</form>







<style>
    
</style>


<?php get_footer(); ?>












<div>2アコーディオン</div>
K1
user_name2
氏名(2人チームの2人目)

Q1
user_name2_3
氏名(3人チームの2人目)

AB1
user_name2_4
氏名(4人チームの2人目)

AR1
user_name2_5
氏名(5人チームの2人目)

BM1
user_name2_6
氏名(6人チームの2人目)






L1
user_firigana2
氏名（フリガナ）(2人チームの2人目)

R1
user_firigana2_3
氏名（フリガナ）(3人チームの2人目)

AC1
user_firigana2_4
氏名（フリガナ）(4人チームの2人目)

AS1
user_firigana2_5
氏名（フリガナ）(5人チームの2人目)

BN1
user_firigana2_6
氏名（フリガナ）(6人チームの2人目)






M1
user_school2
所属(2人チームの2人目)

S1
user_school2_3
所属(3人チームの2人目)

AD1
user_school2_4
所属(4人チームの2人目)

AT1
user_school2_5
所属(5人チームの2人目)

BO1
user_school2_6
所属(6人チームの2人目)





N1
user_emial2
メールアドレス(2人チームの2人目)


T1
user_emial2_3
メールアドレス(3人チームの2人目)

AE1
user_emial2_4
メールアドレス(4人チームの2人目)

AU1
user_emial2_5
メールアドレス(5人チームの2人目)

BP1
user_emial2_6
メールアドレス(6人チームの2人目)





O1
user_tel2
電話番号(2人チームの2人目)


U1
user_tel2_3
電話番号(3人チームの2人目)

AF1
user_tel2_4
電話番号(4人チームの2人目)

AV1
user_tel2_5
電話番号(5人チームの2人目)

BQ1
user_tel2_6
電話番号(6人チームの2人目)




<div>3アコーディオン</div>





















アコーディオン ごとの3人目
名前
V1
user_name3
氏名(3人チームの3人目)

AG1
user_name3_4
氏名(4人チームの3人目)

AW1
user_name3_5
氏名(5人チームの3人目)

BR1
user_name3_6
氏名(6人チームの3人目)





アコーディオン ごとの3人目
フリガナ
W1
user_firigana3
氏名（フリガナ）(3人チームの3人目)

AH1
user_firigana3_4
氏名（フリガナ）(4人チームの3人目)

AX1
user_firigana3_5
氏名（フリガナ）(5人チームの3人目)

BS1
user_firigana3_6
氏名（フリガナ）(6人チームの3人目)





アコーディオン ごとの3人目
所属
X1
user_school3
所属(3人チームの3人目)

AI1
user_school3_4
所属(4人チームの3人目)

AY1
user_school3_5
所属(5人チームの3人目)

BT1
user_school3_6
所属(6人チームの3人目)





アコーディオン ごとの3人目
メールアドレス
Y1
user_emial3
メールアドレス(3人チームの3人目)

AJ1
user_emial3_4
メールアドレス(4人チームの3人目)

AZ1
user_emial3_5
メールアドレス(5人チームの3人目)

BU1
user_emial3_6
メールアドレス(6人チームの3人目)






アコーディオン ごとの3人目
電話番号
Z1
user_tel3
電話番号(3人チームの3人目)

AK1
user_tel3_4
電話番号(4人チームの3人目)

BA1
user_tel3_5
電話番号(5人チームの3人目)

BV1
user_tel3_6
電話番号(6人チームの3人目)




---------------------------------------------------------








アコーディオン ごとの4人目
氏名
AL1
user_name4
氏名(4人チームの4人目)

BB1
user_name4_5
氏名(5人チームの4人目)

BW1
user_name4_6
氏名(6人チームの4人目)





アコーディオン ごとの4人目
氏名（フリガナ）
AM1
user_firigana4
氏名（フリガナ）(4人チームの4人目)

BC1
user_firigana4_5
氏名（フリガナ）(5人チームの4人目)

BX1
user_firigana4_6
氏名（フリガナ）(6人チームの4人目)





アコーディオン ごとの4人目
所属
AN1
user_school4
所属(4人チームの4人目)

BD1
user_school4_5
所属(5人チームの4人目)

BY1
user_school4_6
所属(6人チームの4人目)






アコーディオン ごとの4人目
メールアドレス
AO1
user_emial4
メールアドレス(4人チームの4人目)

BE1
user_emial4_5
メールアドレス(5人チームの4人目)

BZ1
user_emial4_6
メールアドレス(6人チームの4人目)






アコーディオン ごとの4人目
電話番号
AP1
user_tel4
電話番号(4人チームの4人目)

BF1
user_tel4_5
電話番号(5人チームの4人目)

CA1
user_tel4_6
電話番号(6人チームの4人目)


---------------------------------------------------------

アコーディオン ごとの5人目
氏名
BG1
user_name5
氏名(5人チームの5人目)

CB1
user_name5_6
氏名(6人チームの5人目)





アコーディオン ごとの5人目
氏名（フリガナ）
BH1
user_firigana5
氏名（フリガナ）(5人チームの5人目)

CC1
user_firigana5_6
氏名（フリガナ）(6人チームの5人目)




アコーディオン ごとの5人目
所属
BI1
user_school5
所属(5人チームの5人目)

CD1
user_school5_6
所属(6人チームの5人目)




アコーディオン ごとの5人目
メールアドレス
BJ1
user_emial5
メールアドレス(5人チームの5人目)

CE1
user_emial5_6
メールアドレス(6人チームの5人目)




アコーディオン ごとの5人目
電話番号
BK1
user_tel5
電話番号(5人チームの5人目)

CF1
user_tel5_6
電話番号(6人チームの5人目)