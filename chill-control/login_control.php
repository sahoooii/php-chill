<?php

require_once '../conf/conf.php';
require_once '../model/model.top.php';
require_once '../lib/mysqli.php';

$err_msg = [];

$link = get_db_connect();// DB接続
$admin = get_admin_connect();//admin情報

// セッション開始
session_start();

// セッション変数からログイン済みか確認
if (isset($_SESSION['user_id']) === true) {   // ログイン済みの場合、ホームページへリダイレクト
    header('Location: ./bbs_control.php');
    exit;
}

if ($link) {
    mysqli_set_charset($link, 'UTF8');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['user_name'])) {
            $user_name = $_POST['user_name'];
        }
        if (isset($_POST['password'])) {
            $password = $_POST['password'];
        }
        if (check_emp($user_name)) {
            $err_msg[] = 'ユーザー名が未入力です';
        }
        if (check_emp($password)) {
            $err_msg[] = 'パスワードが未入力です';
        }

        $user = [
            'user_name' => $user_name,
            'password' => $password,
        ];

        if (empty($err_msg) === true) {
            // user nameとパスワードからuser_idを取得するSQL
            $sql = 'SELECT user_id FROM chill_user_table WHERE user_name = "' . $user_name .'" AND password = "' . $password .'"';
            // SQL実行し登録データを配列で取得
            $data = get_as_array($link, $sql);
            // データベース切断
            close_db_connect($link);
            // 登録データを取得できたか確認
            if (isset($data[0]['user_id'])) {
                // セッション変数にuser_idを保存
                $_SESSION['user_id'] = $data[0]['user_id'];
                if ($user_name === $admin[0] && $password === $admin[1]) {
                    header('Location: ./user_admin_control.php');
                    exit;
                }
                // ログイン済みユーザのホームページへリダイレクト
                header('Location: ./bbs_control.php');
                exit;
            } else {
                $err_msg[] = 'ユーザー名とパスワードが一致しません';
            }
        }
    }
}

$title = 'Login';
$stylesheet = 'css/login.styles.css';
$content = __DIR__ . '/../view/login.php';

include __DIR__ . '/../view/layout.php';
