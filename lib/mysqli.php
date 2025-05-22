<?php

require __DIR__ . '/../vendor/autoload.php';

function get_db_connect()
{//DBハンドル取得
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();

    $dbHost = $_ENV['DB_HOST'];
    $dbUsername = $_ENV['DB_USERNAME'];
    $dbPassword = $_ENV['DB_PASSWD'];
    $dbDatabase = $_ENV['DB_NAME'];

    $link= mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase);
    if (!$link) {// コネクション取得
        echo 'データベースに接続できません' .PHP_EOL;
        echo 'Debugging error: ' . mysqli_connect_error() .PHP_EOL;
        exit;
    }
    mysqli_set_charset($link, DB_CHARACTER_SET);// 文字コードセット
    return $link;
}
	
function get_admin_connect(): array
{
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();

    $dbAdminEmail = $_ENV['DB_ADMIN_EMAIL'];

    return [$dbAdminEmail];
}
