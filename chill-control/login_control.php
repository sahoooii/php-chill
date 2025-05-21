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
if (isset($_SESSION['user_id'])) {   // ログイン済みの場合、ホームページへリダイレクト
    header('Location: /bbs');
    exit;
}

if ($link) {
    mysqli_set_charset($link, 'UTF8');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }
        if (isset($_POST['password'])) {
            $password = $_POST['password'];
        }
        if (check_emp($email)) {
            $err_msg['email'] = 'メールアドレスが未入力です';
        }
        if (check_emp($password)) {
            $err_msg['password'] = 'パスワードが未入力です';
        }

        $user = [
                'email' => $email,
                'password' => $password,
        ];

        if (empty($err_msg)) {
            // emailからuser_id,email,passwordを取得するSQL
            $sql = 'SELECT user_id, email, password FROM chill_user_table WHERE email = "' . $email .'"';
            $data = get_as_array($link, $sql);
            close_db_connect($link);

            // Userが見つからなければ
            if (empty($data)) {
                $err_msg['fail'] = 'Userが登録されていません';
            } elseif (!empty($data) && password_verify($user['password'], $data[0]['password'])) {
                // セッション変数にuser_idを保存
                $_SESSION['user_id'] = $data[0]['user_id'];
                // admin user check
                if ($email === $admin[0]) {
                    header('Location: /admin');
                    exit;
                }
                // ログイン済みユーザのホームページへリダイレクト
                header('Location: /bbs');
                exit;
            } else {
                $err_msg['fail'] = 'パスワードが違います';
            }
        }
    }
}

$title = 'Login';
$stylesheet = 'css/login.styles.css';
$content = __DIR__ . '/../view/login.php';

include __DIR__ . '/../view/layout.php';
