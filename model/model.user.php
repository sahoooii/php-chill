<?php

//文字数チェック
function check_str($value, $count)
{
    if (mb_strlen($value) > $count) {
        return true;
    }
    return false;
}

//コメントの挿入
function insert_comment($link, $user_bbs, $filename)
{
    $query = <<<EOT
INSERT INTO chill_bbs_table(
    user_id,
    user_name,
    comment,
    date,
    img
) VALUES (
    "{$user_bbs['user_id']}",
    "{$user_bbs['user_name']}",
    "{$user_bbs['comment']}",
    "{$user_bbs['created_date']}",
    "{$filename}"
    )
EOT;
    return mysqli_query($link, $query);
}

//comment削除ボタン
function delete_chill_table($link, $user_id, $comment_id)
{
    $query = 'DELETE FROM chill_bbs_table WHERE user_id = ' . $user_id . ' AND comment_id = ' . $comment_id .'';
    return mysqli_query($link, $query);
}

//paging
//LIMITなし全件取得
function paging($link, $user_id)
{
    $query = 'SELECT chill_bbs_table.comment_id, chill_bbs_table.user_id, chill_bbs_table.user_name, chill_bbs_table.comment, chill_bbs_table.img, chill_bbs_table.date, chill_user_table.status, chill_user_table.img as iconImg FROM chill_bbs_table LEFT JOIN chill_user_table ON chill_bbs_table.user_id = chill_user_table.user_id WHERE status= 1 OR chill_user_table.user_id=' . $user_id .'';
    $result = mysqli_query($link, $query);
    return $result;
}

function get_chill_table($link, $user_id, $start)
{
    $sql = 'SELECT chill_bbs_table.comment_id, chill_bbs_table.user_id, chill_bbs_table.user_name, chill_bbs_table.comment, chill_bbs_table.img, chill_bbs_table.date, chill_user_table.status, chill_user_table.img as iconImg FROM chill_bbs_table LEFT JOIN chill_user_table ON chill_bbs_table.user_id = chill_user_table.user_id WHERE status= 1 OR chill_user_table.user_id=' . $user_id .' ORDER BY date DESC LIMIT ' . $start . ',5';
    return get_as_array($link, $sql);
}

//各userのicon取得
function get_icon_table($link, $user_id)
{
    $sql = 'SELECT img FROM chill_user_table WHERE user_id= ' . $user_id .'';
    return get_as_array($link, $sql);
}

// user-edit_page
function get_user_edit($link, $user_id)
{
    $query = 'SELECT * FROM chill_user_table WHERE user_id= ' . $user_id .'';
    return get_as_array($link, $query);
}

function update_user_info($link, $user, $filename)
{
    if ($filename === '') {
        $query =<<<EOT
        UPDATE chill_user_table SET
        user_name ="{$user['user_name']}",
        email = "{$user['email']}",
        tel = "{$user['tel']}",
        password = "{$user['password']}",
        status = "{$user['status']}",
        updated_at = "{$user['updated_date']}"
        WHERE user_id = "{$user['user_id']}"
EOT;
    } else {
        $query =<<<EOT
        UPDATE chill_user_table SET
        user_name = "{$user['user_name']}",
        email = "{$user['email']}",
        tel = "{$user['tel']}",
        password = "{$user['password']}",
        img = "{$filename}",
        status = "{$user['status']}",
        updated_at = "{$user['updated_date']}"
        WHERE user_id = "{$user['user_id']}"
EOT;
    }
    return mysqli_query($link, $query);
}
