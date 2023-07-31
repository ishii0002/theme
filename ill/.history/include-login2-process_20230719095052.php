<?php 
// // ---------- 入力が空だった時のバリデーション関数（セキュリティ対策） ----------
// 	function validate_login_form( $log, $pwd ) {
// 		$error_message = '';
// 		if ( empty( $log ) || empty( $pwd ) ) {
// 				$error_message = 'ユーザー名またはパスワードが入力されていません。';
// 		}
// 		return $error_message;
// 	}
// 	if (isset($_POST['loginform'])) {
// 	validate_login_form($_POST['log'],$_POST['pwd']);
// 	}

// 	// ---------- フォーム送信があったら ----------
// 	if (isset($_POST['wp-submit'])) {
// 		// ---------- バリデーションチェック ----------
// 		validate_login_form($_POST['log'],$_POST['pwd']);
// 		// ---------- 送信情報のテキストをサニタイズ（無害化）して変数に格納 ----------
// 		$log = isset( $_POST['log'] ) ? sanitize_text_field( $_POST['log'] ) : '';
// 		$pass = isset( $_POST['pwd'] ) ? sanitize_text_field( $_POST['pwd'] ) : '';
		
// 		// ---------- 送信情報を配列化 ----------
// 		$login_data = array(
// 			'user_login' => $log, // ユーザー名かメールアドレスが入力される
// 			'user_password' => $pass
// 		);
// 		// ---------- ログインチェック ----------
// 		$user_verify = wp_signon($login_data,false);

		
// 		if (is_wp_error($user_verify)) {
// 			// ログイン失敗時の処理
// 			$error_message = 'ログインに失敗しました。<br>再度お試しください。';
			
// 		} else {

// 			if($user_verify->roles[0] === 'subscriber'){
// 				// ログイン成功時の処理(ちくほうかいユーザーの場合)
// 				wp_logout();
// 				wp_clear_auth_cookie();
// 				$error_message = 'ログインに失敗しました。<br>再度お試しください。';

// 			}else{
// 				// ログイン成功時の処理
// 				// ---------- 一度クッキー情報をリセットし改めて設定 ----------
// 				wp_clear_auth_cookie();
// 				$user_id = $user_verify->ID;
// 				wp_set_auth_cookie($user_id);

// 				// ---------- 管理者の場合 ----------
// 				if ($user_verify->roles[0]  === 'administrator') {
// 					wp_safe_redirect(user_admin_url());
// 					exit;

// 				} elseif ($user_verify->roles[0] === 'chikuhokai') {
// 					// ---------- 購読者の場合 ----------
// 					wp_safe_redirect('/');
// 					exit;

// 				} 
				
// 				exit;
// 			}
			
//   }
	
// }
?>


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
			
			// 購読者の場合、ログインを許可
			if ($user_verify->roles[0] === 'subscriber') {
				$user_id = $user_verify->ID;
				wp_set_auth_cookie($user_id);
				wp_safe_redirect(home_url()); // ホーム画面にリダイレクトします。必要に応じて他のURLに変更してください。
				exit;
				
			} else {
				// 購読者以外の場合、ログインを許可しない。管理者の場合、エラーメッセージを表示
				if ($user_verify->roles[0] === 'administrator') {
					$error_message = '管理者はログインできません。';
				} else {
					$error_message = 'ログインに失敗しました。<br>再度お試しください。';
				}
				wp_logout();
			}
		}	
	}
?>
