<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>User管理ページ</title>
    <link rel= "stylesheet" href= "./css/admin.styles.css">
</head>
<body>
    <div class= "user-admin">
            <h1>Chill User管理ページ</h1>
        <div>
            <a class="nemu" href="./logout.php">ログアウト</a>
        </div>
        <h2>User情報一覧</h2>
        <table>
            <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Status</th>
                <th>登録日</th>
                <th>更新日</th>
            </tr>
            <tr>
            <?php
            foreach ($data as $value) {
                if($value['status'] === '0') { ?>
                    <tr class= "status-false">
                <?php } else { ?>
                    <tr>
                <?php } ?>
                <td class="name_width"><?php echo $value['user_name']; ?></td>
                <td class= "email-width"><?php echo $value['email']; ?></td>
                <td class="tel-width"><?php echo $value['tel']; ?></td>
                <td class="status-width"><?php echo $value['status']; ?></td>
                <td class="date"><?php echo $value['created_at']; ?></td>
                <td class="date"><?php echo $value['updated_at']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
