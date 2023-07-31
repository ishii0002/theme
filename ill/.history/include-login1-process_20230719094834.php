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
			wp_clear_auth_cookie();
			
			// 管理者の場合、ログインを許可
			if ($user_verify->roles[0] === 'administrator') {
				$user_id = $user_verify->ID;
				wp_set_auth_cookie($user_id);
				wp_safe_redirect(user_admin_url());
				exit;
				
			} else {
				// 管理者以外の場合、ログインを許可しない。購読者の場合、エラーメッセージを表示
				if ($user_verify->roles[0] === 'subscriber') {
					$error_message = '購読者はログインできません。';
				} else {
					$error_message = 'ログインに失敗しました。<br>再度お試しください。';
				}
				wp_logout();
			}
		}	
	}
?>
