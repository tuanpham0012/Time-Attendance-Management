<?php

$file = 'list_project.php';

switch($action){
    case 'list':
        $file = 'actions/list_project.php';
        break;
    case 'add':
        $file = 'actions/add_project.php';
        break;
    case 'edit':
        $file = 'actions/edit_project.php';
        break;
    case 'detail':
        $file = 'actions/detail_project.php';
        break;
    case 'delete':
        $file = 'actions/delete.php';
        break;
    case 'update':
        $file = 'actions/update.php';
        break;
    case 'join':
        $file = 'actions/join.php';
        break;    
    default: $file = 'actions/list_project.php';
}

require_once($file);

?>