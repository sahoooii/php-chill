<?php

require_once '../conf/conf.php';//設定ファイルの呼び出し
require_once '../model/model.top.php';
require_once '../model/model.user.php';
require_once '../lib/mysqli.php';
require_once '../lib/file_upload_helper.php';

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

$user_name = get_user($link, $user_id)['user_name'];
$email = get_user($link, $user_id)['email'];

if ($link) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['sql_kind'])) {
            $sql_kind = $_POST['sql_kind'];
        }

        if ($sql_kind === 'insert') {
            if (isset($_POST['comment'])) {
                $comment = $_POST['comment'];
            }
            $comment = delete_space($comment);
            if (check_str($comment, 100)) {
                $err_msg['comment'] = 'コメントは100文字以内でお願いします';
            }

            // コメントのみ、写真のみ、コメント&写真
            $has_comment = !empty($_POST['comment']);
            $has_image = (isset($_FILES['new_img']) && $_FILES['new_img']['error'] === UPLOAD_ERR_OK);

            if (!$has_comment && !$has_image) {
                $err_msg['comment'] = 'コメントが未入力です';
            }

            // Image upload
            $filename = handle_file_upload(
                'new_img',
                'bbs_fileUpload',
                'img_up',
                'return_public_path_only',
                $link,
                [],
                $err_msg,
								true
            );

            // 投稿内容の検証ロジック
            if (check_emp($comment) && empty($filename)) {
                $err_msg['comment'] = 'コメントまたは画像のいずれかを入力してください。';
            }

            // user_bbs配列構築
            $user_bbs = [
                    'user_id' => $user_id,
                    'user_name' => $user_name,
                    'comment' => $comment,
                    'created_date' => $created_date,
                    'updated_date' => $updated_date,
            ];

            if (empty($err_msg)) {
                if (insert_comment($link, $user_bbs, $filename ?? '')) {
                    $msg[] = '新しいコメントをしました';
                } else {
                    $err_msg['comment'] = 'コメントできませんでした';
                }
            }
        } elseif ($sql_kind === 'delete') {
            if (isset($_POST['comment_id'])) {
                $comment_id = $_POST['comment_id'];
            }

            if (empty($err_msg)) {
                if (delete_chill_table($link, $user_id, $comment_id)) {
                    $msg[] = 'コメントを削除しました';
                } else {
                    $err_msg['fail'] = 'コメントの削除に失敗しました';
                }
            }
        }
    }

    $icon_data= [];
    $icon_data= get_icon_table($link, $user_id);

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
    $pageNum = 5;
    $count = count($result_data);//page数の計算
    $maxPage = ceil($count / $pageNum);//最大ページの計算
    $page = min($page, $maxPage);//$maxPageより大きい数字が入らない

    $start = $pageNum * ($page-1); //offset
    $data = [];
    $data = get_chill_table($link, $user_id, $start, $pageNum);
    $data = entity_assoc_array($data);//特殊文字をhtmlエンティティに変換

    close_db_connect($link);//DB切断
}

$title = 'BBS';
$stylesheet = 'css/bbs.styles.css';
$content = __DIR__ . '/../view/bbs.php';

include __DIR__ . '/../view/layout.php';
