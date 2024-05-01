<?php

    $user = [
        'user_name' => '',
        'password' => '',
        'status' => '',
    ];

    $err_msg = [];
    $msg = [];

    $title = 'Login';
    $stylesheet = 'css/login.styles.css';
    $content = __DIR__ . '/../view/login.php';

    include __DIR__ . '/../view/layout.php';
