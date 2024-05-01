<?php

require __DIR__ . '/../vendor/autoload.php';

require_once '../conf/conf.php';
require_once '../model/model.top.php';
require_once '../lib/mysqli.php';

$data = array();

$link = get_db_connect();// DB接続
$admin = get_admin_connect();//admin情報

session_start();

$user_id = login_check($link);

$user_name = get_user_name($link, $user_id);

if($user_name !== $admin[0]) {
    header('Location: ./login-control.php');
    exit;
}

if ($link) {
    mysqli_set_charset($link, 'UTF8');
    $data = get_user_table($link);
    $data = entity_assoc_array($data);
    close_db_connect($link); // 接続を閉じる
}

include_once '../view/user.admin.php';//htmlの呼び出し
