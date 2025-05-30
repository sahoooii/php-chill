<?php

require_once '../conf/conf.php';
require_once '../model/model.top.php';
require_once '../model/model.user.php';
require_once '../lib/mysqli.php';
require_once '../lib/file_upload_helper.php';

$err_msg = [];
$msg = [];
$data = [];
$created_date = date('Y-m-d H:i:s');
$updated_date = date('Y-m-d H:i:s');

$link = get_db_connect();

// セッション開始
session_start();

$user_id = login_check($link);

if ($link) {
    mysqli_set_charset($link, 'UTF8');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['sql_kind'])) {
            $sql_kind = $_POST['sql_kind'];
        }
        if ($sql_kind === 'update') {
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
                'user_id' => $user_id,
                'user_name' => $user_name,
                'email' => $email,
                'tel' => $tel,
                'password' => $password,
                'status' => $status,
                'created_date' =>$created_date,
                'updated_date' => $updated_date,
            ];

            //validation
            if (check_emp($user['user_name'])) {
                $err_msg['user_name'] = 'ユーザー名が未入力です';
            } elseif (user_check($user['user_name'])) {
                $err_msg['user_name'] = 'ユーザー名は6文字以上の英数字を入力してください';
            }
            $row = user_name_check($link, $user['user_name']);
            if (isset($row[0]['user_name']) && $row[0]['user_id'] !== $user_id) {
                $err_msg['user_name'] = 'ユーザー名がすでに存在します';
            }

            if (check_emp($user['password'])) {
                $err_msg['password'] = 'パスワードが未入力です';
            } elseif (user_check($user['password'])) {
                $err_msg['password'] = 'パスワードは6文字以上の文字を入力してください';
            }

            if (check_emp($user['tel'])) {
                $err_msg['tel'] = '電話番号が未入力です';
            } elseif (tel_check($user['tel'])) {
                $err_msg['tel'] = '電話番号の入力方法が違います';
            }

            if (check_emp($user['email'])) {
                $err_msg['email'] = 'emailが未入力です';
            } elseif (email_check($user['email'])) {
                $err_msg['email'] = 'メールアドレスの入力方法が違います';
            }
            $row = user_email_check($link, $user['email']);
            if (isset($row[0]['email']) && $row[0]['user_id'] !== $user_id) {
                $err_msg['email'] = 'メールアドレスがすでに登録されています';
            }

            if (status_check($user['status'])) {
                $err_msg['status']= 'ステータスはPrivateかPublicでお願いします';
            }

            $filename = $_POST['img'] ?? '';

            if (count($err_msg) === 0) {
                $upload_result = handle_file_upload(
                    'new_img',
                    'file_upload',
                    'img_up',
                    'return_public_path_only',
                    $link,
                    [],
                    $err_msg,
                    true
                );

                // 成功していればその画像に差し替え（空なら前の画像を使う）
                $filename = $upload_result ?: ($_POST['new_img'] ?? '');

                if (update_user_info($link, $user, $passwordHashed, $filename)) {
                    $msg[] = 'User情報を更新しました';
                } else {
                    $err_msg['fail'] = 'Userの情報の更新に失敗しました';
                }
            }
        } elseif ($sql_kind === 'delete') {
            if (empty($err_msg)) {
                if (delete_user_table($link, $user_id)) {
                    header('Location: /logout');
                    exit;
                } else {
                    $err_msg['fail'] = 'Userの削除に失敗しました';
                }
            }

        }
    }
    $data= get_user_edit($link, $user_id);
    $data = entity_assoc_array($data);

    close_db_connect($link); // 接続を閉じる
}


$title = 'User Edit Page';
$stylesheet = 'css/user.edit.styles.css';
$content = __DIR__ . '/../view/user.edit.php';

include __DIR__ . '/../view/layout.php';
