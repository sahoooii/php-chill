<?php
// ログイン済みユーザのホームページ
require_once '../conf/conf.php';//設定ファイルの呼び出し
require_once '../model/model.top.php';
require_once '../model/model.user.php';
require_once '../lib/mysqli.php';

$err_msg = [];
$msg = [];
$result_data= [];
$created_date = date('Y-m-d H:i:s');
$updated_date = date('Y-m-d H:i:s');
$comment = '';
$page =1;

$link = get_db_connect();// DB接続

// セッション開始
session_start();

$user_id = login_check($link);

$user_name = get_user_name($link, $user_id);///user nameを取得

if ($link) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['sql_kind']) === true) {
            $sql_kind = $_POST['sql_kind'];
        }

        if ($sql_kind === 'insert') {
            if (isset($_POST['comment'])) {
                $comment = $_POST['comment'];
            }
            $comment = delete_space($comment);
            if (check_emp($comment)) {
                $err_msg['comment'] = 'コメントが未入力です';
            }
            if (check_str($comment, 100)) {
                $err_msg['comment'] = 'コメントは100文字以内でお願いします';
            }

            $user_bbs = [
                'user_id' => $user_id,
                'user_name' => $user_name,
                'comment' => $comment,
                'created_date' => $created_date,
                'updated_date' => $updated_date,
            ];

            $tempFile = $_FILES['new_img']['tmp_name'];
            $file_ext = pathinfo($_FILES['new_img']['name'], PATHINFO_EXTENSION);
            $file_ext = strtolower($file_ext);
            $filename = './bbs_fileUpload/' . date("YMDHis") .'.' . $file_ext;// 本来のファイル名
            $err_msg = img_up($tempFile, $file_ext, $filename, $err_msg);//img upload関数

            if (empty($err_msg)) {
                if ($file_ext === '') {//写真がなくてもtweetさせるため''
                    $filename= '';
                }
                if (insert_comment($link, $user_bbs, $filename) === false) {
                    $err_msg['comment'] = 'コメントできませんでした';
                }
            }
        } elseif ($sql_kind === 'delete') {
            if (isset($_POST['comment_id'])) {
                $comment_id = $_POST['comment_id'];
            }

            if (empty($err_msg)) {
                if (delete_chill_table($link, $user_id, $comment_id) === true) {
                    $msg[] = 'コメントを削除しました';
                } else {
                    $err_msg['fail'] = 'コメントの削除に失敗しました';
                }
            }
        }
    }

    $icon_data= [];
    $icon_data=get_icon_table($link, $user_id);

    //paging
    $result = paging($link, $user_id);
    while ($row = mysqli_fetch_array($result)) {
        $result_data[]= $row;
    }
    if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
        $page = $_REQUEST['page'];
    } else {
        $page = 1;
    }
    $page = max($page, 1);//マイナスの制御
    $count = count($result_data);//page数の計算
    $maxPage = ceil($count /5);//最大ページの計算
    $page = min($page, $maxPage);//$maxPageより大きい数字が入らない

    $start = 5 * ($page-1); //offset
    $data = [];
    $data = get_chill_table($link, $user_id, $start);
    $data = entity_assoc_array($data);//特殊文字をhtmlエンティティに変換

    close_db_connect($link);//DB切断
}

$title = 'BBS';
$stylesheet = 'css/bbs.styles.css';
$content = __DIR__ . '/../view/bbs.php';

include __DIR__ . '/../view/layout.php';
