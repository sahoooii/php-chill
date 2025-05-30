<?php

function entity_str($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');//特殊文字をHTMLエンティティに変換する
}

function entity_assoc_array($assoc_array)
{
    foreach ($assoc_array as $key => $value) {
        foreach ($value as $keys => $values) {
            // 特殊文字をHTMLエンティティに変換
            $assoc_array[$key][$keys] = entity_str($values);
        }
    }
    return $assoc_array;
}

//クエリを実行する関数
function get_as_array($link, $sql)
{
    $data = []; // 返却用配列
    if ($result = mysqli_query($link, $sql)) { // クエリを実行する
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { // １件ずつ取り出す
                $data[] = $row;
            }
        }
        mysqli_free_result($result);// 結果セットを開放
    }
    return $data;
}

//空白チェック
function delete_space($value)
{
    $value = preg_replace('/^[ ]+/u', '', $value);
    $value = preg_replace('/[ ]+$/u', '', $value);
    return $value;
}

//valueが空だったら
function check_emp($value)
{
    if ($value === '') {
        return true;
    }
    return false;
}

//userの登録ルールチェック
function user_check($value)
{
    if (preg_match('/^[a-zA-Z0-9]{6,}+$/', $value)) {//正規表現通りならfalse
        return false;
    }
    return true;
}

//同じユーザー名が存在するかcheck
function user_name_check($link, $user_name)
{
    $query = 'SELECT user_name, user_id FROM chill_user_table WHERE user_name = "' . $user_name .'" LIMIT 1';
    return get_as_array($link, $query);
}

//emailのチェック
function email_check($value)
{
    if (preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $value)) {
        return false;
    }
    return true;
}

//同じemailが存在するかcheck
function user_email_check($link, $email)
{
    $query = 'SELECT email, user_id FROM chill_user_table WHERE email = "' . $email .'" LIMIT 1';
    return get_as_array($link, $query);
}

//電話番号のｖチェック
function tel_check($value)
{
    if (preg_match('/^(0{1}\d{1,4}-{0,1}\d{1,4}-{0,1}\d{4})$/', $value)) {//正規表現通りならFALSE
        return false;
    }
    return true;
}

//status check
function status_check($value)
{
    if ($value !== '0' && $value !== '1') {//非公開でも公開でもなかったらTRUE
        return true;
    }
    return false;
}

//img upload
function img_up($tempFile, $file_ext, $save_path, &$err_msg)
{
    // 対応拡張子チェック
    $allowed_ext = ['jpeg', 'jpg', 'png'];
    if (!in_array($file_ext, $allowed_ext)) {
        $err_msg['new_img'] = 'ファイルの形式が違います';
        return false;
    }

    //アップロードされたファイルが本当にアップロード処理されたかの確認
    if (!is_uploaded_file($tempFile)) {
        $err_msg['new_img'] = 'アップロードされたファイルが見つかりません';
        return false;
    }

    if (!in_array($file_ext, ['jpeg', 'jpg', 'png'])) {
        $err_msg['new_img'] = 'ファイルの形式が違います';
        return false;
    }

    if (!move_uploaded_file($tempFile, $save_path)) {
        $err_msg['new_img'] = 'ファイルをアップロードできません';
        return false;
    }

    return true;
}

// Register登録
function chill_user_table($link, $filename, $user, $passwordHashed)
{
    $query = <<<EOT
INSERT INTO chill_user_table(
    img,
    user_name,
    email,
    tel,
    password,
    status,
    created_at,
    updated_at
) VALUES (
    "{$filename}",
    "{$user['user_name']}",
    "{$user['email']}",
    "{$user['tel']}",
    "{$passwordHashed}",
    "{$user['status']}",
    "{$user['created_date']}",
    "{$user['updated_date']}"
)
EOT;
    return mysqli_query($link, $query);
}

// Login section
//user_idがあればログイン、user_idを返す なければログイン画面
function login_check()
{
    if (isset($_SESSION['user_id'])) {
        $user_id =  $_SESSION['user_id'];
        return $user_id;
    } else {
        header('Location: /login.php');
        exit;
    }
}

// Get email and user_name
function get_user($link, $user_id)
{
    $query = 'SELECT email, user_name FROM chill_user_table WHERE user_id = ' . $user_id .'';
    $data = get_as_array($link, $query);
    return $data[0];
}

//Admin user get all users data
function get_user_table($link)
{
    $query = 'SELECT * FROM chill_user_table';
    return get_as_array($link, $query);
}

// Admin user get users data with paging
function get_userData_paging($link, $start, $pageNum)
{
    $query = 'SELECT * FROM chill_user_table' . ' ORDER BY updated_at ASC LIMIT ' . $start . ' , '. $pageNum .'';
    return get_as_array($link, $query);
}

// 接続を閉じる
function close_db_connect($link)
{
    mysqli_close($link);
}
