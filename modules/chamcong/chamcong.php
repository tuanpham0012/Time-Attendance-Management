<?php

$file = 'list.php';

switch($action){
    case 'list':
        $file = 'actions/list.php';
        break;
    case 'add':
        $file = 'actions/add.php';
        break;
    case 'edit':
        $file = 'actions/edit.php';
        break;
    case 'detail':
        $file = 'actions/detail.php';
        break;
    case 'update':
        $file = 'actions/update.php';
        break;
    case 'delete':
        $file = 'actions/delete.php';
        break;
    default: $file = 'actions/list.php';
}

require_once($file);

?>