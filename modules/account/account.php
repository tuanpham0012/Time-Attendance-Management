<?php

$file = 'login.php';

switch($action){
    case 'login':
        $file = 'actions/login.php';
        break;
    case 'logout':
        $file = 'actions/logout.php';
        break;
    case 'register':
        $file = 'actions/register.php';
        break;
    case 'change':
        $file = 'actions/change_password.php';
        break;
    case 'get':
        $file = 'actions/get_password.php';
        break;
    case 'get_p':
        $file = 'actions/get_p.php';
        break;
    default :
        $file = 'actions/login.php';
}

require_once($file);

?>