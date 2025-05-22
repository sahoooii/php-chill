<?php

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

switch ($uri) {
    // Route
    case '':
        require __DIR__ . '/../chill-control/top.php';
        break;
    case 'login':
        require __DIR__ . '/../chill-control/login.php';
        break;
    case 'logout':
        require __DIR__ . '/../chill-control/logout.php';
        break;
    case 'bbs':
        require __DIR__ . '/../chill-control/bbs_control.php';
        break;
    case 'profile':
        require __DIR__ . '/../chill-control/user_edit_control.php';
        break;
    case 'admin':
        require __DIR__ . '/../chill-control/user_admin_control.php';
        break;
        // Formから飛ばすControlの読み込み
    case 'top_control':
        require __DIR__ . '/../chill-control/top_control.php';
        break;
    case 'login_control':
        require __DIR__ . '/../chill-control/login_control.php';
        break;
    default:
        http_response_code(404);
        echo '404 Not Found';
        break;
}
