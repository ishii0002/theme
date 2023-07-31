<?php
/**
 * Template Name: ログイン画面1
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage I'LL
 * @since I'LL 1.0
 */
// ---------- ヘッダーの読み込みは一瞬ラグが入るのでやめている。----------
// get_header();
// ---------- ログイン処理のファイルを読み込み ---------- 
include(get_theme_file_path() . "/include-login1-process.php");
?>
<div class="login no-js login-action-login wp-core-ui  locale-ja">





<div class="loginBox">
    

        <div id="login">

                <h1 class="loginBox__title">SBMCマイページログイン</h1>
                <form name="loginform" id="loginform" action="<?= esc_url( get_permalink() ); ?>" method="post">
                        


                        <div class="loginBox__img"></div>

                        <p>
                                <label for="user_login" id="label__login">メールアドレス</label>
                                <input type="text" name="log" id="user_login" class="input" value="<?= esc_attr( wp_unslash( $_POST['log'] ?? '' ) ); ?>" size="20" autocapitalize="off" autocomplete="username" required>
                        </p>

                        <div class="user-pass-wrap">
                                <label for="user_pass">パスワード</label>
                                <div class="wp-pwd relative">
                                        <input type="password" name="pwd" id="user_pass" class="input password-input w-full p-1" value="" size="20" autocomplete="current-password" required>
                                        <figure class="absolute bottom-3 right-3 cursor-pointer mb-2 top-1">
                                                <img id="togglePassword" class="" src="<?= get_template_directory_uri() . "/img/common/eye.svg" ?>">
                                        </figure>
                                </div>
                        </div>
                        <?php wp_nonce_field( 'my_login_action', 'my_login_nonce' ); ?>
                        <?php if(!empty($error_message)){ ?>
                                <p class="error -margin" style="color:#dc3232;"><?= $error_message ;?></p>
                        <?php }; ?>

                        <p id="nav">
                            <!-- <a href="https://sbmc2022.check-demo2.site/wp-login.php?action=lostpassword">パスワードをお忘れですか ?</a> -->
                            <a href="/password-reset1/">パスワードを忘れた方</a>
                        </p>

                        <p class="submit">
                                <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="ログイン">
                                <input type="hidden" name="redirect_to" value="<?= esc_attr( $_SERVER['REQUEST_URI'] ); ?>">
                                <input type="hidden" name="testcookie" value="1">
                        </p>

                        <a href="/signup/" class="loginBox__link">メンバー登録がまだの方はこちら</a>

                </form>

        </div>


        <script>
                const togglePassword = document.querySelector("#togglePassword");
                const password = document.querySelector("#user_pass");

                togglePassword.addEventListener("click", function() {
                        const type = password.getAttribute("type") === "password" ? "text" : "password";
                        const src = password.getAttribute("type") === "password" ? '<?= get_template_directory_uri() ;?>' + '/img/common/eye-slash.svg' :'<?= get_template_directory_uri() ;?>' +  "/img/common/eye.svg";
                        password.setAttribute("type", type);
                        this.setAttribute('src', src);
                });
        </script>


</div>



</div>

<script>
history.pushState(null, null, location.href);
window.addEventListener('popstate', (e) => {
history.go(1);
});

</script>

