<?php
// ログアウト処理

require_once '../conf/conf.php';//設定ファイルの呼び出し
require_once '../model/model.top.php';//設定ファイルの呼び出し
require_once '../lib/mysqli.php';

// セッション開始
session_start();
// セッション名取得 ※デフォルトはPHPSESSID
$session_name = session_name();
// セッション変数を全て削除
$_SESSION = array();


// ユーザのCookieに保存されているセッションIDを削除
if (isset($_COOKIE[$session_name])) {
    // sessionに関連する設定を取得
    $params = session_get_cookie_params();

    // sessionに利用しているクッキーの有効期限を過去に設定することで無効化
    setcookie(
        $session_name,
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// セッションIDを無効化
session_destroy();
// ログアウトの処理が完了したらログインページへリダイレクト
header('Location: /login');
exit;
