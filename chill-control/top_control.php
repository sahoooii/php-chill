<?php

require_once '../conf/conf.php';
require_once '../model/model.top.php';
require_once '../lib/mysqli.php';
require_once '../lib/file_upload_helper.php';

$err_msg = [];
$success = false;
$created_date = date('Y-m-d H:i:s');
$updated_date = date('Y-m-d H:i:s');

$link = get_db_connect();// DB接続

if ($link) {
    mysqli_set_charset($link, 'UTF8');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['user_name'])) {
            $user_name = $_POST['user_name'];
        }
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }
        if (isset($_POST['tel'])) {
            $tel = $_POST['tel'];
        }
        if (isset($_POST['password'])) {
            $password = $_POST['password'];
        }
        if (isset($_POST['status'])) {
            $status = $_POST['status'];
        }

        $user_name = delete_space($user_name);
        $email = delete_space($email);
        $tel = delete_space($tel);
        $password = delete_space($password);
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

        $user = [
            'user_name' => $user_name,
            'email' => $email,
            'tel' => $tel,
            'password' => $password,
            'status' => $status,
            'created_date' => $created_date,
            'updated_date' => $updated_date,
        ];

        //validation
        if (check_emp($user['user_name'])) {
            $err_msg['user_name'] = 'Userが未入力です';
        } elseif (user_check($user['user_name'])) {
            $err_msg['user_name'] = 'Userは6文字以上の英数字で入力してください';
        }
        $row = user_name_check($link, $user['user_name']);
        if (isset($row[0]['user_name'])) {
            $err_msg['user_name'] = 'Userがすでに存在します';
        }

        if (check_emp($user['password'])) {
            $err_msg['password'] = 'パスワードが未入力です';
        } elseif (user_check($user['password'])) {
            $err_msg['password'] = 'パスワードは6文字以上の英数字入力してください';
        }

        if (check_emp($user['tel'])) {
            $err_msg['tel'] = '電話番号が未入力です';
        } elseif (tel_check($user['tel'])) {
            $err_msg['tel'] = '電話番号の入力方法が違います';
        }

        if (check_emp($user['email'])) {
            $err_msg['email'] = 'メールアドレスが未入力です';
        } elseif (email_check($user['email'])) {
            $err_msg['email'] = 'メールアドレスの入力方法が違います';
        }
        $row = user_email_check($link, $user['email']);
        if (isset($row[0]['email'])) {
            $err_msg['email'] = 'メールアドレスがすでに登録されています';
        }

        if (status_check($user['status'])) {
            $err_msg['status']= 'ステータスはPrivateかPublicでお願いします';
        }

        // エラーメッセージがなければ、画像処理
        if (empty($err_msg)) {
            // image upload
            $upload_result = handle_file_upload(
                'new_img',
                'file_upload',
                'img_up',
                'chill_user_table',
                $link,
                [$user, $passwordHashed],
                $err_msg
            );

            if ($upload_result) {
                $success = true;
            } else {
                $err_msg['img_up'] = '画像のアップロードに失敗しました';
            }
        }
    }
    close_db_connect($link);
}

$title = 'Chill Register';
$stylesheet = 'css/top.styles.css';
$content = __DIR__ . '/../view/top.php';

include __DIR__ . '/../view/layout.php';
