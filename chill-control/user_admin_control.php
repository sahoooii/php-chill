<?php

require __DIR__ . '/../vendor/autoload.php';
require_once '../conf/conf.php';
require_once '../model/model.top.php';
require_once '../model/model.user.php';
require_once '../lib/mysqli.php';

$data = array();
$msg = [];
$err_msg = [];

$link = get_db_connect();// DB接続
$admin = get_admin_connect();//admin情報

session_start();

$admin_id = login_check($link);

$email = get_user($link, $admin_id)['email'];

// admin user check
if($email !== $admin[0]) {
    header('Location: ./login-control.php');
    exit;
}

if ($link) {
    mysqli_set_charset($link, 'UTF8');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['sql_kind'])) {
            $sql_kind = $_POST['sql_kind'];
        }
        if ($sql_kind === 'delete') {
            if (isset($_POST['user_id'])) {
                $user_id = $_POST['user_id'];
            }
            if (delete_user_table($link, $user_id)) {
                $msg[] = 'ID:' . $user_id . 'のUserを削除しました';
            } else {
                $err_msg[] = 'アカウントの削除に失敗しました';
            }
        }
    }

    $result = get_user_table($link);
    if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
        $page = $_REQUEST['page'];
    } else {
        $page = 1;
    }

    $page = max($page, 1);//マイナスの制御
    $pageNum = 10;
    $count = count($result);//page数の計算
    $maxPage = ceil($count / $pageNum);//最大ページの計算
    $page = min($page, $maxPage);//$maxPageより大きい数字が入らない

    $start = $pageNum * ($page-1); //offset
    $data= [];
    $data = get_userData_paging($link, $start, $pageNum);
    $data = entity_assoc_array($data);
    close_db_connect($link); // 接続を閉じる
}

$title = 'Users List';
$stylesheet = 'css/admin.styles.css';
$content = __DIR__ . '/../view/user.admin.php';

include __DIR__ . '/../view/layout.php';
