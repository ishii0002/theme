<?php
	function validate_login_form( $log, $pwd ) {
		$error_message = '';
		if ( empty( $log ) || empty( $pwd ) ) {
				$error_message = 'ユーザー名またはパスワードが入力されていません。';
		}
		return $error_message;
	}

	if (isset($_POST['loginform'])) {
		validate_login_form($_POST['log'],$_POST['pwd']);
	}

	if (isset($_POST['wp-submit'])) {
		validate_login_form($_POST['log'],$_POST['pwd']);
		$log = isset( $_POST['log'] ) ? sanitize_text_field( $_POST['log'] ) : '';
		$pass = isset( $_POST['pwd'] ) ? sanitize_text_field( $_POST['pwd'] ) : '';
		
		$login_data = array(
			'user_login' => $log,
			'user_password' => $pass
		);

		$user_verify = wp_signon($login_data,false);
		
		if (is_wp_error($user_verify)) {
			$error_message = 'ログインに失敗しました。<br>再度お試しください。';
			
		} else {
			if($user_verify->roles[0] === 'chikuhokai'){
				wp_logout();
				wp_clear_auth_cookie();
				$error_message = 'ログインに失敗しました。<br>再度お試しください。';
				
			}else{
				wp_clear_auth_cookie();
				$user_id = $user_verify->ID;
				wp_set_auth_cookie($user_id);

				if ($user_verify->roles[0] === 'administrator') {
					wp_safe_redirect(user_admin_url());
					exit;

				} elseif ($user_verify->roles[0] === 'subscriber') {
					// 購読者がログインしようとしたら、強制ログアウトさせる
					wp_logout();
					wp_safe_redirect('/'); // ログイン画面に戻る
					exit;

				} 
				
				exit;
			}
			
		}
	}
?>
