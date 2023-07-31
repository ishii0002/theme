
<?php

/**
 * Template header
 * @package WordPress
 * @subpackage I'LL
 * @since I'LL 1.0
 */
?>
<!DOCTYPE html>
<?php ill_html_compress_start(); ?>
<html <?php language_attributes(); ?> dir="ltr">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <!-- Basic information -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <!-- Site information -->
  <title><?php bloginfo('name'); ?></title>
  <meta name="keywords" content="サイトキーワードをカンマ区切りで4~6つ入力">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <!-- OGP -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">
  <meta property="og:title" content="<?php bloginfo('name'); ?>">
  <meta property="og:description" content="<?php bloginfo('description'); ?>">
  <meta property="og:image" content="SNSにシェアした際に表示されるサムネイル画像を設定">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:description" content="<?php bloginfo('description'); ?>">
  <!-- fivicon -->
  <link rel="shortcut icon" href="img/common/favicon.png">
  <!-- include fanctions -->
  <?php wp_head(); ?>
  <!-- include Stylesheet	-->
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@700&display=swap" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" rel="stylesheet">

  <!-- 共通スタイル -->
  <link href="<?php echo get_template_directory_uri() ?>/asset/css/reset.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri() ?>/asset/css/style.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri() ?>/asset/css/header.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri() ?>/asset/css/footer.css" rel="stylesheet">
  <!-- swiper.css -->
  <link href="<?php echo get_template_directory_uri() ?>/asset/css/swiper.css" rel="stylesheet">

  <script src="https://kit.fontawesome.com/f0fc03e17c.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  

</head>

<?php
global $wp_query;
$post_obj = $wp_query->get_queried_object();
$slug = $post_obj->post_name;
?>

<body id="top" class="body <?php echo $slug; ?>">

<a href="__TBD__"></a>

  


<!-- <header class="header" id="header">


  <div class="header__defaultNavi">
    <div class="header__logo">
      <a href="/">
        <h1>ロゴ
   
        </h1>
      </a>
    </div>

    <nav class="header__menu">
      <ul>
        <li><a href="/about/">会社概要</a></li>
        <li><a href="#conditions">メニュー2</a></li>
        <li><a href="#step">メニュー3</a></li>
        <li><a href="#flow">メニュー4</a></li>
        <li><a href="/contact/">お問い合わせ</a></li>
      </ul>
    </nav>
  </div>



  <div type="button" id="js__buttonHamburger" class="header__hamburger js__header__hamburger" aria-controls="global-nav" aria-expanded="false">
    <span class="header__hamburger__line"></span>
    <p class="js__header__buttonName">MENU</p> 
  </div>


  <nav class="header__globalNav js__header__globalNav">
    <div class="header__globalNavWrap js__header__globalNavWrap">
      <ul class="header__globalNavMenu js__header__globalNavMenu">
        <li class="header__globalNavMenuItem"><a href="#case">メニュー1</a></li>
        <li class="header__globalNavMenuItem"><a href="#conditions">メニュー2</a></li>
        <li class="header__globalNavMenuItem"><a href="#step">メニュー3</a></li>
        <li class="header__globalNavMenuItem"><a href="#flow">メニュー4</a></li>
        <li class="header__globalNavMenuItem"><a href="#question">メニュー5</a></li>
      </ul>
    </div>
  </nav>

</header> -->














