<?php

function handle_file_upload($file_key, $save_sub_dir, $img_upload_func, $public_path_handler, $link, $args = [], &$err_msg, $allow_empty = false)
{
    if (!isset($_FILES[$file_key]) || $_FILES[$file_key]['error'] === UPLOAD_ERR_NO_FILE) {
        return $allow_empty ? '' : ($err_msg['img_up'] = 'ファイルが選択されていません') && false;
    }

    // 一時的ファイル名保存
    $tempFile = $_FILES[$file_key]['tmp_name'];

    if (!is_uploaded_file($tempFile)) {
        $err_msg['img_up'] = '不正なファイルアップロードです';
        return false;
    }
    // ファイル拡張子を抜き出して、本来のファイル名→大文字を小文字にする
    $file_ext = strtolower(pathinfo($_FILES[$file_key]['name'], PATHINFO_EXTENSION));
    // 保存ファイル名（タイムスタンプ＋拡張子）
    $filename = date("YmdHis") . '.' . $file_ext;

    // 実際に保存するサーバー側の絶対パス
    $save_path = __DIR__ . '/../public/uploads/' . $save_sub_dir . '/' . $filename;
    // HTMLやDBで使う相対パス（例: ./uploads/abc.jpg）

    $public_path = '/uploads/' . $save_sub_dir . '/' . $filename;

    $success = $img_upload_func($tempFile, $file_ext, $save_path, $err_msg);

    if (!$success) {
        return null;
    }
    return $public_path_handler($link, $public_path, ...$args);
}

// 画像保存後、public_path（HTMLやDB用）だけ返す関数
function return_public_path_only($link, $public_path, ...$args)
{
    return $public_path;
}
