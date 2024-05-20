<?php

    $user = [
        'user_name' => '',
        'email' => '',
        'tel' => '',
        'password' => '',
        'status' => '',
        'created_date' => '',
        'updated_date' => '',
    ];

    $err_msg = [];
    $success = false;

    $title = 'Chill Register';
    $stylesheet = 'css/top.styles.css';
    $content = __DIR__ . '/../view/top.php';

    include __DIR__ . '/../view/layout.php';
