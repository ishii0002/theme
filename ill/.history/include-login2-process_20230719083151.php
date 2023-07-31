<?php 

// // ---------- 既にログインしていたら ----------
// if(is_user_logged_in()){
// 	// ---------- 管理者の場合 ----------
// 	if(wp_get_current_user()->roles[0] === 'administrator'){
// 		wp_safe_redirect(user_admin_url());
// 		exit;
// 		// ---------- 購読者の場合 ----------
// 	}elseif(wp_get_current_user()->roles[0] === 'subscriber'){
// 		wp_safe_redirect(home_url());
// 		exit;
// 		// ---------- 竹ほう会の場合 ----------
// 	}elseif (wp_get_current_user()->roles[0] === 'chikuhokai') {
// 		wp_safe_redirect('/chikuho/');
// 		exit;
// 	}
// }
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
// 	// function my_login_process() {
// 	// 	if ( !isset( $_POST['my_login_nonce'] ) || !wp_verify_nonce( $_POST['my_login_nonce'], 'my_login_action' ) ) {
// 	// 		wp_safe_redirect('/chikuhoukai_login/');
// 	// 		exit;
// 	// 	}
// 	// }
// 	// my_login_process();

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
// 			// ログイン成功時の処理

// 			// ---------- 一度クッキー情報をリセットし改めて設定 ----------
// 			wp_clear_auth_cookie();
// 			$user_id = $user_verify->ID;
// 			wp_set_auth_cookie($user_id);

// 			// ---------- 権限ごとにリダイレクト先を設定 ----------
// 			// ---------- 管理者の場合 ----------
// 			if ($user_verify->roles[0]  === 'administrator') {
// 				// wp_safe_redirect(user_admin_url());
// 				wp_safe_redirect('/chikuho/');
// 				exit;
// 			} elseif ($user_verify->roles[0] === 'subscriber') {
// 			// ---------- 購読者の場合 ----------
// 			wp_safe_redirect(home_url());
// 			exit;
// 		} elseif ($user_verify->roles[0] === 'chikuhokai') {
// 			// ---------- ちくほうかいの場合 ----------
// 			wp_safe_redirect('/chikuho/');
// 			exit;
// 		} else {
// 			wp_safe_redirect(home_url());
// 			exit;
// 		}
//     exit;
//   }
	
// }
?>
<?php 
// ---------- 入力が空だった時のバリデーション関数（セキュリティ対策） ----------
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

	// ---------- フォーム送信があったら ----------
	if (isset($_POST['wp-submit'])) {
		// ---------- バリデーションチェック ----------
		validate_login_form($_POST['log'],$_POST['pwd']);
		// ---------- 送信情報のテキストをサニタイズ（無害化）して変数に格納 ----------
		$log = isset( $_POST['log'] ) ? sanitize_text_field( $_POST['log'] ) : '';
		$pass = isset( $_POST['pwd'] ) ? sanitize_text_field( $_POST['pwd'] ) : '';
		
		// ---------- 送信情報を配列化 ----------
		$login_data = array(
			'user_login' => $log, // ユーザー名かメールアドレスが入力される
			'user_password' => $pass
		);
		// ---------- ログインチェック ----------
		$user_verify = wp_signon($login_data,false);

		
		if (is_wp_error($user_verify)) {
			// ログイン失敗時の処理
			$error_message = 'ログインに失敗しました。<br>再度お試しください。';
			
		} else {

			if($user_verify->roles[0] === 'subscriber'){
				// ログイン成功時の処理(ちくほうかいユーザーの場合)
				wp_logout();
				wp_clear_auth_cookie();
				$error_message = 'ログインに失敗しました。<br>再度お試しください。';

			}else{
				// ログイン成功時の処理
				// ---------- 一度クッキー情報をリセットし改めて設定 ----------
				wp_clear_auth_cookie();
				$user_id = $user_verify->ID;
				wp_set_auth_cookie($user_id);

				// ---------- 管理者の場合 ----------
				if ($user_verify->roles[0]  === 'administrator') {
					wp_safe_redirect(user_admin_url());
					exit;

				} elseif ($user_verify->roles[0] === 'chikuhokai') {
					// ---------- 購読者の場合 ----------
					wp_safe_redirect('/chikuho/');
					exit;

				} 
				
				exit;
			}
			
  }
	
}
?>